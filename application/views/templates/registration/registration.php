<?php echo modules::run('header'); ?>
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
		
<?php echo modules::run('footer'); ?>