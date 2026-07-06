<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "college_portal";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); }

// List of courses
$courses = [
    "B Sc Computer Science",
    "B Com",
    "B A English",
    "B A History",
    "BBA",
    "BCA",
    "B Sc Maths",
    "B Sc Physics",
    "B Sc Chemistry"
];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Department-wise Admission Count</title>
    <style>
        table { width: 70%; border-collapse: collapse; margin: 20px auto; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: center; }
        th { background: #007BFF; color: white; }
        a { color: blue; text-decoration: none; font-weight: bold; }
    </style>
</head>
<body>
    <h2 style="text-align:center;">Department-wise Admission Count</h2>
    <table>
        <tr>
            <th>Department/Course</th>
            <th>Total Admission</th>
            <th>Action</th>
        </tr>
        <?php
        foreach($courses as $course){
            $sql = "SELECT COUNT(*) AS total FROM applicatio WHERE course='$course'";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            $count = $row['total'];
            echo "<tr>
                    <td>$course</td>
                    <td>$count</td>
                    <td><a href='view.php?course=".urlencode($course)."'>View</a></td>
                  </tr>";
        }
        ?>
    </table>
</body>
</html>