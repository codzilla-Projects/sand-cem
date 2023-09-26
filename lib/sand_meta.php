<?php
/*********************************
Add  Meta Box To Property
 **********************************/
function sand_add_extra_data_meta()
{
    add_meta_box("sand_slider_data", "Slider Details", "sand_slider_data_callback", array('slider'), "normal");
    add_meta_box("sand_extra_data", "property Details", "sand_extra_data_callback", array('property'), "normal");
    add_meta_box("property_amenities_data", "Property Amenities", "property_amenities_data_callback", array('property'), "normal");
    add_meta_box("property_of_day", "Property of the day", "property_of_day_data_callback", array('property'), "side");
}
add_action('add_meta_boxes', 'sand_add_extra_data_meta');
/* Display the post meta box. */
function sand_slider_data_callback($object, $box)
{
    $slider_btn_txt         = esc_attr(get_post_meta($object->ID, 'slider_btn_txt', true)); 
    $slider_btn_url         = esc_attr(get_post_meta($object->ID, 'slider_btn_url', true));
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
<div class="form-group row mt-3">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3">
                <label for="slider_btn_txt"><?php _e('Button Text: ', 'sand'); ?></label>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-9">
                <input type="text" name="slider_btn_txt" class="form-control w-100" value="<?= $slider_btn_txt; ?>"><br>
            </div>
        </div>
    </div>
</div>
<div class="form-group row mt-3">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3">
                <label for="slider_btn_url"><?php _e('Button URL: ', 'sand'); ?></label>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-9">
                <input type="text" name="slider_btn_url" class="form-control w-100" value="<?= $slider_btn_url; ?>"><br>
            </div>
        </div>
    </div>
</div>
<?php
}

