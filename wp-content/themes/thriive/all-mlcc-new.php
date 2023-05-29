<?php /* Template Name: All MLCC New online consultation page */ 
// include_once get_stylesheet_directory().'/header1.php'; 
get_header();
global $wp;
$current_url = add_query_arg( array(), $wp->request ); ?>
<style type="text/css">
    body{
        font-family: Roboto, Open San ,sans-serif !important;
    }
    .h1, .h2, .h3, .h4, .h5, .h6, h1, h2, h3, h4, h5, h6 {
       font-family: Roboto, Open San ,sans-serif !important; 
    }
    .w_we_assure{
        background-color: #f1f1f147;
        margin-top: 2%;
    }
    .f_12 {
        font-size: 12px;
    }

    .f_8 {
        font-size: 8px;
    }

    .f_10 {
        font-size: 10px;
    }

    .text_red {
        color: red;
    }

    .text_line {
        text-decoration: line-through;
        color: #c5c5c5;
    }

    .popular_btn {
        background-color: #7949ec;
        color: #fff;
        border-top-left-radius: 5px;
        border-top-right-radius: 5px;
        margin-left: -14px;
        margin-right: -14px;
        /*        margin-top: 6px;*/
    }

    .text_box {
        background-color: #fff;
        border: 1px solid #4f1955;
        padding: 10px 5px;
        /*        margin: 20px;*/
        /*        height: 125px;*/
        margin-bottom: 10%;
        border-radius: 10px;
       /* box-shadow: 1px 1px 4px #4f1955;*/
    }

    .head_text {
        padding: 0px 5px;
    }

    .start_btn {
        margin-top: -16%;
        margin-bottom: 5%;
    }

    .c_purple {
        color: #500055;
    }

    .c_red {
        color: #d80000;
    }

    .c_black {
        color: #000 !important;
    }

    .box_in {
        border: 1px solid #ada9a9;
        background-color: #fff;
        box-shadow: 1px 1px 5px #ada9a9;
        border-radius: 10px;
    }

    .mb_2 {
        margin-bottom: 2%;
    }

    .mt_2 {
        margin-top: 2%;
    }

    hr {
        margin-top: 0px;
        margin-bottom: 10px;
        border: 0;
        border-top: 1px solid #add78d;
    }

    .thriive_btn {
        text-align: center;
        color: #fff;
        background-color: #500055;
        border-radius: 10px;
        padding: 3px 10px;
        font-weight: 600;
        font-size: 15px;
    }
    .rating_text{
        font-size: 24px;
        text-align: center;
		margin-top: -15px;
    }
    .title{
        line-height: 22px;
        font-weight: 600;
        font-family: Roboto, Open San ,sans-serif !important;
    }

    @media screen and (max-width: 600px) {
        /* Stepper Titles */
        .title,.md-step-title {
            line-height: 16px;
            font-size: 15px !important;
            font-weight: 600;
            font-family: Roboto, Open San ,sans-serif !important;
        }
        .f20 {
            font-size: 20px !important;
        }
        .assure{
            margin: 2% 2%;
        }
        
        .rating_text{
            font-size: 16px;
            text-align: center;
            font-weight: 600;
			color: #000;
			margin-top: -15px;
        }
        .w_we_assure{
            margin-top: 5%;
        }
        .plan_consult{
            margin-bottom: 0px;
            font-size: 13px;
            font-weight: 500;
        }
        .main_heading{
            font-size: 16px !important;
            font-weight: 600;
        }
    }
    
    .assure {
            margin: 2% 0%;
        }
