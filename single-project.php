<?php 

    get_header();

    get_template_part('template-parts/page-title'); 

    if ( have_posts() ) :

    if ( empty(pll_current_language()) )

        $lang = '_'.pll_default_language();

    else

        $lang = '_'.pll_current_language(); // For multilanguage options



    while ( have_posts() ) : the_post(); $project_id = get_the_ID();

    $amenities = get_post_meta($project_id, 'project_amenities', true);

    $project_brochure = get_post_meta($project_id, 'project_brochure', true);

    $project_essentials = get_post_meta($project_id, 'project_essentials', true);

    $payment_plans = get_post_meta($project_id, 'payment_plans', true);

?>

    <!-- single property start -->

    <section class="single-property mt-5 pt-3">

        <?php $amenities = get_post_meta($project_id, 'project_amenities', true); ?>

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

                                    <?php

                                    $content = get_the_content();

                                    if ( !empty( $content ) ): ?>

                                        <li class="nav-item">

                                            <a data-bs-toggle="tab" class="nav-link active" href="#about"><?= __('about', 'sand'); ?></a>

                                        </li>

                                    <?php endif ?>



                                    <?php if ( !empty( $project_brochure ) ): ?>

                                        <li class="nav-item"><a data-bs-toggle="tab" class="nav-link" href="#details"><?= __('Attachments', 'sand'); ?></a></li>

                                    <?php endif;?>



                                    <?php if ( !empty($payment_plans ) &&  $payment_plans[0]->title != '' ):?>

                                        <li class="nav-item"><a data-bs-toggle="tab" class="nav-link" href="#paymentPlans"><?= __('payment plans', 'sand'); ?></a></li>

                                    <?php endif;?>



                                    <?php if(!empty($amenities) && $amenities[0] != ''):?>

                                        <li class="nav-item"><a data-bs-toggle="tab" class="nav-link" href="#feature"><?= __('Features', 'sand'); ?></a></li>

                                    <?php endif;?>



                                    <?php if ( !empty ($project_essentials) && $project_essentials[0] != ''):?>

                                        <li class="nav-item"><a data-bs-toggle="tab" class="nav-link" href="#essentials"><?= __('essentials', 'sand'); ?></a></li>

                                    <?php endif;?>



                                    <?php

                                    $project_video = get_post_meta($project_id, 'project_video', true) ;

                                    if ( !empty( $project_video ) ): ?>

                                        <li class="nav-item"><a data-bs-toggle="tab" class="nav-link" href="#video"><?= __('video', 'sand'); ?></a></li>

                                    <?php endif;?>



                                    <?php

                                    $project_location = get_post_meta($project_id, 'project_location', true);

                                    if ( !empty( $project_location ) ): ?>

                                        <li class="nav-item"><a data-bs-toggle="tab" class="nav-link" href="#location-map"><?= __('Location', 'sand'); ?></a></li>

                                    <?php endif; ?>

                                </ul>

                                <div class=" tab-content" id="top-tabContent">

                                    <?php if ( !empty( $content ) ): ?>

                                    <div class="tab-pane fade show active about page-section" id="about">

                                       <h4><?= __('About', 'sand'); ?></h4>

                                        <div class="about-content">

                                            <?= $content; ?>

                                        </div>

                                    </div>

                                    <?php endif ?>



                                    <?php if ( !empty( $project_brochure ) ):?>

                                    <div class="tab-pane fade<?php if ( empty( $content ) ): ?>show active <?php endif ?>  page-section" id="details">

                                        <h4 class="content-title"><?php _e('Attachments', 'sand'); ?></h4>

                                        <a href="<?= $project_brochure ?>" class="btn btn-gradient color-6">

                                            <i class="far fa-file-pdf"></i> 

                                            <?php _e('Download project Document', 'sand'); ?>

                                        </a>

                                    </div>

                                    <?php endif;?>

                                   <?php if ( !empty($payment_plans ) &&  $payment_plans[0]->title != '' ) :?>

                                    <div class="tab-pane fade page-section" id="paymentPlans">

                                        <div class="row offer-section">

                                            <div class="col">

                                                <h4 class="content-title"><?= __('Payment Plans', 'sand'); ?></h4>

                                                <div class="row">

                                                    <?php

                                                    foreach ( $payment_plans as $key => $payment_plan ) :

                                                    ?>

                                                        <div class="col-md-3 mb-4">

                                                            <div class="offer-wrapper">

                                                                <div class="media">

                                                                    <div class="offer-icon">

                                                                        <img src="<?=sand_URL.'assets/img/icon/calendar.png';?>" alt="">

                                                                    </div>

                                                                    <div class="media-body">

                                                                        <h6><?php if( $payment_plan->title != '') echo $payment_plan->title; ?></h6>

                                                                        <h3><?php if( $payment_plan->percentage != '') echo $payment_plan->percentage; ?></h3>

                                                                        <p><?php if( $payment_plan->plan_date != '') echo $payment_plan->plan_date; ?></p>

                                                                    </div>

                                                                </div>

                                                            </div>

                                                        </div>

                                                    <?php endforeach;?>

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                    <?php endif ?>

                                    <?php if(!empty($amenities) && $amenities[0] != ''):?>

                                    <div class="tab-pane fade page-section" id="feature">

                                        <h4 class="content-title"><?= __('features', 'sand'); ?></h4>

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

                                    <?php if(!empty($project_essentials) && $project_essentials[0] != ''):?>

                                    <div class="tab-pane fade page-section" id="essentials">

                                        <h4 class="content-title"><?= __('essentials', 'sand'); ?></h4>

                                        <div class="single-feature row">



                                            <div class="col-xl-12 col-12">

                                                <ul>

                                                    <?php foreach($project_essentials as $project_essential):?>

                                                        <li>

                                                            <i class="fas fa-check"></i> <?= $project_essential ?>

                                                        </li>

                                                    <?php endforeach; ?>

                                                </ul>

                                            </div>



                                        </div>

                                    </div>

                                    <?php endif;?>

                                    <?php if ( !empty( $project_video ) ): ?>

                                    <div class="tab-pane fade page-section" id="video">

                                        <h4 class="content-title"><?= __('Video', 'sand'); ?></h4>

                                        <div class="play-bg-image">

                                            <div class="bg-size">

                                                <img src="<?= get_the_post_thumbnail_url( $project_id ) ?>" class="bg-img" alt="">

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

                                    <?php if ( !empty( $project_location ) ): ?>

                                    <div class="tab-pane fade page-section" id="location-map">

                                        <h4 class="content-title"><?php _e('Location', 'sand'); ?></h4>

                                        <?= $project_location ?>

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
    <?php 
        $properties = sand_get_property_projects(3, $project_id);
        if($properties->have_posts()) :
    ?>
    <section class="property-section pt-0">
    <div class="container">
        <div class="row ratio_55">
            <div class="col-12 property-grid-slider property-grid-2">
                <div class="filter-panel border-bottom-0">
                    <div class="text-center">
                        <div>
                            <h2><?php _e('Project Properties', 'sand'); ?></h2>
                        </div>
                        </ul>
                    </div>
                </div>
                <div class="property-wrapper-grid">
                    <div class="property-2 row column-sm property-label property-grid">
                    <?php 
                        while ( $properties->have_posts() ) : $properties->the_post();
                        $property_id = get_the_ID();
                        $property_title = wp_trim_words( get_the_title($property_id), $num_words = 5, $more = '… ' );
                    ?>
                    <div class="col-xl-4 col-md-6 wow fadeInUp">

                        <div class="property-box">

                            <div class="property-image">

                                <?php  

                                    $first_images =  get_post_meta(get_the_ID(),'thumbnail_id');
                                    $I = 0;
                                    if(!empty($first_images)): 

                                ?>

                                <div class="property-slider ">

                                    <?php

                                        foreach ($first_images as $first_image) :

                                        $slider_image = wp_get_attachment_image_src($first_image, 'large')[0];
                                        if ($i == 4) break;
                                    ?>

                                    <a href="javascript:void(0)">

                                        <img src="<?=$slider_image?>" class="bg-img" alt="">

                                    </a>

                                <?php $i++; endforeach;?>

                                </div>

                                <?php endif?>

                                

                                <div class="seen-data">

                                    <i data-feather="camera"></i>

                                    <span><?=count(get_post_meta($property_id,'thumbnail_id'));?></span>

                                </div>

                                <div class="labels-left">

                                    

                                    <?php

                                        $property_status = get_post_meta( $property_id, 'property_status', true );

                                        $args = array(

                                            'meta_key' => '_wp_page_template',

                                            'meta_value' => 'page-rent-sale.php'

                                        );

                                        $Page = get_pages($args)[0];

                                        $rentSale = get_permalink( $Page->ID );

                                        if ( $property_status == 'sale' ): ?>
                                                <span class="label label-shadow"><?php _e('For Sale', 'sand'); ?></span>
                                            <?php

                                        else: ?>


                                                <span class="label label-shadow"><?php _e('Fore Rent', 'sand'); ?></span>
                                            <?php

                                        endif; ?>

                                        <?php

                                        $terms = wp_get_post_terms( $property_id , array( 'type') );

                                        if (!empty($terms)):

                                    ?>

                                    <div>

                                        <span class="label label-dark"><?php

                                            $i = 1;

                                            foreach ( $terms as $term ) {?>

                                                <a href = <?= esc_url( $term_link ) ?>>

                                                <?php

                                                echo $term->name; echo ($i < count($terms))? "<span> ,</span> " : "";

                                                $i++;
                                                if ($i == 3) break;

                                            }?>

                                            </a>

                                        </span>

                                    </div>

                                    <?php endif; ?>

                                </div>

                            </div>

                            <div class="property-details">

                                <span class="font-roboto"><?php

                                    $terms = wp_get_post_terms( $property_id , array( 'location') );

                                    $i = 1;

                                    foreach ( $terms as $term ) {

                                        echo '<a href="'. esc_url( $term_link ) . '" style="color: #959595"> '.$term->name.' </a> ';echo ($i < count($terms))? " <span>,</span> " : "";

                                    $i++;
                                    if ($i == 3) break;
                                }?>

                                </span>

                                <a href="<?php the_permalink(); ?>">

                                    <h3><?php echo $property_title; ?></h3>

                                </a>

                                <?php

                                    $property_price = get_post_meta( $property_id, 'property_price', true );

                                    if (!empty($property_price)):?>

                                        <h6 class="color-1 property_price-h6"><?=number_format( $property_price , 0 , '.' , ',' ); _e(' AED' ,'sand');?></h6>

                                    <?php endif; ?>

                                <ul>



                                    <?php

                                    $property_bed = get_post_meta( $property_id, 'bedroom_num', true );

                                    if ( !empty($property_bed) ):?>

                                        <li><img src="<?=sand_URL.'assets/img/icon/double-bed.svg' ;?>" class="img-fluid" alt="">

                                        <?php

                                            _e('Bed', 'sand');

                                            echo ' : '.$property_bed;

                                        ?>

                                        </li>

                                    <?php endif; ?>



                                    <?php

                                    $property_bath = get_post_meta( $property_id, 'bathroom_num', true );

                                    if ( !empty($property_bath) ):?>

                                        <li><img src="<?=sand_URL.'assets/img/icon/bathroom.svg' ;?>" class="img-fluid" alt="">

                                            <?php

                                                _e('Baths', 'sand');

                                                echo ' : '.$property_bath;

                                            ?>

                                        </li>

                                    <?php endif; ?>



                                    <?php

                                    $property_size = get_post_meta( $property_id, 'property_size', true );

                                    if ( !empty($property_size) ):?>

                                        <li><img src="<?=sand_URL.'assets/img/icon/square-ruler-tool.svg'; ?>" class="img-fluid ruler-tool" alt="">

                                            <?php

                                                _e('Sqm', 'sand');

                                                echo ' : '.$property_size;

                                            ?>

                                        </li>

                                    <?php endif; ?>

                                </ul>

                                <div class="property-btn d-flex">

                                    <span><?= get_the_date( 'F j, Y' ) ?></span>

                                    <a href="<?php the_permalink() ?>" class="btn btn-dashed btn-pill color-2"> <?php _e('Details', 'sand'); ?></a>

                                </div>

                            </div>

                        </div>
                    </div>
                    <?php endwhile; wp_reset_query();?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif;?>
    <!-- single project end -->

        <!-- video modal start -->

    <div class="modal fade video-modal" id="videomodal">

        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">

            <div class="modal-content">

                <div class="modal-body">

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><span

                            aria-hidden="true">×</span></button>

                    <iframe title="realestate" src="<?= $project_video; ?>" allowfullscreen></iframe>

                </div>

            </div>

        </div>

    </div>

    <!-- video modal end -->

<?php endwhile;endif;get_footer()?>