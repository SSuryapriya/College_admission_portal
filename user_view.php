<?php
session_start();

$_SESSION['app_id'] = 1; 
$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "college_portal";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); }

// Check if app_id is in session
if (!isset($_SESSION['app_id'])) {
    die("No application selected. Please login or enter Application ID.");
}

$appId = $_SESSION['app_id'];

// Fetch application details using app_id
$sql = "SELECT * FROM applicatio WHERE app_id = '$appId'";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
    <title>My Application</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f4f4; }
        .container { width: 80%; margin: 30px auto; background: #fff; padding: 20px; border-radius: 8px; }
        h2 { text-align: center; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ccc; padding: 10px; text-align: left; }
        th { background: #eee; }
        .status { font-weight: bold; color: green; }
        .pending { color: orange; }
        .rejected { color: red; }
    </style>
</head>
<body>
<div class="container">
    <h2>My Application</h2>
    <?php
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo "<table>
                <tr><th>Application ID</th><td>".$row['app_id']."</td></tr>
                <tr><th>Name</th><td>".$row['name']."</td></tr>
                <tr><th>Email</th><td>".$row['email']."</td></tr>
                <tr><th>Course</th><td>".$row['course']."</td></tr>
                <tr><th>Submitted On</th><td>".$row['created_at']."</td></tr>
                <tr><th>Status</th><td class='status ".strtolower($row['status'])."'>".$row['status']."</td></tr>
              </table>";
    } else {
        echo "<p>No application found for this ID!</p>";
    }
    ?>
</div>
</body>
</html>