/* -------------------------------------------------------------------------
  VERTICAL STEPPERS
-------------------------------------------------------------------------- */

    /* Steps */
    .step {
        position: relative;
        min-height: 1em;
        color: #000;
    }

    .step+.step {
        margin-top: 1.5em
    }

    .step>div:first-child {
        position: static;
        height: 0;
    }

    .step>div:not(:first-child) {
        margin-left: 1.5em;
        padding-left: 1em;
    }

    .step.step-active {
        color: #4285f4
    }

    .step.step-active .circle {
        background-color: #4285f4;
    }

    /* Circle */
    .circle {
        background: #fff;
        position: relative;
        width: 2em;
        height: 1.6em;
        line-height: 2em;
        border-radius: 100%;
        color: #fff;
        text-align: center;
        box-shadow: 0 0 0 3px #fff;
    }

    /* Vertical Line */
    .circle:after {
        content: ' ';
        position: absolute;
        display: block;
        top: 1px;
        right: 50%;
        bottom: 1px;
        left: 50%;
        height: 100%;
        width: 1px;
        transform: scale(1, 2);
        transform-origin: 50% -100%;
        background-color: rgba(0, 0, 0, 0.25);
        z-index: -1;
    }

    .step:last-child .circle:after {
        display: none
    }

    .caption {
        font-size: 0.8em;
    }
    .step_icon {
        margin-top: -7px;
    }
    .md-stepper-horizontal {
        display: table;
        width: 100%;
        margin: 0 auto;
        background-color: #FFFFFF;
/*        box-shadow: 0 3px 8px -6px rgba(0, 0, 0, .50);*/
    }
    .md-stepper-horizontal .md-step {
        display: table-cell;
        position: relative;
        padding: 24px;
    }
    .md-stepper-horizontal .md-step:hover,
    .md-stepper-horizontal .md-step:active {
        background-color: rgba(0, 0, 0, 0.04);
    }

    .md-stepper-horizontal .md-step:active {
        border-radius: 15% / 75%;
    }
    .md-stepper-horizontal .md-step:first-child:active {
        border-top-left-radius: 0;
        border-bottom-left-radius: 0;
    }
    .md-stepper-horizontal .md-step:last-child:active {
        border-top-right-radius: 0;
        border-bottom-right-radius: 0;
    }
    .md-stepper-horizontal .md-step:hover .md-step-circle {
        background-color: #757575;
    }
    .md-stepper-horizontal .md-step:first-child .md-step-bar-left,
    .md-stepper-horizontal .md-step:last-child .md-step-bar-right {
        display: none;
    }
    .md-stepper-horizontal .md-step .md-step-circle {
        width: 30px;
        height: 30px;
        margin: 0 auto;
        background-color: #500055;
        border-radius: 50%;
        text-align: center;
        line-height: 30px;
        font-size: 16px;
        font-weight: 600;
        color: #FFFFFF;
    }
    .md-stepper-horizontal.green .md-step.active .md-step-circle {
        background-color: #00AE4D;
    }
    .md-stepper-horizontal.orange .md-step.active .md-step-circle {
        background-color: #F96302;
    }
    .md-stepper-horizontal .md-step.active .md-step-circle {
        background-color: rgb(33, 150, 243);
    }

    .md-stepper-horizontal .md-step.done .md-step-circle:before {
        font-family: 'FontAwesome';
        font-weight: 100;
        content: "\f00c";
    }

    .md-stepper-horizontal .md-step.done .md-step-circle *,
    .md-stepper-horizontal .md-step.editable .md-step-circle * {
        display: none;
    }

    .md-stepper-horizontal .md-step.editable .md-step-circle {
        -moz-transform: scaleX(-1);
        -o-transform: scaleX(-1);
        -webkit-transform: scaleX(-1);
        transform: scaleX(-1);
    }

    .md-stepper-horizontal .md-step.editable .md-step-circle:before {
        font-family: 'FontAwesome';
        font-weight: 100;
        content: "\f040";
    }

    .md-stepper-horizontal .md-step .md-step-title {
        margin-top: 16px;
        font-size: 16px;
        font-weight: 600;
    }

    .md-stepper-horizontal .md-step .md-step-title,
    .md-stepper-horizontal .md-step .md-step-optional {
        text-align: center;
        color: rgb(80 0 85);
    }

    .md-stepper-horizontal .md-step.active .md-step-title {
        font-weight: 600;
        color: rgba(0, 0, 0, .87);
    }

    .md-stepper-horizontal .md-step.active.done .md-step-title,
    .md-stepper-horizontal .md-step.active.editable .md-step-title {
        font-weight: 600;
    }

    .md-stepper-horizontal .md-step .md-step-optional {
        font-size: 12px;
    }

    .md-stepper-horizontal .md-step.active .md-step-optional {
        color: rgba(0, 0, 0, .54);
    }

    .md-stepper-horizontal .md-step .md-step-bar-left,
    .md-stepper-horizontal .md-step .md-step-bar-right {
        position: absolute;
        top: 36px;
        height: 1px;
        border-top: 1px solid #DDDDDD;
    }

    .md-stepper-horizontal .md-step .md-step-bar-right {
        right: 0;
        left: 50%;
        margin-left: 20px;
    }

    .md-stepper-horizontal .md-step .md-step-bar-left {
        left: 0;
        right: 50%;
        margin-right: 20px;
    }
    h4{
        font-size: 19px;
    }
    .main_heading{
        font-size: 22px !important;
        font-weight: 600;
		margin-bottom: 10px;
    }
    .plan_consult{
        margin-bottom: 0px;
        font-size: 13px;
        font-weight: 500;
    }
	
	.f36{
       font-size: 36px;
		}
   .f18{
       font-size: 18px;
       /*padding-top: 8px;*/
   }
