<?php 

    get_header();

    get_template_part('template-parts/page-title'); 

    if ( have_posts() ) :

    if ( empty(pll_current_language()) )

        $lang = '_'.pll_default_language();

    else

        $lang = '_'.pll_current_language(); // For multilanguage options



    while ( have_posts() ) : the_post(); $property_id = get_the_ID();

    $property_price                 = get_post_meta($property_id, 'property_price', true);

    $GLOBALS[ 'property_priceG' ]   = number_format( $property_price , 0 , '.' , ',' ).__(' AED' ,'sand');

    $GLOBALS[ 'property_idG' ]      = $property_id;

    $GLOBALS[ 'locationsG' ]        = '';

    $down_payment                   = get_post_meta($property_id, 'down_payment', true);

    $property_size                  = get_post_meta($property_id, 'property_size', true);

    $land_area                      = get_post_meta($property_id, 'land_area', true);

    $property_bed                   = get_post_meta($property_id, 'bedroom_num', true);

    $property_bath                  = get_post_meta($property_id, 'bathroom_num', true);

    $property_ref_no                = get_post_meta($property_id, 'property_ref_no', true);

?>

    <!-- single property header start -->

    <section class="without-top property-main small-section">

        <div class="single-property-section">

            <div class="container">

                <div class="single-title">

                    <?php if (  empty($property_price) && empty($down_payment) ): ?>

                    <div class="left-single" style = "width:100%;" >

                    <?php else: ?>

                    <div class="left-single">

                    <?php endif; ?>

                        <div class="d-flex">

                            <span>

                            <?php

                                $terms = wp_get_post_terms( $property_id , array( 'type') );

                                $GLOBALS[ 'typesG' ] = '';

                                if ( !empty($terms) ) :?>

                                    <span class="label label-danger me-2 mb-2">

                                        <?php

                                        $i = 1;

                                        foreach ( $terms as $term ) {?>

                                            <a href ="<?= esc_url(get_term_link($term))?>" style = 'color:#fff;' >

                                            <?php

                                            echo $term->name; echo ($i < count($terms))? "" : "";

                                            $GLOBALS[ 'typesG' ] = $GLOBALS[ 'typesG' ].$term->name; echo ($i < count($terms))? " , " : "";

                                            $i++;

                                        }?>

                                        </a>

                                    </span>



                            <?php endif; ?>

                            <?php

                                $property_status = get_post_meta( $property_id, 'property_status', true );

                                $args = array(

                                    'meta_key' => '_wp_page_template',

                                    'meta_value' => 'page-rent-sale.php'

                                );

                                $Page = get_pages($args)[0];

                                $rentSale = get_permalink( $Page->ID );

                                $rentSale = $rentSale.'?status='.$property_status;

                                if ( $property_status == 'sale' ): ?>

                                        <a class="mt-1" href="<?= $rentSale ?>">

                                            <span class="label label-shadow"><?php _e('sale', 'sand'); ?></span>

                                        </a>

                                    <?php

                                else: ?>

                                        <a class="mt-1" href = "<?= $rentSale ?>" >

                                            <span class="label label-shadow"><?php _e('rent', 'sand'); ?></span>

                                        </a>

                                    <?php

                                endif;

                            ?>

                            </span>

                        </div>

                        <h2 class="mb-0 mt-3"><?php the_title(); ?> </h2>

                        <p class="mt-1">

                            <?php

                            $terms = wp_get_post_terms( $property_id , array( 'location') );

                            if ( !empty($terms) ):?>

                                <i class="fas fa-map-marker-alt"></i>

                                <?php

                                    $i = 1;

                                    foreach ( $terms as $term ) {

                                        echo '<a href="'.esc_url(get_term_link($term)).'" class=""> '.$term->name.' </a> ';echo ($i < count($terms))? "," : "";

                                        $GLOBALS[ 'locationsG' ] = $GLOBALS[ 'locationsG' ].$term->name;

                                        $separator = ($i < count($terms))? "," : "";

                                        $GLOBALS[ 'locationsG' ] = $GLOBALS[ 'locationsG' ].$separator;

                                        $i++;

                                    }

                            endif;?>

                        </p>

                         <?php if ( !empty($property_bed) && !empty($property_bath) && !empty($property_size) ): ?>

                        <ul>

                            <?php if ( !empty($property_bed) ):?>

                            <li>

                                <div>

                                    <img src="<?=sand_URL.'assets/img/icon/double-bed.svg'?>" class="img-fluid" alt="">

                                    <span>

                                        <?php

                                            _e('Bed', 'sand');

                                            echo ' : '.$property_bed;

                                        ?>

                                    </span>

                                </div>

                            </li>

                            <?php endif ?>

                            <?php if ( !empty($property_bath) ):?>

                            <li>

                                <div>

                                    <img src="<?=sand_URL.'assets/img/icon/bathroom.svg'?>" class="img-fluid" alt="">

                                    <span>

                                        <?php

                                            _e('Baths', 'sand');

                                            echo ' : '.$property_bath;

                                        ?>

                                    </span>

                                </div>

                            </li>

                            <?php endif ?>

                            <?php if ( !empty($property_size) ):?>

                            <li>

                                <div>

                                    <img src="<?=sand_URL.'assets/img/icon/square-ruler-tool.svg'?>" class="img-fluid" alt="">

                                    <span>

                                        <?php

                                            _e('Sqm', 'sand');

                                            echo ' : '.$property_size;

                                        ?>

                                    </span>

                                </div>

                            </li>

                            <?php endif ?>

                        </ul>

                        <?php endif; ?>

                    </div>

                    <?php if ( !( empty($property_price) && empty($down_payment) ) ): ?>

                    <div class="right-single">
                        <span><?= _e('AED','sand'); ?> </span>
                        <h2 class="price">
                            <?php echo number_format( $property_price , 0 , '.' , ',' ); ?> 
                        </h2>
                        <span> / <?php _e('Start From', 'sand'); ?></span>

                    </div>

                    <?php endif; ?>

                </div>

            </div>

        </div>

    </section>

    <!-- single property header end -->



    <!-- single property start -->

    <section class="single-property mt-0 pt-0">

        <?php $amenities = get_post_meta($property_id, 'property_amenities', true); ?>

        <div class="container">

            <div class="row ratio_55">

                <div class="col-xl-12">

                    <div class="description-section tab-description">

                        <div class="description-details">

                            <div class="row">

                                <div class="col-sm-12">

                                    <div class="single-gallery mb-4">

                                        <?php  

                                            $first_images =  get_post_meta(get_the_ID(),'thumbnail_id');

                                            if(!empty($first_images)): 

                                        ?>

                                        <div class="gallery-for">

                                            <?php

                                                foreach ($first_images as $first_image) :

                                                $slider_image = wp_get_attachment_image_src($first_image, 'full')[0];

                                            ?>

                                            <div>

                                                <div class="bg-size">

                                                    <img src="<?=$slider_image?>" class="bg-img" alt="">

                                                </div>

                                            </div>

                                            <?php endforeach;?>

                                        </div>

                                        <div class="gallery-nav">

                                            <?php

                                                foreach ($first_images as $first_image) :

                                                $slider_image = wp_get_attachment_image_src($first_image, 'large')[0];

                                            ?>

                                            <div>

                                                <img src="<?=$slider_image?>" class="img-fluid" alt="">

                                            </div>

                                            <?php endforeach;?>

                                        </div>

                                        <?php endif ?>

                                    </div>

                                </div>

                            </div>

                            <div class="desc-box">

                                <ul class="nav nav-tabs line-tab" id="top-tab" role="tablist">

                                <?php $content = get_the_content(); $content = wpautop( $content );

                                if ( !empty( $content ) ): ?>

                                    <li class="nav-item"><a data-bs-toggle="tab" class="nav-link active" href="#about"><?= _e('about', 'sand'); ?></a></li>

                                    <li class="nav-item"><a data-bs-toggle="tab" class="nav-link" href="#details"><?= _e('details', 'sand'); ?></a></li>

                                <?php else: ?>

                                    <li class="nav-item"><a data-bs-toggle="tab" class="active" href="#details"><?= _e('details', 'sand'); ?></a></li>

                                <?php endif ?>



                                <?php if ( !empty ($amenities[0]) && !empty ( $amenities[0][0] ) && $amenities != '' ):?>

                                    <li class="nav-item"><a data-bs-toggle="tab" class="nav-link" href="#feature"><?= _e('features', 'sand'); ?></a></li>

                                <?php endif;?>



                                <?php

                                $property_video = get_post_meta($property_id, 'property_video_url', true) ;

                                if ( !empty( $property_video ) ): ?>

                                    <li class="nav-item"><a data-bs-toggle="tab" class="nav-link" href="#video"><?= _e('video', 'sand'); ?></a></li>

                                <?php endif;?>


                                <?php $property_brochure = get_post_meta($property_id, 'property_brochure', true);
                                if ( !empty( $property_brochure ) ):?>
                                    <li class="nav-item"><a data-bs-toggle="tab" class="nav-link" href="#attachments"><?= _e('Attachments', 'sand'); ?></a></li>
                                <?php endif ?>
                                <?php

                                $property_location = get_post_meta($property_id, 'property_location', true);

                                if ( !empty( $property_location ) ): ?>

                                    <li class="nav-item"><a data-bs-toggle="tab" class="nav-link" href="#location-map"><?= _e('Location', 'sand'); ?></a></li>

                                <?php endif; ?>

                                </ul>

                                <div class=" tab-content" id="top-tabContent">

                                    <?php if ( !empty( $content ) ): ?>

                                    <div class="tab-pane fade show active about page-section" id="about">

                                        <h4 class="content-title">

                                            <?= __('Property Details', 'sand'); ?>

                                        </h4>

                                        <?=$content?>

                                    </div>

                                    <?php endif ?>

                                    <div class="tab-pane fade<?php if ( empty( $content ) ): ?>show active <?php endif ?>  page-section" id="details">

                                        <h4 class="content-title"><?= __('features', 'sand'); ?></h4>

                                        <div class="single-feature row">

                                            <div class="col-md-6 col-xl-6">

                                                <ul class="property-list-details">

                                                    <?php if ( !empty($property_price) ): ?>

                                                    <li><span><?php _e('Price', 'sand');?> :</span> <?php echo number_format( $property_price , 0 , '.' , ',' ); _e(' AED' ,'sand'); ?></li>

                                                    <?php endif; ?>



                                                    <?php $commercial = get_post_meta( $property_id, 'property_commercial', true );

                                                    if ( !empty($commercial) ): ?>

                                                    <li><span><?= __('Commercial Property','sand'); ?></span></li>

                                                    <?php endif; ?>



                                                    <?php

                                                    $terms = wp_get_post_terms( $property_id , array( 'type') );

                                                    if ( !empty($terms) ): ?>

                                                    <li><span><?php _e('Property Type', 'sand'); ?> :</span>

                                                        <?php

                                                            $i = 1;

                                                            foreach ( $terms as $term ) {

                                                                echo $term->name; echo ($i < count($terms))? " , " : "";

                                                            $i++;}

                                                        ?>

                                                    </li>

                                                    <?php endif; ?>

                                                    <li><span><?php _e('Property status', 'sand')?> :</span>

                                                    <?php

                                                        $property_status = get_post_meta( $property_id, 'property_status', true );

                                                        if ( $property_status == 'sale' ): ?>

                                                            <?php _e('For sale', 'sand'); ?>

                                                        <?php else: ?>

                                                            <?php _e('For rent', 'sand'); ?>

                                                        <?php endif;?>

                                                    </li>

                                                    <?php if ( !empty($property_bath) ): ?>

                                                    <li><span><?php _e('Bathrooms', 'sand');?> :</span> <?= $property_bath ?></li>

                                                    <?php endif; ?>



                                                    <?php if ( !empty($property_bed) ): ?>

                                                    <li><span><?php _e('Bedrooms', 'sand');?> :</span> <?= $property_bed ?></li>

                                                    <?php endif; ?>

                                                </ul>

                                            </div>

                                            <div class="col-md-6 col-xl-6">

                                                <ul class="property-list-details">

                                                    <?php if ( !empty($down_payment) ): ?>

                                                    <li><span><?php _e('Down Payment', 'sand');?> :</span> <?= $down_payment; ?></li>

                                                    <?php endif; ?>

                                                    <?php if ( !empty($property_size) ): ?>

                                                    <li><span><?php _e('Built Area', 'sand');?> :</span> <?= $property_size.' '; _e('Sqm', 'sand'); ?></li>

                                                    <?php endif; ?>

                                                    <?php if ( !empty($land_area) ): ?>

                                                    <li><span><?php _e('Land Area', 'sand');?> :</span> <?= $land_area.' '; _e('Sqm', 'sand'); ?></li>

                                                    <?php endif; ?>

                                                     <?php if ( !empty($property_ref_no) ): ?>

                                                    <li><span><?php _e('Reference Number', 'sand');?> :</span> <?= $property_ref_no ?></li>

                                                    <?php endif; ?>

                                                </ul>

                                            </div>

                                        </div>

                                    </div>

                                    <?php if(!empty($amenities) && $amenities[0] != ''):?>

                                    <div class="tab-pane fade page-section" id="feature">

                                        <h4 class="content-title"><?= __('Features', 'sand'); ?></h4>

                                        <div class="single-feature row">

                                            <div class="col-xl-12 col-12">

                                                <ul>

                                                    <?php foreach($amenities as $amenity):?>

                                                    <li>

                                                        <i class="fas fa-check"></i> <?= $amenity ?>

                                                    </li>

                                                    <?php endforeach; ?>

                                                </ul>

                                            </div>

                                        </div>

                                    </div>

                                    <?php endif;?>
                                    <?php $property_brochure = get_post_meta($property_id, 'property_brochure', true);

                                        if ( !empty( $property_brochure ) ):?>
                                    <div class="tab-pane fade page-section" id="attachments">

                                        <h4 class="content-title mt-4"><?php _e('Attachments', 'sand'); ?></h4>

                                            <a href="<?= $property_brochure ?>" class="btn btn-gradient color-6"><i class="far fa-file-pdf"></i> <?php _e('Download Property Document', 'sand'); ?></a>

                                    </div>
                                    <?php endif;?>
                                    <?php if ( !empty( $property_video ) ): ?>

                                    <div class="tab-pane fade page-section" id="video">

                                        <h4 class="content-title"><?= __('Video', 'sand'); ?></h4>

                                        <div class="play-bg-image">

                                            <div class="bg-size">

                                                <img src="<?= get_the_post_thumbnail_url( $property_id ) ?>" class="bg-img" alt="">

                                            </div>

                                            <div class="icon-video">

                                                <a href="javascript:void(0)" data-bs-toggle="modal"

                                                    data-bs-target="#videomodal">

                                                    <i class="fas fa-play"></i>

                                                </a>

                                            </div>

                                        </div>

                                    </div>

                                    <?php endif; ?>

                                    <?php if ( !empty( $property_location ) ): ?>

                                    <div class="tab-pane fade page-section" id="location-map">

                                        <h4 class="content-title"><?php _e('Location', 'sand'); ?></h4>

                                        <?= $property_location ?>

                                    </div>

                                    <?php endif; ?>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

    <!-- single property end -->

    <!-- video modal start -->

    <div class="modal fade video-modal" id="videomodal">

        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">

            <div class="modal-content">

                <div class="modal-body">

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><span

                            aria-hidden="true">×</span></button>

                    <iframe title="realestate" src="<?= $property_video; ?>" allowfullscreen></iframe>

                </div>

            </div>

        </div>

    </div>

    <!-- video modal end -->

<?php endwhile;endif;get_footer()?>