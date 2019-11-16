<?php if (is_array($menu) && count($menu) >= 1) : ?>
   <?php foreach ($menu as $val) : //dump($val);
         ?>
      <div class="row menu-2 border">

         <?php $x = 0 ?>
         <?php if (is_array($val['item']) && count($val['item']) >= 1) : ?>
            <?php foreach ($val['item'] as $val_item) : ?>

               <?php
                           $atts = '';
                           /*if ( $val_item['single_item']==2){
	  $atts.='data-price="'.$val_item['single_details']['price'].'"';
	  $atts.=" ";
	  $atts.='data-size="'.$val_item['single_details']['size'].'"';
}*/
                           if ($val_item['single_item'] == 2) {
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

               <div class="col-md-4 border food-col">

                  <!-- New Card -->
                  <div class="ft-recipe z-elevation-3">
                     <div class="ft-recipe__thumb">
                        <img src="<?php echo FunctionsV3::getFoodDefaultImage($val_item['photo'], false) ?>" alt="Tricabiz Homechef" />
                     </div>
                     <div class="ft-recipe__content">
                        <header class="content__header">
                           <div class="row-wrapper">
                              <h2 class="recipe-title">
                                 <?php echo qTranslate($val_item['item_name'], 'item_name', $val_item) ?><br />
                                 <span class="recipe-price"><?php echo FunctionsV3::getItemFirstPrice($val_item['prices']) ?></span>
                              	 <br />
				 <span class="recipe-price"><?php echo $menu[0]['category_name'] ?></span>
			   </h2>
                           </div>
                           <ul class="recipe-details">
                              <li class="recipe-details-item">
                                 <i class="fa fa-user icon"></i><br />
				 <?php echo current(FunctionsV3::getMerchantByName($merchant_id)[0]) ?>
                              </li>
                              <li class="recipe-details-item">
                                 <i class="fa fa-thumbs-o-up icon"></i><br />
                                 <?php echo Yii::app()->functions->getRatings($merchant_id)['votes'] . ' Ratings' ?>
                              </li>
                              <li class="recipe-details-item">
                                 <i class="fa fa-star icon"></i><br />
                                 <?php echo Yii::app()->functions->getRatings($merchant_id)['votes'] . ' Reviews' ?>
                              </li>
                           </ul>
                        </header>
                        <p class="description"><?php echo qTranslate($val_item['item_description'], 'item_description', $val_item) ?></p>
                        <footer class="content__footer">
                           <a href="javascript:;" class="dsktop btnn btn--block btn--raised inline rounded3 menu-item <?php echo $val_item['not_available'] == 2 ? "item_not_available" : '' ?>" rel="<?php echo $val_item['item_id'] ?>" data-single="<?php echo $val_item['single_item'] ?>" <?php echo $atts; ?> data-category_id="<?php echo $val['category_id'] ?>">
                              <?php echo t('Add to Cart') ?>
                           </a>
                        </footer>
                     </div>
                  </div>
                  <!-- End Card -->
               </div>
               <!--col-->
            <?php endforeach; ?>
         <?php endif; ?>


   <?php endforeach; ?>
   
   </div>
      <!--row-->

<?php else : ?>
   <p class="text-danger"><?php echo t("This Chef has not published their menu yet.") ?></p>
<?php endif; ?>