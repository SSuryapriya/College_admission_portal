<?php
$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "college_portal";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

// Upload file function
function uploadFile($file, $folder="uploads") {
    if (!isset($file) || $file['error'] != 0) return null;
    $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    $allowed = ["pdf","jpg","jpeg","png"];
    if (!in_array($ext, $allowed)) return null;
    if (!is_dir($folder)) mkdir($folder, 0755, true);
    $newName = uniqid() . "." . $ext;
    $path = $folder . "/" . $newName;
    if (move_uploaded_file($file['tmp_name'], $path)) return $path;
    return null;
}

// Collect form data
$name        = $_POST['name'];
$dob         = $_POST['dob'];
$address     = $_POST['address'];
$gender      = $_POST['gender'];
$father_name = $_POST['father_name'];
$mother_name = $_POST['mother_name'];
$school_name = $_POST['school_name'];
$year_pass   = $_POST['year_passing'];
$mark_12th   = $_POST['mark_12th'];
$email       = $_POST['email'];
$course      = $_POST['course'];
$medium      = $_POST['medium'];
$applied_on  = date("Y-m-d");
$status      = "Pending";

// Upload documents
$marksheet = uploadFile($_FILES['marksheet']);
$tc        = uploadFile($_FILES['tc']);
$aadhar    = uploadFile($_FILES['aadhar']);

// Generate Application ID like A001, A002...
$res = $conn->query("SELECT MAX(id) as maxid FROM applicatio");
$row = $res->fetch_assoc();
$next = $row['maxid'] ? $row['maxid'] + 1 : 1;
$app_id = "A" . str_pad($next, 3, "0", STR_PAD_LEFT);

// Insert into DB
$stmt = $conn->prepare("INSERT INTO applicatio
(app_id, name, dob, address, gender, father_name, mother_name, school_name, year_passing, mark_12th, email, course, medium, applied_on, status, marksheet, tc, aadhar) 
VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

$stmt->bind_param("sssssssssdssssssss",
  $app_id, $name, $dob, $address, $gender, $father_name, $mother_name,
  $school_name, $year_pass, $mark_12th, $email, $course, $medium,
  $applied_on, $status, $marksheet, $tc, $aadhar
);

if ($stmt->execute()) {
    echo "<h2>Application Submitted Successfully!</h2>";
    echo "<p>Your Application ID is: <b>$app_id</b></p>";
    echo "<a href='admissionform.php'>Back to Form</a>";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();