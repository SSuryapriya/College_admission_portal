<?php
$conn = new mysqli("localhost", "root", "", "college_portal");
$result = $conn->query("SELECT * FROM payments ORDER BY created_at DESC");
?>

<h2 style="text-align:center;">💰 Payment Records</h2>
<table border="1" cellpadding="10" cellspacing="0" style="margin:auto;">
<tr>
    <th>ID</th>
    <th>Student</th>
    <th>Course</th>
    <th>Amount</th>
    <th>Method</th>
    <th>Transaction ID</th>
    <th>Date</th>
</tr>

<?php while($row = $result->fetch_assoc()) { ?>
<tr>
    <td><?php echo $row['id']; ?></td>
    <td><?php echo $row['student_name']; ?></td>
    <td><?php echo $row['course']; ?></td>
    <td>₹<?php echo $row['amount']; ?></td>
    <td><?php echo $row['payment_method']; ?></td>
    <td><?php echo $row['transaction_id']; ?></td>
    <td><?php echo $row['created_at']; ?></td>
</tr>
<?php } ?>
</table>