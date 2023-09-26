<?php  

	/**

	** Template Name: Projects Template

	**/

	if ( empty(pll_current_language()) )

    $lang = '_'.pll_default_language();

	else

    $lang = '_'.pll_current_language(); // For multilanguage options

	get_header();

	get_template_part('template-parts/page-title'); 

    $projects = sand_get_projects_paged(9);

    if($projects->have_posts()) :

?>

<!-- agent grid section start -->

<section class="agent-section property-section">

    <div class="container">

        <div class="row ratio2_3">

            <div class="col-xl-12 property-grid-3 agent-grids">

                <div class="filter-panel">

                    <div class="top-panel">

                        <div>

                            <h2><?php _e('Projects Listing', 'sand'); ?></h2>

                        </div>

                    </div>



                </div>



                <div class="property-wrapper-grid">

                    <div class="property-2 row column-sm property-label property-grid">

                        <?php 

                            while ( $projects->have_posts() ) : $projects->the_post();

                            $project_id = get_the_ID();

                            $project_title = wp_trim_words( get_the_title($project_id), $num_words = 5, $more = '… ' );

                        ?>

                        <div class="col-lg-4 col-md-6 col-xl-4 wow fadeInUp">

                            <div class="property-box">

                                <div class="agent-image">

                                    <div>

                                        <img src="<?php the_post_thumbnail_url()?>" class="bg-img" alt="">

                                            <?php

                                            $terms = wp_get_post_terms( $project_id , array( 'project_location') );

                                            if (!empty($terms)):?>

                                            <span class="label label-shadow"><i data-feather="map-pin"></i>

                                                <?php

                                                    $i = 1;

                                                    foreach ( $terms as $term ) {

                                                        echo '<a href="'. esc_url( get_term_link( $term ) ) . '" > '.$term->name.' </a> ';echo ($i < count($terms))? " , " : "";

                                                        $i++;

                                                    }

                                                ?>

                                            </span>

                                        <?php endif; ?>

                                        <div class="agent-overlay"></div>

                                        <div class="overlay-content">

                                            <span>
                                                <a href="<?php the_permalink()?>">
                                                    <?php _e('View Project', 'sand'); ?>    
                                                </a>
                                            </span>

                                        </div>

                                    </div>

                                </div>

                                <div class="agent-content">

                                    <h3><a href="<?php the_permalink()?>"><?=$project_title?></a></h3>
                                    <p><?php the_excerpt()?></p>
                                    <a class="project-link" href="<?php the_permalink()?>"><?php _e('View Project', 'sand'); ?> <i class="fas fa-arrow-<?php if ( ICL_LANGUAGE_CODE=='ar' ) :?>left<?php else: ?>right<?php endif;?> "></i></a>

                                </div>

                            </div>

                        </div>

                        <?php endwhile; wp_reset_query();?>

                    </div>

                    <div class="nav-breadcrumb">

                    <nav class="theme-pagination">

                    <?php $args = array(

                            'format'             => '?paged=%#%',

                            'current'            => max( 1, get_query_var('paged') ),

                            'total'              => $projects->max_num_pages,

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

                </div>

                </div>

            </div>

        </div>

    </div>

</section>

<!-- agent grid section end -->

<?php endif ?>

<?php get_footer()?>

