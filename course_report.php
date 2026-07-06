<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "college_portal";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); }

// Course-wise applications
$sql = "SELECT course, COUNT(*) as count FROM applicatio GROUP BY course";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Course-wise Report</title>
    <style>
        body { font-family: Arial, sans-serif; background:#f9fcff; padding:30px; }
        h2 { text-align:center; color:#003366; }
        table { border-collapse:collapse; width:70%; margin:auto; background:white; box-shadow:0px 4px 8px #aaa; }
        th, td { border:1px solid #555; padding:12px; text-align:center; }
        th { background:#0055aa; color:white; }
        tr:nth-child(even){ background:#f2f2f2; }
    </style>
</head>
<body>

<h2>📊 Course-wise Admission Report</h2>

<table>
    <tr><th>Course </th><th>No. of Students</th></tr>
    <?php while($row=$result->fetch_assoc()){ ?>
    <tr>
        <td><?php echo $row['course']; ?></td>
        <td><?php echo $row['count']; ?></td>
    </tr>
    <?php } ?>
</table>

</body>
</html>