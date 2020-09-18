 <?php 
include_once "includes/header.php";
include_once "inc/code.php";

 $user_id = base64_decode(@$_REQUEST['user_id']);

$fetchUSer=mysqli_fetch_assoc(mysqli_query($dbc,"SELECT * FROM users WHERE user_id =  '$user_id ' "))

?>
<!-- start page content -->
            <div class="page-content-wrapper">
                <div class="page-content">
                    <div class="page-bar">
                        <div class="page-title-breadcrumb">
                            <div class=" pull-left">
                                <div class="page-title">Privileges </div>
                            </div>
                            <ol class="breadcrumb page-breadcrumb pull-right">
                                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="dashboard.php">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li>Users /&nbsp;</li>
                                <li class="active">Privileges</li>
                            </ol>
                        </div>
                    </div>

	<div class="col-sm-12">
		<div class="panel">
	<div class="panel-heading panel-heading-red" align="center"><h4>User Privileges</h4></div>
	<div class="panel-body">
			<form class="form-horizontal" method="POST" action="" id="">
		<div class="form-group row">
			<div class="col-sm-4">
				
			</div>
			<div class="col-sm-4 text-center">
				<p style="font-size: 18px">Allow This user to manage these tools</p>
				<input type="text" class="form-control" name="now_user_id" readonly="" value="<?=$fetchUSer['username']?>">
			</div>
			<div class="col-sm-4">
			</div>

		</div>
		<?= getMessage(@$msg,@$sts); ?>

	

			<input type="checkbox" id="checkAl" class="checkbox">CheckAll<br/><hr/>
			 	<?php
			 $sql =mysqli_query($dbc,"SELECT * FROM nav ");
			 while($row=mysqli_fetch_assoc($sql)):
			 	if ($row['url'] == '#' ) {
			 			
			 	}else{

			 		$fetchchecked = mysqli_fetch_assoc(mysqli_query($dbc,"SELECT * FROM privileges WHERE user_id = '$user_id'  AND  nav_id = '".$row['nav_id']."'  "));
			 		if ($fetchchecked) {
			 			$checked = "checked";
			 		}else{
			 			$checked = "";
			 		}

			 	?>


			  <input type="checkbox" class="checkbox" name="name[]" value="<?=$row['nav_id']?>" title="<?=$row['url']?>" <?=$checked?>>
  					<label for="vehicle1" ><?=$row['heading']?></label><br/>	
  			<input type="hidden" name="url[]" value="<?=$row['url']?>" title="<?=$row['url']?>">		


			 		

			 	<?php
			 }
endwhile;
			 	?>	  
			 		<input type="submit" name="save" class="btn btn-info"/>
			</form>
			<br><br>
		</div>
	</div>
</div>



	</div></div>
<?php
include_once "includes/footer.php";

	if (isset($_REQUEST['save'])) {


		 $name = $_REQUEST['name'];
		
		$now_user_id = $_REQUEST['user_id'];
		// echo json_encode($_REQUEST['name']);
		// echo json_encode($_REQUEST['url']);

			$delte = mysqli_query($dbc,"SELECT * FROM privileges WHERE user_id = '$user_id'");
			while($row=mysqli_fetch_assoc($delte)){


				$q = mysqli_query($dbc,"DELETE FROM privileges WHERE user_id = '".$row['user_id']."'");
				


			}

		

		for ($i=0; $i <= count($name) ; $i++) { 

			$FetchURL = mysqli_fetch_assoc(mysqli_query($dbc,"SELECT * FROM nav WHERE nav_id ='".$name[$i]."' "));
			if($name[$i] != ''){
			$test = mysqli_query($dbc,"INSERT INTO privileges(user_id,nav_id,nav_url,addby) VALUES('".@$user_id."','".@$name[$i]."','".@$FetchURL['url']."','Added By: $globel_username ' )");
			if($test){

			$msg = "Role Assigned successfully ";
			$sts ="success";
			redirect("users.php",1200);
		}

			
			}else{

			}
		}
		
	}
		
?>


<style type="text/css">
	.checkbox{
		width: 20px;
		height: 20px;
	}
	label{
		font-size: 20px;
	}
</style>

<script>
$("#checkAl").click(function () {
$('input:checkbox').not(this).prop('checked', this.checked);
});
</script>