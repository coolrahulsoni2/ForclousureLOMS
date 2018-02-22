<?php

ob_start();

/********  Photo Like Request  ***/
function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}


/**** Function for get visitor Ip Address **/

function getVisitorIP() {
	
		//Just get the headers if we can or else use the SERVER global
		if ( function_exists( 'apache_request_headers' ) ) {
			$headers = apache_request_headers();
		} else {
			$headers = $_SERVER;
		}
		//Get the forwarded IP if it exists
		if ( array_key_exists( 'X-Forwarded-For', $headers ) && filter_var( $headers['X-Forwarded-For'], FILTER_VALIDATE_IP, FILTER_FLAG_IPV4 ) ) {
			$the_ip = $headers['X-Forwarded-For'];
		} elseif ( array_key_exists( 'HTTP_X_FORWARDED_FOR', $headers ) && filter_var( $headers['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP, FILTER_FLAG_IPV4 )
		) {
			$the_ip = $headers['HTTP_X_FORWARDED_FOR'];
		} else {
			
			$the_ip = filter_var( $_SERVER['REMOTE_ADDR'], FILTER_VALIDATE_IP, FILTER_FLAG_IPV4 );
		}
		return $the_ip;
	}
	
	
$req=$_POST['req'];
include "dao.php";	

/*** Add Email Subscription */
if($req=="addDbEmailSubscriber"){
	
	$email=trim(test_input(strtolower($_POST['email'])));	
	if($email=="")
	{
		$result['data']='Please Enter Email Id here For Subscription';
		header('Content-type: application/json');
        echo json_encode($result);
	}
	else{
		
		if(filter_var($email, FILTER_VALIDATE_EMAIL) == false){
		
		$result['data']='Please Enter A Valid Email Id here For Subscription';
		header('Content-type: application/json');
        echo json_encode($result);
		}
		else{
					
	/*** Searching For Same email in The Profile ***/
	$resultDb = mysqli_query($con,"SELECT `id`,`email` FROM  `emailsubscriber` where `email`='".$email."'");
		if(!(mysqli_num_rows($resultDb) > 0) ){	
			
			$getVisitorIP=getVisitorIP();
			$sqlAddEmailSubcriber="INSERT INTO `emailsubscriber` (`id`, `email`, `emailAddTime`,`subscriberIpAddress`) VALUES ('','".$email."','".time()."' , '".$getVisitorIP."')";
			
			if(mysqli_query($con,$sqlAddEmailSubcriber)){
				
					include("plugins/PHPMailer/class.phpmailer.php");
					include("plugins/PHPMailer/PHPMailerAutoload.php");
					
						//PHPMailer Object
						$mail = new PHPMailer();
						
						//From email address and name
						$mail->From = "Info@RajasthanFilms.com";
						$mail->FromName = "Rajasthan Films";

						//To address and name
						$mail->addAddress($email);
						//$mail->addAddress("rsoni.sum@gmail.com");//Recipient name is optional

						//Address to which recipient will reply
						$mail->addReplyTo("rajasthanfilm@gmail.com", "Reply");

						//CC and BCC
						/*
						$mail->addCC("cc@example.com");
						$mail->addBCC("bcc@example.com");*/

						//Send php or Plain Text email
						$mail->isphp(true);

						$mail->Subject = "Welcome in Rajasthan Films";
						$mail->Body = '<style type="text/css">
            /*********************************************************************
            Ink - Responsive Email Template Framework Based: http://zurb.com/ink/
            *********************************************************************/
            #outlook a { 
            padding:0; 
            } 
            body{ 
            width:100% !important; 
            min-width: 100%;
            -webkit-text-size-adjust:100%; 
            -ms-text-size-adjust:100%; 
            margin:0; 
            padding:0;
            }         
            img { 
            outline:none; 
            text-decoration:none; 
            -ms-interpolation-mode: bicubic;
            width: auto; 
            height: auto;
            max-width: 100%;
            float: left; 
            clear: both; 
            display: block;
            }
            @media screen and (min-width:0\0) {  
                  /* IE9 and IE10 rule sets go here */  
                  img.ie10-responsive { 
                        width: 100% !important;
                  }
            }  
            center {
            width: 100%;
            min-width: 580px;
            }
            a img { 
            border: none;
            }
            p {
            margin: 0 0 0 10px;
            }
            table {
            border-spacing: 0;
            border-collapse: collapse;
            }
            td { 
            word-break: break-word;
            -webkit-hyphens: auto;
            -moz-hyphens: auto;
            hyphens: auto;
            border-collapse: collapse !important; 
            }
            table, tr, td {
            padding: 0;
            vertical-align: top;
            text-align: left;
            }
            hr {
            color: #d9d9d9; 
            background-color: #d9d9d9; 
            height: 1px; 
            border: none;
            }
            /* Responsive Grid */
            table.body {
            height: 100%;
            width: 100%;
            }
            table.container {
            width: 580px;
            margin: 0 auto;
            text-align: inherit;
            }
            table.row { 
            padding: 0px; 
            width: 100%;
            position: relative;
            }
            table.container table.row {
            display: block;
            }
            td.wrapper {
            padding: 10px 20px 0px 0px;
            position: relative;
            }
            table.columns,
            table.column {
            margin: 0 auto;
            }
            table.columns td,
            table.column td {
            padding: 0px 0px 10px; 
            }
            table.columns td.sub-columns,
            table.column td.sub-columns,
            table.columns td.sub-column,
            table.column td.sub-column {
            padding-right: 10px;
            }
            td.sub-column, td.sub-columns {
            min-width: 0px;
            }
            table.row td.last,
            table.container td.last {
            padding-right: 0px;
            }
            table.one { width: 30px; }
            table.two { width: 80px; }
            table.three { width: 130px; }
            table.four { width: 180px; }
            table.five { width: 230px; }
            table.six { width: 280px; }
            table.seven { width: 330px; }
            table.eight { width: 380px; }
            table.nine { width: 430px; }
            table.ten { width: 480px; }
            table.eleven { width: 530px; }
            table.twelve { width: 580px; }
            table.one center { min-width: 30px; }
            table.two center { min-width: 80px; }
            table.three center { min-width: 130px; }
            table.four center { min-width: 180px; }
            table.five center { min-width: 230px; }
            table.six center { min-width: 280px; }
            table.seven center { min-width: 330px; }
            table.eight center { min-width: 380px; }
            table.nine center { min-width: 430px; }
            table.ten center { min-width: 480px; }
            table.eleven center { min-width: 530px; }
            table.twelve center { min-width: 580px; }
            table.one .panel center { min-width: 10px; }
            table.two .panel center { min-width: 60px; }
            table.three .panel center { min-width: 110px; }
            table.four .panel center { min-width: 160px; }
            table.five .panel center { min-width: 210px; }
            table.six .panel center { min-width: 260px; }
            table.seven .panel center { min-width: 310px; }
            table.eight .panel center { min-width: 360px; }
            table.nine .panel center { min-width: 410px; }
            table.ten .panel center { min-width: 460px; }
            table.eleven .panel center { min-width: 510px; }
            table.twelve .panel center { min-width: 560px; }
            .body .columns td.one,
            .body .column td.one { width: 8.333333%; }
            .body .columns td.two,
            .body .column td.two { width: 16.666666%; }
            .body .columns td.three,
            .body .column td.three { width: 25%; }
            .body .columns td.four,
            .body .column td.four { width: 33.333333%; }
            .body .columns td.five,
            .body .column td.five { width: 41.666666%; }
            .body .columns td.six,
            .body .column td.six { width: 50%; }
            .body .columns td.seven,
            .body .column td.seven { width: 58.333333%; }
            .body .columns td.eight,
            .body .column td.eight { width: 66.666666%; }
            .body .columns td.nine,
            .body .column td.nine { width: 75%; }
            .body .columns td.ten,
            .body .column td.ten { width: 83.333333%; }
            .body .columns td.eleven,
            .body .column td.eleven { width: 91.666666%; }
            .body .columns td.twelve,
            .body .column td.twelve { width: 100%; }
            td.offset-by-one { padding-left: 50px; }
            td.offset-by-two { padding-left: 100px; }
            td.offset-by-three { padding-left: 150px; }
            td.offset-by-four { padding-left: 200px; }
            td.offset-by-five { padding-left: 250px; }
            td.offset-by-six { padding-left: 300px; }
            td.offset-by-seven { padding-left: 350px; }
            td.offset-by-eight { padding-left: 400px; }
            td.offset-by-nine { padding-left: 450px; }
            td.offset-by-ten { padding-left: 500px; }
            td.offset-by-eleven { padding-left: 550px; }
            td.expander {
            visibility: hidden;
            width: 0px;
            padding: 0 !important;
            }
            /* Alignment & Visibility Classes */
            table.center, td.center {
            text-align: center;
            }
            h1.center,
            h2.center,
            h3.center,
            h4.center,
            h5.center,
            h6.center {
            text-align: center;
            }
            span.center {
            display: block;
            width: 100%;
            text-align: center;
            }
            img.center {
            margin: 0 auto;
            float: none;
            }
            /* Typography */
            body, table.body, h1, h2, h3, h4, h5, h6, p, td { 
            color: #222222;
            font-family: "Helvetica", "Arial", sans-serif; 
            font-weight: normal; 
            padding:0; 
            margin: 0;
            text-align: left; 
            line-height: 1.3;
            }
            h1, h2, h3, h4, h5, h6 {
            word-break: normal;
            }
            h1 {font-size: 40px;}
            h2 {font-size: 36px;}
            h3 {font-size: 32px;}
            h4 {font-size: 28px;}
            h5 {font-size: 24px;}
            h6 {font-size: 20px;}
            body, table.body, p, td {font-size: 14px;line-height:19px;}
            p.lead, p.lede, p.leed {
            font-size: 18px;
            line-height:21px;
            }
            p { 
            margin-bottom: 10px;
            }
            small {
            font-size: 10px;
            }
            a {
            color: #2ba6cb; 
            text-decoration: none;
            }
            a:hover { 
            color: #2795b6 !important;
            }
            a:active { 
            color: #2795b6 !important;
            }
            a:visited { 
            color: #2ba6cb !important;
            }
            h1 a, 
            h2 a, 
            h3 a, 
            h4 a, 
            h5 a, 
            h6 a {
            color: #2ba6cb;
            }
            h1 a:active, 
            h2 a:active,  
            h3 a:active, 
            h4 a:active, 
            h5 a:active, 
            h6 a:active { 
            color: #2ba6cb !important; 
            } 
            h1 a:visited, 
            h2 a:visited,  
            h3 a:visited, 
            h4 a:visited, 
            h5 a:visited, 
            h6 a:visited { 
            color: #2ba6cb !important; 
            } 
            /* Panels */
            .panel {
            background: #f2f2f2;
            border: 1px solid #d9d9d9;
            padding: 10px !important;
            }
            table.radius td {
            -webkit-border-radius: 3px;
            -moz-border-radius: 3px;
            border-radius: 3px;
            }
            table.round td {
            -webkit-border-radius: 500px;
            -moz-border-radius: 500px;
            border-radius: 500px;
            }
            /* Outlook First */
            body.outlook p {
            display: inline !important;
            }
            /*  Media Queries */
            @media only screen and (max-width: 600px) {
            table[class="body"] img {
            width: auto !important;
            height: auto !important;
            }
            table[class="body"] center {
            min-width: 0 !important;
            }
            table[class="body"] .container {
            width: 95% !important;
            }
            table[class="body"] .row {
            width: 100% !important;
            display: block !important;
            }
            table[class="body"] .wrapper {
            display: block !important;
            padding-right: 0 !important;
            }
            table[class="body"] .columns,
            table[class="body"] .column {
            table-layout: fixed !important;
            float: none !important;
            width: 100% !important;
            padding-right: 0px !important;
            padding-left: 0px !important;
            display: block !important;
            }
            table[class="body"] .wrapper.first .columns,
            table[class="body"] .wrapper.first .column {
            display: table !important;
            }
            table[class="body"] table.columns td,
            table[class="body"] table.column td {
            width: 100% !important;
            }
            table[class="body"] .columns td.one,
            table[class="body"] .column td.one { width: 8.333333% !important; }
            table[class="body"] .columns td.two,
            table[class="body"] .column td.two { width: 16.666666% !important; }
            table[class="body"] .columns td.three,
            table[class="body"] .column td.three { width: 25% !important; }
            table[class="body"] .columns td.four,
            table[class="body"] .column td.four { width: 33.333333% !important; }
            table[class="body"] .columns td.five,
            table[class="body"] .column td.five { width: 41.666666% !important; }
            table[class="body"] .columns td.six,
            table[class="body"] .column td.six { width: 50% !important; }
            table[class="body"] .columns td.seven,
            table[class="body"] .column td.seven { width: 58.333333% !important; }
            table[class="body"] .columns td.eight,
            table[class="body"] .column td.eight { width: 66.666666% !important; }
            table[class="body"] .columns td.nine,
            table[class="body"] .column td.nine { width: 75% !important; }
            table[class="body"] .columns td.ten,
            table[class="body"] .column td.ten { width: 83.333333% !important; }
            table[class="body"] .columns td.eleven,
            table[class="body"] .column td.eleven { width: 91.666666% !important; }
            table[class="body"] .columns td.twelve,
            table[class="body"] .column td.twelve { width: 100% !important; }
            table[class="body"] td.offset-by-one,
            table[class="body"] td.offset-by-two,
            table[class="body"] td.offset-by-three,
            table[class="body"] td.offset-by-four,
            table[class="body"] td.offset-by-five,
            table[class="body"] td.offset-by-six,
            table[class="body"] td.offset-by-seven,
            table[class="body"] td.offset-by-eight,
            table[class="body"] td.offset-by-nine,
            table[class="body"] td.offset-by-ten,
            table[class="body"] td.offset-by-eleven {
            padding-left: 0 !important;
            }
            table[class="body"] table.columns td.expander {
            width: 1px !important;
            }
      }
</style>
<style>
            /**************************************************************
            * Custom Styles *
            ***************************************************************/
            /***
            Reset & Typography
            ***/
            body {
            direction: ltr;
            background: #f6f8f1;
            }   
            a:hover {
            text-decoration: underline;
            }
            h1 {font-size: 34px;}
            h2 {font-size: 30px;}
            h3 {font-size: 26px;}
            h4 {font-size: 22px;}
            h5 {font-size: 18px;}
            h6 {font-size: 16px;}
            h4, h3, h2, h1 {
            display: block;
            margin: 5px 0 15px 0;
            }
            h7, h6, h5 {
            display: block;
            margin: 5px 0 5px 0 !important;
            }
            /***
            Buttons
            ***/
            .btn td {
            background: #e5e5e5 !important;
            border: 0;
            font-family: "Segoe UI", Helvetica, Arial, sans-serif;
            font-size: 14px;  
            padding: 7px 14px !important;
            color: #333333 !important;
            text-align: center;
            vertical-align: middle;
            }
            .btn td a {
            display: block;
            color: #fff;
            }
            .btn td a:hover,
            .btn td a:focus,
            .btn td a:active {
            color: #fff !important;
            text-decoration: none;
            }
            .btn td:hover, 
            .btn td:focus, 
            .btn td:active {  
            background: #d8d8d8 !important;
            }
            /*  Yellow */
            .btn.yellow td {
            background: #ffb848 !important;
            }
            .btn.yellow td:hover, 
            .btn.yellow td:focus, 
            .btn.yellow td:active { 
            background: #eca22e !important;
            }
            .btn.red td{
            background: #d84a38 !important;
            }
            .btn.red td:hover, 
            .btn.red td:focus, 
            .btn.red td:active {    
            background: #bb2413 !important;
            }
            .btn.green td {
            background: #35aa47 !important;
            }
            .btn.green td:hover, 
            .btn.green td:focus, 
            .btn.green td:active { 
            background: #1d943b !important;
            }
            /*  Blue */
            .btn.blue td {
            background: #4d90fe !important;
            }
            .btn.blue td:hover, 
            .btn.blue td:focus, 
            .btn.blue td:active {  
            background: #0362fd !important;
            }
            .template-label {
            color: #ffffff;
            font-weight: bold;
            font-size: 11px;
            }
            /***
            Note Panels
            ***/
            .note .panel {
            padding: 10px !important;
            background: #ECF8FF;
            border: 0;
            }
            /***
            Header
            ***/
            .page-header {
            width: 100%;
            background: #dadada;
            }
            /***
            Social Icons
            ***/
            .social-icons {
            float: right;
            }
            .social-icons td {
            padding: 0 2px !important;
            width: auto !important;
            }
            .social-icons td:last-child {
            padding-right: 0 !important;
            }
            .social-icons td img {
            max-width: none !important; 
            }
            /***
            Content
            ***/
            table.container.content > tbody > tr > td{
            background: #fff;  
            padding: 15px !important;
            }
            /***
            Footer
            ***/
            .page-footer  {
            width: 100%;
            background: #dadada;
            }
            .page-footer td {
            vertical-align: middle;
           
            }
            /***
            Content devider
            ***/
            .devider {
            border-bottom: 1px solid #eee;
            margin: 15px -15px;
            display: block;
            }
            /***
            Media Item
            ***/
            .media-item img {
            display: block !important;
            float: none;
            margin-bottom: 10px;
            }
            .vertical-middle {
            padding-top: 0;
            padding-bottom: 0;
            vertical-align: middle;
            }
            /***
            Utils
            ***/
            .align-reverse {
            text-align: right;
            }
            .border {
            border: 1px solid red;
            }
            .hidden-mobile {
            display: block;
            }
            .visible-mobile {
            display: none;
            }
            @media only screen and (max-width: 600px) {
            /***
            Reset & Typography
            ***/
            body {
            background: #fff;  
            }
            h1 {font-size: 30px;}
            h2 {font-size: 26px;}
            h3 {font-size: 22px;}
            h4 {font-size: 20px;}
            h5 {font-size: 16px;}
            h6 {font-size: 14px;}
            /***
            Content
            ***/
            table.container.content > tbody > tr > td{
            padding: 0px !important;
            }
            table[class="body"] table.columns .social-icons td {
            width: auto !important;
            }
            /***
            Header
            ***/
            .header {
            padding: 10px !important;
            }
            /***
            Content devider
            ***/
            .devider {
            margin: 15px 0;
            }
            /***
            Media Item
            ***/
            .media-item {
            border-bottom: 1px solid #eee;
            padding: 15px 0 !important;
            }
            /***
            Media Item
            ***/
            .hidden-mobile {
            display: none;
            }
            .visible-mobile {
            display: block;
            }
            }
</style>
<body>
<table class="body">
<tr>

<td align="left" valign="middle" id="invisibleIntroduction" style="display:none !important; mso-hide:all;">
																		<table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:100%;">
																			<tr>
																				<td align="left" class="textContent">
																					<div >
																						Notifications From Rajasthan Films
																					</div>
																				</td>
																			</tr>
																		</table>
</td>
	<td class="center" align="center" valign="top">
		<!-- BEGIN: Header -->
		<table class="page-header" align="center" style="width: 100%;background: #f3f3f3;">
		<tr>
			<td class="center" >
				<!-- BEGIN: Header Container -->
				<table class="container" style="width:100%;">
				<tr>
					<td>
						<table class="row "  style="width:100%;">
						<tr>
							<td class="wrapper vertical-middle" style="padding-top: 0;padding-bottom: 0;vertical-align: middle;">
								<!-- BEGIN: Logo -->
								<table class="six columns" >
								<tr>
									<td class="vertical-middle" style="padding-top: 0;padding-bottom: 0;vertical-align: middle;">
										<a href="index.php">
										<img src="http://www.rajasthanfilms.com/img/logo22.png" border="0" alt="" style="outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;width: auto;height: auto;max-width: 100%;float: left;clear: both;display: block;">
										</a>
									</td>
								</tr>
								</table>
								<!-- END: Logo -->
							</td>
							<td class="wrapper vertical-middle last" style="padding-top: 0;padding-bottom: 0;vertical-align: middle;">
								<!-- BEGIN: Social Icons -->
								<table class="six columns">
								<tr>
									<td>
										<table class="wrapper social-icons" align="right" style="float: right;">
										<tr>
											<td class="vertical-middle" style="padding-top: 0;padding-bottom: 0;vertical-align: middle;padding: 0 2px !important;width: auto !important;">
												<a href="http://www.facebook.com/rfilmss">
												<img src="http://www.rajasthanfilms.com/img/email/social_facebook.png" alt="Facebook" style="outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;width: auto;height: auto;max-width: none !important;float: left;clear: both;display: block;">
												</a>
											</td>
											<td class="vertical-middle" style="padding-top: 0;padding-bottom: 0;vertical-align: middle;padding: 0 2px !important;width: auto !important;">
												<a href="https://www.youtube.com/c/RajasthanFilmsProductions">
												<img src="http://www.rajasthanfilms.com/img/email/social_youtube.png" alt="Youtube" style="outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;width: auto;height: auto;max-width: none !important;float: left;clear: both;display: block;">
												</a>
											</td>
											<td class="vertical-middle" style="padding-top: 0;padding-bottom: 0;vertical-align: middle;padding: 0 2px !important;width: auto !important;">
												<a href="http://www.twitter.com/rfilmss">
												<img src="http://www.rajasthanfilms.com/img/email/social_twitter.png" alt="twitter" style="outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;width: auto;height: auto;max-width: none !important;float: left;clear: both;display: block;">
												</a>
											</td>
											<td class="vertical-middle" style="padding-top: 0;padding-bottom: 0;vertical-align: middle;padding: 0 2px !important;width: auto !important;">
												<a href="http://www.googleplus.com/+RajasthanFilmsProductions">
												<img src="http://www.rajasthanfilms.com/img/email/social_googleplus.png" alt="Google Plus" style="outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;width: auto;height: auto;max-width: none !important;float: left;clear: both;display: block;">
												</a>
											</td>
											<td class="vertical-middle" style="padding-top: 0;padding-bottom: 0;vertical-align: middle;padding: 0 2px !important;width: auto !important;padding-right: 0 !important;">
												<a href="http://in.linkedin.com/in/rfilmss">
												<img src="http://www.rajasthanfilms.com/img/email/social_linkedin.png" alt="Linked-In" style="outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;width: auto;height: auto;max-width: none !important;float: left;clear: both;display: block;">
												</a>
											</td>
											
										</tr>
										</table>
									</td>
								</tr>
								</table>
								<!-- END: Social Icons -->
							</td>
						</tr>
						</table>
					</td>
				</tr>
				</table>
				<!-- END: Header Container -->
			</td>
		</tr>
		</table>
		<!-- END: Header -->
		<!-- BEGIN: Content -->
		<table class="container content" align="center">
		<tr>
			<td>
				<table class="row note">
				<tr>
					<td class="wrapper last">
						
						<h4 style="font-size: 22px;display: block;margin: 5px 0 15px 0;">Thank you for Subscribing with the <span style="color:#33B1E6 "> Rajasthan</span> <span style="color:#E54A1A "> Films!</span> </h4>
						
						<!-- BEGIN: Note Panel -->
						
					
						<!--
						<p>
							 If clicking the URL above does not work, copy and paste the URL into a browser window.
						</p>
						<!-- END: Note Panel -->
					</td>
				</tr>
				</table>
				
				
			</td>
		</tr>
		</table>
		<!-- END: Content -->
		<!-- BEGIN: Footer -->
		<table class="page-footer" align="center" style="width: 100%;background: #f3f3f3;">
		<tr>
			<td class="center" align="center" style="vertical-align: middle;">
				<table class="container" align="center" style="width:100%">
				<tr>
					<td style="vertical-align: middle;">
						<!-- BEGIN: Unsubscribe -->
						<table class="row"  style="width:100%">
						<tr>
							<td class="wrapper last" style="vertical-align: middle;">
								<span style="font-size:12px;">
								<i>This ia a system generated email and reply is not required.</i>
								</span>
							</td>
						</tr>
						</table>
						<!-- END: Unsubscribe -->
						<!-- BEGIN: Footer Panel -->
						<table class="row"  style="width:100%">
						<tr>
							<td class="wrapper" style="vertical-align: middle;float:left;">
								<table class="four columns">
								<tr>
									<td class="vertical-middle" style="padding-top: 0;padding-bottom: 0;vertical-align: middle;">
										 &copy; Rajasthan Films 2016.
									</td>
								</tr>
								</table>
							</td>
							<td class="wrapper last" style="vertical-align: middle;float:left;">
								<table class="eight columns">
								<tr>
									<td class="vertical-middle align-reverse" style="padding-top: 0;padding-bottom: 0;vertical-align: middle;text-align: right;">
										<a href="http://www.rajasthanfilms.com/index#about">
										About Us </a>
										&nbsp; <a href="http://www.rajasthanfilms.com/index">
										Privacy Policy </a>
										&nbsp; <a href="http://www.rajasthanfilms.com/index">
										Terms of Use </a>
										&nbsp; <a href="http://www.rajasthanfilms.com/login">
										Login</a>
									</td>
								</tr>
								</table>
							</td>
						</tr>
						</table>
						<!-- END: Footer Panel List -->
					</td>
				</tr>
				</table>
			</td>
		</tr>
		</table>
		<!-- END: Footer -->
	</td>
</tr>
</table>
';
						//$mail->AltBody = "This is the plain text version of the email content";

						if($mail->send()) 
						{
								
				$result['data']='Thanks Alot ! You SuccessFully Subscribed for Our Newsletters';
				header('Content-type: application/json');
				echo json_encode($result);
				
						} 
						else 
						{
							
				$result['data']='Thanks Alot ! You SuccessFully Subscribed for Our Newsletters';
				header('Content-type: application/json');
				echo json_encode($result);
				
						}

				
			
			}
			else{
				$result['data']='Oops ! Sorry There is some Error Ocuured Please try Again In Some Time';
				header('Content-type: application/json');
				echo json_encode($result);
			}
				
				}
		else{
			$result['data']='Oops ! Sorry You Already Subscribed To Our NewsLettlers';
				header('Content-type: application/json');
				echo json_encode($result);
		}
				
				
			
		}
		
	}
}
/*** Add Email Subbscription Ends*/
/*
/*
/*
/*
/*** Add Mobile Subscription */
else if($req=="addDbMobileSubscriber"){
	$regMob ="/^([0|\+[0-9]{1,5})?([7-9][0-9]{9})$/";	
	$mobile=trim(test_input(strtolower($_POST['mobile'])));	
	if($mobile=="")
	{
		$result['data']='Please Enter Mobile number here For Subscription';
		header('Content-type: application/json');
        echo json_encode($result);
	}
	else{
		
		if(!preg_match($regMob,$mobile )){
		
		$result['data']='Please Enter A Valid Mobile Number here For Subscription';
		header('Content-type: application/json');
        echo json_encode($result);
		}
		else{
					
	/*** Searching For Same Mobile Number in The Profile ***/
	$resultDb = mysqli_query($con,"SELECT `id`,`mobile` FROM  `mobilesubscriber` where `mobile`='".$mobile."'");
		if(!(mysqli_num_rows($resultDb) > 0) ){	
			
			$getVisitorIP=getVisitorIP();
			$sqlAddMobileSubcriber="INSERT INTO `mobilesubscriber` (`id`, `mobile`, `mobileAddTime`,`subscriberIpAddress`) VALUES ('','".$mobile."','".time()."' , '".$getVisitorIP."')";
			//echo $sqlAddMobileSubcriber;
			
			if(mysqli_query($con,$sqlAddMobileSubcriber)){
				/*** SmS to Subscriber ***/
						$ID = 'swarnpar'; 
						$Pwd = 'sumerjai';
						//$Name=urlencode($Pname);
						$PhNo = $mobile; 
						$Text ='%0AThanks%20to%20Subscribe%20with%20Jagdish%20ColdDrink%0AWe%20will%20Send%20you%20Our%20Latest%20Product%20And%20Offer%20By%20SMS%20And%20Please%20Try%20Our%20All%20Product%20And%20Variety%20And%20Give%20FeedBack%20To%20us%0Awww.jagdishColddrink.com'; 
						$url="http://sms.proactivesms.in/sendsms.jsp?user=$ID&password=$Pwd&mobiles=$PhNo&sms=$Text&senderid =sender" ;
						$ret = file($url);
						echo $ret[9]; 					
						/*** SmS to Contacter Ends***/
						$result['data']='Thanks to subscribe our NewsLetters For Mobile';
						header('Content-type: application/json');
						echo json_encode($result);
			
			}
			else{
				$result['data']='Oops ! Sorry There is some Error Ocuured Please try Again In Some Time';
				header('Content-type: application/json');
				echo json_encode($result);
			}
				
				}
		else{
			$result['data']='Oops ! Sorry You Already Subscribed To Our NewsLettlers';
				header('Content-type: application/json');
				echo json_encode($result);
		}
				
				
			
		}
		
	}
}
/*** Add Mobile Subbscription Ends*/
/*
/*
/*
/*
/*** Show all Category Function*/

else if($req=="showallCategory") {
$i="0";
$resultfindCategory = mysqli_query($con,"SELECT `id`,`Name`,`Description`,`categoryPhoto`  FROM  `category` ORDER BY id DESC ");
while($row = mysqli_fetch_array($resultfindCategory))
	{

	$cat['id']=$row['id'];
	 $cat['Name']=$row['Name'];
	 $cat_arr[$i]=$cat;
	$i=$i+1;
  }
   
     mysqli_close($con);
  header('Content-type: application/json');
  echo json_encode($cat_arr);
 
}


/*** Show all Category Function Ends*/
/*
/*
/*
/*** Show all Category Product Function*/

else if($req=="showallProduct") {
$i="0";
$resultfindProducts = mysqli_query($con,"SELECT `id`,`Name`,`PeacePerKG`,`Price`,`Ingredient`,`Description`,`Keywords`,`ImageThumb`  FROM  `products` ORDER BY id ASC LIMIT 4");
while($row = mysqli_fetch_array($resultfindProducts))
	{

	$cat['id']=$row['id'];
	 $cat['Name']=$row['Name'];
	 $cat['PeacePerKG']=$row['PeacePerKG'];
	 $cat['Price']=$row['Price'];
	 $cat['Ingredient']=$row['Ingredient'];
	 $cat['Description']=$row['Description'];
	 $cat['Keywords']=$row['Keywords'];
	 $cat['ImageThumb']=$row['ImageThumb'];
	 $cat_arr[$i]=$cat;
	$i=$i+1;
  }
   
     mysqli_close($con);
  header('Content-type: application/json');
  echo json_encode($cat_arr);
 
}


/*** Show all Category Product Function Ends*/
/*
/*
/*
/*** Show all Category Product Function*/

else if($req=="showSingelCategoryProduct") {
$id=trim(test_input(strtolower($_POST['id'])));	
$i="0";
$resultfindProducts = mysqli_query($con,"SELECT `id`,`Name`,`PeacePerKG`,`Price`,`Ingredient`,`Description`,`Keywords`,`ImageThumb`  FROM  `products` where `categoryId`='".$id."' ORDER BY id  ASC LIMIT 4");
$rowCount = mysqli_num_rows($resultfindProducts);

if($rowCount > 0){ 
while($row = mysqli_fetch_array($resultfindProducts))
	{

	$cat['id']=$row['id'];
	 $cat['Name']=$row['Name'];
	 $cat['PeacePerKG']=$row['PeacePerKG'];
	 $cat['Price']=$row['Price'];
	 $cat['Ingredient']=$row['Ingredient'];
	 $cat['Description']=$row['Description'];
	 $cat['Keywords']=$row['Keywords'];
	 $cat['ImageThumb']=$row['ImageThumb'];
	 $cat_arr[$i]=$cat;
	$i=$i+1;
  }
   
     mysqli_close($con);
  header('Content-type: application/json');
  echo json_encode($cat_arr);
}
else {
	$result['data']="No Product Found For this Category";
	
     mysqli_close($con);
  header('Content-type: application/json');
  echo json_encode($result);
}
 
}


/*** Show all Category Product Function Ends*/
/*
/*
/*
/*
/*** Show show More Load Product Function*/

else if($req=="showMoreLoad") {
$id=trim(test_input(strtolower($_POST['id'])));	

//count all rows except already displayed
$queryAll = mysqli_query($con,"SELECT COUNT(*) as num_rows FROM products WHERE id > ".$id." ORDER BY id Asc");
$row = mysqli_fetch_assoc($queryAll);
$allRows = $row['num_rows'];

$showLimit = 4;

$i="0";
$resultfindProducts = mysqli_query($con,"SELECT `id`,`Name`,`PeacePerKG`,`Price`,`Ingredient`,`Description`,`Keywords`,`ImageThumb`  FROM  `products` WHERE id > ".$id." ORDER BY id ASC LIMIT ".$showLimit);
$rowCount = mysqli_num_rows($resultfindProducts);

if($rowCount > 0){ 
while($row = mysqli_fetch_array($resultfindProducts))
	{

	$cat['id']=$row['id'];
	 $cat['Name']=$row['Name'];
	 $cat['PeacePerKG']=$row['PeacePerKG'];
	 $cat['Price']=$row['Price'];
	 $cat['Ingredient']=$row['Ingredient'];
	 $cat['Description']=$row['Description'];
	 $cat['Keywords']=$row['Keywords'];
	 $cat['ImageThumb']=$row['ImageThumb'];
	 $cat_arr[$i]=$cat;
	$i=$i+1;
  }
   
     mysqli_close($con);
  header('Content-type: application/json');
  echo json_encode($cat_arr);
}
else {
	$result['data']="No Product Found For this Category";
	
     mysqli_close($con);
  header('Content-type: application/json');
  echo json_encode($result);
}
 
}

/*** Show show More Load  Product Function Ends*/
/*
/*
/*
/*
/*
/*** Show Singel Category Category Product Function*/

else if($req=="showSingelCategoryProductShowMore") {
	
$catId=trim(test_input($_POST['categoryId']));	
$id=trim(test_input($_POST['id']));	

$showLimit = 4;
//count all rows except already displayed
$queryAll = mysqli_query($con,"SELECT COUNT(*) as num_rows FROM products WHERE id > ".$id." And `categoryId`='".$catId."' ORDER BY id ASC LIMIT ".$showLimit);
$row = mysqli_fetch_assoc($queryAll);
$allRows = $row['num_rows'];


$i="0";
$resultfindProducts = mysqli_query($con,"SELECT `id`,`Name`,`PeacePerKG`,`Price`,`Ingredient`,`Description`,`Keywords`,`ImageThumb`  FROM  `products` where `categoryId`='".$catId."' And id > ".$id."  ORDER BY id  ASC LIMIT 4");
$rowCount = mysqli_num_rows($resultfindProducts);

if($rowCount > 0){ 
while($row = mysqli_fetch_array($resultfindProducts))
	{

	$cat['id']=$row['id'];
	 $cat['Name']=$row['Name'];
	 $cat['PeacePerKG']=$row['PeacePerKG'];
	 $cat['Price']=$row['Price'];
	 $cat['Ingredient']=$row['Ingredient'];
	 $cat['Description']=$row['Description'];
	 $cat['Keywords']=$row['Keywords'];
	 $cat['ImageThumb']=$row['ImageThumb'];
	 $cat_arr[$i]=$cat;
	$i=$i+1;
  }
   
     mysqli_close($con);
  header('Content-type: application/json');
  echo json_encode($cat_arr);
}
else {
	$result['data']="No Product Found For this Category";
	
     mysqli_close($con);
  header('Content-type: application/json');
  echo json_encode($result);
}
 
}


/*** Show all  Singel Category Product Function Ends*/
/*
/*
/*
/*
/*
/*** Show Searching Product Function*/

else if($req=="showSearchingProduct") {
$query=trim(test_input(strtolower($_POST['query'])));	
$i="0";
$resultfindProducts = mysqli_query($con,"SELECT `id`,`Name`,`PeacePerKG`,`Price`,`Ingredient`,`Description`,`Keywords`,`ImageThumb`  FROM  `products` where  `Name` Like '%".$query."%'  OR  `Keywords` Like '%".$query."%'  ORDER BY id  ASC LIMIT 4");

$rowCount = mysqli_num_rows($resultfindProducts);

if($rowCount > 0){ 
while($row = mysqli_fetch_array($resultfindProducts))
	{

	$cat['id']=$row['id'];
	 $cat['Name']=$row['Name'];
	 $cat['PeacePerKG']=$row['PeacePerKG'];
	 $cat['Price']=$row['Price'];
	 $cat['Ingredient']=$row['Ingredient'];
	 $cat['Description']=$row['Description'];
	 $cat['Keywords']=$row['Keywords'];
	 $cat['ImageThumb']=$row['ImageThumb'];
	 $cat_arr[$i]=$cat;
	$i=$i+1;
  }
   
     mysqli_close($con);
  header('Content-type: application/json');
  echo json_encode($cat_arr);
}
else {
	$result['data']="No Product Found For this Searching";
	
     mysqli_close($con);
  header('Content-type: application/json');
  echo json_encode($result);
}
}


/*** Show Searching Product Function Ends*/
/**/
/**/
/**/
/**/
/**/
/*** Show Searching Product Show More Function */ 

else if($req=="showSearchingProductShowMore") {
	
$query=trim(test_input($_POST['query']));	
$id=trim(test_input($_POST['id']));	

$showLimit = 4;
//count all rows except already displayed
$queryAll = mysqli_query($con,"SELECT COUNT(*) as num_rows FROM products WHERE `id` > ".$id." And (`Name` Like '%".$query."%'  OR  `Keywords` Like '%".$query."%')  ORDER BY id ASC LIMIT ".$showLimit);
$row = mysqli_fetch_assoc($queryAll);
$allRows = $row['num_rows'];


$i="0";
$resultfindProducts = mysqli_query($con,"SELECT `id`,`Name`,`PeacePerKG`,`Price`,`Ingredient`,`Description`,`Keywords`,`ImageThumb`  FROM  `products` where  (`Name` Like '%".$query."%'  OR  `Keywords` Like '%".$query."%')  And `id` > ".$id."  ORDER BY id  ASC LIMIT 4");
$rowCount = mysqli_num_rows($resultfindProducts);

if($rowCount > 0){ 
while($row = mysqli_fetch_array($resultfindProducts))
	{

	$cat['id']=$row['id'];
	 $cat['Name']=$row['Name'];
	 $cat['PeacePerKG']=$row['PeacePerKG'];
	 $cat['Price']=$row['Price'];
	 $cat['Ingredient']=$row['Ingredient'];
	 $cat['Description']=$row['Description'];
	 $cat['Keywords']=$row['Keywords'];
	 $cat['ImageThumb']=$row['ImageThumb'];
	 $cat_arr[$i]=$cat;
	$i=$i+1;
  }
   
     mysqli_close($con);
  header('Content-type: application/json');
  echo json_encode($cat_arr);
}
else {
	$result['data']="No More Product Found For this Searching";
	
     mysqli_close($con);
  header('Content-type: application/json');
  echo json_encode($result);
}
 
}

/*** Show Searching Product Show More Function Ends*/
/*
/*
/*
/*
/*
/*** Show Product Detail Function*/

else if($req=="showProductDetail") {
$id=trim(test_input(strtolower($_POST['id'])));	
$Name=trim(test_input(strtolower($_POST['Name'])));	
$i="0";
$resultfindProducts = mysqli_query($con,"SELECT `id`,`Name`,`PeacePerKG`,`Price`,`Ingredient`,`Description`,`Keywords`,`ImageThumb`,`Image`  FROM  `products` where  `id`=".$id." AND `Name` Like '%".$Name."%'" );

if($row = mysqli_fetch_array($resultfindProducts)){

		$cat['id']=$row['id'];
	 $cat['Name']=$row['Name'];
	 $cat['PeacePerKG']=$row['PeacePerKG'];
	 $cat['Price']=$row['Price'];
	 $cat['Ingredient']=$row['Ingredient'];
	 $cat['Description']=$row['Description'];
	 $cat['Keywords']=$row['Keywords'];
	 $cat['ImageThumb']=$row['ImageThumb'];
	 $cat['Image']=$row['Image'];

     mysqli_close($con);
  header('Content-type: application/json');
  echo json_encode($cat);
}
else {
	$result['data']="Did Not Find Any Product";
	
     mysqli_close($con);
  header('Content-type: application/json');
  echo json_encode($result);

}
}

/*** Show Product Detail Function Ends*/
/*
/*
/*
/*
/*
/*
/*
/*** Show Related Product Function*/

else if($req=="showRelatedProduct") {
$id=trim(test_input(strtolower($_POST['id'])));	
$Name=trim(test_input(strtolower($_POST['name'])));	
$i="0";

$resultfindRelatedProductId = mysqli_query($con,"SELECT *  FROM  `relatedproduct` where  `productId`='".$id."'  ");


$rowCount = mysqli_num_rows($resultfindRelatedProductId);

if($rowCount > 0){ 
while($row = mysqli_fetch_array($resultfindRelatedProductId))
	{
	$cat['RelatedProductId']=$row['RelatedProductId'];
$resultfindProducts = mysqli_query($con,"SELECT `id`,`Name`,`PeacePerKG`,`Price`,`Ingredient`,`Description`,`Keywords`,`ImageThumb`  FROM  `products` where  `id`='".$cat['RelatedProductId']."'  ");
if($row = mysqli_fetch_array($resultfindProducts)){
	 $cat['id']=$row['id'];
	 $cat['Name']=$row['Name'];
	 $cat['PeacePerKG']=$row['PeacePerKG'];
	 $cat['Price']=$row['Price'];
	 $cat['Ingredient']=$row['Ingredient'];
	 $cat['Description']=$row['Description'];
	 $cat['Keywords']=$row['Keywords'];
	 $cat['ImageThumb']=$row['ImageThumb'];
}
	 $cat_arr[$i]=$cat;
	$i=$i+1;
	
  }
   
     mysqli_close($con);
  header('Content-type: application/json');
  echo json_encode($cat_arr);
}
else {
	$result['data']="No Related Product Found For this Product";
	
     mysqli_close($con);
  header('Content-type: application/json');
  echo json_encode($result);
}
}


/*** Show Related Product Function Ends*/
/**/
















else if($req=="forgetpassword"){
	
	
	
	$MobileNumber=$_POST['MobileNumber'];
	$email=$_POST['email'];
	$regMob ="/^([0|\+[0-9]{1,5})?([7-9][0-9]{9})$/";					
	$regName ="/^[a-zA-Z ]+$/";
	

if (!filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
	
	if (preg_match($regMob,$MobileNumber )== 1){
		
	
		$resultDb = mysqli_query($con,"SELECT `id`,`Email`,`MobileNumber`,`Name`,`userPassword` FROM  `userregistration` where `MobileNumber`='".$MobileNumber."' AND `Email`='".$email."'");
				
			
				
				 if($row = mysqli_fetch_array($resultDb))
			  {
				  $userId=$row['id'];	 
				  $Name=$row['Name'];	 
				  $email=$row['Email'];	 
				$MobileNumber=$row['MobileNumber'];
				$userPassword=$row['userPassword'];
			  
			  
							
			// Sending JSON-encoded response
			
					
				  $ID = 'swarnpar'; 
				  $Pwd = 'sumerjai'; 
				  $sender='RFILMS';
				  $Name=urlencode($Name);
				  //$FName=urlencode($Fname);
				  $PhNo = $MobileNumber; 
				  $Text ='Dear%20'.$Name.'%0AYour%20Forget%20Password%20Detail%20is%0AYour%20Userid%20:'.$userId.'%0AYour%20Password%20:'.$userPassword.'%0Awww.RajasthanFilms.com';  
				  $url="http://sms.proactivesms.in/sendsms.jsp?user=$ID&password=$Pwd&mobiles=$PhNo&sms=$Text&senderid=$sender" ;
				  //echo $url;
				 // echo '<script>alert($url)</script>';
				 
				  $ret = file($url);
				  echo $ret[9]; 
				  
							mysqli_close($con);
							$result['data']="Your Id And Password is Send to Your Registered Mobile Number";
							header('Content-type: application/json');
							echo json_encode($result);
				
					
					
			
			}
			else {
					// Sending JSON-encoded response
					mysqli_close($con);
					$result['data']='We Did Not Find Any Profile From Mobile Number '.$MobileNumber.' And Email id '.$email.'';
					  header('Content-type: application/json');
                echo json_encode($result);
			}
	}
	else{
			mysqli_close($con);
					$result['data']='Please Enter Correct Mobile Number';
			     header('Content-type: application/json');
                echo json_encode($result);
				
	}

	}
	else{
		
		// Sending JSON-encoded response
					mysqli_close($con);
					$result['data']='Please Enter Email Id Correctly';
			     header('Content-type: application/json');
                echo json_encode($result);
				
	}
	

	
	

}




else{
	// Sending JSON-encoded response
					mysqli_close($con);
					$result['data']='Unknown Rqquest';
			     header('Content-type: application/json');
                echo json_encode($result);
				echo "<script>window.location='index';</script>";
	
}
ob_flush();

			?>