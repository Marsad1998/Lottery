<?php 
	require_once '../php_action/db_connect.php';
	require_once '../inc/functions.php';
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Title Page</title>

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
		 <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<style >
	*{
			box-sizing: border-box;
		}
		.sidebar {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidebar a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.sidebar a:hover {
  color: #f1f1f1;
}

.sidebar .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

.openbtn {
  font-size: 30px;
  cursor: pointer;
  background-color: transparent;
  color: white;
  
  border: none;
  float: right;
}

.openbtn:hover {
  background-color: #444;
}

#main {
  transition: margin-left .5s;
  padding: 10px;
  width: 100%;
 background-color: #27AE60 ;

}
#main span{
	font-size:25px;
	padding-left: 10px;
	color: white;
     
}


@media screen and (max-height: 450px) {
  .sidebar {padding-top: 15px;}
  .sidebar a {font-size: 18px;}
}

.hero{
	width: 100%;
	height:auto;
	background-color:;
	position: relative;
	margin-top: 20px;
	padding: 30px;
	-webkit-box-shadow: 1px 1px 13px -1px rgba(0,0,0,0.51);
-moz-box-shadow: 1px 1px 13px -1px rgba(0,0,0,0.51);
box-shadow: 1px 1px 13px -1px rgba(0,0,0,0.51);
}
.hero h3{
	text-align: center;
	color: red
}
.hero span{
	margin-left: 15px;
	font-size: 25px;
}
.hero .sp{
	font-weight: bold;
	font-size: 40px;
	color:#48C9B0;
	margin-left:24px; 
}
.button1{
	position: absolute;
	z-index: 9;
	top: 90%;
	left:35%;
	background-color: #48C9B0;
	color: white;
	border-radius: 20px;
	border:2px solid white;
	padding-left: 20px;
	padding-right: 20px;
}
.tirage{

	background-color: #C0392B ;
	color: white;
	width: 45%;
	height: auto;
	padding: 10px;
	margin-top:40px; 
	border-top-right-radius: 13px;
	border-bottom-right-radius: 13px;
}
.section1{
	width: 100%;
	height:auto;
	background-color: #48C9B0;
	border-radius: 20px;
	border: 2px solid white;
	padding:20px;
	margin-top: 20px;
}
.section2{
	width: 100%;
	height:auto;
	background-color: #C0392B;
	border-radius: 20px;
	border: 2px solid white;
	padding:20px;
		margin-top: 10px;
}
</style>
		
	</head>
	<body>
		
	<div id="mySidebar" class="sidebar">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
  <a href="#">About</a>
  <a href="#">Services</a>
  <a href="#">Clients</a>
  <a href="#">Contact</a>
</div>

<div id="main" >
	<div class="container">

<span style="color: black;
	">LOTO LAKAY</span>
  <button class="openbtn" onclick="openNav()"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></button>
<i class="fa fa-comments-o" aria-hidden="true" style="float:right;color:white;font-size: 30px ;margin-right:10px"></i>
<a href="loto.php" style="float:right;color:white;font-size: 30px ;margin-right:10px">Loto</a>

</div>
</div>
<!--navigation end-->
<div class="container">
	     <div class="row">
				<div class=" col-sm-12">
					 <!--Prochain TIRAGE-->
					<div class="hero">
						<h3>PROCHAIN TIRAGE</h3>
						<span>Heure</span><span>Minute</span><span>Seconde</span>
						<span class="sp">03</span><span style="font-size: 28px;font-weight: bold">:</span><span class="sp">28</span><span  style="font-size: 28px;font-weight: bold">:</span><span class="sp">36</span>
					</div>
					<button class="btn btn-lg button1" type="submit">JOUER</button>
                    
                 </div>
         </div>
</div>
 <!--DERNIER TIRAGE-->
          <div class="tirage">
 				DERNIER TIRAGE
 			</div>
 		 <!--end-->
 		 <div class="container">
 		 	<div class="section1">
 		 		<div class="row">
 		 			<div class="col-sm-12">
 		 				<span style="color:white;font-size: 17px;float:left">Tirage Midi</span>
 		 				<span style="color:white;font-size: 17px;float:right">30-may-2020</span><br>
 		 			</div>

 		 			<div class="col-sm-12">
 		 				<br>
 		 				<i class="fa fa-sun-o" aria-hidden="true" style="color: yellow;font-size: 30px;margin-left:19px;float:left"></i>
                      

 	<div style="width: 40px;height: 40px;border-radius: 20px;background-color: white;display: inline-block;float:right"></div>

 	<div style="width: 40px;height: 40px;border-radius: 20px;background-color: white;display: inline-block;float:right"></div>

 	<div style="width: 40px;height: 40px;border-radius: 20px;background-color: white;display: inline-block;float:right"></div>

 	<div style="width: 40px;height: 40px;border-radius: 20px;background-color: white;display: inline-block;float:right"></div>
 		 			</div>
 		 				
 		 		
 		 			
 		 		</div>
 		 	</div>

 		 	<div class="section2">
 		 		<div class="row">
 		 			<div class="col-sm-12">
 		 				<span style="color:white;font-size: 17px;float:left">Tirage SolrS</span>
 		 				<span style="color:white;font-size: 17px;float:right">30-may-2020</span><br>
 		 			</div>

 		 			<div class="col-sm-12">
 		 				<br>
 		 				<i class="fa fa-moon-o" aria-hidden="true" style="color: black;font-size: 30px;margin-left:19px;float:left"></i>
                      

 	<div style="width: 40px;height: 40px;border-radius: 20px;background-color: white;display: inline-block;float:right"></div>

 	<div style="width: 40px;height: 40px;border-radius: 20px;background-color: white;display: inline-block;float:right"></div>

 	<div style="width: 40px;height: 40px;border-radius: 20px;background-color: white;display: inline-block;float:right"></div>

 	<div style="width: 40px;height: 40px;border-radius: 20px;background-color: white;display: inline-block;float:right"></div>
 		 			</div>
 		 				
 		 		
 		 			
 		 		</div>
 		 	</div>
 		 </div>
 	


 	

		<!-- jQuery -->
		<script src="https://code.jquery.com/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
 		<script src="Hello World"></script>
 		<script>
function openNav() {
  document.getElementById("mySidebar").style.width = "250px";
 }

function closeNav() {
  document.getElementById("mySidebar").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
}
</script>
	</body>
</html>