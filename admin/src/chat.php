<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>Western Train | Chatbot</title>

	<!-- Site favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="vendors/img/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="vendors/img/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="vendors/img/favicon-16x16.png">

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="vendors/styles/core.css">
	<link rel="stylesheet" type="text/css" href="vendors/styles/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="src/plugins/datatables/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="src/plugins/datatables/css/responsive.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="vendors/styles/style.css">

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-119386393-1');
	</script>
</head>
<body>
	<div class="pre-loader">
		<div class="pre-loader-box">
			<!-- <div class="loader-logo"><img src="vendors/images/deskapp-logo.svg" alt=""></div> -->
			<div class='loader-progress' id="progress_div">
				<div class='bar' id='bar1'></div>
			</div>
			<div class='percent' id='percent1'>0%</div>
			<div class="loading-text">
				Loading...
			</div>
		</div>
	</div>
	<div class="header">
		<div class="header-left">
			<div class="menu-icon dw dw-menu"></div>
			<div class="search-toggle-icon dw dw-search2" data-toggle="header_search"></div>
			<div class="header-search">
				<form>
					<div class="form-group mb-0">
						<i class="dw dw-search2 search-icon"></i>
						<input type="text" class="form-control search-input" placeholder="Search Here">
						<div class="dropdown">
							<a class="dropdown-toggle no-arrow" href="#" role="button" data-toggle="dropdown">
								<i class="ion-arrow-down-c"></i>
							</a>
							<div class="dropdown-menu dropdown-menu-right">
								<div class="form-group row">
									<label class="col-sm-12 col-md-2 col-form-label">From</label>
									<div class="col-sm-12 col-md-10">
										<input class="form-control form-control-sm form-control-line" type="text">
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-12 col-md-2 col-form-label">To</label>
									<div class="col-sm-12 col-md-10">
										<input class="form-control form-control-sm form-control-line" type="text">
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-12 col-md-2 col-form-label">Subject</label>
									<div class="col-sm-12 col-md-10">
										<input class="form-control form-control-sm form-control-line" type="text">
									</div>
								</div>
								<div class="text-right">
									<button class="btn btn-primary">Search</button>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
		<div class="header-right">
			<div class="dashboard-setting user-notification">
				<div class="dropdown">
					<a href="profile.html" class="dropdown-toggle no-arrow">
						<i class="dw dw-settings2"></i>
					</a>
				</div>
			</div>
			<div class="user-notification">
				<div class="dropdown">
				
					<a class="dropdown-toggle no-arrow" href="#" role="button" data-toggle="dropdown">
						<i class="icon-copy dw dw-notification"></i>
						<span class="badge notification-active"></span>
					</a>
					<div class="dropdown-menu dropdown-menu-right">
						<div class="notification-list mx-h-350 customscroll">
							<ul>
								<li>
								<a href="message.php">
									<?php
							 		include('db.php');	
							  $sql = "SELECT * FROM `message`";
							  $re = mysqli_query($con,$sql);
							  
										while($row = mysqli_fetch_array($re))
										{
										
											$id = $row['id'];
											
											if($id % 2 ==1 )
											{
												echo"<ul class='gradeC'>
												<li><h6>".$row['name']."</h6> 
												<p>".$row['message']."</li>
												
												</ul>";
											}
											else
											{
												echo"<ul class='gradeU'>
												<li><h6>".$row['name']."</h6> 
												<p>".$row['message']." </p></li>
												
												</ul>";
											
											}
										
										}
										
									?></p>
									</a>
								</li>
								
							
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="user-info-dropdown">
				<div class="dropdown">
					<a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
						<!-- <span class="user-icon">
							<img src="vendors/img/user.png" alt="">
						</span> -->
						<span class="user-name" style="font-weight: bold; font-size: 20px; color: blue;">Olala Victor</span>
					</a>
					<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
						<a class="dropdown-item" href="profile.html"><i class="dw dw-user1"></i> Profile</a>
						<a class="dropdown-item" href="profile.html"><i class="dw dw-settings2"></i> Setting</a>						
						<a class="dropdown-item" href="login.html"><i class="dw dw-logout"></i> Log Out</a>
					</div>
				</div>
			</div>
			
		</div>
	</div>


	<div class="left-side-bar">
		<div class="brand-logo">
			<a href="index.html">
				<p>
					WESTERN TRAIN
				</p>
				<!-- <img src="vendors/images/deskapp-logo.svg" alt="" class="dark-logo">
				<img src="vendors/images/deskapp-logo-white.svg" alt="" class="light-logo"> -->
			</a>
			<div class="close-sidebar" data-toggle="left-sidebar-close">
				<i class="ion-close-round"></i>
			</div>
		</div>
		<div class="menu-block customscroll">
			<div class="sidebar-menu">
            <ul id="accordion-menu">
					
						
					<li>
						<a href="dashboard.php" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-house-1"></span><span class="mtext">Home</span>
						</a>
					</li>
						
						<li>
							<a href="booknow.php" class="dropdown-toggle no-arrow">
								<span class="micon dw dw-edit2"></span><span class="mtext">Book Now</span>
							</a>
						</li>
						<li>
							<a href="bookings.php" class="dropdown-toggle no-arrow">
								<span class="micon dw dw-train"></span><span class="mtext">Bookings</span>
							</a>
						</li>
							<li>
							<a href="addtrain.php" class="dropdown-toggle no-arrow">
								<span class="micon dw dw-add"></span><span class="mtext">Add Train</span>
							</a>
						</li>	
						<li>
							<a href="remove.php" class="dropdown-toggle no-arrow">
								<span class="micon dw dw-remove"></span><span class="mtext">Remove Train</span>
							</a>
						</li>						
						<li>
							<a href="payment.php" class="dropdown-toggle no-arrow">
								<span class="micon dw dw-money"></span><span class="mtext">Payment</span>
							</a>
						</li>	
					
						
							
						
						<li>
							<a href="messages.php" class="dropdown-toggle no-arrow">
								<span class="micon dw dw-message"></span><span class="mtext">Messages</span>
							</a>
						</li>
				
					<li>
						<a href="calendar.php" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-calendar1"></span><span class="mtext">Calendar</span>
						</a>
					</li>

					
					
					<li>
						<a href="invoice.php" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-invoice"></span><span class="mtext">Invoice</span>
						</a>
					</li>
					<li>
						<div class="dropdown-divider"></div>
					</li>
					<li>
						<a href="chat.php" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-chat3"></span><span class="mtext" style="color:blue; font-weight: bold;">Chat</span>
						</a>
					</li>
					
				</ul>
			</div>
		</div>
	</div>
	<div class="mobile-menu-overlay"></div>

	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12 text-right">
							<div class="title">
								<h4 style="text-align: left;">Chat</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Chat</li>
								</ol>
							</nav>
						</div>
						<div class="col-md-6 col-sm-12 text-right">
							<div class="dropdown">
								<a class="btn btn-primary" href="#" role="button">
								<?php                            
							echo date(" d/m/Y");
							?>
								</a>
								
							</div>
						</div>
					</div>
				</div>
				<div class="bg-white border-radius-4 box-shadow mb-30">
					<div class="row no-gutters">
						<div class="col-lg-3 col-md-4 col-sm-12">
							<div class="chat-list bg-light-gray">
								<div class="chat-search">
									<span class="ti-search"></span>
									<input type="text" placeholder="Search Contact">
								</div>
								<div class="notification-list chat-notification-list customscroll">
									<ul>
										<li>
											<a href="#">
												<i class="micon dw dw-user"></i>
												<h3 class="clearfix">Olala</h3>
												<p><i class="fa fa-circle text-light-orange"></i> offline</p>
											</a>
										</li>
										<li class="active">
											<a href="#">
												<i class="micon dw dw-user"></i>
												<h3 class="clearfix">Test1</h3>
												<p><i class="fa fa-circle text-light-green"></i> online</p>
											</a>
										</li>
										<li>
											<a href="#">
												<i class="micon dw dw-user"></i>
												<h3 class="clearfix">Sammy</h3>
												<p><i class="fa fa-circle text-warning"></i> active 4 min</p>
											</a>
										</li>
									
									</ul>
								</div>
							</div>
						</div>
						<div class="col-lg-9 col-md-8 col-sm-12">
							<div class="chat-detail">
								<div class="chat-profile-header clearfix" style="background-color: rgb(207, 202, 202);">
									<div class="left">
										<div class="clearfix">
											<div class="chat-profile-photo">
												<i class="micon dw dw-user"></i>
											</div>
											<div class="chat-profile-name">
												<h3>Test1</h3>
												<span style="color: white;">Nairobi, Kenya</span>
											</div>
										</div>
									</div>
									<div class="right text-right">
										<div class="dropdown">
											<a class="btn btn-outline-primary1 " href="#" data-toggle="dropdown">
												<i class="dw dw-delete-3"></i>
											</a>
											<!-- <a class="btn btn-outline-primary1 " href="#" data-toggle="dropdown">
												<i class="dw dw-file"></i>
											</a> -->
											
										</div>
									</div>
								</div>
								<div class="chat-box">
									<div class="chat-desc customscroll" style="background-image: url(src/bg.jpg);">
										<ul>
										
												<li class="clearfix">
												<span class="chat-img">
													<i class="micon dw dw-user"></i>
												</span>
												<div class="chat-body clearfix">
													<p>We are just writing up the user stories now so will have requirements for you next week. We are just writing up the user stories now so will have requirements for you next week.</p>
													<div class="chat_time">09:40PM</div>
												</div>
											</li>
											
											<li class="clearfix admin_chat">
												<span class="chat-img">
													<i class="micon dw dw-user"></i>
												</span>
												<div class="chat-body clearfix">
													<p>Maybe you already have additional info?</p>
													<div class="chat_time">09:40PM</div>
												</div>
											</li>
											<li class="clearfix admin_chat">
												<span class="chat-img">
													<i class="micon dw dw-user"></i>
												</span>
												<div class="chat-body clearfix">
													<p>It is to early to provide some kind of estimation here. We need user stories.</p>
													<div class="chat_time">09:40PM</div>
												</div>
											</li>
											<li class="clearfix">
												<span class="chat-img">
													<i class="micon dw dw-user"></i>
												</span>
												<div class="chat-body clearfix">
													<p>We are just writing up the user stories now so will have requirements for you next week. We are just writing up the user stories now so will have requirements for you next week.</p>
													<div class="chat_time">09:40PM</div>
												</div>
											</li>
											
											<li class="clearfix upload-file">
												<span class="chat-img">
													<i class="micon dw dw-user"></i>
												</span>
												<div class="chat-body clearfix">
													<div class="upload-file-box clearfix">
														<div class="left">
															<img src="vendors/images/upload-file-img.jpg" alt="">
															<div class="overlay">
																<a href="#">
																	<span><i class="fa fa-angle-down"></i></span>
																</a>
															</div>
														</div>
														<div class="right">
															<h3>Big room.jpg</h3>
															<a href="#">Download</a>
														</div>
													</div>
													<div class="chat_time">09:40PM</div>
												</div>
											</li>
											<li class="clearfix upload-file admin_chat">
												<span class="chat-img">
													<i class="micon dw dw-user"></i>
												</span>
												<div class="chat-body clearfix">
													<div class="upload-file-box clearfix">
														<div class="left">
															<img src="vendors/images/upload-file-img.jpg" alt="">
															<div class="overlay">
																<a href="#">
																	<span><i class="fa fa-angle-down"></i></span>
																</a>
															</div>
														</div>
														<div class="right">
															<h3>Big room.jpg</h3>
															<a href="#">Download</a>
														</div>
													</div>
													<div class="chat_time">09:40PM</div>
												</div>
											</li>
										</ul>
									</div>
									<div class="chat-footer" >
										<div class="file-upload"><a href="#"><i class="fa fa-paperclip"></i></a></div>
										<div class="chat_text_area">
											<textarea placeholder="Type your message…"></textarea>
										</div>
										<div class="chat_send">
											<button class="btn btn-link" type="submit"><i class="icon-copy ion-paper-airplane"></i></button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="footer-wrap pd-20 mb-20 card-box">
				
			</div>
		</div>
	</div>
	<!-- js -->
	<script src="vendors/scripts/core.js"></script>
	<script src="vendors/scripts/script.min.js"></script>
	<script src="vendors/scripts/process.js"></script>
	<script src="vendors/scripts/layout-settings.js"></script>
</body>
</html>