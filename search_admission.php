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

$search_result = "";
if (isset($_POST['search'])) {
    $search_value = $_POST['search_value'];

    // Search query (by name / email / course)
    $sql = "SELECT * FROM applicatio 
            WHERE name LIKE '%$search_value%' 
            OR email LIKE '%$search_value%'
            OR course LIKE '%$search_value%'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $search_result = "<table border='1' cellpadding='8' cellspacing='0'>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>DOB</th>
                                <th>Email</th>
                                <th>Course</th>
                                <th>12th Mark</th>
                                <th>School</th>
                                
                                <th>TC</th>
                                <th>Aadhaar</th>
                                <th>Marksheet</th>
                            </tr>";
        while ($row = $result->fetch_assoc()) {
            $search_result .= "<tr>
                                <td>".$row['id']."</td>
                                <td>".$row['name']."</td>
                                <td>".$row['dob']."</td>
                                <td>".$row['email']."</td>
                                <td>".$row['course']."</td>
                                <td>".$row['mark_12th']."</td>
                                <td>".$row['school_name']."</td>
                                <td><a href='uploads/".$row['marksheet']."' target='_blank'>View</a></td>
                                <td><a href='uploads/".$row['tc']."' target='_blank'>View</a></td>
                                <td><a href='uploads/".$row['aadhar']."' target='_blank'>View</a></td>
                                </tr>";
        }
        $search_result .= "</table>";
    } else {
        $search_result = "<p>No application found 🚫</p>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Search Application</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f0f8ff;
            padding: 30px;
        }
        .search-box {
            background: #fff;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0px 4px 6px #ccc;
            width: 400px;
            margin: auto;
        }
        input[type=text] {
            padding: 8px;
            width: 250px;
            border: 1px solid #aaa;
            border-radius: 8px;
        }
        input[type=submit] {
            background: green;
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 8px;
            cursor: pointer;
        }
        table {
            margin-top: 20px;
            border-collapse: collapse;
            width: 100%;
            background: white;
        }
        th, td {
            border: 1px solid #555;
            padding: 10px;
            text-align: center;
        }
        th {
            background: #0099cc;
            color: white;
        }
        a {
            text-decoration: none;
            color: blue;
            font-weight: bold;
        }
        a:hover {
            color: darkred;
        }
        img {
            object-fit: cover;
        }
    </style>
</head>
<body>

<div class="search-box">
    <h2>🔎 Search Application</h2>
    <form method="POST">
        <input type="text" name="search_value" placeholder="Enter Name / Email / Course" required>
        <input type="submit" name="search" value="Search">
    </form>
</div>

<div style="margin-top:20px;">
    <?php echo $search_result; ?>
</div>

</body>
</html>