</style>
<section class="container">
        <div class="row">
            <div class="">
                <img class="img-responsive" src="/wp-content/uploads/2020/07/banner.jpg" alt="">
            </div>
        </div>
    </section>
    <div style="clear: both"></div>
    <section class="container">
        <div class="row">
            <div class="col-md-12 mt_2 mb_2">
                <h2 class="c_purple text-left main_heading"> <i><img src="/wp-content/uploads/2020/07/icon.png" alt="" style="height:24px;"></i> Select the plan and consult now</h2>
            </div>
        </div>
    </section>
    <div style="clear: both"></div>
    <!-- desktop -->
    <section class="hidden-xs">
        <div class="container">
            <div class="row" style="">
                <div class="box_c">
                    <div class="col-xs-12 col-md-4">
                        <div class="text_box">
                            <div class="head_text">
                                <a href="<?php echo home_url('talk-to-best-meditation-online'); ?>">
                                    <div class="row">
                                        <div class="col-md-3 col-xs-4">
                                            <img src="/wp-content/uploads/2020/07/Icons_Icon-1.png" class="img-responsive" alt="">
                                        </div>
                                        <div class="col-md-9 col-xs-8">
                                            <h4 class="text-left c_purple" style="margin-bottom: 0px;"><strong>Meditation Coach</strong></h4>
                                            <p>Learn to meditate at home</p>
                                            <hr>
                                        </div>
                                        <div style="clear: both"></div>
                                        <div class="col-md-4 col-xs-3" style="padding-right: 5px;">
                                            <p class="text-center plan_consult" style="margin-bottom: 0px;">1 Session</p>
                                            <p class="c_red text-center">&#8377; 299</p>
                                        </div>
                                        <div class="col-md-4 col-xs-3" style="padding-left: 5px;padding-right: 5px;">
                                            <p class="text-center plan_consult" style="margin-bottom: 0px;">2 Sessions</p>
                                            <p class="c_red text-center">&#8377; 899</p>
                                        </div>
                                        <div class="col-md-4 col-xs-3" style="padding-left: 5px">
                                            <p class="text-center plan_consult" style="margin-bottom: 0px;">5 Sessions</p>
                                            <p class="c_red text-center">&#8377; 2,299</p>
                                        </div>
                                        <div style="clear: both"></div>
                                        <div class="col-md-3 col-xs-3"></div>
                                        <div class="col-md-6 col-xs-3 text-center">
                                            <button class="btn thriive_btn">Consult Now</button>
                                        </div>
                                        <div class="col-md-3 col-xs-3"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-md-4">
                        <div class="text_box">
                            <div class="head_text">
                                <a href="<?php echo home_url('talk-to-best-life-coach-online'); ?>">
                                    <div class="row">
                                        <div class="col-md-3 col-xs-4">
                                            <img src="/wp-content/uploads/2020/07/Icons_Icon-2.png" class="img-responsive" alt="">
                                        </div>
                                        <div class="col-md-9 col-xs-8">
                                            <h4 class="text-left c_purple" style="margin-bottom: 0px;"><strong>Stress Coach</strong></h4>
                                            <p>Manage your stress effectively</p>
                                            <hr>
                                        </div>
                                        <div style="clear: both"></div>
                                        <div class="col-md-4 col-xs-3" style="padding-right: 5px;">
                                            <p class="text-center plan_consult" style="margin-bottom: 0px;">1 Session</p>
                                            <p class="c_red text-center">&#8377; 299</p>
                                        </div>
                                        <div class="col-md-4 col-xs-3" style="padding-left: 5px;padding-right: 5px;">
                                            <p class="text-center plan_consult" style="margin-bottom: 0px;">2 Sessions</p>
                                            <p class="c_red text-center">&#8377; 899</p>
                                        </div>
                                        <div class="col-md-4 col-xs-3" style="padding-left: 5px">
                                            <p class="text-center plan_consult" style="margin-bottom: 0px;">5 Sessions</p>
                                            <p class="c_red text-center">&#8377; 2,299</p>
                                        </div>
                                        <div style="clear: both"></div>
                                        <div class="col-md-3 col-xs-3"></div>
                                        <div class="col-md-6 col-xs-3 text-center">
                                            <button class="btn thriive_btn">Consult Now</button>
                                        </div>
                                        <div class="col-md-3 col-xs-3"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-md-4">
                        <div class="text_box">
                            <div class="head_text">
                                <a href="<?php echo home_url('talk-to-best-counselor-online'); ?>">
                                    <div class="row">
                                        <div class="col-md-3 col-xs-4">
                                            <img src="/wp-content/uploads/2020/07/Icons_Icon-3.png" class="img-responsive" alt="">
                                        </div>
                                        <div class="col-md-9 col-xs-8">
                                            <h4 class="text-left c_purple" style="margin-bottom: 0px;"><strong>Mental Health Therapy</strong></h4>
                                            <p>Overcome anxiety & depression</p>
                                            <hr>
                                        </div>
                                        <div style="clear: both"></div>
                                        <div class="col-md-4 col-xs-3" style="padding-right: 5px;">
                                            <p class="text-center plan_consult" style="margin-bottom: 0px;">1 Session</p>
                                            <p class="c_red text-center">&#8377; 499</p>
                                        </div>
                                        <div class="col-md-4 col-xs-3" style="padding-left: 5px;padding-right: 5px;">
                                            <p class="text-center plan_consult" style="margin-bottom: 0px;">2 Sessions</p>
                                            <p class="c_red text-center">&#8377; 1,499</p>
                                        </div>
                                        <div class="col-md-4 col-xs-3" style="padding-left: 5px">
                                            <p class="text-center plan_consult" style="margin-bottom: 0px;">5 Sessions</p>
                                            <p class="c_red text-center">&#8377; 3,499</p>
                                        </div>
                                        <div style="clear: both"></div>
                                        <div class="col-md-3 col-xs-3"></div>
                                        <div class="col-md-6 col-xs-3 text-center">
                                            <button class="btn thriive_btn">Consult Now</button>
                                        </div>
                                        <div class="col-md-3 col-xs-3"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div style="clear: both"></div>
    <!-- mobile -->
    <section class="hidden-md hidden-lg hidden-xl">
        <div class="container">
            <div class="row" style="">
                <div class="box_c">
                    <div class="col-xs-12 col-md-4">
                        <div class="text_box">
                            <div class="head_text">
                                <a href="<?php echo home_url('talk-to-best-meditation-online'); ?>">
                                    <div class="row">
                                        <div class="col-md-3 col-xs-3">
                                            <img src="/wp-content/uploads/2020/07/Icons_Icon-1.png" class="img-responsive" alt="">
                                        </div>
                                        <div class="col-md-9 col-xs-9">
                                            <h4 class="text-center c_purple" style="margin-bottom: 0px;"><strong>Meditation Coach</strong></h4>
                                            <p class="text-center">Learn to meditate at home</p>
                                            <hr>
                                        </div>
                                        <div style="clear: both"></div>
                                        <div class="col-md-4 col-xs-4" style="padding-right: 5px;">
                                            <p class="text-center plan_consult">1 Session</p>
                                            <p class="c_red text-center">&#8377; 499</p>
                                        </div>
                                        <div class="col-md-4 col-xs-4" style="padding-left: 5px;padding-right: 5px;">
                                            <p class="text-center plan_consult">2 Sessions</p>
                                            <p class="c_red text-center">&#8377; 899</p>
                                        </div>
                                        <div class="col-md-4 col-xs-4" style="padding-left: 5px">
                                            <p class="text-center plan_consult">5 Sessions</p>
                                            <p class="c_red text-center">&#8377; 2,299</p>
                                        </div>
                                        <div style="clear: both"></div>
                                        <div class="col-md-6 col-xs-12 text-center">
                                            <button class="btn thriive_btn">Consult Now</button>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-md-4">
                        <div class="text_box">
                            <div class="head_text">
                                <a href="<?php echo home_url('talk-to-best-life-coach-online'); ?>">
                                    <div class="row">
                                        <div class="col-md-3 col-xs-3">
                                            <img src="/wp-content/uploads/2020/07/Icons_Icon-2.png" class="img-responsive" alt="">
                                        </div>
                                        <div class="col-md-9 col-xs-9">
                                            <h4 class="text-center c_purple" style="margin-bottom: 0px;"><strong>Stress Coach</strong></h4>
                                            <p class="text-center">Manage your stress effectively</p>
                                            <hr>
                                        </div>
                                        <div style="clear: both"></div>
                                        <div class="col-md-4 col-xs-4" style="padding-right: 5px;">
                                            <p class="text-center plan_consult">1 Session</p>
                                            <p class="c_red text-center">&#8377; 499</p>
                                        </div>
                                        <div class="col-md-4 col-xs-4" style="padding-left: 5px;padding-right: 5px;">
                                            <p class="text-center plan_consult">2 Sessions</p>
                                            <p class="c_red text-center">&#8377; 899</p>
                                        </div>
                                        <div class="col-md-4 col-xs-4" style="padding-left: 5px">
                                            <p class="text-center plan_consult">5 Sessions</p>
                                            <p class="c_red text-center">&#8377; 2,299</p>
                                        </div>
                                        <div style="clear: both"></div>
                                        <div class="col-md-6 col-xs-12 text-center">
                                            <button class="btn thriive_btn">Consult Now</button>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-md-4">
                        <div class="text_box">
                            <div class="head_text">
                                <a href="<?php echo home_url('talk-to-best-counselor-online'); ?>">
                                    <div class="row">
                                        <div class="col-md-3 col-xs-3">
                                            <img src="/wp-content/uploads/2020/07/Icons_Icon-3.png" class="img-responsive" alt="">
                                        </div>
                                        <div class="col-md-9 col-xs-9">
                                            <h4 class="text-center c_purple" style="margin-bottom: 0px;"><strong>Mental Health Therapy</strong></h4>
                                            <p class="text-center">Overcome anxiety & depression</p>
                                            <hr>
                                        </div>
                                        <div style="clear: both"></div>
                                        <div class="col-md-4 col-xs-4" style="padding-right: 5px;">
                                            <p class="text-center plan_consult" style="margin-bottom: 0px;">1 Session</p>
                                            <p class="c_red text-center">&#8377; 799</p>
                                        </div>
                                        <div class="col-md-4 col-xs-4" style="padding-left: 5px;padding-right: 5px;">
                                            <p class="text-center plan_consult" style="margin-bottom: 0px;">2 Sessions</p>
                                            <p class="c_red text-center">&#8377; 1,499</p>
                                        </div>
                                        <div class="col-md-4 col-xs-4" style="padding-left: 5px">
                                            <p class="text-center plan_consult" style="margin-bottom: 0px;">5 Sessions</p>
                                            <p class="c_red text-center">&#8377; 3,499</p>
                                        </div>
                                        <div style="clear: both"></div>
                                        <div class="col-md-6 col-xs-12 text-center">
                                            <button class="btn thriive_btn">Consult Now</button>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div style="clear: both"></div>
    
    <div style="background: url(/wp-content/uploads/2020/07/divider.png) center center no-repeat;
    height: 25px;"></div>

