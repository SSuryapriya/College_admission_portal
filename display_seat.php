$where = "WHERE 1=1";
if (!empty($_GET['search'])) {
  $name = $_GET['search'];
  $where .= " AND name LIKE '%$name%'";
}
if (!empty($_GET['course'])) {
  $course = $_GET['course'];
  $where .= " AND course='$course