function property_of_day_data_callback($object, $box)
{
    $property_of_day               = esc_attr(get_post_meta($object->ID, 'property_of_day', true)); 
    $property_of_day_value         = get_post_meta($object->ID, 'property_of_day', true); 
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
<div class="form-group row mt-3">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3">
                <input type="checkbox" name="property_of_day" class="form-control" value="1" <?= $property_of_day_value == '1' ?'checked': ''; ?>>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-9">
                 <label for="property_of_day"><?php _e('Property of The Day: ', 'sand'); ?></label>
            </div>
        </div>
    </div>
</div>
<?php
}
function sand_extra_data_callback($object, $box)
{
    $property_status        = get_post_meta($object->ID, 'property_status', true);
    $property_furnishing    = get_post_meta($object->ID, 'property_furnishing', true);
    $rental_period          = get_post_meta($object->ID, 'rental_period', true);
    $property_price         = esc_attr(get_post_meta($object->ID, 'property_price', true));
    $down_payment           = esc_attr(get_post_meta($object->ID, 'down_payment', true));
    $bedroom_num            = esc_attr(get_post_meta($object->ID, 'bedroom_num', true));
    $bathroom_num           = esc_attr(get_post_meta($object->ID, 'bathroom_num', true));
    $property_size          = esc_attr(get_post_meta($object->ID, 'property_size', true));
    $land_area              = esc_attr(get_post_meta($object->ID, 'land_area', true));
    $property_ref_no        = esc_attr(get_post_meta($object->ID, 'property_ref_no', true));
    $property_brochure      = stripcslashes(get_post_meta($object->ID, 'property_brochure', true));
    $property_video_url     = get_post_meta($object->ID, 'property_video_url', true);
    $property_location      = get_post_meta($object->ID, 'property_location', true);
    $sand_signature         = get_post_meta($object->ID, 'sand_signature', true);
    $has_installment_plan   = get_post_meta($object->ID, 'has_installment_plan', true);
    $property_commercial    = get_post_meta($object->ID, 'property_commercial', true);
    $property_project       = esc_attr(get_post_meta($object->ID, 'property_project', true));
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <div class="form-group row mt-3">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3">
                    <label for="property_status"><?php _e('Property Status: ','dawood'); ?></label>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-9">
                    <select name="property_status" id="property_status">
                        <?php if(empty($property_status)) : ?>
                            <option disabled hidden><?php esc_attr_e( 'Please select' ); ?></option>
                        <?php endif; ?>
                        <option value="sale" <?php selected( $property_status, 'sale' ); ?>>For Sale</option>
                        <option value="rent" <?php selected( $property_status, 'rent' ); ?>>For Rent</option>
                    </select>
                    <br>
                </div>
            </div>
        </div>
    </div>

    <!-- for rent -->
    <div class="form-group row mt-3 for-rent">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3">
                    <label for="property_furnishing"><?php _e('Property furnishing: ','sand'); ?></label>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-9">
                    <select name="property_furnishing" id="property_furnishing">
                        <?php if(empty($property_furnishing)) : ?>
                            <option disabled hidden><?php esc_attr_e( 'Please select' ); ?></option>
                        <?php endif; ?>
                        <option value="furnished" <?php selected( $property_furnishing, 'furnished' ); ?>>Furnishing</option>
                        <option value="unfurnished" <?php selected( $property_furnishing, 'unfurnished' ); ?>>Unfurnished</option>
                        <option value="partlyfurnished" <?php selected( $property_furnishing, 'partlyfurnished' ); ?>>PartlyFurnished</option>
                    </select>
                    <br>
                </div>
            </div>
        </div>
    </div>

    <div class="form-group row mt-3 for-rent">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3">
                    <label for="rental_period"><?php _e('Rental period: ','sand'); ?></label>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-9">
                    <select name="rental_period" id="rental_period">
                        <?php if(empty($rental_period)) : ?>
                            <option disabled hidden><?php esc_attr_e( 'Please select' ); ?></option>
                        <?php endif; ?>
                        <option value="monthly" <?php selected( $rental_period, 'monthly' ); ?>>Monthly</option>
                        <option value="daily" <?php selected( $rental_period, 'daily' ); ?>>Daily</option>
                    </select>
                    <br>
                </div>
            </div>
        </div>
    </div>
    <!-- end for rent -->

    <!-- for sell -->
    <div class="form-group mt-3 for-sell">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3">
                    <label for="has_installment_plan"><?php _e('Has installment plan : (If yes check this)', 'sand') ;?></label>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-9">
                    <input type="checkbox" id = "has_installment_plan" name="has_installment_plan" value="1" <?= $has_installment_plan == '1' ?'checked': ''; ?> >
                </div>
            </div>
        </div>
    </div>
    <!-- end for sell -->
 
    <div class="form-group mt-3">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3">
                    <label for="sand_signature"><?php _e('Featured : (If yes check this)', 'sand') ;?></label>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-9">
                    <input type="checkbox" id ="sand_signature" name="sand_signature" value="1" <?= $sand_signature == '1' ?'checked': ''; ?> >
                </div>
            </div>
        </div>
    </div>

    <div class="form-group mt-3">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3">
                    <label for="property_commercial"><?php _e('If it\'s a Commercial property', 'sand') ;?></label>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-9">
                    <input type="checkbox" id = 'property_commercial' name="property_commercial" value="1" <?= $property_commercial == '1' ?'checked': ''; ?> >
                </div>
            </div>
        </div>
    </div>


    <div class="form-group row mt-3">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3">
                    <label for="property_price"><?php _e('Price: ', 'sand'); ?></label>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-9">
                    <input type="text" name="property_price" class="form-control w-100" value="<?= $property_price; ?>"><br>
                </div>
            </div>
        </div>
    </div>

    <div class="form-group row mt-3">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3">
                    <label for="down_payment"><?php _e('Down Payment: ', 'sand'); ?></label>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-9">
                    <input type="text" name="down_payment" class="form-control w-100" value="<?= $down_payment; ?>"><br>
                </div>
            </div>
        </div>
    </div>

    <div class="form-group row mt-3">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3">
                    <label for="bedroom_num"><?php _e('Bedroom Numbers: ', 'sand'); ?></label>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-9">
                    <input type="text" name="bedroom_num" class="form-control w-100" value="<?= $bedroom_num; ?>"><br>
                </div>
            </div>
        </div>
    </div>


    <div class="form-group row mt-3">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3">
                    <label for="bathroom_num"><?php _e('Bathroom Numbers: ', 'sand'); ?></label>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-9">
                    <input type="text" name="bathroom_num" class="form-control w-100" value="<?= $bathroom_num; ?>"><br>
                </div>
            </div>
        </div>
    </div>


    <div class="form-group row mt-3">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3">
                    <label for="property_size"><?php _e('Property Size: ', 'sand'); ?></label>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-9">
                    <input type="text" name="property_size" class="form-control w-100" value="<?= $property_size; ?>"><br>
                </div>
            </div>
        </div>
    </div>

    <div class="form-group row mt-3">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3">
                    <label for="land_area"><?php _e('Land Area: ', 'sand'); ?></label>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-9">
                    <input type="text" name="land_area" class="form-control w-100" value="<?= $land_area; ?>"><br>
                </div>
            </div>
        </div>
    </div>


    <div class="form-group row mt-3">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3">
                    <label for="property_ref_no"><?php _e('Ref No: ', 'sand'); ?></label>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-9">
                    <input type="text" name="property_ref_no" class="form-control w-100" value="<?= $property_ref_no; ?>"><br>
                </div>
            </div>
        </div>
    </div>

    <div class="form-group row mt-3">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3">
                    <label for="property_brochure"><?php _e('Brochure URL: ', 'sand'); ?></label>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-9">
                    <input type="text" name="property_brochure" class="form-control w-100" value="<?= $property_brochure; ?>"><br>
                </div>
            </div>
        </div>
    </div>

    <div class="form-group row mt-3">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3">
                    <label for="property_video_url"><?php _e('Video URL: ', 'sand'); ?></label>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-9">
                    <input type="text" name="property_video_url" class="form-control w-100" value="<?= $property_video_url; ?>"><br>
                </div>
            </div>
        </div>

    </div>

    <div class="form-group row mt-3">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3">
                    <label for="property_location"><?php _e('Property Location: ', 'sand'); ?></label>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-9">
                    <textarea name="property_location" class="form-control"><?= $property_location; ?></textarea><br>
                </div>
            </div>
        </div>

    </div>

    <div class="form-group row mt-3">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3">
                    <label for="property_project"><?php _e('Property Project: ', 'sand'); ?></label>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-9">
                    <select class="form-select form-select-lg mb-3" name="property_project">
                        <option>Select Project</option>
                        <?php
                            $args = array(
                                'post_type'       => 'project',
                                'post_status'     => 'publish',
                                'posts_per_page'  =>  -1,
                                'orderby'         => 'date',
                                'order'           => 'DESC',
                            );
                             $projects = new WP_Query( $args );
                            if($projects->have_posts()) :
                        ?>
                        <?php while($projects->have_posts()) :
                            $projects->the_post();
                            $id = get_the_ID();
                            $project_title = get_the_title();
                        ?>
                        <option value="<?=$id;?>"<?php selected( $property_project , $id); ?>><?=$project_title; ;?></option>
                        <?php endwhile; wp_reset_query(); endif; ?>
                    </select>
                </div>
            </div>
        </div>

    </div>


<?php
}
/* Display the post meta box. */
function property_amenities_data_callback($post)
{
    $property_amenities = get_post_meta($post->ID, 'property_amenities', true);
    wp_nonce_field('repeatable_answers_meta_box_nonce', 'repeatable_answers_meta_box_nonce');
    wp_nonce_field('repeatable_answers_meta_box_nonce', 'repeatable_answers_meta_box_nonce');
    ?>

    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $('#add-row').on('click', function() {

                var repetable_item = '<tr class="repetable_tr"><td><input type="text" class="widefat answer_value" name="property_amenities[]" /></td><td><a class="button remove-row" href="#">Remove</a></td></tr>';
                $('#repeatable-fieldset-one tbody').append(repetable_item);
                return false;
            });

            $(document).on('click', '.remove-row', function() {
                $(this).parents('tr').remove();
                return false;
            });
        });
    </script>

    <table id="repeatable-fieldset-one" width="100%">
        <thead>
            <tr>
                <th width="70%">Amenities</th>
                <th width="30%">Remove</th>
            </tr>
        </thead>
        <tbody>
            <?php

            if ($property_amenities) :
                foreach ($property_amenities as $sand_amenity) {
            ?>
                    <tr class="repetable_tr">
                        <td>
                            <input type="text" class="widefat answer_value" name="property_amenities[]" value="<?php if ($sand_amenity != '') echo esc_attr($sand_amenity); ?>" />
                        </td>
                        <td><a class="button remove-row" href="#">Remove</a></td>
                    </tr>
                <?php
                }
            else :
                // show a blank one
                ?>
                <tr class="repetable_tr">
                    <td>
                        <input type="text" class="widefat answer_value" name="property_amenities[]" />
                    </td>
                    <td><a class="button remove-row" href="#">Remove</a></td>
                </tr>
            <?php endif; ?>

        </tbody>

    </table>
    <br>
    <p><a id="add-row" class="button" href="#">Add another</a></p>

