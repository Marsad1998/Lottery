<?php include_once '../inc/functions.php'; ?>
<?php include_once '../php_action/core.php'; ?>
<?php 
if (!isset($_SESSION['seller_login'])) {
	redirect("login.php");
}else{?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<?php include_once 'links/header.php'; ?>
	</head>

	<body>
		<?php include_once 'links/nav.php'; ?>

		<!-- Begin page content -->
		<div class="container mainPage">
			<br>
			<div class="mt-5">
				<?php 
					$seller = fetchRecord($dbc,"seller", "seller_contact", $_SESSION['seller_login']);
					$seller_name = $seller['seller_name'];
				?>
				
				<!-- Main Screen -->
				
				<div class="homeScreen">
					<div class="card bg-light card1">
					    <div class="card-body card1 text-center p-4">
					    	<strong class="text-danger h4">Next Draw</strong><br>
					    	<span class="mr-3 h4 text-secondary">Hours</span>
					    	<span class="mr-3 h4 text-secondary">Minute</span>
					    	<span class="mr-3 h4 text-secondary">Second</span><br>
					    	<span class="mr-4 h4 text-info" style="padding-right: 25px">06 :</span>
					    	<span class="mr-4 h4 text-info">28 :</span>
					    	<span class="mr-4 h4 text-info" style="padding-left: 50px">35 </span><br>
					    </div><!-- card body -->
					    <button type="button" class="btn btn-info button1">To Play</button>
					</div><!-- card -->
					<br>

					<div class="tirage">
		 				Latest Draws
		 			</div>
		 			<br>
		 			<div class="card bg-light card2">
					    <div class="card-body card2">
					    	<b class="text-white">Midi Draw</b>
					    	<b class="text-white" style="margin-left: 105px">1st July 2020</b><br><br>
					    	<h3 class="fas fa-sun ml-4" style="color: yellow"></h3>
					    	<span style="margin-left: 10px">
						    	<strong class="morning">15</strong>
						    	<strong class="morning">17</strong>
						    	<strong class="morning">81</strong>
						    	<strong class="morning">17</strong>
					    	</span>
					    </div>
					</div>
					<br>
		 			<div class="card bg-light card3">
					    <div class="card-body card3">
					    	<b class="text-white">Evening Draw</b>
					    	<b class="text-white" style="margin-left: 105px">1st July 2020</b><br><br>
					    	<h3 class="fas fa-sun ml-4" style="color: yellow"></h3>
					    	<span style="margin-left: 10px">
						    	<strong class="morning">15</strong>
						    	<strong class="morning">17</strong>
						    	<strong class="morning">81</strong>
						    	<strong class="morning">17</strong>
					    	</span>
					    </div>
					</div>
					<br><br><br><br><br>
				</div><!-- homeScreen -->
				
				<!-- gamePlay -->
				
				<div class="gamePlay">
					<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
							<li data-target="#carousel-example-generic" data-slide-to="0"></li>
							<li data-target="#carousel-example-generic" data-slide-to="0"></li>
						</ol>
						<div class="carousel-inner" role="listbox">
							<div class="carousel-item active">
								<img src="../img/products/scroll.jpg" alt="Slider Images" style="width: 100%;height: 100px">
							</div>
							<div class="carousel-item">
								<img src="../img/products/scroll.jpg" alt="Slider Images" style="width: 100%;height: 100px">
							</div>
							<div class="carousel-item">
								<img src="../img/products/scroll.jpg" alt="Slider Images" style="width: 100%;height: 100px">
							</div>
						</div>
						<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
							<span class="icon-prev" aria-hidden="true"></span>
							<span class="sr-only">Previous</span>
						</a>
						<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
							<span class="icon-next" aria-hidden="true"></span>
							<span class="sr-only">Next</span>
						</a>
					</div>
					<br><br>
					<span class="gameCircle" onclick="loadGame('borlette');">
						<span class="frac"><sup>Bor</sup><span>&frasl;</span><sub>50x</sub></span>
					</span>
					<span class="gameCircle1" onclick="loadGame('wedding');">
						<span class="frac"><sup>Mar</sup><span>&frasl;</span><sub>100x</sub></span>
					</span>
					<span class="gameCircle2" onclick="loadGame('3');">
						<span class="frac"><sup>Loto 3</sup><span>&frasl;</span><sub>50x</sub></span>
					</span>
					<br><br><br>
					<span class="gameCircle2 gameCircle3" onclick="loadGame('4');">
						<span class="frac"><sup>Loto 4</sup><span>&frasl;</span><sub>50x</sub></span>
					</span>
					<span class="gameCircle2 gameCircle4" onclick="loadGame('5');">
						<span class="frac"><sup>Loto 5</sup><span>&frasl;</span><sub>50x</sub></span>
					</span>
					<br><br><br><br><br>
					<br><br><br><br><br><br><br><br><br>
				</div>	<!-- gamePlay Setting -->

				<!-- Profile -->
				<div class="profilePage">
					<br>
					<div class="text-center">
						<img src="https://cdn2.iconfinder.com/data/icons/font-awesome/1792/user-512.png" class="users" width="100%" alt="No Image Selected"><br>
						<?=$seller_name?> <small class="fas fa-user-cog"></small>
						<br><br>
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text bg-success text-white custom1" id="basic-addon3">Balance</span>
						  	</div>
						  	<?php 
							  	$debit = 0;
							  	$credit = 0;
						  		$q = mysqli_query($dbc,"SELECT * FROM transactions WHERE seller_id = '".$_SESSION['seller_login']."'");
						  		while ($r = mysqli_fetch_assoc($q)) {
						  		    $debit += $r['debit'];
						  		    $credit += $r['credit'];
						  		}
						  		$balance = $credit - $debit;
						  	?>
						  	<input type="text" value="<?=$balance ?>" class="form-control custom2" id="basic-url" aria-describedby="basic-addon3">
						</div>
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text bg-primary text-white custom6" id="basic-addon3">Recent Deposit</span>
						  	</div>
						  	<input type="text" value="<?=$debit ?>" class="form-control custom2" id="basic-url" aria-describedby="basic-addon3">
						</div>
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text bg-dark text-white custom6" id="basic-addon3">Recent Withdrawals</span>
						  	</div>
						  	<input type="text" class="form-control custom2" id="basic-url" aria-describedby="basic-addon3">
						</div>
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text bg-white small text-dark ml-3 custom3" id="basic-addon3"><i class="material-icons">&#xe314;</i> Withdrawal</span>
						  	</div>
							<div class="input-group-append">
								<span class="input-group-text bg-warning small text-white custom4" id="basic-addon3">Recharge <i class="material-icons">&#xe315;</i></span>
						  	</div>
						</div>
						<br>
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text bg-white small text-dark ml-3 custom5" id="basic-addon3"><i class="material-icons">&#xe314;</i></span>
						  	</div>
							<div class="input-group-append">
								<span class="input-group-text bg-dark small text-white" id="basic-addon3" style="border-bottom-right-radius: 20px; border-top-right-radius: 20px; padding: 0px 40px">Pending Withdrawals</span>
						  	</div>
						</div>
						<br>
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text bg-success small text-white ml-3 custom5" id="basic-addon3" style="padding: 0px 65px" onclick="loadTransaction()">Transactions</span>
						  	</div>
							<div class="input-group-append">
								<span class="input-group-text bg-white small text-dark" id="basic-addon3" style="border-bottom-right-radius: 20px; border-top-right-radius: 20px"><i class="material-icons">&#xe315;</i></span>
						  	</div>
						</div>
					</div>
					<br><br><br><br><br><br><br>
				</div><!-- profile Page -->

				<!-- Notification -->
				<div class="notification">
					<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text bg-info small text-white ml-3 custom3" id="basic-addon3"> Historical</span>
					  	</div>
						<div class="input-group-append">
							<span class="input-group-text bg-white small text-dark custom4" id="basic-addon3">Notification </span>
					  	</div>
					</div>
					<br><br><br><br><br>
					<br><br><br><br><br>
					<br><br><br><br><br>
					<br><br><br><br><br>
					<br><br><br><br><br>
					<br><br>
				</div><!-- Notification -->

				<!-- Alert Page -->
				<div class="alertPage">
					<div class="box" style="background-color: #379bff;">
						<i class="fas fa-info-circle" style="font-size: 80px;"></i><br>Tutorial
					</div>
					<div class="box" style="background-color: #7fac00">
						<i class="fas fa-book-reader" style="font-size: 80px;"></i><br>Toe
					</div>
					<div class="box" style="background-color: #f9713e">
						<i class="fas fa-info-circle" style="font-size: 80px;"></i><br>Companion
					</div>
					<div class="box" style="background-color: #2ea897">
						<i class="fas fa-info-circle" style="font-size: 80px;"></i><br>Ball Rale
					</div>
					<div class="box" style="background-color: #a52eff">
						<i class="far fa-calendar-alt" style="font-size: 80px;"></i><br>Month Draw
					</div>
					<div class="box" style="background-color: #ff5656">
						<i class="far fa-calendar-alt" style="font-size: 80px;"></i><br>Date Draw
					</div>
					<div class="box" style="background-color: #015668">
						<i class="fas fa-notes-medical" style="font-size: 80px;"></i><br>Conditions
					</div>
					<div class="box" style="background-color: #52de97">
						<i class="far fa-question-circle" style="font-size: 80px;"></i><br>Support
					</div>
					<br><br><br><br><br><br><br><br><br><br><br>
					<br><br><br><br><br><br><br><br><br><br><br>
					<br><br><br><br><br><br><br><br><br><br><br>
				</div><!-- alert page -->

				<!-- Game Page -->
				<div id="gamePage">
					<div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
						<button type="button" id="_borlette" class="btn btn-sm loadGames pl-2 pr-2" style="background: #4be3ac; border-top-left-radius: 50px; border-bottom-left-radius: 50px;color:white;">Borlette</button>
						<button type="button" id="_wedding" class="btn btn-sm loadGames pl-3 pr-3" style="background: #4be3ac;color:white;">Marriage</button>
						<button type="button" id="_3" class="btn btn-sm loadGames pl-2 pr-2" style="background: #4be3ac;color:white;">Loto 3</button>
						<button type="button" id="_4" class="btn btn-sm loadGames pl-3 pr-3" style="background: #4be3ac;color:white;">Loto 4</button>
						<button type="button" id="_5" class="btn btn-sm loadGames pl-2 pr-2" style="background: #4be3ac;color:white; border-top-right-radius: 20px; border-bottom-right-radius: 20px;color:white;">Loto 5</button>
					</div>
					<br><br>
					<span class="common">
						<input type="number" placeholder="Numbers" class="form-control ticketNumber" style="position: absolute; width: 100px; margin-left: 20px; border-radius: 20px; height: 50px; border: 2px solid #70d4ff">	
						<input type="number" placeholder="Stack" class="form-control ticketStack" style="position: absolute; width: 100px; margin-left: 150px; border-radius: 20px; height: 50px; border: 2px solid #70d4ff">
						<button type="text" class="form-control" style="position: absolute; width: 50px; margin-left: 280px; border-radius: 100px; height: 50px; border: 2px solid white; background: #70d4ff; color: white" onclick="uploadTickets()">+</button>
						<hr style="border: 6px solid #70d4ff;">
					</span>
					<span class="special">
						<input type="number" placeholder="Numbers" class="form-control ticketNumber1" style="position: absolute; width: 70px; margin-left: 10px; border-radius: 20px; height: 50px; border: 2px solid #70d4ff">	
						
						<button type="text" class="form-control" style="position: absolute; width: 50px; margin-left: 90px; border-radius: 100px; height: 50px; border: 2px solid white; background: #70d4ff; color: white" onclick="uploadTickets()">x</button>
						
						<input type="number" placeholder="Numbers" class="form-control ticketNumber2" style="position: absolute; width: 70px; margin-left: 150px; border-radius: 20px; height: 50px; border: 2px solid #70d4ff">
						
						<input type="number" placeholder="Stack" class="form-control ticketStack2" style="position: absolute; width: 70px; margin-left: 230px; border-radius: 20px; height: 50px; border: 2px solid #70d4ff">
						
						<button type="text" class="form-control" style="position: absolute; width: 50px; margin-left: 300px; border-radius: 100px; height: 50px; border: 2px solid white; background: #70d4ff; color: white" onclick="uploadTickets()">+</button>
						<hr style="border: 6px solid #70d4ff;">
					</span>
					<br><br>
					<form action="../php_action/custom_action.php" id="formData">
					<input type="text" id="gameType" class="d-none" value="<?=$_GET['type']; ?>">
						<table class="table table-sm" class="bg-white" id="gameTable">
						    <thead class="bg-white">
						    	<tr>
						    		<td colspan="4" class="bg-success text-white" style="border-top-left-radius: 20px; border-top-right-radius: 20px;">Plug</td>
						    	</tr>
						    	<tr>
						    		<td class="bg-primary text-white" style="border-right: 3px solid yellow;" colspan="2">Lotus For Car</td>
						    		<td class="bg-primary text-white" colspan="2">Marriage</td>
						    	</tr>
						    </thead>
						    <tbody class="bg-white" id="ticketTable">
						    	<tr id="_borlette1">
						    		<th class="text-center">Borlette</th>
						    		<th class="disabled text-center">Option</th>
						    		<th>Stack</th>
						    		<th>x</th>
						    	</tr>
						    	<tr id="_wedding1">
						    		<th class="text-center">Marriage</th>
						    		<th class="disabled text-center">Option</th>
						    		<th>Stack</th>
						    		<th>x</th>
						    	</tr>
						    	<tr id="_31">
						    		<th class="text-center">Loto 3</th>
						    		<th class="disabled text-center">Option</th>
						    		<th>Stack</th>
						    		<th>x</th>
						    	</tr>
						    	<tr id="_41">
						    		<th class="text-center">Loto 4</th>
						    		<th class="disabled text-center">Option</th>
						    		<th>Stack</th>
						    		<th>x</th>
						    	</tr>
						    	<tr id="_51">
						    		<th class="text-center">Loto 5</th>
						    		<th class="disabled text-center">Option</th>
						    		<th>Stack</th>
						    		<th>x</th>
						    	</tr>
						    	<tr>
						    		<td>1 Boule(s)</td>
						    		<td></td>
						    		<td>Total: <b id="getTotal"></b></td>
						    		<td></td>
						    	</tr>
						    	<tr id="bonusDiv">
						    		<td>Bonus 0%</td>
						    		<td></td>
						    		<td>0 HTG</td>
						    		<td></td>
						    	</tr>
						    	<tr id="payerDiv">
						    		<td class="bg-danger text-center" colspan="4" style="border-bottom-left-radius: 20px;border-bottom-right-radius: 20px;"><button type="submit" class="form-control text-white" style="border: none;background: transparent;">Payer</button></td>
						    	</tr>
						    </tbody>
						</table>
					</form>
					<br><br><br><br><br><br><br><br><br><br>
				</div><!-- Game Page -->

				<!-- Transactions -->
				<div class="transaction_page">
					<table class="table table-sm" class="bg-white" id="gameTable">
						<thead class="bg-white">
							<tr>
						    	<td colspan="4" class="bg-success text-white" style="border-top-left-radius: 20px; border-top-right-radius: 20px;">Plug</td>
						    </tr>
						</thead>
						<tbody class="bg-white" id="ticketTable">
						<tr>
						    <th class="text-center">Ticket No</th>
						    <th class="disabled text-center">Option</th>
						    <th>Stack</th>
						    <th>x</th>
						</tr>
						<?php 
							$x = 1;
							$q = mysqli_query($dbc,"SELECT * FROM ticket_orders");
						    while ($r = mysqli_fetch_assoc($q)):?>
						    	<tr class='text-center' id="number<?=$r['ticket_order_id']?>">
									<td><?=$r["ticket_order_name"]?> <span style='border: 1px solid black;padding: 4px; border-radius: 20px; padding: 5px 6.5px'><?=$r["ticket_order_number"]?></span></td>
									<td></td>
									<td><?=$r["ticket_order_stack"]?> HTG</td>
									<td><small disabled class='fas fa-trash deleteRow' id="number<?=$r['ticket_order_id']?>"></small></td>
								</tr>
					    		<?php endwhile ?>
					    </tbody>
					</table> 
					<br><br><br><br><br><br><br>
					<br><br><br><br><br><br><br>
					<br><br><br><br><br><br><br>
				</div><!-- transaction Page -->
			</div><!-- main div -->
		</div><!-- container -->
	<?php include_once 'links/footer.php'; ?>
	</body>
</html>
<?php } ?>