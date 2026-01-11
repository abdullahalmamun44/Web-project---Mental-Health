<?php
require_once('database.php');

function addAppointment($appointment) {
    $con = getConnection();
    
    $username = mysqli_real_escape_string($con, $appointment['username']);
    $fullname = mysqli_real_escape_string($con, $appointment['fullname']);
    $appointment_date = mysqli_real_escape_string($con, $appointment['appointment_date']);
    $appointment_time = mysqli_real_escape_string($con, $appointment['appointment_time']);
    $service_type = mysqli_real_escape_string($con, $appointment['service_type']);
    $therapist_id = mysqli_real_escape_string($con, $appointment['therapist_id']);
    $therapist_name = mysqli_real_escape_string($con, $appointment['therapist_name']);
    $department = mysqli_real_escape_string($con, $appointment['department']);
    $reason = mysqli_real_escape_string($con, $appointment['reason']);
    
    $sql = "INSERT INTO appointments (username, fullname, appointment_date, appointment_time, service_type, therapist_id, therapist_name, department, reason) 
            VALUES ('$username', '$fullname', '$appointment_date', '$appointment_time', '$service_type', '$therapist_id', '$therapist_name', '$department', '$reason')";
    
    if(mysqli_query($con, $sql)) {
        return mysqli_insert_id($con);
    } else {
        return false;
    }
}

function getUserAppointments($username) {
    $con = getConnection();
    $username = mysqli_real_escape_string($con, $username);
    
    $sql = "SELECT a.*, t.specialization, t.qualification, t.consultation_fee 
            FROM appointments a 
            LEFT JOIN therapists t ON a.therapist_id = t.id 
            WHERE a.username='$username' 
            ORDER BY a.appointment_date DESC, a.appointment_time DESC";
    $result = mysqli_query($con, $sql);
    
    $appointments = array();
    if($result) {
        while($row = mysqli_fetch_assoc($result)) {
            $appointments[] = $row;
        }
    }
    return $appointments;
}

function cancelAppointment($id, $username) {
    $con = getConnection();
    $id = mysqli_real_escape_string($con, $id);
    $username = mysqli_real_escape_string($con, $username);
    
    $sql = "UPDATE appointments SET status = 'cancelled' WHERE id = '$id' AND username = '$username'";
    
    if(mysqli_query($con, $sql)) {
        return mysqli_affected_rows($con) > 0;
    } else {
        return false;
    }
}

function checkAppointmentConflict($username, $date, $time, $therapist_id = null) {
    $con = getConnection();
    $username = mysqli_real_escape_string($con, $username);
    $date = mysqli_real_escape_string($con, $date);
    $time = mysqli_real_escape_string($con, $time);
    $therapist_id = mysqli_real_escape_string($con, $therapist_id);
    
    $sql = "SELECT COUNT(*) as count FROM appointments 
            WHERE username = '$username' 
            AND appointment_date = '$date' 
            AND appointment_time = '$time' 
            AND status != 'cancelled'";
    
    if($therapist_id) {
        $sql .= " AND therapist_id = '$therapist_id'";
    }
    
    $result = mysqli_query($con, $sql);
    if($result) {
        $row = mysqli_fetch_assoc($result);
        return $row['count'] > 0;
    }
    return false;
}

function checkTherapistAvailability($therapist_id, $date, $time) {
    $con = getConnection();
    $therapist_id = mysqli_real_escape_string($con, $therapist_id);
    $date = mysqli_real_escape_string($con, $date);
    $time = mysqli_real_escape_string($con, $time);
    
    $therapist_sql = "SELECT available_days FROM therapists WHERE id = '$therapist_id'";
    $therapist_result = mysqli_query($con, $therapist_sql);
    
    if($therapist_result && $therapist_row = mysqli_fetch_assoc($therapist_result)) {
        $available_days = explode(',', $therapist_row['available_days']);
        $day_of_week = date('l', strtotime($date));
        
        if(!in_array(trim($day_of_week), $available_days) && !in_array('Monday-Friday', $available_days)) {
            return false; 
        }
    }
    
    $sql = "SELECT COUNT(*) as count FROM appointments 
            WHERE therapist_id = '$therapist_id' 
            AND appointment_date = '$date' 
            AND appointment_time = '$time' 
            AND status != 'cancelled'";
    
    $result = mysqli_query($con, $sql);
    if($result) {
        $row = mysqli_fetch_assoc($result);
        return $row['count'] == 0; 
    }
    return false;
}
?>