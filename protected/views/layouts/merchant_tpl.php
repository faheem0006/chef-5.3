<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <title><?php echo CHtml::encode($this->pageTitle); ?></title>

  <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/css/admin.css" rel="stylesheet" />

  <link href="//ajax.googleapis.com/ajax/libs/jqueryui/1.8.1/themes/base/jquery-ui.css" rel="stylesheet" />

  <link rel="shortcut icon" href="<?php echo  Yii::app()->request->baseUrl; ?>/favicon.ico" />

  <!--START Google FOnts-->
  <link href='//fonts.googleapis.com/css?family=Open+Sans|Podkova|Rosario|Abel|PT+Sans|Source+Sans+Pro:400,600,300|Roboto' rel='stylesheet' type='text/css'>
  <!--END Google FOnts-->

  <!--FONT AWESOME-->
  <!--<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">-->
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
  <!--END FONT AWESOME-->

  <!--UIKIT-->
  <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/vendor/uikit/css/uikit.almost-flat.min.css" rel="stylesheet" />
  <!--<link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/vendor/uikit/css/uikit.gradient.min.css" rel="stylesheet" />-->
  <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/vendor/uikit/css/addons/uikit.addons.min.css" rel="stylesheet" />
  <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/vendor/uikit/css/addons/uikit.gradient.addons.min.css" rel="stylesheet" />
  <!--UIKIT-->

  <!--COLOR PICK-->
  <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/vendor/colorpick/css/colpick.css" rel="stylesheet" />
  <!--COLOR PICK-->

  <!--ICHECK-->
  <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/vendor/iCheck/skins/all.css" rel="stylesheet" />
  <!--ICHECK-->

  <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/vendor/chosen/chosen.css" rel="stylesheet" />
  <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/vendor/fancybox/source/jquery.fancybox.css" rel="stylesheet" />

  <!--STARTS JQPLOT-->
  <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/vendor/jqplot/jquery.jqplot.min.css" rel="stylesheet">
  <!--END JQPLOT-->

  <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/vendor/jQuery-TE_v.1.4.0/jquery-te-1.4.0.css" rel="stylesheet">

  <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/vendor/intel/build/css/intlTelInput.css" rel="stylesheet">

  <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/vendor/rupee/rupyaINR.css" rel="stylesheet" />

  <?php if ($this->map_provider == "mapbox" && $this->global_action_name == "merchant") : ?>
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/vendor/leaflet/leaflet.css" rel="stylesheet" />
  <?php endif; ?>

</head>

<body id="merchant">

  <div class="header_wrap z-elevation-5">

    <?php $merchant_info = (array) Yii::app()->functions->getMerchantInfo(); ?>
    <?php $merchant_user_type = $_SESSION['kr_merchant_user_type']; ?>

    <a href="<?php echo websiteUrl() ?>" class="left">
      <img src="<?php echo assetsUrl() . '/images/logo-desktop.png' ?>" style="height: 44px; margin-top: 6px" alt="" />
    </a>

    <div class="right">
      <div data-uk-dropdown="{mode:'click'}" class="uk-button-dropdown">
        <a class="btnn btn--sm btn--raised" href="<?php echo websiteURL() . '/store/becomechef' ?>">Become a Chef</a>
        <button class="btnn btn--sm btn--raised"><i class="fa fa-user" style="margin-right: .25rem">
          </i>
          <?php echo Yii::app()->functions->getMerchantUserName() ?> <i style="margin-left: .25rem" class="uk-icon-caret-down">
          </i>
        </button>
        <div class="uk-dropdown">
          <ul class="uk-nav uk-nav-dropdown">
            <?php //if (isset($merchant_info[0]->user_access)):
            ?>
            <?php if ($merchant_user_type == "merchant_user") : ?>
              <li><a href="<?php echo websiteUrl() . "/merchant/profile" ?>"><i class="fa fa-user"></i> <?php echo t("Profile") ?></a></li>
            <?php else : ?>
              <li><a href="<?php echo websiteUrl() . "/merchant/Merchant" ?>"><i class="fa fa-user"></i> <?php echo t("Profile") ?></a></li>
            <?php endif; ?>
            <li>
              <a href="<?php echo Yii::app()->request->baseUrl . "/merchant/login/logout/true" ?>">
                <i class="fa fa-sign-out"></i> <?php echo Yii::t("default", "Logout") ?>
              </a>
            </li>
          </ul>
        </div>
      </div>

    </div>
    <!--END RIGHT-->

    <div class="clear"></div>
  </div>
  <!--END header_wrap-->

  <div class="main_wrapper">
    <div class="main_content">
      <div id="chef-profile">
        <div class="breadcrumbs">
          <div class="inner">
            <a title="Dashboard" class="fa fa-home" href="<?php echo websiteUrl() . '/merchant/dash-board' ?>">
              <?php echo t("Chef Dashboard") ?>
            </a>
          </div>
        </div>
        <br />
        <?php echo $content; ?>
      </div>
    </div>
    <div class="clear"></div>
  </div>
  <!--END main_wrapper-->

  <?php echo CHtml::hiddenField("currentController", "merchant") ?>

  <?php
  $website_date_picker_format = yii::app()->functions->getOptionAdmin('website_date_picker_format');
  if (!empty($website_date_picker_format)) {
    echo CHtml::hiddenField('website_date_picker_format', $website_date_picker_format);
  }
  $website_time_picker_format = yii::app()->functions->getOptionAdmin('website_time_picker_format');
  if (!empty($website_time_picker_format)) {
    echo CHtml::hiddenField('website_time_picker_format', $website_time_picker_format);
  }
  ?>
