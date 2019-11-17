<style>
    #profile-container {
        position: relative;
        height: 250px;
        background-size: cover;
        background-position: center;
        object-fit: fill;
        background-repeat: no-repeat;
    }

    #profile-photo {
        height: 200px;
        width: 200px;
        position: absolute;
        left: 100px;
        bottom: -50px;
        background-repeat: no-repeat;
        background-postion: center;
        background-size: cover;
        border-radius: 10px
    }

    #profile-info {
        width: 70%;
        padding: 0 2rem;
        margin-left: auto
    }

    .is-title-lg {
        font-size: 1.5rem !important
    }
</style>

<div id="navbar-offset"></div>

<?php
$the_plan = FunctionsV3::getMealPlan($_GET['id']);
$title = $the_plan['title'];
$merchant_id = $the_plan['merchant_id'];
$ii = [$the_plan['mo'], $the_plan['tu'], $the_plan['we'], $the_plan['th'], $the_plan['fr']];
$days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'];

$dishes_dates = [$the_plan['mo_date'], $the_plan['tu_date'], $the_plan['we_date'], $the_plan['th_date'], $the_plan['fr_date']];

?>

<div class="container-fluid">
    <div class="row">
        <div class="fb-profile">
            <div class="fb-image-lg" style="background-image: url(<?php echo assetsURL() . '/images/b-1.jpg' ?>)"></div>
            <div class="flex flex--align-center">
                <img class="fb-image-profile thumbnail" src="<?php echo assetsURL() . '/images/slider.jpg' ?>" alt="Profile image example" />
                <div class="fb-profile-text">
                    <h1 class="is-title-md"><?php echo $the_plan['title'] ?></h1>
                    <span class="is-title"><?php echo t("By") ?> <?php echo current(FunctionsV3::getMerchantByName($merchant_id))['contact_name'] ?></span>
                    <br />
                    <span class="badge"><?php echo t("Good Chef") ?></span>
                    <span class="font-bold badge space-left--xs"><?php echo t("2 Ratings") ?></span>
                </div>
                <div class="space-left text-center flex-1">
                    <?php echo t("Rs: ") ?>
                    <span class="font-bold is-heading orange-text" id="total-meal-plan-price"></span>
                    <span><?php echo t("For 5 days") ?></span>
                    <span class="orange-text font-bold">(<?php echo t("Delivery Included") ?>)</span>
                    <br /><br />
                    <?php echo t("Rs: ") ?>
                    <span class="font-bold is-heading orange-text" id="each-meal-plan-price"></span>
                    <span><?php echo t("Each Meal") ?></span>
                </div>
            </div>
        </div>
    </div>
