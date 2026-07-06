<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "college_portal";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); }

$course = isset($_GET['course']) ? urldecode($_GET['course']) : '';

$sql = "SELECT * FROM applicatio WHERE course='$course'";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Student List - <?php echo htmlspecialchars($course); ?></title>
    <style>
        table { width: 90%; border-collapse: collapse; margin: 20px auto; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: center; }
        th { background: #28a745; color: white; }
    </style>
</head>
<body>
    <h2 style="text-align:center;">Students in <?php echo htmlspecialchars($course); ?></h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>DOB</th>
            <th>Gender</th>
            <th>School</th>
            <th>Year of Passing</th>
            <th>12th Marks</th>
            <th>Email</th>
            <th>Status</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()){
                echo "<tr>
                        <td>".$row['id']."</td>
                        <td>".$row['name']."</td>
                        <td>".$row['dob']."</td>
                        <td>".$row['gender']."</td>
                        <td>".$row['school_name']."</td>
                        <td>".$row['year_passing']."</td>
                        <td>".$row['mark_12th']."</td>
                        <td>".$row['email']."</td>
                        <td>".$row['status']."</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='9'>No students found in this course</td></tr>";
        }
        ?>
    </table>
</body>
</html>