<?php if (getOptionA('disabled_website_ordering') != "yes") : ?>
    <?php
        if (isset($the_merchant_id)) {
            $merchant_id = 1;
        } else {
            return "Order can only be placed per Chef!";
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

        /*dump($distance);
dump($distance_type_raw);
dump($data['minimum_order']);*/

        $min_fees = FunctionsV3::getMinOrderByTableRates(
            $merchant_id,
            $distance,
            $distance_type_raw,
            $data['minimum_order']
        );

        //dump($min_fees);

        $ratings = Yii::app()->functions->getRatings($merchant_id);
        $merchant_info = array(
            'merchant_id' => $merchant_id,
            //'minimum_order'=>$data['minimum_order'],
            'minimum_order' => $min_fees,
            'ratings' => $ratings,
            'merchant_address' => $data['merchant_address'],
            'cuisine' => $data['cuisine'],
            'restaurant_name' => $data['restaurant_name'],
            'background' => $merchant_photo_bg,
            'merchant_website' => $merchant_website,
            'merchant_logo' => FunctionsV3::getMerchantLogo($merchant_id),
            'contact_phone' => $data['contact_phone'],
            'restaurant_phone' => $data['restaurant_phone'],
            'social_facebook_page' => $social_facebook_page,
            'social_twitter_page' => $social_twitter_page,
            'social_google_page' => $social_google_page,
        );
        $this->renderPartial('/front/menu-header', $merchant_info);

        /*ADD MERCHANT INFO AS JSON */
        $cs = Yii::app()->getClientScript();
        $cs->registerScript(
            'merchant_information',
            "var merchant_information =" . json_encode($merchant_info) . "",
            CClientScript::POS_HEAD
        );

        /*PROGRESS ORDER BAR*/
        $this->renderPartial('/front/order-progress-bar', array(
            'step' => 3,
            'show_bar' => true
        ));

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

        $merchant_maximum_order_pickup = Yii::app()->functions->getOption('merchant_maximum_order_pickup', $merchant_id);
        if (!empty($merchant_maximum_order_pickup)) {
            echo CHtml::hiddenField('merchant_maximum_order_pickup', $merchant_maximum_order_pickup);

            echo CHtml::hiddenField(
                'merchant_maximum_order_pickup_pretty',
                displayPrice(baseCurrency(), prettyFormat($merchant_maximum_order_pickup))
            );
        }

        /*add minimum and max for delivery*/
        //$minimum_order=Yii::app()->functions->getOption('merchant_minimum_order',$merchant_id);
        $minimum_order = $min_fees;
        if (!empty($minimum_order)) {
            echo CHtml::hiddenField('minimum_order', unPrettyPrice($minimum_order));
            echo CHtml::hiddenField(
                'minimum_order_pretty',
                displayPrice(baseCurrency(), prettyFormat($minimum_order))
            );
        }
        $merchant_maximum_order = Yii::app()->functions->getOption("merchant_maximum_order", $merchant_id);
        if (is_numeric($merchant_maximum_order)) {
            echo CHtml::hiddenField('merchant_maximum_order', unPrettyPrice($merchant_maximum_order));
            echo CHtml::hiddenField('merchant_maximum_order_pretty', baseCurrency() . prettyFormat($merchant_maximum_order));
        }

        $is_ok_delivered = 1;
        if (is_numeric($merchant_delivery_distance)) {
            if ($distance > $merchant_delivery_distance) {
                $is_ok_delivered = 2;
                /*check if distance type is feet and meters*/
                //if($distance_type=="ft" || $distance_type=="mm" || $distance_type=="mt"){
                if ($distance_type == "ft" || $distance_type == "mm" || $distance_type == "mt" || $distance_type == "meter") {
                    $is_ok_delivered = 1;
                }
            }
        }

        echo CHtml::hiddenField('is_ok_delivered', $is_ok_delivered);
        echo CHtml::hiddenField('merchant_delivery_miles', $merchant_delivery_distance);
        echo CHtml::hiddenField('unit_distance', $distance_type);
        echo CHtml::hiddenField('from_address', FunctionsV3::getSessionAddress());

        echo CHtml::hiddenField('merchant_close_store', getOption($merchant_id, 'merchant_close_store'));
        /*$close_msg=getOption($merchant_id,'merchant_close_msg');
if(empty($close_msg)){
	$close_msg=t("This restaurant is closed now. Please check the opening times.");
}*/
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

        if ($search_by_location) {
            echo CHtml::hiddenField('search_by_location', $search_by_location);
        }

        echo CHtml::hiddenField('minimum_order_dinein', FunctionsV3::prettyPrice($minimum_order_dinein));
        echo CHtml::hiddenField('maximum_order_dinein', FunctionsV3::prettyPrice($maximum_order_dinein));

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
        if ($food_viewing_private == 2) {
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
    <div id="menu-right-content" class="border z-elevation-5 menu-right-content <?php echo $disabled_addcart == "yes" ? "hide" : '' ?>">

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
                        <p class="bold"><?php echo t("Delivery Options") ?></p>
                    <?php else : ?>
                        <p class="bold"><?php echo t("Options") ?></p>
                    <?php endif; ?>

                    <?php echo CHtml::dropDownList(
                            'delivery_type',
                            $now,
                            (array) Yii::app()->functions->DeliveryOptions($merchant_id),
                            array(
                                'class' => 'grey-fields'
                            )
                        ) ?>

                    <?php
                        if ($website_use_date_picker == 2) {
                            echo CHtml::dropDownList(
                                'delivery_date',
                                '',
                                (array) FunctionsV3::getDateList($merchant_id),
                                array(
                                    'class' => 'grey-fields date_list'
                                )
                            );
                        } else {
                            echo CHtml::hiddenField('delivery_date', $now);
                            echo CHtml::textField(
                                'delivery_date1',
                                FormatDateTime($now, false),
                                array('class' => "j_date grey-fields", 'data-id' => 'delivery_date')
                            );
                        }
                        ?>

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
<?php endif; ?>