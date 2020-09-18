
	<style type="text/css" media="screen">

    @media print{
      a[href]:after{
        content: none !important;
      }
      .print_hide{
        display: none !important;;
      }
      *{
        margin: 0px;
      }
    }
 
</style>

<script type="text/javascript">
	window.print();
	//window.close();
	
	function myFunction() {
    window.print();
}
</script>
<center>
	<button onclick="myFunction()" class="btn btn-success print_hide">Print this page</button>
	



<?php
		

require_once '../php_action/db_connect.php';
require_once 'core.php';
if( !empty($_GET['var'])){
	  $userid = $_GET['var'];

  $q = "SELECT purchase_date, client_name, client_contact, sub_total, vat, total_amount, discount, grand_total, paid, due ,purchase_id  FROM purchase WHERE purchase_id = '$userid'";

$orderResult = $connect->query($q);
$orderData = $orderResult->fetch_array();

 $orderDate = $orderData[0];
 $clientName_id = $orderData[1];
	$fetchCustomer =mysqli_fetch_assoc(mysqli_query($dbc,"SELECT * FROM customers WHERE customer_id='$clientName_id'"));
	 $client_name = $fetchCustomer["customer_name"];
	$clientContact = $orderData[2]; 
	$subTotal = $orderData[3];
	$vat = $orderData[4];
	$totalAmount = $orderData[5]; 
	$discount = $orderData[6];
	$grandTotal = $orderData[7];
	$paid = $orderData[8];
	$due = $orderData[9];
	$purchase_id = $orderData[10];





 ?>
 <?php
   $sql = "SELECT * FROM company ORDER BY id ASC LIMIT 1";

                    $result = $connect->query($sql);

                    while($row = $result->fetch_assoc()) {
                     
                   // while?>
	
    <?php
    $logo = $row['logo'];
     $name= $row['name'];
   $company_phone= $row['company_phone'];
	$personal_phone=$row['personal_phone'];
	$address=$row['address'];

 } 
    ?>
 <table border="1" cellspacing="0" cellpadding="2" width="100%" style="font-size:10px;">
	<thead>
		<tr >
			<th colspan="5">
				<div align="center">
				<img src="../img/uploads/<?= $logo; ?>" class="img-responsive" style="width: 100%; height: 70px;">
				
				<h2><?php echo $row['name']; ?></h2>
				<p style="font-size: 15px; margin-top: -10px;"><strong>Company No:</strong> <?php echo $name  ?></p>
				<p style="font-size: 15px; margin-top: -10px;"><strong>Company No:</strong> <?php echo $company_phone  ?></p>
				<p style="font-size: 15px; margin-top: -10px;"><strong>Address:</strong> <?php echo $address ?></p>
				

				</div>


					
			</th>
			
		</tr>	
		<tr >
			<th colspan="5">

			<div align="center">
				Bill No.: <strong><?php echo $purchase_id; ?> </strong><br />
				Purchase Date : <strong><?php echo $orderDate ; ?> </strong><br />
				Account Title : <strong> <?php echo $client_name ; ?></strong><br />
				Customer :<strong> <?php echo $clientContact ; ?></strong>
				

			</div>

			</th>
			</tr>

		<tr >
			<th colspan="5">

			<center>
				
			</center>		
			</th>
				
		</tr>		
	</thead>
</table>
<table border="1" width="100%;" cellpadding="1" style="border:1px solid black;font-size:10px;border-top-style:1px solid black;border-bottom-style:1px solid black ;">

	<tbody>
		<tr>
			<th>S.no</th>
			<th>Product</th>
			<th>Rate</th>
			<th>QTY</th>
			
			<th>Total</th>
		</tr>
		<?php
		 $orderItemSql = "SELECT purchase_item.product_id, purchase_item.rate, purchase_item.quantity, purchase_item.total,product.product_id,product.product_name FROM purchase_item
	INNER JOIN product ON purchase_item.product_id = product.product_id 
 WHERE purchase_item.purchase_id ='$userid'";
$orderItemResult = $connect->query($orderItemSql);
		$x = 1;	
		 $total_quantity = '';
		 $total_rate = '';
		while($row = $orderItemResult->fetch_assoc()) {
				$product_id = $row['product_id'];
				@$fetchProduct = mysqli_fetch_assoc(mysqli_query($dbc,"SELECT * FROM product WHERE product_id='$product_id'"));
				@$fetchCategory = mysqli_fetch_assoc(mysqli_query($dbc,"SELECT * FROM categories WHERE categories_id='$fetchProduct[categories_id]'"));
			
		?>				
			 <tr>
				<th><?php echo $x ?></th>
				<td style="font-size:12px;"><?php echo $fetchProduct["product_name"]; ?> (<?=$fetchCategory['categories_name']?>)</td>
				<th><?php echo $row["rate"]; ?></th>
				<th><?php echo $row["quantity"]; ?></th>
				<th><?php echo $row["total"] ; ?></th>
			
		<?php
		@$total_rate += $row["total"];
		@$total_quantity += $row["quantity"];	
		$x++;
		} // /while
?>
		</tr>
		<tr>
			<th colspan="2">Total </th>
			<th>-</th>
			<th><?= $total_quantity ;?></th>
			<th><?= $total_rate;?></th>

		</tr>
</tbody>
			

</table>
		<?php
		$fetchTransaction = mysqli_fetch_assoc(mysqli_query($dbc, "SELECT * FROM transactions WHERE customer_id='$clientName_id' ORDER BY transaction_id DESC limit 1"));
	
			?> 
		<table style="float: right; font-size:10px;" border="1px ">
		<tr >
		
			<td>Due Amount</td>
			<td><?php echo ($fetchTransaction['balance']-$fetchTransaction['credit']); ?></td>			
		</tr>

		<tr>
			<td>Now Paid Amount </td>
			<td><?php echo @$paid  ?></td>			
		</tr>

		<tr>
			<td>Remaining Balance</td>
			<td><h4 style="font-size:20px;"><?php echo @$fetchTransaction['balance']; ?></h4></td>			
		</tr>
	</div>	
</table>
		

		


<?php

}

?>

</center>
<style type="text/css">
	p{
		margin-top:-10px;
		font-size:10px;
	}
</style>