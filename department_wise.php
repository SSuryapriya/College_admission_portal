<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "college_portal";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Department names
$departments = [
    "B.Sc Computer Science",
    "B.Com",
    "B.A English",
    "B.A History",
    "BBA",
    "BCA",
    "B.Sc Maths",
    "B.Sc Physics",
    "B.Sc Chemistry"
];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Department Wise Admissions</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #cce6ff; /* light blue background */
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
            width: 80%;
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
            font-size: 16px;
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
    </style>
</head>
<body>
    <h2>Department-wise Admission Count</h2>
    <table>
        <tr>
            <th>Departments</th>
            <th>Total Admissions</th>
            <th>Action</th>
        </tr>
        <?php
        foreach ($departments as $dept) {
            $sql = "SELECT COUNT(*) AS total FROM applicatio WHERE course = '$dept'";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            $total = $row['total'];

            echo "<tr>
                    <td>$dept</td>
                    <td>$total</td>
                    <td><a href='view.php?course=" . urlencode($dept) . "'>View</a></td>
                  </tr>";
        }
        ?>
    </table>
</body>
</html>
<?php
$conn->close();
?>