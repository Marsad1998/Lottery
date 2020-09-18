<?php include_once "includes/header.php"; 
?>
<!-- start page content -->
            <div class="page-content-wrapper">
                <div class="page-content">
<div class="panel <?php if(!isset($_REQUEST['search_voucher'])){echo 'print_hide';} ?>">
	<div class="panel-heading panel-heading-blue">Single Voucher
		<form method="post" action="" class="pull-right print_hide">
			<select required  id="customer_id" name="customer_id" autofocus="true">
		      	<option value="">Select Account</option>
		      	<?php 
		      	$sql = "SELECT * FROM customers WHERE customer_active = 1";
						$result = $connect->query($sql);
						while($row = $result->fetch_array()) {
							echo "<option value='".$row[0]."'>".$row[1]."</option>";
						} // while
		      	?>
      		</select>	
      		<input type="text" class="dateField" placeholder="Voucher" required name="voucher_date" autocomplete="off">
      		 <button type="submit" name="search_voucher" class="btn btn-success btn-xs" style="margin-top: -4px"><span class="fa fa-search"></span></button>
		</form>
	</div><!-- heading -->
		<div class="panel-body" align="center">
			<?php if(isset($_REQUEST['search_voucher'])): 
				$status='';
				$print_hide='print_hide';
				$customer_id = $_REQUEST['customer_id'];
				$voucher_date = $_REQUEST['voucher_date'];
				$q=mysqli_query($dbc,"SELECT * FROM vouchers WHERE customer_id='$customer_id' AND voucher_date='$voucher_date'");
				while($r=mysqli_fetch_assoc($q)):
					$fetchCustomer=fetchRecord($dbc,"customers",'customer_id',$r['customer_id']);
					$fetchTransaction=fetchRecord($dbc,"transactions",'transaction_id',$r['transaction_id']);
					$getLastTransaction = mysqli_fetch_assoc(mysqli_query($dbc,"SELECT * FROM transactions WHERE customer_id='$fetchCustomer[customer_id]' ORDER BY transaction_id DESC LIMIT 1,1"));
					if (empty($fetchTransaction['debit'])) {
						# code...
						$status="CR";
						$clr = "danger";
					}else{
						$status="DB";
						$clr="success";
					}
					

				?>

				<div class="print_hide">
				

					<button title="<?=$r['transaction_id']?>"  class="btn btn-primary pull-right print_btn">Print Voucher</button>

					<br><br>
				</div>
			<div id="table_<?=$r['transaction_id']?>" title="<?=$r['transaction_id']?>" class="print_hide">
				
				

			<!-- <center style="border:1px solid #000">
				<p><b></b> </p>
				<p><b>Phone:</b> <?=$fetchCustomer['customer_phone']?></p>
				<p><b>Voucher Date:</b> <?=date('D, d-M-Y',strtotime($r['voucher_date']))?></p>
				<p><b>Nurration: </b></p><p><?=$r['nuration']?></p>
			</center> -->
			<?php
   $sql = "SELECT * FROM company ORDER BY id ASC LIMIT 1";

                    $result = $connect->query($sql);

                    while($row = $result->fetch_array()) {
                     
                   // while?>
	
    <?php
    $logo = $row['logo'];
     $name= $row['name'];
   $company_phone= $row['company_phone'];
	$personal_phone=$row['personal_phone'];
	$address=$row['address'];

 } 
    ?>
			<table border="2px" cellspacing="5" cellpadding="5" class=" table table-hover  table_print" width="80%" align="center" style="text-align: center!important;">
				<thead>
					<tr >
				<th colspan="5">
				<div align="center">
				<img src="img/uploads/<?= $logo; ?>" class="img-responsive" style="width: 100%; height: 70px;">
				
				<p  style="font-size:20px;margin-top: 10px;"> <?php echo $name  ?></p>
				<p style="font-size:15px; "><strong>Company No:</strong> <?php echo $company_phone  ?></p>
				<p style="font-size:15px; margin-top: -10px;"><strong>Personal No:</strong> <?php echo $personal_phone ?></p>
				<p style="font-size:15px; margin-top: -10px;"><strong>Address:</strong> <?php echo $address ?></p>
				

				</div>


					
			</th>
			
		</tr>
				</thead>
				<tbody align="center">
					<tr >
						<th>Date</th>
						<th>Account Title</th>
						<th>Phone</th>
					</tr>
					<tr align="center">
						<td><?=date('D, d-M-Y',strtotime($r['voucher_date']))?></td>
						<td><?=$fetchCustomer['customer_name']?></td>
						<td><?=$fetchCustomer['customer_phone']?></td>
					</tr align="center">
					<tr align="center">
						<th>Nurration:</th>
						<td colspan="2"><?=$r['nuration']?></td>
					</tr align="center">
					<tr align="center">
						<th>Voucher No#</th>
						<td colspan="2"><?=$r['voucher_id']?></td>
					</tr >
					<tr align="center">
						<th>Previous Balance</th>
						<td colspan="2"> <?=$fetchTransaction['balance']-($fetchTransaction['credit']-$fetchTransaction['debit'])?></td>
					</tr >
					<tr align="center">
						<th>Paid </th>
						<td colspan="2"><?=($fetchTransaction['credit']+$fetchTransaction['debit'])?> <label class="label label-<?=$clr?>"><?=$status?></label></td>
					</tr>
					<tr align="center">
						
						<th>Remaining Balance</th>
						<td colspan="2"><?=$fetchTransaction['balance']?></td>
					</tr>
				
				
					
				</tbody>
			</table><!-- table -->
		</div>
		<?php endwhile; ?>
		<?php endif; ?>
		</div><!-- panel body -->
