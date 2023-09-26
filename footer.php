    <!-- footer start -->

    <?php $lang = '_'.pll_current_language();  ?>

    <?php

        $facebook = get_option('sand_fb');

        $instagram = get_option('sand_insta');

        $twitter = get_option('sand_twitter');

        $linkedIn = get_option('sand_linkedin');



        $address = get_option('sand_location'.$lang);

        $phone = get_option('sand_phone');

        $email = get_option('sand_email');

    ?>

    <footer>

        <div class="footer footer-bg">

            <div class="container">

                <div class="row">

                    <div class="col-lg-6 col-md-6">
                        

                        <div class="footer-details text-center">

                            <a href="<?php bloginfo('url') ?>">

                                <img src="<?= get_option('sand_footer_logo_img'); ?>" alt="">

                            </a>

                            <p>

                                <?=get_option('footer_content'.$lang) ?>

                            </p>

                            <?php if ( !empty($facebook) || !empty($instagram) || !empty($twitter) || !empty($linkedIn) ): ?>

                            <h6><?php _e('Follow us', 'sand'); ?></h6>

                            <ul class="icon-list">

                                <?php if (!empty($facebook)): ?>

                                    <li><a href="<?= $facebook ?>"><i class="fab fa-facebook-f"></i></a></li>

                                <?php endif; ?>



                                <?php if (!empty($instagram)): ?>

                                    <li><a href="<?= $instagram ?>"><i class="fab fa-instagram"></i></a></li>

                                <?php endif; ?>



                                <?php if (!empty($twitter)): ?>

                                    <li><a href="<?= $twitter ?>"><i class="fab fa-twitter"></i></a></li>

                                <?php endif; ?>



                                <?php if (!empty($linkedIn)): ?>

                                    <li><a href="<?= $linkedIn ?>"><i class="fab fa-linkedin-in"></i></a></li>

                                <?php endif; ?>

                            </ul>

                            <?php endif ?>

                        </div>

                    </div>


                    <?php if ( !empty($address) || !empty($phone) || !empty($email) ): ?>

                    <div class="col-lg-6 col-md-6">

                        <div class="footer-links footer-left-space">

                            <h5 class="footer-title"><?php _e('Contact us', 'sand'); ?></h5>

                            <div class="footer-content footer-contact" id = 'footer-contact-m'>

                                <ul id="footer-contact-info">

                                    <?php if ( !empty($address) ): ?>

                                        <a href = "<?= get_option('sand_location_link') ?>">

                                            <li>

                                                <i class="fas fa-map-marker-alt"></i><?= $address ?>

                                            </li>

                                        </a>

                                    <?php endif; ?>



                                    <?php if ( !empty($phone) ): ?>

                                        <a href = "tel:<?= $phone ?>">

                                            <li class="phone">

                                                <i class="fas fa-phone-alt"></i><span><?= $phone ?></span>

                                            </li>

                                        </a>

                                    <?php endif; ?>



                                    <?php if ( !empty($email) ): ?>

                                        <a href = "mailto:<?= $email ?>" >

                                            <li>

                                                <i class="fas fa-envelope"></i><?= $email ?>

                                            </li>

                                        </a>

                                    <?php endif; ?>

                                </ul>



                            </div>

                       

                        </div>

                    </div>

                    <?php endif ?>

                </div>

            </div>

        </div>

        <div class="sub-footer footer-light">

            <div class="container">

                <div class="row">

                    <div class="col-xl-12 col-md-12">

                        <div class="copy-right text-center">

                            <p class="mb-0"> <?php _e('Copyright', 'sand'); ?> &copy; <?= date("Y"); ?> , <?php _e('All Right Reserved', 'sand'); ?> <?php bloginfo('name') ?></p>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </footer>

    <!-- footer end -->



    <!-- tap to top start -->

    <div class="tap-top">

        <div>

            <i class="fas fa-arrow-up"></i>

        </div>

    </div>
    <div class="fixed-overlay">
        
    </div>
    <!-- tap to top end -->
    <?php wp_footer()?>

    

</body>



</html>