<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Limitless - Responsive Web Application Kit by Eugene Kopyov</title>
	<base href="<?= base_url()?>">
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

<script>
  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));

 window.fbAsyncInit = function() {
    FB.init({
      appId      : '1085488638252504', // Set YOUR APP ID
      status     : true, // check login status
      cookie     : true, // enable cookies to allow the server to access the session
      xfbml      : true,  // parse XFBML
      version    : 'v2.10',
      oauth      : true
    });

    FB.Event.subscribe('auth.authResponseChange', function(response) 
    {
     if (response.status === 'connected') 
    {
        console.log("<br>Connected to Facebook");
        //SUCCESS
        FB.api('/me', { locale: 'tr_TR', fields: 'name, email,birthday, hometown,education,gender,website,work' },
          function(response) {
            console.log(response.email);
            console.log(response.name);
            console.log(response.gender);
            console.log(response.birthday);
            console.log(response.hometown);
            console.log(response.education);
            console.log(response.website);
            console.log(response.work);
          }
        );

    }    
    else if (response.status === 'not_authorized') 
    {
        console.log("Failed to Connect");

        //FAILED
    } else 
    {
        console.log("Logged Out");

        //UNKNOWN ERROR
    }
    }); 

    };

</script>
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
					<form id="form-user-registration" method="post">
						<div class="panel panel-body login-form">
							<div class="text-center">
								<div class="icon-object border-success text-success"><i class="icon-plus3"></i></div>
								<h5 class="content-group">Create account <small class="display-block">All fields are required</small></h5>
							</div>

							<div class="content-divider text-muted form-group"><span>Your credentials</span></div>

							<div class="form-group has-feedback has-feedback-left">
								<div class="form-control-feedback">
									<i class="icon-user-check text-muted"></i>
								</div>
								<input name="username" type="text" class="form-control" placeholder="Eugene">
								<!-- <span class="help-block text-danger"><i class="icon-cancel-circle2 position-left"></i> This username is already taken</span> -->
							</div>

							<div class="form-group has-feedback has-feedback-left">
								<div class="form-control-feedback">
									<i class="icon-user-lock text-muted"></i>
								</div>
								<input type="password" name="password" id="password" class="form-control" placeholder="Create password">
							</div>

							<div class="form-group has-feedback has-feedback-left">
								<div class="form-control-feedback">
									<i class="icon-user-lock text-muted"></i>
								</div>
								<input type="password" name="repassword" class="form-control" placeholder="Create password">
							</div>

							<div class="content-divider text-muted form-group"><span>Your privacy</span></div>

							<div class="form-group has-feedback has-feedback-left">
								<div class="form-control-feedback">
									<i class="icon-mention text-muted"></i>
								</div>
								<input type="text" id="email" name="email" class="form-control" placeholder="Your email">
							</div>

							<div class="form-group has-feedback has-feedback-left">
								<div class="form-control-feedback">
									<i class="icon-mention text-muted"></i>
								</div>
								<input type="text" name="reemail" class="form-control" placeholder="Repeat email">
							</div>

							<div class="content-divider text-muted form-group"><span>Additions</span></div>

							<div class="form-group">
								

								<div class="checkbox">
									<label>
										<input type="checkbox" name="remember" class="styled" checked="checked">
										Remember
									</label>
								</div>

								<div class="checkbox">
									<label>
										<input type="checkbox" name="tandc" class="styled">
										Accept <a href="#">terms of service</a>
									</label>
								</div>
							</div>

							<button type="submit" id="btn-register" class="btn bg-teal btn-block btn-lg">Register <i class="icon-circle-right2 position-right"></i></button>
							<br/>
							<div class="fb-login-button" data-max-rows="1" data-size="large" data-button-type="login_with" data-show-faces="false" data-auto-logout-link="false" data-use-continue-as="false"></div>
						</div>
					</form>
					<!-- /advanced login -->

					<br/>
					<!-- Footer -->
					<div class="footer text-muted text-center">
						&copy; 2015. <a href="#">Limitless Web App Kit</a> by <a href="http://themeforest.net/user/Kopyov" target="_blank">Eugene Kopyov</a>
					</div>
					<!-- /footer -->

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
