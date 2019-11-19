<div class="uk-width-1">
	<a style="font-size: 1.25rem" href="<?php echo Yii::app()->request->baseUrl; ?>/merchant/FoodItem/Do/Add" class="uk-button"><i class="fa fa-plus"></i> <?php echo Yii::t("default", "Add New") ?></a>
	<a style="font-size: 1.25rem" href="<?php echo Yii::app()->request->baseUrl; ?>/merchant/FoodItem" class="uk-button"><i class="fa fa-list"></i> <?php echo Yii::t("default", "List") ?></a>
</div>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous" />

<style>
	.btnn {
		font-size: 1.25rem !important
	}

	/*form styles*/
	.form-control {
		width: 100%;
		display: block;
		margin-bottom: 1rem
	}

	label {
		display: block;
		font-family: 'Lato', serif;
		font-size: 2.25rem !important
	}

	#forms {
		position: relative;
		margin-top: 30px
	}

	#forms fieldset {
		background: white;
		border: 0 none;
		border-radius: 0 1rem 0 1rem;
		padding: 20px 30px;
		box-sizing: border-box;
		/*stacking fieldsets above each other*/
		position: relative;
	}

	/*Hide all except first fieldset*/
	#forms fieldset:not(:first-of-type) {
		display: none;
	}

	.d-none {
		display: none !important
	}


	/*buttons*/
	#forms .action-button {
		border-radius: 26px;
		font-size: 1rem
	}

	#forms .action-button-previous+button {
		float: right
	}

	#forms button.next {
		background: green;
		color: #fff
	}

	.fs-subtitle {
		font-weight: normal;
		font-size: 13px;
		margin: 1rem 0 !important;
		color: #666
	}

	/*progressbar*/
	#progressbar {
		margin-bottom: 30px;
		overflow: hidden;
		/*CSS counters to number the steps*/
		counter-reset: step;
	}

	#progressbar li {
		list-style-type: none;
		color: #222;
		text-transform: uppercase;
		font-size: 12px;
		width: 20%;
		font-weight: 600;
		float: left;
		position: relative;
		text-align: center
	}

	#progressbar li::before {
		content: counter(step);
		counter-increment: step;
		box-shadow: 0px 1px 8px 0px rgba(0, 0, 0, 0.2), 0px 3px 4px 0px rgba(0, 0, 0, 0.14), 0px 3px 3px -2px rgba(0, 0, 0, 0.12);
		width: 36px;
		height: 36px;
		line-height: 38px;
		display: block;
		font-size: 12px;
		color: #333;
		background: white;
		border-radius: 25px;
		margin: 0 auto 10px auto;
	}

	/*progressbar connectors*/
	#progressbar li::after {
		content: '';
		width: 100%;
		height: 2px;
		background: white;
		position: absolute;
		left: -50%;
		top: 16px;
		z-index: -1
	}

	#progressbar li:first-child::after {
		/*connector not needed before the first step*/
		content: none;
	}

	/*marking active/completed steps green*/
	/*The number of the step and the connector before it = green*/
	#progressbar li.active::before,
	#progressbar li.active::after {
		background: green;
		color: white;
	}

	#progressbar li.active::after {
		color: #f75d34;
		z-index: 1;
		background: green
	}

	.dish-img {
		width: 200px;
		height: 150px
	}


	.dish-tip {
		padding: 1rem 1.5rem;
		background: #fff;
		margin: 1rem 0;
		transition: .2s ease;
		border-radius: 0 1rem 0 1rem
	}

	.dish-tip.is-active {
		border: 2px solid green;
		animation: jackInTheBox .5s ease
	}

	@-webkit-keyframes jackInTheBox {
		0% {
			opacity: 0;
			-webkit-transform: scale(.1) rotate(30deg);
			transform: scale(.1) rotate(30deg);
			-webkit-transform-origin: center bottom;
			transform-origin: center bottom
		}

		50% {
			-webkit-transform: rotate(-10deg);
			transform: rotate(-10deg)
		}

		70% {
			-webkit-transform: rotate(3deg);
			transform: rotate(3deg)
		}

		to {
			opacity: 1;
			-webkit-transform: scale(1);
			transform: scale(1)
		}
	}

	@keyframes jackInTheBox {
		0% {
			opacity: 0;
			-webkit-transform: scale(.1) rotate(30deg);
			transform: scale(.1) rotate(30deg);
			-webkit-transform-origin: center bottom;
			transform-origin: center bottom
		}

		50% {
			-webkit-transform: rotate(-10deg);
			transform: rotate(-10deg)
		}

		70% {
			-webkit-transform: rotate(3deg);
			transform: rotate(3deg)
		}

		to {
			opacity: 1;
			-webkit-transform: scale(1);
			transform: scale(1)
		}
	}

	.jackInTheBox {
		-webkit-animation-name: jackInTheBox;
		animation-name: jackInTheBox
	}

	.has-padding {
		padding: 1rem
	}
