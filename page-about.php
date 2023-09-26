<?php  

	/**

	** Template Name: About Template

	**/

	if ( empty(pll_current_language()) )

    $lang = '_'.pll_default_language();

	else

    $lang = '_'.pll_current_language(); // For multilanguage options

	get_header();

	get_template_part('template-parts/page-title'); 

?>

    <!-- ========== banner1-area start======== -->

<?php if (get_option('first_about_hidden'.$lang) != '1')  : ?>

<div class="banner-section5">

    <img src="<?=sand_URL.'assets/img/icon/banner5-tirang1.svg'?>" class="banner5-tirang1 img-fluid" alt="image">

    <img src="<?=sand_URL.'assets/img/icon/banner5-tirang2.svg'?>" class="banner5-tirang2 img-fluid" alt="image">

    <img src="<?=sand_URL.'assets/img/icon/banner5-tirang3.svg'?>" class="banner5-tirang3 img-fluid" alt="image">

    <img src="<?=sand_URL.'assets/img/icon/banner5-tirang3.svg'?>" class="banner5-tirang4 img-fluid" alt="image">

    <img src="<?=sand_URL.'assets/img/icon/banner5-tirang4.svg'?>" class="banner5-tirang5 img-fluid" alt="image">

    <img src="<?=sand_URL.'assets/img/bg/banner5-vector-left.png'?>" class="banner5-vector-left img-fluid" alt="image">

    <img src="<?=sand_URL.'assets/img/bg/banner5-vector.png'?>" class="banner5-vector img-fluid" alt="image">

    <div class="container">

        <div class="row justify-content-center align-items-center">

            <div class="col-xl-6 col-lg-6">

                <div class="banner-content style-3 wow fadeInLeft" data-wow-duration="1.5s" data-wow-delay="0.2s">

                    <span><?=get_option('first_about_sub_title'.$lang)?></span>

                    <h1><?=get_option('first_about_title'.$lang)?></h1>

                    <p>

                    	<?=get_option('first_about_content'.$lang)?>

                    </p>

                </div>

            </div>

            <div class="col-xl-6 col-lg-6 position-relative d-lg-block">

                <div class="offer-image-area style-2">

                    <img src="<?=get_option('first_about_img') ?>" class="img-fluid banner5-image" alt="image">

                </div>

            </div>

        </div>

    </div>

</div>

<!-- ===============  banner1-area end=============== -->

<?php endif ?>

<?php if (get_option('second_about_hidden'.$lang) != '1')  : ?>

<!--Agency Section-->

<section class="agency-section">

    <div class="container">

    	<div class="title-2">

            <h2><?=get_option('second_about_title'.$lang)?></h2>

            <p>

                <?=get_option('second_about_content'.$lang)?>

            </p>

        </div>

        <div class="row clearfix">

            <!--Left Column-->

            <div class="left-col col-xl-5 col-lg-12 col-md-12 col-sm-12">

                <div class="inner">

                    <div class="banner-content style-3 wow fadeInLeft" data-wow-duration="1.5s" data-wow-delay="0.2s">

	                    <h1><?=get_option('second_about_first_icon_title'.$lang)?></h1>

	                    <p class="para">

	                    	<?=get_option('second_about_first_icon_content'.$lang)?>

	                    </p>

	                </div>

                </div>

            </div>

            <div class="center-col col-xl-2 col-lg-12 col-md-12 col-sm-12">

            	<div class="sand-logo">

            		<img class="img-arrows" src="<?=sand_URL.'assets/img/icon/line-arrow.png'?>">

            		<img class="img-arrows-2" src="<?=sand_URL.'assets/img/icon/line-arrow.png'?>">

                	<div class="sand-logo-img">

                    	<img src="<?=get_option('sand_header_logo_img')?>">

                    </div>

                </div>

            </div>

            <!--Right Column-->

            <div class="right-col feature-section col-xl-5 col-lg-12 col-md-12 col-sm-12">

                <div class="inner">

                    <div class="banner-content style-3 wow fadeInLeft" data-wow-duration="1.5s" data-wow-delay="0.2s">

	                    <h1><?=get_option('second_about_second_icon_title'.$lang)?></h1>

	                    <p class="para">

	                    	<?=get_option('second_about_second_icon_content'.$lang)?>

	                    </p>

	                </div>

                </div>

            </div>

        </div>

    </div>

</section>

<?php endif ?>