<!--    how its work mobile-->
    <section class="container hidden-md hidden-lg hidden-xl">
        <div class="c_purple">
            <h4 class="main_heading"><strong>How it works</strong></h4>
        </div>
        <section class="step">
            <div>
                <div class="circle"><i class=""><img class="step_icon" src="/wp-content/uploads/2020/07/Icons-2-01.png" alt="" style="height: 30px;"></i></div>
            </div>
            <div>
                <div class="title">Select an expert</div>
                <div class="caption c_black">From an extensive list of verified &amp; trusted experts</div>
            </div>
        </section>
        <section class="step">
            <div>
                <div class="circle"><i class=""><img class="step_icon" src="/wp-content/uploads/2020/07/Icons-2-02.png" alt="" style="height: 30px;"></i></div>
            </div>
            <div>
                <div class="title">Click call or chat</div>
                <div class="caption c_black">Select how you want to consult online</div>
            </div>
        </section>
        <section class="step">
            <div>
                <div class="circle"><i class=""><img class="step_icon" src="/wp-content/uploads/2020/07/Icons-2-03.png" alt="" style="height: 30px;"></i></div>
            </div>
            <div>
                <div class="title">Sign up</div>
                <div class="caption c_black">Register instantly using your email id &amp; mobile number</div>
            </div>
        </section>
        <section class="step">
            <div>
                <div class="circle"><i class=""><img class="step_icon" src="/wp-content/uploads/2020/07/Icons-2-04.png" alt="" style="height: 30px;"></i></div>
            </div>
            <div>
                <div class="title">Make payment </div>
                <div class="caption c_black">Choose your plan and get started</div>
            </div>
        </section>
        <section class="step">
            <div>
                <div class="circle"><i class=""><img class="step_icon" src="/wp-content/uploads/2020/07/Icons-2-05.png" alt="" style="height: 30px;"></i></div>
            </div>
            <div>
                <div class="title">Start your session</div>
                <div class="caption c_black">Your expert will connect with you &amp; start your session</div>
            </div>
        </section>
    </section>
    <div style="clear: both"></div>
    
    <div class="container hidden-lg hidden-md-hidden-xl">
            <div class="row" style="">
                <div class="col-xs-12 col-md-12" style="margin-top: 5%;">
                    <div class="text_box" style="margin-bottom: 0%;padding: 3px; padding-top: 4%; padding-bottom: 0px;">
                        <div class="row" style="padding: 0% 5%">
                            <div class="col-xs-4" style="padding:0px">
                                <p class="text-center c_black f18">100,000+</p>
                                <p class="rating_text">Happy Users</p>
                            </div>
                            <div class="col-xs-4" style="padding:0px">
                                <p class="text-center c_black f18">4.4/5 </p>
                                <p class="rating_text">Google</p>
                            </div>
                            <div class="col-xs-4" style="padding:0px">
                                <p class="text-center c_black f18">4.9/5</p>
                                <p class="rating_text">Facebook</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
