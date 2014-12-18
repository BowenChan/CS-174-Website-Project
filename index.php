<!DOCTYPE HTML>
<HTML lang="en">
<head>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Bootstrap -->
    <!-- Latest compiled and minified CSS --> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css"> 
  <!--  <link href="css/bootstrap.min.css" rel="stylesheet">-->
    <link href="custom.css" rel="stylesheet">    
    <!--Youtube--->
    <script src="jquery.js"></script>
    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript --> 
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
 <!--   <script src="js/bootstrap.min.js"></script>-->
    
    <!-- This script was used and is the property of http://lab.abhinayrathore.com/jquery_youtube 12/16/2014-->
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <link type="text/css"
		href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/redmond/jquery-ui.css" rel="stylesheet" />
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.1/jquery-ui.min.js"></script>
    <script type="text/javascript" src="jquery.youtubepopup.min.js"></script>
    <script type="text/javascript">
		$(function () {
			$.fn.YouTubePopup.defaults.width = 1080;
			$.fn.YouTubePopup.defaults.height = 750;		
		});
		$(function() {
			$("a.youtube").YouTubePopup({ autoplay: 1 });
		});
		
    </script>
    
    <script src="youtubeplayer.js"></script>
</head>

<body>
<?php include("dbconnect.php"); ?>
<div class="container-fluid text-center">

<div id="abs">
	<ul class="list-unstyled list-inline">
    	<li><a href="video.php">View Videos</a></li>
        <li><a href="needadmin.html">Edit Video</a></li>
        <li><a href="login.php">Login</a></li> 
        <li><a href="register.php">Register</a></li>
              
    </ul>
</div>

<div id="ytplayer"></div>

<div class="top-search-area"> <!--search-->
	<form action = "video.php" method=post id="searchform">
	<input type="text" name = "search" placeholder="Enter a keyword" width="250px" onClick=""/>
    <button type="submit" style="background-color:red; color:white">Search</button>
	</form>

</div>
<h1 id="title">Fun Martial Arts</h1>

<!--carousel-->
 <div id="the-slider" class="carousel slide" data-ride="carousel">

<ol class="carousel-indicators">
	<li data-target="#the-slider" data-slide-to="0" class="active"></li>
    <li data-target="#the-slider" data-slide-to="1"></li>
  <!--  <li data-target="#the-slider" data-slide-to="2"></li>  -->
</ol>

<div class="carousel-inner">

<div class="item active"><!--item1/row1-->

    <div class="row rotate"> <!--row1-->
        	<div class="col-md-4">
            	<a class="youtube" href="https://www.youtube.com/watch?v=nqTDZDlHdrk"><img src="http://i.ytimg.com/vi/nqTDZDlHdrk/mqdefault.jpg" class="img-responsive" alt=""></a>
            </div>
            <div class="col-md-4">
            	<a class="youtube" href="https://www.youtube.com/watch?v=r7BRcfw98mk"><img src="http://i.ytimg.com/vi/r7BRcfw98mk/mqdefault.jpg" class="img-responsive" alt=""></a>
            </div>
            
            <div class="col-md-4">
            	<a class="youtube" href="https://www.youtube.com/watch?v=KZA1-qC_qyE"><img src="http://i.ytimg.com/vi/KZA1-qC_qyE/mqdefault.jpg" class="img-responsive" alt=""></a>
            </div>            
            
    </div><!--row 1-->
</div><!--item1-->

<div class="item"><!--item2-->
	<div class="row rotate"> <!--row2-->
        	<div class="col-md-4">
            	<a class="youtube" href="https://www.youtube.com/watch?v=9IGj5vSj4l0"><img src="http://i.ytimg.com/vi/9IGj5vSj4l0/mqdefault.jpg" class="img-responsive" alt=""></a>
            </div>
            <div class="col-md-4">
            	<a class="youtube" href="https://www.youtube.com/watch?v=MxhAjv3YneM"><img src="http://i.ytimg.com/vi/MxhAjv3YneM/mqdefault.jpg" class="img-responsive" alt=""></a>
            </div>    
            <div class="col-md-4">
            	<a class="youtube" href="https://www.youtube.com/watch?v=ANSNaN4x-80"><img src="http://i.ytimg.com/vi/ANSNaN4x-80/mqdefault.jpg" class="img-responsive" alt=""></a>
            </div>         
        </div><!--row 2-->
	
