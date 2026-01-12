<?php
require_once('../models/appointmentmodel.php');
require_once('../models/therapistmodel.php');
require_once('../models/usermodel.php');

session_start();

if (!isset($_COOKIE['status']) || $_COOKIE['status'] !== 'true') {
    header('location: ../views/userlogin.php');
    exit();
}

$username = $_COOKIE['username'] ?? '';
$userData = getUserByUsername($username);

if (!$userData) {
    header('location: ../views/userlogin.php');
    exit();
}

$allTherapists = getAllTherapists();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $appointment_date = $_POST['appointment_date'];
    $appointment_time = $_POST['appointment_time'];
    $service_type = $_POST['service_type'];
    $therapist_id = $_POST['therapist_id'];
    $reason = $_POST['reason'] ?? '';

    if (empty($appointment_date) || empty($appointment_time) || empty($service_type)) {
        $error = "All required fields must be filled";
        header("location: ../views/appointment.php?error=" . urlencode($error));
        exit();
    }

    $today = date('Y-m-d');
    if ($appointment_date < $today) {
        $error = "Appointment date cannot be in the past";
        header("location: ../views/appointment.php?error=" . urlencode($error));
        exit();
    }

    if (checkAppointmentConflict($username, $appointment_date, $appointment_time, $therapist_id)) {
        $error = "This time slot is already booked";
        header("location: ../views/appointment.php?error=" . urlencode($error));
        exit();
    }

    $therapist = getTherapistById($therapist_id);
    if (!$therapist) {
        $error = "Selected therapist not found";
        header("location: ../views/appointment.php?error=" . urlencode($error));
        exit();
    }

    if (!checkTherapistAvailability($therapist_id, $appointment_date, $appointment_time)) {
        $error = "Therapist not available at this time";
        header("location: ../views/appointment.php?error=" . urlencode($error));
        exit();
    }

    $appointment = [
        'username' => $username,
        'fullname' => $userData['fullName'] ?? $username,
        'appointment_date' => $appointment_date,
        'appointment_time' => $appointment_time,
        'service_type' => $service_type,
        'therapist_id' => $therapist_id,
        'therapist_name' => $therapist['name'],
        'department' => $therapist['department'],
        'reason' => $reason
    ];

    $appointment_id = addAppointment($appointment);
    if ($appointment_id) {
        $success = "Appointment booked successfully! Appointment ID: #" . $appointment_id;
        header("location: ../views/appointment.php?success=" . urlencode($success));
        exit();
    } else {
        $error = "Failed to book appointment. Please try again.";
        header("location: ../views/appointment.php?error=" . urlencode($error));
        exit();
    }
} else {
    header('location: ../views/appointment.php');
    exit();
}
?>