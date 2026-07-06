<!DOCTYPE html>
<html>
<head>
<title>Admin Dashboard </title>
<style>
body{
font-family:'Segoe UI',sans-serif;
background-color:#c471ed;
margin:0;
padding:0;
}
.header{
background-color:#8e44ad;
color:white;
padding:20px;
text-align:center;
}
dashboard {
display:flex;
flex-wrap:wrap;
justify-content:center;
padding:30px;
text-align:center;
}
.card{
background-color:#ffffff;
border-radius:10px;
box-shadow:0 5px 10px rgba(0,0,0,0.1);
margin:15px;
padding:30px 20px;
width:260px;
transistion:transorm 0.9s;
}
.card:hover{
transform:scale(1.50);
}
.card:h3{
margin-bottm:20px;
color:#003366;
}
.card a{
display:inline block;
padding:10px 20px;
background-color:#f2f2f2;
color:bule;
border-radius:6px;
text-decoration:none;
}
.card a:hover{
background-color:#0059b3;
}
</style>
</head>
<body>
<div class="header">
<h1>Welcome to Admin Dashboard</h1>
<p>College Admission Portal</p>

<div class="card">
<a href="course.php">Manage Course</a>
</div>
<div class="card">
<a href="edit.php">Filter Application</a>
</div>
<div class="card">
<a href="meritlist.php">Merit List</a>
</div>
<div class="card">
<a href="admin_report.php">Payemnt Details</a>
</div>
<div class="card">
<a href="department_wise.php">Report</a>
</div>
<div class="card">
<a href="logoutt.php">Logout</a>
</div>
</div>
</body>
</html>
