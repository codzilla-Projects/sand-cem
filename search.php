<?php
/*
Template Name: search
*/
global $wp_query;

get_header();
get_template_part('template-parts/page-title'); 
?>
    <?php
    $keyword            = $_GET['s'];
    if (isset($_GET['location']))
        $prop_location_id   = $_GET['location'];
    $prop_location_ids  = array();
    if (isset($_GET['locations'])):
        $prop_location_ids  = $_GET['locations'];
    // var_dump($prop_location_ids);
    endif;
    $prop_type_id               = $_GET['type'];
    $prop_status                = $_GET['status'];
    $beds                       = $_GET['bedroom'];
    $baths                      = $_GET['bathroom'];
    $min_area                   = $_GET['minArea'];
    $max_area                   = $_GET['maxArea'];
    $min_price                  = $_GET['minPrice'];
    $max_price                  = $_GET['maxPrice'];
    $rental_period              = $_GET['rental_period'];
    $property_furnishing        = $_GET['property_furnishing'];
    $prop_project               = $_GET['property_project'];
    $is_commerce = false;
    if (isset($_GET['is_commerce'])) $is_commerce = true;
    
    $has_installment_plan = false;
    if (isset($_GET['has_installment_plan'])) $has_installment_plan = true;

    $area_flag1 = false;
    $area_flag2 = false;
    $area_flag3 = false;
    if( $max_area=='' && $min_area!='' )
        $area_flag1 = true;
    else if( $min_area=='' && $max_area!='' )
        $area_flag2 = true;
    else if( $max_area!='' && $min_area!='' )
        $area_flag3 = true;

    $price_flag1 = false;
    $price_flag2 = false;
    $price_flag3 = false;
    if( $max_price=='' && $min_price!='' )
        $price_flag1 = true;
    else if( $min_price=='' && $max_price!='' )
        $price_flag2 = true;
    else if( $max_price!='' && $min_price!='' )
        $price_flag3 = true;


    $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;

    $no = get_option('posts_per_page');
    $args = array(
        'post_type'       => 'property',
        'post_status'     => 'publish',
        'posts_per_page'  => $no,
        'paged'           => $paged,
        'orderby'         => 'date',
        'order'           => 'DESC',

         );
    $tax_query = array('relation' => 'AND',);
    $meta_query = array('relation' => 'AND',);


  if(!empty($keyword)){
      $args['s'] = $keyword;

    }

  if(!empty($prop_location_id)){
      if(empty($tax_query)){$tax_query = [];}
      $tax_to_add = [];
      $tax_terms_ids = [];

      array_push($tax_terms_ids, (int)$prop_location_id);
      $tax_to_add['taxonomy'] = 'location';
      $tax_to_add['field'] = 'term_id';
      $tax_to_add['terms'] = $tax_terms_ids;
      $tax_to_add['operator'] = 'IN';
      array_push($tax_query,$tax_to_add);
      $args['tax_query'] = $tax_query;
    }
  if(!empty($prop_type_id)){
      if(empty($tax_query)){$tax_query = [];}
      $tax_to_add = [];
      $tax_terms_ids = [];
      array_push($tax_terms_ids, (int)$prop_type_id);
      $tax_to_add['taxonomy'] = 'type';
      $tax_to_add['field'] = 'term_id';
      $tax_to_add['terms'] = $tax_terms_ids;
      $tax_to_add['operator'] = 'IN';
      array_push($tax_query,$tax_to_add);
      $args['tax_query'] = $tax_query;
    }
    if(!empty($prop_location_ids)){
      if(empty($tax_query)){$tax_query = [];}
      $tax_to_add = [];
      $tax_terms_ids = [];
      foreach($prop_location_ids as $prop_location_id){
      array_push($tax_terms_ids, (int)$prop_location_id);

      }
      $tax_to_add['taxonomy'] = 'location';
      $tax_to_add['field'] = 'term_id';
      $tax_to_add['terms'] = $tax_terms_ids;
      $tax_to_add['operator'] = 'IN';
      array_push($tax_query,$tax_to_add);
      $args['tax_query'] = $tax_query;
    }

  if(!empty($prop_status)){
      if(empty($meta_query)){$meta_query = [];}
      $meta_to_add = [];
      $meta_to_add['key'] = 'property_status';
      $meta_to_add['value'] = $prop_status;
      $meta_to_add['compare'] = '=';
      array_push($meta_query,$meta_to_add);
      $args['meta_query'] = $meta_query;
    }

  if(!empty($property_furnishing)){
      if(empty($meta_query)){$meta_query = [];}
      $meta_to_add = [];
      $meta_to_add['key'] = 'property_furnishing';
      $meta_to_add['value'] = $property_furnishing;
      $meta_to_add['compare'] = '=';
      array_push($meta_query,$meta_to_add);
      $args['meta_query'] = $meta_query;
    }

  if(!empty($prop_project)){
      if(empty($meta_query)){$meta_query = [];}
      $meta_to_add = [];
      $meta_to_add['key'] = 'property_project';
      $meta_to_add['value'] = $prop_project;
      $meta_to_add['compare'] = '=';
      array_push($meta_query,$meta_to_add);
      $args['meta_query'] = $meta_query;
    }

  if(!empty($rental_period)){
      if(empty($meta_query)){$meta_query = [];}
      $meta_to_add = [];
      $meta_to_add['key'] = 'rental_period';
      $meta_to_add['value'] = $rental_period;
      $meta_to_add['compare'] = '=';
      array_push($meta_query,$meta_to_add);
      $args['meta_query'] = $meta_query;
    }

  if($is_commerce){
      if(empty($meta_query)){$meta_query = [];}
      $meta_to_add = [];
      $meta_to_add['key'] = 'property_commercial';
      $meta_to_add['value'] = 1;
      $meta_to_add['compare'] = '=';
      array_push($meta_query,$meta_to_add);
      $args['meta_query'] = $meta_query;
    }

  if($has_installment_plan){
      if(empty($meta_query)){$meta_query = [];}
      $meta_to_add = [];
      $meta_to_add['key'] = 'has_installment_plan';
      $meta_to_add['value'] = 1;
      $meta_to_add['compare'] = '=';
      array_push($meta_query,$meta_to_add);
      $args['meta_query'] = $meta_query;
    }

  if(!empty($beds)){
      if(empty($meta_query)){$meta_query = [];}
      $meta_to_add = [];
      $meta_to_add['key'] = 'bedroom_num';
      $meta_to_add['value'] = $beds;
      $meta_to_add['compare'] = '=';
      array_push($meta_query,$meta_to_add);
      $args['meta_query'] = $meta_query;
    }

  if(!empty($baths)){
      if(empty($meta_query)){$meta_query = [];}
      $meta_to_add = [];
      $meta_to_add['key'] = 'bathroom_num';
      $meta_to_add['value'] = $baths;
      $meta_to_add['compare'] = '=';
      array_push($meta_query,$meta_to_add);
      $args['meta_query'] = $meta_query;
    }
    if( $area_flag1 ){
      if(empty($meta_query)){$meta_query = [];}
      $meta_to_add = [];
      $meta_to_add['key'] = 'property_size';
      $meta_to_add['value'] = $min_area;
      $meta_to_add['compare'] = '<=';
      array_push($meta_query,$meta_to_add);
      $args['meta_query'] = $meta_query;

    }
    if( $area_flag2 ){
      if(empty($meta_query)){$meta_query = [];}
      $meta_to_add = [];
      $meta_to_add['key'] = 'property_size';
      $meta_to_add['value'] = $max_area;
      $meta_to_add['compare'] = '>=';
      array_push($meta_query,$meta_to_add);
      $args['meta_query'] = $meta_query;
    }
    if( $area_flag3 ){
      if(empty($meta_query)){$meta_query = [];}
      $meta_to_add = [];
      $meta_to_add['key'] = 'property_size';
      $meta_to_add['value'] = array( $min_area, $max_area );
      $meta_to_add['type'] = 'numeric';
      $meta_to_add['compare'] = 'BETWEEN';
      array_push($meta_query,$meta_to_add);
      $args['meta_query'] = $meta_query;

    }

    if( $price_flag1 ){
      if(empty($meta_query)){$meta_query = [];}
      $meta_to_add = [];
      $meta_to_add['key'] = 'property_price';
      $meta_to_add['value'] = $min_price;
      $meta_to_add['compare'] = '<=';
      array_push($meta_query,$meta_to_add);
      $args['meta_query'] = $meta_query;

    }
    if( $price_flag2 ){
      if(empty($meta_query)){$meta_query = [];}
      $meta_to_add = [];
      $meta_to_add['key'] = 'property_price';
      $meta_to_add['value'] = $max_price;
      $meta_to_add['compare'] = '>=';
      array_push($meta_query,$meta_to_add);
      $args['meta_query'] = $meta_query;

    }
    if( $price_flag3 ){
      if(empty($meta_query)){$meta_query = [];}
      $meta_to_add = [];
      $meta_to_add['key'] = 'property_price';
      $meta_to_add['value'] = array( $min_price, $max_price );
      $meta_to_add['type'] = 'numeric';
      $meta_to_add['compare'] = 'BETWEEN';
      array_push($meta_query,$meta_to_add);
      $args['meta_query'] = $meta_query;

    }

    $properties = new WP_Query( $args );
