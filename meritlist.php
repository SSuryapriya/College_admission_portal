<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "college_portal";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch students order by mark (highest first)
$sql = "SELECT * FROM applicatio ORDER BY mark_12th DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Merit List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f9ff;
            padding: 30px;
        }
        h2 {
            text-align: center;
            color: #003366;
        }
        table {
            margin: auto;
            border-collapse: collapse;
            width: 90%;
            background: white;
            box-shadow: 0px 4px 8px #ccc;
        }
        th, td {
            border: 1px solid #777;
            padding: 10px;
            text-align: center;
        }
        th {
            background: #0055aa;
            color: white;
        }
        tr:nth-child(even) {
            background: #f2f2f2;
        }
        img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            object-fit: cover;
        }
    </style>
</head>
<body>

<h2>College Admission Merit List</h2>

<table>
    <tr>
        <th>Rank</th>
         <th>Name</th>
        <th>Course</th>
        <th>Email</th>
        <th>12th Mark</th>
        <th>School</th>
    </tr>
    <?php
    if ($result->num_rows > 0) {
        $rank = 1;
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>".$rank."</td>
                    <td>".$row['name']."</td>
                    <td>".$row['course']."</td>
                    <td>".$row['email']."</td>
                    <td>".$row['mark_12th']."</td>
                    <td>".$row['school_name']."</td>
                  </tr>";
            $rank++;
        }
    } else {
        echo "<tr><td colspan='6'>No students found 🚫</td></tr>";
    }
    ?>
</table>

</body>
</html>