<?php
}


/*********************************

Add  Meta Box To Project

 **********************************/

function sand_add_extra_project_meta()
{
    add_meta_box("project_amenities_data", "Project Amenities", "project_amenities_data_callback", array('project'), "normal");
    add_meta_box("project_essentials_data", "Project Essentials", "project_essentials_data_callback", array('project'), "normal");
    add_meta_box("project_payment_plan_data", "Payment Plan", "project_payment_plan_data_callback", array('project'), "normal");
    add_meta_box("sand_extra_data", "project Details", "sand_extra_projects_data_callback", array('project'), "normal");
}

add_action('add_meta_boxes', 'sand_add_extra_project_meta');



/* Display the post meta box. */
function project_amenities_data_callback($post)
{


    $project_amenities = get_post_meta($post->ID, 'project_amenities', true);


    wp_nonce_field('repeatable_answers_meta_box_nonce', 'repeatable_answers_meta_box_nonce');

    wp_nonce_field('repeatable_answers_meta_box_nonce', 'repeatable_answers_meta_box_nonce');
?>

    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $('#add-amenity').on('click', function() {

                var repetable_amenty_item = '<tr class="repetable_tr"><td><input type="text" class="widefat answer_value" name="project_amenities[]" /></td><td><a class="button remove-row" href="#">Remove</a></td></tr>';
                $('#repeatable-amenities-one tbody').append(repetable_amenty_item);
                return false;
            });

            $(document).on('click', '.remove-row', function() {
                $(this).parents('tr').remove();
                return false;
            });
        });
    </script>

    <table id="repeatable-amenities-one" width="100%">
        <thead>
            <tr>
                <th width="70%">Amenities</th>
                <th width="30%">Remove</th>
            </tr>
        </thead>
        <tbody>
            <?php

            if ($project_amenities) :
                foreach ($project_amenities as $project_amenity) {
            ?>
                    <tr class="repetable_tr">
                        <td>
                            <input type="text" class="widefat answer_value" name="project_amenities[]" value="<?php if ($project_amenity != '') echo esc_attr($project_amenity); ?>" />
                        </td>
                        <td><a class="button remove-row" href="#">Remove</a></td>
                    </tr>
                <?php
                }
            else :
                // show a blank one
                ?>
                <tr class="repetable_tr">
                    <td>
                        <input type="text" class="widefat answer_value" name="project_amenities[]" />
                    </td>
                    <td><a class="button remove-row" href="#">Remove</a></td>
                </tr>
            <?php endif; ?>

        </tbody>

    </table>
    <br>
    <p><a id="add-amenity" class="button" href="#">Add another</a></p>



