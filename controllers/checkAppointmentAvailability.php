<?php
require_once('../models/appointmentmodel.php');
require_once('../models/therapistmodel.php');

session_start();

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

if (!isset($_COOKIE['status']) || $_COOKIE['status'] !== 'true') {
    echo json_encode(['success' => false, 'message' => 'Please login first']);
    exit();
}

$username = $_COOKIE['username'] ?? '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $date = $_POST['date'] ?? '';
    $time = $_POST['time'] ?? '';
    $therapist_id = $_POST['therapist_id'] ?? '';

    if (empty($date) || empty($time) || empty($therapist_id)) {
        echo json_encode(['success' => false, 'message' => 'All fields are required']);
        exit();
    }

    if (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $date)) {
        echo json_encode(['success' => false, 'message' => 'Invalid date format']);
        exit();
    }

    $today = date('Y-m-d');
    if ($date < $today) {
        echo json_encode([
            'success' => true,
            'available' => false,
            'message' => 'Appointment date cannot be in the past'
        ]);
        exit();
    }

    $valid_times = ['09:00', '10:00', '11:00', '12:00', '14:00', '15:00', '16:00', '17:00'];
    if (!in_array($time, $valid_times)) {
        echo json_encode(['success' => false, 'message' => 'Invalid time slot']);
        exit();
    }

    $therapist = getTherapistById($therapist_id);
    if (!$therapist) {
        echo json_encode([
            'success' => true,
            'available' => false,
            'message' => 'Selected therapist not found'
        ]);
        exit();
    }

    $available_days = explode(',', $therapist['available_days']);
    $day_of_week = date('l', strtotime($date));

    $is_available_day = false;
    foreach ($available_days as $day) {
        $day = trim($day);
        if ($day == 'Monday-Friday' && in_array($day_of_week, ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'])) {
            $is_available_day = true;
            break;
        } elseif ($day == $day_of_week) {
            $is_available_day = true;
            break;
        }
    }

    if (!$is_available_day) {
        echo json_encode([
            'success' => true,
            'available' => false,
            'message' => 'Therapist not available on ' . $day_of_week
        ]);
        exit();
    }

    $available_time = explode('-', $therapist['available_time']);
    if (count($available_time) == 2) {
        $start_time = strtotime(trim($available_time[0]));
        $end_time = strtotime(trim($available_time[1]));
        $selected_time = strtotime($time);

        if ($selected_time < $start_time || $selected_time > $end_time) {
            echo json_encode([
                'success' => true,
                'available' => false,
                'message' => 'Therapist available only from ' . $available_time[0] . ' to ' . $available_time[1]
            ]);
            exit();
        }
    }

    if (!checkTherapistAvailability($therapist_id, $date, $time)) {
        echo json_encode([
            'success' => true,
            'available' => false,
            'message' => 'Therapist already has an appointment at this time'
        ]);
        exit();
    }

    if (checkAppointmentConflict($username, $date, $time, $therapist_id)) {
        echo json_encode([
            'success' => true,
            'available' => false,
            'message' => 'You already have an appointment at this time'
        ]);
        exit();
    }

    echo json_encode([
        'success' => true,
        'available' => true,
        'message' => 'Time slot is available'
    ]);

} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
}
exit();
?>