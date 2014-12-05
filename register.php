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
Please use a password with at least 1 number and 1 character. Must also be 8 or more characters but 25 or less.
<p><input type="submit" value="Register" name="submit" /></p>

</form>

<?php
ob_start();
include 'dbconnect.php';

$email=$_POST['email'];
$pass=$_POST['pass'];


function passwordStr($password) // Function to check pw strength
{
	if (!(strlen($password) < 8) && preg_match('/[a-z]+[0-9]+/', $password)) {
		return TRUE;
	}
	else return FALSE;
}

if(passwordStr($pass) && isset($_POST["submit"])) { // If everything is ok, then continue to submit.

	mysqli_select_db($dbc, $db) or die("Error: Cannot Select Database"); // Select DB

	$query=mysqli_query($dbc, "SELECT * FROM users WHERE email='".$email."'"); // Check for existing entry
	$numrows=mysqli_num_rows($query);

	if($numrows==0)	{ // If no entries match the registrant
	$sql="INSERT INTO users(email, password) VALUES('$email', '$pass')"; // Insert account into DB.
	$result=mysqli_query($dbc, $sql);

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

?>

</body>
</html>