<?php
$kr_search_adrress = FunctionsV3::getSessionAddress();

$home_search_text = Yii::app()->functions->getOptionAdmin('home_search_text');
if (empty($home_search_text)) {
  $home_search_text = Yii::t("default", "Find restaurants near you");
}

$home_search_subtext = Yii::app()->functions->getOptionAdmin('home_search_subtext');
if (empty($home_search_subtext)) {
  $home_search_subtext = Yii::t("default", "Order Delivery Food Online From Local Restaurants");
}

$home_search_mode = Yii::app()->functions->getOptionAdmin('home_search_mode');
$placholder_search = Yii::t("default", "Street Address,City,State");
if ($home_search_mode == "postcode") {
  $placholder_search = Yii::t("default", "Enter your postcode");
}
$placholder_search = Yii::t("default", $placholder_search);
?>

<?php if ($home_search_mode == "address" || $home_search_mode == "") : ?>
  <div class="hero-container flex flex--justify-center flex--dir-col" data-image-src="<?php echo assetsURL() . "/images/hero.jpg" ?>">
    <!--parallax-container-->
    <div class="hero-links">
      <div class="space-bottom--lg">
        <h1 id="hero-title"><?php echo t("Order Delicious Food Online..") ?></h1>
        <div id="hero-subtitle" class="text-light"><?php echo t("It's the food you love, delivered") ?></div>
      </div>
      <div class="flex flex--justify-even flex-dir--col-sm">
        <a href="<?php echo websiteUrl() . '/searcharea?dailyspecial=all' ?>" class="btnn btn--raised waves-effect waves-light" id="hero-link-1">
          <span><?php echo t("Daily Specials") ?></span>
          <i class="fa fa-chevron-circle-right space-left--sm"></i>
        </a>
        <a href="<?php echo websiteUrl() . '/searcharea?foodname=all' ?>" class="btnn btn--raised waves-effect waves-light" id="hero-link-2">
          <span><?php echo t("A La Carte") ?></span>
          <i class="fa fa-chevron-circle-right space-left--sm"></i>
        </a>
        <a href="<?php echo websiteUrl() . '/searcharea?mealplans=all' ?>" class="btnn btn--raised waves-effect waves-light" id="hero-link-3">
          <span><?php echo t("Meal Plans") ?></span>
          <i class="fa fa-chevron-circle-right space-left--sm"></i>
        </a>
      </div>
    </div>

  </div>
  <!--parallax-container-->

<?php endif; ?>

<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">

      <?php
      $kr_search_adrress = FunctionsV3::getSessionAddress();
      $home_search_text = Yii::app()->functions->getOptionAdmin('home_search_text');
      if (empty($home_search_text)) {
        $home_search_text = Yii::t("default", " <hr>Search for dishes or your favorite chef<hr>");
      }
      $home_search_subtext = Yii::app()->functions->getOptionAdmin('home_search_subtext');
      if (empty($home_search_subtext)) {
        $home_search_subtext = Yii::t("default", "Try <a href='#'>Advance Search</a> to choose options like cuisine and dietary needs like low-cal or keto");
      }
      $home_search_mode = Yii::app()->functions->getOptionAdmin('home_search_mode');
      $placholder_search = Yii::t("default", "Street Address,City,State");
      if ($home_search_mode == "postcode") {
        $placholder_search = Yii::t("default", "Enter your postcode");
      }
      $placholder_search = Yii::t("default", $placholder_search);
      if ($enabled_advance_search == "yes") {
        $this->renderPartial('/front/advance_search', array(
          'home_search_text' => $home_search_text,
          'kr_search_adrress' => $kr_search_adrress,
          'placholder_search' => $placholder_search,
          'home_search_subtext' => $home_search_subtext,
          'theme_search_merchant_name' => getOptionA('theme_search_merchant_name'),
          'theme_search_street_name' => getOptionA('theme_search_street_name'),
          'theme_search_cuisine' => getOptionA('theme_search_cuisine'),
          'theme_search_foodname' => getOptionA('theme_search_foodname'),
          'theme_search_merchant_address' => getOptionA('theme_search_merchant_address'),
          'map_provider' => $map_provider
        ));
      } else $this->renderPartial('/front/single_search', array(
        'home_search_text' => $home_search_text,
        'kr_search_adrress' => $kr_search_adrress,
        'placholder_search' => $placholder_search,
        'home_search_subtext' => $home_search_subtext,
        'map_provider' => $map_provider
      ));
      ?>

    </div>
  </div>