</style>


<div class="spacer"></div>

<div id="error-message-wrapper"></div>

<h2 class="is-title-lg"><strong>Dish Listing Form</strong></h2>
<div class="container">
	<div class="row">
		<div class="col-md-8 z-elevation-2 has-padding">
			<form class="uk-form uk-form-horizontal forms" id="forms">
				<?php echo CHtml::hiddenField('action', 'FoodItemAdd') ?>
				<?php echo CHtml::hiddenField('id', isset($_GET['id']) ? $_GET['id'] : ""); ?>
				<?php if (isset($_GET['redirect'])) : ?>
					<?php echo CHtml::hiddenField("redirect", Yii::app()->request->baseUrl . "/merchantsignup?do=step4&token=Ok") ?>
				<?php endif; ?>
				<?php if (!isset($_GET['id'])) : ?>
					<?php echo CHtml::hiddenField("redirect", Yii::app()->request->baseUrl . "/merchant/FoodItem/Do/Add") ?>
				<?php endif; ?>

				<?php
				$addon_item = '';
				$price = '';
				$category = '';
				$cooking_ref_selected = '';
				$multi_option_Selected = '';
				$multi_option_value_selected = '';
				$ingredients_selected = '';
				$data = array();

				if (isset($_GET['id'])) {
					if (!$data = Yii::app()->functions->getFoodItem2($_GET['id'])) {
						echo "<div class=\"uk-alert uk-alert-danger\">" .
							Yii::t("default", "Sorry but we cannot find what your are looking for.") . "</div>";
						return;
					}
					$addon_item = isset($data['addon_item']) ? (array) json_decode($data['addon_item']) : false;
					$category = isset($data['category']) ? (array) json_decode($data['category']) : false;
					$price = isset($data['price']) ? (array) json_decode($data['price']) : false;
					$cooking_ref_selected = isset($data['cooking_ref']) ? (array) json_decode($data['cooking_ref']) : false;
					$multi_option_Selected = isset($data['multi_option']) ? (array) json_decode($data['multi_option']) : false;
					$multi_option_value_selected = isset($data['multi_option_value']) ? (array) json_decode($data['multi_option_value']) : false;

					$ingredients_selected = isset($data['ingredients']) ? (array) json_decode($data['ingredients']) : false;

					$two_flavors_position = isset($data['two_flavors_position']) ? (array) json_decode($data['two_flavors_position']) : false;
					//dump($two_flavors_position);

					$require_addon = isset($data['require_addon']) ? (array) json_decode($data['require_addon']) : false;
				}

				//echo CHtml::hiddenField('merchant_tax', $merchant_tax);
				?>


				<?php
				Yii::app()->functions->data = 'list';
				$addon_list = Yii::app()->functions->getAddOnList(Yii::app()->functions->getMerchantID());
				?>
				<!-- progressbar -->
				<ul id="progressbar">
					<li class="active">About Dish</li>
					<li>Dish Details</li>
					<li>QTY & Serving</li>
					<li>Order Time</li>
					<li>Add Dish Photo</li>
				</ul>

				<!-- fieldsets -->
				<fieldset>
					<label class="is-title-lg"><?php echo Yii::t("default", "What do you call your dish? *") ?></label>
					<?php echo CHtml::textField(
						'item_name',
						isset($data['item_name']) ? $data['item_name'] : "",
						array(
							'class' => 'form-control',
							'data-validation' => "required",
							'placeholder' => 'Tomato Rosemary Chicken Spaghetti.',
							'onfocus' => "DishTip.activate('tip1-1')",
							'onblur' => "DishTip.deActivate()"
						)
					) ?>
					<br />
					<label class="is-title-lg"><?php echo Yii::t("default", "How would you describe your dish? *") ?></label>
					<div class="uk-form-row form-group">
						<?php echo CHtml::textArea(
							'item_description',
							isset($data['item_description']) ? $data['item_description'] : "",
							array(
								'class' => 'form-control',
								'rows' => '4',
								'onfocus' => "DishTip.activate('tip1-2')",
								'onblur' => "DishTip.deActivate()",
								'placeholder' => "e.g. Basmati rice flavoured with exotic spices and my secret ingredient and layered with chicken and potatoes cooked in a thick, savory and slightly spicy gravy. This is definitely a dish for a special occasion. Mixed well before serving."
							)
						) ?>
					</div>
					<br />
					<button type="button" name="next" class="next action-button btnn btn--raised waves-effect waves-light">Continue</button>
				</fieldset>

				<fieldset>
					<?php
					Yii::app()->functions->data = 'list';
					// Get Categories
					$category_list = Yii::app()->functions->getCategoryList();
					$category = isset($data['category']) ? (array) json_decode($data['category']) : false;
					?>

					<label class="is-title-lg"><?php echo Yii::t("default", "Is your dish a: *") ?></label>
					<?php
					Yii::app()->functions->data = 'list';
					$category_list = Yii::app()->functions->getCategoryList(Yii::app()->functions->getMerchantID());
					?>
					<div class="uk-form-row">
						<?php if (is_array($category_list) && count($category_list) >= 1) : ?>
							<ul class="uk-list uk-list-striped">
								<?php foreach ($category_list as $key => $val) : ?>
									<li>
										<?php echo CHtml::radioButton(
													'category[]',
													in_array($key, (array) $category) ? true : false,
													array(
														'value' => $key,
													)
												) ?>
										<?php echo clearString($val); ?>
									</li>
								<?php endforeach; ?>
							</ul>
						<?php endif; ?>
					</div>

					<!-- Cusine Here -->

					<label class="space-top is-title-lg space-bottom--sm"><?php echo t("Does your dish have any special features?") ?></label>
					<?php
					$ingredients = Yii::app()->functions->getIngredientsList(Yii::app()->functions->getMerchantID());
					?>
					<?php if (is_array($ingredients) && count($ingredients) >= 1) : ?>
						<div class="uk-form-row">
							<?php if (is_array($ingredients) && count($ingredients) >= 1) : ?>
								<ul class="uk-list">
									<?php foreach ($ingredients as $key => $val) : ?>
										<li>
											<?php echo CHtml::checkBox(
															'ingredients[]',
															in_array($key, (array) $ingredients_selected) ? true : false,
															array(
																'value' => $key,
																'onfocus' => "DishTip.activate('tip2-2')",
																'onblur' => "DishTip.deActivate()",
															)
														) ?>
											<span class="space-left--xs"><?php echo ($val); ?></span>
										</li>
									<?php endforeach; ?>
								</ul>
							<?php endif; ?>
						</div>
					<?php endif; ?>

					<br />
					<hr />
					<button type="button" name="previous" class="previous action-button-previous btnn btn--raised">Back</button>
					<button type="button" name="next" class="next action-button btnn btn--raised waves-effect waves-light">Continue</button>
				</fieldset>

				<fieldset>
					<div class="form-group">
						<label for="" class="is-title-lg"><?php echo t("How many people does one serving of your dish feed? *") ?></label>
						<input type="number" id="item_serve" name="item_serve" onfocus="DishTip.activate('tip3-1')" onblur="DishTip.deActivate()" class="form-control">
					</div>
					<div class="form-group">
						<label for="" class="is-title-lg"><?php echo t("What is the measurement type and quantity of this dish?") ?></label>
						<div class="flex">
							<input type="number" id="item_quantity" name="item_quantity" class="form-control" name="dishPeople" />
							<select onfocus="DishTip.activate('tip3-2')" onblur="DishTip.deActivate()" class="space-left" id="item_mt" name="item_mt">
								<option value="None"><?php echo t("None") ?></option>
								<option value="Dozens"><?php echo t("Dozens") ?></option>
								<option value="KGs"><?php echo t("KGs") ?></option>
								<option value="Litres"><?php echo t("Litres") ?></option>
								<option value="Pounds"><?php echo t("Pounds") ?></option>
							</select>
						</div>
					</div>

					<label for="" class="is-title-lg"><?php echo t("Please select size and price accordingly") ?></label>
					<?php
					$size_list = Yii::app()->functions->getSizeList(Yii::app()->functions->getMerchantID());
					$new_size_list = array();
					$new_size_list[0] = "";
					$new_size_list[7] = "Small";
					$new_size_list[8] = "Medium";
					$new_size_list[9] = "Large";
					$size_list = $new_size_list;
					?>
					<?php if (is_array($size_list) && count($size_list) >= 1) : ?>
						<ul class="uk-list price_wrap_parent">
							<li>
								<div class="uk-grid">
									<?php if ($merchant_apply_tax == 1) : ?>
										<div class="uk-width-1-3"><?php echo Yii::t("default", "Size") ?></div>
										<div class="uk-width-1-4"><?php echo Yii::t("default", "Price") ?></div>
										<div class="uk-width-1-4"><?php echo Yii::t("default", "Price With Tax") ?></div>
										<div class="uk-width-1-4">&nbsp;</div>
									<?php else : ?>
										<div class="uk-width-1-3"><?php echo Yii::t("default", "Size") ?></div>
										<div class="uk-width-1-3"><?php echo Yii::t("default", "Price") ?></div>
									<?php endif; ?>
								</div>
							</li>

							<?php
								/*dump($size_list); dump($price);
	dump($merchant_apply_tax);	*/
								?>

							<?php if (is_array($price) && count($price) >= 1) : ?>
								<?php $x = 1; ?>
								<?php foreach ($price as $price_key => $val_price) : ?>
									<li class="<?php echo $x == count($price) ? "price_wrap" : ""; ?>">
										<div class="uk-grid">

											<?php if ($merchant_apply_tax == 1) : ?>

												<div class="uk-width-1-3">
													<?php echo CHtml::dropDownList('size[]', $price_key, $size_list, array('class' => "uk-form-width-medium")) ?>
												</div>
												<div class="uk-width-1-4">
													<?php echo CHtml::textField(
																		'price[]',
																		$val_price,
																		array('class' => 'uk-form-width-medium numeric_only food_price')
																	) ?>
												</div>

												<div class="uk-width-1-4">
													<span class="price_with_tax">
														<?php echo standardPrettyFormat($val_price + ($val_price * $merchant_tax)) ?>
													</span>
												</div>

												<div class="uk-width-1-6">
													<a href="javascript:;" class="removeprice"><i class="fa fa-minus-square"></i></a>
												</div>

											<?php else : ?>

												<div class="uk-width-1-4">
													<?php echo CHtml::dropDownList('size[]', $price_key, $size_list, array('class' => "uk-form-width-medium")) ?>
												</div>
												<div class="uk-width-1-4">
													<?php echo CHtml::textField(
																		'price[]',
																		$val_price,
																		array('class' => 'uk-form-width-medium numeric_only')
																	) ?>
												</div>

												<div class="uk-width-1-2">
													<a href="javascript:;" class="removeprice"><i class="fa fa-minus-square"></i></a>
												</div>

											<?php endif; ?>

										</div>
									</li>
									<?php $x++; ?>
								<?php endforeach; ?>
							<?php else : ?>
								<li class="price_wrap">
									<div class="uk-grid">

										<?php if ($merchant_apply_tax == 1) : ?>

											<div class="uk-width-1-3">
												<?php echo CHtml::dropDownList('size[]', '', $size_list, array('class' => "uk-form-width-medium")) ?>
											</div>
											<div class="uk-width-1-4">
												<?php echo CHtml::textField(
																'price[]',
																'',
																array('class' => 'uk-form-width-medium numeric_only food_price')
															) ?>
											</div>

											<div class="uk-width-1-4">
												<span class="price_with_tax">&nbsp;</span>
											</div>

											<div class="uk-width-1-6">
												<a href="javascript:;" class="removeprice"><i class="fa fa-minus-square"></i></a>
											</div>

										<?php else : ?>
											<div class="uk-width-1-3">
												<?php echo CHtml::dropDownList('size[]', '', $size_list, array('class' => "uk-form-width-medium")) ?>
											</div>
											<div class="uk-width-1-3">
												<?php echo CHtml::textField(
																'price[]',
																'',
																array('class' => 'uk-form-width-medium numeric_only')
															) ?>
											</div>
											<div class="uk-width-1-3">
												<a href="javascript:;" class="removeprice"><i class="fa fa-minus-square"></i></a>
											</div>
										<?php endif; ?>

									</div>
								</li>
							<?php endif; ?>

							<li>
								<a href="javascript:;" class="addnewprice"><i class="fa fa-plus-circle"></i></a>
							</li>

						</ul>
					<?php else : ?>
						<p class="uk-text-danger"><?php echo Yii::t("default", "Please add different size in order to add price.") ?></p>
					<?php endif; ?>

					<label class="is-title-lg"><?php echo Yii::t("default", "How much Discount you are offering? (numeric value)") ?></label>
					<div class="uk-form-row">
						<?php echo CHtml::textField(
							'discount',
							isset($data['discount']) ? $data['discount'] : "",
							array(
								'class' => 'form-control numeric_only'
							)
						) ?>
					</div>

					<br />
					<hr />

					<button type="button" name="previous" class="previous action-button-previous btnn btn--raised" value="Previous">Back</button>
					<button type="button" name="next" class="next action-button btnn btn--raised waves-effect waves-light">Continue</button>
				</fieldset>

				<fieldset>
					<label class="space-top is-title-lg space-bottom">
						<?php echo t("Once you get an order, how much time do you need to prepare the dish? *") ?></label>
					<div class="form-group flex flex--align-center">
						<select onfocus="DishTip.activate('tip4-1')" onblur="DishTip.deActivate()" name="item_order_time" id="item_order_time">
							<option value="1"><?php echo t("1") ?></option>
							<option value="2"><?php echo t("2") ?></option>
							<option value="4"><?php echo t("4") ?></option>
							<option value="6"><?php echo t("6") ?></option>
							<option value="12"><?php echo t("12") ?></option>
							<option value="24"><?php echo t("24") ?></option>
							<option value="48"><?php echo t("48") ?></option>
						</select>
						<label for="" class="space-left">Hours</label>
						<div class="uk-form-row d-none">
							<label class="uk-form-label"><?php echo Yii::t("default", "Status") ?></label>
							<?php echo CHtml::dropDownList(
								'status',
								'publish',
								(array) statusList(),
								array(
									'class' => 'uk-form-width-medium',
									'data-validation' => "required"
								)
							) ?>
						</div>
					</div>

					<br />
					<hr />
					<button type="button" name="previous" class="previous action-button-previous btnn btn--raised" value="Previous">Back</button>
					<button type="button" name="next" class="next action-button btnn btn--raised waves-effect waves-light">Continue</button>
				</fieldset>

				<fieldset>
					<label class="space-bottom space-top">Click on the thumbnails below to add pictures of your dish *</label>
					<div>
						<label for="" class="space-top space-bottom is-title-lg">Featured Image</label>
						<!--FEATURED IMAGE-->
						<div class="uk-form-row">
							<a href="javascript:void(0)" id="sau_merchant_upload_file" class="button uk-button" data-progress="sau_merchant_progress" data-preview="image_preview" data-field="photo">
								<img style="height: 120px; width: 150px" src="<?php echo assetsURL() . '/images/dishimgnew.png' ?>" alt="">
							</a>
						</div>
						<div class="sau_merchant_progress"></div>
						<div class="image_preview">
							<?php
							$image = isset($data['photo']) ? $data['photo'] : '';
							$image_url = FunctionsV3::getImage($image);
							if (!empty($image_url)) {
								echo '<img src="' . $image_url . '" class="uk-thumbnail" id="logo-small" />';
								echo CHtml::hiddenField('photo', $image);
								echo '<br/>';
								echo '<a href="javascript:;" class="sau_remove_file" data-preview="image_preview" >' . t("Remove image") . '</a>';
							}
							?>
						</div>

						<!--END FEATURED IMAGE-->


						<!--GALLERY -->
						<label for="" class="space-bottom is-title-lg space-top">Supporting Images for Dish</label>
						<div class="uk-form-row">
							<a href="javascript:;" id="multiple_upload" class="button uk-button" data-progress="multiple_upload_progress" data-preview="image_multiple_preview" data-field="gallery_photo">
								<img onclick="DishTip.activate('tip5-2')" style="height: 120px; width: 150px" src="<?php echo assetsURL() . '/images/dishimgnew.png' ?>" alt="">
							</a>
						</div>
						<div class="multiple_upload_progress"></div>

						<div class="image_multiple_preview">
							<?php
							$gallery_photo = isset($data['gallery_photo']) ? $data['gallery_photo'] : '';
							if (!empty($gallery_photo)) {
								$gallery_photo = json_decode($gallery_photo, true);
								if (is_array($gallery_photo) && count($gallery_photo) >= 1) {
									foreach ($gallery_photo as $gallery_photo_val) {
										$image_url = FunctionsV3::getImage($gallery_photo_val);
										if (!empty($image_url)) {
											echo "<div class=\"col\">";
											echo '<img src="' . $image_url . '" class="uk-thumbnail"  />';
											echo CHtml::hiddenField('gallery_photo[]', $gallery_photo_val);
											echo '<a href="javascript:;" class="multiple_remove_image" data-preview="image_multiple_preview" >' . t("Remove image") . '</a>';
											echo "</div>";
										}
									}
								}
							}
							?>
						</div>
						<div class="clear"></div>
					</div>

					<br />
					<hr />
					<button type="button" name="previous" class="previous action-button-previous btnn btn--raised waves-effect" value="Previous">Back</button>
					<button type="submit" name="save" class="previous action-button-previous btnn btn--raised waves-effect">Save</button>
				</fieldset>
				<input type="hidden" name="status" value="publish" />
			</form>
		</div>
		<div class="col-md-3">
			<div id="dish-tip-container">

				<div id="tip-1">
					<div class="dish-tip z-elevation-2" id="tip1">
						<i class="fa fa-lightbulb-o"></i>
						<strong class="ml-3">Tip</strong>
						<p class="space-top" id="tip1-text">
							Nothing to Show..
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script>
	$(document).ready(function() {

		//jQuery time
		var current_fs, next_fs, previous_fs; //fieldsets
		var left, opacity, scale; //fieldset properties which we will animate
		var animating; //flag to prevent quick multi-click glitches

		$(".next").click(function() {
			if (animating) return false;
			animating = true;

			current_fs = $(this).parent();
			next_fs = $(this).parent().next();

			//activate next step on progressbar using the index of next_fs
			$("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

			//show the next fieldset
			next_fs.show();
			//hide the current fieldset with style
			current_fs.animate({
				opacity: 0
			}, {
				step: function(now, mx) {
					//as the opacity of current_fs reduces to 0 - stored in "now"
					//1. scale current_fs down to 80%
					scale = 1 - (1 - now) * 0.2;
					//2. bring next_fs from the right(50%)
					left = (now * 50) + "%";
					//3. increase opacity of next_fs to 1 as it moves in
					opacity = 1 - now;
					current_fs.css({
						'transform': 'scale(' + scale + ')'
					});
					next_fs.css({
						'left': left,
						'opacity': opacity
					});
				},
				duration: 100,
				complete: function() {
					current_fs.hide();
					animating = false;
				},
				//this comes from the custom easing plugin
				easing: 'easeInOutBack'
			});
		});

		$(".previous").click(function() {
			if (animating) return false;
			animating = true;

			current_fs = $(this).parent();
			previous_fs = $(this).parent().prev();

			//de-activate current step on progressbar
			$("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

			//show the previous fieldset
			previous_fs.show();
			//hide the current fieldset with style
			current_fs.animate({
				opacity: 0
			}, {
				step: function(now, mx) {
					//as the opacity of current_fs reduces to 0 - stored in "now"
					//1. scale previous_fs from 80% to 100%
					scale = 0.8 + (1 - now) * 0.2;
					//2. take current_fs to the right(50%) - from 0%
					left = ((1 - now) * 50) + "%";
					//3. increase opacity of previous_fs to 1 as it moves in
					opacity = 1 - now;
					current_fs.css({
						'left': left
					});
					previous_fs.css({
						'transform': 'scale(' + scale + ')',
						'opacity': opacity
					});
				},
				duration: 150,
				complete: function() {
					current_fs.hide();
					animating = false;
				},
				//this comes from the custom easing plugin
				easing: 'easeInOutBack'
			});
		});

	});

	document.getElementById('chef-profile').style.maxWidth = '1100px';
	var DishTip = (function() {
		var theSection = '#dish-tip-container',
			tips = {
				'tip1-1': 'For best results, use names that are unique yet illustrate the core ingredients of the dish. Example: “Green Masala Chicken Biryani” instead of “Masala Biryani”',
				'tip1-2': 'Use this field to explain what is unique about your dish, how it is prepared and why someone should order this.',
				'tip2-1': 'Foodies use the dish type when they are searching or filtering for a dish',
				'tip2-2': 'You can select multiple features',
				'tip3-1': 'Use conservative estimates to account for different foodie preferences. Multiple serving sizes of the dish have to be entered as separate dishes',
				'tip3-2': 'This field is optional but helps foodies understand what they’re getting. Use the measure most appropriate for your dish (i.e. “Pieces” for cookies, “KGs” for main dishes etc)',
				'tip3-3': 'This is the price foodies see. Any HomeChef fees is deducted from this amount',
				'tip4-1': 'A shorter preparation time generally leads to more orders. However, once you receive an order, being unable to meet the prep time will result in a significant negative rating to your profile.',
				'tip5-1': 'The best pictures are clear, high resolution and show the dish in full.',
				'tip5-2': 'You can also add multiple images to describe the type of your dish'
			};
		return {
			activate: function(tipIndex) {
				document.querySelector('#tip1-text').innerHTML = tips[tipIndex];
				document.querySelector('#tip1-text').parentElement.classList.add('is-active');
			},
			deActivate: function(theTip) {
				document.querySelector('#tip1-text').innerHTML = 'Nothing to Show....';
				document.querySelector('#tip1-text').parentElement.classList.remove('is-active');
			}
		}
	})();

	(function() {
		var dishRadio = document.querySelectorAll('.form-check-input');
		dishRadio.forEach(function(dishType) {
			dishType.onfocus = function() {
				DishTip.activate('tip2-1');
			};
			dishType.onblur = function() {
				DishTip.deActivate();
			};
		});
	})();

	document.querySelector('#forms').addEventListener('submit', function() {
		return false;
		if (/redirect/.test(window.location.href)) {
			var timeout = setTimeout(function() {
				if (/redirect/.test(window.location.href)) {
					window.location.href = "<?php echo websiteUrl() . '/merchantsignup?do=step4' ?>";
					clearTimeout(timeout);
				}
			}, 1500);
		}
	});
</script>