<?php if (get_option('about_location_hidden'.$lang ) != '1')  : 

        $locations = get_terms( array(

            'taxonomy'      => 'location',

            'orderby'       => 'ID',

            'order'         => 'ASC',

            'hide_empty'    => true,

            'include'       => get_option('location_category'.$lang),

            )

        );

        if ( !empty($locations) ) :

    ?>

    <!-- feature section start -->

    <section class="feature-section bg-comman-2 slick-between">

        <div class="container-fluid">

            <div class="row">

                <div class="col">

                    <div class="title-2 text-white">

                        <h2><?=get_option('about_location_title'.$lang) ?></h2>

                        <p><?=get_option('about_location_content'.$lang) ?></p>

                    </div>

                    

                    <div class="feature-2 dot-gradient">

                        <?php

                        

                        foreach ($locations as $location):

                            $location_id = $location->term_id;

                            ?>

                        <div>

                            <a href = "<?= esc_url( get_term_link( $location )  ) ?>">

                                <div class="feature-box">

                                    <img src="<?=z_taxonomy_image_url($location_id, 'full'); ?>" class="img-fluid" alt="">

                                    <div class="feature-bottom">

                                        <h3><?=$location->name; ?></h3>

                                        <span><?=$location->count.'+ ' ;_e('Property', 'sand'); ?></span>

                                    </div>

                                </div>

                            </a>

                        </div>

                        <?php endforeach;?>

                    </div>

                </div>

            </div>

        </div>

    </section>



    <!-- feature section end -->

    <?php endif; endif ?>

<?php if (get_option('fourth_about_hidden'.$lang) != '1')  : ?>

<section class="service-six">

    <div class="container">

        <div class="title-2">

            <h2><?=get_option('fourth_about_title'.$lang)?></h2>

            <p>

               	<?=get_option('fourth_about_content'.$lang)?>

            </p>

        </div>

        <div class="row">

            <div class="col-sm-12 col-md-12 col-lg-3 wow fadeInUp" data-wow-duration="1000ms">

                <div class="service-six__item">

                    <div class="service-six__content">

                        <div class="service-six__icon">

                            <i class="<?=get_option('fourth_about_first_icon')?>"></i>

                        </div>

                        <h3 class="service-six__title"><?=get_option('fourth_about_first_icon_title'.$lang)?></h3>

                        <div class="service-six__text">
                            <?php 
                                $catContent = get_option('fourth_about_first_icon_content'.$lang);
                                $stripped = strip_tags($catContent, '<p>'); //replace <p> and <a> with whatever tags you want to keep after the strip
                                echo $stripped;
                            ?>
                        </div>

                    </div>

                </div>

            </div>

            <div class="col-sm-12 col-md-12 col-lg-3 wow fadeInUp" data-wow-duration="1200ms"

                data-wow-delay="300ms">

                <div class="service-six__item">

                    <div class="service-six__content">

                        <div class="service-six__icon">

                            <i class="<?=get_option('fourth_about_second_icon')?>"></i>

                        </div>

                        <h3 class="service-six__title"><?=get_option('fourth_about_second_icon_title'.$lang)?></h3>

                        <div class="service-six__text">
                            <?php 
                                $catContent = get_option('fourth_about_second_icon_content'.$lang);
                                $stripped = strip_tags($catContent, '<p>'); //replace <p> and <a> with whatever tags you want to keep after the strip
                                echo $stripped;
                            ?>
                        </div>

                    </div>

                </div>

            </div>

            <div class="col-sm-12 col-md-12 col-lg-3 wow fadeInUp" data-wow-delay="1400ms"

                data-wow-duration="1500ms">

                <div class="service-six__item">

                    <div class="service-six__content">

                        <div class="service-six__icon">

                            <i class="<?=get_option('fourth_about_third_icon')?>"></i>

                        </div>

                        <h3 class="service-six__title"><?=get_option('fourth_about_third_icon_title'.$lang)?></h3>

                        <div class="service-six__text">
                            <?php 
                                $catContent = get_option('fourth_about_third_icon_content'.$lang);
                                $stripped = strip_tags($catContent, '<p>'); //replace <p> and <a> with whatever tags you want to keep after the strip
                                echo $stripped;
                            ?>
                        </div>

                    </div>

                </div>

            </div>

            <div class="col-sm-12 col-md-12 col-lg-3 wow fadeInUp" data-wow-delay="1600ms"

                data-wow-duration="1500ms">

                <div class="service-six__item">

                    <div class="service-six__content">

                        <div class="service-six__icon">

                            <i class="<?=get_option('fourth_about_fourth_icon')?>"></i>

                        </div>

                        <h3 class="service-six__title"><?=get_option('fourth_about_fourth_icon_title'.$lang)?></h3>

                        <div class="service-six__text">
                            <?php 
                                $catContent = get_option('fourth_about_fourth_icon_content'.$lang);
                                $stripped = strip_tags($catContent, '<p>'); //replace <p> and <a> with whatever tags you want to keep after the strip
                                echo $stripped;
                            ?>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

