<div id="navbar-offset"></div>
<?php

/*PROGRESS ORDER BAR*/
$this->renderPartial('/front/progress-merchantsignup', array(
  'step' => 1,
  'show_bar' => true
));
?>


<div class="sections section-grey full-height">

  <div class="container has-padding-y">

    <h1><?php echo t('Great Progress!') ?><?php if(Yii::app()->functions->isClientLogin()): ?><?php echo Yii::app()->functions->getClientName(); endif; ?></h1>
    <h1><?php echo t('You are just few steps away from becoming a Chef and serving food across your city!') ?></h1>
    <br />
    <a class="btnn btn--raised waves-effect waves-light" href="<?php echo Yii::app()->createUrl('/store/merchantsignup/', array(
                                        'do' => "step2",
                                        'package_id' => 1
                                      )) ?>">
      <?php echo t("Update Your Profile") ?>
    </a>

  </div>
  <!--container-->

</div>
<!--sections-->