</div>

<section class="sections" id="why-choose-us">
  <div class="container center has-padding-y">
    <h2><?php echo t("Why You Should Choose Us?") ?></h2>
    <div class="row row-why-choose-us space-top shadowed o-h">
      <div class="col-md-6 rounded-top-left flex flex--align-center lg-blue">
        <div>
          <img src="<?php echo assetsURL() . '/images/cook.png' ?>" alt="" />
        </div>
        <div>
          <h4><?php echo t("Amazing Chefs") ?></h4>
          <h5>
            <?php echo t("You deserve only the best. Our 4-part evaluation system ensures only the best chefs in your city end up on HomeChef.") ?>
          </h5>
        </div>
      </div>
      <div class="col-md-6 flex flex--align-center rounded-top-right lg-green">
        <div>
          <img src="<?php echo assetsURL() . '/images/sink1.png' ?>" alt="" />
        </div>
        <div>
          <h4><?php echo t("Make It Yours") ?></h4>
          <h5>
            <?php echo t("Make meals uniquely yours. Upgrade, double-up, add or swap protein on select meals. You’re in control of your dinstiny.") ?>
          </h5>
        </div>
      </div>
    </div>
    <div class="row row-why-choose-us shadowed o-h">
      <div class="col-md-6 flex flex--align-center rounded-bottom-left lg-purple">
        <div>
          <img src="<?php echo assetsURL() . '/images/dish1.png' ?>" alt="" />
        </div>
        <div>
          <h4><?php echo t("Change It Up") ?></h4>
          <h5>
            <?php echo t("Add meals. Edit servings. Or take a week off and fly to Tahiti. Plans and preferences change — we keep up.") ?>
          </h5>
        </div>
      </div>
      <div class="col-md-6 flex flex--align-center rounded-bottom-right lg-yellow">
        <div>
          <img src="<?php echo assetsURL() . '/images/sink1.png' ?>" alt="" />
        </div>
        <div>
          <h4><?php echo t("Get Dinner Done") ?></h4>
          <h5>
            <?php echo t("If your routine isn’t quite “routine,” worry not, you’ll find tons of meals that fit your changing schedule and tastes.") ?>
          </h5>
        </div>
      </div>
    </div>
  </div>
</section>