<!--    assure in mobile-->
    <section class="container w_we_assure hidden-md hidden-lg hidden-xl">
        <div class="c_purple mt_2 mb_2" style="margin-top: 5%; padding-top: 3%;">
            <h4 class="mb_2 mt_2 main_heading"><strong>What we assure</strong></h4>
        </div>
        <div class="row">
            <div class="col-md-2 col-xs-2 assure">
                <img src="/wp-content/uploads/2020/07/Icons-2-06.png" height="50" alt="">
            </div>
            <div class="col-md-10 col-xs-10 assure">
                <div>
                    <div class="title">Consult top experts</div>
                    <div class="caption c_black">Select from verified experts &amp; call/chat online.</div>
                </div>
            </div>
            <div style="clear: both"></div>
            <div class="col-md-2 col-xs-2 assure">
                <img src="/wp-content/uploads/2020/07/Icons-2-07.png" height="50" alt="">
            </div>
            <div class="col-md-10 col-xs-10 assure">
                <div>
                    <div class="title">100% privacy guaranteed</div>
                    <div class="caption c_black">All consultations are safe, private and completely confidential.</div>
                </div>
            </div>
            <div style="clear: both"></div>
            <div class="col-md-2 col-xs-2 assure">
                <img src="/wp-content/uploads/2020/07/Icons-2-02.png" height="50" alt="">
            </div>
            <div class="col-md-10 col-xs-10 assure">
                <div>
                    <div class="title">Unmatched quality</div>
                    <div class="caption c_black">Engage with highly trained experts and receive best-in-industry consultation.</div>
                </div>
            </div>
            <div style="clear: both"></div>
            <div class="col-md-2 col-xs-2 assure">
                <img src="/wp-content/uploads/2020/07/Icons-2-09.png" height="50" alt="">
            </div>
            <div class="col-md-10 col-xs-10 assure">
                <div>
                    <div class="title">Convenience comes first</div>
                    <div class="caption c_black">Consult via call or chat from the comfort of your home, any time you want.</div>
                </div>
            </div>
            <div style="clear: both"></div>
            <div class="col-md-2 col-xs-2 assure">
                <img src="/wp-content/uploads/2020/07/Icons-2-10.png" height="50" alt="">
            </div>
            <div class="col-md-10 col-xs-10 assure">
                <div>
                    <div class="title">100% moneyback guaranteed*</div>
                    <div class="caption c_black">Unhappy with your consultation, get your money back. <span style="color:#8c8c8c;">(*T&C Applied)</span></div>
                </div>
            </div>
            <div style="clear: both"></div>
        </div>
    </section>
    <div style="clear: both"></div>
    
