<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
$username = $_SESSION['username'];

$conn = new mysqli("localhost", "root", "", "college_portal");
if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM applicatio WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
  <title>Your Submitted Details</title>
  <style>
    body { font-family: Arial; background: #f1f8e9; padding: 20px; }
    .box { background: white; padding: 20px; width: 60%; margin: auto; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.2); }
    h2 { text-align: center; }
    p { line-height: 1.6; }
    a { color: blue; }
  </style>
</head>
<body>
  <div class="box">
    <h2>Admission Submitted Details</h2>
    <p><strong>Name:</strong> <?= htmlspecialchars($row['name']) ?></p>
    <p><strong>DOB:</strong> <?= htmlspecialchars($row['dob']) ?></p>
    <p><strong>Address:</strong> <?= htmlspecialchars($row['address']) ?></p>
    <p><strong>Gender:</strong> <?= htmlspecialchars($row['gender']) ?></p>
    <p><strong>Father:</strong> <?= htmlspecialchars($row['father']) ?></p>
    <p><strong>Mother:</strong> <?= htmlspecialchars($row['mother']) ?></p>
    <p><strong>School:</strong> <?= htmlspecialchars($row['school']) ?></p>
    <p><strong>Year of Passing:</strong> <?= htmlspecialchars($row['year']) ?></p>
    <p><strong>12th Mark:</strong> <?= htmlspecialchars($row['mark']) ?></p>
    <p><strong>Email:</strong> <?= htmlspecialchars($row['email']) ?></p>
    <p><strong>Course:</strong> <?= htmlspecialchars($row['course']) ?></p>
    <p><strong>Marksheet:</strong> <a href="<?= $row['marksheet'] ?>" target="_blank">View</a></p>
    <p><strong>TC:</strong> <a href="<?= $row['tc'] ?>" target="_blank">View</a></p>
    <p><strong>Aadhar:</strong> <a href="<?= $row['aadhar'] ?>" target="_blank">View</a></p>
  </div>
</body>
</html>