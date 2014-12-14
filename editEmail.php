<?php
include "header.php"; 
include "dbconnect.php"; 
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Edit Email</title>
</head>

<body>

<h3>Edit Your Email Address</h3>
<form action="" method="POST">

Current Email: <input type="text" name="curEmail"><br />
New Email: <input type="text" name="newEmail"><br />
<p><input type="submit" value="Register" name="submit" /></p>

</form>

<?php
if (isset($_POST["submit"])) {
$curEmail = (isset($_POST['curEmail']) ? $_POST['curEmail'] : null);
$newEmail = (isset($_POST['newEmail']) ? $_POST['newEmail'] : null);

if($curEmail == $newEmail) {
	echo "This email is the same as your current one, please enter a new email.";
} else {
	mysqli_select_db($dbc, $db) or die("Error: Cannot Select Database"); // Select DB
	$query=mysqli_query($dbc, "SELECT * FROM users WHERE email='".$curEmail."'");
	
	if(!$query) {
		echo "Could not properly query, please contact the webmaster.";
		exit;
	}
	else if(mysqli_num_rows($query) == 0) {
		echo "Could not find your email. Please make sure it is correct and try again";
		exit;
	}
	while($row = mysqli_fetch_assoc($query)) {
		$row['email'] = $newEmail;
		echo "<p>Email successfully changed</p>";
	}
}
}
?>


</body>
</html>