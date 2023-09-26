<?php
function sand_admin_scripts_styles($hook) {
     if ( empty(pll_current_language()) )
        $lang = '_'.pll_default_language(); 
    else
        $lang = '_'.pll_current_language();
    wp_enqueue_style( 'sand-admin-main', sand_URL . 'assets/admin/css/main-style.css');
    //var_dump($hook);
    $sand_pages = ['toplevel_page_theme-option',
        'theme-options_page_home-page-content',
        'theme-options_page_aboutUs-page-content',
        'theme-options_page_contactUs-page-content',
        'post-new.php',
        'post.php'
    ];
    if( in_array($hook, $sand_pages) ) {
        wp_enqueue_style( 'sand-admin-bootsrtap-css', sand_URL . 'assets/admin/css/bootstrap.min.css');
        wp_enqueue_style( 'sand-admin-choose_cat-css', sand_URL . 'assets/admin/css/choose-cat.css');
        wp_enqueue_style( 'sand-admin-style-css', sand_URL . 'assets/admin/css/style.css');
        wp_enqueue_script( 'sand-admin-jquery-js', sand_URL .'assets/js/jquery.js', array() ,false, true );
        wp_enqueue_script( 'sand-admin-popper-js', sand_URL .'assets/admin/js/popper.min.js', array() ,false, true );
        wp_enqueue_script( 'sand-admin-bootsrtap-js', sand_URL .'assets/admin/js/bootstrap.bundle.min.js', array() ,false, true );
        wp_enqueue_script( 'sand-choose_cat-js', sand_URL .'assets/admin/js/choose_cat.js', array() ,false, true ); 
        wp_enqueue_script( 'sand-admin-script-js', sand_URL .'assets/admin/js/script.js', array() ,false, true );
        if(function_exists( 'wp_enqueue_media' )){
            wp_enqueue_media();
        }else{
            wp_enqueue_style('thickbox');
            wp_enqueue_script('media-upload');
            wp_enqueue_script('thickbox');
        }
    }
        $primaryColor     = get_option('sand_primaryColor');
        $secondaryColor   = get_option('sand_secondaryColor');
        $thirdColor       = get_option('sand_thirdColor');
        $googleFontUrl    = get_option('sand_font_url'.$lang);
        $googleFontName   = get_option('sand_font_name'.$lang);
        $custom_css = 
            "
                @import url('{$googleFontUrl}');
                :root {
                   --primaryColor   : {$primaryColor};
                   --secondaryColor : {$secondaryColor};
                   --thirdColor     : {$thirdColor};
                   --sand-font     : '{$googleFontName}',sans-serif;
                }
            ";
        wp_add_inline_style('sand-style-css', $custom_css);
        wp_add_inline_style('sand-admin-style-css', $custom_css);
        wp_add_inline_style('sand-admin-main', $custom_css);
}
add_action('admin_enqueue_scripts', 'sand_admin_scripts_styles');
function sand_scripts_styles() {
     if ( empty(pll_current_language()) )
        $lang = '_'.pll_default_language(); 
    else
        $lang = '_'.pll_current_language();
    wp_enqueue_style( 'sand-jquery-ui-css', sand_URL . 'assets/css/jquery-ui.css');
    wp_enqueue_style( 'sand-magnific-css', sand_URL . 'assets/css/magnific-popup.css');
    wp_enqueue_style( 'sand-animate-css', sand_URL . 'assets/css/animate.css');
    wp_enqueue_style( 'sand-select2-css', sand_URL . 'assets/css/select2.min.css');
    wp_enqueue_style( 'sand-bootstrap-css', sand_URL . 'assets/css/bootstrap.css');
    wp_enqueue_style( 'sand-search-icon-css', sand_URL . 'assets/css/search-icon.css');
    wp_enqueue_style( 'sand-main-style-css', sand_URL . 'assets/css/style.css');
    if (wp_is_mobile(  )):
        wp_enqueue_style( 'sand-responsive-css', sand_URL . 'assets/css/responsive.css');
    endif;
    wp_enqueue_script( 'sand-jquery-js', sand_URL .'assets/js/jquery-3.6.0.min.js', array() ,false, true );
    wp_enqueue_script( 'sand-popper-js', sand_URL .'assets/js/popper.min.js', array() ,false, true );
    wp_enqueue_script( 'sand-magnific-js', sand_URL .'assets/js/jquery.magnific-popup.js', array() ,false, true );
    wp_enqueue_script( 'sand-zoom-gallery-js', sand_URL .'assets/js/zoom-gallery.js', array() ,false, true );
    wp_enqueue_script( 'sand-jquery-ui-js', sand_URL .'assets/js/jquery-ui.js', array() ,false, true );
    wp_enqueue_script( 'sand-touch-punch-js', sand_URL .'assets/js/jquery.ui.touch-punch.min.js', array() ,false, true );
    wp_enqueue_script( 'sand-range-slider-js', sand_URL .'assets/js/range-slider'.$lang.'.js', array() ,false, true );
    wp_enqueue_script( 'sand-bootstrap-js', sand_URL .'assets/js/bootstrap.bundle.min.js', array() ,false, true );
    wp_enqueue_script( 'sand-feather-js', sand_URL .'assets/js/feather-icon/feather.min.js', array() ,false, true );
    wp_enqueue_script( 'sand-feather-icon-js', sand_URL .'assets/js/feather-icon/feather-icon.js', array() ,false, true );
    wp_enqueue_script( 'sand-vide-js', sand_URL .'assets/js/jquery.vide.min.js', array() ,false, true );
    wp_enqueue_script( 'sand-wow-js', sand_URL .'assets/js/wow.min.js"', array() ,false, true );
    wp_enqueue_script( 'sand-slick-js', sand_URL .'assets/js/slick.js', array() ,false, true );
    wp_enqueue_script( 'sand-slick-animation-js', sand_URL .'assets/js/slick-animation.min.js', array() ,false, true );
    wp_enqueue_script( 'sand-custom-slick-js', sand_URL .'assets/js/custom-slick.js', array() ,false, true );
    wp_enqueue_script( 'sand-select2-min-js', sand_URL .'assets/js/select2.min.js', array() ,false, true );
    wp_enqueue_script( 'sand-select2-min-js', sand_URL .'assets/js/single-property.js', array() ,false, true );
    wp_enqueue_script( 'sand-grid-lis-js', sand_URL .'assets/js/grid-list.js', array() ,false, true );
    wp_enqueue_script( 'sand-script-js', sand_URL .'assets/js/script.js', array() ,false, true );
    wp_enqueue_script( 'sand-customizer-js', sand_URL .'assets/js/customizer.js', array() ,false, true );
        $primaryColor     = get_option('sand_primaryColor');
        $secondaryColor   = get_option('sand_secondaryColor');
        $thirdColor       = get_option('sand_thirdColor');
        $googleFontUrl    = get_option('sand_font_url'.$lang);
        $googleFontName   = get_option('sand_font_name'.$lang);
        $custom_css = 

            "
                @import url('{$googleFontUrl}');
                :root {
                   --primaryColor   : {$primaryColor};
                   --secondaryColor : {$secondaryColor};
                   --thirdColor     : {$thirdColor};
                   --sand-font     : '{$googleFontName}',sans-serif;
                }
            ";
    wp_add_inline_style('sand-main-style-css', $custom_css);
}
add_action( 'wp_enqueue_scripts', 'sand_scripts_styles' );



