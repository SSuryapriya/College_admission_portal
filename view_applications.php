<?php
$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "college_portal";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

$id = $_GET['id'] ?? 0;

$sql = "SELECT * FROM applicatio WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$app = $result->fetch_assoc();
if (!$app) {
    die("Application not found");
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>View Application - <?php echo $app['app_id']; ?></title>
  <style>
    body { font-family: Arial, sans-serif; background:#f8f9fa; padding:20px; }
    .card { background:#fff; padding:20px; border-radius:10px; width:700px; margin:auto; box-shadow:0 0 10px rgba(0,0,0,0.1); }
    h2 { text-align:center; color:#333; }
    table { width:100%; border-collapse:collapse; }
    td { padding:8px; border-bottom:1px solid #ddd; }
    .label { font-weight:bold; width:200px; }
    a.file { color:#007bff; text-decoration:none; }
    a.file:hover { text-decoration:underline; }
  </style>
</head>
<body>
<div class="card">
  <h2>Application Details (<?php echo $app['app_id']; ?>)</h2>
  <table>
    <tr><td class="label">Full Name</td><td><?php echo $app['name']; ?></td></tr>
    <tr><td class="label">Date of Birth</td><td><?php echo $app['dob']; ?></td></tr>
    <tr><td class="label">Address</td><td><?php echo $app['address']; ?></td></tr>
    <tr><td class="label">Gender</td><td><?php echo $app['gender']; ?></td></tr>
    <tr><td class="label">Father's Name</td><td><?php echo $app['father_name']; ?></td></tr>
    <tr><td class="label">Mother's Name</td><td><?php echo $app['mother_name']; ?></td></tr>
    <tr><td class="label">School Name</td><td><?php echo $app['school_name']; ?></td></tr>
    <tr><td class="label">Year of Passing</td><td><?php echo $app['year_passing']; ?></td></tr>
    <tr><td class="label">12th Mark</td><td><?php echo $app['mark_12th']; ?> %</td></tr>
    <tr><td class="label">Email</td><td><?php echo $app['email']; ?></td></tr>
    <tr><td class="label">Course</td><td><?php echo $app['course']; ?></td></tr>
    <tr><td class="label">Medium</td><td><?php echo $app['medium']; ?></td></tr>
    <tr><td class="label">Applied On</td><td><?php echo $app['applied_on']; ?></td></tr>
    <tr><td class="label">Status</td><td><?php echo $app['status']; ?></td></tr>
    <tr><td class="label">Marksheet</td>
        <td><a class="file" href="<?php echo $app['marksheet']; ?>" target="_blank">View File</a></td></tr>
    <tr><td class="label">Transfer Certificate</td>
        <td><a class="file" href="<?php echo $app['tc']; ?>" target="_blank">View File</a></td></tr>
    <tr><td class="label">Aadhar Card</td>
        <td><a class="file" href="<?php echo $app['aadhar']; ?>" target="_blank">View File</a></td></tr>
  </table>
</div>
</body>
</html>