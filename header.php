<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
     <title>Credit mate</title>
    <!--- Js-->
     <!-- BEGIN CORE FRAMEWORK -->
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link href="css/ionicons.min.css" rel="stylesheet" />
    <link href="css/font-awesome.min.css" rel="stylesheet" />
   <!-- END CORE FRAMEWORK -->
    
    <!-- BEGIN PLUGIN STYLES -->
    <link href="css/animate.css" rel="stylesheet" />
    <link href="css/slider.css" rel="stylesheet" />
    <link href="css/rickshaw.min.css" rel="stylesheet" />
    <link href="css/jquery-jvectormap-1.2.2.css" rel="stylesheet" />
    <link href="css/daterangepicker-bs3.css" rel="stylesheet" />
     <!-- END PLUGIN STYLES -->
    
    <!-- BEGIN THEME STYLES -->
    <link href="css/material.css" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet" />
    <link href="css/plugins.css" rel="stylesheet" />
    <link href="css/helpers.css" rel="stylesheet" />
    <link href="css/responsive.css" rel="stylesheet" />
     <link href="css/jquery-ui.css" rel="stylesheet" />
    <link href="assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css"/>
	
   
    <style>
        .fa-btn {
            margin-right: 6px;
        }
        .modal_new
        {
            position: fixed;
            z-index: 999;
            height: 100%;
            width: 100%;
            top: 0;
            left: 0;
            background-color: Black;
            filter: alpha(opacity=60);
            opacity: 0.6;
            -moz-opacity: 0.8;
        }
        .center
        {
            z-index: 1000;
            margin: 300px auto;
            padding: 10px;
            width: 150px;
            background-color: White;
            border-radius: 10px;
            filter: alpha(opacity=100);
            opacity: 1;
            -moz-opacity: 1;
        }
        .center img
        {
            height: 128px;
            width: 128px;
        }
		
		form.form-horizontal label.error, label.error {
			/* remove the next line when you have trouble in IE6 with labels in list */
			color: #a94442;
			display: inline-block;
			font-size: 12px;
			/* font-style: italic */
		}
