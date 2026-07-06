<?php
// DB Connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "college_portal";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form values
$user_name = $_POST['user_name'];
$course = $_POST['course'];
$amount = $_POST['amount'];
$payment_method = $_POST['payment_method'];
$payment_time = date("Y-m-d H:i:s"); 
$status = "Success"; // Default status success

// Insert into payment table
$sql = "INSERT INTO payment (user_name, course, amount, payment_method, payment_time, status) 
        VALUES ('$user_name', '$course', '$amount', '$payment_method', '$payment_time', '$status')";

if ($conn->query($sql) === TRUE) {
    echo "<h2 style='color:green; text-align:center;'>Payment Successful ✅</h2>";
    echo "<p style='text-align:center;'><a href='payment_form.php'>Go Back</a> | <a href='payment_report.php'>View Report</a></p>";
} else {
    echo "<h2 style='color:red; text-align:center;'>Error: " . $conn->error . "</h2>";
}

$conn->close();
?>