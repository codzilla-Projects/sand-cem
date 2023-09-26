<?php  
	if ( empty(pll_current_language()) )
    $lang = '_'.pll_default_language();
	else
    $lang = '_'.pll_current_language(); // For multilanguage options
	get_header();
?>
<!-- section start -->
<section class="error-section small-section">
    <div class="container">
        <div class="row">
            <div class="col text-center not-found">
                <img src="<?=sand_URL.'assets/img/bg/404.png'?>" class="img-fluid" alt="">
                <h2><?php _e('Whoops! something went wrong ?', 'sand'); ?></h2>
                <p class="font-roboto"><?php _e('we are sorry but the page you are looking for doesn\'t exist or has been removed. please check or search again.', 'sand'); ?></p>
                <div class="btns">
                    <a href="<?php bloginfo('url') ?>" class="btn btn-gradient color-4"><?php _e('go to home page', 'sand'); ?></a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- section end -->
<?php get_footer()?>