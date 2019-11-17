<div id="navbar-offset"></div>

<?php

$search_address = isset($_GET['s']) ? $_GET['s'] : '';
if (isset($_GET['st'])) {
	$search_address = $_GET['st'];
}

$p = new CHtmlPurifier();
$search_address  = $p->purify($search_address);

/*dump($data);
die();
*/
/*SEARCH BY LOCATION*/
$search_by_location = false;
$location_data = '';
if (FunctionsV3::isSearchByLocation()) {
	if ($location_data = FunctionsV3::getSearchByLocationData()) {
		$search_by_location = TRUE;
		switch ($location_data['location_type']) {
			case 1:
				$search_address = $location_data['location_city'] . " " . $location_data['location_area'];
				break;

			case 2:
				$search_address = $location_data['city_name'] . " " . $location_data['state_name'];
				break;

			case 3:
				$search_address = $location_data['postal_code'];
				break;

			default:
				break;
		}
	}
}

// $this->renderPartial('/front/search-header',array(
//    'search_address'=>$search_address,
//    'total'=>$data['total']
// ));
// $this->renderPartial('/front/order-progress-bar', array(
// 	'step' => 2,
// 	'show_bar' => true
// ));
?>

	<div class="search-map-results" id="search-map-results">
	</div>
	<!--search-map-results-->

	<div class="sections section-search-results">

		<div class="container-fluid" id="container-md">

			<div class="row">

				<div class="col-md-3 border search-left-content" id="mobile-search-filter">

					<?php if ($enabled_search_map == "yes") : ?>
						<a href="javascript:;" class="search-view-map green-button block center upper rounded">
							<?php echo t("View by map") ?>
						</a>
					<?php endif; ?>

					<div class="filter-wrap rounded2 <?php echo $enabled_search_map == "" ? "no-marin-top" : ""; ?>">

						<button type="button" class="close modal-close-btn" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>

						<p class="bold"><?php echo t("Filters") ?></p>


						<!--FILTER MERCHANT NAME-->
						<?php if (!empty($restaurant_name)) : ?>
							<a href="<?php echo FunctionsV3::clearSearchParams('restaurant_name') ?>">[<?php echo t("Clear") ?>]</a>
						<?php endif; ?>
						<div class="filter-box">
							<a href="javascript:;">
								<span>
									<i class="<?php echo $fc == 2 ? "ion-ios-arrow-thin-down" : 'ion-ios-arrow-thin-right' ?>"></i>
									<?php echo t("Search by name") ?>
								</span>
								<b></b>
							</a>
							<ul class="<?php echo $fc == 2 ? "hide" : '' ?>">
								<li>
									<form method="POST" onsubmit="return research_merchant();">
										<div class="search-input-wraps rounded30">
											<div class="row">
												<div class="col-md-10 col-xs-10">
													<?php echo CHtml::textField('restaurant_name', $restaurant_name, array(
														'required' => true,
														'placeholder' => t("enter Chef Name")
													)) ?>
												</div>
												<div class="col-md-2 relative col-xs-2 ">
													<button type="submit"><i class="fa fa-search"></i></button>
												</div>
											</div>
										</div>
									</form>
								</li>
							</ul>
						</div>
						<!--filter-box-->
						<!--END FILTER MERCHANT NAME-->

						<!--FILTER CUISINE-->
						<?php if (!empty($filter_cuisine)) : ?>
							<a href="<?php echo FunctionsV3::clearSearchParams('filter_cuisine') ?>">[<?php echo t("Clear") ?>]</a>
						<?php endif; ?>
						<?php if ($cuisine = Yii::app()->functions->Cuisine(false)) : ?>
							<div class="filter-box">
								<a href="javascript:;">
									<span>
										<i class="<?php echo $fc == 2 ? "ion-ios-arrow-thin-down" : 'ion-ios-arrow-thin-right' ?>"></i>
										<?php echo t("By Category") ?>
									</span>
									<b></b>
								</a>
								<ul class="<?php echo $fc == 2 ? "hide" : '' ?>">
									<?php foreach ($cuisine as $val) : ?>
										<li>
											<?php
													$cuisine_json['cuisine_name_trans'] = !empty($val['cuisine_name_trans']) ?
														json_decode($val['cuisine_name_trans'], true) : '';

													echo CHtml::checkBox(
														'filter_cuisine[]',
														in_array($val['cuisine_id'], (array) $filter_cuisine) ? true : false,
														array(
															'value' => $val['cuisine_id'],
															'class' => "filter_by icheck filter_cuisine"
														)
													);
													?>
											<?php echo qTranslate($val['cuisine_name'], 'cuisine_name', $cuisine_json) ?>
										</li>
									<?php endforeach; ?>
								</ul>
							</div>
							<!--filter-box-->
						<?php endif; ?>
						<!--END FILTER CUISINE-->


						<!--MINIUM DELIVERY FEE-->
						<?php if (!empty($filter_minimum)) : ?>
							<a href="<?php echo FunctionsV3::clearSearchParams('filter_minimum') ?>">[<?php echo t("Clear") ?>]</a>
						<?php endif; ?>
						<?php if ($minimum_list = FunctionsV3::minimumDeliveryFee()) : ?>
							<div class="filter-box">
								<a href="javascript:;">
									<span>
										<i class="<?php echo $fc == 2 ? "ion-ios-arrow-thin-down" : 'ion-ios-arrow-thin-right' ?>"></i>
										<?php echo t("Minimum Delivery") ?>
									</span>
									<b></b>
								</a>
								<ul class="<?php echo $fc == 2 ? "hide" : '' ?>">
									<?php foreach ($minimum_list as $key => $val) : ?>
										<li>
											<?php
													echo CHtml::radioButton(
														'filter_minimum[]',
														$filter_minimum == $key ? true : false,
														array(
															'value' => $key,
															'class' => "filter_by_radio filter_minimum icheck"
														)
													);
													?>
											<?php echo $val; ?>
										</li>
									<?php endforeach; ?>
								</ul>
							</div>
							<!--filter-box-->
						<?php endif; ?>
						<!--END MINIUM DELIVERY FEE-->

					</div>
					<!--filter-wrap-->

				</div>
				<!--col search-left-content-->

				<div class="col-md-9 border search-right-content">

					<?php echo CHtml::hiddenField('sort_filter', $sort_filter) ?>
					<?php echo CHtml::hiddenField('display_type', $display_type) ?>

					<div class="sort-wrap">
						<div class="row">
							<div class="col-md-6 col-xs-6 border ">
								<?php
								$filter_list = array(
									'restaurant_name' => t("Name"),
									'ratings' => t("Rating"),
									'minimum_order' => t("Minimum"),
									'distance' => t("Distance")
								);
								if (isset($_GET['st'])) {
									unset($filter_list['distance']);
								}
								echo CHtml::dropDownList('sort-results', $sort_filter, $filter_list, array(
									'class' => "sort-results selectpicker",
									'title' => t("Sort By")
								));
								?>
							</div>
							<!--col-->
							<div class="col-md-6 col-xs-6 border">




								<a href="<?php echo FunctionsV3::clearSearchParams('', 'display_type=gridview') ?>" class="display-type orange-button block center rounded mr10px 
	             <?php echo $display_type == "listview" ? 'inactive' : '' ?>" data-type="gridview">
									<i class="fa fa-th-large"></i>
								</a>

								<a href="javascript:;" id="mobile-filter-handle" class="orange-button block center rounded mr10px">
									<i class="fa fa-filter"></i>
								</a>

								<?php if ($enabled_search_map == "yes") : ?>
									<a href="javascript:;" id="mobile-viewmap-handle" class="orange-button block center rounded mr10px">
										<i class="ion-ios-location"></i>
									</a>
								<?php endif; ?>

								<div class="clear"></div>

							</div>
						</div>
						<!--row-->
					</div>
					<!--sort-wrap-->

					<!--MERCHANT LIST -->

					<div class="result-merchant">
						<div class="row">

							<?php if (isset($_SESSION['kr_search_meal']) && isset($_GET['mealplans'])) : ?>
								<?php foreach ($meals as $meal) : ?>
									<?php
											$this->renderPartial('/front/meal-plan', array(
												'meal_data' => $meal,
												'data' => $data,
												'val' => $val,
												'merchant_id' => $meal['merchant_id']
											));
											?>
								<?php endforeach; ?>
							<?php elseif (isset($_SESSION['kr_search_foodname']) && isset($_GET['foodname'])) : ?>
								
								<?php foreach ($alacarte as $dish) : ?>
									<?php
											$ratings = Yii::app()->functions->getRatings($dish['merchant_id']);
											?>
									<?php
											$this->renderPartial('/front/food-card', array(
												'data' => $data,
												'val' => $val,
												'eager_cart' => 1,
												'dish_data' => $dish,
												'merchant_id' => $dish['merchant_id'],
												'ratings' => $ratings,
											));
											?>
								<?php endforeach; ?>
							<?php elseif (isset($_SESSION['kr_search_daily']) && isset($_GET['dailyspecial'])) : ?>
								
								<?php foreach ($daily_special as $ds) : ?>
									<?php
											$this->renderPartial('/front/daily-special-card', array(
												'val' => $val,
												'ds' => $ds
											));
											?>
								<?php endforeach; ?>
							<?php else : ?>
								<p class="center top25 text-danger"><?php echo t("No results with your selected filters") ?></p>
							<?php endif; ?>

						</div>
						<!--row-->

						<div class="search-result-loader">
							<i></i>
							<p><?php echo t("Loading more Data...") ?></p>
						</div>
						<!--search-result-loader-->

						<?php
						if (!isset($current_page_url)) {
							$current_page_url = '';
						}
						if (!isset($current_page_link)) {
							$current_page_link = '';
						}
						echo CHtml::hiddenField('current_page_url', $current_page_url);
						require_once('pagination.class.php');
						$attributes                 =   array();
						$attributes['wrapper']      =   array('id' => 'pagination', 'class' => 'pagination');
						$options                    =   array();
						$options['attributes']      =   $attributes;
						$options['items_per_page']  =   FunctionsV3::getPerPage();
						$options['maxpages']        =   1;
						$options['jumpers'] = false;
						$options['link_url'] = $current_page_link . '&page=##ID##';
						$pagination =   new pagination(4, ((isset($_GET['page'])) ? $_GET['page'] : 1), $options);
						$data   =   $pagination->render();
						?>

					</div>
					<!--result-merchant-->

				</div>
				<!--col search-right-content-->

			</div>
			<!--row-->

		</div>
		<!--container-->
	</div>
	<!--section-search-results-->

	<!-- Cart -->
	<?php
	if (!isset($the_merchant_id)) {
		$merchant_id = 1;
	}
	?>
	<?php
	/*POINTS PROGRAM*/
	if (FunctionsV3::hasModuleAddon("pointsprogram")) {
		unset($_SESSION['pts_redeem_amt']);
		unset($_SESSION['pts_redeem_points']);
	}

	$merchant_photo_bg = getOption($merchant_id, 'merchant_photo_bg');
	if (!file_exists(FunctionsV3::uploadPath() . "/$merchant_photo_bg")) {
		$merchant_photo_bg = '';
	}

	/*RENDER MENU HEADER FILE*/

	/*GET MINIMUM ORDER*/

	//dump($min_fees);

	$ratings = Yii::app()->functions->getRatings($merchant_id);

	/*ADD MERCHANT INFO AS JSON */
	$cs = Yii::app()->getClientScript();
	// $cs->registerScript(
	// 	'merchant_information',
	// 	"var merchant_information =" . json_encode($merchant_info) . "",
	// 	CClientScript::POS_HEAD
	// );

	$now = date('Y-m-d');
	$now_time = '';

	$todays_day = date("l");

	$checkout = FunctionsV3::isMerchantcanCheckout($merchant_id);
	$menu = Yii::app()->functions->getMerchantMenu($merchant_id, isset($_GET['sname']) ? $_GET['sname'] : '', $todays_day);
	//dump($menu);
	//die();

	//dump($checkout);

	echo CHtml::hiddenField('is_merchant_open', isset($checkout['code']) ? $checkout['code'] : '');

	/*hidden TEXT*/
	echo CHtml::hiddenField('restaurant_slug', $data['restaurant_slug']);
	echo CHtml::hiddenField('merchant_id', $merchant_id);
	echo CHtml::hiddenField('is_client_login', Yii::app()->functions->isClientLogin());

	echo CHtml::hiddenField(
		'website_disbaled_auto_cart',
		Yii::app()->functions->getOptionAdmin('website_disbaled_auto_cart')
	);

	$hide_foodprice = Yii::app()->functions->getOptionAdmin('website_hide_foodprice');
	echo CHtml::hiddenField('hide_foodprice', $hide_foodprice);

	echo CHtml::hiddenField('accept_booking_sameday', getOption(
		$merchant_id,
		'accept_booking_sameday'
	));

	echo CHtml::hiddenField('customer_ask_address', getOptionA('customer_ask_address'));

	echo CHtml::hiddenField(
		'merchant_required_delivery_time',
		Yii::app()->functions->getOption("merchant_required_delivery_time", $merchant_id)
	);

	/** add minimum order for pickup status*/
	$merchant_minimum_order_pickup = Yii::app()->functions->getOption('merchant_minimum_order_pickup', $merchant_id);
	if (!empty($merchant_minimum_order_pickup)) {
		echo CHtml::hiddenField('merchant_minimum_order_pickup', $merchant_minimum_order_pickup);

		echo CHtml::hiddenField(
			'merchant_minimum_order_pickup_pretty',
			displayPrice(baseCurrency(), prettyFormat($merchant_minimum_order_pickup))
		);
	}

	$is_ok_delivered = 1;

	echo CHtml::hiddenField('is_ok_delivered', $is_ok_delivered);
	echo CHtml::hiddenField('from_address', FunctionsV3::getSessionAddress());

	echo CHtml::hiddenField('merchant_close_store', getOption($merchant_id, 'merchant_close_store'));

	echo CHtml::hiddenField(
		'merchant_close_msg',
		isset($checkout['msg']) ? $checkout['msg'] : t("Sorry merchant is closed.")
	);

	echo CHtml::hiddenField('disabled_website_ordering', getOptionA('disabled_website_ordering'));
	echo CHtml::hiddenField('web_session_id', session_id());

	echo CHtml::hiddenField('merchant_map_latitude', $data['latitude']);
	echo CHtml::hiddenField('merchant_map_longtitude', $data['lontitude']);
	echo CHtml::hiddenField('restaurant_name', $data['restaurant_name']);

	echo CHtml::hiddenField('current_page', 'menu');

	/*add meta tag for image*/
	Yii::app()->clientScript->registerMetaTag(
		Yii::app()->getBaseUrl(true) . FunctionsV3::getMerchantLogo($merchant_id),
		'og:image'
	);

	$remove_delivery_info = false;
	if ($data['service'] == 3 || $data['service'] == 6 || $data['service'] == 7) {
		$remove_delivery_info = true;
	}

	/*CHECK IF MERCHANT SET TO PREVIEW*/
	$is_preview = false;
	if (isset($food_viewing_private) && $food_viewing_private == 2) {
		if (isset($_GET['preview'])) {
			if ($_GET['preview'] == 'true') {
				if (!isset($_GET['token'])) {
					$_GET['token'] = '';
				}
				if (md5($data['password']) == $_GET['token']) {
					$is_preview = true;
				}
			}
		}
		if ($is_preview == false) {
			$menu = '';
			$enabled_food_search_menu = '';
		}
	}
	?>

	<div id="menu-right-content" class="border z-elevation-5 menu-right-content">

		<div class="theiaStickySidebar">
			<div class="box-grey rounded relative">

				<!--DELIVERY INFO-->
				<?php if ($remove_delivery_info == false) : ?>
					<div class="star-float"></div>
					<div class="inner center">
						<button type="button" class="close modal-close-btn" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>

						<?php if ($data['service'] == 3) : ?>
							<p class="bold"><?php echo t("Distance Information") ?></p>
						<?php else : ?>
							<p class="bold"><?php echo t("Delivery Information") ?></p>
						<?php endif; ?>


						<?php if (FunctionsV3::enabledExtraCharges()) : ?>
							<?php $extra_charge_notification  = getOption($merchant_id, 'extra_charge_notification') ?>
							<?php if (!empty($extra_charge_notification)) : ?>
								<p class="extra_charge_notification"><?php echo $extra_charge_notification; ?></p>
							<?php endif; ?>
						<?php endif; ?>

						<?php if ($search_by_location) : ?>
							<a href="javascript:;" class="top10 green-color change-location block text-center">
								[<?php echo t("Change Location here") ?>]
							</a>
						<?php else : ?>
							<a href="javascript:;" class="top10 green-color change-address block text-center">
								<?php echo t("Change Your Address here") ?>
							</a>
						<?php endif; ?>


					</div>
					<!--END DELIVERY INFO-->
				<?php else : ?>

				<?php endif; ?>

				<!--CART-->
				<div class="inner line-top relative">

					<i class="order-icon your-order-icon"></i>

					<p class="bold center"><?php echo t("Your Order") ?></p>

					<div class="item-order-wrap"></div>

					<!--VOUCHER STARTS HERE-->
					<?php //Widgets::applyVoucher($merchant_id);
					?>
					<!--VOUCHER STARTS HERE-->

					<a href="javascript:;" class="clear-cart">[<?php echo t("Clear Order") ?>]</a>

				</div>
				<!--inner-->
				<!--END CART-->

					<!--DELIVERY OPTIONS-->
				<div class="inner line-top relative delivery-option center">
					<i class="order-icon delivery-option-icon"></i>

					<?php if ($remove_delivery_info == false) : ?>
						<p class="bold"><?php echo t("Select Time") ?></p>
					<?php else : ?>
						<p class="bold"><?php echo t("Options") ?></p>
					<?php endif; ?>

					<input type="hidden" name="delivery_type" id="delivery_type" value="delivery" />

					<?php
					echo CHtml::dropDownList(
						'delivery_date',
						'',
						(array) FunctionsV3::getDateList($merchant_id),
						array(
							'class' => 'grey-fields date_list'
						)
					);
					?>

					<div class="delivery_asap_wrap">
						<?php $detect = new Mobile_Detect; ?>
						<?php if ($detect->isMobile()) : ?>
							<?php
								echo CHtml::dropDownList(
									'delivery_time',
									$now_time,
									(array) FunctionsV3::timeList(),
									array(
										'class' => "grey-fields"
									)
								)
								?>
						<?php else : ?>
							<?php
								$website_use_time_picker = getOptionA('website_use_time_picker');
								$delivery_time_list = FunctionsV3::getTimeList($merchant_id, $now);
								if ($website_use_time_picker == 3) {
									echo CHtml::dropDownList('delivery_time', '', (array) $delivery_time_list, array(
										'class' => 'grey-fields time_list'
									));
								} else {
									$now_time = date("h:i A");
									echo CHtml::textField(
										'delivery_time',
										$now_time,
										array('class' => "timepick grey-fields", 'placeholder' => Yii::t("default", "Delivery Time"))
									);
								}
								?>
						<?php endif; ?>
					</div>

					<?php if ($checkout['code'] == 1) : ?>
						<a href="javascript:;" class="orange-button medium checkout"><?php echo $checkout['button'] ?></a>
					<?php else : ?>
						<?php if ($checkout['holiday'] == 1) : ?>
							<?php echo CHtml::hiddenField('is_holiday', $checkout['msg'], array('class' => 'is_holiday')); ?>
							<p class="text-danger"><?php echo $checkout['msg'] ?></p>
						<?php else : ?>
							<p class="text-danger"><?php echo $checkout['msg'] ?></p>
							<p class="small">
								<?php echo Yii::app()->functions->translateDate(date('F d l') . "@" . timeFormat(date('c'), true)); ?></p>
						<?php endif; ?>
					<?php endif; ?>

				</div>
				<!--inner-->
				<!--END DELIVERY OPTIONS-->
			</div> <!-- box-grey-->
		</div>
		<!--end theiaStickySidebar-->

	</div>
	<!--menu-right-content-->
	<!-- End Cart -->


	<button type="button" id="btnCart" class="btnn btn--floating">
		<i class="fa fa-cart-plus"></i>
	</button>