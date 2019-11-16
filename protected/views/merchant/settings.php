<?php
$merchant_id = Yii::app()->functions->getMerchantID();
$merchant_currency = Yii::app()->functions->getOption("merchant_currency", $merchant_id);
$merchant_decimal = Yii::app()->functions->getOption("merchant_decimal", $merchant_id);
$merchant_use_separators = Yii::app()->functions->getOption("merchant_use_separators", $merchant_id);
$merchant_minimum_order = Yii::app()->functions->getOption("merchant_minimum_order", $merchant_id);
$merchant_tax = Yii::app()->functions->getOption("merchant_tax", $merchant_id);
$merchant_delivery_charges = Yii::app()->functions->getOption("merchant_delivery_charges", $merchant_id);
$stores_open_day = Yii::app()->functions->getOption("stores_open_day", $merchant_id);
$stores_open_starts = Yii::app()->functions->getOption("stores_open_starts", $merchant_id);
$stores_open_ends = Yii::app()->functions->getOption("stores_open_ends", $merchant_id);
$stores_open_custom_text = Yii::app()->functions->getOption("stores_open_custom_text", $merchant_id);

$stores_open_day = !empty($stores_open_day) ? (array) json_decode($stores_open_day) : false;
$stores_open_starts = !empty($stores_open_starts) ? (array) json_decode($stores_open_starts) : false;
$stores_open_ends = !empty($stores_open_ends) ? (array) json_decode($stores_open_ends) : false;
$stores_open_custom_text = !empty($stores_open_custom_text) ? (array) json_decode($stores_open_custom_text) : false;

$merchant_photo = Yii::app()->functions->getOption("merchant_photo", $merchant_id);
$merchant_delivery_estimation = Yii::app()->functions->getOption("merchant_delivery_estimation", $merchant_id);
$merchant_delivery_charges_type = Yii::app()->functions->getOption("merchant_delivery_charges_type", $merchant_id);

$merchant_photo_bg = Yii::app()->functions->getOption("merchant_photo_bg", $merchant_id);

$merchant_extenal = Yii::app()->functions->getOption("merchant_extenal", $merchant_id);
$merchant_maximum_order = Yii::app()->functions->getOption("merchant_maximum_order", $merchant_id);

$merchant_switch_master_cod = Yii::app()->functions->getOption("merchant_switch_master_cod", $merchant_id);
$merchant_switch_master_ccr = Yii::app()->functions->getOption("merchant_switch_master_ccr", $merchant_id);

$merchant_minimum_order_pickup = Yii::app()->functions->getOption("merchant_minimum_order_pickup", $merchant_id);
$merchant_maximum_order_pickup = Yii::app()->functions->getOption("merchant_maximum_order_pickup", $merchant_id);

$stores_open_pm_start = Yii::app()->functions->getOption("stores_open_pm_start", $merchant_id);
$stores_open_pm_start = !empty($stores_open_pm_start) ? (array) json_decode($stores_open_pm_start) : false;

$stores_open_pm_ends = Yii::app()->functions->getOption("stores_open_pm_ends", $merchant_id);
$stores_open_pm_ends = !empty($stores_open_pm_ends) ? (array) json_decode($stores_open_pm_ends) : false;

$FunctionsK = new FunctionsK();
$tips_list = $FunctionsK->tipsList(true);

$merchant_info = (array) Yii::app()->functions->getMerchantInfo();
?>

<div id="error-message-wrapper"></div>

