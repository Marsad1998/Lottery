 <?php 
include_once "includes/header.php";
include_once "inc/code.php";

?>
<!-- start page content -->
            <div class="page-content-wrapper">
                <div class="page-content">
                    <div class="page-bar">
                        <div class="page-title-breadcrumb">
                            <div class=" pull-left">
                                <div class="page-title">Branch</div>
                            </div>
                            <ol class="breadcrumb page-breadcrumb pull-right">
                                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="dashboard.php">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li class="active">Branch</li>
                            </ol>
                        </div>
                    </div>

	<div class="col-sm-12">
		<div class="panel">
	<div class="panel-heading panel-heading-red" align="center"><h4>Create Branch</h4></div>
	<div class="panel-body">
		<?php getMessage(@$msg,@$sts); ?>
		<form class="form-horizontal" method="POST" action="" id="">
			  <div class="form-group row">
			    <label for="clientContact" class="col-sm-2 control-label">Branch Name</label>
			    <div class="col-sm-4">
			      <input type="text" class="form-control" id="branch_name" name="branch_name" placeholder="Branch Name" autocomplete="off"  required  value="<?=@$fetchbranch['branch_name']?>" />
			    </div>
			     <label for="clientContact" class="col-sm-2 control-label">Branch Email</label>
			    <div class="col-sm-4">
			      <input type="email" class="form-control" id="branch_email" name="branch_email" placeholder="Branch Email" autocomplete="off"  required  value="<?=@$fetchbranch['branch_email']?>" />
			    </div>
			  </div> <!--/form-group-->		
			 	<div class="form-group row">
			    <label for="clientContact" class="col-sm-2 control-label">Branch Phone Number</label>
			    <div class="col-sm-4">
			      <input type="text" class="form-control" id="branch_phone" name="branch_phone" placeholder="Branch Phone Number" autocomplete="off"  required  value="<?=@$fetchbranch['branch_phone']?>" />
			    </div>
			      <label for="clientContact" class="col-sm-2 control-label">Branch Country </label>

			    <div class="col-sm-4">
			      <input type="text" class="form-control" id="branch_address" name="branch_country" placeholder="Branch Address " autocomplete="off"  required  value="<?=@$fetchbranch['branch_country']?>" />
			    </div>
			  </div> <!--/form-group-->	

			  <div class="form-group row">
			  	 <label for="clientContact" class="col-sm-2 control-label">Address</label>
			    <div class="col-sm-4">
			    	 <input type="text" class="form-control" id="address" name="address" placeholder="Enter Address" autocomplete="off"  required  value="<?=@$fetchbranch['branch_address']?>" />
			     
			    </div>
			   
			      <label for="clientContact" class="col-sm-2 control-label">Status </label>

			    <div class="col-sm-4">
			       <select class="form-control" name="status">
			     	<option value="<?=@$fetchusers['branch_sts']?>"><?=@$fetchbranch['branch_sts']?></option>

			     	<option value="1">Available</option>
			     	<option value="0">Not A vailable</option>
			     </select>
			    </div>
			  </div> <!--/form-group-->	

			  <div class="form-group row">
			  	 <label for="clientContact" class="col-sm-2 control-label">Note</label>
			    <div class="col-sm-6">
			    	  <input type="text" class="form-control" id="branch_note" name="branch_note" placeholder="Note" autocomplete="off"  required  value="<?=@$fetchbranch['branch_note']?>" />
			     
			    </div>
			   
			    <div class="col-sm-4">
			    	<?=$branch_button;?>
			    </div>
			    
			  </div> <!--/form-group-->			  
			 
			</form>
			<br><br>
		</div>
	</div>
</div>


<div class="col-sm-12">
		<div class="panel">
	<div class="panel-heading cyan-bgcolor" align="center"><h4>Branch Management </h4></div>
	<div class="panel-body">
<?php getMessage(@$msg,@$sts); ?>
			<table class="table example1" id="myTable"  >
				<thead>
			<tr>	
				<th>Branch ID</th>
				<th>Branch name</th>
				<th>Email</th>
				<th>Phone</th>
				<th>Address</th>
				<th>Country </th>
				
				<th>Status</th>
				<th>Action</th>
				
			</tr>
			</thead>
			<tbody>
			<?php 
				
			
			
			$sql = "SELECT * FROM branches  ";
	
	$result = mysqli_query($dbc, $sql);
	
	if ( mysqli_num_rows($result) > 0) {
		while($row = mysqli_fetch_array($result)){
			?>
			<tr>
				<td><?=$row['branch_id'];?></td>
				<td><?=$row['branch_name'];?></td>
				<td><?=$row['branch_email'];?></td>
				
				<td><?=$row['branch_phone']?></td>
				<td><?=$row['branch_address'];?></td>
				<td><?=$row['branch_country'];?></td>
				
				<td>
					<?php
					if ($row['branch_sts'] == '1') {
						?>
						 <span class="label label-lg label-info" style="font-size: ">Available</span>
						<?php
						# code...
					}else{
						?>
						<span class="label label-lg label-danger" style="font-size: "> Not Available</span>
						<?php
					}
					?>
				</td>
				<!-- <td><?=date('D, d-M-Y',strtotime($row['adddatetime'])) ;?> -->
					

				</td>
				<td><a href="branches.php?branch_del_id=<?=$row['branch_id']?>" class="text-danger"><span class="fa fa-remove"></span></a> | 
					<a href="branches.php?branch_edit_id=<?=$row['branch_id']?>" class="text-success"><span class="fa fa-edit"></span></a></td>
					
				
			</tr>
			</tbody>
		<?php 
}
	} 
		?>
			
			
			</table>
		
	</div>
</div>

</div>
	</div></div>
<?php
include_once "includes/footer.php";
?>