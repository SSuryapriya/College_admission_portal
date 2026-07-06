<?php
include 'db_connect.php';

$where = "WHERE 1=1";

if (!empty($_GET['search'])) {
    $search = mysqli_real_escape_string($conn, $_GET['search']);
    $where .= " AND name LIKE '%$search%'";
}

$sql = "SELECT * FROM students $where";
$result = mysqli_query($conn, $sql);
?>

<form method="get" action="search_students.php">
    <input type="text" name="search" placeholder="Search by name">
    <button type="submit">Search</button>
</form>

<table border="1">
<tr>
    <th>Name</th>
    <th>Mark</th>
    <th>Course</th>
    <th>Status</th>
</tr>
<?php while ($row = mysqli_fetch_assoc($result)) { ?>
<tr>
    <td><?= $row['name'] ?></td>
    <td><?= $row['mark'] ?>%</td>
    <td><?= $row['course'] ?></td>
    <td><?= $row['status'] ?></td>
</tr>
<?php } ?>
</table>