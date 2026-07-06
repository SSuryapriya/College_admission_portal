<?php
session_start();

// Admin login check
if (!isset($_SESSION['admin_username'])) {
    header("Location: adminlogin.php");
    exit();
}

include 'config.php'; // DB connection

$sql = "SELECT * FROM admission_form";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Applications - Admin View</title>
    <style>
        body {
            background-color: #f0f8ff;
            font-family: Arial, sans-serif;
        }
        h2 {
            text-align: center;
            color: #003366;
            margin-top: 30px;
        }
        table {
            border-collapse: collapse;
            width: 95%;
            margin: 20px auto;
            background-color: white;
            box-shadow: 0px 0px 10px #999;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 12px;
            text-align: center;
        }
        th {
            background-color: #006699;
            color: white;
        }
        a.view-link {
            color: blue;
            text-decoration: underline;
        }
    </style>
</head>
<body>

<h2>All Student Applications</h2>

<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>DOB</th>
        <th>Address</th>
        <th>Gender</th>
        <th>Father Name</th>
        <th>Mother Name</th>
        <th>School</th>
        <th>Year of Passing</th>
        <th>12th Mark</th>
        <th>Email</th>
        <th>Course</th>
        <th>Document</th>
    </tr>

    <?php
    if ($result && $result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['name']}</td>
                    <td>{$row['dob']}</td>
                    <td>{$row['address']}</td>
                    <td>{$row['gender']}</td>
                    <td>{$row['father_name']}</td>
                    <td>{$row['mother_name']}</td>
                    <td>{$row['school_name']}</td>
                    <td>{$row['year_of_passing']}</td>
                    <td>{$row['mark_12th']}</td>
                    <td>{$row['email']}</td>
                    <td>{$row['course']}</td>
                    <td><a href='uploads/{$row['document']}' class='view-link' target='_blank'>View</a></td>
                </tr>";
        }
    } else {
        echo "<tr><td colspan='13'>No applications submitted yet.</td></tr>";
    }

    $conn->close();
    ?>
</table>

</body>
</html>