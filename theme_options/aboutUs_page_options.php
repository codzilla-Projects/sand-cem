<?php
    function aboutUs_options_callback() {
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
                    'first_about_content'.$lang,
                    'second_about_content'.$lang,
                    'second_about_first_icon_content'.$lang,
                    'second_about_second_icon_content'.$lang,
                    'about_location_content'.$lang,
                    'fourth_about_content'.$lang,
                    'fourth_about_first_icon_content'.$lang,
                    'fourth_about_second_icon_content'.$lang,
                    'fourth_about_third_icon_content'.$lang,
                    'fourth_about_fourth_icon_content'.$lang,
                    'about_team_content'.$lang,
                    'sixth_about_second_icon_content'.$lang,
                    'sixth_about_third_icon_content'.$lang,
                    'about_testimonials_content'.$lang,
                    'first_location_content'.$lang,
                    'second_location_content'.$lang,
                    'third_location_content'.$lang
                    ] ) 
                )
                $value = stripcslashes($value);

            update_option( $key , $value );

        endforeach;
        if ( !isset($_POST['first_about_hidden'.$lang])) delete_option( 'first_about_hidden' .$lang);
        if ( !isset($_POST['second_about_hidden'.$lang])) delete_option( 'second_about_hidden' .$lang);
        if ( !isset($_POST['about_location_hidden'.$lang])) delete_option( 'about_location_hidden' .$lang);
        if ( !isset($_POST['fourth_about_hidden'.$lang])) delete_option( 'fourth_about_hidden' .$lang);
        if ( !isset($_POST['about_team_hidden'.$lang])) delete_option( 'about_team_hidden' .$lang);
        if ( !isset($_POST['sixth_about_hidden'.$lang])) delete_option( 'sixth_about_hidden' .$lang);
        if ( !isset($_POST['about_testimonials_hidden'.$lang])) delete_option( 'about_testimonials_hidden' .$lang);
    endif; 
