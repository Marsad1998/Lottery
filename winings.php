<?php 
include_once "includes/header.php";
include_once "inc/code.php";

?>
<!-- start page content -->
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="page-bar">
            <div class="page-title-breadcrumb">
                <div class="pull-left">
                    <div class="page-title">List of Winning Numbers <a href="#modal-1" class="btn btn-sm btn-primary ml-5" data-toggle="modal" href='#modal-id'><i class="fa fa-pencil"></i> Add New</a></div>
                </div>
                <ol class="breadcrumb page-breadcrumb pull-right">
                    <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="dashboard.php">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                    </li>
                    <li class="active">List of Winning Numbers</li>
                </ol>
            </div>
        </div>
        <div class="panel">
            <div class="panel-heading text-white cyan-bgcolor"><h4>List of Winning Numbers</h4></div>
                <div class="panel-body">
                    <table class="table" id="winning_numbers">
                        <thead>
                            <tr>    
                                <th>ID</th>
                                <th>Date Transaction</th>
                                <th>Lottery</th>
                                <th>Draw</th>
                                <th>Numbers</th>
                                <th>Win4</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>            
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include_once "includes/footer.php";
?>

<!-- <script>
    $(document).ready(function () {
        $("#modal-1").modal('show')
    })
</script> -->

<div class="modal fade" id="modal-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add a New Wining Number</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="php_action/custom_action.php" method="POST" role="form" id="formData">
                <div class="msg"></div>
                <div class="form-group">
                    <label for="wining_date">Date Transaction *</label>
                    <input type="date" class="form-control" id="wining_date" name="wining_date"> 
                    <input type="text" class="form-control d-none" id="winning_numbers_id" name="winning_numbers_id"> 
                </div>
                <div class="form-group">
                    <label for="lottery_for_wining">Lottery *</label>
                    <select style="width: 100%" name="lottery_for_wining" id="lottery_for_wining" class="form-control limit_per_ball" required="required">
                        <option value=""></option>
                        <option class="text-uppercase" value="new york">new york</option>
                        <option class="text-uppercase" value="florida">florida</option>
                        <option class="text-uppercase" value="st-domingue">st-domingue</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="draw">Lottery *</label>
                    <select style="width: 100%" name="draw" id="draw" class="form-control limit_per_ball" required="required">
                        <option value=""></option>
                        <option class="text-uppercase" value="midi">midi</option>
                        <option class="text-uppercase" value="evening">evening</option>
                    </select>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-6">
                            <label for="">Numbers</label>
                            <input type="text" class="form-control" id="numbers" name="numbers"> 
                        </div><!-- col -->
                        <div class="col-sm-6">
                            <label for="">Win4</label>
                            <input type="text" class="form-control" id="win4" name="win4"> 
                        </div><!-- col -->
                    </div><!-- row -->
                </div>
                <div class="form-group">
                    <label for="status">Status *</label>
                    <select style="width: 100%" name="status" id="status" class="form-control limit_per_ball" required="required">
                        <option value=""></option>
                        <option class="text-uppercase" value="1">new</option>
                    </select>
                </div>

                <div class="row">
                    <div class="col-sm-6 offset-3">
                        <button type="submit" class="btn btn-primary align-content-end" class="saveData"><i class="fa fa-edit"></i> Save</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-trash"></i> To Cancel</button>
                    </div>
                </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal <-->