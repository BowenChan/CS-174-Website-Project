<?php
session_start();
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Welcome</title>
</head>

<body>
<?php 
//define('TITLE', 'welcome');
//include ('header.html');

print '<h1>Welcome to my site</h1>';
//print '<p>Hello, ' . $_SESSION['email'] . '!</p>';
?>
<p><a href="enterData.php">Add new video!</a></p>

<p><a href="viewData.php">Browse my video collection!</a></p>
<div>
<p>Click <a href="logout.php">here</a> to logout.</p>
</div>
<?php
//include('footer.html');
?>
</body>
</html>