<?php if ($theme_hide_how_works <> 2) : ?>
  <!--HOW IT WORKS SECTIONS-->
  <div class="sections section-how-it-works">
    <div class="container center has-padding-y">
      <h2><?php echo t("How it works") ?></h2>
      <p class="center"><?php echo t("Get your favourite food in 4 simple steps") ?></p>
      <br />
      <div class="row is-rounded" id="how-it-works-row">
        <div class="col-md-4 col-sm-4 center">
          <div class="steps step1-icon">
            <svg viewBox="0 0 80 80" xmlns="http://www.w3.org/2000/svg">
              <g fill-rule="evenodd">
                <path fill="#008600" d="M42.1841204,33.25 L42.3590453,33.2551904 C43.8640985,33.3447407 45.0735249,34.5821853 45.1610475,36.1220315 L45.1661204,36.301 L45.1661204,39.659 L45.3497844,39.600856 C45.5358564,39.548824 45.7289844,39.515296 45.9276564,39.501784 L46.1281204,39.495 L46.3292464,39.5018608 C47.3263266,39.5701012 48.1898173,40.1418781 48.679285,40.9692015 L48.7721204,41.138 L48.9733519,41.0469306 C49.2465,40.9355417 49.538463,40.8648194 49.8427222,40.8409861 L50.0731204,40.832 L50.2700233,40.8385709 C51.3765277,40.9126507 52.3188765,41.6064435 52.7697272,42.5811465 L52.8441204,42.756 L53.0649204,42.66964 C53.3047924,42.586696 53.5581812,42.5336528 53.8211546,42.5157533 L54.0201204,42.509 L54.1949419,42.5141867 C55.6991317,42.603673 56.9085261,43.840253 56.9960475,45.3800353 L57.0011204,45.559 L57.0011204,52.553 L56.9977837,52.7389537 C56.9072591,55.3675969 55.0025982,61.5040619 54.6966074,62.4780701 L54.6771204,62.54 L54.6344307,62.6519016 C54.4901916,62.9728633 54.192202,63.1965881 53.848107,63.2423423 L53.7171204,63.251 L40.9681204,63.251 L40.8399242,63.24269 C40.5447239,63.2042236 40.2804427,63.0344184 40.1195388,62.7793841 L40.0571204,62.665 L40.0505467,62.6508031 C39.954222,62.4436934 38.8400069,60.0627753 38.3371143,59.14686 L38.2751204,59.036 L38.0817459,58.7025926 C37.6138405,57.9077901 37.0326101,56.9980494 36.4128652,56.0368889 L36.1451204,55.622 L35.7710148,55.0427037 C34.9050206,53.6999735 33.9696246,52.2318556 33.0740712,50.6861167 L32.6301204,49.907 L32.5193914,49.7000939 C31.7817869,48.2562804 31.8314727,46.9122148 32.6577926,45.9594203 L32.7811204,45.826 L32.9244769,45.689136 C33.4100123,45.2553636 34.0162452,44.9996314 34.6645634,44.9528226 L34.8821204,44.945 L34.8971204,44.945 L35.0957894,44.9524884 C35.7475623,44.9985051 36.3587246,45.2543811 36.850664,45.6886717 L37.0101204,45.84 L37.0334954,45.863875 L37.0561204,45.89 L39.2031204,48.386 L39.2031204,36.301 C39.2031204,34.619 40.5411204,33.25 42.1841204,33.25 Z M42.1841204,35.299 L42.0717574,35.3057467 C41.6293405,35.3592176 41.277186,35.724461 41.2256262,36.1842176 L41.2191204,36.301 L41.2191204,51.116 L41.2114464,51.242535 C41.1657804,51.61689 40.9197204,51.939 40.5651204,52.074 C40.487787,52.1033333 40.4086759,52.1228889 40.3298611,52.1326667 L40.2121204,52.14 L40.0902574,52.1325219 C39.8886976,52.1076822 39.696686,52.0213994 39.5415548,51.8802332 L39.4531204,51.789 L35.5641204,47.269 L35.4681435,47.1876528 C35.3344583,47.0881528 35.1789213,47.024875 35.0136806,47.0022639 L34.8881204,46.993 L34.7594769,47.002287 C34.5906806,47.0249907 34.4338102,47.0887315 34.3010139,47.1905463 L34.2061204,47.274 L34.1337993,47.3624257 C33.884344,47.731382 34.0747273,48.3027914 34.3170393,48.7695327 L34.3841204,48.894 L34.8093743,49.6406426 C35.6865174,51.1553479 36.6118739,52.6074051 37.4678594,53.9362267 L37.8301204,54.498 L38.1031807,54.920594 C38.7353316,55.8999122 39.3293042,56.8296927 39.8168748,57.6595912 L40.0191204,58.009 L40.114454,58.1799982 C40.4805922,58.8517513 41.080966,60.0995903 41.4786613,60.9373045 L41.6031204,61.2 L52.9771204,61.2 L53.0557507,60.9407839 C53.7549365,58.6235209 54.8957149,54.52021 54.979258,52.7470235 L54.9841204,52.553 L54.9841204,45.559 L54.9776149,45.4424169 C54.9260595,44.9833994 54.5739619,44.6182128 54.132284,44.5647464 L54.0201204,44.558 L53.9075581,44.5647464 C53.4644021,44.6182128 53.1121907,44.9833994 53.0606266,45.4424169 L53.0541204,45.559 L53.0561204,45.559 L53.0561204,48.542 L53.0501965,48.653669 C52.9996032,49.1276607 52.6306841,49.5048137 52.1653375,49.5600325 L52.0471204,49.567 L51.9374102,49.5609843 C51.471674,49.509606 51.1003518,49.1349537 51.0459811,48.6621228 L51.0391204,48.542 L51.0391204,43.882 L51.0326142,43.7652176 C50.98105,43.305461 50.6288387,42.9402176 50.1856827,42.8867467 L50.0731204,42.88 L49.9609567,42.8867467 C49.5192789,42.9402176 49.1671812,43.305461 49.1156258,43.7652176 L49.1091204,43.882 L49.1091204,47.205 L49.103222,47.3166563 C49.0528431,47.7905407 48.685425,48.1669432 48.2203081,48.2220472 L48.1021204,48.229 L47.9922359,48.2229846 C47.5258564,48.1716101 47.155227,47.7970111 47.1009667,47.3249225 L47.0941204,47.205 L47.0941204,42.545 L47.0876142,42.4284169 C47.03605,41.9693994 46.6838387,41.6042128 46.2406827,41.5507464 L46.1281204,41.544 L46.0159859,41.5507464 C45.5745355,41.6042128 45.2239247,41.9693994 45.1725967,42.4284169 L45.1661204,42.545 L45.1661204,45.868 L45.1601965,45.9798305 C45.1096032,46.4543582 44.7406841,46.830068 44.2753375,46.8850616 L44.1571204,46.892 L44.0472359,46.8860095 C43.5808564,46.8348418 43.210227,46.4616371 43.1559667,45.9882937 L43.1491204,45.868 L43.1491204,36.301 L43.1426145,36.1842176 C43.0867581,35.686148 42.6781204,35.299 42.1841204,35.299 Z M21,19 C22.792,19 24.25,20.458 24.25,22.25 L24.25,36.25 C24.25,38.042 22.792,39.5 21,39.5 L7,39.5 C5.208,39.5 3.75,38.042 3.75,36.25 L3.75,22.25 C3.75,20.458 5.208,19 7,19 L21,19 Z M73,19 C74.792,19 76.25,20.458 76.25,22.25 L76.25,36.25 C76.25,38.042 74.792,39.5 73,39.5 L59,39.5 C57.208,39.5 55.75,38.042 55.75,36.25 L55.75,22.25 C55.75,20.458 57.208,19 59,19 L73,19 Z M21,21.5 L7,21.5 C6.586,21.5 6.25,21.837 6.25,22.25 L6.25,36.25 C6.25,36.663 6.586,37 7,37 L21,37 C21.414,37 21.75,36.663 21.75,36.25 L21.75,26.35 L14.275,34.117 C14.0735714,34.3261429 13.8060204,34.4581429 13.5195773,34.4915889 L13.375,34.5 C13.035,34.5 12.71,34.361 12.474,34.117 L8.099,29.571 C7.621,29.073 7.636,28.282 8.133,27.804 C8.63,27.325 9.422,27.34 9.901,27.837 L13.375,31.447 L21.75,22.746 L21.75,22.25 C21.75,21.837 21.414,21.5 21,21.5 Z M73,21.5 L59,21.5 C58.586,21.5 58.25,21.837 58.25,22.25 L58.25,36.25 C58.25,36.663 58.586,37 59,37 L73,37 C73.414,37 73.75,36.663 73.75,36.25 L73.75,26.35 L66.275,34.117 C66.0735714,34.3261429 65.8060204,34.4581429 65.5195773,34.4915889 L65.375,34.5 C65.035,34.5 64.71,34.361 64.474,34.117 L60.099,29.571 C59.621,29.073 59.636,28.282 60.133,27.804 C60.63,27.325 61.422,27.34 61.901,27.837 L65.375,31.447 L73.75,22.746 L73.75,22.25 C73.75,21.837 73.414,21.5 73,21.5 Z"></path>
                <path fill="#99CE99" d="M37.16,37 L33,37 C32.587,37 32.25,36.663 32.25,36.25 L32.25,22.25 C32.25,21.837 32.587,21.5 33,21.5 L47,21.5 C47.414,21.5 47.75,21.837 47.75,22.25 L47.75,37 L50.25,37 L50.25,22.25 C50.25,20.458 48.792,19 47,19 L33,19 C31.208,19 29.75,20.458 29.75,22.25 L29.75,36.25 C29.75,38.042 31.208,39.5 33,39.5 L37.16,39.5 L37.16,37 Z"></path>
              </g>
            </svg>
          </div>
          <h3><?php echo t("Select") ?></h3>
          <p><?php echo t("Find all the Chefs available near you") ?></p>
        </div>
        <div class="col-md-4 col-sm-3 center">
          <div class="steps step2-icon">
            <svg viewBox="0 0 80 80" xmlns="http://www.w3.org/2000/svg">
              <g fill-rule="evenodd">
                <path fill="#99CE99" d="M39.75,41.5 C42.369,41.5 44.5,43.631 44.5,46.25 C44.5,48.869 42.369,51 39.75,51 C37.131,51 35,48.869 35,46.25 C35,43.631 37.131,41.5 39.75,41.5 Z M39.75,44 C38.509,44 37.5,45.01 37.5,46.25 C37.5,47.49 38.509,48.5 39.75,48.5 C40.991,48.5 42,47.49 42,46.25 C42,45.01 40.991,44 39.75,44 Z M51.7505,32.5 C54.3695,32.5 56.5005,34.631 56.5005,37.25 C56.5005,39.869 54.3695,42 51.7505,42 C49.1315,42 47.0005,39.869 47.0005,37.25 C47.0005,34.631 49.1315,32.5 51.7505,32.5 Z M51.7505,35 C50.5095,35 49.5005,36.01 49.5005,37.25 C49.5005,38.49 50.5095,39.5 51.7505,39.5 C52.9905,39.5 54.0005,38.49 54.0005,37.25 C54.0005,36.01 52.9905,35 51.7505,35 Z M27.75,28.5 C30.369,28.5 32.5,30.631 32.5,33.25 C32.5,35.869 30.369,38 27.75,38 C25.131,38 23,35.869 23,33.25 C23,30.631 25.131,28.5 27.75,28.5 Z M27.75,31 C26.509,31 25.5,32.01 25.5,33.25 C25.5,34.49 26.509,35.5 27.75,35.5 C28.991,35.5 30,34.49 30,33.25 C30,32.01 28.991,31 27.75,31 Z"></path>
                <path fill="#008600" d="M59.25,16 C62.145,16 64.5,18.355 64.5,21.25 L64.5,59.25 C64.5,62.145 62.145,64.5 59.25,64.5 L21.25,64.5 C18.355,64.5 16,62.145 16,59.25 L16,21.25 C16,18.355 18.355,16 21.25,16 L59.25,16 Z M59.25,18.5 L21.25,18.5 C19.734,18.5 18.5,19.733 18.5,21.25 L18.5,59.25 C18.5,60.767 19.734,62 21.25,62 L59.25,62 C60.767,62 62,60.767 62,59.25 L62,21.25 C62,19.733 60.767,18.5 59.25,18.5 Z M41,52.118 L41,55.25 C41,55.94 40.44,56.5 39.75,56.5 C39.103125,56.5 38.5705078,56.0078125 38.5064575,55.3777466 L38.5,55.25 L38.5,52.118 C38.903,52.203 39.321,52.25 39.75,52.25 C40.179,52.25 40.597,52.203 41,52.118 Z M29,39.118 L29,55.25 C29,55.94 28.44,56.5 27.75,56.5 C27.103125,56.5 26.5705078,56.0078125 26.5064575,55.3777466 L26.5,55.25 L26.5,39.118 C26.903,39.203 27.321,39.25 27.75,39.25 C28.179,39.25 28.597,39.203 29,39.118 Z M53.0005,43.118 L53.0005,55.25 C53.0005,55.94 52.4405,56.5 51.7505,56.5 C51.103625,56.5 50.5710078,56.0078125 50.5069575,55.3777466 L50.5005,55.25 L50.5005,43.118 C50.9035,43.203 51.3215,43.25 51.7505,43.25 C52.1795,43.25 52.5975,43.203 53.0005,43.118 Z M39.75,24 C40.396875,24 40.9294922,24.4921875 40.9935425,25.1222534 L41,25.25 L41,40.383 C40.597,40.297 40.179,40.25 39.75,40.25 C39.42825,40.25 39.1126875,40.2764375 38.805,40.3259375 L38.5,40.383 L38.5,25.25 C38.5,24.56 39.06,24 39.75,24 Z M51.7505,24 C52.397375,24 52.9299922,24.4921875 52.9940425,25.1222534 L53.0005,25.25 L53.0005,31.383 C52.5975,31.297 52.1795,31.25 51.7505,31.25 C51.42875,31.25 51.1131875,31.2764375 50.8055,31.3259375 L50.5005,31.383 L50.5005,25.25 C50.5005,24.56 51.0605,24 51.7505,24 Z M27.75,24 C28.396875,24 28.9294922,24.4921875 28.9935425,25.1222534 L29,25.25 L29,27.383 C28.597,27.297 28.179,27.25 27.75,27.25 C27.42825,27.25 27.1126875,27.2764375 26.805,27.3259375 L26.5,27.383 L26.5,25.25 C26.5,24.56 27.06,24 27.75,24 Z"></path>
              </g>
            </svg>
          </div>
          <h3><?php echo t("Choose") ?></h3>
          <p><?php echo t("Browse hundreds of menus") ?></p>
        </div>
        <div class="col-md-4 col-sm-3 center">
          <div class="steps step2-icon">
            <svg viewBox="0 0 80 80" xmlns="http://www.w3.org/2000/svg">
              <title>Enjoy</title>
              <g fill-rule="evenodd">
                <path fill="#008600" d="M43.3185185,29.4558824 C44.0088745,29.4558824 44.5685185,30.0155264 44.5685185,30.7058824 C44.5685185,31.353091 44.0766439,31.8854163 43.4463238,31.9494287 L43.3185185,31.9558824 L41.25,31.9558824 L41.2501661,34.4722566 C54.1410741,35.0538373 64.5079016,44.5801094 65.0772161,56.4851895 C67.4055143,56.6268526 69.25,58.56077 69.25,60.9254902 L69.25,61.1764706 C69.25,63.6341377 67.2576671,65.6264706 64.8,65.6264706 L15.2,65.6264706 C12.7423329,65.6264706 10.75,63.6341377 10.75,61.1764706 L10.75,60.9254902 C10.75,58.56077 12.5944857,56.6268526 14.9232384,56.4839564 C15.4921273,44.5797623 25.859464,35.0533421 38.7508368,34.4722114 L38.75,31.9558824 L36.6814815,31.9558824 C35.9911255,31.9558824 35.4314815,31.3962383 35.4314815,30.7058824 C35.4314815,30.0586737 35.9233561,29.5263485 36.5536762,29.462336 L36.6814815,29.4558824 L43.3185185,29.4558824 Z M64.8,58.9754902 L15.2,58.9754902 C14.1230447,58.9754902 13.25,59.8485349 13.25,60.9254902 L13.25,61.1764706 C13.25,62.2534259 14.1230447,63.1264706 15.2,63.1264706 L64.8,63.1264706 C65.8769553,63.1264706 66.75,62.2534259 66.75,61.1764706 L66.75,60.9254902 C66.75,59.8485349 65.8769553,58.9754902 64.8,58.9754902 Z M40,36.9441176 C28.0821857,36.9441176 18.3534852,45.3324544 17.4643942,55.9321907 L17.4392638,56.2676471 L62.5607362,56.2676471 C61.851087,45.5099805 52.0432649,36.9441176 40,36.9441176 Z"></path>
                <path fill="#99CE99" d="M31.355,12.6233546 C30.0745051,13.4788113 29.4166667,14.7972522 29.4166667,16.4339869 C29.4166667,17.5470407 29.7542855,18.2362275 30.6752654,19.5693266 C31.309841,20.4878615 31.4907407,20.8571351 31.4907407,21.2836601 C31.4907407,22.1102514 31.2267685,22.6393051 30.663642,23.0155115 C30.0896024,23.3990084 29.9351372,24.1752452 30.3186342,24.7492847 C30.7021312,25.3233242 31.4783679,25.4777895 32.0524074,25.0942925 C33.3329023,24.2388358 33.9907407,22.9203949 33.9907407,21.2836601 C33.9907407,20.1706064 33.6531219,19.4814195 32.732142,18.1483204 C32.0975664,17.2297856 31.9166667,16.860512 31.9166667,16.4339869 C31.9166667,15.6073956 32.1806389,15.078342 32.7437654,14.7021356 C33.317805,14.3186386 33.4722702,13.5424019 33.0887732,12.9683624 C32.7052762,12.3943228 31.9290395,12.2398576 31.355,12.6233546 Z M39.6512963,10.9606095 C38.3708014,11.8160662 37.712963,13.1345071 37.712963,14.7712418 C37.712963,15.8842956 38.0505818,16.5734824 38.9715617,17.9065815 C39.6061373,18.8251164 39.787037,19.19439 39.787037,19.620915 C39.787037,20.4475063 39.5230648,20.97656 38.9599383,21.3527664 C38.3858987,21.7362634 38.2314335,22.5125001 38.6149305,23.0865396 C38.9984275,23.6605791 39.7746642,23.8150444 40.3487037,23.4315474 C41.6291986,22.5760907 42.287037,21.2576498 42.287037,19.620915 C42.287037,18.5078613 41.9494182,17.8186744 41.0284383,16.4855753 C40.3938627,15.5670405 40.212963,15.1977669 40.212963,14.7712418 C40.212963,13.9446505 40.4769352,13.4155969 41.0400617,13.0393905 C41.6141013,12.6558935 41.7685665,11.8796568 41.3850695,11.3056173 C41.0015725,10.7315777 40.2253358,10.5771125 39.6512963,10.9606095 Z M43.9854222,41.7864432 C44.1791702,41.1238324 44.8733861,40.743744 45.5359969,40.937492 C50.5119832,42.3924747 54.2518129,45.2681088 56.6935183,49.5309457 C57.0366449,50.1299911 56.8291816,50.8937725 56.2301361,51.236899 C55.6310907,51.5800256 54.8673093,51.3725623 54.5241828,50.7735169 C52.4092716,47.0812118 49.1999912,44.6135283 44.8343734,43.3370178 C44.1717627,43.1432699 43.7916743,42.4490539 43.9854222,41.7864432 Z M47.9475926,12.6233546 C48.5216321,12.2398576 49.2978688,12.3943228 49.6813658,12.9683624 C50.0648628,13.5424019 49.9103976,14.3186386 49.336358,14.7021356 C48.7732315,15.078342 48.5092593,15.6073956 48.5092593,16.4339869 C48.5092593,16.860512 48.690159,17.2297856 49.3247346,18.1483204 C50.2457145,19.4814195 50.5833333,20.1706064 50.5833333,21.2836601 C50.5833333,22.9203949 49.9254949,24.2388358 48.645,25.0942925 C48.0709605,25.4777895 47.2947238,25.3233242 46.9112268,24.7492847 C46.5277298,24.1752452 46.682195,23.3990084 47.2562346,23.0155115 C47.8193611,22.6393051 48.0833333,22.1102514 48.0833333,21.2836601 C48.0833333,20.8571351 47.9024336,20.4878615 47.267858,19.5693266 C46.3468781,18.2362275 46.0092593,17.5470407 46.0092593,16.4339869 C46.0092593,14.7972522 46.6670977,13.4788113 47.9475926,12.6233546 Z"></path>
              </g>
            </svg>
          </div>
          <h3><?php echo t("Enjoy") ?></h3>
          <p><?php echo t("Food is delivered to your door") ?></p>
        </div>
      </div>

    </div>
    <!--container-->
  </div>
  <!--section-how-it-works-->
