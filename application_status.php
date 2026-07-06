<?php
// fetch latest application for this user
$stmt = $conn->prepare("SELECT id, course, status, remarks, submitted_at FROM applications WHERE user_id=? ORDER BY id DESC LIMIT 1");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$app = $stmt->get_result()->fetch_assoc();
?>
<div class="card">
  <h3>Application Status</h3>
  <?php if(!$app): ?>
    <p class="muted">No application found. Start your application.</p>
    <a class="btn" href="apply.php">Create Application</a>
  <?php else: ?>
    <table>
      <tr><th>Application ID</th><td>#<?= (int)$app['id'] ?></td></tr>
      <tr><th>Course</th><td><?= htmlspecialchars($app['course']) ?></td></tr>
      <tr><th>Status</th><td><strong><?= htmlspecialchars($app['status']) ?></strong></td></tr>
      <tr><th>Submitted</th><td><?= htmlspecialchars($app['submitted_at']) ?></td></tr>
      <tr><th>Remarks</th><td><?= htmlspecialchars($app['remarks'] ?? '-') ?></td></tr>
    </table>
  <?php endif; ?>
</div>