<?php /* Template Name:home-page-blog-form */ ?>
<?php get_header(); ?>
<section class="banner contact-us">
    <div class="container">
        <div class="row i_w_p col-12 p-0 mx-auto">
            <?php echo do_shortcode('[gravityform id=31 title=false description=false ajax=true]'); ?>
        </div>
        <style>
            .gravity_form_wrapper {
                margin-top: 0 !important;
            }
            .gform_wrapper{
                width: 100% !important;
            }
            .gravity_form {
                margin: 0;
            }
            .gravity_form li {
                list-style: none;
            }
            .gravity_form textarea {
                max-height: 80px !important;
                border: thin solid #4f0475;
                border-radius: 5px;
            }
            .gravity_form label {
                font-size: 14px !important;
                font-weight: 400 !important;
                margin: 0;
            }
            .gravity_form input[type="text"],
            .gravity_form select {
                border: thin solid #4f0475;
                border-radius: 5px;
                height: 38px;
                width: 100% !important;
            }
            .gravity_form input[type="file"] {
                border: none;
                width: 100% !important;
            }
            .gravity_form .ginput_container_fileupload span {
                font-size: 12px;
                opacity: 0.7;
            }
            .gravity_form input[type="submit"] {
                color: #fff;
                background: #4f0475;
                border: 0px;
                border-radius: 10px;
                border: 1px solid #4f0475;
                margin: 0 auto !important;
                padding: 8px 29px;
                display: block !important;
                transition: .2 ease-in-out;
            }
            .gravity_form input[type="submit"]:hover {
                border: thin solid #4f0475;
                color: #4f0475;
                background: #fff;
            }
            .gravity_form li.gfield.gfield_error,
            .gravity_form .validation_error {
                border: none !important;
                margin: 0;
                padding: 0;
                background: transparent !important;
            }
            .gravity_form.validation_message,
            .gravity_form .validation_error {
                font-weight: 400 !important;
                padding: 0 !important;
            }
        </style>
    </div>
</section>
<?php get_footer(); ?>