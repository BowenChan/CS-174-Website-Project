<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<?php
	session_start();
	include('header.html');
	require_once("connect.php");
	include('selectdbfav.php');
	
	
	/*
	$res = mysqli_query($link, "SELECT * FROM `fun_video` ORDER BY id ASC")
	or die("This is failing");
	*/
	$organize = "";
	$video_data = array();
			
	//number of display per page
	$display = 10;
	$num_rec = null;
	$num_pages = 0;
	if(isset($_GET[$num_rec]))
	{
		$num_rec = 0;
	}
	//detemine the pages

	else($num_rec != mysqli_fetch_array(mysqli_query($link,"SELECT `video_id` FROM `". $table ."`WHERE `user_id`=" .  $_SESSION['sess_user']),MYSQLI_NUM));
		$q = mysqli_query($link,"SELECT COUNT(`video_id`) FROM `".$table ."` WHERE `user_id`=" .  $_SESSION['sess_user']);
		$row = mysqli_fetch_array($q,MYSQLI_NUM);
		
		$num_rec = $row[0];
	if($num_rec == 0)
	{
	}
	else{
		if($num_rec > $display){
			$num_pages = ceil($num_rec/$display);
		}
		else
		{
			$num_pages = 1;
		}
	if(isset($_GET['s']))
	{
		$start = $_GET['s'];
	}
	else
	{
		$start = 0;
	}
	$q =  mysqli_query($link,"SELECT * FROM `fun_video` INNER JOIN `fav_video` ON fav_video.video_id = fun_video.id");
	}
?>
	<table style="width:100%">
    	<tr>
    	<th style = "border:none"> id </th>
        <th style = "border:none"> video title </th>
        <th style = "border:none"> video length </th>
        <th style = "border:none"> Highest Resolution </th>
        <th style = "border:none"> Description </th>
        <th style = "border:none"> View Count </th>
        <th style = "border:none"> Video Type </th>
        <th style = "border:none"> Icon Image </th>
        <th style = "border:none"> Video Tags </th>
        <th style = "border:none"> Favorite </th>
        </tr>
<?php

	if($num_rec != 0)
	{
	while($row = mysqli_fetch_array($q, MYSQLI_ASSOC))
	{
		$_SESSION['prev'] = $_SERVER['REQUEST_URI'];
		echo "<tr style=text-align:center> ". 
		"<td>" . $row['id'] . "</td>" .
		"<td>" . $row['title'] . "</td>" .
		"<td>" . $row['videolength'] . " minutes</td>" .
		"<td>" . $row['highestresolution'] . "</td>" .
		"<td>" . $row['description'] . "</td>" .
		"<td> " . $row['viewcount'] . "</td>" .
		"<td>" . $row['language'] . "</td>" .
		"<td><a target = '_blank' href = " . $row['videolink'] . "><img src =" . $row['iconimage'] . " alt=picture></a></td>" .
		"<td>" . $row['tag'] . "</td>" .
		"<td><form><a href='favoriteVideo.php?id=". $row['id']. "'><button type = 'button' name = 'vidID' value = '". $row['id'] . "'> Favorite </button></a></form></td>" . 	
		"</tr>";
	}
	mysqli_free_result($q);
	mysqli_close($link);
	
	
	include('pagedisplay.php');
	
	echo '</p>'; // Close the paragraph.
	echo '</table>';
	include('pagedisplay.php');
	}
	else
	{
		echo '</table>';
		echo "<h1 style=text-align:center>" . "There is no video matching this category" . "</h1>";
	}
	
?>
</body>
</html>