?>
    <div class="container-fluid text-left padding-right-4">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 bg-gray mt-3 mb-3 rounded">

                    <!-- Top Navigation -->

                    <header class="codrops-header">

                        <h1 class="text-center site-title"><span><?php _e('About Page Settings', 'sand'); ?></span></h1>

                    </header>

                </div>

                    <br/>

                <div class="d-flex align-items-start p-0 m-0">

                    <div class="nav flex-column nav-pills me-3 col-sm-3 col-md-3 col-lg-3 rounded" id="v-pills-tab" role="tablist" aria-orientation="vertical">

                        <button class="nav-link active" id="v-pills-sectionOne-tab" data-bs-toggle="pill" data-bs-target="#v-pills-sectionOne" type="button" role="tab" aria-controls="v-pills-sectionOne" aria-selected="true"><?php _e('About Section','sand') ?></button>
                        <button class="nav-link" id="v-pills-sectionTwo-tab" data-bs-toggle="pill" data-bs-target="#v-pills-sectionTwo" type="button" role="tab" aria-controls="v-pills-sectionTwo" aria-selected="true"><?php _e('Mission & Vision Section','sand') ?></button>
                        <button class="nav-link" id="v-pills-sectionThree-tab" data-bs-toggle="pill" data-bs-target="#v-pills-sectionThree" type="button" role="tab" aria-controls="v-pills-sectionThree" aria-selected="true"><?php _e('Location Section','sand') ?></button>
                        <button class="nav-link" id="v-pills-sectionFour-tab" data-bs-toggle="pill" data-bs-target="#v-pills-sectionFour" type="button" role="tab" aria-controls="v-pills-sectionFour" aria-selected="true"><?php _e('Services Section','sand') ?></button>
                        <button class="nav-link" id="v-pills-sectionFive-tab" data-bs-toggle="pill" data-bs-target="#v-pills-sectionFive" type="button" role="tab" aria-controls="v-pills-sectionFive" aria-selected="true"><?php _e('Team Section','sand') ?></button>
                        <button class="nav-link" id="v-pills-sectionSix-tab" data-bs-toggle="pill" data-bs-target="#v-pills-sectionSix" type="button" role="tab" aria-controls="v-pills-sectionSix" aria-selected="true"><?php _e('Experience Section','sand') ?></button>
                        <button class="nav-link" id="v-pills-sectionSeven-tab" data-bs-toggle="pill" data-bs-target="#v-pills-sectionSeven" type="button" role="tab" aria-controls="v-pills-sectionSeven" aria-selected="true"><?php _e('Testimonials Section','sand') ?></button>

                    </div>

                    <div class="tab-content col-sm-9 col-md-9 col-lg-9 gray_back" id="v-pills-tabContent">

                         <form method="POST" class = "form-horizontal form_back p-5 rounded">
                            <div class="tab-content" id="v-pills-tabContent">

                                <div class="tab-pane fade show active" id="v-pills-sectionOne" role="tabpanel" aria-labelledby="v-pills-sectionOne-tab">
                                    <div class="form-group text-left">                  
                                        <div class="inline-block">
                                            <?php $name = 'first_about_hidden'.$lang ; ?>
                                            <input type="checkbox" id="<?= $name ?>" name="<?= $name ?>" value="1" <?= get_option($name) == '1' ? 'checked' : ''; ?>>
                                        </div>
                                        <label for="<?= $name ?>" class="text-white">Hidden Section</label>
                                    </div>
                                    <div class="form-group">
                                        <?php $name = 'first_about_sub_title'.$lang ; ?>
                                        <label for="<?= $name ?>" class="col-sm-12 text-left control-label text-white">About Title</label>
                                        <div class="col-sm-12 text-left ">
                                            <input type="text" class="form-control" id="<?= $name ?>" name="<?= $name ?>" value="<?= get_option( $name ); ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <?php $name = 'first_about_title'.$lang ; ?>
                                        <label for="<?= $name ?>" class="col-sm-12 text-left control-label text-white">About Title</label>
                                        <div class="col-sm-12 text-left ">
                                            <input type="text" class="form-control" id="<?= $name ?>" name="<?= $name ?>" value="<?= get_option( $name ); ?>">
                                        </div>
                                    </div>

                                    <div class="form-group text-left">
                                        <?php $name = 'first_about_content'.$lang ; ?>
                                        <label for="<?= $name ?>" class="col-sm-12 control-label text-white">About Content</label>
                                        <div class="col-sm-12">
                                            <?php wp_editor( get_option( $name ), $name,  $wp_editor_settings);  ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <?php $name = 'first_about_img' ; ?>
                                        <label for="<?=$name ?>" class="col-sm-12 text-left  control-label text-white">About Image</label>
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
                                            <?php $name = 'second_about_hidden'.$lang ; ?>
                                            <input type="checkbox" id="<?= $name ?>" name="<?= $name ?>" value="1" <?= get_option($name) == '1' ? 'checked' : ''; ?>>
                                        </div>
                                        <label for="<?= $name ?>" class="text-white">Hidden Section</label>
                                    </div>

                                    <div class="form-group">
                                        <?php $name = 'second_about_title'.$lang ; ?>
                                        <label for="<?= $name ?>" class="col-sm-12 text-left control-label text-white">Mission & Vision Title</label>
                                        <div class="col-sm-12 text-left ">
                                            <input type="text" class="form-control" id="<?= $name ?>" name="<?= $name ?>" value="<?= get_option( $name ); ?>">
                                        </div>
                                    </div>

                                    <div class="form-group text-left">
                                        <?php $name = 'second_about_content'.$lang ; ?>
                                        <label for="<?= $name ?>" class="col-sm-12 control-label text-white">Mission & Vision Content</label>
                                        <div class="col-sm-12">
                                            <?php wp_editor( get_option( $name ), $name,  $wp_editor_settings);  ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="services">
                                                <div class="form-group">
                                                    <?php $name = 'second_about_first_icon_title'.$lang ; ?>
                                                    <label for="<?= $name ?>" class="col-sm-12 text-left control-label text-white">Mission Title</label>
                                                    <div class="col-sm-12 text-left ">
                                                        <input type="text" class="form-control" id="<?= $name ?>" name="<?= $name ?>" value="<?= get_option( $name ); ?>">
                                                    </div>
                                                </div>

                                                <div class="form-group text-left">
                                                    <?php $name = 'second_about_first_icon_content'.$lang ; ?>
                                                    <label for="<?= $name ?>" class="col-sm-12 control-label text-white">Mission Content</label>
                                                    <div class="col-sm-12">
                                                        <?php wp_editor( get_option( $name ), $name,  $wp_editor_settings);  ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="services">
                                                <div class="form-group">
                                                    <?php $name = 'second_about_second_icon_title'.$lang ; ?>
                                                    <label for="<?= $name ?>" class="col-sm-12 text-left control-label text-white">Vision Title</label>
                                                    <div class="col-sm-12 text-left ">
                                                        <input type="text" class="form-control" id="<?= $name ?>" name="<?= $name ?>" value="<?= get_option( $name ); ?>">
                                                    </div>
                                                </div>

                                                <div class="form-group text-left">
                                                    <?php $name = 'second_about_second_icon_content'.$lang ; ?>
                                                    <label for="<?= $name ?>" class="col-sm-12 control-label text-white">Vision Content</label>
                                                    <div class="col-sm-12">
                                                        <?php wp_editor( get_option( $name ), $name,  $wp_editor_settings);  ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade show" id="v-pills-sectionThree" role="tabpanel" aria-labelledby="v-pills-sectionThree-tab">
                                    <div class="form-group text-left">                  
                                        <div class="inline-block">
                                            <?php $name = 'about_location_hidden'.$lang ; ?>
                                            <input type="checkbox" id="<?= $name ?>" name="<?= $name ?>" value="1" <?= get_option($name) == '1' ? 'checked' : ''; ?>>
                                        </div>
                                        <label for="<?= $name ?>" class="text-white">Hidden Section</label>
                                    </div>
                                    <div class="form-group">
                                        <?php $name = 'about_location_title'.$lang ; ?>
                                        <label for="<?= $name ?>" class="col-sm-12 text-left control-label text-white">location Title</label>
                                        <div class="col-sm-12 text-left ">
                                            <input type="text" class="form-control" id="<?= $name ?>" name="<?= $name ?>" value="<?= get_option( $name ); ?>">
                                        </div>
                                    </div>

                                    <div class="form-group text-left">
                                        <?php $name = 'about_location_content'.$lang ; ?>
                                        <label for="<?= $name ?>" class="col-sm-12 control-label text-white">location Content</label>
                                        <div class="col-sm-12">
                                            <?php wp_editor( get_option( $name ), $name,  $wp_editor_settings);  ?>
                                        </div>
                                    </div>

                                     <div class="form-group">
                                        <?php $name = 'location_category'.$lang.'[]' ; $terms = get_terms( array('taxonomy' => 'location','hide_empty' => true,) );?>
                                        <label for="<?= $name ?>" class="col-sm-12 text-start  control-label text-white"><?php _e('Location Category','sand') ?></label>

                                        <div class="col-sm-12 text-start multiSelect_field">
                                            <select  name="<?= $name ?>" multiple class="js-example-basic-multiple">
                                            <option value = ''>
                                                <?php _e('Choose Category','sand') ?>
                                            </option>
                                            <?php $name_new = get_option('location_category'.$lang); ?>
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
                                </div>
                                
                                <div class="tab-pane fade show" id="v-pills-sectionFour" role="tabpanel" aria-labelledby="v-pills-sectionFour-tab">
                                    <div class="form-group text-left">                  
                                        <div class="inline-block">
                                            <?php $name = 'fourth_about_hidden'.$lang ; ?>
                                            <input type="checkbox" id="<?= $name ?>" name="<?= $name ?>" value="1" <?= get_option($name) == '1' ? 'checked' : ''; ?>>
                                        </div>
                                        <label for="<?= $name ?>" class="text-white">Hidden Section</label>
                                    </div>

                                    <div class="form-group">
                                        <?php $name = 'fourth_about_title'.$lang ; ?>
                                        <label for="<?= $name ?>" class="col-sm-12 text-left control-label text-white">Services Title</label>
                                        <div class="col-sm-12 text-left ">
                                            <input type="text" class="form-control" id="<?= $name ?>" name="<?= $name ?>" value="<?= get_option( $name ); ?>">
                                        </div>
                                    </div>

                                    <div class="form-group text-left">
                                        <?php $name = 'fourth_about_content'.$lang ; ?>
                                        <label for="<?= $name ?>" class="col-sm-6 control-label text-white">Services Content</label>
                                        <div class="col-sm-12">
                                            <?php wp_editor( get_option( $name ), $name,  $wp_editor_settings);  ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="services">
                                                <div class="form-group">
                                                    <?php $name = 'fourth_about_first_icon'; ?>
                                                    <label for="<?= $name ?>" class="col-sm-12 text-left control-label text-white">First Service Icon</label>
                                                    <div class="col-sm-12 text-left ">
                                                        <input type="text" class="form-control" id="<?= $name ?>" name="<?= $name ?>" value="<?= get_option( $name ); ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <?php $name = 'fourth_about_first_icon_title'.$lang ; ?>
                                                    <label for="<?= $name ?>" class="col-sm-12 text-left control-label text-white">First Service Title</label>
                                                    <div class="col-sm-12 text-left ">
                                                        <input type="text" class="form-control" id="<?= $name ?>" name="<?= $name ?>" value="<?= get_option( $name ); ?>">
                                                    </div>
                                                </div>

                                                <div class="form-group text-left">
                                                    <?php $name = 'fourth_about_first_icon_content'.$lang ; ?>
                                                    <label for="<?= $name ?>" class="col-sm-12 control-label text-white">First Service Content</label>
                                                    <div class="col-sm-12">
                                                        <?php wp_editor( get_option( $name ), $name,  $wp_editor_settings);  ?>
                                                    </div>
                                                </div>
                                                <div class="mt-3 text-end">
                                                    <a href="https://fontawesome.com/v5/search?o=r&m=free" class="text-white">Click Here To Choose Font Icon</a>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="services">
                                                <div class="form-group">
                                                    <?php $name = 'fourth_about_second_icon'; ?>
                                                    <label for="<?= $name ?>" class="col-sm-12 text-left control-label text-white">Second Service Icon</label>
                                                    <div class="col-sm-12 text-left ">
                                                        <input type="text" class="form-control" id="<?= $name ?>" name="<?= $name ?>" value="<?= get_option( $name ); ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <?php $name = 'fourth_about_second_icon_title'.$lang ; ?>
                                                    <label for="<?= $name ?>" class="col-sm-12 text-left control-label text-white">Second Service Title</label>
                                                    <div class="col-sm-12 text-left ">
                                                        <input type="text" class="form-control" id="<?= $name ?>" name="<?= $name ?>" value="<?= get_option( $name ); ?>">
                                                    </div>
                                                </div>

                                                <div class="form-group text-left">
                                                    <?php $name = 'fourth_about_second_icon_content'.$lang ; ?>
                                                    <label for="<?= $name ?>" class="col-sm-12 control-label text-white">Second Service Content</label>
                                                    <div class="col-sm-12">
                                                        <?php wp_editor( get_option( $name ), $name,  $wp_editor_settings);  ?>
                                                    </div>
                                                </div>
                                                <div class="mt-3 text-end">
                                                    <a href="https://fontawesome.com/v5/search?o=r&m=free" class="text-white">Click Here To Choose Font Icon</a>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="services">
                                                <div class="form-group">
                                                    <?php $name = 'fourth_about_third_icon'; ?>
                                                    <label for="<?= $name ?>" class="col-sm-12 text-left control-label text-white">Third Service Icon</label>
                                                    <div class="col-sm-12 text-left ">
                                                        <input type="text" class="form-control" id="<?= $name ?>" name="<?= $name ?>" value="<?= get_option( $name ); ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <?php $name = 'fourth_about_third_icon_title'.$lang ; ?>
                                                    <label for="<?= $name ?>" class="col-sm-12 text-left control-label text-white">Third Service Title</label>
                                                    <div class="col-sm-12 text-left ">
                                                        <input type="text" class="form-control" id="<?= $name ?>" name="<?= $name ?>" value="<?= get_option( $name ); ?>">
                                                    </div>
                                                </div>

                                                <div class="form-group text-left">
                                                    <?php $name = 'fourth_about_third_icon_content'.$lang ; ?>
                                                    <label for="<?= $name ?>" class="col-sm-12 control-label text-white">Third Service Content</label>
                                                    <div class="col-sm-12">
                                                        <?php wp_editor( get_option( $name ), $name,  $wp_editor_settings);  ?>
                                                    </div>
                                                </div>

                                                <div class="mt-3 text-end">
                                                    <a href="https://fontawesome.com/v5/search?o=r&m=free" class="text-white">Click Here To Choose Font Icon</a>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="services">
                                                <div class="form-group">
                                                    <?php $name = 'fourth_about_fourth_icon'; ?>
                                                    <label for="<?= $name ?>" class="col-sm-12 text-left control-label text-white">Fourth Service Icon</label>
                                                    <div class="col-sm-12 text-left ">
                                                        <input type="text" class="form-control" id="<?= $name ?>" name="<?= $name ?>" value="<?= get_option( $name ); ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <?php $name = 'fourth_about_fourth_icon_title'.$lang ; ?>
                                                    <label for="<?= $name ?>" class="col-sm-12 text-left control-label text-white">Fourth Service Title</label>
                                                    <div class="col-sm-12 text-left ">
                                                        <input type="text" class="form-control" id="<?= $name ?>" name="<?= $name ?>" value="<?= get_option( $name ); ?>">
                                                    </div>
                                                </div>

                                                <div class="form-group text-left">
                                                    <?php $name = 'fourth_about_fourth_icon_content'.$lang ; ?>
                                                    <label for="<?= $name ?>" class="col-sm-12 control-label text-white">Fourth Service Content</label>
                                                    <div class="col-sm-12">
                                                        <?php wp_editor( get_option( $name ), $name,  $wp_editor_settings);  ?>
                                                    </div>
                                                </div>

                                                <div class="mt-3 text-end">
                                                    <a href="https://fontawesome.com/v5/search?o=r&m=free" class="text-white">Click Here To Choose Font Icon</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade show" id="v-pills-sectionFive" role="tabpanel" aria-labelledby="v-pills-sectionFive-tab">
                                    <div class="form-group text-left">                  
                                        <div class="inline-block">
                                            <?php $name = 'about_team_hidden'.$lang ; ?>
                                            <input type="checkbox" id="<?= $name ?>" name="<?= $name ?>" value="1" <?= get_option($name) == '1' ? 'checked' : ''; ?>>
                                        </div>
                                        <label for="<?= $name ?>" class="text-white">Hidden Section</label>
                                    </div>
                                    <div class="form-group">
                                        <?php $name = 'about_team_title'.$lang ; ?>
                                        <label for="<?= $name ?>" class="col-sm-12 text-left control-label text-white">Team Title</label>
                                        <div class="col-sm-12 text-left ">
                                            <input type="text" class="form-control" id="<?= $name ?>" name="<?= $name ?>" value="<?= get_option( $name ); ?>">
                                        </div>
                                    </div>

                                    <div class="form-group text-left">
                                        <?php $name = 'about_team_content'.$lang ; ?>
                                        <label for="<?= $name ?>" class="col-sm-12 control-label text-white">Team Content</label>
                                        <div class="col-sm-12">
                                            <?php wp_editor( get_option( $name ), $name,  $wp_editor_settings);  ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <?php $name = 'about_team_number'.$lang ; ?>
                                        <label for="<?= $name ?>" class="col-sm-12 text-left  control-label text-white">Team number</label>
                                        <div class="col-sm-12 text-left ">
                                            <input type="number" class="form-control" id="<?= $name ?>" name="<?= $name ?>" value="<?= get_option( $name ); ?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade show" id="v-pills-sectionSix" role="tabpanel" aria-labelledby="v-pills-sectionSix-tab">
                                    <div class="form-group text-left">                  
                                        <div class="inline-block">
                                            <?php $name = 'sixth_about_hidden'.$lang ; ?>
                                            <input type="checkbox" id="<?= $name ?>" name="<?= $name ?>" value="1" <?= get_option($name) == '1' ? 'checked' : ''; ?>>
                                        </div>
                                        <label for="<?= $name ?>" class="text-white">Hidden Section</label>
                                    </div>

                                    <div class="form-group">
                                        <?php $name = 'sixth_about_title'.$lang ; ?>
                                        <label for="<?= $name ?>" class="col-sm-12 text-left control-label text-white">Experience Title</label>
                                        <div class="col-sm-12 text-left ">
                                            <input type="text" class="form-control" id="<?= $name ?>" name="<?= $name ?>" value="<?= get_option( $name ); ?>">
                                        </div>
                                    </div>

                                    
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="services">
                                                <div class="form-group">
                                                    <?php $name = 'sixth_about_first_icon'; ?>
                                                    <label for="<?= $name ?>" class="col-sm-12 text-left control-label text-white">First Experience Icon</label>
                                                    <div class="col-sm-12 text-left ">
                                                        <input type="text" class="form-control" id="<?= $name ?>" name="<?= $name ?>" value="<?= get_option( $name ); ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <?php $name = 'sixth_about_first_icon_title'.$lang ; ?>
                                                    <label for="<?= $name ?>" class="col-sm-12 text-left control-label text-white">First Experience Title</label>
                                                    <div class="col-sm-12 text-left ">
                                                        <input type="text" class="form-control" id="<?= $name ?>" name="<?= $name ?>" value="<?= get_option( $name ); ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group text-left">
                                                    <?php $name = 'sixth_about_first_icon_content'.$lang ; ?>
                                                    <label for="<?= $name ?>" class="col-sm-12 control-label text-white">Second Experience Content</label>
                                                    <div class="col-sm-12">
                                                        <?php wp_editor( get_option( $name ), $name,  $wp_editor_settings);  ?>
                                                    </div>
                                                </div>
                                                <div class="mt-3 text-end">
                                                    <a href="https://fontawesome.com/v5/search?o=r&m=free" class="text-white">Click Here To Choose Font Icon</a>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-md-4">
                                            <div class="services">
                                                <div class="form-group">
                                                    <?php $name = 'sixth_about_second_icon'; ?>
                                                    <label for="<?= $name ?>" class="col-sm-12 text-left control-label text-white">Second Experience Icon</label>
                                                    <div class="col-sm-12 text-left ">
                                                        <input type="text" class="form-control" id="<?= $name ?>" name="<?= $name ?>" value="<?= get_option( $name ); ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <?php $name = 'sixth_about_second_icon_title'.$lang ; ?>
                                                    <label for="<?= $name ?>" class="col-sm-12 text-left control-label text-white">Second Experience Title</label>
                                                    <div class="col-sm-12 text-left ">
                                                        <input type="text" class="form-control" id="<?= $name ?>" name="<?= $name ?>" value="<?= get_option( $name ); ?>">
                                                    </div>
                                                </div>

                                                <div class="form-group text-left">
                                                    <?php $name = 'sixth_about_second_icon_content'.$lang ; ?>
                                                    <label for="<?= $name ?>" class="col-sm-12 control-label text-white">Second Experience Content</label>
                                                    <div class="col-sm-12">
                                                        <?php wp_editor( get_option( $name ), $name,  $wp_editor_settings);  ?>
                                                    </div>
                                                </div>
                                                <div class="mt-3 text-end">
                                                    <a href="https://fontawesome.com/v5/search?o=r&m=free" class="text-white">Click Here To Choose Font Icon</a>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-md-4">
                                            <div class="services">
                                                <div class="form-group">
                                                    <?php $name = 'sixth_about_third_icon'; ?>
                                                    <label for="<?= $name ?>" class="col-sm-12 text-left control-label text-white">Third Experience Icon</label>
                                                    <div class="col-sm-12 text-left ">
                                                        <input type="text" class="form-control" id="<?= $name ?>" name="<?= $name ?>" value="<?= get_option( $name ); ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <?php $name = 'sixth_about_third_icon_title'.$lang ; ?>
                                                    <label for="<?= $name ?>" class="col-sm-12 text-left control-label text-white">Third Experience Title</label>
                                                    <div class="col-sm-12 text-left ">
                                                        <input type="text" class="form-control" id="<?= $name ?>" name="<?= $name ?>" value="<?= get_option( $name ); ?>">
                                                    </div>
                                                </div>

                                                <div class="form-group text-left">
                                                    <?php $name = 'sixth_about_third_icon_content'.$lang ; ?>
                                                    <label for="<?= $name ?>" class="col-sm-12 control-label text-white">Third Experience Content</label>
                                                    <div class="col-sm-12">
                                                        <?php wp_editor( get_option( $name ), $name,  $wp_editor_settings);  ?>
                                                    </div>
                                                </div>
                                                <div class="mt-3 text-end">
                                                    <a href="https://fontawesome.com/v5/search?o=r&m=free" class="text-white">Click Here To Choose Font Icon</a>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade show" id="v-pills-sectionSeven" role="tabpanel" aria-labelledby="v-pills-sectionSeven-tab">
                                    <div class="form-group text-left">                  
                                        <div class="inline-block">
                                            <?php $name = 'about_testimonials_hidden'.$lang ; ?>
                                            <input type="checkbox" id="<?= $name ?>" name="<?= $name ?>" value="1" <?= get_option($name) == '1' ? 'checked' : ''; ?>>
                                        </div>
                                        <label for="<?= $name ?>" class="text-white">Hidden Section</label>
                                    </div>
                                    <div class="form-group">
                                        <?php $name = 'about_testimonials_title'.$lang ; ?>
                                        <label for="<?= $name ?>" class="col-sm-12 text-left control-label text-white">Testimonials Title</label>
                                        <div class="col-sm-12 text-left ">
                                            <input type="text" class="form-control" id="<?= $name ?>" name="<?= $name ?>" value="<?= get_option( $name ); ?>">
                                        </div>
                                    </div>

                                    <div class="form-group text-left">
                                        <?php $name = 'about_testimonials_content'.$lang ; ?>
                                        <label for="<?= $name ?>" class="col-sm-12 control-label text-white">Testimonials Content</label>
                                        <div class="col-sm-12">
                                            <?php wp_editor( get_option( $name ), $name,  $wp_editor_settings);  ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <?php $name = 'about_testimonials_number'.$lang ; ?>
                                        <label for="<?= $name ?>" class="col-sm-12 text-left  control-label text-white">Testimonials number</label>
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