<?php endif; ?>

<div class="sections flex flex--align-center" id="section-you-prepare" style="background: url(<?php echo assetsURL() . '/images/banner3.jpg' ?>)">
  <div class="container has-padding-y">
    <div class="row">
      <div class="col-md-12 center">
        <h1 class="space-bottom text-light font-bold"><?php echo t('Your prepare the Food, we handle the rest') ?></h1>
        <h3 class="text-light"><?php echo t("Would you like thousands of new customers to taste your amazing food? So would we!") ?></h3>
        <h3 class="text-light"><?php echo t("It's simple: we list your menu online, help you process orders, pick them up, and deliver them to hungry pandas - in a heartbeat!") ?></h3>
      </div>
    </div>
  </div>
</div>


<!--FEATURED RESTAURANT SECIONS-->
<?php if ($disabled_featured_merchant == "") : ?>
  <?php if (getOptionA('disabled_featured_merchant') != "yes") : ?>
    <?php if ($res = FunctionsV3::getFeatureMerchant()) : ?>
      <div class="sections section-feature-resto">
        <div class="container">

          <?php $cuisine_list = Yii::app()->functions->Cuisine(true); ?>

          <h2><?php echo t("Featured Chefs") ?></h2>

          <div class="row">
            <?php foreach ($res as $val) : //dump($val);
                    ?>
              <?php $address = $val['street'] . " " . $val['city'];
                      $address .= " " . $val['state'] . " " . $val['post_code'];

                      $ratings = Yii::app()->functions->getRatings($val['merchant_id']);
                      ?>


              <div class="col-md-5 border-light ">

                <div class="col-md-3 col-sm-3">
                  <a href="<?php echo Yii::app()->createUrl("/menu-" . trim($val['restaurant_slug'])) ?>">
                    <img class="logo-small" src="<?php echo FunctionsV3::getMerchantLogo($val['merchant_id'], $val['logo']); ?>">
                  </a>
                </div>
                <!--col-->

                <div class="col-md-9 col-sm-9">

                  <div class="row">
                    <div class="col-sm-5">
                      <div class="rating-stars" data-score="<?php echo $ratings['ratings'] ?>"></div>
                    </div>
                    <div class="col-sm-3 merchantopentag">
                      <?php echo FunctionsV3::merchantOpenTag($val['merchant_id']) ?>
                    </div>

                    <div class="col-sm-2 merchantopentag">
                      <a href="javascript:;" data-id="<?php echo $val['merchant_id'] ?>" title="<?php echo t("add to your favorite restaurant") ?>" class="add_favorites <?php echo "fav_" . $val['merchant_id'] ?>"><i class="ion-android-favorite-outline"></i></a>
                    </div>

                  </div>

                  <a href="<?php echo Yii::app()->createUrl("/menu-" . trim($val['restaurant_slug'])) ?>">
                    <h4 class="concat-text"><?php echo clearString($val['restaurant_name']) ?></h4>
                  </a>

                  <p class="concat-text">
                    <?php //echo wordwrap(FunctionsV3::displayCuisine($val['cuisine']),50,"<br />\n");
                            ?>
                    <?php echo FunctionsV3::displayCuisine($val['cuisine'], $cuisine_list); ?>
                  </p>
                  <p class="concat-text"><?php echo $address ?></p>
                  <?php echo FunctionsV3::displayServicesList($val['service']) ?>
                </div>
                <!--col-->

              </div>
              <!--col-6-->

              <div class="col-md-1"></div>

            <?php endforeach; ?>
          </div>
          <!--end row-->


        </div>
        <!--container-->
      </div>
    <?php endif; ?>
  <?php endif; ?>
