<!DOCTYPE html>
<html lang="en">
	<head>
	<?php 
		require_once '../php_action/db_connect.php';
		include_once 'links/header.php'; 
	?>
	</head>
	<script>
		// window.print();
	</script>
	<body class="p-2" style="">
		<h1 class="text-center mt-1"><img src="../img/uploads/<?=$logo; ?>" style="width: 30%;"></h1>
		<center><span class="text-center text-monospace" style="font-size: 0px">P 63-12<br></span></center>
		<div class="text-center text-monospace" style="font-size: 0px">
			<span class="text-center text-monospace" style="font-size: 0px">Rue lantert plaza china 1/2</span><br>
			<span class="text-center text-monospace" style="font-size: 0px">Ref: 1115-1115</span><br>
			<span class="text-center text-monospace" style="font-size: 0px">TID : <?=$_GET['tickets']; ?></span><br>
		</div>
		<div style="display:-ms-flexbox;display:flex;-ms-flex-wrap:wrap;flex-wrap:wrap; font-size: 0px">
			<div style="-ms-flex:0 0 50%;flex:0 0 50%;max-width:50%">
				<label class="text-capitalize h4 text-monospace">SQ : 0083</label> <br>
				<span class="text-monospace">Date : <?=date('d-m-y') ?></span> <br>
			</div>	
			<div style="-ms-flex:0 0 50%;flex:0 0 50%;max-width:50%">
				<label class="text-capitalize h5 text-monospace">Serial No : <?= mysqli_fetch_assoc(mysqli_query($dbc,"SELECT * FROM seller WHERE seller_id = ".$_GET['seller'].""))['seller_name']; ?></label> <br>
				<span class="text-monospace">Date : <?=date('h:m:s') ?></span> <br>
			</div>
		</div>
		<hr style="border-bottom: 1px dashed; font-size: 0px">
			<div style="display:-ms-flexbox;display:flex;-ms-flex-wrap:wrap;flex-wrap:wrap;">
				<div style="-ms-flex:0 0 50%;flex:0 0 50%;max-width:50%">
					<span class="h3 text-monospace">MIDI</span>
				</div>
				<div style="-ms-flex:0 0 50%;flex:0 0 50%;max-width:50%">
					<span class="h3 text-monospace">T. NO. 0083</span>
				</div>
			</div>
		<hr style="border-bottom: 1px dashed;">
		<table class="table table-sm border-0" style="font-size: 0px">
			<tbody class="text-monospace"> 
			<?php 
				$x = 1;
				$ttl = 0;
				$q = mysqli_query($dbc,"SELECT * FROM ticket_orders WHERE seller_id = 2 AND ticket_master_id = '$_GET[tickets]'");
			    while ($r = mysqli_fetch_assoc($q)):?>
		    	<tr class='text-center' id="number<?=$r['ticket_order_id']?>" style="padding: 10px">
					<td><?=$x ?></td>
					<td>
						<?php 
							$abc = $r["ticket_order_name"];
							switch ($abc) {
								case 'wedding':
									echo 'Mar';
									break;
								case '3':
									echo 'Loto 3';
									break;
								case '4':
									echo 'Loto 4';
									break;
								case '5':
									echo 'Loto 5';
									break;
								default:
									echo 'Bor';
									break;
							}
						?>
					</td>
					<td><span><?=$r["ticket_order_number"]?></span></td>
					<td><?=$r["ticket_order_stack"]?> HTG</td>
				</tr>
	    		<?php 
	    			$ttl += $r["ticket_order_stack"];
	    			$x++;
	    			endwhile; 
	    		?>
			</tbody>
		</table>
		<hr style="border-bottom: 1px dashed;">
			<div style="display:-ms-flexbox;display:flex;-ms-flex-wrap:wrap;flex-wrap:wrap;">
				<div style="-ms-flex:0 0 50%;flex:0 0 50%;max-width:50%">
	    			<label class="h3 text-monospace float-right">Total =></label>
				</div>
				<div style="-ms-flex:0 0 50%;flex:0 0 50%;max-width:50%" class="text-center">
	    			<label class="h3 text-monospace">HTG <?=number_format($ttl, 2)?></label>
				</div>
			</div>
		<hr style="border-bottom: 1px dashed;">
		<span class="text-monospace" style="font-size: 100px">La fiche est payable au porteur et une seule fois. Paiement intégral cash ou par versements. Les montants gagnés devront être réclamés avant 90 jours. jouer de manière responsable. Merci. “Celeste Lotto- Le Sens du Partage” JeanJean Bastien-1994</span>
		<script src="links/footer.php"></script>
</html>