<?php

}

function project_essentials_data_callback($post){


    $project_essentials = get_post_meta($post->ID, 'project_essentials', true);


    wp_nonce_field('repeatable_answers_meta_box_nonce', 'repeatable_answers_meta_box_nonce');

    wp_nonce_field('repeatable_answers_meta_box_nonce', 'repeatable_answers_meta_box_nonce');
?>

    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $('#add-essential').on('click', function() {

                var repetable_essential_item = '<tr class="repetable_tr"><td><input type="text" class="widefat answer_value" name="project_essentials[]" /></td><td><a class="button remove-row" href="#">Remove</a></td></tr>';
                $('#repeatable-essentials-one tbody').append(repetable_essential_item);
                return false;
            });

            $(document).on('click', '.remove-row', function() {
                $(this).parents('tr').remove();
                return false;
            });
        });
    </script>

    <table id="repeatable-essentials-one" width="100%">
        <thead>
            <tr>
                <th width="70%">Essentials</th>
                <th width="30%">Remove</th>
            </tr>
        </thead>
        <tbody>
            <?php

            if ($project_essentials) :
                foreach ($project_essentials as $project_essential) {
            ?>
                    <tr class="repetable_tr">
                        <td>
                            <input type="text" class="widefat answer_value" name="project_essentials[]" value="<?php if ($project_essential != '') echo esc_attr($project_essential); ?>" />
                        </td>
                        <td><a class="button remove-row" href="#">Remove</a></td>
                    </tr>
                <?php
                }
            else :
                // show a blank one
                ?>
                <tr class="repetable_tr">
                    <td>
                        <input type="text" class="widefat answer_value" name="project_essentials[]" />
                    </td>
                    <td><a class="button remove-row" href="#">Remove</a></td>
                </tr>
            <?php endif; ?>

        </tbody>

    </table>
    <br>
    <p><a id="add-essential" class="button" href="#">Add another</a></p>



<?php

}


