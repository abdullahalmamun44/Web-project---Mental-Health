<?php
require_once('database.php');

function getAllTherapists() {
    $con = getConnection();
    $sql = "SELECT * FROM therapists WHERE status = 'active' ORDER BY name ASC";
    $result = mysqli_query($con, $sql);
    
    $therapists = array();
    if($result) {
        while($row = mysqli_fetch_assoc($result)) {
            $therapists[] = $row;
        }
    }
    return $therapists;
}

function getTherapistById($id) {
    $con = getConnection();
    $id = mysqli_real_escape_string($con, $id);
    
    $sql = "SELECT * FROM therapists WHERE id = '$id' AND status = 'active'";
    $result = mysqli_query($con, $sql);
    
    if($result && mysqli_num_rows($result) == 1) {
        return mysqli_fetch_assoc($result);
    }
    return false;
}

function getTherapistsByDepartment($department) {
    $con = getConnection();
    $department = mysqli_real_escape_string($con, $department);
    
    $sql = "SELECT * FROM therapists WHERE department = '$department' AND status = 'active' ORDER BY name ASC";
    $result = mysqli_query($con, $sql);
    
    $therapists = array();
    if($result) {
        while($row = mysqli_fetch_assoc($result)) {
            $therapists[] = $row;
        }
    }
    return $therapists;
}

function getTherapistsBySpecialization($specialization) {
    $con = getConnection();
    $specialization = mysqli_real_escape_string($con, $specialization);
    
    $sql = "SELECT * FROM therapists WHERE specialization = '$specialization' AND status = 'active' ORDER BY name ASC";
    $result = mysqli_query($con, $sql);
    
    $therapists = array();
    if($result) {
        while($row = mysqli_fetch_assoc($result)) {
            $therapists[] = $row;
        }
    }
    return $therapists;
}
?>