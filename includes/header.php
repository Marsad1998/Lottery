<?php
include_once "php_action/db_connect.php";
include_once "php_action/core.php";

$user = $_SESSION['userId'];
$fetch_globeluser = mysqli_fetch_assoc(mysqli_query($dbc,"SELECT * FROM users WHERE user_id = '$user'"));

$globel_id = $fetch_globeluser['user_id'];
$globel_username = $fetch_globeluser['username'];
$glober_role = $fetch_globeluser['user_role'];

?>

<!DOCTYPE html>
<html lang="en">
<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta name="description" content="Responsive Admin Template" />
    <meta name="author" content="SmartUniversity" />
    
    <?php
       $sql = "SELECT * FROM company ORDER BY id ASC LIMIT 1";
        $result = $connect->query($sql);
        while($row = $result->fetch_array()) {
            $company_name  = $row['name'];
        ?>

    <title><?php echo $row['name']; ?></title>
  <link rel="icon" href="img/upload/<?= $row['logo']; ?>" type="image/gif" sizes="16x16"> 
    <?php
    $logo = $row['logo'];
 } 
    ?>
    
    <!-- google font -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet" type="text/css" />
	<!-- icons -->
    <link href="assets/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
	<!--bootstrap -->
	<link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="assets/plugins/summernote/summernote.css" rel="stylesheet">
    <!-- morris chart -->
    <link href="assets/plugins/morris/morris.css" rel="stylesheet" type="text/css" />
    <!-- Material Design Lite CSS -->
	<link rel="stylesheet" href="assets/plugins/material/material.min.css">
	<link rel="stylesheet" href="assets/css/material_style.css">
	<!-- animation -->
	<link href="assets/css/pages/animate_page.css" rel="stylesheet">
	<!-- Template Styles -->
    <link href="assets/css/plugins.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/style.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/pages/formlayout.css" rel="stylesheet" type="text/css" /> 
    <link href="assets/css/theme-color.css" rel="stylesheet" type="text/css" />
	<!-- favicon -->
    <link rel="shortcut icon" href="assets/img/favicon.ico" /> 
    <!-- Data Table -->
    <link href="assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css"/>
    <!-- <link rel="stylesheet" href="https://resources/demos/style.css">   -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <link rel="stylesheet" href="assets/plugins/material-datetimepicker/bootstrap-material-datetimepicker.css" />

    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

    <!-- customizarion start -->
    <!-- <link rel="stylesheet" href="../inc/functions.php"> -->
    <?php include_once 'inc/functions.php'; ?>
 </head>
 <!-- END HEAD -->
