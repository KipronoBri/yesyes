<?php
// Get values from form
$date = $_POST['Date'];
$doctor = $_POST['Doctor'];
$reasonForVist = $_POST['Reason'];


// DB connection settings
$servername = "localhost";
$dbname = "Skyviewhealth";
$dbuser = "root";
$dbpass = "";

// Create connection
$conn = new mysqli($servername, $dbuser, $dbpass, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare & insert
$sql = "INSERT INTO Appointment (Doctor,ReasonForVisit,Date) VALUES (?, ?,?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $doctor , $reasonForVist, $date );

if ($stmt->execute()) {
    echo "Appointment Booked Succesfully!";
    echo '<a href="Appointment.php">← Go back</a>';
    
       
} else {
    echo "Error: " . $stmt->error;
   
}

$stmt->close();
$conn->close();
?>