</div><!--item2-->
</div><!--carousel-inner-->

<!--controls-->
<a class="left carousel-control" href="#the-slider" role="button" data-slide="prev">
<span class="glyphicon glyphicon-chevron-left"></span></a>
<a class="right carousel-control" href="#the-slider" role="button" data-slide="next">
<span class="glyphicon glyphicon-chevron-right"></span></a>

</div><!--carousel-->

<div class="bottom-search-area">    
    
<form action="video.php" method = "post" class="form-inline" id="combine" role="form">
	<div class="form-group">
    
    	<div class="input-group">
        	<select id="videolength" name="vidl" class="form-control">
            	<option value="">View Length</option>
    			<option value=0>0-10 minutes</option>
        		<option value=10>10-20 minutes</option>
        		<option value=20>20-40 minutes</option>
		        <option value=40>40-60 minutes</option>
		        <option value=60>60+ minutes</option>
    		</select>          
        </div><!--video length-->
        
    	<div class="input-group">
        	<select id="resolution" name="vidr" class="form-control">
            	<option value="">Highest Resolution</option>
    			<option value=144>144p</option>
        		<option value=240>240p</option>
        		<option value=360>360p</option>
		        <option value=480>480p</option>
		        <option value=720>720p</option>
		        <option value=1080>1080p</option>
    		</select>       	         
        </div> <!--resolution-->
        
        <div class="input-group">
        	<select id="language" name="vidv" class="form-control">
            	<option value="">Language</option>
    			<option value=English>English</option>
        		<option value=Non-English>Non-English</option>
    		</select>   
        </div><!--language-->
        
        <div class="input-group">
        	<select id="viewcount" name="vidc" class="form-control">
            	<option value="">View Count</option>
    			<option value=50000>50,000-75,000</option>
        		<option value=75001>75,001-100,000</option>
        		<option value=100001>100,001-125,000</option>
		        <option value=125001>125,001-150,000</option>
		        <option value=150001>150,001+</option>
    		</select>        
        </div> <!--view count-->
        
        
        <div class="input-group">
        	<select id="videotype" name="vidt" class="form-control">
            	<option value="">Video Type</option>
    			<option value="Tutorial">Tutorial</option>
        		<option value="Entertainment">Entertainment</option>
        		<option value="Application">Application</option>
		        <option value="Weapon">Weapon</option>
		        <option value="Group demo">Group Demo</option>
                <option value="Others">Others</option>
    		</select>  
        </div><!--video type-->
        
        <div class="input-group">
        	<select id="category" name="category" class="form-control">
            	<option value="">Category</option>
    			<option value="Aikido">Aikido</option>
        		<option value="Chen Taichi">Chen Taichi</option>
                <option value="Judo">Judo</option>
                <option value="KungFu Movie">KungFu Movie</option>
                <option value="QiGong">QiGong</option>
                <option value="Shaolin">Shaolin</option>
                <option value="Sun Taichi">Sun Taichi</option>
                <option value="Tae kwon do">Tae kwon do</option>
                <option value="Wing Chun">Wing Chun</option>
                <option value="Wu Taichi">Wu Taichi</option>
                <option value="Yang Taichi">Category</option>
    		</select>
        </div><!--category-->
      
        <div class="input-group">       	
            <input type="submit" name="submit" class="form-control" value="Submit" style="background-color: red; color: white">
        </div>               
	</div>
</form>	
</div><!--bottom search-->

</div><!--container-->
    

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
 <!--   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>-->
</body>
</html>