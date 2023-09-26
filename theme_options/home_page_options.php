<?php 
function home_options_callback() {
    if ( empty(pll_current_language()) )
        $lang = '_'.pll_default_language(); 
    else
        $lang = '_'.pll_current_language();

    $wp_editor_settings = array( 
        'quicktags' => array( 'buttons' => 'strong,em,del,ul,ol,li,close' ), 
        'textarea_rows'=> 5,
        'drag_drop_upload'=> true,
        'wpautop' => false,
        'media_buttons'=> true,
        'class'=>'form-control'
    ); 

    if ( $_SERVER['REQUEST_METHOD'] == 'POST' ):
        foreach ( $_POST as $key => $value ):

            if ( in_array( $key ,[
                    'about_content'.$lang,
                    'about_small_content'.$lang,
                    'property_content'.$lang,
                    'property_cat_content'.$lang,
                    'property_day_content'.$lang,
                    'featured_content'.$lang,
                    'testimonails_content'.$lang 
                    ] ) 
                )
                $value = stripcslashes($value);

            update_option( $key , $value );

        endforeach;
        if ( !isset($_POST['slider_hidden'.$lang])) delete_option( 'slider_hidden'.$lang);
        if ( !isset($_POST['about_hidden'.$lang])) delete_option( 'about_hidden'.$lang);
        if ( !isset($_POST['property_hidden'.$lang])) delete_option( 'property_hidden'.$lang);
        if ( !isset($_POST['property_cat_hidden'.$lang])) delete_option( 'property_cat_hidden'.$lang);
        if ( !isset($_POST['property_day_hidden'.$lang])) delete_option( 'property_day_hidden'.$lang);
        if ( !isset($_POST['featured_hidden'.$lang])) delete_option( 'featured_hidden'.$lang);
        if ( !isset($_POST['testimonails_hidden'.$lang])) delete_option( 'testimonails_hidden'.$lang);
    endif; 
?>
    <div class="container-fluid text-left padding-right-4">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 bg-gray mt-3 mb-3 rounded">

                    <!-- Top Navigation -->

                    <header class="codrops-header">

                        <h1 class="text-center site-title"><span><?php _e('Home Page Settings', 'sand'); ?></span></h1>

                    </header>

                </div>

                    <br/>

                <div class="d-flex align-items-start p-0 m-0">

                    <div class="nav flex-column nav-pills me-3 col-sm-3 col-md-3 col-lg-3 rounded" id="v-pills-tab" role="tablist" aria-orientation="vertical">

                        <button class="nav-link active" id="v-pills-sectionOne-tab" data-bs-toggle="pill" data-bs-target="#v-pills-sectionOne" type="button" role="tab" aria-controls="v-pills-sectionOne" aria-selected="true"><?php _e('SLider Section','sand') ?></button>
                        <button class="nav-link" id="v-pills-sectionTwo-tab" data-bs-toggle="pill" data-bs-target="#v-pills-sectionTwo" type="button" role="tab" aria-controls="v-pills-sectionTwo" aria-selected="true"><?php _e('About Section','sand') ?></button>
                        <button class="nav-link" id="v-pills-sectionThree-tab" data-bs-toggle="pill" data-bs-target="#v-pills-sectionThree" type="button" role="tab" aria-controls="v-pills-sectionThree" aria-selected="true"><?php _e('Property Section','sand') ?></button>
                        <button class="nav-link" id="v-pills-sectionFour-tab" data-bs-toggle="pill" data-bs-target="#v-pills-sectionFour" type="button" role="tab" aria-controls="v-pills-sectionFour" aria-selected="true"><?php _e('Property Category Section','sand') ?></button>
                        <button class="nav-link" id="v-pills-sectionFive-tab" data-bs-toggle="pill" data-bs-target="#v-pills-sectionFive" type="button" role="tab" aria-controls="v-pills-sectionFive" aria-selected="true"><?php _e('Property Day Section','sand') ?></button>
                        <button class="nav-link" id="v-pills-sectionSix-tab" data-bs-toggle="pill" data-bs-target="#v-pills-sectionSix" type="button" role="tab" aria-controls="v-pills-sectionSix" aria-selected="true"><?php _e('Featured Cities Section','sand') ?></button>
                        <button class="nav-link" id="v-pills-sectionSeven-tab" data-bs-toggle="pill" data-bs-target="#v-pills-sectionSeven" type="button" role="tab" aria-controls="v-pills-sectionSeven" aria-selected="true"><?php _e('Testimonials Section','sand') ?></button>

                    </div>

                    <div class="tab-content col-sm-9 col-md-9 col-lg-9 gray_back" id="v-pills-tabContent">

                         <form method="POST" class = "form-horizontal form_back p-5 rounded">
                            <div class="tab-content" id="v-pills-tabContent">

                                <div class="tab-pane fade show active" id="v-pills-sectionOne" role="tabpanel" aria-labelledby="v-pills-sectionOne-tab">
                                    <div class="form-group text-left">                  
                                        <div class="inline-block">
                                            <?php $name = 'slider_hidden'.$lang ; ?>
                                            <input type="checkbox" id="<?= $name ?>" name="<?= $name ?>" value="1" <?= get_option($name) == '1' ? 'checked' : ''; ?>>
                                        </div>
                                        <label for="<?= $name ?>" class="text-white">Hide Section</label>
                                    </div>
                                    <div class="form-group">
                                        <?php $name = 'slider_number'.$lang ; ?>
                                        <label for="<?= $name ?>" class="col-sm-12 text-left  control-label text-white">Slides Count</label>
                                        <div class="col-sm-12 text-left ">
                                            <input type="number" class="form-control" id="<?= $name ?>" name="<?= $name ?>" value="<?= get_option( $name ); ?>">
                                        </div>
                                        
                                    </div>
                                    <div class="form-group">
                                        <?php $name = 'type_slider_category'.$lang.'[]' ; $terms = get_terms( array('taxonomy' => 'type','hide_empty' => true,) );?>
                                        <label for="<?= $name ?>" class="col-sm-12 text-start  control-label text-white"><?php _e('Type Category','sand') ?></label>

                                        <div class="col-sm-12 text-start multiSelect_field">
                                            <select  name="<?= $name ?>" multiple class="js-example-basic-multiple">
                                            <option value = ''>
                                                <?php _e('Choose Types','sand') ?>
                                            </option>
                                            <?php $name_new = get_option('type_slider_category'.$lang); ?>
                                                <?php foreach ($terms as $term) : ?>
                                            <?php
                                            if (!empty($name_new)) {
                                             $selected_term = ( in_array($term->term_id, $name_new) ) ? 'selected="selected"' :  '';
                                            }
                                            ?>
                                            <option value="<?= $term->term_id; ?>"  <?= $selected_term; ?> >    <?= $term->name; ?>
                                            </option>
                                            <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <?php $name = 'slider_img' ; ?>
                                        <label for="<?=$name ?>" class="col-sm-12 text-left  control-label text-white">Slider Image</label>
                                        <div class="col-sm-12 text-left ">
                                            <input class="<?=$name ?>_url site_half" type="text" name="<?=$name ?>" size="60" value="<?= get_option( $name ); ?>">
                                            <a href="#" class="<?=$name ?>_upload btn btn-info">Choose</a>
                                            <?php if (!empty(get_option($name))): ?>
                                            <img class="img-fluid img-thumbnail w-50 mt-2 <?=$name ?>" src="<?= get_option( $name ); ?>" height="100" style="max-width:100%" />
                                            <?php endif ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade show" id="v-pills-sectionTwo" role="tabpanel" aria-labelledby="v-pills-sectionTwo-tab">
                                    <div class="form-group text-left">                  
                                        <div class="inline-block">
                                            <?php $name = 'about_hidden'.$lang ; ?>
                                            <input type="checkbox" id="<?= $name ?>" name="<?= $name ?>" value="1" <?= get_option($name) == '1' ? 'checked' : ''; ?>>
                                        </div>
                                        <label for="<?= $name ?>" class="text-white">Hide Section</label>
                                    </div>
                                    <div class="form-group">
                                        <?php $name = 'about_first_img' ; ?>
                                        <label for="<?=$name ?>" class="col-sm-12 text-left  control-label text-white">About First Image</label>

                                        <div class="col-sm-12 text-left ">

                                            <input class="<?=$name ?>_url site_half" type="text" name="<?=$name ?>" size="60" value="<?= get_option( $name ); ?>">

                                            <a href="#" class="<?=$name ?>_upload btn btn-info">Choose</a>

                                            <?php if (!empty(get_option($name))): ?>

                                            <img class="img-fluid img-thumbnail w-50 mt-2 <?=$name ?>" src="<?= get_option( $name ); ?>" height="100" style="max-width:100%" />

                                            <?php endif ?>

                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <?php $name = 'about_second_img' ; ?>
                                        <label for="<?=$name ?>" class="col-sm-12 text-left  control-label text-white">About Second Image</label>

                                        <div class="col-sm-12 text-left ">

                                            <input class="<?=$name ?>_url site_half" type="text" name="<?=$name ?>" size="60" value="<?= get_option( $name ); ?>">

                                            <a href="#" class="<?=$name ?>_upload btn btn-info">Choose</a>

                                            <?php if (!empty(get_option($name))): ?>

                                            <img class="img-fluid img-thumbnail w-50 mt-2 <?=$name ?>" src="<?= get_option( $name ); ?>" height="100" style="max-width:100%" />

                                            <?php endif ?>

                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <?php $name = 'about_title'.$lang ; ?>
                                        <label for="<?= $name ?>" class="col-sm-12 text-left control-label text-white">About Title</label>
                                        <div class="col-sm-12 text-left ">
                                            <input type="text" class="form-control" id="<?= $name ?>" name="<?= $name ?>" value="<?= get_option( $name ); ?>">
                                        </div>
                                    </div>

                                    <div class="form-group text-left">
                                        <?php $name = 'about_content'.$lang ; ?>
                                        <label for="<?= $name ?>" class="col-sm-6 control-label text-white">About Content</label>
                                        <div class="col-sm-12">
                                            <?php wp_editor( get_option( $name ), $name,  $wp_editor_settings);  ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <?php $name = 'about_small_title'.$lang ; ?>
                                        <label for="<?= $name ?>" class="col-sm-12 text-left  control-label text-white">About Small Title</label>
                                        <div class="col-sm-12 text-left ">
                                            <input type="text" class="form-control" id="<?= $name ?>" name="<?= $name ?>" value="<?= get_option( $name ); ?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <?php $name = 'about_small_content'.$lang ; ?>
                                        <label for="<?= $name ?>" class="col-sm-6 control-label text-white">About Small Content</label>
                                        <div class="col-sm-12">
                                            <?php wp_editor( get_option( $name ), $name,  $wp_editor_settings);  ?>
                                        </div>
                                    </div>
                                    <div class="row">

                                        <div class="col-md-4">
                                            <div class="services">
                                                <div class="form-group">
                                                    <?php $name = 'about_first_icon_font'; ?>
                                                    <label for="<?= $name ?>" class="col-sm-12 text-left control-label text-white">About First Icon Font</label>
                                                    <div class="col-sm-12 text-left ">
                                                        <input type="text" class="form-control" id="<?= $name ?>" name="<?= $name ?>" value="<?= get_option( $name ); ?>">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <?php $name = 'about_first_icon_title'.$lang ; ?>
                                                    <label for="<?= $name ?>" class="col-sm-12 text-left control-label text-white">About First Icon Title</label>
                                                    <div class="col-sm-12 text-left ">
                                                        <input type="text" class="form-control" id="<?= $name ?>" name="<?= $name ?>" value="<?= get_option( $name ); ?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="services">
                                                <div class="form-group">
                                                    <?php $name = 'about_second_icon_font'; ?>
                                                    <label for="<?= $name ?>" class="col-sm-12 text-left control-label text-white">About Second Icon Font</label>
                                                    <div class="col-sm-12 text-left ">
                                                        <input type="text" class="form-control" id="<?= $name ?>" name="<?= $name ?>" value="<?= get_option( $name ); ?>">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <?php $name = 'about_second_icon_title'.$lang ; ?>
                                                    <label for="<?= $name ?>" class="col-sm-12 text-left control-label text-white">About Second Icon Title</label>
                                                    <div class="col-sm-12 text-left ">
                                                        <input type="text" class="form-control" id="<?= $name ?>" name="<?= $name ?>" value="<?= get_option( $name ); ?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="services">
                                                <div class="form-group">
                                                    <?php $name = 'about_third_icon_font'; ?>
                                                    <label for="<?= $name ?>" class="col-sm-12 text-left control-label text-white">About Third Icon Font</label>
                                                    <div class="col-sm-12 text-left ">
                                                        <input type="text" class="form-control" id="<?= $name ?>" name="<?= $name ?>" value="<?= get_option( $name ); ?>">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <?php $name = 'about_third_icon_title'.$lang ; ?>
                                                    <label for="<?= $name ?>" class="col-sm-12 text-left control-label text-white">About Third Icon Title</label>
                                                    <div class="col-sm-12 text-left ">
                                                        <input type="text" class="form-control" id="<?= $name ?>" name="<?= $name ?>" value="<?= get_option( $name ); ?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 text-end">
                                            <a href="https://fontawesome.com/v5/search?o=r&m=free" class="text-white">Click Here To Choose Font Icon</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade show" id="v-pills-sectionThree" role="tabpanel" aria-labelledby="v-pills-sectionThree-tab">
                                    <div class="form-group text-left">                  
                                        <div class="inline-block">
                                            <?php $name = 'property_hidden'.$lang ; ?>
                                            <input type="checkbox" id="<?= $name ?>" name="<?= $name ?>" value="1" <?= get_option($name) == '1' ? 'checked' : ''; ?>>
                                        </div>
                                        <label for="<?= $name ?>" class="text-white">Hide Section</label>
                                    </div>
                                    <div class="form-group">
                                        <?php $name = 'property_title'.$lang ; ?>
                                        <label for="<?= $name ?>" class="col-sm-12 text-left control-label text-white">property Title</label>
                                        <div class="col-sm-12 text-left ">
                                            <input type="text" class="form-control" id="<?= $name ?>" name="<?= $name ?>" value="<?= get_option( $name ); ?>">
                                        </div>
                                    </div>

                                    <div class="form-group text-left">
                                        <?php $name = 'property_content'.$lang ; ?>
                                        <label for="<?= $name ?>" class="col-sm-6 control-label text-white">property Content</label>
                                        <div class="col-sm-12">
                                            <?php wp_editor( get_option( $name ), $name,  $wp_editor_settings);  ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <?php $name = 'property_number'.$lang ; ?>
                                        <label for="<?= $name ?>" class="col-sm-12 text-left  control-label text-white">property Category number</label>
                                        <div class="col-sm-12 text-left ">
                                            <input type="number" class="form-control" id="<?= $name ?>" name="<?= $name ?>" value="<?= get_option( $name ); ?>">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="tab-pane fade show" id="v-pills-sectionFour" role="tabpanel" aria-labelledby="v-pills-sectionFour-tab">
                                    <div class="form-group text-left">                  
                                        <div class="inline-block">
                                            <?php $name = 'property_cat_hidden'.$lang ; ?>
                                            <input type="checkbox" id="<?= $name ?>" name="<?= $name ?>" value="1" <?= get_option($name) == '1' ? 'checked' : ''; ?>>
                                        </div>
                                        <label for="<?= $name ?>" class="text-white">Hide Section</label>
                                    </div>
                                    <div class="form-group">
                                        <?php $name = 'property_cat_title'.$lang ; ?>
                                        <label for="<?= $name ?>" class="col-sm-12 text-left control-label text-white">property Category Title</label>
                                        <div class="col-sm-12 text-left ">
                                            <input type="text" class="form-control" id="<?= $name ?>" name="<?= $name ?>" value="<?= get_option( $name ); ?>">
                                        </div>
                                    </div>

                                    <div class="form-group text-left">
                                        <?php $name = 'property_cat_content'.$lang ; ?>
                                        <label for="<?= $name ?>" class="col-sm-6 control-label text-white">property Category Content</label>
                                        <div class="col-sm-12">
                                            <?php wp_editor( get_option( $name ), $name,  $wp_editor_settings);  ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <?php 
                                        $name = 'property_category'.$lang.'[]' ; 
                                        $types = get_terms( 
                                            array('taxonomy' => 'type',
                                                'hide_empty' => true
                                            ) 
                                        );
                                        ?>
                                        <label for="<?= $name ?>" class="col-sm-12 text-left  control-label text-white">Property Categories</label>

                                        <div class="col-sm-12 text-left multiSelect_field">
                                            <select  name="<?= $name ?>" multiple class="js-example-basic-multiple">
                                            <option value = ''>Choose Category</option>
                                            <?php $name_new = get_option('property_category'.$lang); ?>
                                            <?php foreach ($types as $type) : 
                                            if (!empty($name_new)) {
                                                if (in_array($type->term_id, $name_new)) {
                                                        $selected_type = 'selected';
                                                }
                                                else {
                                                $selected_type = 'not';
                                                }
                                            }

                                            ?>
                                            
                                            <option value="<?php echo $type->term_id; ?>"  <?php echo $selected_type;?> > <?php echo $type->name; ?></option>
                                            <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <?php $name = 'property_cat_number'.$lang ; ?>
                                        <label for="<?= $name ?>" class="col-sm-12 text-left  control-label text-white">property Category Property number</label>
                                        <div class="col-sm-12 text-left ">
                                            <input type="number" class="form-control" id="<?= $name ?>" name="<?= $name ?>" value="<?= get_option( $name ); ?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade show" id="v-pills-sectionFive" role="tabpanel" aria-labelledby="v-pills-sectionFive-tab">
                                    <div class="form-group text-left">                  
                                        <div class="inline-block">
                                            <?php $name = 'property_day_hidden'.$lang ; ?>
                                            <input type="checkbox" id="<?= $name ?>" name="<?= $name ?>" value="1" <?= get_option($name) == '1' ? 'checked' : ''; ?>>
                                        </div>
                                        <label for="<?= $name ?>" class="text-white">Hide Section</label>
                                    </div>
                                    <div class="form-group">
                                        <?php $name = 'property_day_title'.$lang ; ?>
                                        <label for="<?= $name ?>" class="col-sm-12 text-left control-label text-white">property Title</label>
                                        <div class="col-sm-12 text-left ">
                                            <input type="text" class="form-control" id="<?= $name ?>" name="<?= $name ?>" value="<?= get_option( $name ); ?>">
                                        </div>
                                    </div>

                                    <div class="form-group text-left">
                                        <?php $name = 'property_day_content'.$lang ; ?>
                                        <label for="<?= $name ?>" class="col-sm-6 control-label text-white">property Content</label>
                                        <div class="col-sm-12">
                                            <?php wp_editor( get_option( $name ), $name,  $wp_editor_settings);  ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade show" id="v-pills-sectionSix" role="tabpanel" aria-labelledby="v-pills-sectionSix-tab">
                                    <div class="form-group">
                                        <div class="form-group text-left">                  
                                            <div class="inline-block">
                                                <?php $name = 'featured_hidden'.$lang ; ?>
                                                <input type="checkbox" id="<?= $name ?>" name="<?= $name ?>" value="1" <?= get_option($name) == '1' ? 'checked' : ''; ?>>
                                            </div>
                                            <label for="<?= $name ?>" class="text-white">Hide Section</label>
                                        </div>
                                        <?php $name = 'featured_title'.$lang ; ?>
                                        <label for="<?= $name ?>" class="col-sm-12 text-left control-label text-white">Featured Title</label>
                                        <div class="col-sm-12 text-left ">
                                            <input type="text" class="form-control" id="<?= $name ?>" name="<?= $name ?>" value="<?= get_option( $name ); ?>">
                                        </div>
                                    </div>

                                    <div class="form-group text-left">
                                        <?php $name = 'featured_content'.$lang ; ?>
                                        <label for="<?= $name ?>" class="col-sm-6 control-label text-white">Featured Content</label>
                                        <div class="col-sm-12">
                                            <?php wp_editor( get_option( $name ), $name,  $wp_editor_settings);  ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <?php 
                                        $name = 'location_home_category'.$lang.'[]' ; 
                                        $property_location = get_terms( array(
                                            'taxonomy'      => 'location',
                                            'hide_empty'    => false,
                                            'orderby'       => 'ID',
                                            'order'         => 'ASC'
                                            )
                                        );
                                        ?>
                                        <?php $name_location = get_option('location_home_category'.$lang); ?>
                                        <label for="<?= $name ?>" class="col-sm-12 text-start  control-label text-white"><?php _e('Location Category','sand') ?></label>

                                        <div class="col-sm-12 text-start multiSelect_field">
                                            <select  name="<?= $name ?>" multiple class="js-example-basic-multiple">
                                            <option value = ''>
                                                <?php _e('Choose Category','sand') ?>
                                            </option>
                                            
                                            <?php foreach ($property_location as $location) : ?>
                                            <?php
                                            if (!empty($name_location)) {
                                             
                                                if (in_array($location->term_id, $name_location)) {
                                                        $selected_location = 'selected';
                                                }
                                                else {
                                                $selected_location = 'not';
                                                }
                                            }
                                            ?>
                                            <option value="<?php echo $location->term_id; ?>" <?php 
                                                 echo $selected_location;?>>    <?php echo $location->name; ?>
                                            </option>
                                            <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade show" id="v-pills-sectionSeven" role="tabpanel" aria-labelledby="v-pills-sectionSeven-tab">
                                    <div class="form-group text-left">                  
                                        <div class="inline-block">
                                            <?php $name = 'testimonails_hidden'.$lang ; ?>
                                            <input type="checkbox" id="<?= $name ?>" name="<?= $name ?>" value="1" <?= get_option($name) == '1' ? 'checked' : ''; ?>>
                                        </div>
                                        <label for="<?= $name ?>" class="text-white">Hide Section</label>
                                    </div>
                                    <div class="form-group">
                                        <?php $name = 'testimonails_title'.$lang ; ?>
                                        <label for="<?= $name ?>" class="col-sm-12 text-left control-label text-white">Testimonails Title</label>
                                        <div class="col-sm-12 text-left ">
                                            <input type="text" class="form-control" id="<?= $name ?>" name="<?= $name ?>" value="<?= get_option( $name ); ?>">
                                        </div>
                                    </div>

                                    <div class="form-group text-left">
                                        <?php $name = 'testimonails_content'.$lang ; ?>
                                        <label for="<?= $name ?>" class="col-sm-6 control-label text-white">Testimonails Content</label>
                                        <div class="col-sm-12">
                                            <?php wp_editor( get_option( $name ), $name,  $wp_editor_settings);  ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <?php $name = 'testimonails_number'.$lang ; ?>
                                        <label for="<?= $name ?>" class="col-sm-12 text-left  control-label text-white">Testimonails number</label>
                                        <div class="col-sm-12 text-left ">
                                            <input type="number" class="form-control" id="<?= $name ?>" name="<?= $name ?>" value="<?= get_option( $name ); ?>">
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <input type="submit" class="btn btn-default btn-block btn-lg w-100 mt-3 site_save_route" name="gsa_save" value="Save Settings">
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