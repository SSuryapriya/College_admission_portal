<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "college_portal";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); }

// Join admission_form with payments
$sql = "SELECT a.name,  p.amount, p.payment_method, p.transaction_id 
        FROM payments a 
        INNER JOIN payments p ON a.id = p.student_id";
$result = $conn->query($sql);

// Total Payment
$total_sql = "SELECT SUM(amount) as total_amount FROM payments";
$total_result = $conn->query($total_sql);
$total_payment = $total_result->fetch_assoc()['total_amount'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Student Payment Report</title>
    <style>
        body { font-family: Arial, sans-serif; background:#f9fcff; padding:30px; }
        h2 { text-align:center; color:#003366; }
        table { border-collapse:collapse; width:90%; margin:auto; background:white; box-shadow:0px 4px 8px #aaa; }
        th, td { border:1px solid #555; padding:10px; text-align:center; }
        th { background:#0055aa; color:white; }
        tr:nth-child(even){ background:#f2f2f2; }
        .box { margin:20px auto; background:white; padding:15px; width:400px;
               border-radius:10px; box-shadow:0px 4px 8px #aaa; text-align:center; font-weight:bold; color:#0055aa; }
    </style>
</head>
<body>

<h2>💰 Student-wise Payment Report</h2>

<table>
    <tr>
        <th>Student Name</th>
        <th>Course</th>
        <th>Amount</th>
        <th>Payment Method</th>
        <th>Transaction ID</th>
    </tr>
    <?php while($row=$result->fetch_assoc()){ ?>
    <tr>
        <td><?php echo $row['name']; ?></td>
        <td><?php echo $row['course']; ?></td>
        <td>₹<?php echo $row['amount']; ?></td>
        <td><?php echo $row['payment_method']; ?></td>
        <td><?php echo $row['transaction_id']; ?></td>
    </tr>
    <?php } ?>
</table>

<div class="box">
    ✅ Total Payment Collected: ₹<?php echo $total_payment ? $total_payment : 0; ?>
</div>

</body>
</html>