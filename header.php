<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?= bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<!-- CSS only -->
    <title><?= wp_title() . " - " . bloginfo('name') ?></title>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div class="container">
    <header class="blog-header py-3">
        <div class="row flex-nowrap justify-content-between align-items-center">
            <div class="col-4 pt-1">
            </div>
            <div class="col-4 text-center">
                <a class="blog-header-logo text-dark" href="<?= site_url() ?>"><?= bloginfo('name') ?></a>
            </div>
            <div class="col-4 d-flex justify-content-end align-items-center">
	            <?php get_search_form(); ?>
                <?php
                if(!is_user_logged_in()) {
                    echo '<a class="btn btn-sm btn-outline-secondary" href="'.site_url("wp-login.php") .'">'.__("Sign up").'</a>';
                }
                ?>
            </div>
        </div>
    </header>
</div>
