<?php
session_start();

$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "college_portal";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) { 
    die("Connection failed: " . $conn->connect_error); 
}

// Update status (when admin selects dropdown and submit)
if (isset($_POST['update_status'])) {
    $id     = $_POST['id'];
    $status = $_POST['status'];

    // Validate ID and status
    if (!is_numeric($id)) die("Invalid ID");
    $allowed = ["Pending","Selected","Rejected"];
    if (!in_array($status, $allowed)) die("Invalid status value");

    $stmt = $conn->prepare("UPDATE applicatio SET status=? WHERE id=?");
    $stmt->bind_param("si", $status, $id);
    $stmt->execute();
    $stmt->close();

    // Reload page to show updated status
    header("Location: ".$_SERVER['PHP_SELF']);
    exit;
}

// Fetch applications
$result = $conn->query("SELECT * FROM applicatio ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Admin - Applications</title>
<style>
body { font-family: Arial; background:#f4f6f9; padding:20px; }
h2 { text-align:center; margin-bottom:20px; }
table { width:100%; border-collapse:collapse; background:#fff; }
th, td { padding:10px; border:1px solid #ddd; text-align:center; }
th { background:#007bff; color:#fff; }
tr:nth-child(even) { background:#f9f9f9; }
a.view-btn { color:#007bff; text-decoration:none; }
a.view-btn:hover { text-decoration:underline; }
select { padding:5px; }
button { padding:6px 12px; background:#28a745; border:none; color:#fff; border-radius:4px; cursor:pointer; }
button:hover { background:#218838; }
</style>
</head>
<body>
<h2>Student Applications</h2>
<table>
<tr>
  <th>ID</th>
  <th>Name</th>
  <th>Email</th>
  <th>Applied On</th>
  <th>Status</th>
  <th>View</th>
  <th>Update</th>
</tr>
<?php while($row = $result->fetch_assoc()): ?>
<tr>
  <td><?php echo $row['app_id']; ?></td>
  <td><?php echo $row['name']; ?></td>
  <td><?php echo $row['email']; ?></td>
  <td><?php echo $row['applied_on']; ?></td>
  <td><?php echo $row['status']; ?></td>
  <td><a class="view-btn" href="view_applications.php?id=<?php echo $row['id']; ?>">View</a></td>
  <td>
    <form method="post" style="margin:0;">
      <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
      <select name="status">
        <option value="Pending"  <?php if($row['status']=="Pending") echo "selected"; ?>>Pending</option>
        <option value="Selected" <?php if($row['status']=="Selected") echo "selected"; ?>>Selected</option>
        <option value="Rejected" <?php if($row['status']=="Rejected") echo "selected"; ?>>Rejected</option>
      </select>
      <button type="submit" name="update_status">Update</button>
    </form>
  </td>
</tr>
<?php endwhile; ?>
</table>
</body>
</html>
<?php $conn->close(); ?>