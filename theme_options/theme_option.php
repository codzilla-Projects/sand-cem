<?php
function sand_theme_options_callback(){
    if ( empty(pll_current_language()) )
        $lang = '_'.pll_default_language();
    else
        $lang = '_'.pll_current_language();
    $wp_editor_settings = array(
        'quicktags' => array( 'buttons' => 'strong,em,del,ul,ol,li,close' ), // note that spaces in this list seem to cause an issue
        'textarea_rows'=> 2

    );
    if( isset( $_POST['sand_save'] ) && !empty( $_POST['sand_save']) ){

        foreach ($_POST as $key => $value) {

            if(in_array($key,['footer_content'.$lang,'sand_font_url'.$lang,'sand_map'])){
                $value = stripcslashes($value);
            }
            update_option( $key, $value);
        }
    }
?>

<div class="container-fluid text-left padding-right-4">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12 bg-gray mt-3 mb-3 rounded">
            <!-- Top Navigation -->
            <header class="codrops-header">
                <h1 class="text-center site-title"><span>General Settings</span></h1>
            </header>
        </div>
        <br/>
        <div class="d-flex align-items-start p-0 m-0">

            <div class="nav flex-column nav-pills me-3 col-sm-3 col-md-3 col-lg-3 rounded" id="v-pills-tab" role="tablist" aria-orientation="vertical">

                <button class="nav-link active" id="v-pills-firstsection-tab" data-bs-toggle="pill" data-bs-target="#v-pills-firstsection" type="button" role="tab" aria-controls="v-pills-firstsection" aria-selected="true">Logos</button>

                <button class="nav-link" id="v-pills-sixthsection-tab" data-bs-toggle="pill" data-bs-target="#v-pills-sixthsection" type="button" role="tab" aria-controls="v-pills-sixthsection" aria-selected="false">Colors</button>

                <button class="nav-link" id="v-pills-seventhsection-tab" data-bs-toggle="pill" data-bs-target="#v-pills-seventhsection" type="button" role="tab" aria-controls="v-pills-seventhsection" aria-selected="false">Fonts</button>

                <button class="nav-link" id="v-pills-secondsection-tab" data-bs-toggle="pill" data-bs-target="#v-pills-secondsection" type="button" role="tab" aria-controls="v-pills-secondsection" aria-selected="false">Contact</button>

                <button class="nav-link" id="v-pills-thirdsection-tab" data-bs-toggle="pill" data-bs-target="#v-pills-thirdsection" type="button" role="tab" aria-controls="v-pills-thirdsection" aria-selected="false">Social Media</button>

                <button class="nav-link" id="v-pills-fifthsection-tab" data-bs-toggle="pill" data-bs-target="#v-pills-fifthsection" type="button" role="tab" aria-controls="v-pills-fifthsection" aria-selected="false">Pages Breadcrumb background</button>

                <button class="nav-link" id="v-pills-fourthsection-tab" data-bs-toggle="pill" data-bs-target="#v-pills-fourthsection" type="button" role="tab" aria-controls="v-pills-fourthsection" aria-selected="false">Footer</button>

            </div>

            <div class="tab-content col-sm-9 col-md-9 col-lg-9 gray_back" id="v-pills-tabContent">
                <form class="form-horizontal form_back p-5 rounded" method="post" action="#">
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-firstsection" role="tabpanel" aria-labelledby="v-pills-firstsection-tab">

                            <div class="form-group">
                                <label for="sand_header_logo_img" class="col-sm-12 text-left  control-label text-white">Header Logo</label>
                                <div class="col-sm-12 text-left ">
                                    <input class="sand_header_logo_img_url site_half" type="text" name="sand_header_logo_img" size="60" value="<?= get_option('sand_header_logo_img'); ?>">
                                    <a href="#" class="sand_header_logo_img_upload btn btn-info">Choose</a>
                                    <?php if (!empty(get_option('sand_header_logo_img'))): ?>
                                    <img class="img-fluid img-thumbnail w-50 mt-2 sand_header_logo_img bg-dark" src="<?= get_option('sand_header_logo_img'); ?>" height="100" style="max-width:100%" />
                                    <?php endif ?>
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="sand_favicon_img" class="col-sm-12 text-left  control-label text-white">Favicon Logo</label>
                                <div class="col-sm-12 text-left ">
                                    <input class="sand_favicon_img_url site_half" type="text" name="sand_favicon_img" size="60" value="<?= get_option('sand_favicon_img'); ?>">
                                    <a href="#" class="sand_favicon_img_upload btn btn-info">Choose</a>
                                    <?php if (!empty(get_option('sand_favicon_img'))): ?>
                                    <img class="img-fluid img-thumbnail w-50 mt-2 sand_favicon_img" src="<?= get_option('sand_favicon_img'); ?>" height="100" style="max-width:100%" />

                                    <?php endif ?>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="v-pills-sixthsection" role="tabpanel" aria-labelledby="v-pills-sixthsection-tab">
                            <div class="form-group">
                                <label for="sand_primaryColor" class="col-sm-12 text-left  control-label text-white">Primary Color</label>
                                <div class="col-sm-12 text-left d-flex align-items-center justify-content-start">
                                    <input type="color" class="form-control sand-color" id="sand_primaryColor" name="sand_primaryColor" value="<?= get_option('sand_primaryColor'); ?>">
                                    <div class="text-white ms-2"><?= get_option('sand_primaryColor'); ?></div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="sand_secondaryColor" class="col-sm-12 text-left  control-label text-white">Secondary Color</label>
                                <div class="col-sm-12 text-left d-flex align-items-center justify-content-start">
                                    <input type="color" class="form-control sand-color" id="sand_secondaryColor" name="sand_secondaryColor" value="<?= get_option('sand_secondaryColor'); ?>">
                                    <div class="text-white ms-2"><?= get_option('sand_secondaryColor'); ?></div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="sand_thirdColor" class="col-sm-12 text-left  control-label text-white">Third Color</label>
                                <div class="col-sm-12 text-left d-flex align-items-center justify-content-start">
                                    <input type="color" class="form-control sand-color" id="sand_thirdColor" name="sand_thirdColor" value="<?= get_option('sand_thirdColor'); ?>">
                                    <div class="text-white ms-2"><?= get_option('sand_thirdColor'); ?></div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="v-pills-seventhsection" role="tabpanel" aria-labelledby="v-pills-seventhsection-tab">
                            <div class="form-group">
                                <?php $name = 'sand_font_url'.$lang?>
                                <label for="<?=$name?>" class="col-sm-12 text-left  control-label text-white">Google Font Url</label>
                                <div class="col-sm-12 text-right ">
                                    <input style="direction:ltr" type="text" class="form-control" id="<?=$name?>" name="<?=$name?>" value="<?= get_option($name); ?>">

                                </div>
                            </div>

                            <div class="form-group">
                                <?php $name = 'sand_font_name'.$lang?>
                                <label for="<?=$name ?>" class="col-sm-12 text-left  control-label text-white">Google Font Name</label>
                                <div class="col-sm-12 text-right ">
                                    <input style="direction:ltr" type="text" class="form-control" id="<?=$name ?>" name="<?=$name ?>" value="<?= get_option($name); ?>">

                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="v-pills-secondsection" role="tabpanel" aria-labelledby="v-pills-secondsection-tab">
                            <div class="form-group">
                                <label for="sand_phone" class="col-sm-12 text-left  control-label text-white">Phone Number</label>
                                <div class="col-sm-12 text-left ">
                                    <input type="text" class="form-control" id="sand_phone" name="sand_phone" value="<?= get_option('sand_phone'); ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="sand_email" class="col-sm-12 text-left  control-label text-white">E-mali Address</label>
                                <div class="col-sm-12 text-left ">
                                    <input type="email" class="form-control text-left" id="sand_email" name="sand_email" value="<?= get_option('sand_email'); ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="sand_whatsapp" class="col-sm-12 text-left  control-label text-white">WhatsApp Number</label>
                                <div class="col-sm-12 text-left ">
                                    <input type="text" class="form-control" id="sand_whatsapp" name="sand_whatsapp" value="<?= get_option('sand_whatsapp'); ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <?php $name = 'sand_location'.$lang ; ?>
                                <label for="<?=$name ?>" class="col-sm-12 text-left  control-label text-white">Location</label>
                                <div class="col-sm-12 text-left ">
                                    <input type="text" class="form-control text-left" id="<?=$name ?>" name="<?=$name ?>" value="<?= get_option($name); ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="sand_map" class="col-sm-12 text-left  control-label text-white">Google Map</label>
                                <div class="col-sm-12 text-left ">
                                    <textarea class="form-control" id="sand_map" name="sand_map" rows="3"><?= get_option('sand_map'); ?></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="v-pills-thirdsection" role="tabpanel" aria-labelledby="v-pills-thirdsection-tab">
                            <div class="form-group">
                                <label for="sand_fb" class="col-sm-12 text-left  control-label text-white">Facebook</label>
                                <div class="col-sm-12 text-left ">
                                    <input type="text" class="form-control" id="sand_fb" name="sand_fb" value="<?= get_option('sand_fb'); ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="sand_twitter" class="col-sm-12 text-left  control-label text-white">Twitter</label>
                                <div class="col-sm-12 text-left ">
                                    <input type="text" class="form-control" id="sand_twitter" name="sand_twitter" value="<?= get_option('sand_twitter'); ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="sand_insta" class="col-sm-12 text-left  control-label text-white">Instagram</label>
                                <div class="col-sm-12 text-left ">
                                    <input type="text" class="form-control" id="sand_insta" name="sand_insta" value="<?= get_option('sand_insta'); ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="sand_linkedin" class="col-sm-12 text-left  control-label text-white">Linked In</label>
                                <div class="col-sm-12 text-left ">
                                    <input type="text" class="form-control" id="sand_linkedin" name="sand_linkedin" value="<?= get_option('sand_linkedin'); ?>">
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade show" id="v-pills-fifthsection" role="tabpanel" aria-labelledby="v-pills-fifthsection-tab">
                            <div class="form-group">
                                <label for="sand_breadcrumb_img" class="col-sm-12 text-left  control-label text-white">Breadcrumb Background</label>
                                <div class="col-sm-12 text-left ">
                                    <input class="sand_breadcrumb_img_url site_half" type="text" name="sand_breadcrumb_img" size="60" value="<?= get_option('sand_breadcrumb_img'); ?>">
                                    <a href="#" class="sand_breadcrumb_img_upload btn btn-info">Choose</a>
                                    <?php if (!empty(get_option('sand_breadcrumb_img'))): ?>
                                    <img class="img-fluid img-thumbnail w-50 mt-2 sand_breadcrumb_img bg-dark" src="<?= get_option('sand_breadcrumb_img'); ?>" height="100" style="max-width:100%" />
                                    <?php endif ?>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade show" id="v-pills-fourthsection" role="tabpanel" aria-labelledby="v-pills-fourthsection-tab">
                            <div class="form-group">
                                <label for="sand_footer_logo_img" class="col-sm-12 text-left  control-label text-white">Footer Logo</label>
                                <div class="col-sm-12 text-left ">
                                    <input class="sand_footer_logo_img_url site_half" type="text" name="sand_footer_logo_img" size="60" value="<?= get_option('sand_footer_logo_img'); ?>">
                                    <a href="#" class="sand_footer_logo_img_upload btn btn-info">Choose</a>
                                    <?php if (!empty(get_option('sand_footer_logo_img'))): ?>
                                    <img class="img-fluid img-thumbnail w-50 mt-2 sand_footer_logo_img bg-dark" src="<?= get_option('sand_footer_logo_img'); ?>" height="100" style="max-width:100%" />
                                    <?php endif ?>
                                </div>
                            </div>

                            <div class="form-group text-left">
                                <label for="footer_content" class="col-sm-6 control-label text-white">Footer Content</label>\
                                <?php $name = 'footer_content'.$lang ; ?>
                                <div class="col-sm-12">
                                    <?php wp_editor( get_option( $name ), $name,  $wp_editor_settings);  ?>
                                </div>
                            </div>
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
