<style>
    .card,
    .container__sources div,
    .container__build div {
        line-height: 2;
        background: #42bd41;
        padding: 1.2rem 1rem;
        border-radius: 0 1rem 0 1rem;
        box-shadow: 0px 1px 5px 0px rgba(0, 0, 0, 0.2), 0px 2px 2px 0px rgba(0, 0, 0, 0.14), 0px 3px 1px -2px rgba(0, 0, 0, 0.12);
    }

    .container-chef-design {
        display: flex;
        background-color: #f3f3f3;
        flex-direction: column;
        align-items: center;
        text-align: center;
    }

    .container-chef-design svg {
        height: 5rem;
    }

    .container-chef-design svg line {
        stroke: green;
        stroke-width: 3px;
        stroke-linecap: round;
        stroke-dasharray: 2px 20px;
        animation: animateline 5s linear both infinite;
    }

    h3 {
        font-size: 1.35rem;
        color: #fff;
        line-height: 14px;
        margin-bottom: 5px;
        font-weight: 700
    }

    p {
        color: #fff;
        font-weight: 500
    }

    .container__sources {
        display: flex;
        border-radius: 8px;
        padding: 1.5rem;
        position: relative;
    }

    .container__sources div {
        text-align: left;
        margin: 0 1rem;
        position: relative;
    }

    .container__build {
        border-radius: 8px;
        position: relative;
    }

    .container__build div {
        margin: 2rem 0;
    }

    .container__build div svg {
        width: 4rem;
        height: auto;
        fill: #5f39dd;
    }

    .container__deploy {
        padding: 1.5rem;
        border-radius: 8px;
        background: #42bd41;
        position: relative;
    }

    .chef-design-image {
        position: absolute;
        height: 60px;
        width: 60px;
        top: -30px;
        left: 0;
        padding: .75rem;
        border-radius: 10px;
        background: #42bd41;
    }

    .chef-design-image-center {
        left: 50%;
        top: -15px;
        transform: translateX(-50%)
    }

    @media (max-width: 992px) {
        .container__sources {
            flex-direction: column;
        }

        .container__sources div {
            margin: 1.5rem 0;
        }

        .chef-design-image {
            height: 44px;
            width: 44px
        }

        .chef-design-image-center {
            top: -5px
        }
    }

    @-moz-keyframes animateline {
        from {
            stroke-dashoffset: 0;
        }

        to {
            stroke-dashoffset: -5rem;
        }
    }

    @-webkit-keyframes animateline {
        from {
            stroke-dashoffset: 0;
        }

        to {
            stroke-dashoffset: -5rem;
        }
    }

    @-o-keyframes animateline {
        from {
            stroke-dashoffset: 0;
        }

        to {
            stroke-dashoffset: -5rem;
        }
    }

    @keyframes animateline {
        from {
            stroke-dashoffset: 0;
        }

        to {
            stroke-dashoffset: -5rem;
        }
    }

    /*
    *   Slider Chefs Quotes
    *
    */
    .tcb-quote-carousel {
        padding-top: 30px;
        margin-top: 40px;
    }

    .tcb-quote-carousel .quote {
        color: green;
        text-align: center;
        margin-bottom: 30px;
    }

    .tcb-quote-carousel .carousel {
        padding-bottom: 60px;
    }

    .tcb-quote-carousel .carousel .carousel-indicators>li {
        background-color: green;
        border: none
    }

    .tcb-quote-carousel blockquote {
        margin-top: 15px;
        text-align: center;
        border: none;
    }

    .tcb-quote-carousel .profile-circle {
        width: 100px;
        height: 100px;
        margin: 0 auto;
        overflow: hidden;
        border-radius: 100px;
    }

    .carousel-fade .carousel-inner .item {
        transition-property: opacity;
    }
</style>

<div id="navbar-offset"></div>

<div class="container-fluid flex flex--align-center flex--justify-center" id="becomechefhero" style="background-image: url(<?php echo assetsURL() . '/images/slider.jpg' ?>)">
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-light"><?php echo t("Reach foodies across your City!") ?></h1>
            <h4 class="text-light"><?php echo t("Join the largest marketplace for homemade meals online.") ?></h4>
            <br />
            <?php if (Yii::app()->functions->hasMerchantAccess("DashBoard")) : ?>
                <a href="<?php echo websiteUrl() . '/merchant/dashboard' ?>" class="btnn btn--raised waves-effect waves-light"><?php echo t("click to edit profile") ?></a>
            <?php else : ?>
                <a href="<?php echo websiteUrl() . '/store/merchantsignup?do=step1' ?>" class="btnn btn--raised waves-effect waves-light"><?php echo t("click to sign up") ?></a>
                <a href="<?php echo websiteUrl() . '/merchant/login' ?>" class="btnn btn--raised waves-effect waves-light"><?php echo t("login") ?></a>
            <?php endif; ?>
        </div>
    </div>
</div>

