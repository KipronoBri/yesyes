<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Billing & Payment</title>
  <link rel="stylesheet" href="css/style.css">
  <style>
    body{
   background-image: url(billing.jpg);  
    }
  </style>
</head>
<body>
  <nav><a href="home.php">← Back to Home</a></nav>
  <div class="container">
    <h1>Billing & Payment Processing</h1>
    <form action="billing1.php"Method="post">
      <input type="text" placeholder="Patient ID" name ="patientId" required><br>
      <input type="text" placeholder="Services" name ="Services" Required><br>
      <input type="text" placeholder="Payment Method"name ="PaymentMethod"Required><br>
      <button type="submit">Process Payment</button>
    </form>
  </div>
</body>
</html>