<?php
// Get values from form
$patientID = $_POST['patientId'];
$services = $_POST['Services'];
$paymentMethod = $_POST['PaymentMethod'];


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
$sql = "INSERT INTO Billing (PatientID,Services,PaymentMethod) VALUES (?, ?,?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $patientID , $services, $paymentMethod );

if ($stmt->execute()) {
    echo "Payment was Succesfull !";
     echo '<br>';
     echo '<br>';
    echo '<a href="billing.php">←   Go back</a>';
    
       
} else {
    echo "Payment Failed: " . $stmt->error;
   
}

$stmt->close();
$conn->close();
?>