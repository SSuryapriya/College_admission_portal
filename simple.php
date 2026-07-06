$mark = $_POST['mark'];
$stream = $_POST['stream'];

$recommend = [];

if ($stream == "Commerce") {
    if ($mark >= 90) {
        $recommend = ["B.Com", "BBA", "BCA"];
    } elseif ($mark >= 75) {
        $recommend = ["BBA", "B.A Economics"];
    } else {
        $recommend = ["B.A Tamil", "B.A English"];
    }
}
elseif ($stream == "Science") {
    if ($mark >= 90) {
        $recommend = ["B.Sc CS", "B.Sc Maths", "BCA"];
    } elseif ($mark >= 75) {
        $recommend = ["B.Sc Physics", "B.Sc Chemistry"];
    } else {
        $recommend = ["B.A English", "B.Sc General"];
    }
}