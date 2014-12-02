<!doctype html>
<html>
<head>
<title>Login</title>
</head>
<body>

<h3>Login Form</h3>
<form action="" method ="POST">
Email: <input type="text" name="email"><br />
Password: <input type="password" name="pass"><br />
<input type="submit" value="Login" name="submit"><br />
<pre><input type="checkbox" name="store_login" value="user">Remember Me<br></pre>
</form>

<?php
include 'dbconnect.php';

if (isset($_POST["submit"])) {
	$email=$_POST['email'];
	$pass=$_POST['pass'];

	mysql_select_db('cs174') or die("Cannot Select DB");

	$query=mysql_query("SELECT * FROM users WHERE email='".$email."' AND password='".$pass."'");
	$numrows=mysql_num_rows($query);

	if($numrows!=0) {
		while($row=mysql_fetch_assoc($query)) { // When you found the row w/ the login info
			$dbemail=$row['email'];
			$dbpassword=$row['password'];
		}
		if($email == $dbemail && $password == $dbpassword) {
			session_start();
			$_SESSION['sess_users']=$user;
			/* REDIRECT USER TO FRONT PAGE AFTER LOGIN */
			header('location: index.html');
		} else {
			echo "Invalid Username or Password, Please Try Again";
		}
	}
}
?>
</body>
</html>