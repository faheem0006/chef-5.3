<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<style>
    th.ui-datepicker-week-end,
    td.ui-datepicker-week-end {
        display: none;
    }
</style>

<div class="flex flex--align-center flex--justify-between">
    <h1 class="is-title-lg text-center"><?php echo t("Add a New Meal Plan Below") ?></h1>
    <a href="<?php echo websiteUrl(); ?>/merchant/MealPlanListing" class="btnn btn--raised"><?php echo t("Meal Plan Listing") ?></a>
</div>

<br />

<div id="error-message-wrapper"></div>

<form class="uk-form uk-form-horizontal forms" id="forms">

    <?php echo CHtml::hiddenField('action', 'addOnMealPlan'); ?>
    <?php echo CHtml::hiddenField('id', isset($_GET['id']) ? $_GET['id'] : ""); ?>

    <?php
    if (isset($_GET['id'])) {
        if (!$data = Yii::app()->functions->getAddonItem2($_GET['id'])) {
            echo "<div class=\"uk-alert uk-alert-danger\">" .
                Yii::t("default", "Sorry but we cannot find what your are looking for.") . "</div>";
            return;
        }
    }

    $all_meal_dishes = FunctionsV3::getAddonItemList(1);

    $ii = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'];

    $meal_dish_names = [];
    $meal_dish_keys = [];

    foreach ($all_meal_dishes as $meal) {
        $meal_dish_names[] = $meal['sub_item_name'];
        $meal_dish_keys[] = $meal['sub_item_id'];
        $meal_dish_price[] = $meal['price'];
    }

    ?>

    <div class="uk-grid">

        <div class="uk-width-full">

            <div class="flex flex--justify-between space-bottom flex--align-center">
                <div class="flex-1">
                    <span class="is-heading"><?php echo t("Week") ?></span>
                    <input type="text" id="week-picker" class="uk-form-width-large"/>
                </div>
                <div class="space-left--xs">
                    <label class="is-heading space-right"><?php echo Yii::t("default", "Title") ?></label>
                    <input type="text" id="title" name="title" class="uk-form-width-medium" />
                </div>
                <div class="space-left--xs">
                    <span class="is-heading space-right"><?php echo t("Availability") ?></span>
                    <select id="avail" name="avail" class="uk-form-select">
                        <option value="Lunch"><?php echo t("Lunch") ?></option>
                    </select>
                </div>
            </div>

            <?php foreach ($ii as $i) : ?>
                <div class="uk-form-row">
                    <label class="uk-form-label is-title-md"><?php echo Yii::t("default", $i) ?></label>
                    <select name="meal_days_<?php echo $i ?>" class="uk-form-width-large" id="meal_days_<?php echo $i ?>">
                        <?php foreach (array_combine($meal_dish_names, $meal_dish_keys) as $name => $key) : ?>
                            <option value="<?php echo $key ?>" name="meal_days_dish"><?php echo $name ?></option>
                        <?php endforeach; ?>
                    </select>
                    <input type="hidden" id="meal_day_<?php echo $i ?>" name="meal_day_<?php echo $i ?>" />
                </div>
            <?php endforeach; ?>

        </div>

    </div>
    <!--END UK-GRID-->

    <div class="spacer"></div>

    <div class="uk-form-row">
        <label class="uk-form-label"></label>
        <input type="submit" name="submit" id="submit" value="<?php echo Yii::t("default", "Save new meal plan") ?>" class="btnn btn--raised" />
    </div>

</form>

<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.14/jquery-ui.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>


<script>
    $(function() {
        var startDate,
            endDate;

        var selectCurrentWeek = function() {
            window.setTimeout(function() {
                $('.week-picker').find('.ui-datepicker-current-day a').addClass('ui-state-active')
            }, 1);
        }

        $('#week-picker').datepicker({
            showOtherMonths: false,
            selectOtherMonths: true,
            firstDay: 1,
            dateFormat: 'yy-mm-dd',
            autoclose: true,
            minDate: new Date(),
            onSelect: function(dateText, inst) {
                var date = $(this).datepicker('getDate');
                startDate = new Date(date.getFullYear(), date.getMonth(), date.getDate() - date.getDay() + 1);
                endDate = new Date(date.getFullYear(), date.getMonth(), date.getDate() - date.getDay() + 5);
                var dateFormat = inst.settings.dateFormat || $.datepicker._defaults.dateFormat;
                $('#startDate').text($.datepicker.formatDate(dateFormat, startDate, inst.settings));
                $('#endDate').text($.datepicker.formatDate(dateFormat, endDate, inst.settings));
                selectCurrentWeek();

                var monday = new Date(date.getFullYear(), date.getMonth(), date.getDate() - date.getDay() + 1),
                    tuesday = new Date(date.getFullYear(), date.getMonth(), date.getDate() - date.getDay() + 2),
                    wednesday = new Date(date.getFullYear(), date.getMonth(), date.getDate() - date.getDay() + 3),
                    thursday = new Date(date.getFullYear(), date.getMonth(), date.getDate() - date.getDay() + 4),
                    friday = new Date(date.getFullYear(), date.getMonth(), date.getDate() - date.getDay() + 5),
                    today = new Date();

                $('#meal_day_Monday').val($.datepicker.formatDate(dateFormat, monday, inst.settings));
                $('#meal_day_Tuesday').val($.datepicker.formatDate(dateFormat, tuesday, inst.settings));
                $('#meal_day_Wednesday').val($.datepicker.formatDate(dateFormat, wednesday, inst.settings));
                $('#meal_day_Thursday').val($.datepicker.formatDate(dateFormat, thursday, inst.settings));
                $('#meal_day_Friday').val($.datepicker.formatDate(dateFormat, friday, inst.settings));

                $('#title').val() ?
                    $('#submit').attr('disabled', false) :
                    $('#submit').attr('disabled', true);

                $('#week-picker').val('From: ' + $.datepicker.formatDate(dateFormat, startDate, inst.settings) + ', To: ' + 
                $.datepicker.formatDate(dateFormat, endDate, inst.settings));
                
            },
            beforeShowDay: function(date) {
                var cssClass = '';
                if (date >= startDate && date <= endDate)
                    cssClass = 'ui-datepicker-current-day';
                return [true, cssClass];
            },
            onChangeMonthYear: function(year, month, inst) {
                selectCurrentWeek();
            }
        });

        $('.week-picker .ui-datepicker-calendar tr').on('mousemove', function() {
            $(this).find('td a').addClass('ui-state-hover');
        });
        $('.week-picker .ui-datepicker-calendar tr').on('mouseleave', function() {
            $(this).find('td a').removeClass('ui-state-hover');
        });
    });

    $('#title').on('blur', function() {
        if ($(this).val().trim() && $('#meal_day_Monday').val()) {
            $('#submit').attr('disabled', false);
        } else {
            $('#submit').attr('disabled', true);
        }
    });

    $('#meal-week-range').on('focus', function() {
        $(this).parent().append(`<div class="week-picker"></div>`);
    });

    $('#meal-week-range').on('blur', function() {
        $(this).parent().remove(`<div class="week-picker"></div>`);
    });
</script>