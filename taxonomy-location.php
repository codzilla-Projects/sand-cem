<?php get_header();

if ( empty(pll_current_language()) )
    $lang = '_'.pll_default_language();
else
    $lang = '_'.pll_current_language(); // For multilanguage options
get_template_part('template-parts/page-title'); 
$location_term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
$properties = sand_get_property_with_location(6, $location_term->term_id);
if ( $properties->have_posts() ):
    ?>

<!-- property grid start -->
<section class="property-section">
    <div class="container">
        <div class="row ratio_55">
            <div class="col-12 property-grid-slider property-grid-2">
                <div class="filter-panel">
                    <div class="top-panel">
                        <div>
                            <h2><?php _e('Properties Listing', 'sand'); ?></h2>
                        </div>
                        <ul class="grid-list-filter d-flex">
                            <li class="collection-grid-view">
                                <ul>
                                    <li><img src="<?=sand_URL.'assets/img/icon/2.png'?>" alt="" class="product-2-layout-view"></li>
                                </ul>
                            </li>
                            <li class="grid-btn">
                                <a href="javascript:void(0)" class="grid-layout-view">
                                    <i data-feather="grid"></i>
                                </a>
                            </li>
                            <li class="list-btn active">
                                <a href="javascript:void(0)" class="list-layout-view">
                                    <i data-feather="list"></i>
                                </a>
                            </li>
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
                                    if(!empty($first_images)): 
                                ?>
                                <div class="property-slider ">
                                    <?php
                                        foreach ($first_images as $first_image) :
                                        $slider_image = wp_get_attachment_image_src($first_image, 'large')[0];
                                    ?>
                                    <a href="javascript:void(0)">
                                        <img src="<?=$slider_image?>" class="bg-img" alt="">
                                    </a>
                                <?php endforeach;?>
                                </div>
                                <?php endif?>
                                <div class="labels-left">
                                    <?php
                                        $terms = wp_get_post_terms( $property_id , array( 'type') );
                                        if (!empty($terms)):
                                    ?>
                                    <div>
                                        <span class="label label-dark"><?php
                                            $i = 1;
                                            foreach ( $terms as $term ) {?>
                                                <a href = <?= esc_url( get_term_link( $term )  ) ?>>
                                                <?php
                                                echo $term->name; echo ($i < count($terms))? " , " : "";
                                                $i++;
                                            }?>
                                            </a>
                                        </span>
                                    </div>
                                    <?php endif; ?>
                                    <?php
                                        $property_status = get_post_meta( $property_id, 'property_status', true );
                                        $args = array(
                                            'meta_key' => '_wp_page_template',
                                            'meta_value' => 'page-rent-sale.php'
                                        );
                                        $Page = get_pages($args)[0];
                                        $rentSale = get_permalink( $Page->ID );
                                        if ( $property_status == 'sale' ): ?>
                                            <a href="<?= $rentSale.'?status='.$property_status ?>">
                                                <span class="label label-shadow"><?php _e('sale', 'sand'); ?></span>
                                            </a>
                                            <?php
                                        else: ?>
                                            <a href = "<?= $rentSale.'?status='.$property_status ?>" >
                                                <span class="label label-shadow"><?php _e('rent', 'sand'); ?></span>
                                            </a>
                                            <?php
                                        endif; ?>
                                </div>
                                <div class="seen-data">
                                    <i data-feather="camera"></i>
                                    <span><?=count(get_post_meta($property_id,'thumbnail_id'));?></span>
                                </div>
                            </div>
                            <div class="property-details">
                                <span class="font-roboto"><?php
                                    $terms = wp_get_post_terms( $property_id , array( 'location') );
                                    $i = 1;
                                    foreach ( $terms as $term ) {
                                        echo '<a href="'. esc_url( get_term_link( $term )  ) . '" style="color: #959595"> '.$term->name.' </a> ';echo ($i < count($terms))? " , " : "";
                                    $i++;}?>
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
                <nav class="theme-pagination">
                        <?php $args = array(
                                'format'             => '?paged=%#%',
                                'current'            => max( 1, get_query_var('paged') ),
                                'total'              => $properties->max_num_pages,
                                'show_all'           => false,
                                'end_size'           => 1,
                                'mid_size'           => 2,
                                'next_text'          => '<span aria-hidden="true">»</span><span class="sr-only">'.__('Next', 'insider').'</span>',
                                'prev_text'          => '<span aria-hidden="true">«</span><span class="sr-only">'.__('Previous', 'insider').'</span>',
                                'type'               => 'list',
                             );
                             echo paginate_links($args);
                        ?>
                    </nav>
            </div>
        </div>
    </div>
</section>
<!-- property grid end -->
<?php endif ?>

<?php get_footer(); ?>