function project_payment_plan_data_callback($post){



    $payment_plans = get_post_meta($post->ID, 'payment_plans', true);
//    echo '<pre>';
//    var_dump($payment_plans);
//    echo '</pre>';

    wp_nonce_field( 'repeatable_answers_meta_box_nonce', 'repeatable_answers_meta_box_nonce' );

    wp_nonce_field( 'repeatable_answers_meta_box_nonce', 'repeatable_answers_meta_box_nonce' );
    ?>

    <script type="text/javascript">
    jQuery(document).ready(function( $ ){
//        var counter = 1;
        $( '#add-row' ).on('click', function() {


        var repetable_item = '<tr class="repetable_tr"><td><label >Plan Title: </label><input type="text" class="widefat answer_value" name="plan_titles[]"  /><label >Plane Percentage: </label><input type="text" class="widefat answer_value" name="plan_percentages[]"  /><label >Plan Date:</label><input type="text" class="widefat answer_value" name="plane_dates[]"  /></td><td><a class="button remove-row" href="#">Remove</a></td></tr>';
        $( '#repeatable-fieldset-one tbody' ).append(repetable_item);
        return false;
        });

        $(document).on('change','.form-check-input',function(){
            var ans_val = $(this).parent().find('.answer_value').val();
            $(this).val(ans_val);
            return false;
        });


        $(document).on('click','.remove-row',function(){
            $(this).parents('tr').remove();
            return false;
        });
    });
    </script>

    <table id="repeatable-fieldset-one" width="100%">
    <thead>
        <tr>
            <th width="80%">Payment Plan </th>
            <th width="30%">Remove</th>
        </tr>
    </thead>
    <tbody>
    <?php

    if ( $payment_plans ) :
    foreach ( $payment_plans as $key => $payment_plan ) {
    ?>
    <tr class="repetable_tr">
        <td>
            <label >Plan Title: </label>
            <input type="text" class="widefat answer_value" name="plan_titles[]"  value="<?php if( $payment_plan->title != '') echo $payment_plan->title; ?>"/>

            <label >Plane Percentage: </label>
            <input type="text" class="widefat answer_value" name="plan_percentages[]"  value="<?php if( $payment_plan->percentage != '') echo $payment_plan->percentage; ?>"/>

            <label >Plan Date:</label>
            <input type="text" class="widefat answer_value" name="plane_dates[]"  value="<?php if( $payment_plan->plan_date != '') echo $payment_plan->plan_date; ?>"/>

        </td>
        <td><a class="button remove-row" href="#">Remove</a></td>
    </tr>
    <?php
    }
    else :
    // show a blank one
    ?>
    <tr class="repetable_tr">
        <td>

            <label >Plan Title: </label>
            <input type="text" class="widefat answer_value" name="plan_titles[]"  />

            <label >Plane Percentage: </label>
            <input type="text" class="widefat answer_value" name="plan_percentages[]"  />

            <label >Plan Date:</label>
            <input type="text" class="widefat answer_value" name="plane_dates[]"  />
        </td>
        <td><a class="button remove-row" href="#">Remove</a></td>
    </tr>
    <?php endif; ?>


        </tbody>
    </table>

    <p><br><a id="add-row" class="button" href="#">Add another</a></p>

    <div class="form-group row mt-3">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="row">

                <div class="col-lg-9 col-md-9 col-sm-9">
                    <input type="text" hidden name="question_right_answer" class="form-control w-100" value="<?= $question_right_answer; ?>"><br>
                </div>
            </div>
        </div>

    </div>

<?php

}


/* Display the post meta box. */

function sand_extra_projects_data_callback($object, $box)
{
    $project_video               = esc_attr(get_post_meta($object->ID, 'project_video', true));
    $project_location            = esc_attr(get_post_meta($object->ID, 'project_location', true));
    $project_brochure            = stripcslashes(get_post_meta($object->ID, 'project_brochure', true));
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">


    <div class="form-group row mt-3">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3">
                    <label for="project_video"><?php _e('Video URL:', 'sand'); ?></label>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-9">
                    <input type="text" name="project_video" class="form-control w-100" value="<?= $project_video; ?>"><br>
                </div>
            </div>
        </div>
    </div>

    <div class="form-group row mt-3">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3">
                    <label for="project_brochure"><?php _e('Brochure URL: ', 'sand'); ?></label>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-9">
                    <input type="text" name="project_brochure" class="form-control w-100" value="<?= $project_brochure; ?>"><br>
                </div>
            </div>
        </div>
    </div>

    <div class="form-group row mt-3">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3">
                    <label for="property_location"><?php _e('Project Location: ', 'sand'); ?></label>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-9">
                    <textarea name="project_location" class="form-control"><?= $project_location; ?></textarea><br>
                </div>
            </div>
        </div>


<?php

}

add_action('save_post', 'sand_save_custom_meta', 10, 2);

