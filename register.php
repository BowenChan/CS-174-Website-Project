<!doctype html>
<html>
<head>
<title>Register</title>
</head>
<body>

<p><a href="register.php">Register</a> | <a href="login.php">Login</a></p>

<h3>Registration Form</h3>
<form action="" method="POST">

Email: <input type="text" name="email"><br />
Password: <input type="password" name="pass"><br />
<input type="submit" value="Register" name="submit" />

</form>

<?php
include 'dbconnect.php';

$email=$_POST['email'];
$pass=$_POST['pass'];
$cookie_login= $_COOKIE['user'];

function passwordStr($password) // Function to check pw strength
{
	if (strlen($pass) >= 8 && preg_match('/[a-z]+[0-9]+/', $pass)) {
		return TRUE;
	}
	else return FALSE;
}

if(passwordStr($pass) && isset($_POST["submit"])) { // If everything is ok, then continue to submit.

	mysql_select_db('cs174') or die("Error: Cannot Select Database"); // Select DB

	$query=mysql_query("SELECT * FROM users WHERE email='".$email."'"); // Check for existing entry
	$numrows=mysql_num_rows($query);

	if($numrows==0)	{ // If no entries match the registrant
	$sql="INSERT INTO login(email, password) VALUES('$email', '$pass')"; // Insert account into DB.
	$result=mysql_query($sql);

	if($result) {
	echo "Account Successfully Created";
	header('location: login.php');
	} else {
	echo "Failure To Create Account, Please Try Again";
	}
	} else {
	echo "That email is already registered with us. Please try again";
	}
}

if (isset($_COOKIE['user']) // If user opts in, store user info to a cookie for 1 minute
{
	setcookie ($cookie_email, $email, time() + 60, "/");
	setcookie ($cookie_pass, $pass, time() + 60, "/")
}	
?>

</body>
</html>