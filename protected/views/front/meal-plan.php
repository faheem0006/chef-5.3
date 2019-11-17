<div id="search-listview" class="col-md-6 border infinite-item free-wrap">
    <div class="z-elevation-2 flex is-rounded has-padding food-chef">

        <?php $chef_pic = FunctionsV3::getMerchantLogo($merchant_id) ?>
        <div class="meal-photo-container">
            <img src="<?php echo $chef_pic ?>" />
        </div>

        <div class="flex flex-1 text-left flex--justify-between flex--align-center flex--inner space-top--xs">
            <div>
                <span class="is-heading is-title-md"><?php echo clearString($meal_data['title']) ?></span>
                <div class="is-heading-inner">
                    <?php echo t("By ") ?>
                    <span class="orange-text"><?php echo FunctionsV3::getMerchantByName($meal_data['merchant_id'])[0]['contact_name'] ?></span>
                    <div class="flex space-top--xs">
                        <div class="food-chef-rating">98%</div>
                        <div class="flex-1 text-left food-chef-rating-text">
                            <div class="font-bold">Excellent Chef</div>
                            <div>100 Ratings</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex flex--inner flex--justify-center flex--align-center flex--dir-col">
            <div class="orange-text">
                <strong><?php echo t("Rs") ?></strong>
                <span class="is-heading "><?php echo t('750') ?></span>
                <strong><?php echo t("Per Meal") ?></strong>
            </div>
            <a href="<?php echo Yii::app()->createUrl("/store/show-plan?id=".$meal_data['id']) ?>" class="btnn btn--outlined btn--orange waves-effect waves-light btn--block space-top">
                <?php echo t("View Details") ?>
            </a>
        </div>

    </div>
    <!--inner-->
</div>