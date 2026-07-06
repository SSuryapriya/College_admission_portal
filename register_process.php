<?php
// DB connection
$conn = mysqli_connect("localhost", "root", "", "college_portal");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get values from form
$username = $_POST['username'] ?? '';
$email = $_POST['email']?? '';
$mobile = $_POST['mobile']?? '';
$password = $_POST['password']?? '';

// Insert into database
$sql = "INSERT INTO users (username, email, mobile, password) VALUES ('$username', '$email', '$mobile', '$password')";

if (mysqli_query($conn, $sql)) {
    echo "Registration successful!";
 echo"<a href='login.php'>Login here</a>";

} else {
    echo "Error: " . mysqli_error($conn);
}

mysqli_close($conn);
?>