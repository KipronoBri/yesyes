<?php
// Get values from form
$appointmentReminders = $_POST['AppointmentReminders'];
$billingAlerts = $_POST['BillingAlerts'];



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
$sql = "INSERT INTO notification (AppointmentReminders,BillingAlerts) VALUES (?,?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $appointmentReminders , $billingAlerts,  );

if ($stmt->execute()) {
    echo "Notification  Saved Succesfully!";
    echo'<br>';
     echo'<br>';
    echo '<a href="Appointment.php">← Go back</a>';
    
       
} else {
    echo "Error: " . $stmt->error;
   
}

$stmt->close();
$conn->close();
?>