function sand_save_custom_meta($post_id)
{
    //getting other language post
    $lang = pll_get_post_language($post_id);
    $otherLang = ( $lang == 'ar' ) ? 'en':'ar';
    $otherLang_id = pll_get_post($post_id, $otherLang);

    //if other language post exist save the following for it [Featured image, Gallery, Taxonomies]
    if (!empty($otherLang_id)):

        //*****Featured image*****//
        $currFeatured = get_post_thumbnail_id($post_id);
        if (!empty($currFeatured)):
            set_post_thumbnail($otherLang_id, $currFeatured);
        endif;

        //*****Gallery*****//

        //get current post images
        $images =  get_post_meta($post_id,'thumbnail_id');

        //delete previous thumb_ids for other lang post
        delete_post_meta($otherLang_id, 'thumbnail_id');

        //add thumb_ids for other lang post
        foreach ($images as $imgID):
            add_post_meta($otherLang_id, 'thumbnail_id', $imgID);
        endforeach;

        //*****Taxonomies*****//

        //-----------Types-----------//

        // get current post taxonomy terms ids
        $currTerms = wp_get_post_terms( $post_id, 'type', array('fields' => 'ids'));
        // get the translated taxonomy terms ids
        $transTerms = [];
        foreach($currTerms as $term_id):
            $termAR = pll_get_term($term_id, $otherLang);
            if ( !empty( $termAR ) ):
                array_push($transTerms, $termAR);
            endif;
        endforeach;
        // set the translated taxonomy terms to the other lang post
        wp_set_post_terms( $otherLang_id, $transTerms, 'type');
        
        //-----------Locations-----------//
        
        // get current post taxonomy terms ids
        unset($currTerms);
        $currTerms = wp_get_post_terms( $post_id, 'location', array('fields' => 'ids'));
        // get the translated taxonomy terms ids
        unset($transTerms);
        $transTerms = [];
        foreach($currTerms as $term_id):
            $termAR = pll_get_term($term_id, $otherLang);
            if ( !empty( $termAR ) ):
                array_push($transTerms, $termAR);
            endif;
        endforeach;
        // set the translated taxonomy terms to the other lang post
        wp_set_post_terms( $otherLang_id, $transTerms, 'location');

    endif;

    if (isset($_POST['property_status'])) :
        update_post_meta($post_id, 'property_status', $_POST['property_status']);
        if (!empty($otherLang_id)):
            update_post_meta($otherLang_id, 'property_status', $_POST['property_status']);
        endif;
    else:
        delete_post_meta($post_id, 'property_status');
        if (!empty($otherLang_id)):
            delete_post_meta($otherLang_id, 'property_status');
        endif;
    endif;

    if (isset($_POST['property_furnishing'])) :
        update_post_meta($post_id, 'property_furnishing', $_POST['property_furnishing']);
        if (!empty($otherLang_id)):
            update_post_meta($otherLang_id, 'property_furnishing', $_POST['property_furnishing']);
        endif;
    else:
        delete_post_meta($post_id, 'property_furnishing');
        if (!empty($otherLang_id)):
            delete_post_meta($otherLang_id, 'property_furnishing');
        endif;
    endif;

    if (isset($_POST['rental_period'])) :
        update_post_meta($post_id, 'rental_period', $_POST['rental_period']);
        if (!empty($otherLang_id)):
            update_post_meta($otherLang_id, 'rental_period', $_POST['rental_period']);
        endif;
    else:
        delete_post_meta($post_id, 'rental_period');    
        if (!empty($otherLang_id)):
            delete_post_meta($otherLang_id, 'rental_period');
        endif;
    endif;

    if ( isset( $_POST['property_price'] ) && !empty($_POST['property_price']) ) :
        if ( is_numeric($_POST['property_price']) ):
            update_post_meta($post_id, 'property_price', $_POST['property_price']);
            if (!empty($otherLang_id)):
                update_post_meta($otherLang_id, 'property_price', $_POST['property_price']);
            endif;
        else:
            set_transient('property_post_notice', 'Price can be numeric only.');
        endif;
    else:
        delete_post_meta($post_id, 'property_price');
        if (!empty($otherLang_id)):
            delete_post_meta($otherLang_id, 'property_price');
        endif;
    endif;

    if (isset($_POST['property_ref_no'])) :
        update_post_meta($post_id, 'property_ref_no', $_POST['property_ref_no']);
        if (!empty($otherLang_id)):
            update_post_meta($otherLang_id, 'property_ref_no', $_POST['property_ref_no']);
        endif;
    else:
        delete_post_meta($post_id, 'property_ref_no');
        if (!empty($otherLang_id)):
            delete_post_meta($otherLang_id, 'property_ref_no');
        endif;
    endif;

    if (isset($_POST['bedroom_num'])) :
        update_post_meta($post_id, 'bedroom_num', $_POST['bedroom_num']);
        if (!empty($otherLang_id)):
            update_post_meta($otherLang_id, 'bedroom_num', $_POST['bedroom_num']);
        endif;
    else:
        delete_post_meta($post_id, 'bedroom_num');
        if (!empty($otherLang_id)):
            delete_post_meta($otherLang_id, 'bedroom_num');
        endif;
    endif;

    if (isset($_POST['bathroom_num'])) :
        update_post_meta($post_id, 'bathroom_num', $_POST['bathroom_num']);
        if (!empty($otherLang_id)):
            update_post_meta($otherLang_id, 'bathroom_num', $_POST['bathroom_num']);
        endif;
    else:
        delete_post_meta($post_id, 'bathroom_num');
        if (!empty($otherLang_id)):
            delete_post_meta($otherLang_id, 'bathroom_num');
        endif;
    endif;

    if (isset($_POST['property_size'])) :
        update_post_meta($post_id, 'property_size', $_POST['property_size']);
        if (!empty($otherLang_id)):
            update_post_meta($otherLang_id, 'property_size', $_POST['property_size']);
        endif;
    else:
        delete_post_meta($post_id, 'property_size');
        if (!empty($otherLang_id)):
            delete_post_meta($otherLang_id, 'property_size');
        endif;
    endif;

    if (isset($_POST['down_payment'])) :
        if ( is_numeric($_POST['down_payment']) ):
            update_post_meta($post_id, 'down_payment', $_POST['down_payment']);
            if (!empty($otherLang_id)):
                update_post_meta($otherLang_id, 'down_payment', $_POST['down_payment']);
            endif;
        else:
            set_transient('property_post_notice', 'Prices can be numeric only.');
        endif;
    else:
        delete_post_meta($post_id, 'down_payment');
        if (!empty($otherLang_id)):
            delete_post_meta($otherLang_id, 'down_payment');
        endif;
    endif;

    if (isset($_POST['land_area'])) :
        update_post_meta($post_id, 'land_area', $_POST['land_area']);
        if (!empty($otherLang_id)):
            update_post_meta($otherLang_id, 'land_area', $_POST['land_area']);
        endif;
    else:
        delete_post_meta($post_id, 'land_area');
        if (!empty($otherLang_id)):
            delete_post_meta($otherLang_id, 'land_area');
        endif;
    endif;

    if (isset($_POST['property_video_url'])) :
        update_post_meta($post_id, 'property_video_url', $_POST['property_video_url']);
        if (!empty($otherLang_id)):
            update_post_meta($otherLang_id, 'property_video_url', $_POST['property_video_url']);
        endif;
    else:
        delete_post_meta($post_id, 'property_video_url');
        if (!empty($otherLang_id)):
            delete_post_meta($otherLang_id, 'property_video_url');
        endif;
    endif;

    if (isset($_POST['property_brochure'])) :
        update_post_meta($post_id, 'property_brochure', $_POST['property_brochure']);
        if (!empty($otherLang_id)):
            update_post_meta($otherLang_id, 'property_brochure', $_POST['property_brochure']);
        endif;
    else:
        delete_post_meta($post_id, 'property_brochure');
        if (!empty($otherLang_id)):
            delete_post_meta($otherLang_id, 'property_brochure');
        endif;
    endif;

    if (isset($_POST['property_location'])) :
        update_post_meta($post_id, 'property_location', $_POST['property_location']);
        if (!empty($otherLang_id)):
            update_post_meta($otherLang_id, 'property_location', $_POST['property_location']);
        endif;
    else:
        delete_post_meta($post_id, 'property_location');
        if (!empty($otherLang_id)):
            delete_post_meta($otherLang_id, 'property_location');
        endif;
    endif;

    if (isset($_POST['property_project'])) :
        update_post_meta($post_id, 'property_project', $_POST['property_project']);
        if (!empty($otherLang_id)):
            $arabic_project = pll_get_post($_POST['property_project'], $otherLang);
            update_post_meta($otherLang_id, 'property_project', $arabic_project);
        endif;
    else:
        delete_post_meta($post_id, 'property_project');
        if (!empty($otherLang_id)):
            delete_post_meta($otherLang_id, 'property_project');
        endif;
    endif;
    
    if (isset($_POST['sand_signature'])) :
        update_post_meta($post_id, 'sand_signature', $_POST['sand_signature']);
        if (!empty($otherLang_id)):
            update_post_meta($otherLang_id, 'sand_signature', $_POST['sand_signature']);
        endif;
    else:
        delete_post_meta($post_id, 'sand_signature');
        if (!empty($otherLang_id)):
            delete_post_meta($otherLang_id, 'sand_signature');
        endif;
    endif;
    
    if (isset($_POST['has_installment_plan'])) :
        update_post_meta($post_id, 'has_installment_plan', $_POST['has_installment_plan']);
        if (!empty($otherLang_id)):
            update_post_meta($otherLang_id, 'has_installment_plan', $_POST['has_installment_plan']);
        endif;
    else:
        delete_post_meta($post_id, 'has_installment_plan');
        if (!empty($otherLang_id)):
            delete_post_meta($otherLang_id, 'has_installment_plan');
        endif;
    endif;
    
    if (isset($_POST['property_commercial'])) :
        update_post_meta($post_id, 'property_commercial', $_POST['property_commercial']);
        if (!empty($otherLang_id)):
            update_post_meta($otherLang_id, 'property_commercial', $_POST['property_commercial']);
        endif;
    else:
        delete_post_meta($post_id, 'property_commercial');
        if (!empty($otherLang_id)):
            delete_post_meta($otherLang_id, 'property_commercial');
        endif;
    endif;

    if (isset($_POST['property_amenities'])) :
        update_post_meta($post_id, 'property_amenities', $_POST['property_amenities']);
    else:
        delete_post_meta($post_id, 'property_amenities');
    endif;

        /*------------------------------*/

    if (isset($_POST['project_video'])) {
        update_post_meta($post_id, 'project_video', $_POST['project_video']);
    } else
        delete_post_meta($post_id, 'project_video');


    if (isset($_POST['project_amenities'])) {
        update_post_meta($post_id, 'project_amenities', $_POST['project_amenities']);
    } else
        delete_post_meta($post_id, 'project_amenities');


    if (isset($_POST['project_essentials'])) {
        update_post_meta($post_id, 'project_essentials', $_POST['project_essentials']);
    } else
        delete_post_meta($post_id, 'project_essentials');


    if (isset($_POST['project_location'])) {
        update_post_meta($post_id, 'project_location', $_POST['project_location']);
    } else
        delete_post_meta($post_id, 'project_location');


    if (isset($_POST['project_brochure'])) {
        update_post_meta($post_id, 'project_brochure', $_POST['project_brochure']);
    } else
        delete_post_meta($post_id, 'project_brochure');

    if (isset($_POST['slider_btn_txt'])) {
        update_post_meta($post_id, 'slider_btn_txt', $_POST['slider_btn_txt']);
    } else
        delete_post_meta($post_id, 'slider_btn_txt');

    if (isset($_POST['slider_btn_url'])) {
        update_post_meta($post_id, 'slider_btn_url', $_POST['slider_btn_url']);
    } else
        delete_post_meta($post_id, 'slider_btn_url');

        if (isset($_POST['property_of_day'])) :
        update_post_meta($post_id, 'property_of_day', $_POST['property_of_day']);
        if (!empty($otherLang_id)):
            update_post_meta($otherLang_id, 'property_of_day', $_POST['property_of_day']);
        endif;
    else:
        delete_post_meta($post_id, 'property_of_day');
        if (!empty($otherLang_id)):
            delete_post_meta($otherLang_id, 'property_of_day');
        endif;
    endif;

    /********************** code to save payment plan project meta********************/

     if( isset($_POST['plan_titles']) ){
        $plan_titles        = $_POST['plan_titles'];
        $plan_percentages   = $_POST['plan_percentages'];
        $plane_dates        = $_POST['plane_dates'];

        $payment_plans = [];
        for($i=0;$i<count($plan_titles);$i++) {
            $data = new stdClass();

            $data->title     = $plan_titles[$i] ;
            $data->percentage = $plan_percentages[$i] ;
            $data->plan_date       = $plane_dates[$i] ;

            array_push($payment_plans, $data);

        }

        update_post_meta($post_id, 'payment_plans', $payment_plans);
    }
    else
        delete_post_meta($post_id,'payment_plans');
}