<div class="container work center has-padding-y">
    <h1><?php echo t("Why work with us") ?></h1>
    <h5><?php echo t("We give you all the support to make it easy for you to earn money") ?></h5>
    <br />
    <div class="row">
        <div class="col-md-4 text-center">
            <img src="<?php echo assetsURL() . '/images/calender.png' ?>" alt="">
            <h5 class="space-top--sm">Make money on a flexible schedule</h5>
        </div>
        <div class="col-md-4 text-center">
            <img src="<?php echo assetsURL() . '/images/rider.png' ?>" alt="">
            <h5 class="space-top--sm">Get a hassle free order and delivery management system</h5>
        </div>
        <div class="col-md-4 text-center">
            <img src="<?php echo assetsURL() . '/images/rocket.png' ?>" alt="">
            <h5 class="space-top--sm">Join a growing marketplace with access to thousands of foodies</h5>
        </div>
    </div>
</div>
<!-- in a wrapping section include different containers for each step of the flow: data sources, build, deploy -->
<section class="container-chef-design has-padding-y">
    <h1><?php echo t("How it Works?") ?></h1>
    <h4><?php echo t("Easy steps to get started to earn you some cash") ?></h4>
    <br /><br />
    <div class="container__sources">

        <div class="sources--cms">
            <img src="<?php echo assetsURL() . '/images/1.png' ?>" alt="" class="chef-design-image" />
            <h3><?php echo t("List your dishes") ?></h3>
            <p><?php echo t("You get to specify the dish, price and prep time you need") ?></p>
        </div>

        <div class="sources--markdown">
            <img src="<?php echo assetsURL() . '/images/2.png' ?>" alt="" class="chef-design-image" />
            <h3><?php echo t("Get order notifications") ?></h3>
            <p><?php echo t("Notifications are sent via email and SMS") ?></p>
        </div>

        <div class="sources--data">
            <img src="<?php echo assetsURL() . '/images/3.png' ?>" alt="" class="chef-design-image" />
            <h3><?php echo t("Prepare the meal") ?></h3>
            <p><?php echo t("Your chance to show your skill and love") ?></p>
        </div>

    </div>

    <!-- include a simple line to divide the container, and animate it to show a connection between the different containers  -->
    <svg viewbox="0 0 10 100">
        <line x1="5" x2="5" y1="0" y2="50" />
    </svg>


    <!-- in the build container show two cards, atop of one another and the first of one showing an SVG icon -->
    <div class="container__build">
        <div class="build--powered">
            <img src="<?php echo assetsURL() . '/images/4.png' ?>" alt="" class="chef-design-image chef-design-image-center" />
            <h3><?php echo t("Rider will pickup at scheduled time") ?></h3>
            <span class="text-light"><?php echo t("We provide guidelines on how to best pack your food") ?></span>
        </div>
    </div>

    <!-- repeat the svg line to connect the second and third containers as well -->
    <svg viewbox="0 0 10 100">
        <line x1="5" x2="5" y1="0" y2="100" />
    </svg>

    <div class="container__build">
        <div class="build--powered">
            <img src="<?php echo assetsURL() . '/images/5.png' ?>" alt="" class="chef-design-image chef-design-image-center" />
            <h3><?php echo t("Get paid") ?></h3>
            <span class="text-light"><?php echo t("Payments are made weekly") ?></span>
        </div>
    </div>
</section>

<div class="container center has-padding-y">
    <h1><?php echo t("Meet Our Chefs!") ?></h1>
    <div><?php echo t("Here are some of our most popular Chefs!") ?></div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="tcb-quote-carousel waves-effect is-rounded z-elevation-2">
                <div class="quote"><i class=" fa fa-quote-left fa-4x"></i></div>
                <div class="carousel slide" id="fade-quote-carousel">
                    <!-- Carousel indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#fade-quote-carousel" data-slide-to="0" class="active"></li>
                        <li data-target="#fade-quote-carousel" data-slide-to="1"></li>
                    </ol>
                    <!-- Carousel items -->
                    <div class="carousel-inner">
                        <div class="item active">
                            <div class="profile-circle">
                                <img class="img-responsive" src="<?php echo assetsURL() . '/images/cook.png' ?>" alt="">
                            </div>
                            <blockquote>
                                <p class="text-dark"><?php echo t("We serve authentic desi food with home blended spices to satisfy all your food cravings!") ?></p>
                                <cite>
                                    <?php echo t(" - Aswand") ?>
                                </cite>
                            </blockquote>
                        </div>
                        <div class="item">
                            <div class="profile-circle"><img class="img-responsive" src="<?php echo assetsURL() . '/images/avatar.jpg' ?>" alt=""></div>
                            <blockquote>
                                <p class="text-dark"><?php echo t("It's simple: we list your menu online, help you process orders, - in a heartbeat!") ?></p>
                                <cite>
                                    <?php echo t(" - FoodHub") ?>
                                </cite>
                            </blockquote>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>