
<?php include('header.html');?>
<?php include("dbconnect.php"); 
//recover the form variable values.
$title= mysql_real_escape_string(trim(strip_tags($_POST['title'])),$dbc);
$link= mysql_real_escape_string(trim(strip_tags($_POST['link'])),$dbc);
$length= $_POST['length'];
$resolution= mysql_real_escape_string(trim(strip_tags($_POST['resolution'])),$dbc);
$desc= mysql_real_escape_string(trim(strip_tags($_POST['desc'])),$dbc);
$language = mysql_real_escape_string(trim(strip_tags($_POST['language'])),$dbc);
$count= $_POST['count'];
$type = "";
if(!empty($_POST['type']))
	$type= implode(',', $_POST['type']);
$image =mysql_real_escape_string(trim(strip_tags($_POST['image'])),$dbc);
$tag = mysql_real_escape_string(trim(strip_tags($_POST['tag'])),$dbc); 

$query = "insert into fun_video "
        ." (title,videolink,videolength,highestresolution,description,language,viewcount,videotype,iconimage,tag) values "
                ."('$title', '$link', '$length', '$resolution', '$desc','$language','$count','$type','$image','$tag')"
        ;

//var_dump($query);	   
if(!empty($link) || !empty($title) || !empty($image)){
	mysqli_query($conn,$query);
	print "<h2>Thanks!!</h2>";
}
else 
	print "<h2>Your input is incomplete and has not be added!</h2>";
?>
<h2><a href="video.php">View My Video Collection!!!</a></h2>
