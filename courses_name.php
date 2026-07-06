<?php
include 'db.php';

if (isset($_POST['add_course'])) {
    $course_name = $_POST['course_name'];
    $stmt = $conn->prepare("INSERT INTO courses (course_name) VALUES (?)");
    $stmt->bind_param("s", $course_name);
    $stmt->execute();
    $stmt->close();
} 

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $stmt = $conn->prepare("DELETE FROM courses WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
}

$result = $conn->query("SELECT * FROM courses");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Course Management</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f4f4; }
        table { border-collapse: collapse; width: 60%; margin: 20px auto; background: white; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: center; }
        th { background: skyblue; }
        form { text-align: center; margin-top: 20px; }
        input[type=text] { padding: 8px; width: 250px; }
        input[type=submit] { padding: 8px 15px; background: blue; color: white; border: none; cursor: pointer; }
        a { color: red; text-decoration: none; }
    </style>
</head>
<body>

<h2 style="text-align:center;">Manage Courses</h2>

<form method="POST">
    <input type="text" name="course_name" placeholder="Enter Course Name" required>
    <input type="submit" name="add_course" value="Add Course">
</form>

<table>
    <tr>
        <th>ID</th>
        <th>Course Name</th>
        <th>Action</th>
    </tr>
    <?php while ($row = $result->fetch_assoc()) { ?>
    <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['course_name']; ?></td>
        <td>
            <a href="?delete=<?php echo $row['id']; ?>" onclick="return confirm('Delete this course?')">Delete</a>
        </td>
    </tr>
    <?php } ?>
</table>

</body>
</html>