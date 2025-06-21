<?php
// Get values from form
$prescription = $_POST['Prescription'];
$patientID = $_POST['PatientID'];



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
$sql = "INSERT INTO Pharmacy (Prescription,PatientId) VALUES (?,?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $prescription , $patientID,  );

if ($stmt->execute()) {
    echo "Prescription Issued And  Saved Succesfully!";
    echo'<br>';
     echo'<br>';
    echo '<a href="Appointment.php">← Go back</a>';
    
       
} else {
    echo "Error: " . $stmt->error;
   
}

$stmt->close();
$conn->close();
?>