<script type = 'text/javascript'>
	function changeSession(){
		xmlhttp = new XMLHttpRequest();
		xmlhttp.open("GET","modifysession.php");
		xmlhttp.send();
	}
</script>

<!doctype html>
<html><head>
<meta charset="utf-8">
<link rel = "stylesheet" href = "css/headerstyle.css">
<title>Header</title>
</head>

<body>
<?php session_start(); ?>

<nav width="100%" height="56" >
  <ul>
   	<li><a href = "welcome.php">Home</a></li>
    <?php
	
	// FUNCTION TO CHECK ADMIN
	function adminChecker() {
	$adminEmail = $_COOKIE['User'];
	
	if($adminEmail == 'admin@group3.cs174') {
		return true;
	}
	else return false;	
	}
	// FUNCTION TO CHECK ADMIN
	
	if(isset($_SESSION['sess_users'])) {
		echo "<li><a href = 'enterData.php'>Add A Video</a></li>";
		if(adminChecker()) { // IF ADMIN - ECHO THE LINK TO MODIFY , ELSE ECHO NEED ADMIN PAGE.
			echo "<li><a href = 'modify.php'>Modify A Video</a></li>";
		} else echo "<li><a href = 'needadmin.html'>Modify A Video</a></li>";
	}
	?>
    <li><a href = "#"  onClick="changeSession()">Category</a>
    	<ul>		
               	<li><a href = "video.php?sort=lgnth"> Length </a>
                	<ul>
                    	<li><a href = "video.php?sort=lgnth&constr=10"> 0-10 minutes </a></li>
                        <li><a href = "video.php?sort=lgnth&constr=20"> 10-20 minutes </a></li>
                        <li><a href = "video.php?sort=lgnth&constr=40"> 20-40 minutes </a></li>
                        <li><a href = "video.php?sort=lgnth&constr=60"> 40-60 minutes </a></li>
                        <li><a href = "video.php?sort=lgnth&constr=61"> 1+ hour </a></li>
                    </ul>
                </li>
                <li><a href = "video.php?sort=rsltn"> Highest Resolution </a>
                	<ul>
                    	<li><a href = "video.php?sort=rsltn&constr=144"> 144p </a></li>
                        <li><a href = "video.php?sort=rsltn&constr=240"> 240p </a></li>
                        <li><a href = "video.php?sort=rsltn&constr=360"> 360p </a></li>
                        <li><a href = "video.php?sort=rsltn&constr=480"> 480p </a></li>
                        <li><a href = "video.php?sort=rsltn&constr=720"> 720p </a></li>
                        <li><a href = "video.php?sort=rsltn&constr=1080"> 1080p </a></li>
                	</ul>
                </li>
                <li><a href = "video.php?sort=lang"> Language </a>
                	<ul>
                    	<li><a href = "video.php?sort=lang&constr=eng"> English </a></li>
                        <li><a href = "video.php?sort=lang&constr=none"> Non-English </a></li>
                    </ul>
                </li>
                <li><a href = "video.php?sort=vwcnt"> View Count </a>
                	<ul>
                        <li><a href = "video.php?sort=vwcnt&constr=75"> 50,000-75,000 </a></li>
                        <li><a href = "video.php?sort=vwcnt&constr=100"> 75,001-100,000 </a></li>
                        <li><a href = "video.php?sort=vwcnt&constr=125"> 100,001-125,000 </a></li>
                        <li><a href = "video.php?sort=vwcnt&constr=150"> 125,001 - 150,000 </a></li>
                        <li><a href = "video.php?sort=vwcnt&constr=151"> 150,000+ </a></li>
                    </ul>
                </li>
                <li><a href = "video.php?sort=vtype"> Video Type </a>
                	<ul>
                    	<li><a href = "video.php?sort=vtype&constr=tut"> Tutorial </a></li>
                        <li><a href = "video.php?sort=vtype&constr=ent"> Entertainment </a></li>
                        <li><a href = "video.php?sort=vtype&constr=app"> Application </a></li>
                        <li><a href = "video.php?sort=vtype&constr=wep"> Weapons </a></li>
                        <li><a href = "video.php?sort=vtype&constr=gro"> Group Demo </a></li>
                        <li><a href = "video.php?sort=vtype&constr=oth"> Others </a></li>
                 	</ul>
               	</li>
                <li><a href = "video.php?sort=vcat"> Video Category </a>
                	<ul style = "width: 200px">
                    	<li><a href = "video.php?sort=vcat&constr=ytc"> Yang Taichi </a></li>
                        <li><a href = "video.php?sort=vcat&constr=ctc"> Chen Taichi </a></li>
                        <li><a href = "video.php?sort=vcat&constr=stc"> Sun Taichi </a></li>
                        <li><a href = "video.php?sort=vcat&constr=wtc"> Wu Taichi </a></li>
                        <li><a href = "video.php?sort=vcat&constr=qg"> QiGong </a></li>
                        <li><a href = "video.php?sort=vcat&constr=shl"> Shaolin </a></li>
                        <li><a href = "video.php?sort=vcat&constr=tkd"> Tae Kwon Do </a></li>
                        <li><a href = "video.php?sort=vcat&constr=wc"> Wing Chun </a></li>
                        <li><a href = "video.php?sort=vcat&constr=aki"> Aikido </a></li>
                        <li><a href = "video.php?sort=vcat&constr=jd"> Judo </a></li>
                        <li><a href = "video.php?sort=vcat&constr=kfm"> KungFu Movie </a></li>
                 	</ul>
               	</li>
                
         </ul>
    </li>
    
    <li><a href = "video.php" onClick="changeSession()">View All</a></li>
    <?php
	if(!isset($_SESSION['sess_users'])){
    	echo "<li><a href = 'login.php'>Login </a></li>";
    	echo "<li><a href = 'register.php'> Register </a></li>";
	}
	?>
	<li><a href = "displayFav.php"> Display Favorite </a></li>
    <?php
	if(isset($_SESSION['sess_users'])) {
		echo "<li><a href = 'editAccount.php'> Edit Account </a></li>";
	}
	?>
    
  </ul>
</nav>
</body>
</html>