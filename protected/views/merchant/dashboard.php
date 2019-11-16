<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous" />
<style>
    .container-fluid .row,
    .container .row {
        background: #fff
    }

    .row {
        margin: 1rem 0 2rem 0
    }

    #theDashboardRow1>div {
        padding: 1rem;
        text-align: center;
        min-height: 300px;
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

    #theRow2 {
        min-height: 100px;
        text-align: center
    }

    #theRow3 {
        text-align: center;
        padding: 1rem 0;
        border-radius: 0 1rem 0 1rem
    }

    #theRow4>div {
        padding: 1.5rem
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
</style>

<?php if (Yii::app()->functions->hasMerchantAccess("DashBoard")) : ?>
    <?php $merchant_info = (array) Yii::app()->functions->getMerchantInfo(); ?>
    <?php $merchant_user_type = $_SESSION['kr_merchant_user_type']; ?>

    <div class="flex flex--align-center flex--justify-end">
        <div>
            <a href="<?php echo Yii::app()->request->baseUrl; ?>/merchant/merchant" class="btnn btn--raised waves-effect waves-light">
                <?php echo t("Edit Info") ?>
            </a>
            <a href="<?php echo Yii::app()->request->baseUrl; ?>/merchant/settings" class="btnn btn--raised waves-effect waves-light">
                <?php echo t("Edit Settings") ?>
            </a>
        </div>
    </div>

    <br />

    <div class="z-elevation-2 flex flex--justify-between flex--align-center has-padding">
        <h1 class="is-title-lg"><?php echo t("Welcome, ") ?> <?php echo $merchant_info[0]->contact_name ?>
            <span class="space-left">
                <?php
                    echo CHtml::checkBox('is_ready', false, array(
                        'class' => "icheck is_ready"
                    ))
                    ?>
                <a href="javascript:;" data-uk-tooltip="{pos:'bottom-left'}" title="<?php echo Yii::t("default", "Check this box to published your merchant, if this box is not check your merchant will not show on search result.") ?>"><i class="fa fa-info-circle"></i>
                </a>
            </span>
        </h1>
        <div class="flex flex--align-center">
            <span class="font-bold space-right"><?php echo t("Your Chef Average Score: ") ?></span>
            <div class="progress--circle progress--25">
                <div class="progress__number">0%</div>
            </div>
        </div>
    </div>

    <br />

    <div class="uk-grid" id="dashboard-row-1">
        <div class="uk-width-1-4 text-center">
            <div class="z-elevation-2 hoverable flex flex--align-center flex--justify-center rounded flex--dir-col">
                <h2 class="is-title"><?php echo t("Kitchen Status") ?></h2>
                <div class="merchant-status"></div>
            </div>
        </div>
        <div class="uk-width-1-4 text-center">
            <div class="z-elevation-2 hoverable flex flex--align-center flex--justify-center rounded flex--dir-col">
                <?php if ($merchant_info[0]->is_commission == 2) : ?>
                    <h2 class="is-title"><?php echo t("Your balance") ?></h2>
                    <div id="chef-commision" class="merchant_total_balance merchant-status commission_loader"></div>
                <?php endif; ?>
            </div>
        </div>
        <div class="uk-width-1-4 text-center">
            <div class="z-elevation-2 hoverable flex flex--align-center flex--justify-center rounded flex--dir-col">
                <h2 class="is-title"><?php echo t("A La Carte") ?></h2>
                <span class="font-bold is-stat"><?php echo current(FunctionsV3::getMerchantDishes($merchant_info[0]->merchant_id)[0]) . ' dishes' ?></span>
                <a href="<?php echo Yii::app()->request->baseUrl; ?>/merchant/FoodItem" class="is-link space-top--sm"><?php echo t("View all Dishes") ?></a>
            </div>
        </div>
        <div class="uk-width-1-4 text-center">
            <div class="z-elevation-2 hoverable flex flex--align-center flex--justify-center rounded flex--dir-col">
                <h2 class="is-title"><?php echo t("Meal Plans") ?></h2>
                <span class="font-bold is-stat"><?php echo current(FunctionsV3::getAddonItemCount($merchant_info[0]->merchant_id)) ?> Meal Plans</span>
                <a href="<?php echo Yii::app()->request->baseUrl; ?>/merchant/addon-item" class="is-link space-top--sm"><?php echo t("View all Meal Plans") ?></a>
            </div>
        </div>
    </div>

    <br />

    <div class="z-elevation-3 has-padding">
        <form id="frm_table_list" method="POST" class="report uk-form uk-form-horizontal merchant-dashboard">
            <h3 class="is-title"><?php echo Yii::t("default", "Your Open Orders, ") ?>
                <?php
                    /*$date= date('F d, Y');
$date=Yii::app()->functions->translateDate($date);
echo $date;*/
                    echo FormatDateTime(date('c'), false);
                    ?>
            </h3>

            <input type="hidden" name="action" id="action" value="recentOrder">
            <input type="hidden" name="tbl" id="tbl" value="item">
            <table id="table_list" class="uk-table uk-table-hover uk-table-striped uk-table-condensed">
                <!--<caption>Merchant List</caption>-->
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
            <div class="clear"></div>
        </form>

        <hr />

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
    </div>

    <br />

    <div class="row flex z-elevation-2 is-rounded" id="theRow4">
        <!-- Left -->
        <div class="col-md-4">
            <h3>Need Help?</h3>
            <h3>Visit Our Chef Help Center</h3>
            <button type="button" class="btnn btn--raised waves-effect">Visit Help Center</button>
        </div>
        <!-- Right -->
        <div class="col-md-8">

            <h3>Your Dish Updates</h3>
            <div>
                <!-- Nav tabs -->
                <ul class="nav nav-tabs space-bottom" role="tablist">
                    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Dish Assesment Feedback</a></li>
                    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Dish Ready For Review <span class="badge">0</span> </a></li>
                    <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Incomplete Dish Listing <span class="badge">0</span></a></li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="home">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Date Listed</th>
                                    <th>Dish Name</th>
                                    <th>Price</th>
                                    <th>Servings</th>
                                    <th>Feedback</th>
                                    <th>Standing</th>
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
                                    <th>Date Listed</th>
                                    <th>Dish Name</th>
                                    <th>Price</th>
                                    <th>Servings</th>
                                    <th>Action</th>
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
                                    <th>Date Listed</th>
                                    <th>Dish Name</th>
                                    <th>Price</th>
                                    <th>Servings</th>
                                    <th>Missing Information</th>
                                    <th>Action</th>
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
        </div>
    </div>

    <h1 class="is-title-lg"><?php echo t("Your Sales Chart") ?></h1>
    <div id="total_sales_chart" class="chart"></div>
    <h1 class="is-title-lg"><?php echo t("Your Sales Chart by Items") ?></h1>
    <div id="total_sales_chart_by_item" class="chart"></div>

    <br />



    <br />

<?php endif; ?>

<script>
    document.getElementById('chef-profile').style.maxWidth = '1200px';
</script>