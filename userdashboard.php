<?php 
require 'db.php'; 
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>User Dashboard</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
  body {
    margin:0;
    font-family: Segoe UI, Arial, sans-serif;
    background:#f3f4f6;
    color:#111;
  }
  .layout {
    display:grid;
    grid-template-columns:240px 1fr;
    min-height:100vh;
  }
  /* Sidebar */
  .sidebar {
    background:#1e293b;
    color:#fff;
    padding:24px 16px;
    display:flex;
    flex-direction:column;
  }
  .brand {
    font-size:22px;
    font-weight:700;
    margin-bottom:30px;
    text-align:center;
  }
  .menu a {
    display:block;
    padding:12px 16px;
    margin:6px 0;
    border-radius:12px;
    text-decoration:none;
    color:#fff;
    transition:.2s;
  }
  .menu a:hover,
  .menu a.active {
    background:#3b82f6;
  }
  /* Topbar */
  .topbar {
    display:flex;
    justify-content:space-between;
    align-items:center;
    padding:16px 24px;
    background:#fff;
    box-shadow:0 2px 6px rgba(0,0,0,.08);
  }
  .user {
    background:#e2e8f0;
    padding:6px 12px;
    border-radius:999px;
    font-size:14px;
  }
  .btn {
    background:#3b82f6;
    color:#fff;
    padding:8px 14px;
    border-radius:8px;
    text-decoration:none;
    font-size:14px;
    transition:.2s;
  }
  .btn:hover {
    background:#2563eb;
  }
  /* Content */
  .content {
    padding:24px;
  }
  .card {
    background:#fff;
    padding:20px;
    border-radius:14px;
    box-shadow:0 4px 10px rgba(0,0,0,.05);
    margin-bottom:20px;
  }
  h2,h3 {
    margin-top:0;
  }
  .muted {
    color:#6b7280;
  }
</style>
</head>
<body>
<div class="layout">
  <!-- Sidebar -->
  <aside class="sidebar">
    <div class="brand">🎓 Student Panel</div>
    <nav class="menu">
      <a href="?page=home"     class="<?= ($_GET['page']??'home')==='home'?'active':'' ?>">🏠 Dashboard</a>
      <a href="?page=status"   class="<?= ($_GET['page']??'')==='status'?'active':'' ?>">📑 Application Status</a>
      <a href="?page=payment"  class="<?= ($_GET['page']??'')==='payment'?'active':'' ?>">💳 Payment Form</a>
      <a href="?page=payments" class="<?= ($_GET['page']??'')==='payments'?'active':'' ?>">📂 My Payments</a>
    </nav>
     </aside>

  <!-- Main -->
  <main>
    <div class="topbar">
      <div><strong>Dashboard</strong> — Welcome, <?= htmlspecialchars($user) ?></div>
      <div class="user"><?= htmlspecialchars($user) ?></div>
      <a class="btn" href="logout.php">Logout</a>
    </div>

    <div class="content">
      <?php
      $page = $_GET['page'] ?? 'home';
      switch ($page) {
        case 'status':   include 'status.php';   break;
        case 'payment':  include 'paymentform.php';        break;
        case 'payments': include 'payment_list.php';        break;
        default: ?>
          <div class="card">
            <h2>Apply for your course</h2>
            <p class="muted">Start your application, upload documents and submit for admission.</p>
            <a class="btn" href="admissionform.php">Apply Now</a>
          </div>
      <?php } ?>
    </div>
  </main>
</div>
</body>
</html>