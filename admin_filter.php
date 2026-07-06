<?php
$conn = new mysqli("localhost", "root", "", "college_portal");

// Handle status update
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $status = $_POST['status'];
    $conn->query("UPDATE admissions SET status='$status' WHERE id=$id");
}

// Filters
$filter_course = $_GET['course'] ?? '';
$filter_status = $_GET['status'] ?? '';

$where = "1";
if ($filter_course != '') {
    $where .= " AND course = '$filter_course'";
}
if ($filter_status != '') {
    $where .= " AND status = '$filter_status'";
}

$result = $conn->query("SELECT * FROM admissions WHERE $where");
?><!DOCTYPE html><html>
<head>
    <title>Admin Dashboard</title>
    <style>
        table { width: 95%; margin: auto; border-collapse: collapse; }
        th, td { padding: 10px; border: 1px solid #ccc; text-align: center; }
        .status-pending { color: yellow; font-weight: bold; }
        .status-accepted { color: green; font-weight: bold; }
        .status-rejected { color: red; font-weight: bold; }
        select, button { padding: 5px; }
        form.filter { text-align: center; margin: 20px; }
    </style>
</head>
<body>
    <h2 style="text-align:center;">Admin - Admission Applications</h2><form class="filter" method="GET">
    <label>Filter by Course:</label>
    <select name="course">
        <option value="">All</option>
        <option value="B.Sc Computer Science" <?= $filter_course == 'B.Sc Computer Science' ? 'selected' : '' ?>>B.Sc Computer Science</option>
        <option value="B.Sc Physics" <?= $filter_course == 'B.Sc Physics' ? 'selected' : '' ?>>B.Sc Physics</option>
        <option value="B.Sc Maths" <?= $filter_course == 'B.Sc Maths' ? 'selected' : '' ?>>B.Sc Maths</option>
        <option value="B.Sc Chemistry" <?= $filter_course == 'B.Sc Chemistry' ? 'selected' : '' ?>>B.Sc Chemistry</option>
        <option value="B.A English" <?= $filter_course == 'B.A English' ? 'selected' : '' ?>>B.A English</option>
        <option value="B.A History" <?= $filter_course == 'B.A History' ? 'selected' : '' ?>>B.A History</option>
        <option value="BCA" <?= $filter_course == 'BCA' ? 'selected' : '' ?>>BCA</option>
        <option value="BBA" <?= $filter_course == 'BBA' ? 'selected' : '' ?>>BBA</option>
    </select>

    <label>Filter by Status:</label>
    <select name="status">
        <option value="">All</option>
        <option value="Pending" <?= $filter_status == 'Pending' ? 'selected' : '' ?>>Pending</option>
        <option value="Accepted" <?= $filter_status == 'Accepted' ? 'selected' : '' ?>>Accepted</option>
        <option value="Rejected" <?= $filter_status == 'Rejected' ? 'selected' : '' ?>>Rejected</option>
    </select>

    <button type="submit">Apply Filters</button>
    <a href="adminlogin.php" style="margin-left: 10px;">Reset</a>
</form>

<table>
    <tr>
        <th>ID</th><th>Name</th><th>Email</th><th>DOB</th><th>Gender</th><th>Course</th>
        <th>Address</th><th>School</th><th>Year</th><th>12th %</th><th>Medium</th>
        <th>Marksheet</th><th>TC</th><th>Aadhar</th><th>Status</th><th>Action</th>
    </tr>
    <?php while ($row = $result->fetch_assoc()): ?>
    <tr>
        <form method="POST">
        <td><?= $row['id'] ?></td>
        <td><?= $row['name'] ?></td>
        <td><?= $row['email'] ?></td>
        <td><?= $row['dob'] ?></td>
        <td><?= $row['gender'] ?></td>
        <td><?= $row['course'] ?></td>
        <td><?= $row['address'] ?></td>
        <td><?= $row['school_name'] ?></td>
        <td><?= $row['year_of_passing'] ?></td>
        <td><?= $row['twelfth_mark'] ?>%</td>
        <td><?= $row['medium'] ?></td>
        <td><a href="<?= $row['marksheet'] ?>" target="_blank">View</a></td>
        <td><a href="<?= $row['tc'] ?>" target="_blank">View</a></td>
        <td><a href="<?= $row['aadhar'] ?>" target="_blank">View</a></td>
        <td class="status-<?= strtolower($row['status']) ?>"><?= $row['status'] ?></td>
        <td>
            <input type="hidden" name="id" value="<?= $row['id'] ?>">
            <select name="status">
                <option value="Pending" <?= $row['status'] == 'Pending' ? 'selected' : '' ?>>Pending</option>
                <option value="Accepted" <?= $row['status'] == 'Accepted' ? 'selected' : '' ?>>Accepted</option>
                <option value="Rejected" <?= $row['status'] == 'Rejected' ? 'selected' : '' ?>>Rejected</option>
            </select>
            <button type="submit" name="update">Update</button>
        </td>
        </form>
    </tr>
    <?php endwhile; ?>
</table>

</body>
</html>