</style>
</head>
<body  class="fixed-header">
    <!-- BEGIN HEADER -->
    <header>
        <a href="index.html" class="logo"><!--i class="ion-ios-bolt"></i>--> <span>Credit Mate</span></a>
        <nav class="navbar navbar-static-top">
            <a href="#" class="navbar-btn sidebar-toggle">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <div class="navbar-right">
                <!-- <form role="search" class="navbar-form pull-left" method="post" action="#">
                    <div class="btn-inline">
                        <input type="text" class="form-control padding-right-35" placeholder="Search..."/>
                        <button class="btn btn-link no-shadow bg-transparent no-padding-top padding-right-10" type="button"><i class="ion-search"></i></button>
                    </div>
                </form> -->
                <ul class="nav navbar-nav">
                                       <li class="dropdown dropdown-box dropdown-notifications">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="ion-android-person"></i>
                            </a>

                            <ul class="dropdown-menu user-account" style="width: 200px;text-align: center;">
                                                                    <li><a id="changepwdBtn" href="adminuser/changepassword"><i class="fa fa-btn fa-edit"></i>Change Password</a></li>
                                                                <li><a href="logout"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                       <!--   <li class="dropdown dropdown-box dropdown-notifications">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="ion-android-person"></i><span class="label bg-red-500 label-rounded">&nbsp;</span>
                        </a>
                        <ul class="dropdown-menu user-account" style="width: 150px;text-align: center;">
                            <li><a href="#"><i class="fa fa-user"></i> Profile</a></li> 
                            <li><a href="#"><i class="fa fa-group"></i>Contact</a></li> 
                            <li><a href="#"><i class="fa fa-inbox"></i>Mailbox</a></li> 
                            <li role="separator" class="divider"></li>
                            <li><a href="#"><i class="fa fa-sign-out"></i>Logout</a></li>
                        </ul>
                    </li>  -->                  
                                    </ul>
            </div>
        </nav>
    </header>
    <div class="wrapper">
	<!-- BEGIN LEFTSIDE -->
   	<!-- BEGIN LEFTSIDE -->
        <div class="leftside">
			<p class="short_logo">CM</p>
			<div class="sidebar">
			<!-- BEGIN RPOFILE -->
				<div class="nav-profile">
					<div class="thumb">
						<img src="assets/img/avatar.jpg" class="img-circle" alt="" />
						<span class="label label-danger label-rounded">3</span>
					</div>
					<div class="info">
						<a href="#">
							 Finance Manager 
													</a>
						<!-- <h6>Software Engineer <a href="#" class="info_drop" id="click_toggle"><i class="ion-chevron-down pull-right"></i></a></h6> -->
						<ul class="list-unstyled toogle_list" id="show_toogle">
							<li>Address</li>
							<li>Contact</li>
							<li>Email</li>
							<li>Social
								<div class="social_icons pull-right">
									<a href="#"><i class="fa fa-facebook-official"></i></a>
									<a href="#"><i class="fa fa-twitter"></i></a>
									<a href="#"><i class="fa fa-pinterest"></i></a>
                                </div>
							</li>							
						</ul>
						<ul class="tools list-inline">
							<li><a href="javascript:void(0);" data-toggle="tooltip" title="Settings"><i class="ion-gear-a"></i></a></li>
							<li><a href="javascript:void(0);" data-toggle="tooltip" title="Events"><i class="ion-earth"></i></a></li>
							<li><a href="javascript:void(0);" data-toggle="tooltip" title="Downloads"><i class="ion-archive"></i></a></li>
						</ul>
					</div>
				</div>
				<!-- END RPOFILE -->
				<!-- BEGIN NAV -->
				<div class="title">Navigation</div>
					<ul class="nav-sidebar">
						<li class="start ">
                            <a href="http://localhost/creditmate/public">
                                <i class="ion-home"></i> <span>Home</span>
                            </a>
                        </li>
												<li class="nav-dropdown " >
                            <a href="#">
                                <i class="ion-arrow-graph-up-right"></i> <span>Customer Management</span>
                                <i class="ion-chevron-right pull-right"></i>
                            </a>
                            <ul>
                            <li class="start ">
										<a href="dealer-pipeline">
										<i class="icon-bulb"></i>
										<span class="manage_display">Dealer Selection Form</span>
										</a>
									</li><li class="start ">
										<a href="customer-profile">
										<i class="icon-bulb"></i>
										<span class="manage_display">Customer Profile</span>
										</a>
									</li><li class="start ">
										<a href="score-sheet">
										<i class="icon-bulb"></i>
										<span class="manage_display">Score Sheet</span>
										</a>
									</li>                            </ul>
                        </li>
                        							<li class="nav-dropdown open" >
                            <a href="#">
                                <i class=""></i> <span>Finance Management</span>
                                <i class="ion-chevron-right pull-right"></i>
                            </a>
                            <ul>
                            <li class="start ">
										<a href="emi_send_mail">
										<i class="icon-bulb"></i>
										<span class="manage_display">Emi Presented</span>
										</a>
									</li><li class="start ">
										<a href="bank-transfer-response">
										<i class="icon-bulb"></i>
										<span class="manage_display">Bank Transfer Response</span>
										</a>
									</li><li class="start active">
										<a href="disbursement-files">
										<i class="icon-bulb"></i>
										<span class="manage_display">Disbursement File</span>
										</a>
									</li><li class="start ">
										<a href="nach-rejected">
										<i class="icon-bulb"></i>
										<span class="manage_display">NACH Rejected</span>
										</a>
									</li><li class="start ">
										<a href="emi-rejected">
										<i class="icon-bulb"></i>
										<span class="manage_display">EMI Outstanding</span>
										</a>
									</li><li class="start ">
										<a href="emi-dates-setup">
										<i class="icon-bulb"></i>
										<span class="manage_display">Emi Dates</span>
										</a>
									</li><li class="start ">
										<a href="cheque-deposited">
										<i class="icon-bulb"></i>
										<span class="manage_display">Cheque Deposits</span>
										</a>
									</li>                            </ul>
                        </li>
                                            </ul>
					<!-- END NAV -->
			</div><!-- /.sidebar -->
        </div>
		<!-- END LEFTSIDE -->
	<!-- END LEFTSIDE -->