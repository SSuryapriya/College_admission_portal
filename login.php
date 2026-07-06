<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>User login</title>
<style>
body{
font-family:Arial,sans-serif;
background:#eaeaea;
display:flex;
justify-content:center;
align-items:center;
height:100hv;
}
.login-box{
background:white;
padding:30px;
border-radius:10px;
box-shadow:0px 0px 10px #aaa;
width:300px;
}
.login-box h2{
text-align:center;
margin-bottom:20px;
}
.login-box input{
width:100%;
padding:10px;
border-radius:5px;
border:1px solid #ccc;
}
.login-box button{
width:100%;
padding:10px;
background:#077bff;
color:white;
border:none;
border-radius:5px;
font-weight:bold;
}
.error{
color:red;
text-align:center;
}
</style>
</head>
<body>
<f
<form class="login-box" >
<form method="POST" action="login_process.php">
<h2>User Login</h2>
<input type="text" name="username" placeholder="Username" required/>
<input type="password" name="password" placeholder="Password" required/>
<button type="submit">Login</button>
<div class="forgot">
<a href="#">Forgot password?</a></div>
<br><a href="register.php">New User</a>
</form>
</body>
</html>