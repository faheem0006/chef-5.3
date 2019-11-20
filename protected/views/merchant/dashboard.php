<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous" />
<link href="https://fonts.googleapis.com/css?family=Lato:400,700&display=swap" rel="stylesheet">

<!-- Latest compiled and minified CSS -->
<style>
    body {
        font-family: 'Lato' !important;
    }

    .is-name {
        font-size: 3rem;
    }

    .container-fluid .row,
    .container .row {
        background: #fff
    }

    .row {
        margin: 1rem 0 2rem 0
    }

    .is-title {
        margin-bottom: .75rem;
        font-family: 'Lato';
        font-size: 2rem !important
    }

    .is-link,
    .uk-badge-success {
        font-family: 'Lato';
        font-size: 1.5rem !important;
    }


    #theRowStats>div>div {
        padding: 1rem;
        text-align: center;
        min-height: 150px;
    }

    #theRowHelp {
        margin: 0 1rem;
        padding: 0 2rem;
        border: 2px solid #eee;
        border-radius: 4px
    }

    #theRowHelp>div {
        min-height: 160px;
    }

    #theRowLast3 {
        border: 2px solid #eee;
        border-radius: 4px;
        margin: 0 1rem;
    }

    .flex.has-childs {
        padding: 1rem .5rem
    }

    .flex.has-childs>div {
        padding: .5rem;
        margin: 0 .25rem
    }

    .has-br {
        border-right: 1px solid #777
    }

    .has-lr {
        border-left: 1px solid #777
    }

    .has-bt {
        border-top: 1px solid #777
    }

    .has-bb {
        border-bottom: 1px solid #777
    }

    .is-title {
        font-weight: 600;
        font-size: 2rem
    }

    .bg-mangolia {
        background: #f8fafc
    }

    #dashboard-row-rating {
        padding: 1rem
    }

    #theRowWelcome {
        min-height: 100px;
        border: 2px solid #eee;
        border-radius: 4px;
        margin: 0 1rem
    }

    #theRowRating {}

    #theRowRating .top-bar {
        font-weight: 700;
        font-size: 1.5rem;
        text-align: center;
        line-height: 40px;
        height: 40px
    }

    #theRowRating>div {
        height: 160px;
    }

    .merchant-status, .uk-badge-success {
        background-color: #d0f8ce;
        padding: 1rem .75rem;
        border-radius: 4px;
        color: green;
        font-family: 'Lato', serif;
        font-size: 1.25rem !important;
        font-weight: 700;
    }

    #theRowRating>div>div {
        height: 100%;
        padding: 1rem 1.5rem;
        border-radius: 4px
    }

    #theRowLast {
        margin: 0 1rem;
        border: 2px solid #eee
    }

    .progress--circle {
        position: relative;
        display: inline-block;
        margin: 1rem;
        width: 100px;
        height: 100px;
        border-radius: 50%;
        background-color: #ddd;
    }

    .progress--circle::before {
        content: '';
        position: absolute;
        top: 5px;
        left: 5px;
        width: 90px;
        height: 90px;
        border-radius: 50%;
        background-color: white;
    }

    .progress--circle::after {
        content: '';
        display: inline-block;
        width: 100%;
        height: 100%;
        border-radius: 50%;
        background-color: orangered;
    }

    .link-no-hover:hover {
        text-decoration: none;
        color: currentColor
    }

    .progress__number {
        position: absolute;
        top: 50%;
        width: 100%;
        line-height: 1;
        margin-top: -0.75rem;
        text-align: center;
        font-size: 1.5rem;
        color: #777;
    }

    .progress--pie::before {
        display: none;
        /* Get rid of white circle for "pie chart style" meter */
    }

    .progress--pie .progress__number {
        color: white;
        text-shadow: rgba(0, 0, 0, 0.35) 1px 1px 1px;
    }

    .has-padding {
        padding: 1rem !important
    }

    .btnn {
        font-size: 1.25rem;
        margin-left: .5rem
    }

    #theRowLast2 {
        border: 2px solid #eee;
        border-radius: 4px;
        margin: 0 1rem;
        padding: 1rem
    }
</style>

