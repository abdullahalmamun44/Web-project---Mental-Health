<?php
require_once('../models/appointmentmodel.php');
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

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['appointment_id'])) {
    $appointment_id = $_POST['appointment_id'];

    if (cancelAppointment($appointment_id, $username)) {
        $success = "Appointment cancelled successfully";
        header("location: ../views/appointment.php?success=" . urlencode($success));
        exit();
    } else {
        $error = "Failed to cancel appointment";
        header("location: ../views/appointment.php?error=" . urlencode($error));
        exit();
    }
} else {
    header('location: ../views/appointment.php');
    exit();
}
?>