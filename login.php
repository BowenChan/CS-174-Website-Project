<?php
include 'dbconnect.php';
session_start();
ob_start();
if (isset($_COOKIE['user'])) // If user opts in, store user info to a cookie for 1 minute
{
	$cookie_email= "User";
	$cookie_pass= "Password";
	$email=$_POST['email'];
	$pass=$_POST['pass'];

	setcookie ($cookie_email, $email, time() + 60, "/");
	setcookie ($cookie_pass, $pass, time() + 60, "/");
}

if (isset($_POST["submit"])) {
	$email=$_POST['email'];
	$pass=$_POST['pass'];

	mysqli_select_db($dbc, $db) or die("Cannot Select DB");

	$query=mysqli_query($dbc, "SELECT * FROM users WHERE email='".$email."' AND password='".$pass."'");
	$numrows=mysqli_num_rows($query);

	if($numrows!=0) {
		while($row=mysqli_fetch_assoc($query)) { // When you found the row w/ the login info//
			$dbemail=$row['email'];
			$dbpassword=$row['password'];
		}

		if($email == $dbemail && $pass == $dbpassword) {
			$_SESSION['sess_users']=$dbemail;
			echo "You are now logged in";
			if (isset($_COOKIE['PHPSESSID']))
       			 session_id($_COOKIE['PHPSESSID']); 
			/* REDIRECT USER TO FRONT PAGE AFTER LOGIN */
			ob_start();
			header("location: welcome.php",true);
			ob_flush();
			
			// header('location: index.html'); Doesn't work at the moment.
		} else {
			header("location: login.php",true);
			echo "Invalid Username or Password, Please Try Again";
		}
	}
}
?>
<!doctype html>
<html>
<head>
<title>Login</title>
</head>
<body>

<h3>Login Form</h3>
<form action="login.php" method ="POST">
Email: <input type="text" name="email"><br />
Password: <input type="password" name="pass"><br />
<input type="submit" value="Login" name="submit"><br />
<pre><input type="checkbox" name="store_login" value="user">Remember Me<br></pre>
</form>


</body>
</html>