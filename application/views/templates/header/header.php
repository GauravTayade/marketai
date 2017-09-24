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
            $.ajax({
            	url:'login/withFacebook',
            	type:'POST',
            	data:response,
            	cache:false,
            	success:function(data){
            		var response = JSON.parse(data);
            		if(response.response == 1){
            			swal({
            				title:'Success',
            				text:response.success,
            				icon:'success',
            				confirmButtonText: "Ok"
            			});
            				window.location.href = response.redirect;
            			
            		}else{
            			swal({
            				title:'Warning',
            				text:response.Warning,
            				icon:'success',
            			});
            		}
            	},
            	error:function(){
            		swal({
            			title:'Oops!',
            			text:'Unable to login with facebook',
            			icon:'error'
            		});
            	}
            });
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