<?php endif; ?>
<!--END FEATURED RESTAURANT SECIONS-->

<?php if ($theme_show_app == 2) : ?>
  <!--MOBILE APP SECTION-->
  <div id="mobile-app-sections" class="container">
    <div class="container-medium has-padding-y">
      <div class="row">
        <div class="col-xs-5 into-row border app-image-wrap">
          <img class="app-phone" src="<?php echo assetsURL() . "/images/getapp-2.png" ?>">
        </div>
        <!--col-->
        <div class="col-xs-7 into-row border">
          <h1><?php echo t("Put us in your pocket") ?>! </h1>
          <h3><?php echo t("Find the right food to suit your mood, and make the first bite last. Go ahead, download us.") ?>.</h3>

          <div class="row border" id="getapp-wrap">
            <?php if (!empty($theme_app_ios) && $theme_app_ios != "http://") : ?>
              <div class="col-xs-4 border">
                <a href="<?php echo $theme_app_ios ?>" target="_blank">
                  <img class="get-app" src="<?php echo assetsURL() . "/images/get-app-store.png" ?>">
                </a>
              </div>
            <?php endif; ?>

            <?php if (!empty($theme_app_android) && $theme_app_android != "http://") : ?>
              <div class="col-xs-4 border">
                <a href="<?php echo $theme_app_android ?>" target="_blank">
                  <img class="get-app" src="<?php echo assetsURL() . "/images/get-google-play.png" ?>">
                </a>
              </div>
            <?php endif; ?>

          </div>
          <!--row-->

        </div>
        <!--col-->
      </div>
      <!--row-->
    </div>
    <!--container-medium-->

    <div class="mytable border" id="getapp-wrap2">
      <?php if (!empty($theme_app_ios) && $theme_app_ios != "http://") : ?>
        <div class="mycol border">
          <a href="<?php echo $theme_app_ios ?>" target="_blank">
            <img class="get-app" src="<?php echo assetsURL() . "/images/get-app-store.png" ?>">
          </a>
        </div>
        <!--col-->
      <?php endif; ?>
      <?php if (!empty($theme_app_android) && $theme_app_android != "http://") : ?>
        <div class="mycol border">
          <a href="<?php echo $theme_app_android ?>" target="_blank">
            <img class="get-app" src="<?php echo assetsURL() . "/images/get-google-play.png" ?>">
          </a>
        </div>
        <!--col-->
      <?php endif; ?>
    </div>
    <!--mytable-->


  </div>
  <!--container-->
  <!--END MOBILE APP SECTION-->
<?php endif; ?>
<br />