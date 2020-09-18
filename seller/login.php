<?php 
  include_once '../php_action/db_connect.php'; 
  include_once '../inc/functions.php'; 
?>
<?php include_once '../php_action/core.php'; ?>

<?php if(isset($_SESSION['seller_login'])){
  redirect("index.php", 2000); 
 }else{
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
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
 		<style>
 			body{
 				background-color: #F2F4F4;
 			}
 			img{
 				 height:160px;
 				 width:100%;
 			}
 			@media screen and (max-width: 815px){
 				img{
 					height:130px;
 				}
 			}
 			

 			h3{
            
              text-align: center;
 			}
 			button{
 				background-color: orange;
 				color: white;
 				margin-top: 20px;
 				border: 2px solid white;
 				border-radius: 20px;
 			}
 			button:hover{
 				background-color: white;
 				color: orange;
 				border: 2px solid orange;
 			}
 			a{
 				color: black;
 				text-decoration: none;
 				font-size: 20px;

 			}
 		</style>
 	</head>
 	<body>
 	<div class="container">
 		<div class="row">
 			<div class="col-md-6  col-sm-6 col-xs-12">
 				<div style="height:auto;width: 100%;margin-top:40px;background-color:;text-align: center;">
 				<img src="https://www.lotolakay.com/assets/imgs/lotologo.png" >
 				<span>some text some text some text some text</span>
 			</div>
      <form action="" method="post">
        <?php include_once '../inc/functions.php'; ?>
        <?php getMessage(@$msg,@$sts);?>
        <h3>CONNECTEZ.VOUS</h3>
          <div class="form-group">
            <div class="col-md-12 inputGroupContainer">
            <div class="input-group">
              <span class="input-group-addon" style="background-color: orange"><i class="fa fa-phone" style="font-size:20px;background-color: orange;color: white"></i></span>
              <input id="number" name="number" placeholder="number" class="form-control input-lg" required="true" value="" type="text"></div>
            </div>
            </div>
            <div class="form-group" >
              <div class="col-md-12 inputGroupContainer">
              <div class="input-group" style="margin-top: 20px"><span class="input-group-addon" style="background-color: orange"><i class="fa fa-lock" style="font-size:20px;background-color: orange;color: white"></i></span><input id="password" name="password" placeholder="password" class="form-control input-lg" required="true" value="" type="text"></div>
              </div>
            </div>
            <center><button type="submit" class="btn btn-lg" name="login_seller">connexion</button></center>
            <center><a href="#">Sinscrire</a></center>
      </form>
 			</div>
 		</div>
 	</div>
 
 		<!-- jQuery -->
 		<script src="https://code.jquery.com/jquery.js"></script>
 		<!-- Bootstrap JavaScript -->
 		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
 		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
  		<script src="Hello World"></script>
 	</body>
 </html>

<?php 


  if (isset($_REQUEST['login_seller'])) {
    $seller_contact = $_REQUEST['number'];
    $seller_password = $_REQUEST['password'];
        $sql = mysqli_query($dbc,"SELECT * FROM seller WHERE seller_contact = '$seller_contact' AND seller_password = '$seller_password' AND seller_sts = 1");
        $count = mysqli_num_rows($sql);
        if ($count == 1) {
          echo $_SESSION['seller_login'] = $seller_contact;
          $msg = "Login Successfully";
          $sts = "success";
          redirect("../seller/index.php",2000);
        }else{
          echo $msg = "Invaild Email OR Password OR May Be Your Account is Not Verified Yet";
          echo $sts = "danger";   
          redirect("../seller/login.php",2000);
        }
  }

?>

<?php  } ?>