add_action( 'type_add_form_fields', 'sand_taxonomy_add_new_meta_field', 10, 2 );

function sand_taxonomy_add_new_meta_field() {
    ?>
    <div class="form-field">
        <label for="add_font_icon"><?php _e( 'Add Font Icon', 'sand' ); ?></label>
        <input type="text" name="add_font_icon" id="add_font_icon" value="">
        <p class="description"> <a href="https://fontawesome.com/v5/search" target="_blank"><?php _e( 'Choose Font Icon','sand' ); ?></a></p>
    </div>
    <?php
}

add_action( 'type_edit_form_fields', 'sand_taxonomy_edit_meta_field', 10, 2 );

function sand_taxonomy_edit_meta_field( $term ) {
    $term_id = $term->term_id;
    $term_meta = get_term_meta( $term_id, 'add_font_icon', true ); ?>
    <tr class="form-field">
        <th scope="row" valign="top"><label for="add_font_icon"><?php _e( 'Add Font Icon', 'sand' ); ?></label></th>
        <td>
            <input type="text" name="add_font_icon" id="add_font_icon" value="<?php echo ( !empty($term_meta) ) ? $term_meta  : ''; ?>">
            <p class="description"> <a href="https://fontawesome.com/v5/search" target="_blank"><?php _e( 'Choose Font Icon','sand' ); ?></a></p>
        </td>
    </tr>
    <?php
}

add_action( 'edited_type', 'sand_save_taxonomy_custom_meta', 10, 2 );  
add_action( 'create_type', 'sand_save_taxonomy_custom_meta', 10, 2 );

function sand_save_taxonomy_custom_meta( $term_id ) {
    if ( isset( $_POST['add_font_icon'] ) && !empty( $_POST['add_font_icon'] ) ) {
        update_term_meta( $term_id, 'add_font_icon', $_POST['add_font_icon'] );
    }else
        delete_term_meta($term_id,'add_font_icon');
}