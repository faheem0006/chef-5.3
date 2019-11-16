<div id="navbar-offset"></div>

<?php

/*PROGRESS ORDER BAR*/
$this->renderPartial('/front/progress-merchantsignup', array(
	'step' => 4,
	'show_bar' => true
));

?>

<div class="sections section-grey2 section-orangeform ">

	<div class="container">
		<div class="row top30">
			<div class="inner center">
				<?php if ($continue == TRUE) : ?>
					<h2><?php echo t("Almost Done..") ?></h2>
					<div class="box-grey rounded z-elevation-2">
						<p><?php echo t("Your Chef registration is successfull. Please wait till we review your profile!") ?></p>
						<br />
						<a href="<?php echo websiteUrl().'/merchant/dash-board' ?>" type="button" class="btnn btn--raised"><?php echo t("check dashboard access") ?></a>
					</div>
					<!--box-->
				<?php else : ?>
					<p><?php echo t("Sorry but we cannot find what you are looking for.") ?></p>
				<?php endif; ?>
			</div>
			<!--inner-->
		</div>
		<!--row-->
	</div>
	<!--container-->

</div>
<!--sections-->