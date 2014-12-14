
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Welcome</title>
</head>
<?php include('header.php'); ?>
<body>
<?php 

ob_start();

print '<h1>Welcome to Group 3\'s Video Site!</h1>';

ob_end_flush()
?>
<div>
<?php
if(isset($_SESSION['sess_users']))
{
	echo "<p>Click <a href=logout.php>here</a> to logout.</p>";
}
?>
</div>
<?php
//include('footer.html');
?>
</body>
</html>