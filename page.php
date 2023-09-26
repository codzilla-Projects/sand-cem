<?php get_header();

get_template_part('template-parts/page-title'); 

while (have_posts()) :  the_post();
    ?>
    <!-- breadcrumb end -->
 <section class="small-section ">

     <div class="container">

         <div class="row">
             <?php the_content(); ?>
         </div>
     </div>
</section>
    <?php

endwhile;
get_footer(); ?>
