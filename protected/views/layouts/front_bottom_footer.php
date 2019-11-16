<div class="sections section-footer">
  <div class="container">
    <div class="row">
      <div class="col-md-4 ">
        <?php FunctionsV3::getFooterAddress(); ?>

        <?php
        $enabled_lang = FunctionsV3::getEnabledLanguage();
        $lang_list_dropdown = array();
        $lang_list = FunctionsV3::getLanguageList(false);
        if (is_array($lang_list) && count($lang_list) >= 1) {
          foreach ($lang_list as $lang_list_val) {
            if (in_array($lang_list_val, (array) $enabled_lang)) {
              $key = Yii::app()->createUrl('/store/setlanguage', array(
                'lang' => $lang_list_val
              ));
              $lang_list_dropdown[$key] = t($lang_list_val);
            }
          }
        }
        if ($show_language <> 1) {
          if ($theme_lang_pos == "bottom" || $theme_lang_pos == "") {
            echo CHtml::dropDownList(
              'language-options',
              Yii::app()->language,
              (array) $lang_list_dropdown,
              array(
                'class' => "language-options selectpicker",
                'title' => t("Select language")
              )
            );
          }
        }
        ?>

      </div>
      <!--col-->


      <div class="col-md-3 border">
        <?php if ($theme_hide_footer_section1 != 2) : ?>
          <h3><?php echo t("Menu") ?></h3>

          <?php if (is_array($menu) && count($menu) >= 1) : ?>
            <?php foreach ($menu as $val) : ?>
              <li>
                <a href="<?php echo FunctionsV3::customPageUrl($val) ?>" <?php FunctionsV3::openAsNewTab($val) ?>>
                  <?php echo $val['page_name'] ?></a>
              </li>
            <?php endforeach; ?>
          <?php endif; ?>

        <?php endif; ?>
      </div>
      <!--col-->

      <div class="col-md-3 border">
        <?php if ($theme_hide_footer_section2 != 2) : ?>
          <h3><?php echo t("Others") ?></h3>

          <?php if (is_array($others_menu) && count($others_menu) >= 1) : ?>
            <?php foreach ($others_menu as $val) : ?>
              <li>
                <a href="<?php echo FunctionsV3::customPageUrl($val) ?>" <?php FunctionsV3::openAsNewTab($val) ?>>
                  <?php echo $val['page_name'] ?></a>
              </li>
            <?php endforeach; ?>
          <?php endif; ?>

        <?php endif; ?>
      </div>
      <!--col-->

      <?php if ($social_flag <> 1) : ?>
        <div class="col-md-2 border">
          <h3><?php echo t("Connect with us") ?></h3>

          <div class="mytable social-wrap">
            <?php if (!empty($google_page)) : ?>
              <div class="mycol border">
                <a target="_blank" href="<?php echo FunctionsV3::prettyUrl($google_page) ?>"><i class="ion-social-googleplus"></i></a>
              </div>
              <!--col-->
            <?php endif; ?>

            <?php if (!empty($twitter_page)) : ?>
              <div class="mycol border">
                <a target="_blank" href="<?php echo FunctionsV3::prettyUrl($twitter_page) ?>"><i class="ion-social-twitter"></i></a>
              </div>
              <!--col-->
            <?php endif; ?>

            <?php if (!empty($fb_page)) : ?>
              <div class="mycol border">
                <a target="_blank" href="<?php echo FunctionsV3::prettyUrl($fb_page) ?>"><i class="ion-social-facebook"></i></a>
              </div>
              <!--col-->
            <?php endif; ?>


            <?php if (!empty($intagram_page)) : ?>
              <div class="mycol border">
                <a target="_blank" href="<?php echo FunctionsV3::prettyUrl($intagram_page) ?>"><i class="ion-social-instagram"></i></a>
              </div>
              <!--col-->
            <?php endif; ?>

            <?php if (!empty($youtube_url)) : ?>
              <div class="mycol border">
                <a target="_blank" href="<?php echo FunctionsV3::prettyUrl($youtube_url) ?>"><i class="ion-social-youtube-outline"></i></a>
              </div>
              <!--col-->
            <?php endif; ?>

          </div>
          <!--social wrap-->

        </div>
        <!--col-->
      <?php endif; ?>

    </div>
    <!--row-->
  </div>
  <!--container-->
</div>
<!--section-footer-->
<button type="button" class="btnn btn--floating waves-effect waves-light" id="btn-scroll-top">
  <i class="fa fa-long-arrow-up"></i>
</button>