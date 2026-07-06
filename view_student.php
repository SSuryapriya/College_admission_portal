<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "college_portal";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>View Students</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #cce6ff;
            margin: 0;
            padding: 0;
        }
        h2 {
            text-align: center;
            padding: 20px;
            color: #003366;
        }
        table {
            border-collapse: collapse;
            margin: 20px auto;
            width: 95%;
            background: white;
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
            border-radius: 10px;
            overflow: hidden;
        }
        th {
            background: #3399ff;
            color: white;
            padding: 12px;
            text-align: center;
            font-size: 15px;
        }
        td {
            padding: 10px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }
        tr:nth-child(even) {
            background: #f2f2f2;
        }
        a {
            text-decoration: none;
            color: #0066cc;
            font-weight: bold;
        }
        a:hover {
            color: #ff6600;
        }
        .back-btn {
            display: block;
            text-align: center;
            margin: 20px;
        }
        .back-btn a {
            background: #3399ff;
            color: white;
            padding: 10px 20px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: bold;
        }
        .back-btn a:hover {
            background: #ff6600;
        }
    </style>
</head>
<body>
<?php
if (isset($_GET['course'])) {
    $course = urldecode($_GET['course']);
    echo "<h2>Student List - $course</h2>";

    // extra fields: marks, payment, tc, marksheet, aadhar
    $sql = "SELECT id, name, dob, email, mark_12th, 
                   tc, marksheet, aadhar 
            FROM applicatio
            WHERE course = '$course'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>DOB</th>
                    <th>Email</th>
                    <th>Marks</th>
                    <th>Transfer Certificate</th>
                    <th>Marksheet</th>
                    <th>Aadhar Card</th>
                </tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>".$row['id']."</td>
                    <td>".$row['name']."</td>
                    <td>".$row['dob']."</td>
                    <td>".$row['email']."</td>
                    <td>".$row['mark_12th']."</td>
                    <td><a href='uploads/".$row['tc']."' target='_blank'>View TC</a></td>
                    <td><a href='uploads/".$row['marksheet']."' target='_blank'>View Marksheet</a></td>
                    <td><a href='uploads/".$row['aadhar']."' target='_blank'>View Aadhar</a></td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "<p style='text-align:center; color:red; font-weight:bold;'>No students found for this course.</p>";
    }
}
$conn->close();
?>
<div class="back-btn">
    <a href="admindashboard.php">⬅ Back </a>
</div>
</body>
</html>