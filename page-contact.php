<?php  

	/**

	** Template Name: Contact Template

	**/

	if ( empty(pll_current_language()) )

    $lang = '_'.pll_default_language();

	else

    $lang = '_'.pll_current_language(); // For multilanguage options

	get_header();

	get_template_part('template-parts/page-title'); 

?>

<?php if (get_option('first_contact_hidden'.$lang) != '1')  : ?>

    <!-- Get in touch section start -->

    <section class="small-section get-in-touch">

        <div class="container"> 

            <div class="row">

                <div class="col-lg-6 contact-img">

                    <img src="<?=get_option('first_contact_img')?>" class="img-fluid" alt="">

                </div>

                <div class="col-lg-6">

                    <div class="log-in">

                        <div class="mb-4 text-start">

                            <h2><?=get_option('first_contact_title'.$lang)?></h2>

                        </div>

                        <?=get_option('sand_contactUs_contactForm_detailed'.$lang) ;?>

                    </div>

                </div>

            </div>

        </div>

    </section>

    <!-- Get in touch section end -->

	<?php endif ?>


    <?php

        $facebook = get_option('sand_fb');

        $instagram = get_option('sand_insta');

        $twitter = get_option('sand_twitter');

        $linkedIn = get_option('sand_linkedin');

        $address = get_option('sand_location'.$lang);

        $phone = get_option('sand_phone');

        $email = get_option('sand_email');

    ?>

    <!-- contact details section start -->

    <section class="small-section contact_section pt-0 contact_bottom">

        <div class="container">

            <div class="row">

            	<?php if ( !empty($address) ): ?>

                <div class="col-lg-4 col-sm-6">

                    <div class="contact_wrap">

                        <i data-feather="map-pin"></i>

                        <h4><?php _e('Address', 'sand'); ?></h4>

                        <p class="font-roboto"><?= $address ?>

                        </p>

                    </div>

                </div>

            	<?php endif ?>

            	<?php if ( !empty($phone) || !empty($email) ): ?>

                <div class="col-lg-4 col-sm-6">

                    <div class="contact_wrap">

                        <i data-feather="mail"></i>

                        <h4><?php _e('Contact us', 'sand'); ?></h4>

                        <ul>

                           <?php if ( !empty($phone) ): ?>

                                <li>

                                    <a href = "tel:<?= $phone ?>">

                                       <?= $phone ?>

                                    </a>

                                </li>

                            <?php endif; ?>

                            <?php if ( !empty($email) ): ?>

                                <li>

                                    <a href = "mailto:<?= $email ?>" >

                                        <?= $email ?>

                                    </a>

                                </li>

                            <?php endif; ?>

                        </ul>

                    </div>

                </div>

            	<?php endif ?>

            	<?php if ( !empty($facebook) || !empty($instagram) || !empty($twitter) || !empty($linkedIn) ): ?>

                <div class="col-lg-4 col-sm-6">

                    <div class="contact_wrap">

                        <i data-feather="users"></i>

                        <h4><?php _e('Follow us', 'sand'); ?> </h4>

                        <ul class="agent-social">

                            <?php if (!empty($facebook)): ?>

                                <li><a href="<?= $facebook ?>" class="facebook"><i class="fab fa-facebook-f"></i></a></li>

                            <?php endif; ?>



                            <?php if (!empty($instagram)): ?>

                                <li><a href="<?= $instagram ?>" class="google"><i class="fab fa-instagram"></i></a></li>

                            <?php endif; ?>



                            <?php if (!empty($twitter)): ?>

                                <li><a href="<?= $twitter ?>" class="twitter"><i class="fab fa-twitter"></i></a></li>

                            <?php endif; ?>



                            <?php if (!empty($linkedIn)): ?>

                                <li><a href="<?= $linkedIn ?>" class="linkedin"><i class="fab fa-linkedin-in"></i></a></li>

                            <?php endif; ?>

                        </ul>

                    </div>

                </div>

                <?php endif; ?>

            </div>

        </div>

    </section>

    <!-- contact details section end -->

	<?php if (!empty(get_option('sand_map'))) : ?>

    <div class="theme-card">

        <div class="contact-bottom">

            <div class="contact-map">

               <?=get_option('sand_map') ?>

            </div>

        </div>

    </div>

	<?php endif ?>

<?php get_footer()?>