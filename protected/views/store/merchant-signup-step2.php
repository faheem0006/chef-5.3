<div id="navbar-offset"></div>
<?php

/*PROGRESS ORDER BAR*/
$this->renderPartial('/front/progress-merchantsignup', array(
  'step' => 2,
  'show_bar' => true
));

echo CHtml::hiddenField('mobile_country_code', Yii::app()->functions->getAdminCountrySet(true));
?>


<div class="sections section-grey2">

  <div class="container">
    <div class="row">
      <section>
        <div class="wizard z-elevation-2">
          <div class="wizard-inner">
            <div class="connecting-line"></div>
            <ul class="nav nav-tabs" role="tablist">

              <li role="presentation" class="active">
                <span><?php echo t('Chef Details') ?></span>
                <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Step 1">
                  <span class="round-tab waves-effect waves-light">
                    <i class="fa fa-phone"></i>
                  </span>
                </a>
              </li>

              <li role="presentation" class="disabled">
                <span><?php echo t('Business Profile') ?></span>
                <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="Step 2">
                  <span class="round-tab waves-effect waves-light">
                    <i class="fa fa-user"></i>
                  </span>
                </a>
              </li>
              <li role="presentation" class="disabled">
                <span><?php echo t('Your Services') ?></span>
                <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab" title="Step 3">
                  <span class="round-tab waves-effect waves-light">
                    <i class="fa fa-building-o"></i>
                  </span>
                </a>
              </li>

              <li role="presentation" class="disabled">
                <span><?php echo t('Final Steps') ?></span>
                <a href="#complete" data-toggle="tab" aria-controls="complete" role="tab" title="Complete">
                  <span class="round-tab waves-effect waves-light">
                    <i class="fa fa-photo"></i>
                  </span>
                </a>
              </li>
            </ul>
          </div>

          <form class="forms" id="forms" role="form" onsubmit="return false;">
            <?php echo CHtml::hiddenField('action', 'merchantSignUp') ?>
            <?php echo CHtml::hiddenField('currentController', 'store') ?>
            <?php echo CHtml::hiddenField('package_id', 1) ?>
            <?php FunctionsV3::addCsrfToken(); ?>

            <div class="tab-content">

              <div class="tab-pane active" role="tabpanel" id="step1">
                <div class="row top10">
                  <div class="col-md-12">
                    <label class="is-title font-bold"><?php echo t("How would you describe yourself as a chef? *") ?></label>
                    <?php echo CHtml::textField(
                      'merchant_describe',
                      '',
                      array(
                        'class' => 'form-control full-width'
                      )
                    ) ?>
                  </div>
                </div>

                <div class="row top10">
                  <div class="col-md-12">
                    <label class="is-heading"><?php echo t("Tell us more about your cooking style and what inspires you tok cook?") ?></label>
                    <?php echo CHtml::textArea(
                      'merchant_inspire',
                      '',
                      array(
                        'class' => 'form-control full-width',
                        'rows' => 4
                      )
                    ) ?>
                  </div>
                </div>

                <div class="row top10" id="cuisine-dropdown">
                  <div class="col-md-12">
                    <label for="" class="is-heading"><?php echo t('Which Cuisine(s) do you specialize in?') ?></label>
                    <?php
                    $cuisine_list = Yii::app()->functions->Cuisine(true);
                    $cuisine_1 = array();
                    if (Yii::app()->functions->multipleField() == 2) {
                      foreach ($cuisine_list as $cuisine_id => $val) {
                        $cuisine_info = Yii::app()->functions->GetCuisine($cuisine_id);
                        $cuisine_json['cuisine_name_trans'] = !empty($cuisine_info['cuisine_name_trans']) ?
                          json_decode($cuisine_info['cuisine_name_trans'], true) : '';
                        $cuisine_1[$cuisine_id] = qTranslate($val, 'cuisine_name', $cuisine_json);
                      }
                      $cuisine_list = $cuisine_1;
                    }
                    echo CHtml::dropDownList(
                      'cuisine[]',
                      isset($data['cuisine']) ? (array) json_decode($data['cuisine']) : "",
                      (array) $cuisine_list,
                      array(
                        'class' => 'full-width chosen',
                        'multiple' => true
                      )
                    ) ?>
                  </div>
                </div>

                <div class="row top10">
                  <div class="col-md-12">
                    <label><?php echo t("What would you say your specialities are?") ?></label>
                    <?php echo CHtml::textField(
                      'merchant_speciality',
                      '',
                      array(
                        'class' => 'form-control full-width',
                        'placeholder' => 'Speciality'
                      )
                    ) ?>
                  </div>
                </div>

                <br />

                <div class="text-right">
                  <button type="button" class="btnn btn--raised next-step waves-effect waves-light"><?php echo t('Continue') ?></button>
                </div>
              </div> <!-- End Step 1 -->

              <div class="tab-pane" role="tabpanel" id="step2">

                <div class="row top10">
                  <div class="col-md-12">
                    <label><?php echo t("What is your contact number?") ?></label>
                    <?php echo CHtml::textField(
                      'contact_phone',
                      isset($data['contact_phone']) ? $data['contact_phone'] : "",
                      array(
                        'class' => 'form-control full-width mobile_inputs',
                      )
                    ) ?>
                  </div>
                </div>

                <div class="row top10">
                  <div class="col-md-12">
                    <label><?php echo t("What is your business Email?") ?></label>
                    <?php echo CHtml::textField(
                      'contact_email',
                      isset($data['contact_email']) ? $data['contact_email'] : "",
                      array(
                        'class' => 'form-control full-width',
                        'data-validation' => "email"
                      )
                    ) ?>
                  </div>
                </div>

                <div class="row top10">
                  <div class="col-md-12">
                    <label><?php echo t("What is Your Street address?") ?></label>
                    <?php echo CHtml::textField(
                      'street',
                      isset($data['street']) ? $data['street'] : "",
                      array(
                        'class' => 'form-control full-width',
                        'data-validation' => "required"
                      )
                    ) ?>
                  </div>
                </div>

                <div class="row top10">
                  <div class="col-md-12">
                    <label><?php echo t("Which City you belong to?") ?></label>
                    <?php echo CHtml::textField(
                      'city',
                      isset($data['city']) ? $data['city'] : "",
                      array(
                        'class' => 'form-control full-width',
                        'data-validation' => "required"
                      )
                    ) ?>
                  </div>
                </div>

                <div class="row top10">
                  <div class="col-md-12">
                    <label><?php echo t("Please select your Country") ?></label>
                    <?php echo CHtml::dropDownList(
                      'country_code',
                      getOptionA('merchant_default_country'),
                      (array) Yii::app()->functions->CountryListMerchant(),
                      array(
                        'class' => 'form-control full-width',
                        'data-validation' => "required"
                      )
                    ) ?>
                  </div>
                </div>

                <br />

                <div class="text-right">
                  <button type="button" class="btnn waves-effect waves-light btn--raised prev-step space-right--sm"><?php echo t('Back') ?></button>
                  <button type="button" class="btnn waves-effect waves-light btn--raised next-step"><?php echo t('Continue') ?></button>
                </div>
              </div>

              <div class="tab-pane" role="tabpanel" id="step3">
                <div class="row top10">
                  <div class="col-md-12">
                    <label><?php echo t("Any Additional HomeChef services you might be intrested in?") ?></label>
                    <label>
                      <input type="checkbox" name="services" value="1" checked disabled />
                      <span>
                        <?php echo t("A La Carte") ?>
                      </span>
                      <span class="is-title"><?php echo t("Dishes - Dishes where you specify the preperation time needed for each dish") ?></span>
                    </label>
                    <br />
                    <label>
                      <input type="checkbox" name="services" id="daily_special_service" value="1" />
                      <span><?php echo t("Daily Specials") ?></span>
                      <span class="is-title"><?php echo t("Dishes where you specify the preperation time needed for each dish") ?></span>
                    </label>
                    <br />
                    <label>
                      <input type="checkbox" name="services" value="1" id="meal_plan_service" />
                      <span><?php echo t("Meal Plans") ?></span>
                      <span class="is-title"><?php echo t("Every day, each weak") ?></span>
                    </label>
                    <br />
                    <label>
                      <input type="checkbox" name="services" value="1" id="party_service" />
                      <span><?php echo t("Party Cartering") ?></span>
                      <span class="is-title"><?php echo t("Multiple course order for upto 40 people") ?></span>
                    </label>
                  </div>
                </div>
                <br />
                <div class="text-right">
                  <button type="button" class="btnn waves-effect waves-light btn--raised prev-step space-right--sm"><?php echo t('Back') ?></button>
                  <button type="button" class="btnn waves-effect waves-light btn--raised next-step"><?php echo t('Continue') ?></button>
                </div>
              </div>

              <div class="tab-pane" role="tabpanel" id="complete">

                <div class="uk-form-row">
                  <label for=""><?php echo t("Click on the thumbnail below to add your profile picture") ?></label>
                  <br>
                  <label id="chef_dp" for="logo">
                    <input type="file" name="logo" id="logo" style="display: none" />
                    <img style="height: 120px; width: 150px" src="<?php echo assetsURL() . '/images/dishimgnew.png' ?>" alt="">
                  </label>
                </div>

                <div class="row top10">
                  <div class="col-md-12">
                    <label><?php echo t("Please type a Username") ?></label>
                    <?php echo CHtml::textField(
                      'username',
                      '',
                      array(
                        'class' => 'form-control full-width',
                        'data-validation' => "required"
                      )
                    ) ?>
                  </div>
                </div>

                <div class="row top10">
                  <div class="col-md-12">
                    <label><?php echo t("Type a strong Password") ?></label>
                    <?php echo CHtml::passwordField(
                      'password',
                      '',
                      array(
                        'class' => 'form-control full-width',
                        'data-validation' => "required"
                      )
                    ) ?>
                  </div>
                </div>

                <div class="row top10">
                  <div class="col-md-12">
                    <label><?php echo t("Confirm your Password") ?></label>
                    <?php echo CHtml::passwordField(
                      'cpassword',
                      '',
                      array(
                        'class' => 'form-control full-width',
                        'data-validation' => "required"
                      )
                    ) ?>
                  </div>
                </div>

                <?php if ($kapcha_enabled == 2) : ?>
                  <div class="top10 capcha-wrapper">
                    <div id="kapcha-1"></div>
                  </div>
                <?php endif; ?>

                <?php if ($terms_merchant == "yes") : ?>
                  <?php $terms_link = Yii::app()->functions->prettyLink($terms_merchant_url); ?>
                  <div class="row top10">
                    <div class="col-md-3"></div>
                    <div class="col-md-8">
                      <?php
                        echo CHtml::checkBox('terms_n_condition', false, array(
                          'value' => 2,
                          'class' => "",
                          'data-validation' => "required"
                        ));
                        echo " " . t("I Agree To") . " <a href=\"$terms_link\" target=\"_blank\">" . t("The Terms & Conditions") . "</a>";
                        ?>
                    </div>
                  </div>
                <?php endif; ?>

                <br />
                <div class="text-right">
                  <button type="button" class="btnn waves-effect waves-light btn--raised prev-step space-right--sm"><?php echo t('Back') ?></button>
                  <button type="submit" class="btnn waves-effect waves-light btn--raised"><?php echo t('Submit') ?></button>
                </div>

              </div>
            </div>

            <input type="hidden" name="restaurant_name" value="name" />
            <input type="hidden" name="restaurant_phone" value="phone" />
            <input type="hidden" name="post_code" value="12345" />
            <input type="hidden" name="state" value="state" />
            <input type="hidden" name="restaurant_name" value="res name" />
            <input type="hidden" name="contact_name" value="contact_name" />
            <input type="hidden" name="service" id="service" value="2" />


            <?php if (getOptionA('merchant_reg_abn') == "yes") : ?>
              <input type="hidden" name="abn" value="abn" />
            <?php endif; ?>

          </form>
        </div>
      </section>
    </div>
  </div>

</div>
<!--sections-->