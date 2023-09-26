<?php get_header();

    if ( empty(pll_current_language()) )

        $lang = '_'.pll_default_language();

    else

        $lang = '_'.pll_current_language();

?>                                

<?php if (get_option('slider_hidden'.$lang) != '1')  : ?>

    <!-- home section start -->

    <section class="home-section layout-1 layout-6">

        <div class="home-main" style="background: url('<?=get_option('slider_img')?>');">

            <div class="container">

                <div class="row">

                    <div class="col-lg-7">

                        <div class="container">

                            <div class="home-left">

                                <div>

                                    <?php 

                                        $no = get_option('slider_number'.$lang);

                                        $slides = sand_get_sliders($no);

                                        if($slides->have_posts()) :

                                    ?>

                                    <div class="home-slider-1 arrow-light slick-shadow">

                                        <?php while($slides->have_posts()) : $slides->the_post();?>

                                        <div>

                                            <div class="home-content">

                                                <div>

                                                    <h6><?php the_title(); ?></h6>

                                                    <h1><?php the_content(); ?></h1>

                                                     <?php 



                                                        $btn_txt = get_post_meta( get_the_ID(), 'slider_btn_txt', true );



                                                        $btn_url = get_post_meta( get_the_ID(), 'slider_btn_url', true );



                                                        if ( !empty($btn_txt) && !empty($btn_url) ):?>



                                                            <a href="<?= $btn_url ?>" class="btn btn-gradient color-6"><?= $btn_txt ?></a>



                                                        <?php endif; ?>

                                                </div>

                                            </div>

                                        </div>

                                        <?php endwhile; wp_reset_query();?>

                                    </div>

                                    <?php 

                                        $types = get_terms( array(

                                            'taxonomy'      => 'type',

                                            'orderby'       => 'ID',

                                            'order'         => 'ASC',

                                            'hide_empty'    => true,

                                            'include'       => get_option('type_slider_category'.$lang),

                                            'number'        => 3

                                            )

                                        );

                                        if ( !empty($types) ) :

                                    ?>

                                    <div class="looking-icons">

                                        <h5><?php _e('What are you looking for?','sand'); ?></h5>

                                        <ul>

                                            <?php

                                                foreach ($types as $type):

                                                $type_id = $type->term_id;

                                            ?>

                                            <li>

                                                <a href="<?= esc_url(get_term_link($type))?>" class="looking-icon">

                                                    <?php 

                                                        $icon = get_term_meta( $type_id, 'add_font_icon', true );

                                                        if (!empty($icon)) :

                                                    ?>

                                                    <i class="<?=$icon?>"></i>

                                                    <?php endif?>

                                                    <h6><?=$type->name; ?></h6>

                                                </a>

                                            </li>

                                            <?php endforeach;?>

                                        </ul>

                                    </div>

                                    <?php endif ?>

                                </div>

                            </div>

                        </div>

                    </div>

                    <?php endif; ?>

                    <div class="col-xl-4 col-lg-5">

                        <div class="home-search-6">

                            <div class="vertical-search">

                                <div class="left-sidebar">

                                    <form class="advanced_search" id="sellSearchForm" action="<?php echo home_url('/'); ?>" method="get" >

                                        <div class="row gx-3">

                                            <div class="col-lg-12">

                                                <div class="form-group">

                                                    <label for="status" class="col-sm-12 text-left control-label text-white"><?php _e('Property Status','sand'); ?></label>

                                                    <div class="multiSelect_field">

                                                        <select  name="status" class="js-example-basic-multiple">

                                                            <option value = ''><?php _e('Choose Property Status','sand'); ?></option>

                                                            <option value="sale"><?php _e('Sale','sand'); ?></option>

                                                            <option value="rent"><?php _e('Rent','sand'); ?></option>

                                                        </select>

                                                    </div>

                                                </div>

                                            </div>


                                            <div class="col-lg-12">

                                                <div class="form-group">
                                                     <label><?php _e('Looking For','sand'); ?></label>
                                                    <input type="text" name="s" class="form-control looking-for " placeholder="<?php _e('looking for', 'sand'); ?>" />
                                                    <input type="text" hidden name="status" class="form-control" value="sale" />
                                                 </div>

                                            </div>
                                            <div class="col-lg-12">

                                                <div class="form-group">

                                                    <label><?php _e('Property Type','sand'); ?></label>

                                                    <div class="multiSelect_field">

                                                        <select name="type" class="js-example-basic-multiple">

                                                            <option value=''><?php _e('Property Type','sand'); ?></option>

                                                            <?php $property_types = get_terms( array(

                                                                'taxonomy'      => 'type',

                                                                'hide_empty'    => false,

                                                                'orderby'       => 'ID',

                                                                'order'         => 'ASC',

                                                                'hide_empty'    => false,

                                                                'child_of'      => 0,

                                                                )

                                                            );

                                                            if ( !empty($property_types) ) :?>

                                                                <?php foreach ($property_types as $property_type) :

                                                                $type_id = $property_type->term_id; ?>

                                                                    <option value="<?= $type_id;?>"><?= $property_type->name;?></option>

                                                                <?php endforeach;?>

                                                            <?php endif;?>



                                                        </select>

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="col-6">

                                                <div class="form-group">

                                                    <label><?php _e('Bed', 'sand'); ?></label>

                                                    <div class="multiSelect_field">

                                                        <select name="bedroom" class="js-example-basic-multiple">

                                                            <option value=""><?php _e('Bed', 'sand'); ?> </option>

                                                            <option value="1" >1</option>

                                                            <option value="2" >2</option>

                                                            <option value="3" >3</option>

                                                            <option value="4" >4</option>

                                                            <option value="5" >5</option>

                                                            <option value="6" >6</option>

                                                            <option value="7" >7</option>

                                                            <option value="8" >8</option>

                                                        </select>

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="col-6">

                                                <div class="form-group">

                                                    <label><?php _e('Bath', 'sand'); ?></label>

                                                    <div class="multiSelect_field">

                                                        <select name="bathroom" class="js-example-basic-multiple">

                                                            <option value=""><?php _e('Bath', 'sand'); ?> </option>

                                                            <option value="1" >1</option>

                                                            <option value="2" >2</option>

                                                            <option value="3" >3</option>

                                                            <option value="4" >4</option>

                                                            <option value="5" >5</option>

                                                            <option value="6" >6</option>

                                                            <option value="7" >7</option>

                                                            <option value="8" >8</option>

                                                        </select>

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="col-12">

                                                <div class="form-group">

                                                    <label><?php _e('Select project', 'sand'); ?></label>

                                                    <div class="multiSelect_field">

                                                        <select name="property_project" id="property_project" class = 'js-example-basic-multiple'>

                                                            <option value=''><?php esc_attr_e( 'Select project', 'sand' ); ?></option>

                                                            <?php

                                                                $args = array(

                                                                    'post_type'       => 'project',

                                                                    'post_status'     => 'publish',

                                                                    'posts_per_page'  =>  -1,

                                                                    'orderby'         => 'title',

                                                                    'order'           => 'ASC',

                                                                );

                                                                $projects = new WP_Query( $args );

                                                                if($projects->have_posts()) :

                                                            ?>

                                                            <?php while($projects->have_posts()) :

                                                                    $projects->the_post();

                                                                    $id = get_the_ID();

                                                                    $project_title = get_the_title();

                                                                ?>

                                                                <option value="<?=$id;?>" ><?= $project_title; ?></option>

                                                            <?php endwhile; wp_reset_query(); endif; ?>

                                                        </select>

                                                    </div>

                                                </div>

                                            </div>

                                          

                                            <div class="col-lg-12 col-sm-6">

                                                <div class="form-group">

                                                    <div class="price-range">

                                                        <label for="amount"><?php _e('Price: ', 'sand'); ?></label>

                                                        <input type="text" name="price" id="amount" readonly>

                                                        <div id="slider-range" class="theme-range-3"></div>

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="col-lg-12 col-sm-6">

                                                <div class="form-group">

                                                    <div class="price-range">

                                                        <label for="amount"><?php _e('Area: ', 'sand'); ?></label>

                                                        <input type="text" id="amount1" name="area" readonly>

                                                        <div id="slider-range1" class="theme-range-3"></div>

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="col-lg-12">

                                               <button type="submit"  class="btn btn-gradient color-1"><?php _e('Search', 'sand'); ?></button>

                                            </div>

                                        </div>

                                    </form>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

    <!-- home section end -->

    <?php endif; ?>

    <?php if (get_option('about_hidden'.$lang) != '1')  : ?>

    <!-- About us section start -->

    <section class="about-main">

        <div class="container">

            <div class="row">

                <div class="col">

                    <div class="title-2">

                        <h2><?=get_option('about_title'.$lang)?></h2>

                        <p class="font-roboto">

                            <?=get_option('about_content'.$lang)?>

                        </p>

                    </div>

                    <div class="user-about">

                        <div class="row">

                            <div class="col-xl-7 col-lg-5">

                                <div class="about-image">

                                    <div class="img-box side-left">

                                        <img src="<?=get_option('about_first_img') ?>" class="img-fluid" alt="">

                                        <div class="side-effect"></div>

                                    </div>

                                    <div class="img-box img-abs side-right">

                                        <img src="<?=get_option('about_second_img') ?>" class="img-fluid" alt="">

                                        <div class="side-effect"></div>

                                    </div>

                                </div>

                            </div>

                            <div class="col-xl-5 col-lg-7">

                                <div class="about-content">

                                    <h3><?=get_option('about_small_title'.$lang) ?></h3>

                                    <p class="font-roboto">

                                        <?=get_option('about_small_content'.$lang) ?>

                                    </p>

                                </div>

                                <div class="about-listing">

                                    <ul>

                                        <li>

                                            <h4>

                                                <i class="<?=get_option('about_first_icon_font') ?>"></i>

                                            </h4>

                                            <p><?=get_option('about_first_icon_title'.$lang) ?></p>

                                        </li>

                                        <li>

                                            <h4>

                                                <i class="<?=get_option('about_second_icon_font') ?>"></i>

                                            </h4>

                                            <p><?=get_option('about_second_icon_title'.$lang) ?></p>

                                        </li>

                                        <li>

                                            <h4>

                                                <i class="<?=get_option('about_third_icon_font') ?>"></i>

                                            </h4>

                                            <p><?=get_option('about_third_icon_title'.$lang) ?></p>

                                        </li>

                                    </ul>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

    <!-- About us section end -->

    <?php endif; ?>

    <?php if (get_option('property_hidden'.$lang) != '1')  : 

    $no = get_option('property_number'.$lang);

    $properties = sand_get_property($no);

    if($properties->have_posts()) :

    ?>

    <!-- property section start -->

    <section class="property-section">

        <div class="container">

            <div class="row ratio_55">

                <div class="col">

                    <div class="title-2">

                        <h2><?=get_option('property_title'.$lang);?></h2>

                        <p><?=get_option('property_content'.$lang);?></p>

                    </div>

                    <div class="property-2 row column-space color-1">

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
                                        $i = 0;
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

                                                    <span class="label label-shadow sale"><?php _e('For Sale', 'sand'); ?></span>

                                                <?php

                                            else: ?>

                                                    <span class="label label-shadow"><?php _e('For Rent', 'sand'); ?></span>

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

                                                    <a href = <?= esc_url( get_term_link( $term )  ) ?>>

                                                    <?php

                                                    echo $term->name; echo ($i < count($terms))? "<span>,</span> " : "";

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

                                            echo '<a href="'. esc_url( get_term_link( $term )  ) . '" style="color: #959595"> '.$term->name.' </a> ';echo ($i < count($terms))? " , " : "";

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

    <!-- property section end -->

    <?php endif; endif; ?>

    <?php if (get_option('property_cat_hidden'.$lang ) != '1')  : ?>

    <!-- property section tab start -->

    <section class="property-section bg-comman-2">

        <div class="container">

            <div class="row ratio_55">

                <div class="col">

                    <div class="title-2 text-white">

                        <h2><?=get_option('property_cat_title'.$lang) ?></h2>
                        <p>
                            <?php 
                                $catContent = get_option('property_cat_content'.$lang);
                                $stripped = strip_tags($catContent, '<p>'); //replace <p> and <a> with whatever tags you want to keep after the strip
                                echo $stripped;
                            ?>
                        </p>
                    </div>

                    <ul id="tabs" class="nav nav-tabs">

                        <?php

                            $first_flag = true;

                            $categories = get_terms( array(

                                'taxonomy'   => 'type',

                                'hide_empty' => false,

                                'include'    => get_option('property_category'.$lang)

                                )

                            );

                            foreach ( $categories as $key => $cat ) {

                        ?>

                        <?php if ($cat->count != 0) :?>

                        <li class="nav-item">

                            <a href="" data-bs-target="#tab-<?=$cat->term_id; ?>" data-bs-toggle="tab" class="nav-link <?= $first_flag ? 'active' : '' ?>">

                                <?= $cat->name; ?>

                            </a>

                        </li>

                        <?php endif ; $first_flag = false; ?>

                        <?php } ?>

                    </ul>

                    <div id="tabsContent" class="tab-content">

                        <?php 

                            $first_flag = true;

                            foreach ( $categories as $key => $cat ) : 

                            $term_link = get_term_link( $cat );

                            $term_name = $cat->name;

                        ?>

                        <div id="tab-<?=$cat->term_id; ?>" class="tab-pane fade <?php echo $first_flag ? 'active show' : '' ?>">

                            <div class="property-2 row column-space zoom-gallery">

                                <?php 

                                   $no = get_option('property_cat_number'.$lang);

                                    $property = sand_get_property_with_type($no, $cat->term_id);

                                    if($property->have_posts()) :

                                    while ( $property->have_posts() ) : $property->the_post();

                                    $property_id = get_the_ID();

                                    $property_title = wp_trim_words( get_the_title($property_id), $num_words = 5, $more = '… ' );

                                ?>

                                <div class="col-xl-4 col-md-6 wow fadeInUp">

                                    <div class="property-box">

                                        <?php

                                            $img = get_the_post_thumbnail_url( $property_id ) ;

                                            $default = get_option('sand_dark_logo');

                                        ?>

                                        <div class="property-image">

                                            <a href="<?php the_permalink( ); ?>">

                                                <img src="<?=(empty($img)) ? $default:$img ; ?>" class="bg-img" alt="<?php the_title() ?>">

                                            </a>



                                            

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

                                                            <span class="label label-shadow sale"><?php _e('For Sale', 'sand'); ?></span>

                                                        <?php

                                                    else: ?>

                                                            <span class="label label-shadow"><?php _e('For Rent', 'sand'); ?></span>

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

                                                            <a href = <?= esc_url( get_term_link( $term )  ) ?> style = 'color:#fff;' >

                                                            <?php

                                                            echo $term->name; echo ($i < count($terms))? " <span>,</span> " : "";

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

                                                    echo '<a href="'. esc_url( get_term_link( $term )  ) . '" style="color: #959595"> '.$term->name.' </a> ';echo ($i < count($terms))? " , " : "";

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

                                <?php endwhile; wp_reset_query(); endif?>

                            </div>

                        </div>

                        <?php $first_flag = false; endforeach; ?>

                    </div>

                </div>

            </div>

        </div>

    </section>

    <!-- property section tab end -->



    <?php endif; ?>

    <?php if (get_option('property_day_hidden'.$lang ) != '1')  : 

    $property_day = sand_get_property_day();

    if($property_day->have_posts()) :

    

    ?>

    <!--property of the day section start -->

    <section class="banner-section layout2-bg new-property parallax-image">

        <div class="container">

            <div class="row ratio_landscape feature-section">

                <div class="col">

                    <div class="title-2 text-white">

                        <h2><?= get_option('property_day_title'.$lang) ?></h2>

                        <p>
                            <?php 
                                $catContent = get_option('property_day_content'.$lang);
                                $stripped = strip_tags($catContent, '<p>'); //replace <p> and <a> with whatever tags you want to keep after the strip
                                echo $stripped;
                            ?>
                        </p>
                    </div>

                    <?php while ( $property_day->have_posts() ) : $property_day->the_post(); 

                    $property_of_day_value   = get_post_meta(get_the_ID(), 'property_of_day', true); 

                    ?>

                    <div class="feature-wrap">

                        <div class="row">

                            <div class="col-xl-6 col-lg-5">

                                <?php  

                                        $post_day_images =  get_post_meta($post->ID,'thumbnail_id');
                                        $i = 0;
                                        if(!empty($post_day_images)): 

                                    ?>

                                <div class="feature-image property-slider  mb-0">

                                    <?php

                                        foreach ($post_day_images as $post_day_image) :

                                        $slider_image = wp_get_attachment_image_src($post_day_image, 'large')[0];
                                        if ($i == 4) break;
                                    ?>

                                    <a href="javascript:void(0)">

                                        <img src="<?=$slider_image ?>" class="bg-img" alt="">

                                    </a>

                                    <?php $i++; endforeach;?>

                                </div>

                                <?php endif?>

                            </div>

                            <div class="col-xl-6 col-lg-7">

                                <div class="feature-content">

                                    <div class="details">

                                        <h3><a href="<?php the_permalink()?>"><span><?php the_title()?> </a></h3>

                                        <span>

                                        <?php $terms = wp_get_post_terms( $property_id , array( 'location') );

                                        $i = 1;

                                        foreach ( $terms as $term ) {

                                            echo '<a href="'. esc_url( get_term_link( $term ) ) . '" style="color: #959595"> '.$term->name.' </a> ';echo ($i < count($terms))? " , " : "";

                                        $i++;
                                        if ($i == 3) break;
                                    }?>

                                        </span>

                                        <p class="font-roboto"><?=wp_trim_words( get_the_content(), 15, '… ' ); ?></p>

                                    </div>

                                    <ul class="detail-list">

                                        <?php

                                        $property_bed = get_post_meta( $property_id, 'bedroom_num', true );

                                        if ( !empty($property_bed) ):?>

                                        <li>

                                            <div class="d-flex">

                                                <span class="label label-light color-2 label-lg">

                                                    <img src="<?=sand_URL.'assets/img/icon/bed.png';?>" class="img-fluid img-icon" alt="">

                                                </span>

                                                <h6>

                                                    <?php

                                                        _e('Bedroom', 'sand');

                                                        echo ' : '.$property_bed;

                                                    ?>

                                                </h6>

                                            </div>

                                        </li>

                                        <?php endif; ?>

                                        <?php

                                        $property_bath = get_post_meta( $property_id, 'bathroom_num', true );

                                        if ( !empty($property_bath) ):?>

                                        <li>

                                            <div class="d-flex">

                                                <span class="label label-light color-2 label-lg">

                                                    <img src="<?=sand_URL.'assets/img/icon/bathroom.png';?>" class="img-fluid img-icon" alt="">

                                                </span>

                                                <h6>

                                                    <?php

                                                    _e('Bathroom', 'sand');

                                                    echo ' : '.$property_bath;

                                                ?>

                                                </h6>

                                            </div>

                                        </li>

                                        <?php endif ?>

                                        <?php

                                        $property_size = get_post_meta( $property_id, 'property_size', true );

                                        if ( !empty($property_size) ):?>

                                        <li>

                                            <span class="label label-light color-2 label-lg">

                                                <?php

                                                    _e('Sqm', 'sand');

                                                    echo ' : '.$property_size;

                                                ?>

                                            </span>

                                        </li>

                                     <?php endif ?>

                                    </ul>

                                    

                                    <ul class="feature-price">

                                        <?php

                                    $property_price = get_post_meta( $property_id, 'property_price', true );

                                    if (!empty($property_price)):?>

                                        <li>

                                            <h3><?=number_format( $property_price , 0 , '.' , ',' ); _e(' AED' ,'sand');?></h3>

                                        </li>

                                        <?php endif ?>

                                        <li><a href="<?php the_permalink()?>"

                                            class="btn btn-gradient btn-pill color-2 btn-lg"><?php _e('View property', 'sand'); ?></a>

                                        </li>

                                    </ul>

                                </div>

                            </div>

                        </div>

                    </div>

                    <?php endwhile; wp_reset_query(); ?>  

                </div>

            </div>

        </div>

    </section>

    <!--property of the day section end -->

    <?php endif; endif ?>

    <?php if (get_option('featured_hidden'.$lang ) != '1')  : 

        $locations = get_terms( array(

            'taxonomy'      => 'location',

            'orderby'       => 'ID',

            'order'         => 'ASC',

            'hide_empty'    => false,

            'include'       => get_option('location_home_category'.$lang),

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

                        <h2><?=get_option('featured_title'.$lang) ?></h2>

                        <p><?=get_option('featured_content'.$lang) ?></p>

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

    <?php if (get_option('testimonails_hidden'.$lang) != '1')  :

    $testimonials = sand_get_testimonials(get_option('testimonails_number'.$lang ));

    if($testimonials->have_posts()) :

    ?>

    <!-- testimonial section start -->

    <section class="testimonial-style-1">

        <div class="container">

            <div class="row">

                <div class="col">

                    <div class="title-2">

                        <h2><?=get_option('testimonails_title'.$lang) ?></h2>

                        <p><?=get_option('testimonails_content'.$lang) ?></p>

                    </div>

                    <div class="slick-between">

                        <div class="testimonial-1 dot-gradient">

                            <?php while ( $testimonials->have_posts() ) : $testimonials->the_post(); ?>

                            <div>

                                <div class="pepole-comment">

                                    <div class="client-msg">

                                        <span class="quote">

                                            <img src="<?=sand_URL.'assets/img/quote.png'?>"

                                                alt="<?php the_title()?>">

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

                            <?php endwhile; wp_reset_query();?>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

    <!-- testimonial section end -->

    <?php endif; endif ?>

<?php get_footer() ?>