</div> <!-- /container fluid-->
<div class="container">
    <div class="col-sm-8">

        <div data-spy="scroll" class="tabbable-panel">
            <div class="tabbable-line">
                <ul class="nav nav-tabs ">
                    <li class="active">
                        <a href="#tab_default_1" data-toggle="tab"><?php echo t("Menu") ?></a>
                    </li>
                    <li>
                        <a href="#tab_default_2" data-toggle="tab"><?php echo t("About") ?></a>
                    </li>
                    <li>
                        <a href="#tab_default_3" data-toggle="tab"><?php echo t("Reviews") ?></a>
                    </li>
                    <li>
                        <a href="#tab_default_4" data-toggle="tab"><?php echo t("Learn More") ?></a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active has-padding" id="tab_default_1">
                        <?php $jj = 0; ?>
                        <?php $kk = 0; ?>
                        <?php $total_meal_plan_price = 0; ?>
                        <?php foreach ($ii as $i) : ?>
                            <?php $meal_plan_dish = FunctionsV3::getAddonItem($i) ?>
                            <a href="#" class="list-group-item flex flex--align-center active z-elevation-2">
                                <div class="media col-md-3">
                                    <figure class="pull-left">
                                        <img class="media-object img-rounded img-responsive" src="<?php echo websiteUrl() . '/upload/' . $meal_plan_dish['photo'] ?>">
                                    </figure>
                                </div>
                                <div class="col-md-6">
                                    <h4 class="list-group-item-heading text-dark"><?php echo $meal_plan_dish['sub_item_name'] ?></h4>
                                    <p class="list-group-item-text text-dark"><?php echo $meal_plan_dish['item_description'] ?></p>
                                </div>
                                <div class="col-md-3 text-center">
                                    <?php if (date('Y-m-d') < $dishes_dates[$kk]) : ?>
                                        <div class="flex flex--align-center">
                                            <input type="checkbox" checked data-price="<?php echo $meal_plan_dish['price'] ?>" class="price-toggler" data-price-handler />
                                        </div>
                                        <?php $total_meal_plan_price += $meal_plan_dish['price']; ?>
                                    <?php else : ?>
                                        <div class="flex flex--align-center">
                                            <h4 class="text-danger"><?php echo t("Not Available!") ?></h4>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </a>
                            <?php $jj++; ?>
                            <?php $kk++; ?>
                        <?php endforeach; ?>
                    </div>
                    <div class="tab-pane" id="tab_default_2">
                        <p><?php echo t("Graduated first-class from one of the best Culinary university from France, I had the the privilege of working in a two Michelin star restaurant Py-r in Toulouse, France as a Sous Chef before heading back to Pakistan. Specializing in unique and fusion high-end cuisine with a wealth of experience working at the highest level with the best chefs in the world, and with exotic and the finest ingredients while using old and new techniques to bring food to the highest level of culinary artistry. I want to bring unique experiences, flavors to the people at affordable for them to enjoy") ?></p>
                    </div>
                    <div class="tab-pane" id="tab_default_3">

                    </div>
                    <div class="tab-pane" id="tab_default_4">

                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="col-sm-4">
        <div class="flex flex--justify-center flex--dir-col">
            <div class="z-elevation-2 has-padding">
                <div class="is-heading is-heading-inner">How many people you are subscribing for?</div>
                <div class="input-group space-top--xs">
                    <span class="input-group-btn">
                        <button type="button" class="btn btn-default btn-number" disabled="disabled" data-type="minus" data-field="quant[1]">
                            <span class="glyphicon glyphicon-minus"></span>
                        </button>
                    </span>
                    <input type="text" name="quant[1]" class="form-control input-number" value="1" min="1" max="100">
                    <span class="input-group-btn">
                        <button type="button" class="btn btn-default btn-number" data-type="plus" data-field="quant[1]">
                            <span class="glyphicon glyphicon-plus"></span>
                        </button>
                    </span>
                </div>
                <br />
                <div class="form-group">
                    <label for="" class="is-heading-inner"><?php echo t("Select Your Delivery Time Slot") ?></label>
                    <select name="meal_slot" id="meal_slot" class="form-control">
                        <option value="slot1"><?php echo t("Slot A-12:30 PM - 1:30 PM") ?></option>
                        <option value="slot2"><?php echo t("Slot A-1:00 PM - 2:00 PM") ?></option>
                        <option value="slot3"><?php echo t("Slot A-1:30 PM - 2:30 PM") ?></option>
                    </select>
                </div>
            </div>
                                        <br />
            <div class="has-padding z-elevation-2" id="meal-order-detail">
                <div class="flex flex--justify-between">
                    <h2 class="is-heading"><?php echo t("Price Per Meal") ?></h2>
                    <h3 class="is-heading">Rs 470</h3>
                </div>
                <div class="flex flex--justify-between">
                    <h2 class="is-heading"><?php echo t("Total Meals") ?></h2>
                    <h3 class="is-heading"><?php echo t("x5") ?></h3>
                </div>
                <hr />
                <div class="flex flex--justify-between">
                    <h2 class="is-heading" ><?php echo t("Total Meal Plan") ?></h2>
                    <h3 class="is-heading" id="meal-order-price-1"><?php echo $total_meal_plan_price ?></h3>
                </div>
                <div class="flex flex--justify-between">
                    <h2 class="is-heading"><?php echo t("Amount") ?></h2>
                    <h3 class="is-heading"></h3>
                </div>
                <div class="flex flex--justify-between">
                    <h2 class="is-heading"><?php echo t("Promo Code") ?></h2>
                    <h3 class="is-heading"><?php echo t("Rs 0") ?></h3>
                </div>
                <hr />
                <div class="flex flex--justify-between">
                    <h2 class="is-heading"><?php echo t("Order Total") ?></h2>
                    <h3 class="is-heading">
                        <span id="meal-order-price">
                            <?php echo t('Rs ') . $total_meal_plan_price ?>
                        </span>
                    </h3>
                </div>
                <br />
                <div class="form-group">
                    <label for="" class="font-bold"><?php echo t("Select Your Delivery Address") ?></label>
                    <input type="text" class="form-control">
                </div>
                <br />
                <div class="form-group">
                    <label for="" class="font-bold is-heading"><?php echo t("Payment Option") ?></label>
                    <div class="radio">
                        <label><input type="radio" name="optradio" checked><?php echo t("Cash On Delivery") ?></label>
                    </div>
                    <div class="radio">
                        <label><input type="radio" name="optradio" checked>Option 1</label>
                    </div>
                </div>
            </div>
        </div>
        <br />
        <button type="button" id="btnOrderMeal" class="btnn btn--raised btn--block"><?php echo t("Place Order") ?></button>
    </div>
</div>

<br>
<br>
<br>

<script>
    // Before Document Load!
    document.querySelector('#total-meal-plan-price').innerHTML = "<?php echo $total_meal_plan_price ?>";
    document.querySelector('#total-meal-plan-price-1').innerHTML = "<?php echo $total_meal_plan_price ?>";
    document.querySelector('#each-meal-plan-price').innerHTML = "<?php echo $total_meal_plan_price / 5 ?>";
</script>