<?php
// Sample PHP logic for seat availability
$course = 'B.Com';
$total = 50;
$filled = 43;
$available = $total - $filled;

echo "<table border='1'>
<tr><th>Course</th><th>Total</th><th>Filled</th><th>Available</th></tr>";
echo "<tr><td>$course</td><td>$total</td><td>$filled</td><td>$available</td></tr>";
echo "</table>";
?>