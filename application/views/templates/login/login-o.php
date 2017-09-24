<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Limitless - Responsive Web Application Kit by Eugene Kopyov</title>
	<base href="<?= base_url() ?>">
	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="application/views/assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
	<link href="application/views/assets/css/bootstrap.css" rel="stylesheet" type="text/css">
	<link href="application/views/assets/css/core.css" rel="stylesheet" type="text/css">
	<link href="application/views/assets/css/components.css" rel="stylesheet" type="text/css">
	<link href="application/views/assets/css/colors.css" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<!-- Core JS files -->
	<script type="text/javascript" src="application/views/assets/js/plugins/loaders/pace.min.js"></script>
	<script type="text/javascript" src="application/views/assets/js/core/libraries/jquery.min.js"></script>
	<script type="text/javascript" src="application/views/assets/js/core/libraries/bootstrap.min.js"></script>
	<script type="text/javascript" src="application/views/assets/js/plugins/loaders/blockui.min.js"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script type="text/javascript" src="application/views/assets/js/plugins/forms/styling/uniform.min.js"></script>

	<script type="text/javascript" src="application/views/assets/js/core/app.js"></script>
	<script type="text/javascript" src="application/views/assets/js/pages/login.js"></script>
	<!-- /theme JS files -->

	<!-- validation js -->
	<script type="text/javascript" src="application/views/assets/validatejs/jquery.validate.js"></script>
	<script type="text/javascript" src="application/views/assets/validatejs/additional-methods.js"></script>

	<script type="text/javascript" src="application/views/assets/appjs/login-reg.js"></script>

</head>

<body class="login-container">

	<!-- Main navbar -->
	<div class="navbar navbar-inverse">
		<div class="navbar-header">
			<a class="navbar-brand" href="index.html"><img src="application/views/assets/images/logo_light.png" alt=""></a>

			<ul class="nav navbar-nav pull-right visible-xs-block">
				<li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
			</ul>
		</div>

		<div class="navbar-collapse collapse" id="navbar-mobile">
			<ul class="nav navbar-nav navbar-right">
				<li>
					<a href="#">
						<i class="icon-display4"></i> <span class="visible-xs-inline-block position-right"> Go to website</span>
					</a>
				</li>

				<li>
					<a href="#">
						<i class="icon-user-tie"></i> <span class="visible-xs-inline-block position-right"> Contact admin</span>
					</a>
				</li>

				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown">
						<i class="icon-cog3"></i>
						<span class="visible-xs-inline-block position-right"> Options</span>
					</a>
				</li>
			</ul>
		</div>
	</div>
	<!-- /main navbar -->


	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main content -->
			<div class="content-wrapper">

				<!-- Content area -->
				<div class="content">

					<!-- Advanced login -->
					<form id="form-user-login" method="POST">
						<div class="login-form">
							<div class="text-center">
								<div class="icon-object border-warning-400 text-warning-400"><i class="icon-people"></i></div>
								<h5 class="content-group-lg">Login to your account <small class="display-block">Enter your credentials</small></h5>
							</div>

							<div class="form-group has-feedback has-feedback-left">
								<div class="form-control-feedback">
									<i class="icon-user text-muted"></i>
								</div>
								<input name="username" type="text" class="form-control input-lg" placeholder="Username">
							</div>

							<div class="form-group has-feedback has-feedback-left">
								<div class="form-control-feedback">
									<i class="icon-lock2 text-muted"></i>
								</div>
								<input type="password" name="password" class="form-control input-lg" placeholder="Password">
							</div>

							<div class="form-group login-options">
								<div class="row">
									<div class="col-sm-6">
										<label class="checkbox-inline">
											<input type="checkbox" name="remember" class="styled" checked="checked">
											Remember
										</label>
									</div>

									<div class="col-sm-6 text-right">
										<a href="login_password_recover.html">Forgot password?</a>
									</div>
								</div>
							</div>

							<div class="form-group">
								<button id="btn-login" type="submit" class="btn bg-blue btn-block btn-lg">Login <i class="icon-arrow-right14 position-right"></i></button>
							</div>

							<div class="content-divider text-muted form-group"><span>or sign in with</span></div>
							<ul class="list-inline form-group list-inline-condensed text-center">
								<li><a href="#" class="btn border-indigo text-indigo btn-flat btn-icon btn-rounded"><i class="icon-facebook"></i></a></li>
								<li><a href="#" class="btn border-pink-300 text-pink-300 btn-flat btn-icon btn-rounded"><i class="icon-dribbble3"></i></a></li>
								<li><a href="#" class="btn border-slate-600 text-slate-600 btn-flat btn-icon btn-rounded"><i class="icon-github"></i></a></li>
								<li><a href="#" class="btn border-info text-info btn-flat btn-icon btn-rounded"><i class="icon-twitter"></i></a></li>
							</ul>

							<div class="content-divider text-muted form-group"><span>Don't have an account?</span></div>
							<a href="login_registration.html" class="btn bg-slate btn-block btn-lg content-group">Register</a>
							<span class="help-block text-center">By continuing, you're confirming that you've read and agree to our <a href="#">Terms and Conditions</a> and <a href="#">Cookie Policy</a></span>
						</div>
					</form>
					<!-- /advanced login -->

				</div>
				<!-- /content area -->

			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->

	</div>
	<!-- /page container -->

</body>
</html>
