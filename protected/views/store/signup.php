<style>
	#register-form {
		visibility: hidden;
		height: 0;
		width: 0;
	}
</style>

<?php
echo CHtml::hiddenField('mobile_country_code', Yii::app()->functions->getAdminCountrySet(true));
?>

<div class="sections section-grey2 section-checkout">

	<div class="container" id="signup-container">

		<div class="row flex flex--justify-center">
			<!--LEFT CONTENT-->
			<div id="login-form" class="col-md-12 border text-center">

				<div class="box-grey rounded z-elevation-5">
					<div class="section-label bottom20">
						<a class="section-label-a">
							<i class="ion-android-contact i-big"></i>
							<span class="bold" style="background:#fff;">
								<?php echo t("Log in to your account") ?></span>
							<b></b>
						</a>
					</div>

					<form id="forms" class="forms" method="POST">
						<?php echo CHtml::hiddenField('action', 'clientLogin') ?>
						<?php echo CHtml::hiddenField('currentController', 'store') ?>
						<?php FunctionsV3::addCsrfToken(false); ?>

						<?php if ($google_login_enabled == 2 || $fb_flag == 2) : ?>
							<?php if ($fb_flag == 2) : ?>
								<a href="javascript:fbcheckLogin();" class="fb-button orange-button medium rounded">
									<i class="ion-social-facebook"></i><?php echo t("login with Facebook") ?>
								</a>
							<?php endif; ?>

							<?php if ($google_login_enabled == 2) : ?>
								<div class="top10"></div>
								<a href="<?php echo Yii::app()->createUrl('/store/googleLogin') ?>" class="google-button orange-button medium rounded">
									<i class="ion-social-googleplus-outline"></i><?php echo t("Sign in with Google") ?>
								</a>
							<?php endif; ?>

							<div class="login-or">
								<span><?php echo t("Or") ?></span>
							</div>
						<?php endif; ?>

						<div class="row top10">
							<div class="col-md-12 ">
								<?php echo CHtml::textField(
									'username',
									'',
									array(
										'class' => 'grey-fields',
										'placeholder' => t("Mobile number or email"),
										'required' => true
									)
								) ?>
							</div>
						</div>
						<!--row-->

						<div class="row top10">
							<div class="col-md-12 ">
								<?php echo CHtml::passwordField(
									'password',
									'',
									array(
										'class' => 'grey-fields',
										'placeholder' => t("Password"),
										'required' => true
									)
								) ?>
							</div>
						</div>
						<!--row-->

						<?php if ($captcha_customer_login == 2) : ?>
							<div class="top10">
								<div id="kapcha-1"></div>
							</div>
						<?php endif; ?>

						<div class="row top15">
							<div class="col-md-12">
								<input type="submit" value="<?php echo t("Login") ?>" class="btnn btn--raised medium full-width">
								<br /><br />
								<div class="flex flex--justify-around flex--align-center">
									<a href="javascript:;" class="forgot-pass-link2 block text-center">
										<?php echo t("Forgot Password"); ?> <i class="ion-help"></i>
									</a>
									<a href="javascript:;" id="btnShowRegisterForm"><?php echo t("Signup Instead") ?></a>
								</div>
							</div>
						</div>

					</form>

				</div>
				<!--box-grey-->

				<form id="frm-modal-forgotpass" class="frm-modal-forgotpass" method="POST" onsubmit="return false;">
					<?php echo CHtml::hiddenField('action', 'forgotPassword') ?>
					<?php echo CHtml::hiddenField('do-action', isset($_GET['do-action']) ? $_GET['do-action'] : '') ?>
					<div class="section-forgotpass">
						<div class="box-grey rounded">
							<div class="section-label bottom20">
								<a class="section-label-a">
									<i class="ion-unlocked i-big"></i>
									<span class="bold" style="background:#fff;">
										<?php echo t("Forgot Password") ?></span>
									<b></b>
								</a>
							</div>

							<div class="row top15">
								<div class="col-md-12 ">
									<?php echo CHtml::textField(
										'username-email',
										'',
										array(
											'class' => 'grey-fields',
											'placeholder' => t("Email address"),
											'required' => true
										)
									) ?>
								</div>
							</div>
							<!--row-->

							<div class="row top10">
								<div class="col-md-6 ">
									<a href="javascript:;" class="back-link block orange-text text-center">
										<?php echo t("Close"); ?>
									</a>
								</div>
								<div class="col-md-6 ">
									<input type="submit" value="<?php echo t("Retrieve Password") ?>" class="green-button medium full-width">
								</div>
							</div>

						</div>
						<!--box-grey-->
					</div>
					<!--section-forgotpass-->
				</form>


			</div>
			<!--col-->
			<!--END LEFT CONTENT-->

			<!--RIGHT CONTENT-->
			<div id="register-form" class="col-md-12 border text-center">

				<div class="box-grey rounded top-line-green z-elevation-5">

					<form id="form-signup" class="form-signup uk-panel uk-panel-box uk-form" method="POST">
						<?php echo CHtml::hiddenField('action', 'clientRegistrationModal') ?>
						<?php echo CHtml::hiddenField('currentController', 'store') ?>
						<?php echo CHtml::hiddenField('single_page', 2) ?>
						<?php FunctionsV3::addCsrfToken(false); ?>
						<?php
						$verification = Yii::app()->functions->getOptionAdmin("website_enabled_mobile_verification");
						if ($verification == "yes") {
							echo CHtml::hiddenField('verification', $verification);
						}
						if (getOptionA('theme_enabled_email_verification') == 2) {
							echo CHtml::hiddenField('theme_enabled_email_verification', 2);
						}
						?>

						<div class="section-label bottom20">
							<a class="section-label-a">
								<i class="ion-compose i-big green-color"></i>
								<span class="bold" style="background:#fff;">
									<?php echo t("Sign up") ?></span>
								<b></b>
							</a>
						</div>

						<div class="row top10">
							<div class="col-md-12 ">
								<?php echo CHtml::textField(
									'first_name',
									'',
									array(
										'class' => 'grey-fields',
										'placeholder' => t("First Name"),
										'required' => true
									)
								) ?>
							</div>
						</div>
						<!--row-->

						<div class="row top10">
							<div class="col-md-12 ">
								<?php echo CHtml::textField(
									'last_name',
									'',
									array(
										'class' => 'grey-fields',
										'placeholder' => t("Last Name"),
										'required' => true
									)
								) ?>
							</div>
						</div>
						<!--row-->

						<div class="row top10">
							<div class="col-md-12 ">
								<?php echo CHtml::textField(
									'contact_phone',
									'',
									array(
										'class' => 'grey-fields mobile_inputs',
										'placeholder' => t("Mobile"),
										'required' => true
									)
								) ?>
							</div>
						</div>
						<!--row-->

						<div class="row top10">
							<div class="col-md-12 ">
								<?php echo CHtml::textField(
									'email_address',
									'',
									array(
										'class' => 'grey-fields',
										'placeholder' => t("Email address"),
										'required' => true
									)
								) ?>
							</div>
						</div>
						<!--row-->

						<div class="row top10">
							<div class="col-md-12 ">
								<?php echo CHtml::passwordField(
									'password',
									'',
									array(
										'class' => 'grey-fields',
										'placeholder' => t("Password"),
										'required' => true
									)
								) ?>
							</div>
						</div>
						<!--row-->

						<div class="row top10">
							<div class="col-md-12 ">
								<?php echo CHtml::passwordField(
									'cpassword',
									'',
									array(
										'class' => 'grey-fields',
										'placeholder' => t("Confirm Password"),
										'required' => true
									)
								) ?>
							</div>
						</div>
						<!--row-->


						<?php
						$FunctionsK = new FunctionsK();
						$FunctionsK->clientRegistrationCustomFields();
						?>

						<?php if ($captcha_customer_signup == 2) : ?>
							<div class="top10">
								<div id="kapcha-2"></div>
							</div>
						<?php endif; ?>

						<p class="text-muted">
							<?php echo Yii::t("default", "By creating an account, you agree to receive sms from vendor.") ?>
						</p>

						<?php if ($terms_customer == "yes") : ?>
							<div class="row">
								<div class="col-md-1">
									<?php
										echo CHtml::checkBox('terms_n_condition', false, array(
											'value' => 2,
											'class' => "icheck",
											'required' => true
										)); ?>
								</div>
								<div class="col-md-11 text-left">
									<?php
										echo " " . t("I Agree To") . " <a href=\"$terms_customer_url\" target=\"_blank\">" . t("The Terms & Conditions") . "</a>";
										?>
								</div>
							</div>
						<?php endif;; ?>

						<div class="row top10">
							<div class="col-md-12">
								<input type="submit" value="<?php echo t("Create Account") ?>" class="btnn btn--raised medium block full-width">
								<br />
								<a href="#!" id="btnShowLoginForm"><?php echo t("or Login Instead!") ?></a>
							</div>
						</div>

					</form>
				</div>
				<!--box-grey-->


			</div>
			<!--col-->
			<!--END RIGHT CONTENT-->

		</div>
		<!--row-->

	</div>
	<!--container-->

</div>
<!--section-grey-->

<script>
	var registerForm = document.querySelector('#register-form'),
		loginForm = document.querySelector('#login-form');

	document.querySelector('#btnShowRegisterForm').onclick = function() {
		registerForm.style.visibility = 'visible';
		registerForm.style.height = 'auto';
		registerForm.style.width = 'auto';
		loginForm.style.visibility = 'hidden';
		loginForm.style.height = '0';
		loginForm.style.width = '0';
	};
	
	document.querySelector('#btnShowLoginForm').onclick = function() {
		registerForm.style.visibility = 'hidden';
		registerForm.style.height = '0';
		registerForm.style.width = '0';
		loginForm.style.visibility = 'visible';
		loginForm.style.height = 'auto';
		loginForm.style.width = 'auto';
	};
</script>