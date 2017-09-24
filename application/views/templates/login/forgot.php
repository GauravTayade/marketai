<?php echo modules::run('header') ?>

<!-- Page content -->
		<div class="page-content">

			<!-- Main content -->
			<div class="content-wrapper">

				<!-- Content area -->
				<div class="content">

					<!-- Password recovery -->
					<form id="form-user-forgot" method="POST">
						<div class="panel panel-body login-form">
							<div class="text-center">
								<div class="icon-object border-warning text-warning"><i class="icon-spinner11"></i></div>
								<h5 class="content-group">Password recovery <small class="display-block">We'll send you instructions in email</small></h5>
							</div>

							<div class="form-group has-feedback">
								<input name="user_email" type="email" class="form-control" placeholder="Your email">
								<div class="form-control-feedback">
									<i class="icon-mail5 text-muted"></i>
								</div>
							</div>

							<button type="submit" id="btn-forgot" class="btn bg-blue btn-block">Reset password <i class="icon-arrow-right14 position-right"></i></button>
						</div>
					</form>
					<!-- /password recovery -->
<?php echo modules::run('footer') ?>