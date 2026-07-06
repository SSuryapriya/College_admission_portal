<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "college_portal"; // unga database name use pannunga

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// ✅ Add Course
if (isset($_POST['add_course'])) {
    $course_name = $_POST['course_name'];
    $seats = $_POST['seats'];
    $duration = $_POST['duration'];

    $sql = "INSERT INTO courses (course_name, seats, duration) VALUES ('$course_name', '$seats', '$duration')";
    $conn->query($sql);
}

// ✅ Delete Course
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $conn->query("DELETE FROM courses WHERE id=$id");
}

// ✅ Update Course
if (isset($_POST['update_course'])) {
    $id = $_POST['id'];
    $course_name = $_POST['course_name'];
    $seats = $_POST['seats'];
    $duration = $_POST['duration'];

    $conn->query("UPDATE courses SET course_name='$course_name', seats='$seats', duration='$duration' WHERE id=$id");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Course Management</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            padding: 20px;
        }
        h2 { text-align: center; }
        form {
            background: white;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 8px;
            box-shadow: 0px 2px 5px rgba(0,0,0,0.2);
        }
        input[type="text"], input[type="number"] {
            width: 95%;
            padding: 8px;
            margin: 5px 0;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        button {
            background: #28a745;
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover { background: #218838; }
        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
        }
        table, th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: center;
        }
        a { text-decoration: none; padding: 5px 10px; border-radius: 5px; }
        .edit { background: #007bff; color: white; }
        .delete { background: #dc3545; color: white; }
    </style>
</head>
<body>

<h2>Course Management</h2>

<!-- ✅ Add Course Form -->
<form method="POST">
    <input type="text" name="course_name" placeholder="Course Name" required>
    <input type="number" name="seats" placeholder="Seats" required>
    <input type="text" name="duration" placeholder="Duration (e.g. 3 Years)" required>
    <button type="submit" name="add_course">Add Course</button>
</form>

<?php
// ✅ Edit Form show panna
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $result = $conn->query("SELECT * FROM courses WHERE id=$id");
    $row = $result->fetch_assoc();
?>
    <form method="POST">
        <input type="hidden" name="id" value="<?= $row['id']; ?>">
        <input type="text" name="course_name" value="<?= $row['course_name']; ?>" required>
        <input type="number" name="seats" value="<?= $row['seats']; ?>" required>
        <input type="text" name="duration" value="<?= $row['duration']; ?>" required>
        <button type="submit" name="update_course">Update Course</button>
    </form>
<?php } ?>

<!-- ✅ Course List Table -->
<table>
    <tr>
        <th>ID</th>
        <th>Course Name</th>
        <th>Seats</th>
        <th>Duration</th>
        <th>Action</th>
    </tr>
    <?php
    $result = $conn->query("SELECT * FROM courses");
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>".$row['id']."</td>
                <td>".$row['course_name']."</td>
                <td>".$row['seats']."</td>
                <td>".$row['duration']."</td>
                <td>
                    <a class='edit' href='?edit=".$row['id']."'>Edit</a>
                    <a class='delete' href='?delete=".$row['id']."' onclick='return confirm(\"Are you sure?\");'>Delete</a>
                </td>
              </tr>";
    }
    ?>
</table>

</body>
</html>