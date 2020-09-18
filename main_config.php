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
                    <div class="page-title">Manage Tickets</div>
                    </div>
                    <ol class="breadcrumb page-breadcrumb pull-right">
                        <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="dashboard.php">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                        </li>
                        <li class="active">Manage Tickets</li>
                    </ol>
                </div>
            </div>
            <div class="col-sm-12">
		        <div class="panel">
    	            <div class="panel-heading cyan-bgcolor" align="center"><h4>Tickets Details</h4></div>
	                <div class="panel-body">
                        <a class="btn btn-success float-right mr-4" data-toggle="modal" href='#modal-id'>Add COnfigs</a>
                        <br><br>
			        <table class="table" id="configs">
				        <thead>
				            <tr>
                                <th>ID</th>
                                <th>Lottery</th>
                                <th>Noon Start</th>
                                <th>Noon End</th>
                                <th>Early Evening</th>
                                <th>Evening End</th>
                                <th>Action</th>
				            </tr>
				        </thead>
	    			    <tbody>
    	    			</tbody>			
			        </table>
	            </div>
            </div>
        </div>
    </div> <!--  -->    
</div><!-- page wrapper -->
<?php
include_once "includes/footer.php";
?>

<div class="modal fade" id="modal-id">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Manage Configurations</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <form action="php_action/custom_action.php" id="formData"> 
                    <div class="msg"></div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-gorup">
                            <label for="config_country">Lottery</label>
                            <input type="text" name="config_country" class="form-control" id="config_country" readonly="" value="New York">
                        </div><!-- form group -->
                    </div><!-- col -->
                </div><!-- row -->
                <div class="row">
                    <div class="col-sm-6">
                        <label for="config_start">Midday Evening Draw</label>
                        <input type="text" placeholder="HH: mm: ss" name="config_start" id="config_start" class="form-control">
                    </div><!-- col -->
                    <div class="col-sm-6">
                        <label for="config_end">Midi Fine Print</label>
                        <input type="text" placeholder="HH: mm: ss" name="config_end" id="config_end" class="form-control">
                    </div><!-- col -->
                </div><!-- row -->
                <div class="row">
                    <div class="col-sm-6">
                        <label for="config_early_draw">Early Evening Draw</label>
                        <input type="text" placeholder="HH: mm: ss" name="config_early_draw" id="config_early_draw" class="form-control">
                        <input type="text" name="config_id" id="config_id" class="d-none">
                    </div><!-- col -->
                    <div class="col-sm-6">
                        <label for="config_evening_draw">Fine Evening Dra</label>
                        <input type="text" placeholder="HH: mm: ss" name="config_evening_draw" id="config_evening_draw" class="form-control">
                    </div><!-- col -->
                </div><!-- row -->
                <div class="row">
                    <div class="col-sm-2">
                        <label for="config_1st_lot">Amount 1st Lot</label>
                        <input type="text" name="config_1st_lot" id="config_1st_lot" class="form-control">
                    </div><!-- col -->
                    <div class="col-sm-2">
                        <label for="config_2nd_lot">Amount 2nd Lot</label>
                        <input type="text" name="config_2nd_lot" id="config_2nd_lot" class="form-control">
                    </div><!-- col -->
                    <div class="col-sm-2">
                        <label for="config_3rd_lot">Amount 3rd Lot</label>
                        <input type="text" name="config_3rd_lot" id="config_3rd_lot" class="form-control">
                    </div><!-- col -->
                    <div class="col-sm-2">
                        <label for="config_loto_3">Loto 3 Amount</label>
                        <input type="text" name="config_loto_3" id="config_loto_3" class="form-control">
                    </div><!-- col -->
                    <div class="col-sm-2">
                        <label for="config_loto_4">Loto 4 Amount</label>
                        <input type="text" name="config_loto_4" id="config_loto_4" class="form-control">
                    </div><!-- col -->
                    <div class="col-sm-2">
                        <label for="config_loto_5">Loto 5 Amount</label>
                        <input type="text" name="config_loto_5" id="config_loto_5" class="form-control">
                    </div><!-- col -->
                </div><!-- row -->
                <div class="row">
                    <div class="col-sm-6">
                        <label for="marraige1">Wedding Amount</label>
                        <input type="text" id="marraige1" name="marraige1" class="form-control">
                    </div><!-- col -->
                    <div class="col-sm-6">
                        <label for="marraige2">Free Marriage Amount</label>
                        <input type="text" id="marraige2" name="marraige2" class="form-control">
                    </div><!-- col -->
                </div><!-- row -->
                <div class="row">
                    <div class="col-sm-12">
                        <label for="">Email Notifications</label>
                        <textarea class="form-control" rows="3" required="required"></textarea>
                    </div><!-- col -->
                </div><!-- row -->
                <legend>Free Wedding Configuration</legend>
                <div class="row">
                    <div class="col-sm-6">
                        <label for="from_amount_played">From Amount Played</label>
                        <input type="text" name="from_amount_played" id="from_amount_played" class="form-control">
                    </div><!-- col -->
                    <div class="col-sm-6">
                        <label for="gen_quantity_wed_free">Generated Quantity Wedding Free</label>
                        <input type="text" name="gen_quantity_wed_free" id="gen_quantity_wed_free" class="form-control">
                    </div><!-- col -->
                </div><!-- row -->
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save changes</button>
                </form>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>