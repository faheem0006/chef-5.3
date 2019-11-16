<div class="flex flex--align-center flex--justify-between">
  <h1 class="is-title-lg"><?php echo t("Your Meal Plan Dishes..") ?></h1>
  <a href="<?php echo websiteUrl(); ?>/merchant/AddOnMealPlan" class="btnn btn--raised"><?php echo t("Creat Meal Plan") ?></a>
</div>

<hr />
<br />

<div class="uk-width-1">
  <a href="<?php echo Yii::app()->request->baseUrl; ?>/merchant/AddOnItem/Do/Add" class="uk-button"><i class="fa fa-plus"></i> <?php echo Yii::t("default", "Add New") ?></a>
  <a href="<?php echo Yii::app()->request->baseUrl; ?>/merchant/AddOnItem" class="uk-button"><i class="fa fa-list"></i> <?php echo Yii::t("default", "List") ?></a>
</div>

<form id="frm_table_list" method="POST">
  <input type="hidden" name="action" id="action" value="AddOnItemList">
  <input type="hidden" name="tbl" id="tbl" value="subcategory_item">
  <input type="hidden" name="clear_tbl" id="clear_tbl" value="clear_tbl">
  <input type="hidden" name="whereid" id="whereid" value="sub_item_id">
  <input type="hidden" name="slug" id="slug" value="AddOnItem/Do/Add">
  <table id="table_list" class="uk-table uk-table-hover uk-table-striped uk-table-condensed">
    <!--<caption>Merchant List</caption>-->
    <thead>
      <tr>
        <th><input type="checkbox" id="chk_all" class="chk_all"></th>
        <th><?php echo Yii::t('default', "Dish Name") ?></th>
        <th><?php echo Yii::t('default', "Dish Description") ?></th>
        <th><?php echo Yii::t('default', "Dish Category") ?></th>
        <th><?php echo Yii::t('default', "Price") ?></th>
        <th><?php echo Yii::t('default', "Dish Picture") ?></th>
        <th><?php echo Yii::t('default', "Date") ?></th>
      </tr>
    </thead>
    <tbody>
    </tbody>
  </table>
  <div class="clear"></div>
</form>