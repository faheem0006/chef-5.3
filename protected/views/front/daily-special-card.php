<?php
$atts = '';
/*if ( $val_item['single_item']==2){
	  $atts.='data-price="'.$val_item['single_details']['price'].'"';
	  $atts.=" ";
	  $atts.='data-size="'.$val_item['single_details']['size'].'"';
}*/
if (isset($val_item) && $val_item['single_item'] == 2) {
    $atts .= 'data-price="' . $val_item['single_details']['price'] . '"';
    $atts .= " ";
    $atts .= 'data-size="' . $val_item['single_details']['size'] . '"';
    $atts .= " ";
    if (isset($val_item['single_details']['size_id'])) {
        $atts .= 'data-size_id="' . $val_item['single_details']['size_id'] . '"';
    }
    $atts .= " ";
    $atts .= 'data-discount="' . $val_item['discount'] . '"';
}
?>

<div id="search-listview" class="col-md-4 border infinite-item">
    <div class="z-elevation-2 is-rounded food-chef">
        
        <?php if ($ds['is_featured'] == 2) : ?>
            <div class="ribbon"><span><?php echo t("Sponsored") ?></span></div>
        <?php endif; ?>

        <div class="food-photo-container">
            <img src="upload/<?php echo $ds['photo']; ?>">
        </div>

        <div class="flex text-left flex--justify-between flex--align-center flex--inner space-top--xs">
            <div>
                <span class="is-heading is-title-md"><?php echo clearString($ds['item_name']) ?></span>
                <div></div>
                <div class="is-heading-inner">
                    <?php echo t("By ") ?>
                    <div>
                        <span class="orange-text"><?php echo FunctionsV3::getMerchantByName($ds['merchant_id'])[0]['contact_name'] ?></span>
                        <i class="fa fa-star font-bold text-yellow"></i>
                        <span class="space-left--xs text-yellow"><?php echo t("5.0") ?>
                            <span>(2)</span>
                        </span>
                    </div>
                </div>
            </div>
            <div class="orange-text">
                <strong><?php echo t("Rs") ?></strong>
                <span class="is-heading "><?php echo current(json_decode($ds['price']))  ?></span>
            </div>
        </div>

        <div class="flex flex--inner flex--justify-between flex--align-center">
            <div class="food-chef-rating">98%</div>
            <div class="flex-1 text-left food-chef-rating-text">
                <div class="font-bold"><?php echo t("Good Chef") ?></div>
                <div><?php echo current(Yii::app()->functions->getRatings($ds['merchant_id'])) . ' Ratings' ?></div>
            </div>
        </div>

        <div class="flex food-chef-stats flex--justify-start flex--align-baseline flex--inner">
            <?php if (!empty($ds['item_serve'])) : ?>
                <div>
                    <div class="food-chef-stat flex flex--align-center flex--justify-center"><?php echo $ds['item_serve'] ?></div>
                    <span><?php echo t("Serves") ?></span>
                </div>
            <?php endif; ?>
            <div class="space-left--sm text-center">
                <div class="food-chef-stat flex flex--align-center flex--justify-center"><i class="fa fa-cutlery"></i></div>
                <span><?php echo FunctionsV3::getCategoryName((int) json_decode($ds['category'])[0])[0]['category_name']; ?></span>
            </div>
            <?php if (!empty($ds['item_mt'])) : ?>
                <div class="space-left--sm text-center">
                    <div class="food-chef-stat flex flex--align-center flex--justify-center"><i class="fa fa-ra"></i></div>
                    <span><?php echo $ds['item_mt'] ?></span>
                </div>
            <?php endif; ?>
        </div>

        <div class="food-chef-delivery text-center">
            <?php echo t("Earliest Delivery: Tomorrow at 2:00 PM") ?>
        </div>

        <br />

        <?php if (isset($lazyItemFlag)) : ?>
            <a href="<?php echo Yii::app()->createUrl("/menu-" . trim(current(FunctionsV3::getSlugByMerchant($dish_data['merchant_id'])))) ?>" class="btnn btn--raised waves-effect food-chef-footer waves-light btn--block space-top">
                <?php echo t("Add to Cart") ?>
            </a>
        <?php else : ?>
            <a href="javascript:;" class="dsktop btnn btn--block food-chef-footer btn--raised inline rounded3 ds-item" rel="<?php echo $ds['item_id'] ?>" <?php echo $atts; ?> data-category_id="<?php echo (int) $ds['category'] ?>" id="btnAddToCart">
                <?php echo t('Add to Cartt') ?>
            </a>
        <?php endif; ?>
    </div>
    <!--inner-->
</div>