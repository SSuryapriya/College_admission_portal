<?php
// admin_dashboard.php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "college_portal";

$conn = new mysqli($servername,$username,$password,$dbname);
if ($conn->connect_error) die("Connection failed: ".$conn->connect_error);

// fetch all apps, latest first
$res = $conn->query("SELECT * FROM applicatio ORDER BY created_at DESC");
?>
<!doctype html>
<html>
<head><meta charset="utf-8"><title>Admin - Applications</title>
<link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="container">
  <div class="topbar">
    <h2>Admin Dashboard</h2>
    <div class="small">Review and change application status</div>
  </div>

  <table class="table">
    <thead>
      <tr>
        <th>ID</th><th>Name</th><th>Email</th><th>Course</th><th>Submitted</th><th>Status</th><th>Documents</th><th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php while ($row = $res->fetch_assoc()): ?>
      <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo htmlspecialchars($row['applicant_name']); ?></td>
        <td><?php echo htmlspecialchars($row['email']); ?></td>
        <td><?php echo htmlspecialchars($row['course_applied']); ?></td>
        <td><?php echo $row['created_at']; ?></td>
        <td><span class="status-pill status-<?php echo $row['status']; ?>"><?php echo $row['status']; ?></span></td>
        <td>
          <?php if ($row['document_marksheet']): ?><a class="file-link" href="<?php echo $row['document_marksheet']; ?>" target="_blank">Marksheet</a><?php endif; ?>
          <?php if ($row['document_tc']): echo " | <a class='file-link' href='".$row['document_tc']."' target='_blank'>TC</a>"; endif; ?>
          <?php if ($row['document_aadhar']): echo " | <a class='file-link' href='".$row['document_aadhar']."' target='_blank'>Aadhar</a>"; endif; ?>
        </td>
        <td class="actions">
          <!-- Change status actions -->
          <form method="post" action="update_status.php" style="display:inline;">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <input type="hidden" name="status" value="Pending">
            <button class="btn btn-warning" type="submit">Pending</button>
          </form>

          <form method="post" action="update_status.php" style="display:inline;">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <input type="hidden" name="status" value="Accepted">
            <button class="btn btn-success" type="submit">Accept</button>
          </form>

          <form method="post" action="update_status.php" style="display:inline;">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <input type="hidden" name="status" value="Rejected">
            <button class="btn btn-danger" type="submit">Reject</button>
          </form>

          <a class="btn" href="user_view.php?id=<?php echo $row['id']; ?>">View</a>
        </td>
      </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
</div>
</body>
</html>