</body>

<!--*****************************************
NOTIFICATION PLAYER STARTS HERE
*****************************************-->
<?php
$merchant_id = Yii::app()->functions->getMerchantID();
$enabled_alert_sound = Yii::app()->functions->getOption("enabled_alert_sound", $merchant_id);
$merchant_booking_alert = Yii::app()->functions->getOption("merchant_booking_alert", $merchant_id);
?>
<input type="hidden" id="alert_off" name="alert_off" value="<?php echo $enabled_alert_sound ?>">
<?php echo CHtml::hiddenField("booking_alert", $merchant_booking_alert); ?>
<?php //if ( $enabled_alert_sound==""):
?>
<div style="display:none;">
  <div id="jquery_jplayer_1"></div>
  <div id="jp_container_1">
    <a href="#" class="jp-play">Play</a>
    <a href="#" class="jp-pause">Pause</a>
  </div>
</div>
<?php //endif;
?>
<!--*****************************************
NOTIFICATION PLAYER END HERE
*****************************************-->

<!--PRELOADER-->
<div class="main-preloader">
  <div class="inner">
    <div class="ploader"></div>
  </div>
</div>
<!--PRELOADER-->

<footer>
  <h5 class="text-center"><?php echo t("All Rights Reserved &copy; 2019") ?></h5>
</footer>

<button type="button" class="btnn btn--floating waves-effect waves-light" id="btn-scroll-top">
  <i class="fa fa-long-arrow-up"></i>
</button>


<script src="//code.jquery.com/jquery-1.10.2.min.js" type="text/javascript"></script>
<!--<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/vendor/jquery-1.10.2.min.js" type="text/javascript"></script>  -->

<?php $js_lang = Yii::app()->functions->jsLanguageAdmin(); ?>
<?php $js_lang_validator = Yii::app()->functions->jsLanguageValidator(); ?>
<script type="text/javascript">
  var js_lang = <?php echo json_encode($js_lang) ?>;
  var jsLanguageValidator = <?php echo json_encode($js_lang_validator) ?>;
</script>


<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/vendor/DataTables/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/vendor/DataTables/fnReloadAjax.js" type="text/javascript"></script>


<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/vendor/JQV/form-validator/jquery.form-validator.min.js" type="text/javascript"></script>

<script src="//code.jquery.com/ui/1.10.3/jquery-ui.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/vendor/jquery.ui.timepicker-0.0.8.js" type="text/javascript"></script>

<!--<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/js/uploader.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/vendor/ajaxupload/fileuploader.js" type="text/javascript"></script>-->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/vendor/SimpleAjaxUploader.min.js" type="text/javascript"></script>


<!--UIKIT-->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/vendor/uikit/js/uikit.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/vendor/uikit/js/addons/notify.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/vendor/uikit/js/addons/sticky.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/vendor/uikit/js/addons/sortable.min.js"></script>
<!--UIKIT-->

<!--ICHECK-->
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/vendor/iCheck/icheck.js"></script>
<!--ICHECK-->

<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/vendor/chosen/chosen.jquery.min.js"></script>

<!--Google Maps-->
<?php $apikey = getOptionA('google_geo_api_key'); ?>
<?php if (!empty($apikey)) : ?>
  <script src="//maps.googleapis.com/maps/api/js?v=3.exp&key=<?php echo $apikey ?>"></script>
<?php else : ?>
  <script src="//maps.googleapis.com/maps/api/js?v=3.exp&"></script>
<?php endif; ?>
<!--END Google Maps-->

<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/vendor/fancybox/source/jquery.fancybox.js"></script>
<!--<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/vendor/jQuery.print.js"></script>-->
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/vendor/jquery.printelement.js"></script>

<!--START JQPLOT-->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/vendor/jqplot/jquery.jqplot.min.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/vendor/jqplot/excanvas.min.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/vendor/jqplot/plugins/jqplot.barRenderer.min.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/vendor/jqplot/plugins/jqplot.categoryAxisRenderer.min.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/vendor/jqplot/plugins/jqplot.pointLabels.min.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/vendor/jqplot/plugins/jqplot.json2.min.js" type="text/javascript"></script>

<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/vendor/jqplot/plugins/jqplot.dateAxisRenderer.min.js"></script>

<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/vendor/jqplot/plugins/jqplot.canvasTextRenderer.min.js"></script>

<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/vendor/jqplot/plugins/jqplot.canvasAxisTickRenderer.min.js"></script>
<!--END JQPLOT-->

<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/vendor/jQuery.jPlayer.2.6.0/jquery.jplayer.min.js"></script>

<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/vendor/jQuery-TE_v.1.4.0/jquery-te-1.4.0.min.js"></script>

<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/vendor/intel/build/js/intlTelInput.js?ver=2.1.5"></script>

<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/vendor/jquery.creditCardValidator.js"></script>

<?php if ($this->map_provider == "mapbox" && $this->global_action_name == "merchant") : ?>
  <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/vendor/leaflet/leaflet.js?ver=1" type="text/javascript"></script>
<?php endif; ?>

<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/js/admin.js?ver=1" type="text/javascript"></script>

<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/js/merchant.js?ver=1" type="text/javascript"></script>

</html>