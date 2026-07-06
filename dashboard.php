// Fetch course seat data from DB
$query = "SELECT course_name, total_seats, filled_seats FROM courses";
$result = mysqli_query($conn, $query);
echo "<table>";
echo "<tr><th>Course</th><th>Total</th><th>Filled</th><th>Available</th></tr>";
while($row = mysqli_fetch_assoc($result)) {
  $available = $row['total_seats'] - $row['filled_seats'];
  echo "<tr><td>{$row['course_name']}</td><td>{$row['total_seats']}</td><td>{$row['filled_seats']}</td><td>$available</td></tr>";
}
echo "</table>";