<body class="page-header-fixed sidemenu-closed-hidelogo page-content-white page-md header-white dark-sidebar-color logo-dark">
    <div class="page-wrapper">
        <!-- start header -->
        <div class="page-header navbar navbar-fixed-top">
            <div class="page-header-inner ">
                <!-- logo start -->
                <div class="page-logo">
                    <a href="dashboard.php">
                    <!-- <img style="width: 100%" src="img/uploads/<?=$logo?>"> -->
                    <span class="logo-default" ></span> <?=$company_name?></a>
                </div>
                <!-- logo end -->
				<ul class="nav navbar-nav navbar-left in">
					<li><a href="#" class="menu-toggler sidebar-toggler"><i class="icon-menu"></i></a></li>
				</ul>
                 <form class="search-form-opened" action="#" method="GET">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search..." name="query">
                        <span class="input-group-btn search-btn">
                          <a href="javascript:;" class="btn submit">
                             <i class="icon-magnifier"></i>
                           </a>
                        </span>
                    </div>
                </form>
                
                <!-- start mobile menu -->
                <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
                    <span></span>
                </a>
               <!-- end mobile menu -->
                <!-- start header menu -->
                <div class="top-menu">
                    <ul class="nav navbar-nav pull-right">
                        <!-- start notification dropdown -->
                        <li> <?php  include_once"translator.php"  ?></li>
                        <li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                <i class="fa fa-bell-o"></i>
                                <span class="badge headerBadgeColor1"> 6 </span>
                            </a>
                            <ul class="dropdown-menu animated swing">
                                <li class="external">
                                    <h3><span class="bold">Notifications</span></h3>
                                    <span class="notification-label purple-bgcolor">New 6</span>
                                </li>
                                <li>
                                    <ul class="dropdown-menu-list small-slimscroll-style" data-handle-color="#637283">
                                        <li>
                                            <a href="javascript:;">
                                                <span class="time">just now</span>
                                                <span class="details">
                                                <span class="notification-icon circle deepPink-bgcolor"><i class="fa fa-check"></i></span> Congratulations!. </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;">
                                                <span class="time">1 mins</span>
                                                <span class="details">
                                                <span class="notification-icon circle purple-bgcolor"><i class="fa fa-user o"></i></span>
                                                <b>Admin </b>Login Now. </span>
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="dropdown-menu-footer">
                                        <a href="javascript:void(0)"> All notifications </a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <!-- end notification dropdown -->
                        <!-- start message dropdown -->
 						<li class="dropdown dropdown-extended dropdown-inbox" id="header_inbox_bar">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                <i class="fa fa-envelope-o"></i>
                                <span class="badge headerBadgeColor2"> 2 </span>
                            </a>
                            <ul class="dropdown-menu animated slideInDown">
                                <li class="external">
                                    <h3><span class="bold">Messages</span></h3>
                                    <span class="notification-label cyan-bgcolor">New 2</span>
                                </li>
                                <li>
                                    <ul class="dropdown-menu-list small-slimscroll-style" data-handle-color="#637283">

                                    </ul>
                                    <div class="dropdown-menu-footer">
                                        <a href="#"> All Messages </a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <!-- end message dropdown -->
 						<!-- start manage user dropdown -->
 						<li class="dropdown dropdown-user">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                <!-- <img alt="" class="img-circle " src="img/uploads/<?=$logo?>" /> -->
                                <span class="username username-hide-on-mobile"> <?=$company_name?> </span>
                                <i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-default animated jello">
                                <li>
                                    <a href="setting.php">
                                        <i class="icon-settings"></i> Settings
                                    </a>
                                </li>
                                <li>
                                    <a href="logout.php">
                                        <i class="icon-logout"></i> Log Out </a>
                                </li>
                            </ul>
                        </li>
                        <!-- end manage user dropdown -->
                        <li class="dropdown dropdown-quick-sidebar-toggler">
                             <a id="headerSettingButton" class="mdl-button mdl-js-button mdl-button--icon pull-right" data-upgraded=",MaterialButton">
	                           <i class="material-icons">settings</i>
	                        </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- end header -->
        <!-- start page container -->
        <div class="page-container">

 			<!-- start sidebar menu -->
 			<div class="sidebar-container">
 				<div class="sidemenu-container navbar-collapse collapse fixed-menu">
	                <div id="remove-scroll">
	                    <ul class="sidemenu page-header-fixed sidemenu-closed p-t-20" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
	                        <li class="sidebar-toggler-wrapper hide">
	                            <div class="sidebar-toggler">
	                                <span></span>
	                            </div>
	                        </li>
	                        <li class="sidebar-user-panel">
	                            <div class="user-panel">
	                                <div class="row">
                                            <div class="sidebar-userpic">
                                                <img src="img/uploads/<?=$logo?>" class="img-responsive" alt="Error 404"> </div>
                                        </div>
                                        <div class="profile-usertitle">
                                            <div class="sidebar-userpic-name text-center"> <?=$company_name; ?> </div>
                                            <div class="profile-usertitle-job"> <?=$glober_role?> </div>
                                        </div>
                                        <div class="sidebar-userpic-btn">
									        <a class="tooltips" href="setting.php" data-placement="top" data-original-title="Profile">
									        	<i class="material-icons">person_outline</i>
									        </a>
									        <a class="tooltips" href="#" data-placement="top" data-original-title="Mail">
									        	<i class="material-icons">mail_outline</i>
									        </a>
									        <a class="tooltips" href="#" data-placement="top" data-original-title="Chat">
									        	<i class="material-icons">chat</i>
									        </a>
									        <a class="tooltips" href="logout.php" data-placement="top" data-original-title="Logout">
									        	<i class="material-icons">input</i>
									        </a>
									    </div>
	                            </div>
	                        </li>
	                        <li class="menu-heading">
			                	<span>-- Main</span>
			                </li>
                            <li class="nav-item">
                                <a href="index.php" class="nav-link ">
                                    <i class="material-icons">dashboard</i>
                                    <span class="title">Dashboard</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link nav-toggle">
                                    <i class="material-icons">account_balance</i>
                                    <span class="title">Administration</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item">
                                        <a href="privileges.php" class="nav-link ">
                                            <span class="title">Group Management</span>
                                        </a>
                                    </li>
                                    <li class="nav-item ">
                                        <a href="sellers.php" class="nav-link ">
                                            <span class="title">User Management</span>
                                        </a>
                                    </li>
                                    <li class="nav-item ">
                                        <a href="post_manager.php" class="nav-link ">
                                            <span class="title">Post Manager</span>
                                        </a>
                                    </li>
                                    <li class="nav-item ">
                                        <a href="post_management.php" class="nav-link ">
                                            <span class="title">Post Management</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link nav-toggle">
                                    <i class="material-icons">settings</i>
                                    <span class="title">Configuration</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item">
                                        <a href="main_config.php" class="nav-link ">
                                            <span class="title">General</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="limit_per_game.php" class="nav-link ">
                                            <span class="title">Limitation Per Game</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="limit_per_ball.php" class="nav-link ">
                                            <span class="title">Limitation Per Ball</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="overview_of_limits.php?type=game" class="nav-link ">
                                            <span class="title">Overview of Limitation Per Game</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="overview_of_limits.php?type=ball" class="nav-link ">
                                            <span class="title">Overview of Limitation Per Ball</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="panorama.php" class="nav-link ">
                                    <i class="fa fa-calendar"></i>
                                    <span class="title">Panorama</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="winings.php" class="nav-link ">
                                    <i class="fa fa-trophy"></i>
                                    <span class="title">Wining Number</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="" class="nav-link ">
                                    <i class="fa fa-trash"></i>
                                    <span class="title">Eliminate Sheet</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link nav-toggle">
                                    <i class="fa fa-folder"></i>
                                    <span class="title">With</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item">
                                        <a href="balance_sheet.php" class="nav-link ">
                                            <span class="title">Balance to Pay</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="sale_report.php" class="nav-link ">
                                    <i class="fa fa-sort-amount-asc"></i>
                                    <span class="title">Sale Report</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="sale_report.php" class="nav-link ">
                                    <i class="fa fa-sort-amount-desc"></i>
                                    <span class="title">Payement Report</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="winning_report.php" class="nav-link ">
                                    <i class="fa fa-cogs"></i>
                                    <span class="title">Wining Report</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="lottery.php" class="nav-link ">
                                    <i class="fa fa-power-off"></i>
                                    <span class="title">Logout</span>
                                </a>
                            </li>
	                </div>
                </div>
            </div>
            <!-- end sidebar menu -->