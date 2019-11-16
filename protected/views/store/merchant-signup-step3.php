<div id="navbar-offset"></div>
<?php
/*PROGRESS ORDER BAR*/
$this->renderPartial('/front/progress-merchantsignup', array(
	'step' => 3,
	'show_bar' => true
));

?>

<div class="sections section-grey2 section-orangeform section-merchant-payment">

	<div class="container">

		<div class="row top30">
			<div class="inner">
				<div class="box-grey rounded center">

					<?php if ($merchant) : ?>
						<h2 class="is-title-lg"><?php echo t("You can add dish once you are approved by the admin!") ?></h2>
						<?php
							$merchant_id = $merchant['merchant_id'];
							if ($renew == TRUE) {
								$merchant['package_price'] = 1;
							}
							?>


						<div class="top10">
							<input type="submit" data-token="<?php echo $_GET['token'] ?>" value="<?php echo t("Continue") ?>" class="next_step_free_payment btnn btn--raised" />
						</div>

					<?php else : ?>
					<h2 class="is-title-lg"><?php echo t("What?") ?></h2>							
					<?php endif; ?>


				</div>
				<!--box-grey-->
			</div>
			<!--inner-->
		</div>
		<!--row-->

	</div>
	<!--container-->

</div>
<!--sections-->