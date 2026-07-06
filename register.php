<!DOCTYPE html>
<html>
<head>
<title>User Registration</title>
<style>
html,body{
height:100%;
margin:0;
padding:0;
}
body{
display:flex;
justify-content:center;
align-items:center;
font-family:Arial,sans-serif;
background:linear-gradient(to right,#0ff99,#00cc66);
}
.form-box{
background:white;
padding:30px;
border-radius:10px;
width:400px;
box-shadow:0 8px 16px rgba(0,0,0,0.2);
}
input{
width:100%;
margin:10px 0;
padding:12px;
border-radius:6px;
border:1px solid #ccc;
}
button{
padding:10px 20px;
background:#00cc66;
color:white;
border:none;
border-radius:6px;
width:100%;
}
h2{
text-align:center;
margin-bottom:20px;
}
a{
display:block;
text-align:center;margin-top:10px;
color:#00cc66;
text-decoration:none;
}
</style>
</head>
<body>
<form action="register_process.php" method="POST">
<div class="form-box">
<h2>User Registration</h2>
<input type="text" name="username" placeholder="Username" required>
<input type="email" name="email" placeholder="Email" required>
<input type="text" name="mobile" placeholder="Mobile" required>
<input type="password" name="password" placeholder="password" required>
<button type="submit">Register</button>
<a href="login.php">Login</a>
</div>
</form>
</body>
</html>