</div><!-- panel -->
<div class="panel <?=@$print_hide?>">
	<div class="panel-heading panel-heading-blue">Multiple Voucher
		<form method="post" action="" class="pull-right print_hide">
      		<input type="text" class="dateField" placeholder="Voucher" required name="voucher_date" autocomplete="off">
      		 <button type="submit" name="search_voucher_multiple" class="btn btn-success btn-xs" style="margin-top: -4px"><span class="fa fa-search"></span></button>
		</form>
	</div><!-- heading -->
		<div class="panel-body" align="center">
			<?php if(isset($_REQUEST['search_voucher_multiple'])): 
				$print_hide='';
				$voucher_date = $_REQUEST['voucher_date'];
				?>
				<div class="print_hide">
					<button onclick="window.print()" class="btn btn-primary pull-right">Print Report</button>
					<br><br>
				</div>
					
			<table border="1px" cellspacing="5" cellpadding="5" class="table table-hover table-bordered" >
				<tr>
					<th>Voucher#</th>
					<th>Date</th>
					<th>Customer</th>
					<th>Nurrantion</th>
					<th>Transaction Deatil</th>
				</tr>
				<?php $q=mysqli_query($dbc,"SELECT * FROM vouchers WHERE voucher_date='$voucher_date'");
				while($r=mysqli_fetch_assoc($q)):
					$fetchCustomer=fetchRecord($dbc,"customers",'customer_id',$r['customer_id']);
					$fetchTransaction=fetchRecord($dbc,"transactions",'transaction_id',$r['transaction_id']); ?>
				<tr>
					<td width="100px"><?=$r['voucher_id']?></td>
					<td width="150px;"> <?=date('D, d-M-Y',strtotime($r['voucher_date']))?></td>
					<td width="200px"><?=$fetchCustomer['customer_name']?> <br><?=$fetchCustomer['customer_phone']?></td>
					<td style="font-size: 11px;width: 200px;"><?=$r['nuration']?></td>
					<td>
						<b>Previous Balance: </b><?=$fetchTransaction['debit']?> <br>
						<b>Now Paid: </b><?=$fetchTransaction['credit']?> <br>
						<b>Remaining Balance: </b><?=$fetchTransaction['balance']?> <br>

					</td>
				</tr>
				<?php endwhile; ?>
			</table><!-- table -->
		 <?php endif; ?>
		</div><!-- panel body -->
</div><!-- panel -->
</div>
</div>
<?php include_once 'includes/footer.php'; ?>
<script>
	$(document).on('click','.print_btn',function(){
		var id=$(this).attr('title');
		if($("#table_"+id).attr('title')==id){
		$("#table_"+id).removeClass('print_hide');
		window.print();
	}
		
		$("#table_"+id).addClass('print_hide');

		
	});
</script>
<style type="text/css">
	th{
		text-align: center;
	}
</style>