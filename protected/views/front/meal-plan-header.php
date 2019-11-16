<div class="col-md-8">
    <div class="profile clearfix">
        <div class="image">
            <img src="https://lorempixel.com/700/300/nature/2/" class="img-cover">
        </div>
        <div class="user clearfix">
            <div class="avatar">
                <img src="https://bootdey.com/img/Content/user-453533-fdadfd.png" class="img-thumbnail img-profile">
            </div>
            <h2><?php echo current(FunctionsV3::getMerchantByName($plan['merchant_id']))['contact_name']; ?></h2>
        </div>
        <div class="info">
            <p><span class="fa fa-globe"></span> <span class="title">Address:</span> St. Revutskogo, Kiev, Ukraine</p>
            <p><span class="fa fa-comment"></span> <span class="title">Date of birth:</span> 14.02.1989</p>
        </div>
    </div>
</div>