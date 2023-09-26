<?php
    function contactUs_options_callback(){
        if ( empty(pll_current_language()) )
            $lang = '_'.pll_default_language();
        else
            $lang = '_'.pll_current_language();

        if ( $_SERVER['REQUEST_METHOD'] == 'POST' ):
            foreach ( $_POST as $key => $value ):

                if ( in_array( $key ,['first_contact_content'.$lang,'first_contact_title'.$lang] ) )
                    $value = stripcslashes($value);
                if ( $key == 'first_contact_content'.$lang )
                    update_option( 'sand_contactUs_contactForm_detailed'.$lang , do_shortcode( $value ) );
                update_option( $key , $value );

            endforeach;
            if ( !isset($_POST['first_contact_hidden'.$lang])) { delete_option( 'first_contact_hidden'.$lang ); }
            if ( !isset($_POST['second_contact_hidden'.$lang])) { delete_option( 'second_contact_hidden'.$lang ); }
        endif;
        ?>
        <div class="container-fluid text-left padding-right-4">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 bg-gray mt-3 mb-3 rounded">
                    <!-- Top Navigation -->
                    <header class="codrops-header">
                        <h1 class="text-center site-title"><span><?php _e('Contact Page Settings', 'sand'); ?></span></h1>
                    </header>
                </div>
                <br/>

                <div class="d-flex align-items-start p-0 m-0">


                    <div class="tab-content col-sm-12 col-md-12 col-lg-12 gray_back" id="v-pills-tabContent">

                         <form method="POST" class = "form-horizontal form_back p-5 rounded">
                            <div class="form-group text-left">                  
                                <div class="inline-block">
                                    <?php $name = 'first_contact_hidden'.$lang ; ?>
                                    <input type="checkbox" id="<?= $name ?>" name="<?= $name ?>" value="1" <?= get_option($name) == '1' ? 'checked' : ''; ?>>
                                </div>
                                <label for="<?= $name ?>" class="text-white">Hidden Section</label>
                            </div>
                            <div class="form-group">
                                <?php $name = 'first_contact_img' ; ?>
                                <label for="<?=$name ?>" class="col-sm-12 text-left  control-label text-white">Contact Image</label>
                                <div class="col-sm-12 text-left ">
                                    <input class="<?=$name ?>_url site_half" type="text" name="<?=$name ?>" size="60" value="<?= get_option( $name ); ?>">
                                    <a href="#" class="<?=$name ?>_upload btn btn-info">Choose</a>
                                    <?php if (!empty(get_option($name))): ?>
                                    <img class="img-fluid img-thumbnail w-50 mt-2 <?=$name ?>" src="<?= get_option( $name ); ?>" height="100" style="max-width:100%" />
                                    <?php endif ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <?php $name = 'first_contact_title'.$lang ; ?>
                                <label for="<?= $name ?>" class="col-sm-12 text-left control-label text-white">Contact Title</label>
                                <div class="col-sm-12 text-left ">
                                    <input type="text" class="form-control" id="<?= $name ?>" name="<?= $name ?>" value="<?= get_option( $name ); ?>">
                                </div>
                            </div>

                            <div class="form-group text-left">
                                <?php $name = 'first_contact_content'.$lang ; ?>
                                <label for="<?= $name ?>" class="col-sm-12 control-label text-white">Contact Form 7 Shortcode</label>
                                <div class="col-sm-12">
                                    <?php wp_editor( get_option( $name ), $name,  $wp_editor_settings);  ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <input type="submit" class="btn btn-default btn-block btn-lg w-100 mt-3 site_save_route" name="sand_save" value="Save Settings">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div><!-- /container -->
        <?php
    }
?>
