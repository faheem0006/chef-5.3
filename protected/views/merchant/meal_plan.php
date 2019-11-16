<?php if (Yii::app()->functions->hasMerchantAccess("DashBoard")) : ?>
    <div class="container z-elevation-2">
        <div class="row">
            <div class="col-md-12">
                <h1><?php echo t("Add a Meal Plan Dish") ?></h1>
                <hr />
                
                <div class="form-group">
                    <label for=""><?php echo t("Dish Name") ?></label>
                    <input type="text" class="form-control" required />
                </div>
                
                <div class="form-group">
                    <label for=""><?php echo t("Dish Description") ?></label>
                    <input type="text" class="form-control" required />
                </div>

            </div>
        </div>
    </div>
<?php else : ?>
    <h2><?php echo Yii::t("default", "Welcome") ?></h2>
<?php endif; ?>