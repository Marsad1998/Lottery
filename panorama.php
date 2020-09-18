<?php 
include_once "includes/header.php";
include_once "inc/code.php";

?>
<!-- start page content -->
<div class="page-content-wrapper">
    <div class="page-content">
		<div class="panel">
			<div class="panel-heading text-white purple-bgcolor"><h4>Summary of Transactions <small class="text-white" style="opacity: 90%">Direct or With Transaction</small></h4></div>
				<div class="panel-body">
					<form action="" method="POST" role="form">
						<div class="row">
							<div class="col-sm-3">
								<div class="form-group">
									<div class="row">
										<div class="col-sm-3">
											<label for="">Lottery</label>
										</div><!-- inner col -->
										<div class="col-sm-9">
											<select style="width: 100%" name="lottery_for_search" id="lottery_for_search" class="form-control-sm limit_per_ball1" required="required">
												<option value=""></option>
												<option class="text-uppercase" value="new york">new york</option>
												<option class="text-uppercase" value="florida">florida</option>
												<option class="text-uppercase" value="st-domingue">st-domingue</option>
											</select>
										</div><!-- inner col -->
									</div><!-- inner row -->
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col-sm-3">
											<label for="seller_id" class="mr-2">Seller</label>
										</div><!-- cil -->
										<div class="col-sm-9">
											<select style="width: 100%" name="seller_id" id="seller_id" class="form-control-sm limit_per_ball1" required="required">
												<option value=""></option>
												<?php $q = get($dbc,"seller WHERE seller_sts = 1");
												while ($r = mysqli_fetch_assoc($q)):?>
													<option value="<?=$r['seller_id']?>"><?=$r['seller_name']?></option>
												<?php endwhile ?>
											</select>
										</div><!-- cil -->
									</div><!-- inner row -->
								</div>
							</div><!-- col -->
							<div class="col-sm-4">
								<div class="form-group">
									<div class="row">
										<div class="col-sm-4">
											<label for="">Draw</label>
										</div><!-- cil -->
										<div class="col-sm-8">
											<select style="width: 100%" name="draw" id="draw" class="form-control-sm limit_per_ball1" required="required">
												<option value=""></option>
												<option class="text-uppercase" value="midi">midi</option>
												<option class="text-uppercase" value="evening">evening</option>
											</select>
										</div><!-- cil -->
									</div><!-- inner row -->
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col-sm-4">
											<label for="">Responsible</label>
										</div><!-- cil -->
										<div class="col-sm-8">
											<select style="width: 100%" name="responsible" id="responsible" class="form-control-sm limit_per_ball1" required="required">
												<option value=""></option>
												<?php $q = mysqli_query($dbc,"SELECT seller.*, post_manager.* FROM seller INNER JOIN post_manager ON post_manager.seller_id = seller.seller_id");
												while ($r = mysqli_fetch_assoc($q)):?>
													<option value="<?=$r['seller_id']?>"><?=$r['seller_name']?></option>
												<?php endwhile ?>
											</select>
										</div><!-- cil -->
									</div><!-- inner row -->
								</div>
							</div><!-- col -->
						</div><!-- row -->
					</form>
                    <div class="row">
                        <div class="offset-8 col-sm-4">
                            <div class="reportrange" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%"><input type="hidden" class="page_decide" value="sale_report">
                                <i class="fa fa-calendar"></i>&nbsp;
                                <span></span> <i class="fa fa-caret-down"></i>
                            </div>
                        </div>
                    </div>
                    <hr>
				</div>
			</div>
			<div class="panel">
				<div class="panel-heading">
					<div class="row ml-5">
						<div style="border: 1px solid; padding: 10px; margin-left: 15px; width: 160px;">
							<span class="text-primary">Borllete</span><br>
							<span class="text-secondary">0 Ball <br></span>
							0 <small>HTG</small> 
						</div> <!-- col -->
						<div style="border: 1px solid; padding: 10px; margin-left: 15px; width: 160px;">
							<span class="text-primary">Marriage</span><br>
							<span class="text-secondary">0 Ball <br></span>
							0 <small>HTG</small> 
						</div> <!-- col -->
						<div style="border: 1px solid; padding: 10px; margin-left: 15px; width: 160px;">
							<span class="text-primary">Marriage Gratis</span><br>
							<span class="text-secondary">0 Ball <br></span>
							0 <small>HTG</small> 
						</div> <!-- col -->
						<div style="border: 1px solid; padding: 10px; margin-left: 15px; width: 160px;">
							<span class="text-primary">Loto 3</span><br>
							<span class="text-secondary">0 Ball <br></span>
							0 <small>HTG</small> 
						</div> <!-- col -->
						<div style="border: 1px solid; padding: 10px; margin-left: 15px; width: 160px;">
							<span class="text-primary">Loto 4</span><br>
							<span class="text-secondary">0 Ball <br></span>
							0 <small>HTG</small> 
						</div> <!-- col -->
						<div style="border: 1px solid; padding: 10px; margin-left: 15px; width: 160px;">
							<span class="text-primary">Loto 5</span><br>
							<span class="text-secondary">0 Ball <br></span>
							0 <small>HTG</small> 
						</div> <!-- col -->
					</div><!-- row -->
					<br>
					<div class="row">
						<div style="margin-left: 15px; width: 180px; background-color: #f1f1f1; padding: 10px">
							Top Borllete <hr>
							<?php 
								$q1 = get($dbc,"ticket_orders WHERE ticket_order_name = 'borlette' GROUP BY ticket_order_number");
								while ($r1 = mysqli_fetch_assoc($q1)):?>
							<span>
								<div class="row">
									<div class="col-sm-3">
										<small style="border: 1px solid; background-color: white; border-radius: 100%; padding: 10px 12px">
											<?=$r1['ticket_order_number'] ?>
										</small>
									</div><!-- col -->
									<div class="col-sm-8 ml-3">
										<small>
											<strong>
												Numbers :  <?php 
														$totalDynamic = 0;
											$numberSql = get($dbc,"ticket_orders WHERE ticket_order_number = '".$r1['ticket_order_number']."' AND ticket_order_name = 'borlette'"); 
														while ($r2 = mysqli_fetch_assoc($numberSql)) {
															$totalDynamic += 1;
														}
														echo $totalDynamic;
													?>
											</strong>
										</small><br>
									</div><!-- col -->
								</div><!-- row -->
								<br>
								<span class="row">
									<span class="col-sm-12">
										<small><strong class="text-primary">Date : <?= date('d/m/y', strtotime($r1['ticket_order_time']))?></strong></small><br>
										<strong class="text-danger h5"><?= number_format($r1['ticket_order_stack'], 3) ?> HTG</strong>
										<hr style="border-bottom: 1px dashed black">
										<hr style="border-bottom: 1px dashed black">
										<small><strong>New York - Evening</strong></small><br>
										<small><strong>Payable : 0.00 HTG</strong></small><br>
									</span>
								</span>
							</span>
							<hr style="border:1px dashed green"> 
							<?php endwhile ?>
						</div> <!-- col --><div style="margin-left: 15px; width: 180px; background-color: #f1f1f1; padding: 10px">
							Top Marriage <hr>
							<?php 
								$q1 = get($dbc,"ticket_orders WHERE ticket_order_name = 'wedding' GROUP BY ticket_order_number");
								while ($r1 = mysqli_fetch_assoc($q1)):?>
							<span>
								<div class="row">
									<div class="col-sm-3">
										<small style="border: 1px solid; background-color: white; border-radius: 100%; padding: 10px 12px">
											<?=$r1['ticket_order_number'] ?>
										</small>
									</div><!-- col -->
									<div class="col-sm-8 ml-3">
										<small>
											<strong>
												Numbers : <?php 
														$totalDynamic = 0;
											$numberSql = get($dbc,"ticket_orders WHERE ticket_order_number = '".$r1['ticket_order_number']."' AND ticket_order_name = 'wedding'"); 
														while ($r2 = mysqli_fetch_assoc($numberSql)) {
															$totalDynamic += 1;
														}
														echo $totalDynamic;
													?>
											</strong>
										</small><br>
									</div><!-- col -->
								</div><!-- row -->
								<br>
								<span class="row">
									<span class="col-sm-12">
										<small><strong class="text-primary">Date : <?= date('d/m/y', strtotime($r1['ticket_order_time']))?></strong></small><br>
										<strong class="text-danger h5"><?= number_format($r1['ticket_order_stack'], 3) ?> HTG</strong>
										<hr style="border-bottom: 1px dashed black">
										<hr style="border-bottom: 1px dashed black">
										<small><strong>New York - Evening</strong></small><br>
										<small><strong>Payable : 0.00 HTG</strong></small><br>
									</span>
								</span>
							</span>
							<hr style="border:1px dashed green"> 
							<?php endwhile ?>
						</div> <!-- col -->
						<div style="margin-left: 15px; width: 180px; background-color: #f1f1f1; padding: 10px">
							Top Marraige <small>Gratis</small> <hr>
							<?php 
								$q1 = get($dbc,"ticket_orders WHERE ticket_order_name = 'wedding' GROUP BY ticket_order_number");
								while ($r1 = mysqli_fetch_assoc($q1)):?>
							<span>
								<div class="row">
									<div class="col-sm-3">
										<small style="border: 1px solid; background-color: white; border-radius: 100%; padding: 10px 12px">
											<?=$r1['ticket_order_number'] ?>
										</small>
									</div><!-- col -->
									<div class="col-sm-8 ml-3">
										<small>
											<strong>
										Numbers : <?php 
														$totalDynamic = 0;
											$numberSql = get($dbc,"ticket_orders WHERE ticket_order_number = '".$r1['ticket_order_number']."' AND ticket_order_name = 'wedding'"); 
														while ($r2 = mysqli_fetch_assoc($numberSql)) {
															$totalDynamic += 1;
														}
														echo $totalDynamic;
													?>  22
											</strong>
										</small><br>
									</div><!-- col -->
								</div><!-- row -->
								<br>
								<span class="row">
									<span class="col-sm-12">
										<small><strong class="text-primary">Date : <?= date('d/m/y', strtotime($r1['ticket_order_time']))?></strong></small><br>
										<strong class="text-danger h5"><?= number_format($r1['ticket_order_stack'], 3) ?> HTG</strong>
										<hr style="border-bottom: 1px dashed black">
										<hr style="border-bottom: 1px dashed black">
										<small><strong>New York - Evening</strong></small><br>
										<small><strong>Payable : 0.00 HTG</strong></small><br>
									</span>
								</span>
							</span>
							<hr style="border:1px dashed green"> 
							<?php endwhile ?>
						</div> <!-- col -->
						<div style="margin-left: 15px; width: 180px; background-color: #f1f1f1; padding: 10px">
							Top Loto 3 <hr>
							<?php 
								$q1 = get($dbc,"ticket_orders WHERE ticket_order_name = '_3' GROUP BY ticket_order_number");
								while ($r1 = mysqli_fetch_assoc($q1)):?>
							<span>
								<div class="row">
									<div class="col-sm-3">
										<small style="border: 1px solid; background-color: white; border-radius: 100%; padding: 10px 12px">
											<?=$r1['ticket_order_number'] ?>
										</small>
									</div><!-- col -->
									<div class="col-sm-8 ml-3">
										<small>
											<strong>
												Numbers : <?php 
														$totalDynamic = 0;
											$numberSql = get($dbc,"ticket_orders WHERE ticket_order_number = '".$r1['ticket_order_number']."' AND ticket_order_name = '_3'"); 
														while ($r2 = mysqli_fetch_assoc($numberSql)) {
															$totalDynamic += 1;
														}
														echo $totalDynamic;
													?>
											</strong>
										</small><br>
									</div><!-- col -->
								</div><!-- row -->
								<br>
								<span class="row">
									<span class="col-sm-12">
										<small><strong class="text-primary">Date : <?= date('d/m/y', strtotime($r1['ticket_order_time']))?></strong></small><br>
										<strong class="text-danger h5"><?= number_format($r1['ticket_order_stack'], 3) ?> HTG</strong>
										<hr style="border-bottom: 1px dashed black">
										<hr style="border-bottom: 1px dashed black">
										<small><strong>New York - Evening</strong></small><br>
										<small><strong>Payable : 0.00 HTG</strong></small><br>
									</span>
								</span>
							</span>
							<hr style="border:1px dashed green"> 
							<?php endwhile ?>
						</div> <!-- col -->
						<div style="margin-left: 15px; width: 180px; background-color: #f1f1f1; padding: 10px">
							Top Loto 4 <hr>
							<?php 
								$q1 = get($dbc,"ticket_orders WHERE ticket_order_name = '4' GROUP BY ticket_order_number");
								while ($r1 = mysqli_fetch_assoc($q1)):?>
							<span>
								<div class="row">
									<div class="col-sm-3">
										<small style="border: 1px solid; background-color: white; border-radius: 100%; padding: 10px 12px">
											<?=$r1['ticket_order_number'] ?>
										</small>
									</div><!-- col -->
									<div class="col-sm-8 ml-3">
										<small>
											<strong>
												Numbers : <?php 
														$totalDynamic = 0;
											$numberSql = get($dbc,"ticket_orders WHERE ticket_order_number = '".$r1['ticket_order_number']."' AND ticket_order_name = '4'"); 
														while ($r2 = mysqli_fetch_assoc($numberSql)) {
															$totalDynamic += 1;
														}
														echo $totalDynamic;
													?>
											</strong>
										</small><br>
									</div><!-- col -->
								</div><!-- row -->
								<br>
								<span class="row">
									<span class="col-sm-12">
										<small><strong class="text-primary">Date : <?= date('d/m/y', strtotime($r1['ticket_order_time']))?></strong></small><br>
										<strong class="text-danger h5"><?= number_format($r1['ticket_order_stack'], 3) ?> HTG</strong>
										<hr style="border-bottom: 1px dashed black">
										<hr style="border-bottom: 1px dashed black">
										<small><strong>New York - Evening</strong></small><br>
										<small><strong>Payable : 0.00 HTG</strong></small><br>
									</span>
								</span>
							</span>
							<hr style="border:1px dashed green"> 
							<?php endwhile ?>
						</div> <!-- col -->
						<div style="margin-left: 15px; width: 180px; background-color: #f1f1f1; padding: 10px">
							Top Loto 5 <hr>
							<?php 
								$q1 = get($dbc,"ticket_orders WHERE ticket_order_name = '5' GROUP BY ticket_order_number");
								while ($r1 = mysqli_fetch_assoc($q1)):?>
							<span>
								<div class="row">
									<div class="col-sm-3">
										<small style="border: 1px solid; background-color: white; border-radius: 100%; padding: 10px 12px">
											<?=$r1['ticket_order_number'] ?>
										</small>
									</div><!-- col -->
									<div class="col-sm-8 ml-3">
										<small>
											<strong>
												Numbers : <?php 
														$totalDynamic = 0;
											$numberSql = get($dbc,"ticket_orders WHERE ticket_order_number = '".$r1['ticket_order_number']."' AND ticket_order_name = '5'"); 
														while ($r2 = mysqli_fetch_assoc($numberSql)) {
															$totalDynamic += 1;
														}
														echo $totalDynamic;
													?>
											</strong>
										</small><br>
									</div><!-- col -->
								</div><!-- row -->
								<br>
								<span class="row">
									<span class="col-sm-12">
										<small><strong class="text-primary">Date : <?= date('d/m/y', strtotime($r1['ticket_order_time']))?></strong></small><br>
										<strong class="text-danger h5"><?= number_format($r1['ticket_order_stack'], 3) ?> HTG</strong>
										<hr style="border-bottom: 1px dashed black">
										<hr style="border-bottom: 1px dashed black">
										<small><strong>New York - Evening</strong></small><br>
										<small><strong>Payable : 0.00 HTG</strong></small><br>
									</span>
								</span>
							</span>
							<hr style="border:1px dashed green"> 
							<?php endwhile ?>
						</div> <!-- col -->
					</div><!-- row -->
				</div>
			</div>
		</div>
	</div>
</div>

<?php
include_once "includes/footer.php";
?>