<div class="z-elevation-2" style="max-width: 800px; padding: 1.5rem; border-radius: 6px; margin: auto">

  <div class="flex flex--align-center flex--justify-between">
    <h1 class="is-title-lg"><?php echo t("Your Chef's Profile Settings") ?></h1>
    <a href="<?php echo websiteUrl() . '/merchant/merchant' ?>" class="btnn btn--raised"><?php echo t('change info instead') ?></a>
  </div>
  <hr />

  <ul data-uk-tab="{connect:'#tab-content'}" class="uk-tab uk-active">
    <li class="uk-active"><a href="#"><?php echo Yii::t("default", "About Me") ?></a></li>
    <li><a href="#"><?php echo Yii::t("default", "Orders") ?></a></li>
    <li class=""><a href="#"><?php echo Yii::t("default", "Delivery") ?></a></li>
    <li class=""><a href="#"><?php echo Yii::t("default", "Holidays") ?></a></li>
  </ul>

  <form class="uk-form uk-form-horizontal forms" id="forms">
    <?php echo CHtml::hiddenField('action', 'merchantSettings') ?>
    <?php FunctionsV3::addCsrfToken(false); ?>

    <ul class="uk-switcher uk-margin " id="tab-content">
      <li class="uk-active">
        <fieldset>

          <h1 class="is-title-lg"><?php echo t("Business Logo") ?></h1>

          <!--Merchant Logo-->
          <div class="sau_merchant_progress"></div>

          <div class="image_preview">
            <?php
            $image = $merchant_photo;
            $image_url = FunctionsV3::getImage($image);
            if (!empty($image_url)) {
              echo '<img src="' . $image_url . '" class="uk-thumbnail" id="logo-small"  />';
              echo CHtml::hiddenField('photo', $image);
              echo '<br/><br/>';
              echo '<a href="javascript:;" class="sau_remove_file btnn btn--sm btn--floating" data-preview="image_preview" ><i class="fa fa-trash"></i></a>';
            }
            ?>
            <a href="javascript:;" id="sau_merchant_upload_file" class="btnn btn--sm btn--floating" data-progress="sau_merchant_progress" data-preview="image_preview" data-field="photo">
              <i style="font-size: 1.25rem" class="fa fa-pencil"></i>
            </a>
          </div>

          <div class="spacer"></div>

          <!--END Merchant Logo-->

          <!--HEADER BG-->

          <h1 class="is-title-lg"><?php echo t("Business Cover Photo") ?></h1>

          <div class="single_uploadfile_progress"></div>

          <div class="single_uploadfile_preview">
            <?php
            $image = $merchant_photo_bg;
            $image_url = FunctionsV3::getImage($image);
            if (!empty($image_url)) {
              echo '<img src="' . $image_url . '" class="uk-thumbnail" id="logo-small"  />';
              echo CHtml::hiddenField('photo2', $image);
              echo '<br/><br/>';
              echo '<a href="javascript:;" style="font-size: 1.25rem" class="single_uploadfile_remove btnn btn--sm btn--floating" data-preview="image_preview" ><i class="fa fa-trash"></i></a>';
            }
            ?>
            <a href="javascript:;" id="single_uploadfile" class="btnn btn--sm btn--floating" data-progress="single_uploadfile_progress" data-preview="single_uploadfile_preview" data-field="photo2">
              <i class="fa fa-pencil" style="font-size: 1.25rem"></i>
            </a>
          </div>

          <div class="spacer"></div>

          <!--END HEADER BG-->

        </fieldset>
      </li>

      <li>
        <fieldset>

          <h3 class="is-title-lg"><?php echo Yii::t("default", "Minimum Order") ?> <?php echo t("Delivery") ?></h3>

          <div class="uk-form-row">
            <label class="uk-form-label"><?php echo Yii::t("default", "Minimum purchase amount.") ?></label>
            <?php
            echo CHtml::textField('merchant_minimum_order', $merchant_minimum_order, array(
              'class' => "numeric_only"
            ))
            ?>
            <?php echo Yii::app()->functions->getCurrencyCode(Yii::app()->functions->getMerchantID()); ?>
          </div>

          <h3 class="is-title-lg"><?php echo Yii::t("default", "Maximum Order") ?> <?php echo t("Delivery") ?></h3>

          <div class="uk-form-row">
            <label class="uk-form-label"><?php echo Yii::t("default", "Maximum purchase amount") ?></label>
            <?php
            echo CHtml::textField(
              'merchant_maximum_order',
              $merchant_maximum_order,
              array(
                'class' => "numeric_only"
              )
            )
            ?>
            <?php echo Yii::app()->functions->getCurrencyCode(Yii::app()->functions->getMerchantID()); ?>
          </div>


        </fieldset>
      </li>

      <li>
        <fieldset>

          <h2 class="is-title-lg"><?php echo Yii::t("default", "Free Delivery Options") ?></h2>

          <div class="uk-form-row">
            <label class="uk-form-label"><?php echo Yii::t("default", "Free delivery above Sub Total Order") ?></label>
            <?php
            echo CHtml::textField(
              'free_delivery_above_price',
              getOption($merchant_id, 'free_delivery_above_price'),
              array('class' => "numeric_only")
            );
            ?>
            <span style="padding-left:8px;"><?php echo adminCurrencySymbol(); ?></span>
          </div>

          <br />

          <h3 class="is-title-lg"><?php echo Yii::t("default", "External Website") ?></h3>

          <div class="uk-form-row">
            <label class="uk-form-label"><?php echo Yii::t("default", "Website address") ?></label>
            <?php
            echo CHtml::textField('merchant_extenal', $merchant_extenal, array(
              'class' => "uk-width-1-2"
            ))
            ?>
          </div>

          <div class="uk-form-row">
            <label class="uk-form-label"><?php echo Yii::t("default", "Make Delivery Time Required") ?>?</label>
            <?php
            echo CHtml::checkBox(
              'merchant_required_delivery_time',
              Yii::app()->functions->getOption("merchant_required_delivery_time", $merchant_id) == "yes" ? true : false,
              array(
                'value' => "yes",
                'class' => "icheck"
              )
            )
            ?>
          </div>


        </fieldset>
      </li>



      <li>
        <fieldset>


          <div class="is-title-lg"><?php echo Yii::t("default", "Timezone") ?></div>
          <div class="is-title"><?php echo t("You can change your timezone here") ?></div>
          <br />
          <div class="uk-form-row">
            <?php
            echo CHtml::dropDownList(
              'merchant_timezone',
              Yii::app()->functions->getOption("merchant_timezone", $merchant_id),
              Yii::app()->functions->timezoneList()
            )
            ?>
          </div>

          <br />

          <?php $days = Yii::app()->functions->getDays(); ?>
          <div class="is-title-lg"><?php echo Yii::t("default", "Kitchen Hours of Operation ") ?></div>
          <div class="is-title"><?php echo t("Set the days and hours your kitchen is open and meals can be picked up from you") ?></div>
          <div class="is-title"><?php echo Yii::t("default", "If days has not been selected then chef will be set to open") ?></div>

          <br />

          <div class="uk-form-row z-elevation-2 is-rounded has-padding">

            <ul class="uk-list">
              <?php foreach ($days as $key => $val) : ?>
                <li>
                  <div class="uk-grid">

                    <div class="uk-width-1-6" style="width:5%;">
                      <?php echo CHtml::checkBox(
                          'stores_open_day[]',
                          in_array($key, (array) $stores_open_day) ? true : false,
                          array('value' => $key, 'class' => "icheck")
                        ) ?>
                    </div>

                    <div class="uk-width-1-6" style="width:12%"><?php echo ucwords(Yii::app()->functions->translateDate($val)); ?></div>
                    <div class="uk-width-1-6" style="width:12%">
                      <?php echo CHtml::textField(
                          "stores_open_starts[$key]",
                          array_key_exists($key, (array) $stores_open_starts) ? timeFormat($stores_open_starts[$key], true) : "",
                          array('placeholder' => Yii::t("default", "Start"), 'class' => "timepick")
                        ); ?>
                    </div>

                    <div class="uk-width-1-6" style="width:5%;"><?php echo Yii::t("default", "To") ?></div>
                    <div class="uk-width-1-6" style="width:12%">
                      <?php echo CHtml::textField(
                          "stores_open_ends[$key]",
                          array_key_exists($key, (array) $stores_open_ends) ? timeFormat($stores_open_ends[$key], true) : "",
                          array('placeholder' => Yii::t("default", "End"), 'class' => "timepick")
                        ); ?>
                    </div>

                    <div class="uk-width-1-6" style="width:5%;">
                      /
                    </div>

                    <div class="uk-width-1-6" style="width:12%">
                      <?php echo CHtml::textField(
                          "stores_open_pm_start[$key]",
                          array_key_exists($key, (array) $stores_open_pm_start) ? timeFormat($stores_open_pm_start[$key], true) : "",
                          array('placeholder' => Yii::t("default", "Start"), 'class' => "timepick")
                        ); ?>
                    </div>
                    <div class="uk-width-1-6" style="width:5%;"><?php echo Yii::t("default", "To") ?></div>
                    <div class="uk-width-1-6" style="width:12%">
                      <?php echo CHtml::textField(
                          "stores_open_pm_ends[$key]",
                          array_key_exists($key, (array) $stores_open_pm_ends) ? timeFormat($stores_open_pm_ends[$key], true) : "",
                          array('placeholder' => Yii::t("default", "End"), 'class' => "timepick")
                        ); ?>
                    </div>

                    <div class="uk-width-1-6" style="width:12%">
                      <?php echo CHtml::textField(
                          "stores_open_custom_text[$key]",
                          array_key_exists($key, (array) $stores_open_custom_text) ? $stores_open_custom_text[$key] : "",
                          array('placeholder' => Yii::t("default", "Custom text"))
                        ); ?>
                    </div>
                  </div>
                </li>
              <?php endforeach; ?>
            </ul>
          </div>

          <div class="uk-form-row">
            <label class="uk-form-label is-title"><?php echo Yii::t("default", "Do you Accept Pre-orders?") ?></label>
            <?php
            echo CHtml::checkBox(
              'merchant_preorder',
              Yii::app()->functions->getOption("merchant_preorder", $merchant_id) == 1 ? true : false,
              array(
                'class' => "icheck",
                'value' => 1
              )
            );
            ?>
          </div>

          <br />

          <div class="is-title-lg"><?php echo t("Take a Break!") ?></div>
          <div class="is-title"><?php echo t("If you need a break or are planning on going on vacation, specify your days off here so you dont get orders during those days.") ?></div>

          <div class="uk-form-row">
            <label class="uk-form-label"><?php echo Yii::t("default", "Add Days Off") ?>:</label>

            <div class="holiday_list">


              <?php if ($m_holiday = Yii::app()->functions->getMerchantHoliday($merchant_id)) : ?>
                <?php foreach ($m_holiday as $m_h) : ?>
                  <div class="holiday_row">
                    <?php echo CHtml::textField('merchant_holiday[]', $m_h, array(
                          'class' => "j_date_normal small_date"
                        )); ?>
                    <a href="javascript:;" class="remove_holiday"><i class="fa fa-minus-square"></i></a>
                  </div>
                <?php endforeach; ?>

              <?php else : ?>

                <div class="holiday_row">
                  <?php echo CHtml::textField('merchant_holiday[]', '', array(
                      'class' => "j_date_normal small_date"
                    )); ?>
                </div>

              <?php endif; ?>

            </div>
            <!--holiday_list-->

            <a href="javascript:;" class="add_new_holiday"><i class="fa fa-plus-square"></i></a>

          </div>

        </fieldset>
      </li>

    </ul>

    <div class="uk-form-row">
      <input type="submit" value="<?php echo Yii::t("default", "update information") ?>" class="btnn btn--raised" />
    </div>

  </form>

</div>