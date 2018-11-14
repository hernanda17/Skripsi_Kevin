<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>APLIKASI TEKNISI</title>
	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>assets/css/minified/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>assets/css/minified/core.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>assets/css/minified/components.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>assets/css/minified/colors.min.css" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/loaders/pace.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/core/libraries/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/core/libraries/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/loaders/blockui.min.js"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/ui/prism.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/core/libraries/jquery_ui/interactions.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/forms/selects/select2.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/core/app.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/pages/form_select2.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/forms/styling/uniform.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/notifications/pnotify.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/forms/selects/bootstrap_multiselect.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/pages/form_multiselect.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/pages/form_inputs.js"></script>
	<!-- /theme JS files -->

</head>

<body class="pace-done">
	<div class="pace  pace-inactive">
		<div class="pace-progress" data-progress-text="100%" data-progress="99" style="transform: translate3d(100%, 0px, 0px);">
			<div class="pace-progress-inner"></div>
		</div>
		<div class="pace-activity"></div>
	</div>

	<!-- Main navbar -->
	<div class="navbar navbar-inverse">
		<div class="navbar-header">
			<a class="navbar-brand" href="<?php echo base_url();?>index.php/home">APLIKASI TEKNISI</a>

			<ul class="nav navbar-nav pull-right visible-xs-block">
				<li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a>
				</li>
				<li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a>
				</li>
			</ul>
		</div>

		<div class="navbar-collapse collapse" id="navbar-mobile">
			<ul class="nav navbar-nav">
				<li>
					<a class="sidebar-control sidebar-main-toggle hidden-xs" data-popup="tooltip" title="" data-placement="bottom" data-container="body" data-original-title="Side Bar">
						<i class="icon-paragraph-justify3"></i>
					</a>
				
				</li>
			</ul>

			<ul class="nav navbar-nav navbar-right">
				<div class="dropdown-menu dropdown-content">
					<div class="dropdown-content-footer">
						<a href="#" data-popup="tooltip" title="" data-original-title="All users"><i class="icon-menu display-block"></i></a>
					</div>
				</div>
				</li>
				<li class="dropdown dropdown-user">
					<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
						<img src="<?php echo base_url();?>assets/images/placeholder.jpg" alt="">
						<span><?php if($this->session->userdata('logged_in'))
									{
										$session_id = $this->session->userdata('logged_in');
										echo $session_id["idUser"];
									}else
									{
										echo "Nama Admin";
									}
									?></span>
						<i class="caret"></i>
					</a>
				

					<ul class="dropdown-menu dropdown-menu-right">
						<li><a href="<?php echo base_url();?>index.php/home/do_logout"><i class="icon-switch2"></i> Logout</a>
						</li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
	<!-- /main navbar -->


	<!-- Page container -->
	<div class="page-container" style="min-height:592px">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main sidebar -->
			<div class="sidebar sidebar-main">
				<div class="sidebar-content">

					<!-- User menu -->
					<div class="sidebar-user">
						<div class="category-content">
							<div class="media">
								<!-- FOTO USER -->
								<a href="#" class="media-left"><img src="<?php echo base_url();?>assets/images/placeholder.jpg" class="img-circle img-sm" alt=""></a>
								<div class="media-body">
									<span class="media-heading text-semibold">
										<?php if($this->session->userdata('logged_in'))
									{
										$session_id = $this->session->userdata('logged_in');
										echo $session_id["idUser"];
									}else
									{
										echo "Nama Admin";
									}
									?>
									</span>
									<div class="text-size-mini text-muted">
										<i class="icon-mail5"></i>
										<?php 
										if($this->session->userdata('logged_in'))
										{
											$role = $this->session->userdata('logged_in')["role"]; 
	
											if($role == "0")
											{
												echo "Gudang";
											}else if($role == "1")
											{
												echo "Teknisi";
											}elseif($role == "2")
											{
												echo "Kepala Teknisi";
											}
									}else
									{
										echo "Role User";
									}
									?>
									</div>
								</div>

								<div class="media-right media-middle">
									<ul class="icons-list">
										<li>
											<a href="#"></a>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<!-- /user menu -->


					<!-- Main navigation -->
					<div class="sidebar-category sidebar-category-visible">
						<div class="category-content no-padding">
							<ul class="navigation navigation-main navigation-accordion">

								<!-- Main DISINI ROLE MENU-->
								<li class="navigation-header">
									<span>Main</span>
									<i class="icon-menu" title="" data-original-title="Main pages"></i>
								</li>

								<li><a href="<?php echo base_url();
									?>index.php/home/">
									<i class="icon-home4"></i> 
									<span>BERANDA</span></a>
								
								</li>
								<?php 
								if(@$role == "0" ||@$role == "2")
								{
								?>
								<li><a href="<?php echo base_url();
									?>index.php/home/Report">
									<i class="icon-mailbox"></i> 
									<span>REPORT</span></a>
								</li>
								<?php }?>
							</ul>
						</div>
					</div>
					<!-- /main navigation -->

				</div>
			</div>
			<!-- /main sidebar -->


			<!-- Main content -->
			<div class="content-wrapper">

				<!-- Page header -->
				<div class="page-header">
					<div class="page-header-content">
						<div class="page-title">
							<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Teknisi</span></h4>
						</div>
						<a class="heading-elements-toggle"><i class="icon-menu"></i></a>
					</div>

					<div class="breadcrumb-line">
						<ul class="breadcrumb">
							<li><a href="index.html"><i class="icon-home2 position-left"></i> Home</a>
							</li>
						</ul>


						<a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a>
					</div>
				</div>