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

<div id="profile-container" class="flex flex--align-center flex--justify-around" style="background-image: url(<?php echo assetsURL() . '/images/b-1.jpg' ?>)">
    <div id="profile-photo" style="background-image: url(<?php echo assetsURL() . '/images/slider.jpg' ?>)"></div>
    <div id="profile-info" class="flex flex--justify-between flex--align-center">
        <div>
            <div class="is-title-lg text-light">
                <?php echo $the_plan['title'] ?>
            </div>
            <div class="is-title-lg text-light">
                <?php echo t("By") ?> <?php echo current(FunctionsV3::getMerchantByName($merchant_id))['contact_name'] ?>
            </div>
            <div class="flex flex--align-center">
                <div class="box" style="height: 40px; width: 40px; background: green; color: #fff; text-align: center; line-height: 40px">50%</div>
                <div class="space-left--sm text-light font-bold"><?php echo t("Good Chef") ?></div>
            </div>
        </div>
        <div>
            <div class="text-light is-title-lg">
                <?php echo t("Rs: ") ?>
                <span id="total-meal-plan-price"></span>
                <br />
                <div>For 5 days</div>
                <div class="orange-text">Delivery Included</div>

                <hr />
                <?php echo t("Rs: ") ?>
                <span id="each-meal-plan-price"></span>
                <br />
                <div>Per Meal</div>
            </div>
        </div>
    </div>
</div>

<br /><br /><br /><br />

<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="flex" style="background: #eee; padding: 0">
                <button type="button" class="btnn btn--block text-center" style="border-radius: 0; background: green; margin: 0; color: #fff">Menu</button>
                <button type="button" class="btnn btn--block text-center" style="border-radius: 0; margin: 0">Reviews</button>
                <button type="button" class="btnn btn--block text-center" style="border-radius: 0; margin: 0">Learn More</button>
            </div>
            <br />
            <?php $jj = 0; ?>
            <?php $kk = 0; ?>
            <?php $total_meal_plan_price = 0; ?>
            <?php foreach ($ii as $i) : ?>
                <?php $meal_plan_dish = FunctionsV3::getAddonItem($i) ?>
                <div class="flex z-elevation-2 is-rounded flex--align-center flex--justify-between" style="height: 150px; padding: 1rem; margin-bottom: 1rem">
                    <div>
                        <div style="height: 100px; width: 100px">
                            <img src="<?php echo websiteUrl() . '/upload/' . $meal_plan_dish['photo'] ?>" alt="" style="height: 100%; border-radius: 4px; width: 100%" />
                        </div>
                        <div class="text-center"><?php echo $days[$jj] ?></div>
                    </div>
                    <div style="flex: 1; padding-left: 2rem">
                        <h3 class="is-title"><?php echo $meal_plan_dish['sub_item_name'] ?></h3>
                        <h4><?php echo $meal_plan_dish['item_description'] ?></h4>
                    </div>
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
                <?php $jj++; ?>
                <?php $kk++; ?>
            <?php endforeach; ?>
        </div>
        <div class="col-md-4 z-elevation-3 has-padding is-rounded">
            <div class="flex flex--justify-center flex--dir-col has-padding">
                <div>
                    <div class="is-title-md">How many people you are subscribing for?</div>
                    <div class="input-group">
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
                </div>
                <div class="text-left flex flex--justify-between is-title-lg">
                    <span>
                        <?php echo t("Order Total") ?>
                    </span>
                    <span>
                        Rs
                        <span id="meal-order-price">
                            <?php echo $total_meal_plan_price ?>
                        </span>
                    </span>
                </div>
            </div>

            <button type="button" id="btnOrderMeal" class="btnn btn--raised"><?php echo t("Place Order") ?></button>


            <hr />

        </div>
        <!--menu-right-content-->
    </div>
</div>

<br>
<br>
<br>

<script>
    // Before Document Load!
    document.querySelector('#total-meal-plan-price').innerHTML = "<?php echo $total_meal_plan_price ?>";
    document.querySelector('#each-meal-plan-price').innerHTML = "<?php echo $total_meal_plan_price/5 ?>";
</script>