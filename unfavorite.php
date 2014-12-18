<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>

<?php
include('connect.php');
include('selectdbfav.php');

function unfavoriteCheck() {
	
	if(isset($_SESSION['sess_users'])){
		
		$userID = $_SESSION['sess_users'];
		$result = mysqli_query($link, "SELECT * FROM `fav_video` WHERE `user_id`='".$userID."' AND `video_id`= row['id']");
		$numrows = mysqli_num_rows($result);
	}
	
	if($numrows == 1) {
		return true; // IT IS CURRENTLY FAVORITED -- RETURN TRUE TO SHOW UNFAVORITE BUTTON
	} else return false; // IT IS CURRENTLY NOT FAVORITED -- RETURN FALSE TO SHOW FAVORITE BUTTON
}

session_start();
ob_start();
	include('connect.php');
	include('selectdbfav.php');
	if(isset($_SESSION['sess_users'])){
		
		$userID = $_SESSION['sess_users'];
		$vidID = $_GET['id'];
		$result = mysqli_query($link, "SELECT * FROM `fav_video` WHERE `user_id`='".$userID."' AND `video_id`='".$vidID. "'");
		if(mysqli_num_rows($result) === 1)
		{
			
			$sql = "DELETE FROM fav_video(user_id,video_id) VALUES ('$userID', '$vidID')";
			$retval = mysqli_query($link, $sql);
			
		}
		header('Location: video.php');
	}
	else{
		header('Location: video.php');
	}
	header('Location:video.php');







?>
</body>
</html>