<?php
include 'connectDB.php';

// Example of merging logic for managing users
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $serial_number = $_POST['serial_number'];
    $gender = $_POST['gender'];
    $finger_id = $_POST['finger_id'];
    $rfid = $_POST['rfid'];
    
    $sql = "INSERT INTO users (name, serial_number, gender, finger_id, rfid) VALUES ('$name', '$serial_number', '$gender', '$finger_id', '$rfid')";
    
    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>