<!--   how its work Desktop-->
    <section class="container hidden-xs">
            <div class="c_purple">
                <h4><strong> How it works</strong></h4>
            </div>
        <div class="md-stepper-horizontal">
        <div class="md-step done">
            <div class="text-center">
                <img class="step_icon" src="/wp-content/uploads/2020/07/Icons-2-01.png" alt="" style="height:40px;">
            </div>
            <div class="md-step-title">Select an expert</div>
            <div class="md-step-optional c_black">From an extensive list of verified &amp; trusted experts</div>
            <div class="md-step-bar-left"></div>
            <div class="md-step-bar-right"></div>
        </div>
        <div class="md-step editable">
            <div class="text-center">
                <img class="step_icon" src="/wp-content/uploads/2020/07/Icons-2-02.png" alt="" style="height:40px;">
            </div>
            <div class="md-step-title">Click call or chat</div>
            <div class="md-step-optional c_black">Select how you want to consult online</div>
            <div class="md-step-bar-left"></div>
            <div class="md-step-bar-right"></div>
        </div>
        <div class="md-step">
            <div class="text-center">
                <img class="step_icon" src="/wp-content/uploads/2020/07/Icons-2-03.png" alt="" style="height:40px;">
            </div>
            <div class="md-step-title">Sign up</div>
            <div class="md-step-optional c_black">Register instantly using your email id &amp; mobile number</div>
            <div class="md-step-bar-left"></div>
            <div class="md-step-bar-right"></div>
        </div>
        <div class="md-step">
            <div class="text-center">
                <img class="step_icon" src="/wp-content/uploads/2020/07/Icons-2-04.png" alt="" style="height:40px;">
            </div>
            <div class="md-step-title">Make payment</div>
            <div class="md-step-optional c_black">Choose your plan and get started</div>
            <div class="md-step-bar-left"></div>
            <div class="md-step-bar-right"></div>
        </div>
        <div class="md-step">
            <div class="text-center">
                <img class="step_icon" src="/wp-content/uploads/2020/07/Icons-2-05.png" alt="" style="height:40px;">
            </div>
            <div class="md-step-title">Start your session</div>
            <div class="md-step-optional c_black">Your expert will connect with you &amp; start your session</div>
            <div class="md-step-bar-left"></div>
            <div class="md-step-bar-right"></div>
        </div>
    </div>
    </section>
    <div style="clear: both"></div>
    
    <div class="container hidden-xs">
            <div class="row" style="">
                <div class="col-md-2"></div>
               <div class="col-md-8 mt_2">
                    <div class="text_box" style="margin-bottom: 0%">
                        <div class="row" style="padding: 0% 5%">
                            <div class="col-md-4">
                                <p class="text-center c_black f36">100,000+</p>
                                <p class="rating_text">Happy Users</p>
                            </div>
                            <div class="col-md-4">
                                <p class="text-center c_black f36">4.4/5 </p>
                                <p class="rating_text">Google Rating</p>
                            </div>
                            <div class="col-md-4">
                                <p class="text-center c_black f36">4.9/5</p>
                                <p class="rating_text">Facebook Rating</p>
                            </div>
                        </div>
                    </div>
                </div>
               <div class="col-md-2"></div>
            </div>
        </div>
    