<?php if (Yii::app()->functions->hasMerchantAccess("DashBoard")) : ?>
    <?php $merchant_info = (array) Yii::app()->functions->getMerchantInfo(); ?>
    <?php $merchant_user_type = $_SESSION['kr_merchant_user_type']; ?>

    <div class="container-fluid">

        <div class="row" id="theRowStats">
            <div class="col-md-3 text-center">
                <div class="z-elevation-2 flex flex--justify-center flex--align-center flex--dir-col hoverable rounded">
                    <div class="is-title font-bold"><?php echo t("Kitchen Status") ?></div>
                    <div>
                        <div class="merchant-status"></div>
                        <span style="visibility: hidden; height: 0; width: 0">
                            <?php
                                echo CHtml::checkBox('is_ready', false, array(
                                    'class' => "icheck is_ready"
                                ))
                                ?>
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-md-3 text-center">
                <div class="z-elevation-2 flex flex--align-center flex--justify-center hoverable rounded">
                    <div title="Click to View History" class="text-dark link-no-hover">
                        <?php if ($merchant_info[0]->is_commission == 2) : ?>
                            <div class="flex flex--align-center flex--justify-between">
                                <div class="is-heading font-bold space-right--sm"><?php echo t("Your Earnings") ?></div>
                                <div id="chef-commision" class="merchant_total_balance merchant-status commission_loader"></div>
                            </div>
                        <?php endif; ?>
                        <div class="flex flex--justify-between flex--align-center space-top--sm">
                            <div class="is-heading font-bold space-right"><?php echo t("Your Payments") ?></div>
                            <div class="uk-badge uk-badge-success">0</div>
                        </div>
                        <br />
                        <a href="<?php echo Yii::app()->request->baseUrl . '/merchant/earnings' ?>" class="font-bold is-link"><?php echo t("View Orders") ?></a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 text-center">
                <div class="z-elevation-2 hoverable rounded">
                    <div class="is-title font-bold"><?php echo t("A La Carte") ?></div>
                    <a href="<?php echo Yii::app()->request->baseUrl; ?>/merchant/FoodItem" class="text-dark link-no-hover" title="View Dishes">
                        <div class="flex flex--justify-around">
                            <div class="font-bold"><?php echo t("Total Open Orders") ?></div>
                            <span class="font-bold is-stat"><?php echo current(FunctionsV3::getMerchantOrderCount()) ?></span>
                        </div>
                        <div class="flex flex--justify-around space-top--xs">
                            <div class="font-bold"><?php echo t("Total Sale Dishes") . '&nbsp;&nbsp;&nbsp;&nbsp;' ?></div>
                            <span class="font-bold is-stat"><?php echo current(FunctionsV3::getMerchantDishes($merchant_info[0]->merchant_id)[0]) ?></span>
                        </div>
                        <div class="flex flex--justify-around space-top--xs">
                            <div class="font-bold"><?php echo t("Your Next Order") . '&nbsp;&nbsp;&nbsp;&nbsp;' ?></div>
                            <span class="font-bold is-stat">-</span>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-3 text-center">
                <div class="z-elevation-2 text-center hoverable rounded">
                    <div>
                        <div class="is-title font-bold"><?php echo t("Meal Plans") ?></div>
                        <div class="flex flex--justify-around">
                            <div class="font-bold space-bottom--xs"><?php echo t("Your Meal Orders") ?></div>
                            <span class="is-stat font-bold">0</span>
                        </div>
                        <div class="flex flex--justify-around">
                            <div class="font-bold space-bottom--xs"><?php echo t("Your Meal Plans") ?></div>
                            <span class="font-bold is-stat"><?php echo '&nbsp;&nbsp;&nbsp;'.current(FunctionsV3::getMealPlanCount($merchant_info[0]->merchant_id)) ?></span>
                        </div>
                        <div class="flex flex--justify-around">
                            <div class="font-bold space-bottom--xs"><?php echo t("Next Meal Due") ?></div>
                            <span class="font-bold is-stat">&nbsp;&nbsp;-</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <br />

        <div class="row flex flex--align-center" id="theRowWelcome">
            <div class="col-md-8">
                <div class="is-title-lg is-name"><?php echo t("Welcome, ") . ' ' . $merchant_info[0]->contact_name . '.' ?></div>
            </div>
            <div class="col-md-4 text-right">
                <a href="<?php echo Yii::app()->request->baseUrl; ?>/merchant/merchant" class="btnn btn--raised waves-effect waves-light">
                    <?php echo t("Profile Info") ?>
                </a>
                <a href="<?php echo Yii::app()->request->baseUrl; ?>/merchant/settings" class="btnn btn--raised waves-effect waves-light">
                    <?php echo t("Profile Settings") ?>
                </a>
            </div>
        </div>

        <br />

        <div class="row" id="theRowRating">
            <div class="col-md-4">
                <div class="z-elevation-2 flex hoverable flex--justify-between flex--align-center">
                    <div>
                        <span><?php echo t("Your Chef Quality Score") ?></span>
                        <div class="space-bottom--sm"><?php echo t("Last 6 Months") ?></div>
                        <a href="<?php echo Yii::app()->request->baseUrl . '/merchant/review' ?>" class="btnn btn--raised"><?php echo t('View Reviews') ?></a>
                    </div>
                    <div>
                        <div class="progress--circle progress--25">
                            <div class="progress__number"><?php echo t('1%') ?></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="z-elevation-2 hoverable">
                    <div class="top-bar">
                        <?php echo t("Your Dish Average Rating (last 6 months)") ?>
                    </div>
                    <div class="flex space-top--sm flex--align-center flex--justify-around">
                        <div class="text-center">
                            <div class="is-heading"><?php echo t("A La Carte") ?></div>
                            <div class="space-top--sm font-bold"><?php echo t("N/A") ?></div>
                            <div class="space-top--sm">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                        </div>
                        <div class="text-center">
                            <div class="is-heading"><?php echo t("Daily Specials") ?></div>
                            <div class="space-top--sm font-bold"><?php echo t("N/A") ?></div>
                            <div class="space-top--sm">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                        </div>
                        <div class="text-center">
                            <div class="is-heading"><?php echo t("Meal Plan") ?></div>
                            <div class="space-top--sm font-bold"><?php echo t("N/A") ?></div>
                            <div class="space-top--sm">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="z-elevation-2 hoverable">
                    <div class="top-bar">
                        <?php echo t("Your Performance Average (last 6 months)") ?>
                    </div>
                    <div class="flex flex--justify-even space-top">
                        <div class="is-heading text-center">
                            <div><?php echo t("Complaints") ?></div>
                            <div class="font-bold space-top--sm">0</div>
                        </div>
                        <div class="text-center is-heading">
                            <div><?php echo t("Cancellation Rate") ?></div>
                            <div class="font-bold space-top--sm">%</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <br />

        <div class="row" id="theRowHelp">
            <!-- Left -->
            <div class="col-md-4 flex flex--align-center flex--justify-center flex--dir-col">
                <div>
                    <div class="is-title"><?php echo t("Need Help?") ?></div>
                    <div class="is-title"><?php echo t("Visit Our Chef Help Center") ?></div>
                    <button type="button" class="btnn btn--raised waves-effect"><?php echo t("Visit Help Center") ?></button>
                </div>
            </div>
            <!-- Right -->
            <div class="col-md-8">

                <h3 class="is-heading is-heading-lg"><?php echo t("Your Dish Updates") ?></h3>
                <div class="has-padding">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs space-bottom" role="tablist">
                        <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab"><?php echo t("Dish Assesment Feedback") ?></a></li>
                        <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab"><?php echo t("Dish Ready For Review") ?> <span class="badge">0</span> </a></li>
                        <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab"><?php echo t("Incomplete Dish Listing") ?> <span class="badge">0</span></a></li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="home">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th><?php echo t("Date Listed") ?></th>
                                        <th><?php echo t("Dish Name") ?></th>
                                        <th><?php echo t("Price") ?></th>
                                        <th><?php echo t("Servings") ?></th>
                                        <th><?php echo t("Feedback") ?></th>
                                        <th><?php echo t("Standing") ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td colspan="6">
                                            <h4>You have no dishes with reviews</h4>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="profile">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th><?php echo t("Date Listed") ?></th>
                                        <th><?php echo t("Dish Name") ?></th>
                                        <th><?php echo t("Price") ?></th>
                                        <th><?php echo t("Servings") ?></th>
                                        <th><?php echo t("Action") ?></th>
                                    </tr>
                                </thead>
                                <tbody class="has-padding">
                                    <tr>
                                        <td colspan="5">
                                            <h4>You have no dishes for review</h4>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="messages">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th><?php echo t("Date Listed") ?></th>
                                        <th><?php echo t("Dish Name") ?></th>
                                        <th><?php echo t("Price") ?></th>
                                        <th><?php echo t("Servings") ?></th>
                                        <th><?php echo t("Missing Information") ?></th>
                                        <th><?php echo t("Action") ?></th>
                                    </tr>
                                </thead>
                                <tbody class="has-padding">
                                    <tr>
                                        <td colspan="6">
                                            <h4>You have no incomplete Dishes</h4>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
                <!-- End Tabs -->
                <br />
            </div>
        </div>

        <br />

        <div class="row" id="theRowLast">
            <div class="col-md-12">
                <h3 class="is-heading space-bottom is-heading-lg"><?php echo t("Your Open Orders") ?></h3>
                <div class="has-padding">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs space-bottom" role="tablist">
                        <li role="presentation" class="active"><a href="#open-orders" aria-controls="open-orders" role="tab" data-toggle="tab"><?php echo t("A La Carte") ?></a></li>
                        <li role="presentation"><a href="#meal-plans" aria-controls="meal-plans" role="tab" data-toggle="tab"><?php echo t("Meal Plan") ?></a></li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="open-orders">
                            <form id="frm_table_list" method="POST" class="report uk-form uk-form-horizontal merchant-dashboard">
                                <input type="hidden" name="action" id="action" value="recentOrder">
                                <input type="hidden" name="tbl" id="tbl" value="item" />
                                <table id="table_list" class="uk-table uk-table-hover uk-table-striped uk-table-condensed">
                                    <!--<caption>Merchant List</caption>-->
                                    <thead>
                                        <tr>
                                            <th width="2%"><?php echo Yii::t('default', "Order Number") ?></th>
                                            <th width="6%"><?php echo Yii::t('default', "Name") ?></th>
                                            <th width="6%"><?php echo Yii::t('default', "Contact#") ?></th>
                                            <th width="3%"><?php echo Yii::t('default', "Dishes") ?></th>
                                            <th width="3%"><?php echo Yii::t('default', "TransType") ?></th>
                                            <th width="3%"><?php echo Yii::t('default', "Payment Type") ?></th>
                                            <th width="3%"><?php echo Yii::t('default', "Order Total") ?></th>
                                            <th width="3%"><?php echo Yii::t('default', "Tax") ?></th>
                                            <th width="3%"><?php echo Yii::t('default', "Total W/Tax") ?></th>
                                            <th width="3%"><?php echo Yii::t('default', "Order Status") ?></th>
                                            <th width="3%"><?php echo Yii::t('default', "Platform") ?></th>
                                            <th width="3%"><?php echo Yii::t('default', "Pickup Date") ?></th>
                                            <th width="3%"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                                <div class="clear"></div>
                            </form>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="meal-plans">
                            <form id="frm_table_list_meals" method="POST" class="report uk-form uk-form-horizontal merchant-dashboard">
                                <table id="table_list" class="uk-table uk-table-hover uk-table-striped uk-table-condensed">
                                    <!--<caption>Merchant List</caption>-->
                                    <thead>
                                        <tr>
                                            <th width="2%"><?php echo Yii::t('default', "Order Number") ?></th>
                                            <th width="6%"><?php echo Yii::t('default', "Name") ?></th>
                                            <th width="6%"><?php echo Yii::t('default', "Contact#") ?></th>
                                            <th width="3%"><?php echo Yii::t('default', "Meal Name") ?></th>
                                            <th width="3%"><?php echo Yii::t('default', "No. of Meals") ?></th>
                                            <th width="3%"><?php echo Yii::t('default', "Payment Type") ?></th>
                                            <th width="3%"><?php echo Yii::t('default', "Total") ?></th>
                                            <th width="3%"><?php echo Yii::t('default', "Price Per Meal") ?></th>
                                            <th width="3%"><?php echo Yii::t('default', "Order Status") ?></th>
                                            <th width="3%"><?php echo Yii::t('default', "Platform") ?></th>
                                            <th width="3%"><?php echo Yii::t('default', "Pickup Date") ?></th>
                                            <th width="3%"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                                <div class="clear"></div>
                            </form>
                        </div>
                    </div>

                </div>
                <!-- End Tabs -->
                <br />
            </div>
        </div>

        <br />

        <div class="row" id="theRowLast3">
            <div class="col-md-12">
                <h3 class="is-heading is-heading-lg space-bottom"><?php echo t("Your Cancelled Orders") ?></h3>
                <div class="request_cancel_order_wrap">
                    <h3 class="is-title"><?php echo t("New request cancel order") ?></h3>
                    <form id="frm_table_list2" method="POST" class="report uk-form uk-form-horizontal merchant-dashboard">
                        <input type="hidden" name="action" id="action" value="requestCancelOrderList">
                        <input type="hidden" name="tbl" id="tbl" value="item">
                        <table id="table_list2" class="uk-table uk-table-hover uk-table-striped uk-table-condensed">
                            <thead>
                                <tr>
                                    <th width="2%"><?php echo Yii::t('default', "Ref#") ?></th>
                                    <th width="6%"><?php echo Yii::t('default', "Name") ?></th>
                                    <th width="6%"><?php echo Yii::t('default', "Contact#") ?></th>
                                    <th width="3%"><?php echo Yii::t('default', "Item") ?></th>
                                    <th width="3%"><?php echo Yii::t('default', "TransType") ?></th>
                                    <th width="3%"><?php echo Yii::t('default', "Payment Type") ?></th>
                                    <th width="3%"><?php echo Yii::t('default', "Total") ?></th>
                                    <th width="3%"><?php echo Yii::t('default', "Tax") ?></th>
                                    <th width="3%"><?php echo Yii::t('default', "Total W/Tax") ?></th>
                                    <th width="3%"><?php echo Yii::t('default', "Status") ?></th>
                                    <th width="3%"><?php echo Yii::t('default', "Platform") ?></th>
                                    <th width="3%"><?php echo Yii::t('default', "Date") ?></th>
                                    <th width="3%"></th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </form>
                </div>
                <!-- End Tabs -->
                <br />
            </div>
        </div>


        <br />

        <div class="row" id="theRowLast2">
            <div class="col-md-12">
                <div class="is-heading is-heading-lg space-bottom--sm"><?php echo t("Your Top Dishes") ?></div>
                <form id="frm_table_list" method="POST">
                    <input type="hidden" name="action" id="action" value="FoodItemList">
                    <input type="hidden" name="tbl" id="tbl" value="item">
                    <input type="hidden" name="clear_tbl" id="clear_tbl" value="clear_tbl">
                    <input type="hidden" name="whereid" id="whereid" value="item_id">
                    <input type="hidden" name="slug" id="slug" value="FoodItem/Do/Add">
                    <table id="table_list" class="uk-table uk-table-hover uk-table-striped uk-table-condensed">
                        <caption>Merchant List</caption>
                        <thead>
                            <tr>
                                <th width="2%"><input type="checkbox" id="chk_all" class="chk_all"></th>
                                <th width="5%"><?php echo Yii::t('default', "Name") ?></th>
                                <th width="4%"><?php echo Yii::t('default', "Description") ?></th>
                                <th width="4%"><?php echo Yii::t('default', "Categories") ?></th>
                                <th width="4%"><?php echo Yii::t('default', "Price") ?></th>
                                <th width="4%"><?php echo Yii::t('default', "Photos") ?></th>
                                <th width="4%"><?php echo Yii::t('default', "Item Not Available") ?></th>
                                <th width="4%"><?php echo Yii::t('default', "Date") ?></th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                    <div class="clear"></div>
                </form>
                <br />
                <a href="<?php echo Yii::app()->request->baseUrl . '/merchant/FoodItem' ?>" class="btnn btn--raised space-bottom--sm"><?php echo t("View All Dishes") ?></a>
            </div>
        </div>

        <br />

        <div id="total_sales_chart" class="chart"></div>
        <div id="total_sales_chart_by_item" class="chart"></div>

    </div>



    <br />

<?php endif; ?>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script>
    document.getElementById('chef-profile').style.maxWidth = '1200px';
</script>