?>

      <section class="property-section">
            <div class="container">


           <?php if ( $properties->have_posts() ):?>
               <div class="row ratio_63">
                   <div class="property-grid-2">
                        <div class="property-wrapper-grid">
                            <div class="property-2 row column-sm property-label property-grid">
                                <?php  while ( $properties->have_posts() ) : $properties->the_post();
                                    $property_id = get_the_ID();
                                    $property_title = wp_trim_words( get_the_title($property_id), $num_words = 4, $more = '… ' );?>

                                    <div class="col-xl-4 col-md-6 wow fadeInUp">
                                        <div class="property-box">
                                            <?php
                                                $img = get_the_post_thumbnail_url($property_id, 'property_arch_thumb');
                                                $default = get_option('sand_dark_logo');?>
                                            <div class="property-image <?php echo (empty($img)) ? 'default_background':'' ?>">

                                                <a href = <?php the_permalink() ?> >
                                                    <div class="feature-image">
                                                        <img src="<?= (!empty($img))? $img:$default ; ?>" class="bg-img" alt="">
                                                    </div>
                                                </a>

                                                <div class="labels-left">
                                                    <?php
                                                        $property_status = get_post_meta( $property_id, 'property_status', true );
                                                        if ( $property_status == 'sale' ): ?>
                                                                <span class="label label-shadow"><?php _e('For Sale', 'sand'); ?></span>
                                                            <?php
                                                        else: ?>
                                                                <span class="label label-success"><?php _e('For Rent', 'sand'); ?></span>
                                                            <?php
                                                        endif; ?>
                                                        <?php 
                                                            $terms = wp_get_post_terms( $property_id , array( 'type') );
                                                            $types = ''; 
                                                            if (!empty($terms)) :?>
                                                                <span class="label label-dark"><?php
                                                                    $i = 1;
                                                                    foreach ( $terms as $term ) {
                                                                        if( $term->slug == 'uncategorized' ){ continue; }?>
                                                                        <a href = <?=get_term_link( $term )?> style = 'color:#fff;' >
                                                                        <?php
                                                                        echo $term->name;?></a>
                                                                        <?php echo ($i < count($terms))? "<span>,</span>" : "";
                                                                        $types = $types.$term->name; 
                                                                        $sep = ($i < count($terms))? "<span>,</span>" : "";
                                                                        $types = $types.$sep;                                                                
                                                                        $i++;
                                                                        if ($i == 3) break;
                                                                        }?>
                                                                </span>
                                                        <?php endif; ?>
                                                </div>

                                                <div class="seen-data">
                                                    <i data-feather="camera"></i>
                                                    <span><?= count(get_post_meta($property_id,'thumbnail_id'));?></span>
                                                </div>

                                            </div>

                                            <div class="property-details">
                                                <?php if ( !empty(get_post_meta($property_id, 'sand_signature', true)) ): ?>
                                                    <div style = 'margin-bottom: 2%;' >
                                                        <span class="label label-dark"><?php _e('Featured', 'sand'); ?></span>
                                                    </div>
                                                <?php endif; ?>
                                                <span class="font-roboto">
                                                    <?php
                                                        $locations = '';
                                                        $terms = wp_get_post_terms( $property_id , array( 'location') );
                                                        $i = 1;
                                                        foreach ( $terms as $term ) {
                                                            echo '<a href="'.sand_BlogUrl .'/location/'.$term->slug.'" style="color: #959595"> '.$term->name.' </a> ';echo ($i < count($terms))? " , " : "";
                                                            $locations = $locations.$term->name;
                                                            $separator = ($i < count($terms))? " , " : "";
                                                            $locations = $locations.$separator;                                                            
                                                            $i++;
                                                        }
                                                            ?>
                                                </span>
                                                <a href="<?php the_permalink() ?>">
                                                    <h3><?= $property_title ?></h3>
                                                </a>
                                                <?php 
                                                    $property_price = get_post_meta( $property_id, 'property_price', true );
                                                    if ( !empty($property_price)):
                                                        $property_price = number_format( $property_price , 0 , '.' , ',' ).__(' AED' ,'sand');?>
                                                        <h6><?= $property_price ?></h6>
                                                <?php endif; ?>
                                                <ul>

                                                    <?php
                                                        $property_bed = get_post_meta( $property_id, 'bedroom_num', true );
                                                        if ( !empty($property_bed) ):?>
                                                            <li><img src="<?php echo sand_URL.'assets/images/svg/icon/double-bed.svg' ;?>" class="img-fluid" alt="">
                                                            <?php
                                                                _e('Bed', 'sand');
                                                                echo ' : '.$property_bed;
                                                            ?>
                                                            </li>
                                                    <?php endif; ?>

                                                    <?php
                                                        $property_bath = get_post_meta( $property_id, 'bathroom_num', true );
                                                        if ( !empty($property_bath) ):?>
                                                            <li><img src="<?php echo sand_URL.'assets/images/svg/icon/bathroom.svg' ;?>" class="img-fluid" alt="">
                                                                <?php
                                                                    _e('Baths', 'sand');
                                                                    echo ' : '.$property_bath;
                                                                ?>
                                                            </li>
                                                    <?php endif; ?>

                                                    <?php
                                                        $property_size = get_post_meta( $property_id, 'property_size', true );
                                                        if ( !empty($property_size) ):?>
                                                            <li><img src="<?php echo sand_URL.'assets/images/svg/icon/square-ruler-tool.svg'; ?>" class="img-fluid ruler-tool" alt="">
                                                                <?php
                                                                    _e('Sq Ft', 'sand');
                                                                    echo ' : '.$property_size;
                                                                ?>
                                                            </li>
                                                    <?php endif; ?>

                                                </ul>
                                                <div class="property-btn d-flex">
                                                    <?php 
                                                        $reference = get_post_meta($property_id, 'property_ref_no', true);
                                                    ?>                                                    <button type="button"  onclick="document.location='<?php the_permalink() ?>'" class="btn btn-dashed btn-pill color-2"> <?php _e('Details', 'sand'); ?></button>
                                                </div>
                                            </div>

                                        </div>
                                    </div>


                                <?php  endwhile;  wp_reset_query();?>
                            </div>
                        </div>
                    </div>
                </div>

                <nav class="theme-pagination search_pagination">
                    <?php $args = array(
                            'format'             => '?paged=%#%',
                            'current'            => max( 1, get_query_var('paged') ),
                            'total'              => $properties->max_num_pages,
                            'show_all'           => false,
                            'end_size'           => 1,
                            'mid_size'           => 2,
                            'next_text'          => '<span aria-hidden="true">»</span><span class="sr-only">'.__('Next', 'sand').'</span>',
                            'prev_text'          => '<span aria-hidden="true">«</span><span class="sr-only">'.__('Previous', 'sand').'</span>',
                            'type'               => 'list',
                            );
                            echo paginate_links($args);
                    ?>
                </nav>
                <!-- end pagination -->
            <?php  wp_reset_postdata();
           else :
                _e('We currently have no properties matching your search.','sand');
            endif; ?>
        </div>
      </section>

<?php
get_footer();
