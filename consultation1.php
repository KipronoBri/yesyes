<?php
// Get values from form
$patientHistory = $_POST['PatientHistory'];
$symptoms = $_POST['Symptoms'];
$notes = $_POST['Notes'];


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
// 
// Prepare & insert
$sql = "INSERT INTO Consultation (PatientHistory,Symptoms,DiagnosisNotes) VALUES (?, ?,?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $patientHistory , $symptoms, $notes);

if ($stmt->execute()) {
    echo "Consultation Made Submited !";
     echo '<br>';
     echo '<br>';
    echo '<a href="Consultation.php">  ←   Go back</a>';
    
       
} else {
    echo "Payment Failed: " . $stmt->error;
   
}

$stmt->close();
$conn->close();
?>