<!-- breadcrumb start -->

<?php 

        $page_image  = get_the_post_thumbnail_url();

        $page_image_title  = get_option('sand_breadcrumb_img'); 

?>



<section class="breadcrumb-section p-0 effect-cls">
    <div class="color-palate">
        <div class="layout-home8 search bg-img-2 ratio_landscape">
            <div class="container p-0">
                <div class="row m-0">
                    <div class="col-xl-12 col-lg-12">
                        <div class="home-left-content">

                            <div class="search-with-tab">
                                <ul class="nav nav-tabs" id="home-tab" role="tablist">
                                    <li class="nav-item"><a data-bs-toggle="tab" class="nav-link active"
                                            href="#sell"><?php _e('For sale', 'sand'); ?></a></li>
                                    <li class="nav-item"><a data-bs-toggle="tab" class="nav-link"
                                            href="#rent"><?php _e('For rent', 'sand'); ?></a></li>
                                </ul>
                                <div class="tab-content" id="home-tabContent">
                                    <div class="tab-pane fade show active active" id="sell">
                                         <form class="advanced_search" id="sellSearchForm" action="<?php echo home_url('/'); ?>" method="get" >
                                            <div class="row review-form gx-3">
                                                <div class="col-lg-3 col-sm-6">
                                                    <div class="form-group">
                                                        <input type="text" name="s" class="form-control" placeholder="<?php _e('looking for', 'sand'); ?>" />
                                                        <input type="text" hidden name="status" class="form-control" value="sale" />
                                                     </div>
                                                </div>

                                                <div class="col-lg-3 col-sm-6">
                                                     <div class="form-group">
                                                        <select name="type" class="form-control form-select">
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

                                                <div class="col-lg-2 col-sm-6">
                                                    <div class="form-group">
                                                        <select name="bedroom" class="form-control form-select">
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
                                                <div class="col-lg-2 col-sm-6">
                                                    <div class="form-group">
                                                        <select name="bathroom" class="form-control form-select">
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

                                                <div class="col-lg-2 col-md-6">
                                                    <button type="submit"  class="btn btn-gradient color-1"><?php _e('Search', 'sand'); ?></button>
                                                </div>

                                                <div class="col-12">
                                                    <div class="col-12 show-more">
                                                        <div class="col-12 text-start" id = "is_commerce_container">
                                                            <div class="form-group">
                                                                <input class="form-check-input" name = "is_commerce" type="checkbox" value="is_commerce" id="is_commerce2">
                                                                <label class="form-check-label" for="is_commerce2">
                                                                    <?= __('Show commercial properties only','sand') ?>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="content more_search_content row">

                                                        <div class="col-lg-3 col-md-6 text-start">

                                                            <div class="form-group">
                                                                
                                                                <select name="property_project" id="property_project" class = 'form-control form-select'>
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


                                                        <div class="col-lg-9 col-sm-6 area_container">
                                                            <div class="row">
                                                                <div class="col-lg-3 col-sm-3 min_price">
                                                                    <div class="form-group">
                                                                        <input type="text" name="minPrice" class="form-control" placeholder="<?php _e('Min. Price', 'sand'); ?>" />
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-3 col-sm-3 max_price">
                                                                    <div class="form-group">
                                                                        <input type="text" name="maxPrice" class="form-control" placeholder="<?php _e('Max. Price', 'sand'); ?>" />
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="col-lg-3 col-sm-3 min_area">
                                                                    <div class="form-group">
                                                                        <input type="text" name="minArea" class="form-control" placeholder="<?php _e('Min. Area', 'sand'); ?>" />
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-3 col-sm-3 max_area">
                                                                    <div class="form-group">
                                                                        <input type="text" name="maxArea" class="form-control" placeholder="<?php _e('Max. Area', 'sand'); ?>" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 text-start">
                                                            <div class="form-group">
                                                                <input class="form-check-input" name = "has_installment_plan" type="checkbox" value="has_installment_plan" id="has_installment_plan">
                                                                <label class="form-check-label" for="has_installment_plan">
                                                                    <?= __('Show properties with installment plans only','sand') ?>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- <div class="form-check is_commerce">
                                                    <input class="form-check-input is_commerce_input" name = "is_commerce" type="checkbox" value="is_commerce" id="is_commerce2">
                                                    <label class="form-check-label" for="is_commerce2">
                                                        <?= ''//__('Show commercial properties only','sand') ?>
                                                    </label>
                                                </div> -->
                                            </div>
                                        </form>
                                    </div>
                                    <div class="tab-pane fade tab-listing" id="rent">
                                        <form class="advanced_search" id="rentSearchForm" action="<?php echo home_url('/'); ?>" method="get" >
                                           <div class="row review-form gx-3">
                                               <div class="col-lg-3 col-sm-6">
                                                   <div class="form-group">
                                                        <input type="text" name="s" class="form-control" placeholder="<?php _e('looking for', 'sand'); ?>" />
                                                       <input type="text" hidden name="status" class="form-control" value="rent" />
                                                   </div>
                                               </div>
                                               <div class="col-lg-3 col-sm-6">
                                                     <div class="form-group">
                                                        <select name="type" class="form-control form-select">
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

                                                <div class="col-lg-2 col-sm-6">
                                                    <div class="form-group">
                                                        <select name="bedroom" class="form-control form-select">
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
                                                <div class="col-lg-2 col-sm-6">
                                                    <div class="form-group">
                                                        <select name="bathroom" class="form-control form-select">
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

                                                <div class="col-lg-2 col-md-6">
                                                    <button type="submit" class="btn btn-gradient color-1"><?php _e('Search', 'sand'); ?></button>
                                                </div>

                                                <div class="col-12">
                                                    <div class="col-12 text-start">
                                                        <div class="form-check is_commerce">
                                                            <input class="form-check-input is_commerce_input" name = "is_commerce" type="checkbox" value="is_commerce" id="is_commerce">
                                                            <label class="form-check-label" for="is_commerce">
                                                                <?= __('Show commercial properties only','sand') ?>
                                                            </label>
                                                        </div>
                                                    </div>

                                                    <div class="content more_search_content row">
                                                        <div class="col-lg-4 col-md-6">
                                                            <div class="form-group">
                                                                <select name="property_project" id="property_project" class = 'form-control form-select'>
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
                                                        <div class="col-lg-8 col-sm-3 area_container">
                                                            <div class="row">
                                                                <div class="col-lg-3 col-sm-3 min_price">
                                                                    <div class="form-group">
                                                                        <input type="text" name="minPrice" class="form-control" placeholder="<?php _e('Min. Price', 'sand'); ?>" />
                                                                    </div>
                                                                </div>

                                                                <div class="col-lg-3 col-sm-3 max_price">
                                                                    <div class="form-group">
                                                                        <input type="text" name="maxPrice" class="form-control" placeholder="<?php _e('Max. Price', 'sand'); ?>" />
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-3 col-sm-3 min_area">
                                                                    <div class="form-group">
                                                                        <input type="text" name="minArea" class="form-control" placeholder="<?php _e('Min. Area', 'sand'); ?>" />
                                                                    </div>
                                                                </div>

                                                                <div class="col-lg-3 col-sm-3 max_area">
                                                                    <div class="form-group">
                                                                        <input type="text" name="maxArea" class="form-control" placeholder="<?php _e('Max. Area', 'sand'); ?>" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4 col-sm-3">
                                                            <div class="form-group">
                                                                <select name="property_furnishing" id="property_furnishing" class="form-control form-select">
                                                                    <option value = "" > <?= __('All Furnishing', 'sand') ?> </option>
                                                                    <option value="furnished" > <?= __('Furnished', 'sand') ?> </option>
                                                                    <option value="unfurnished" ><?= __('Unfurnished', 'sand') ?></option>
                                                                    <option value="partlyfurnished" ><?= __('Partly Furnished', 'sand') ?></option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4 col-sm-3">
                                                            <div class="form-group">
                                                                <select name="rental_period" id="rental_period" class="form-control form-select">
                                                                    <option value="monthly" > <?= __('Monthly', 'sand') ?> </option>
                                                                    <option value="daily" ><?= __('Daily', 'sand') ?></option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                     </div>
                                                </div>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-4">
                        <div class="home-right-image">
                            <img src="<?php echo (wp_is_mobile()) ? get_option('sand_home_section_one_mob_img'.$lang):get_option('sand_home_section_one_img'.$lang); ?>" alt="" class="bg-img">
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <img src="<?php  if(empty($page_image)){ echo $page_image_title;}elseif (is_tax()){echo $page_image_title;} else{ echo $page_image;}?>" class="bg-img img-fluid" alt="">

    <div class="container">

        <div class="breadcrumb-content">

            <div class="text-dark">

                <h2>

                    <?php

                        global $page, $paged, $post;

                        if (is_tax()) {

                            $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );

                            $term_title = $term->name;

                            echo "$term_title ";

                        } 

                        elseif ( is_404() ) 

                        { 

                          echo __('Page Not Found','sand');

                        }

                        else 

                        {

                            wp_title( '', true, 'right' );

                        }

                    ?>

                </h2>

                <nav aria-label="breadcrumb" class="theme-breadcrumb">

                    <ol class="breadcrumb">

                        <li class="breadcrumb-item"><a href="<?php bloginfo('url')?>"><?php _e('Home','sand')?></a></li>

                        <li class="breadcrumb-item active" aria-current="page">

                            <?php

                                global $page, $paged, $post;

                                if (is_tax()) {

                                    $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );

                                    $term_title = $term->name;

                                    echo "$term_title ";

                                } 

                                elseif ( is_404() ) 

                                { 

                                  echo __('Page Not Found','sand');

                                }

                                else 

                                {

                                    wp_title( '', true, 'right' );

                                }

                            ?>

                        </li>

                    </ol>

                </nav>

            </div>

        </div>

    </div>

</section>

<!-- breadcrumb end -->