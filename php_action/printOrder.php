 <center>
<?php
	include_once "db_connect.php";
$sql="SELECT * FROM orders ORDER BY order_id DESC";
$result=mysqli_query($dbc,$sql);

// Associative array
$row=mysqli_fetch_assoc($result);
 $row["order_id"];

// Free result set
mysqli_free_result($result);

	


$orderId = $row["order_id"];
//$orderId = '13';

$sql = "SELECT order_date, client_name, client_contact, sub_total, vat, total_amount, discount, grand_total, paid, due FROM orders WHERE order_id = $orderId";

$orderResult = $connect->query($sql);
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


$orderItemSql = "SELECT order_item.product_id, order_item.rate, order_item.quantity, order_item.total,
product.product_name,order_item.discount FROM order_item
	INNER JOIN product ON order_item.product_id = product.product_id 
 WHERE order_item.order_id = $orderId";
$orderItemResult = $connect->query($orderItemSql);
if ( mysqli_num_rows($orderItemResult) > 0) {

 ?>
 <?php
   $sql = "SELECT * FROM company ORDER BY id ASC LIMIT 1";

                    $result = $connect->query($sql);

                    while($row = $result->fetch_array()) {
                     
                   // while?>
	
    <?php
    echo $logo = $row['logo'];
     $name= $row['name'];
   $company_phone= $row['company_phone'];
	$personal_phone=$row['personal_phone'];
	$address=$row['address'];

 } 
    ?>
 <table border="1" cellspacing="1" cellpadding="2" width="100%" >
	<thead>
		<tr >
			<th colspan="5">
				<div align="center">
				<img src="img/uploads/<?php echo $logo; ?>" class="img-responsive" style="width: 100%; height: 70px;">
				
				<p  style="font-size:20px;margin-top: 10px;"> <?php echo $name  ?></p>
				<p style="font-size:15px; "><strong>Company No:</strong> <?php echo $company_phone  ?></p>
				<p style="font-size:15px; margin-top: -10px;"><strong>Personal No:</strong> <?php echo $personal_phone ?></p>
				<p style="font-size:15px; margin-top: -10px;"><strong>Address:</strong> <?php echo $address ?></p>
				

				</div>


					
			</th>
			
		</tr>	
		<tr >
			<th colspan="5">

			<div align="center">
				Bill No.: <strong><?php echo $orderId ; ?> </strong><br />
				Order Date : <strong><?php echo $orderDate ; ?> </strong><br />
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
<table border="1px" width="100%;" cellpadding="1"  ;">

	<tbody>
		<tr>
			<th>S.no</th>
			<th>Product</th>
			<th>Rate</th>
			<th>QTY</th>
			<th>Discount%</th>
			<th>Total</th>
		</tr>
		<?php
		$x = 1;	
		$grandtotal = '';
		$grandquantity = '';
		while($row = $orderItemResult->fetch_array()) {
				$product_id = $row['product_id'];
				$fetchProduct = mysqli_fetch_assoc(mysqli_query($dbc,"SELECT * FROM product WHERE product_id='$product_id'"));
				$fetchCategory = mysqli_fetch_assoc(mysqli_query($dbc,"SELECT * FROM categories WHERE categories_id='$fetchProduct[categories_id]'"));
			
		?>				
			 <tr>
				<th><?php echo $x ?></th>
				<td style="font-size:15px;"><?php echo $row[4]; ?> (<?=$fetchCategory['categories_name']?>)</td>
				<th><?php echo $row[1]; ?></th>
				<th><?php echo $row[2]; ?></th>
				<th><?php echo $row[5] ; ?>%</th>
				<th><?php echo $row[3] ; ?></th>

			 
		<?php	
		$grandtotal += $row[3];
		$grandquantity += $row[2];

		$x++;
		} // /while
?>
		</tr>
		<tr align="center">
			<th colspan="3" >Total</th>
			<!-- <td >__</td> -->
			<td ><?php echo $grandquantity; ?></td>
			<td>_</td>
			<td ><?php echo  $grandtotal;?></td>
		</tr>
		
</tbody>


</table>
		
		<table style="float: right; font-size:15px;" border="1px ">
		<tr >
		<?php
		$sql = "SELECT * FROM customers WHERE customer_id = '$clientName_id'";

										$result = $connect->query($sql);

										while($row = $result->fetch_array()) {
											$customer_id = $row[0];
											$customer_name = $row[1];
											$customer_blance = '';
										$sqll = "SELECT * FROM transactions WHERE customer_id='$clientName_id' ORDER BY transaction_id DESC limit 1";

										$resultt = $connect->query($sqll);

										while($roww = $resultt->fetch_array()) {
											
											 $customer_blance = $roww['balance'];

											 $customer_credit = $roww['credit'];
										}//while transation	
									}
			?> 
			<td>Due Amount</td>
			<td><?php echo @($customer_blance- $customer_credit); ?></td>			
		</tr>

		<tr>
			<td>Now Paid Amount </td>
			<td><?php echo @$paid  ?></td>			
		</tr>

		
		

		<tr>
			<td>Remaining Balance</td>
			<td><h4 style="font-size:20px;"><?php echo  @$customer_blance; ?></h4></td>			
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