<!--    what we assure desktop-->
    <section class="container hidden-xs w_we_assure" style="padding-top: 1%; padding-bottom: 4%;">
       <div class="c_purple mt_2 mb_2" style="margin-top: 5%">
            <h4 class="mb_2 mt_2"><strong>What we assure</strong></h4>
        </div>
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-2 col-xs-2">
              <div class="text-center">
                  <img src="/wp-content/uploads/2020/07/Icons-2-06.png" alt="" style="height:50px;">
              </div>
               <div class="text-center">
                   <div class="title">Consult top experts</div>
                   <div class="caption c_black">Select from verified experts & call/chat online.</div>
               </div>
           </div>               
            <div class="col-md-2 col-xs-2">
              <div class="text-center">
                  <img src="/wp-content/uploads/2020/07/Icons-2-07.png" alt="" style="height:50px;">
              </div>
               <div class="text-center">
                   <div class="title">100% privacy guaranteed</div>
                   <div class="caption c_black">All consultations are safe, private and completely confidential.</div>
               </div>
           </div>               
            <div class="col-md-2 col-xs-2">
              <div class="text-center">
                  <img src="/wp-content/uploads/2020/07/Icons-2-02.png" alt="" style="height:50px;">
              </div>
               <div class="text-center">
                   <div class="title">Unmatched quality</div>
                   <div class="caption c_black">Engage with highly trained experts and receive best-in-industry consultation.</div>
               </div>
           </div>               
            <div class="col-md-2 col-xs-2">
              <div class="text-center">
                  <img src="/wp-content/uploads/2020/07/Icons-2-09.png" alt="" style="height:50px;">
              </div>
               <div class="text-center">
                   <div class="title">Convenience comes first</div>
                   <div class="caption c_black">Consult via call or chat from the comfort of your home, any time you want.</div>
               </div>
           </div>               
            <div class="col-md-2 col-xs-2">
              <div class="text-center">
                  <img src="/wp-content/uploads/2020/07/Icons-2-10.png" alt="" style="height:50px;">
              </div>
               <div class="text-center">
                   <div class="title">100% moneyback guaranteed*</div>
                   <div class="caption c_black">Unhappy with your consultation get your money back. <span style="color:#8c8c8c;">(*T&C Applied)</span></div>
               </div>
           </div>
            <div class="col-md-1"></div>
        </div>
    </section>
    <div style="background: url(/wp-content/uploads/2020/07/divider.png) center center no-repeat;
    height: 25px;"></div>
    <section class="container all_slider_Therapists news_feed_contect" style="margin-bottom: 0px;">
        <h4 class="mb_2 mt_2"><strong>Media on us</strong></h4>
        <section class="blogs slider">
            <?php while ( have_rows('news_feed') ) : the_row();?>
            <div class="slide news_feed">
                <a href="<?php the_sub_field('news_feed_url'); ?>" target="_blank" rel="nofollow">
                    <img title="<?php the_sub_field('news_feed_title');?>" alt="<?php the_sub_field('news_feed_title');?>" class="blog_img" src="<?php the_sub_field('news_feed_image');?>">
                </a>
            </div>
            <?php endwhile; ?>
        </section>
    </section>
    <div style="background: url(/wp-content/uploads/2020/07/divider.png) center center no-repeat;
    height: 25px;"></div>
    <section class="container">
        <h4 class="mb_2 mt_2"><strong>Free Meditation Videos</strong></h4>
        <div class="col-md-4 col-xs-12">
            <div class='youtube_section'>
                <iframe width="100%" height="250" src="https://www.youtube.com/embed/e7M73QODoDQ" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>                
            </div>
        </div>
        <div class="col-md-4 col-xs-12">
            <div class='youtube_section'>
                <iframe width="100%" height="250" src="https://www.youtube.com/embed/3pjGO5ZsU-c" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>                
            </div>
        </div>
        <div class="col-md-4 col-xs-12">
            <div class='youtube_section'>
                <iframe width="100%" height="250" src="https://www.youtube.com/embed/rEcDAbkDBUc" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>                
            </div>
        </div>
    </section>
    <section class="container">
        <div class="col-md-4 col-xs-12">
            <div class='youtube_section'>
                <iframe width="100%" height="250" src="https://www.youtube.com/embed/83ZymQ0ZWDA" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>                
            </div>
        </div>
        <div class="col-md-4 col-xs-12">
            <div class='youtube_section'>
                <iframe width="100%" height="250" src="https://www.youtube.com/embed/3Z1ePORyge8" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>                
            </div>
        </div>
        <div class="col-md-4 col-xs-12">
            <div class='youtube_section'>
                <iframe width="100%" height="250" src="https://www.youtube.com/embed/li8OpvOsc6c" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>                
            </div>
        </div>
    </section>
    <section class="container">
        <div class="col-md-4 col-xs-12">
            <div class='youtube_section'>
                <iframe width="100%" height="250" src="https://www.youtube.com/embed/eraWd-Q523g" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>                
            </div>
        </div>
        <div class="col-md-4 col-xs-12">
            <div class='youtube_section'>
                <iframe width="100%" height="250" src="https://www.youtube.com/embed/VPHG2gIaKZQ" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>                
            </div>
        </div>
    </section>
    <div style="background: url(/wp-content/uploads/2020/07/divider.png) center center no-repeat;
    height: 25px;"></div>
    <div class="carousel-inner container">
        <div class="item carousel-item active">
            <div class="">
                <h4 class="mb_2 mt_2"><strong>Testimonials</strong></h4>
            </div>
            <div class="testmonual_fetch slider">
                <?php while ( have_rows('testimonial') ) : the_row();?>
                <div class="slide">
                    <div class="testimonial"><?php the_sub_field('description')?>
                        <div class="media">
                            <div class="media-body">
                                <div class="overview">
                                    <div class="name">
                                        <h6><?php the_sub_field('name')?></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
    <div style="background: url(/wp-content/uploads/2020/07/divider.png) center center no-repeat;
    height: 25px;"></div>
    <section class="container all_slider_Therapists news_feed_contect" style="margin-bottom: 8%;">
        <h4 class="mb_2 mt_2"><strong>FAQs</h4>
        <section class="" style="margin-top:2%" itemscope itemtype="http://schema.org/FAQPage">
            <?php while(have_rows('faq')) : the_row();?>
            <div class="accordion_content" itemprop="mainEntity" itemscope itemtype="http://schema.org/Question">
                <button class="accordion" itemprop="name"><?php the_sub_field('faq_title') ?></button>
                <div class="panel" itemprop="acceptedAnswer" itemscope itemtype="http://schema.org/Answer">
                    <p itemprop="text"><?php the_sub_field('faq_description')?></p>
                </div>
            </div>
            <?php endwhile;?>
        </section>
    </section>
<?php // include_once get_stylesheet_directory().'/footer1.php'; 
get_footer(); ?>