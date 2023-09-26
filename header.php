<?php

$lang = '';

if ( empty(pll_current_language()) )

    $lang = pll_default_language();

else

    $lang = pll_current_language();

?>

<!DOCTYPE html>

<html lang="en" <?php if ( ICL_LANGUAGE_CODE=='ar' ) :?> dir="rtl" <?php endif ?>>



<head>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="<?php bloginfo('description')?>">

    <meta name="keywords" content="<?php bloginfo('name'); ?>">

    <meta name="author" content="<?php bloginfo('name'); ?>">

    <link rel="icon" href="<?=get_option('sand_favicon_img')?>" type="image/x-icon" />

    <title>

        <?php wp_title('|','true','right') ?>



        <?php bloginfo('name'); ?>

    </title>

    <?php wp_head(); ?>



</head>



<body class="layout-bg  <?php if ( ICL_LANGUAGE_CODE=='ar' ) :?> rtl <?php endif ?>">



    <!-- Loader start -->

    <div class="loader-wrapper">

        <div class="row loader-img">

            <div class="col-12">

                <img src="<?=get_option('sand_header_logo_img')?>" class="img-fluid" alt="">

            </div>

        </div>

    </div>

    <!-- Loader end -->



    <!-- header start -->

    <header class="header-2 ">

        <div class="container">

            <div class="row">

                <div class="col-3">
                    <div class="brand-logo">

                        <a href="<?php bloginfo('url') ?>">

                            <img src="<?=get_option('sand_header_logo_img')?>" alt="" class="img-fluid">

                        </a>

                    </div>
                </div>
                <div class="col-9">

                    <div class="menu">


                        <nav>

                            <div class="main-navbar">

                                <div id="mainnav">

                                    <div class="toggle-nav"><i class="fa fa-bars sidebar-bar"></i></div>
                                    <?php if ( ICL_LANGUAGE_CODE=='en' ) :?>
                                        <?php sand_menu(); ?>
                                        <?php else: ?>
                                        <?php sand_menu_ar(); ?>
                                    <?php endif;?>
                                </div>

                            </div>

                        </nav>

                        <ul class="header-right">

                            <li class="right-menu color-1">

                                <ul class="nav-menu">

                                    <li class="dropdown language">

                                        <a href="javascript:void(0)">

                                            <i class="fas fa-globe"></i>

                                        </a>

                                        <ul class="nav-submenu">



                                            <li>

                                                <?php if (get_locale() == 'en_US') :

                                                    $url_lang = pll_the_languages(array('raw' => 1))['ar']['url'];

                                                ?>

                                                <div class="p-dropdown"> <a href="#"><i class="icon-globe"></i><span><?php _e('English', 'sand'); ?></span></a>

                                                    <ul class="p-dropdown-content">

                                                        <li><a href="<?php echo $url_lang; ?>"><?php _e('Arabic', 'sand'); ?></a></li>

                                                    </ul>

                                                </div>

                                               <?php else :

                                                    $url_lang = pll_the_languages(array('raw' => 1))['en']['url'];

                                                ?>

                                                <div class="p-dropdown"> <a href="#"><i class="icon-globe"></i><span><?php _e('Arabic', 'sand'); ?></span></a>

                                                    <ul class="p-dropdown-content">

                                                        <li><a href="<?php echo $url_lang; ?>"><?php _e('English', 'sand'); ?></a></li>

                                                    </ul>

                                                </div>

                                               <?php endif; ?>

                                            </li>

                                        </ul>

                                    </li>

                                    <?php

                                    $phone    = get_option('sand_phone');

                                    $email    = get_option('sand_email');

                                    $whatsapp = get_option('sand_whatsapp');

                                    ?>

                                    <?php if (!empty($phone)): ?>

                                    <li class="dropdown">

                                       <a href="tel:<?=$phone?>">

                                            <i class="fas fa-phone"></i>

                                        </a>

                                    </li>

                                    <?php endif ?>

                                    <?php if (!empty($email)): ?>

                                    <li class="dropdown">

                                       <a href="mailto:<?=$email?>">

                                            <i class="fas fa-envelope-open-text"></i>

                                        </a>

                                    </li>

                                    <?php endif ?>

                                    <?php if (!empty($whatsapp)): ?>

                                    <li class="dropdown">

                                       <a target="_blank" href="https://api.whatsapp.com/send?phone=<?=$whatsapp?>">

                                            <i class="fab fa-whatsapp"></i>

                                        </a>

                                    </li>

                                    <?php endif ?>
                                    <?php if ( !is_home() ) : ?>
                                    <li class="dropdown">
                                        <a href="#" class="color-trigger">
                                            <i class="fa fa-search"></i>
                                        </a>
                                    </li>
                                    <?php endif?>
                                </ul>

                            </li>

                        </ul>

                    </div>

                </div>

            </div>

        </div>

    </header>

    <!--  header end -->

