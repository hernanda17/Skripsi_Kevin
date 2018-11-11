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

<body >
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