<?php endif ?>


<?php if (get_option('about_team_hidden'.$lang) != '1')  : 

  $team = sand_get_team(get_option('about_team_number'.$lang));

   if($team->have_posts()):

?>

<!-- Our agent section start -->

<section class="team-four">
    <div class="container">
        <div class="title-2">
            <h2><?=get_option('about_team_title'.$lang)?></h2>
            <p>
                <?=get_option('about_team_content'.$lang)?>
            </p>
        </div>
        <div class="row">
        	<?php while ( $team->have_posts() ) : $team->the_post(); ?>
            <div class="col-md-6 col-lg-3">
                <div class="team-four__card">
                    <div class="team-four__image">
                        <img src="<?php the_post_thumbnail_url()?>" alt="">
                    </div>
                    <h3 class="team-four__name"><?php the_title()?></h3>
                </div>
            </div>
            <?php endwhile; wp_reset_query(); ?> 
        </div>
    </div>
</section>

<?php endif; endif ?>

<?php if (get_option('sixth_about_hidden'.$lang) != '1')  : ?>

<!-- service section start -->

<section class="service-section service-2 bg-light">

    <div class="container">

        <div class="row">

            <div class="col">

                <div class="title-2 mb-5">

                    <h2><?=get_option('sixth_about_title'.$lang) ?></h2>

                </div>

                <div class="row property-service column-space about-service">

                    <div class="col-xl-4 col-md-6">

                        <div class="service-box">

                            <div class="hover-line">

                                <i class="<?=get_option('sixth_about_first_icon')?>"></i>

                            </div>

                            <h3><?=get_option('sixth_about_first_icon_title'.$lang)?></h3>

                            <p>

                                <?php 
                                    $catContent = get_option('sixth_about_first_icon_content'.$lang);
                                    $stripped = strip_tags($catContent, '<p>'); //replace <p> and <a> with whatever tags you want to keep after the strip
                                    echo $stripped;
                                ?>

                            </p>

                        </div>

                    </div>

					<div class="col-xl-4 col-md-6">

                        <div class="service-box">

                            <div class="hover-line">

                                <i class="<?=get_option('sixth_about_second_icon')?>"></i>

                            </div>

                            <h3><?=get_option('sixth_about_second_icon_title'.$lang)?></h3>

                            <p>

                                
                                <?php 
                                    $catContent = get_option('sixth_about_second_icon_content'.$lang);
                                    $stripped = strip_tags($catContent, '<p>'); //replace <p> and <a> with whatever tags you want to keep after the strip
                                    echo $stripped;
                                ?>

                            </p>

                        </div>

                    </div>

                    <div class="col-xl-4 col-md-6">

                        <div class="service-box">

                            <div class="hover-line">

                                <i class="<?=get_option('sixth_about_third_icon')?>"></i>

                            </div>

                            <h3><?=get_option('sixth_about_third_icon_title'.$lang)?></h3>

                            <p>

                                
                                <?php 
                                    $catContent = get_option('sixth_about_third_icon_content'.$lang);
                                    $stripped = strip_tags($catContent, '<p>'); //replace <p> and <a> with whatever tags you want to keep after the strip
                                    echo $stripped;
                                ?>

                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

<!-- service section end -->

<?php endif ?>

<?php if (get_option('about_testimonials_hidden'.$lang) != '1')  : 

 $team = sand_get_testimonials(get_option('about_testimonials_number'.$lang));

   if($team->have_posts()):

?>

<!-- testimonial section start -->

<section class="testimonial-style-1">

    <div class="container">

        <div class="row">

            <div class="col">

                <div class="title-2">

                    <h2><?=get_option('about_testimonials_title'.$lang) ?></h2>

                    <p><?=get_option('about_testimonials_content'.$lang) ?></p>

                </div>

                <div class="slick-between">

                    <div class="testimonial-1 dot-gradient">

        			<?php while ( $team->have_posts() ) : $team->the_post(); ?>

                        <div>

                            <div class="pepole-comment">

                                <div class="client-msg">

                                    <span class="quote">

                                        <img src="<?=sand_URL.'assets/img/quote.png'?>" alt="<?php the_title()?>">

                                    </span>

                                    <p>

                                    	<?php the_content()?>

                                    </p>

                                </div>

                                <div class="media">

                                    <img src="<?php the_post_thumbnail_url()?>" alt="<?php the_title()?>">

                                    <div class="media-body">

                                        <h3><?php the_title()?></h3>

                                    </div>

                                </div>

                            </div>

                        </div>

            			<?php endwhile; wp_reset_query(); ?>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

<!-- testimonial section end -->

<?php endif; endif?>

<?php get_footer()?>