<?php

function sand_get_sliders($no){
    $args = array(
           'post_type'       => 'slider',
           'post_status'     => 'publish',
           'posts_per_page'  =>  $no,
           'orderby'         => 'date',
           'order'           => 'DESC'
       );
       return $posts = new WP_Query( $args );
}

function sand_get_testimonials($no){
    $args = array(
           'post_type'       => 'testimonial',
           'post_status'     => 'publish',
           'posts_per_page'  =>  $no,
           'orderby'         => 'date',
           'order'           => 'DESC'
       );
       return $posts = new WP_Query( $args );
}
/*****************************************************************/
function sand_get_team($no){
    $args = array(
           'post_type'       => 'team',
           'post_status'     => 'publish',
           'posts_per_page'  =>  $no,
           'orderby'         => 'date',
           'order'           => 'DESC'
       );
       return $posts = new WP_Query( $args );
}

function sand_get_property($no){
    $args = array(
            'post_type'       => 'property',
            'posts_per_page'  =>  $no,
            'post_status'     => 'publish',
            'orderby'         => 'date',
            'order'           => 'DESC'
       );
       return $posts = new WP_Query( $args );
}

function sand_get_property_with_location($no, $location){
    $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
    $args = array(
        'post_type'       => 'property',
        'post_status'     => 'publish',
        'posts_per_page'  =>  $no,
        'paged'           =>  $paged,
        'orderby'         => 'date',
        'order'           => 'DESC',
        'tax_query' => array(
            array(
                'taxonomy' => 'location',
                'field' => 'term_id',
                'terms' => $location,
            )
        ),
    );
       return $posts = new WP_Query( $args );
}

function sand_get_property_with_type($no, $type){
    $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
    $args = array(
        'post_type'       => 'property',
        'post_status'     => 'publish',
        'posts_per_page'  =>  $no,
        'paged'           =>  $paged,
        'orderby'         => 'date',
        'order'           => 'DESC',
        'tax_query' => array(
            array(
                'taxonomy' => 'type',
                'field' => 'term_id',
                'terms' => $type,
            )
        ),
    );
       return $posts = new WP_Query( $args );
}

function sand_get_property_projects($no, $project_id){
    $args = array(
        'post_type'       => 'property',
        'posts_per_page'  =>  1,
        'post_status'     => 'publish',
        'orderby'         => 'date',
        'order'           => 'DESC',
        'meta_query' => array(
            array(
                'key'     => 'property_project',
                'value'   => $project_id,
                'compare' =>'LIKE',
            )
        ),
   );
   return $posts = new WP_Query( $args );
}

function sand_get_property_with_project_location($no, $project_location){
    $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
    $args = array(
        'post_type'       => 'project',
        'post_status'     => 'publish',
        'posts_per_page'  =>  $no,
        'paged'           =>  $paged,
        'orderby'         => 'date',
        'order'           => 'DESC',
        'tax_query' => array(
            array(
                'taxonomy' => 'project_location',
                'field' => 'term_id',
                'terms' => $project_location,
            )
        ),
    );
       return $posts = new WP_Query( $args );
}

function sand_get_property_with_cat($no, $term_cat){
    $args = array(
            'post_type'       => 'property',
            'posts_per_page'  =>  $no,
            'post_status'     => 'publish',
            'type'            => $term_cat,
            'orderby'         => 'date',
            'order'           => 'DESC'
       );
       return $posts = new WP_Query( $args );
}

function sand_get_property_day(){
    $args = array(
            'post_type'       => 'property',
            'posts_per_page'  =>  1,
            'post_status'     => 'publish',
            'orderby'         => 'date',
            'order'           => 'DESC',
            'meta_query' => array(
                array(
                    'key'     => 'property_of_day',
                    'value'   => '1',
                    'compare' =>'LIKE',
                )
            ),
       );
       return $posts = new WP_Query( $args );
}

function sand_get_property_paged($no){
    $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
    $args = array(
        'post_type'       => 'property',
        'post_status'     => 'publish',
        'posts_per_page'  =>  $no,
        'paged'           =>  $paged,
        'orderby'         => 'date',
        'order'           => 'DESC'
    );
    return $posts = new WP_Query( $args );    
}
function sand_get_projects_paged($no){
    $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
    $args = array(
        'post_type'       => 'project',
        'post_status'     => 'publish',
        'posts_per_page'  =>  $no,
        'paged'           =>  $paged,
        'orderby'         => 'date',
        'order'           => 'DESC'
    );
    return $posts = new WP_Query( $args );    
}
/***************************************************************************/
function property_get_latest_properties_with_meta($project_id){
    $args = array(
            'posts_per_page'   => 6,
            'orderby'          => 'date',
            'order'            => 'DESC',
            'post_type'        => 'property',
            'post_status'      => 'publish',
            'meta_key'         => 'property_project',
            'meta_value'       => $project_id,
            );

     $latest_properties = new WP_Query( $args );
    return $latest_properties;
}

/**********************************************
    send a request email  to admin
**********************************************/
function property_send_new_mail_msg($post_data){

    $email = sanitize_email($post_data['client_email']);
    $phone = sanitize_text_field($post_data['client_phone']);
    $name = sanitize_text_field($post_data['client_name']);
    $message = sanitize_text_field($post_data['message']);
    $property_id = sanitize_text_field($post_data['property_id']);

    /** Form Validation **/
    if ( empty( $email ) || empty( $phone )  || empty( $name ) ){
        $errors[] =  __('Required form field is missing','sand');
    }

  if( empty($name) )
    $errors[] = '<strong>Error : </strong>Name is required .';

  if( empty($phone) )
    $errors[] = '<strong>Error : </strong>Phone is required .';


  if( empty($email) )
    $errors[] = '<strong>Error : </strong>Email is required .';

  if( empty($errors) ){
      $response = array(
        'status' => 1
      );

      $admin_mail = get_option( 'admin_email' );

      send_new_property_request_admin_email( $admin_mail ,$name , $email , $phone , $message , $property_id );
  }else{
      $response = array(
        'status' => 0 ,
        'msg'    => $errors
      );
    }
  return $response;
}
/*********************************************************************************/
function sand_get_agents($no){
    $args = array( 'role' => 'agent', 'paged' => $no );
    return get_users( $args );
}

function sand_agent_login($username, $password, $remember = false){

    // check empty username
    if( !( empty($username) ) ):
        // check empty password
        if ( !( empty($password) ) ):
            //check username exitence
            $sanitized_username = sanitize_text_field($username);
            $plainPassword = sanitize_text_field($password);
            // Authenticate
            $user = wp_signon( $creds = array(
                'user_login'    => $sanitized_username,
                'user_password' => $plainPassword,
                'remember'      => $remember
                ) );
            if ( ! ( is_wp_error( $user ) ) ):
                //LOGIN
                wp_set_current_user($user->id);
                wp_redirect( sand_BlogUrl );
            else:
                //Entered authentication information isn't correct
                global $wp;
                $currentURL =  home_url( $wp->request );
                $error = __('"Entered authentication information isn\'t correct"', 'sand');
                wp_redirect( $currentURL.'?err='.$error);
            endif;
        else:
            // if password is empty return to same page with error message 'empty password'
            global $wp;
            $currentURL =  home_url( $wp->request );
            $error = __('"empty password."', 'sand');
            wp_redirect( $currentURL.'?err='.$error);
        endif;
    else:
        // if username is empty return to same page with error message 'empty user'
        global $wp;
        $currentURL =  home_url( $wp->request );
        $error = __('"empty user."', 'sand');
        wp_redirect( $currentURL.'?err='.$error);
    endif;
}

function sand_add_profileImg($profile_img){
    // image extension & size validation
    if ( !empty($profile_img['name']) ):

        $available_extensions   =   array('jpg', 'jpeg', 'png', 'gif');
        $img_path_parts         =   pathinfo($profile_img['name']);
        $img_extension          =   $img_path_parts['extension'];

        // comparing given extension with the avaliable
        if ( !in_array($img_extension, $available_extensions ) || $profile_img['size'] > 5242880 ): //5MB
            $msg        = __('The File extension or maximum size is violated.', 'sand');
            $response   = [
                'status'    =>  'error',
                'message'   =>  $msg
            ];
            return $response;
            wp_die();
        endif;

        $upload_dir = wp_upload_dir()['basedir'].'/agents-profile-pics/';

        $uploaded_path_parts    = pathinfo($profile_img['name']);
        $uploaded_new_name      = 'profile-'.$user_id.'.'.$uploaded_path_parts['extension'] ;
        $new_profile_path       = $upload_dir.$uploaded_new_name;
        // move pic from temporary path to upload path & update 'profile_pic' user_meta
        //  $_FILES['temp_name'] ==> temporary file directory
        move_uploaded_file($profile_img['tmp_name'], $new_profile_path);
        $upload_url = wp_upload_dir()['baseurl'].'/agents-profile-pics/';
        $upload_url = $upload_url.$uploaded_new_name;
        $response   = [
            'status'    =>  'success',
            'url'   =>  $upload_url
        ];
        return $response;
        wp_die();
    endif;
    $response   = [
        'status'    =>  'OK',
    ];
    return $response;
    wp_die();
}

function sand_agent_register($email, $phone, $username, $password, $profile_img){
    // check empty username
    if( !( empty($username) ) ):
        //check empty email
        if ( !(empty($email)) ):
            // check empty phone
            if ( !(empty($phone)) ):
                // check empty password
                if ( !( empty($password) ) ):
                    //check username exitence
                    $sanitized_username = sanitize_text_field($username);
                    //check if email exist
                    $sanitized_email = sanitize_email($email);
                    if (!email_exists( $sanitized_email )):
                        if (!username_exists( $sanitized_username )):
                            $plainPassword = sanitize_text_field($password);
                            $signUp = wp_insert_user(array(
                                    "user_login"            =>  $sanitized_username,
                                    "user_pass"             =>  wp_slash($plainPassword),
                                    "user_email"            =>  $email,
                                    "show_admin_bar_front"  => 'false',
                                    "role"                  =>  "agent"
                                )
                            );
                            if ( !is_wp_error($signUp) ):
                                //phone is just a number
                                $phone_sanitized = preg_replace('/[^0-9]/', '', $phone);
                                update_user_meta( $signUp, 'sand_phone', $phone_sanitized );
                                //add profile image
                                $img = sand_add_profileImg($profile_img);
                                // if no error during insertion
                                if ( $img['status'] != 'error' ):
                                    update_user_meta( $signUp, 'profile_pic', $img['url'] );
                                    $args = array(
                                        'meta_key' => '_wp_page_template',
                                        'meta_value' => 'page-login.php'
                                    );
                                    $loginUrl = get_pages($args)[0];
                                    wp_redirect( get_permalink($loginUrl->ID ));
                                    exit;
                                else:
                                    // image insertion error
                                    global $wp;
                                    wp_redirect( sand_BlogUrl );
                                    $currentURL =  home_url( $wp->request );
                                    wp_redirect( $currentURL.'?err='.$img['message']);
                                endif;
                            else:
                                //Registeration error
                                global $wp;
                                wp_redirect( sand_BlogUrl );
                                $currentURL =  home_url( $wp->request );
                                $error = __('"failed to register."', 'sand');
                                wp_redirect( $currentURL.'?err='.$error);
                            endif;
                        else:
                            //username exists
                            global $wp;
                            $currentURL =  home_url( $wp->request );
                            $error = __('"username already exists."', 'sand');
                            wp_redirect( $currentURL.'?err='.$error);
                        endif;
                    else:
                        //username exists
                        global $wp;
                        $currentURL =  home_url( $wp->request );
                        $error = __('"email already exists."', 'sand');
                        wp_redirect( $currentURL.'?err='.$error);
                    endif;
                else:
                    // if password is empty return to same page with error message 'empty password'
                    global $wp;
                    $currentURL =  home_url( $wp->request );
                    $error = __('"empty password."', 'sand');
                    wp_redirect( $currentURL.'?err='.$error);
                endif;
            else:
                // if phone is empty return to same page with error message 'empty phone'
                global $wp;
                $currentURL =  home_url( $wp->request );
                $error = __('"empty phone."', 'sand');
                wp_redirect( $currentURL.'?err='.$error);
            endif;
        else:
            //if email is empty return to same page with error message 'empty email'
            global $wp;
            $currentURL =  home_url( $wp->request );
            $error = __('"empty email."', 'sand');
            wp_redirect( $currentURL.'?err='.$error);
        endif;
    else:
        // if username is empty return to same page with error message 'empty user'
        global $wp;
        $currentURL =  home_url( $wp->request );
        $error = __('"empty user."', 'sand');
        wp_redirect( $currentURL.'?err='.$error);
    endif;
}

function sand_validate_edit_agent_profile($user_id, $post_data, $profile_img){

    $firstname  = sanitize_text_field($post_data['fname']);
    $lastname   = sanitize_text_field($post_data['lname']);
    $phone      = sanitize_text_field($post_data['phone']);
    $country    = sanitize_text_field($post_data['country']);
    $job        = sanitize_text_field($post_data['job']);
    $pw         = sanitize_text_field($post_data['password']);
    // validate empty text inputs
    if ( empty( $firstname ) || empty( $lastname ) || empty( $phone ) || empty( $country ) || empty( $job ) ):

        $msg = __('Required field is missing.', 'sand');
        $response = [
            'status'    => 'error',
            'message'   => $msg
        ];
        return $response;
        wp_die();

    endif;
    // image extension & size validation
    if ( !empty($profile_img['name']) ):

        $available_extensions   =   array('jpg', 'jpeg', 'png', 'gif');
        $img_path_parts         =   pathinfo($profile_img['name']);
        $img_extension          =   $img_path_parts['extension'];

        // comparing given extension with the avaliable
        if ( !in_array($img_extension, $available_extensions ) || $profile_img['size'] > 5242880 ): //5MB
            $msg        = __('The File extension or maximum size is violated.', 'sand');
            $response   = [
                'status'    =>  'error',
                'message'   =>  $msg
            ];
            return $response;
            wp_die();
        endif;

    endif;
    return sand_edit_agent_profile($user_id, $firstname, $lastname, $phone, $country, $job, $pw, $profile_img);
}

function sand_edit_agent_profile($user_id, $first_name, $last_name, $phone, $country, $job, $pw,$profile_img){
    // display name , first/last name, phone, country, profile
    $user_args = array(
        'ID'            =>  $user_id,
        'display_name'  =>  $first_name.' '.$last_name,
        'first_name'    =>  $first_name,
        'last_name'     =>  $last_name,
    );
    if ( !empty($pw) )
        $user_args['user_pass'] = $pw;
    $userID = wp_update_user( $user_args ); // userID or WP_Error
    update_user_meta($user_id,'sand_phone',$phone);
    update_user_meta($user_id,'sand_country',$country);
    update_user_meta($user_id,'job_title',$job);

    if ( !empty($profile_img['name']) ):
        // wp_upload_dir()['basedir'] => wordpress/wp-content/uploads
        $upload_dir = wp_upload_dir()['basedir'].'/agents-profile-pics/';
        $upload_url = wp_upload_dir()['baseurl'].'/agents-profile-pics/';
        $uploaded_path_parts    = pathinfo($profile_img['name']);
        $uploaded_new_name      = 'profile-'.$user_id.'.'.$uploaded_path_parts['extension'] ;
        $new_profile_path       = $upload_dir.$uploaded_new_name;

        // if there's old profile remove it using unlink(path)
        $old_profile = get_user_meta($user_id, 'profile_pic', true);
        $old_name = basename($old_profile);
        if ( !empty($old_profile) )
            unlink($upload_dir.$old_name);

        // move pic from temporary path to upload path & update 'profile_pic' user_meta
        //  $_FILES['temp_name'] ==> temporary file directory
        move_uploaded_file($profile_img['tmp_name'], $new_profile_path);
        update_user_meta( $user_id, 'profile_pic', $upload_url.$uploaded_new_name );

    endif;
    $msg = __('Agent profile updated successfully.', 'sand');
    $response = [
        'status'    =>  'success',
        'message'   =>  $msg
    ];
    return $response;
    wp_die();
}

function property_clean($string){
    return trim(stripslashes(htmlspecialchars($string)));
}
// Display error on admin dashboard when add or edit
add_action('admin_notices', 'display_notice');
function display_notice(){
    $notice = get_transient('property_post_notice');
    set_transient('property_post_notice', '');
    if(!empty($notice)):?>
        <div id="message" class="notice notice-error">
            <p><?= $notice ?></p>
        </div>
    <?php endif;
}
function sand_validate_agent_addProperty($userID,$postData, $files){
    global $reg_errors;
    $reg_errors = new WP_Error;

    $response = [];
    //get main post elements
    $title              = property_clean($postData['property_title']);
    if ( empty($title) ):

        $reg_errors->add('error', __('title can\'t be empty','sand') );

    endif;
    $content            = stripcslashes($postData['property_content']);
    if ( empty($content) ):

        $reg_errors->add('error', __('about can\'t be empty','sand') );
    endif;
    $excerpt            = property_clean($postData['property_excerpt']);
    //get taxonomies
    if (!isset($postData['locations'])):

        $reg_errors->add('error', __('locations can\'t be empty','sand') );
    endif;
    $locations          = $postData['locations'];

    if (!isset($postData['types'])):

        $reg_errors->add('error', __('types can\'t be empty','sand') );
    endif;
    $types              = $postData['types'];
    //get post meta
    $status             = property_clean($postData['property_status']);
    $rentalPeriod   = null;
    $furnishing     = null;
    if ($status == 'rent'):
        $rentalPeriod   = property_clean($postData['rental_period']);
        $furnishing     = property_clean($postData['property_furnishing']);
    endif;
    $has_installment_plan = isset($postData['has_installment_plan']);
    
    if (empty($postData['price'])):

        $reg_errors->add('error', __('price can\'t be empty','sand') );
    endif;
    $price              = property_clean($postData['price']);
    if (!is_numeric($price)):
        $reg_errors->add('error', __('price can be only numeric','sand') );
    endif;
    if (empty($postData['bedroom'])):

        $reg_errors->add('error', __('bedroom number can\'t be empty','sand') );
    endif;
    $bedroom            = property_clean($postData['bedroom']);
    if (empty($postData['bathroom'])):

        $reg_errors->add('error', __('bathroom number can\'t be empty','sand') );
    endif;
    $bathroom           = property_clean($postData['bathroom']);
    if (empty($postData['size'])):

        $reg_errors->add('error', __('built up area can\'t be empty','sand') );
    endif;
    $property_size      = property_clean($postData['size']);
    $down_payment       = property_clean($postData['down_payment']);
    if (!is_numeric($down_payment)):
        $reg_errors->add('error', __('down payment can be only numeric','sand') );
    endif;
    $landArea           = property_clean($postData['land_area']);
    $attachment         = property_clean($postData['property_attachment']);
    $video              = property_clean($postData['property_video']);
    $prop_location      = stripcslashes($postData['location']);
    if (empty($postData['property_project'])):

        $reg_errors->add('error', __('project can\'t be empty','sand') );
    endif;
    $project            = property_clean($postData['property_project']);
    if (empty($postData['property_reference'])):
        $reg_errors->add('error', __('reference number can\'t be empty','sand') );
    endif;
    $reference          = property_clean($postData['property_reference']);
    $amenities          = $postData['property_amenities'];
    $f_img              = $files['f_img'];
    $gallery            = $files['property_gallery'];
    $nOfImgs = count($gallery);
    if ( $nOfImgs < 3 ):

        $reg_errors->add('error', __('can\'t upload less than 3 images of gallery.','sand') );

        elseif ($nOfImgs > 10):

            $reg_errors->add('error', __('can\'t upload more than 10 images of gallery.','sand') );
        endelseif;
    endif;

    //get arabic post elements
    $titleAR              = property_clean($postData['property_title_ar']);
    $contentAR            ='';
    $excerptAR            ='';
    $amenitiesAR          ='';
    if ( !empty($titleAR) ):
        $contentAR            = stripcslashes($postData['property_content_ar']);
        if ( empty($contentAR) ):

            $reg_errors->add('error', __('arabic about can\'t be empty','sand') );
        endif;
        $excerptAR            = property_clean($postData['property_excerpt_ar']);
        $amenitiesAR          = $postData['property_amenities_ar'];


    endif;

    if(empty( $reg_errors->errors )){
        return sand_agent_addProperty($userID, $title, $content,
            $excerpt, $locations, $types,
            $status, $price, $bedroom, $furnishing, $rentalPeriod,
            $bathroom, $property_size, $down_payment, 
            $landArea, $attachment, $video, 
            $prop_location, $project, $reference, 
            $amenities, $f_img,$gallery, 
            $titleAR, $contentAR, $excerptAR, $amenitiesAR,
            $has_installment_plan);
    //    $response['status'] = 'success';
    //    $response['message'] = __('property added successfully, please wait for confirmation.','sand');
    //    return $response;
    }
}

function sand_agent_addProperty($userID, $title, $content, 
    $excerpt, $locations, $types, 
    $status, $price, $bedroom,  $furnishing, $rentalPeriod,
    $bathroom, $property_size, $down_payment, 
    $landArea, $attachment, $video, 
    $prop_location, $project, $reference, 
    $amenities, $f_img, $gallery, 
    $titleAR, $contentAR, $excerptAR, $amenitiesAR,
    $has_installment_plan){

    global $reg_errors;
    $reg_errors = new WP_Error;

    $response = [];
    // create post
    $postID = wp_insert_post( array(
        'post_type'     => 'property',
        'post_author'   =>  $userID,
        'post_status'   =>  'pending',
        'post_title'    =>  $title,
        'post_content'  =>  $content,
        'post_excerpt'  =>  $excerpt,
    ));

    // handle error
    if ( is_wp_error($postID) ):

        $reg_errors->add('error', __('failed to add the property','sand') );

    endif;

    // set language en
    pll_set_post_language($postID, 'en');


    $postID_AR = null;
    if ( !empty($titleAR) ):

        // create arabic post
        $postID_AR = wp_insert_post( array(
            'post_type'     => 'property',
            'post_author'   =>  $userID,
            'post_status'   =>  'pending',
            'post_title'    =>  $titleAR,
            'post_content'  =>  $contentAR,
            'post_excerpt'  =>  $excerptAR,
        ));
        pll_set_post_language($postID_AR, 'ar');
        pll_save_post_translations(array(
            'en'=> $postID,
            'ar'=> $postID_AR
        ));

        if ( !empty( $amenitiesAR ) )
            update_post_meta($postID_AR, 'property_amenities', $amenitiesAR);

    endif;


    // add taxonomy terms
    if ( !empty($locations) ):
        wp_set_post_terms( $postID, $locations, 'location');
        if ( $postID_AR != null ):
            // getting all terms in arabic as array
            $termsAR = array();
            foreach ($locations as $location):
                $termAR = pll_get_term($location, 'ar');
                array_push($termsAR, $termAR);
            endforeach;

            //setting arabic terms to arabic post
            wp_set_post_terms( $postID_AR, $termsAR, 'location');
        endif;
    endif;

    if ( !empty($types) ):
        wp_set_post_terms( $postID, $types, 'type');
        if ( $postID_AR != null ):
            // getting all terms in arabic as array
            $termsAR = array();
            foreach ($types as $type):
                $termAR = pll_get_term($type, 'ar');
                array_push($termsAR, $termAR);
            endforeach;

            //setting arabic terms to arabic post
            wp_set_post_terms( $postID_AR, $termsAR, 'type');
        endif;
    endif;

    // add post meta
    if ( !empty( $status ) ):
        update_post_meta($postID, 'property_status', $status);
        if ( $postID_AR != null ):
            update_post_meta($postID_AR, 'property_status', $status);
        endif;

        if ($status == 'rent'):
            //rental period
            update_post_meta($postID, 'rental_period', $rentalPeriod);
            if ( $postID_AR != null ):
                update_post_meta($postID_AR, 'rental_period', $rentalPeriod);
            endif;
            //furnishing
            update_post_meta($postID, 'property_furnishing', $furnishing);
            if ( $postID_AR != null ):
                update_post_meta($postID_AR, 'property_furnishing', $furnishing);
            endif;
        else:
            if ($has_installment_plan) :
                update_post_meta($postID, 'has_installment_plan', 1);
                if ( $postID_AR != null ):
                    update_post_meta($postID_AR, 'has_installment_plan', 1);
                endif;    
            else:
                delete_post_meta($postID, 'has_installment_plan');
                if ( $postID_AR != null ):
                    delete_post_meta($postID_AR, 'has_installment_plan');
                endif;
            endif;
        endif;
    endif;

    if ( !empty( $price ) ):
        update_post_meta($postID, 'property_price', $price);
        if ( $postID_AR != null ):
            update_post_meta($postID_AR, 'property_price', $price);
        endif;
    endif;

    if ( !empty( $down_payment ) ):
        update_post_meta($postID, 'down_payment', $down_payment);
        if ( $postID_AR != null ):
            update_post_meta($postID_AR, 'down_payment', $down_payment);
        endif;
    endif;

    if ( !empty( $bedroom ) ):
        update_post_meta($postID, 'bedroom_num', $bedroom);
        if ( $postID_AR != null ):
            update_post_meta($postID_AR, 'bedroom_num', $bedroom);
        endif;
    endif;

    if ( !empty( $bathroom ) ):
        update_post_meta($postID, 'bathroom_num', $bathroom);
        if ( $postID_AR != null ):
            update_post_meta($postID_AR, 'bathroom_num', $bathroom);
        endif;
    endif;

    if ( !empty( $property_size ) ):
        update_post_meta($postID, 'property_size', $property_size);
        if ( $postID_AR != null ):
            update_post_meta($postID_AR, 'property_size', $property_size);
        endif;
    endif;

    if ( !empty( $landArea ) ):
        update_post_meta($postID, 'land_area', $landArea);
        if ( $postID_AR != null ):
            update_post_meta($postID_AR, 'land_area', $landArea);
        endif;
    endif;

    if ( !empty( $attachment ) ):
        update_post_meta($postID, 'property_brochure', $attachment);
        if ( $postID_AR != null ):
            update_post_meta($postID_AR, 'property_brochure', $attachment);
        endif;
    endif;

    if ( !empty( $video ) ):
        update_post_meta($postID, 'property_video_url', $video);
        if ( $postID_AR != null ):
            update_post_meta($postID_AR, 'property_video_url', $video);
        endif;
    endif;

    if ( !empty( $prop_location ) ):
        update_post_meta($postID, 'property_location', $prop_location);
        if ( $postID_AR != null ):
            update_post_meta($postID_AR, 'property_location', $prop_location);
        endif;
    endif;

    if ( !empty( $project ) ):
        update_post_meta($postID, 'property_project', $project);
        if ( $postID_AR != null ):
            // getting arabic project
            $postAR = pll_get_post($project, 'ar');
            //setting arabic project
            update_post_meta($postID_AR, 'property_project', $postAR);
        endif;
    endif;

    if ( !empty( $reference ) ):
        update_post_meta($postID, 'property_ref_no', $reference);
        if ( $postID_AR != null ):
            update_post_meta($postID_AR, 'property_ref_no', $reference);
        endif;
    endif;

    if ( !empty( $amenities ) )
        update_post_meta($postID, 'property_amenities', $amenities);

    // post thumbnail
    if ( !empty($f_img['name']) ):
        $upload = wp_upload_bits($f_img["name"], null, file_get_contents($f_img["tmp_name"]));
        $file_path = $upload['file'];
        $filetype = wp_check_filetype($file_path, null );
        $file_type_suffix_count = strlen($filetype['ext'])+1;
        $unique_file_suffix = substr($f_img['name'],0,0-abs($file_type_suffix_count));
        $post_title = $title ." ".$unique_file_suffix;

        $args = array(
            'post_mime_type' => $filetype['type'],
            'post_title' => sanitize_file_name($post_title),
            'post_content' => '',
            'post_status' => 'inherit'
        );
        $attach_id = wp_insert_attachment( $args, $file_path, $postID );
        $attach_data = wp_generate_attachment_metadata( $attach_id, $file_path );
        wp_update_attachment_metadata( $attach_id, $attach_data );

        set_post_thumbnail( $postID, $attach_id );
        if ($postID_AR != null )
            set_post_thumbnail( $postID_AR, $attach_id );
    endif;

    // post gallery
    if(! empty($gallery['name'][0])):
        $attachments = array(); // attachment ids holder

        // upload gallery images and get attachments ids
        foreach($gallery['name'] as $key => $value) :

            $upload = wp_upload_bits($gallery["name"][$key], null, file_get_contents($gallery["tmp_name"][$key]));

            $file_path = $upload['file'];
            $filetype = wp_check_filetype($file_path, null );
            $file_type_suffix_count = strlen($filetype['ext'])+1;

            $unique_file_suffix = substr($gallery['name'][$key],0,0-abs($file_type_suffix_count));
            $post_title = $title ." ".$unique_file_suffix;

            $args = array(
                'post_mime_type' => $filetype['type'],
                'post_title' => sanitize_file_name($post_title),
                'post_content' => '',
                'post_status' => 'inherit'
            );

            $attach_id = wp_insert_attachment( $args, $file_path, $postID );
            $attach_data = wp_generate_attachment_metadata( $attach_id, $file_path );
            wp_update_attachment_metadata( $attach_id, $attach_data );
            array_push($attachments, $attach_id);
        endforeach;

        // bind attachments to the post
        foreach($attachments as $img_id):
            add_post_meta($postID, 'thumbnail_id', $img_id);
        endforeach;
        // if there is a translation page, bind attachments to it
        if ( $postID_AR != null ):
            foreach($attachments as $img_id):
                add_post_meta($postID_AR, 'thumbnail_id', $img_id);
            endforeach;
        endif;

    endif;
    if(empty( $reg_errors->errors )){
        $response['status'] = 'success';
        $response['message'] = __('property added successfully, please wait for confirmation.','sand');
        return $response;
    }
}

function sand_validate_agent_edit_property($userID,$propertyID,$postData, $files){
    global $reg_errors;
    $reg_errors = new WP_Error;

    $response = [];
    //get main post elements
    $title              = property_clean($postData['property_title']);
    if ( empty($title) ):

        $reg_errors->add('error', __('title can\'t be empty','sand') );

    endif;
    $content            = stripcslashes($postData['property_content']);
    if ( empty($content) ):

        $reg_errors->add('error', __('about can\'t be empty','sand') );
    endif;
    $excerpt            = property_clean($postData['property_excerpt']);
    //get taxonomies
    if (!isset($postData['locations'])):

        $reg_errors->add('error', __('locations can\'t be empty','sand') );
    endif;
    $locations          = $postData['locations'];

    if (!isset($postData['types'])):

        $reg_errors->add('error', __('types can\'t be empty','sand') );
    endif;
    $types              = $postData['types'];
    //get post meta
    $status             = property_clean($postData['property_status']);
    $rentalPeriod   = null;
    $furnishing     = null;
    if ($status == 'rent'):
        $rentalPeriod   = property_clean($postData['rental_period']);
        $furnishing     = property_clean($postData['property_furnishing']);
    endif;
    $has_installment_plan = isset($postData['has_installment_plan']);
    
    if (empty($postData['price'])):

        $reg_errors->add('error', __('price can\'t be empty','sand') );
    endif;
    $price              = property_clean($postData['price']);
    if (!is_numeric($price)):
        $reg_errors->add('error', __('price can be only numeric','sand') );
    endif;

    if (empty($postData['bedroom'])):

        $reg_errors->add('error', __('bedroom number can\'t be empty','sand') );
    endif;
    $bedroom            = property_clean($postData['bedroom']);
    if (empty($postData['bathroom'])):

        $reg_errors->add('error', __('bathroom number can\'t be empty','sand') );
    endif;
    $bathroom           = property_clean($postData['bathroom']);
    if (empty($postData['size'])):

        $reg_errors->add('error', __('built up area can\'t be empty','sand') );
    endif;
    $property_size      = property_clean($postData['size']);
    $down_payment       = property_clean($postData['down_payment']);
    if (!is_numeric($down_payment)):
        $reg_errors->add('error', __('down payment can be only numeric','sand') );
    endif;
    $landArea           = property_clean($postData['land_area']);
    $attachment         = property_clean($postData['property_attachment']);
    $video              = property_clean($postData['property_video']);
    $prop_location      = stripcslashes($postData['location']);
    if (empty($postData['property_project'])):

        $reg_errors->add('error', __('project can\'t be empty','sand') );
    endif;
    $project            = property_clean($postData['property_project']);
    if (empty($postData['property_reference'])):
        $reg_errors->add('error', __('reference number can\'t be empty','sand') );
    endif;
    $reference          = property_clean($postData['property_reference']);
    $amenities          = $postData['property_amenities'];
    $f_img              = $files['f_img'];
    $gallery            = $files['property_gallery'];
    $nOfImgs = count($gallery);
    if ( $nOfImgs < 3 ):

        $reg_errors->add('error', __('can\'t upload less than 3 images of gallery.','sand') );

        elseif ($nOfImgs > 10):

            $reg_errors->add('error', __('can\'t upload more than 10 images of gallery.','sand') );
        endelseif;
    endif;

    //get arabic post elements
    $titleAR              = property_clean($postData['property_title_ar']);
    $contentAR            = '';
    $excerptAR            = '';
    $amenities_AR          = '';
    if ( !empty($titleAR) ):
        $contentAR            = stripcslashes($postData['property_content_ar']);
        if ( empty($contentAR) ):

            $reg_errors->add('error', __('arabic about can\'t be empty','sand') );
        endif;
        $excerptAR            = property_clean($postData['property_excerpt_ar']);
        $amenities_AR          = $postData['property_amenities_ar'];


    endif;

    if(empty( $reg_errors->errors )){
        return sand_agent_edit_property($userID, $propertyID, $title, 
            $content, $excerpt, $locations, 
            $types, $status, $price, $bedroom, $furnishing, $rentalPeriod,
            $bathroom, $property_size, $down_payment, 
            $landArea, $attachment, $video, 
            $prop_location, $project, $reference, 
            $amenities, $f_img, $gallery, 
            $titleAR, $contentAR, $excerptAR, $amenities_AR,
            $has_installment_plan);

    }
}

function sand_agent_edit_property($userID, $propertyID, $title, 
    $content, $excerpt, $locations, 
    $types, $status, $price, $bedroom, $furnishing, $rentalPeriod,
    $bathroom, $property_size, $down_payment, $landArea, 
    $attachment, $video, $prop_location, $project, 
    $reference, $amenities, $f_img,$gallery, 
    $titleAR, $content_ar, $excerpt_ar, $amenitiesAR,
    $has_installment_plan){
    $response = [];
    global $reg_errors;
    $reg_errors = new WP_Error;


    $post_update = array (
        'ID'            =>  $propertyID,
        'post_title'    =>  $title,
        'post_content'  =>  $content,
        'post_excerpt'  =>  $excerpt,
    );
    $postID = wp_update_post($post_update);
    // handle error
    if ( is_wp_error($postID) ):

        $reg_errors->add('error', __('failed to update the property','sand') );
    endif;

    $flag = 0;
    $postID_AR = pll_get_post($postID, 'ar');
    $ar_old_attachments = [];
    if ( !empty($titleAR) ):
        
        if ( empty($content_ar) ):
          $reg_errors->add('error', __('arabic about can\'t be empty','sand') );
        endif;

        $flag = 1;
        if( $postID_AR =='' || $postID_AR == null || empty($postID_AR) ){
            // create arabic post
            $postID_AR = wp_insert_post( array(
                'post_type'     => 'property',
                'post_author'   =>  $userID,
                'post_status'   =>  'pending',
                'post_title'    =>  $titleAR,
                'post_content'  =>  $content_ar,
                'post_excerpt'  =>  $excerpt_ar,
            ));
            pll_set_post_language($postID_AR, 'ar');
            pll_save_post_translations(array(
                'en'=> $postID,
                'ar'=> $postID_AR
            ));
            $ar_old_attachments = get_post_meta($postID_AR,'thumbnail_id');
        }
        else{
            $post_update = array (
                'ID'            =>  $postID_AR,
                'post_title'    =>  $titleAR,
                'post_content'  =>  $content_ar,
                'post_excerpt'  =>  $excerpt_ar,
            );
            $postID_AR = wp_update_post($post_update);
            if ( !empty( $amenitiesAR ) ):
                update_post_meta($postID_AR, 'property_amenities', $amenitiesAR);
            endif;
            $ar_old_attachments = get_post_meta($postID_AR,'thumbnail_id');
            // handle error
            if ( is_wp_error($postID_AR) ):
                $reg_errors->add('error', __('failed to update the property','sand') );

            endif;
        }
    endif;

        // add taxonomy terms
        if ( !empty($locations) ):
            wp_set_post_terms( $postID, $locations, 'location');
            if ( $postID_AR != null ):
                // getting all terms in arabic as array
                $termsAR = array();
                foreach ($locations as $location):
                    $termAR = pll_get_term($location, 'ar');
                    array_push($termsAR, $termAR);
                endforeach;

                //setting arabic terms to arabic post
                wp_set_post_terms( $postID_AR, $termsAR, 'location');
            endif;
        endif;

        if ( !empty($types) ):
            wp_set_post_terms( $postID, $types, 'type');
            if ( $postID_AR != null ):
                // getting all terms in arabic as array
                $termsAR = array();
                foreach ($types as $type):
                    $termAR = pll_get_term($type, 'ar');
                    array_push($termsAR, $termAR);
                endforeach;

                //setting arabic terms to arabic post
                wp_set_post_terms( $postID_AR, $termsAR, 'type');
            endif;
        endif;

        // add post meta
        if ( !empty( $status ) ):
            update_post_meta($postID, 'property_status', $status);
            if ( $postID_AR != null ):
                update_post_meta($postID_AR, 'property_status', $status);
            endif;

            if ( $status == 'rent' ):
                //Rental period
                update_post_meta($postID, 'rental_period', $rentalPeriod);
                if ( $postID_AR != null ):
                    update_post_meta($postID_AR, 'rental_period', $rentalPeriod);
                endif;
                //Furnishing
                update_post_meta($postID, 'property_furnishing', $furnishing);
                if ( $postID_AR != null ):
                    update_post_meta($postID_AR, 'property_furnishing', $furnishing);
                endif;
            else:
                if ($has_installment_plan) :
                    update_post_meta($postID, 'has_installment_plan', 1);
                    if ( $postID_AR != null ):
                        update_post_meta($postID_AR, 'has_installment_plan', 1);
                    endif;    
                else:
                    delete_post_meta($postID, 'has_installment_plan');
                    if ( $postID_AR != null ):
                        delete_post_meta($postID_AR, 'has_installment_plan');
                    endif;
                endif;
            endif;
        endif;

        if ( !empty( $price ) ):
            update_post_meta($postID, 'property_price', $price);
            if ( $postID_AR != null ):
                update_post_meta($postID_AR, 'property_price', $price);
            endif;
        endif;

        if ( !empty( $down_payment ) ):
            update_post_meta($postID, 'down_payment', $down_payment);
            if ( $postID_AR != null ):
                update_post_meta($postID_AR, 'down_payment', $down_payment);
            endif;
        endif;

        if ( !empty( $bedroom ) ):
            update_post_meta($postID, 'bedroom_num', $bedroom);
            if ( $postID_AR != null ):
                update_post_meta($postID_AR, 'bedroom_num', $bedroom);
            endif;
        endif;

        if ( !empty( $bathroom ) ):
            update_post_meta($postID, 'bathroom_num', $bathroom);
            if ( $postID_AR != null ):
                update_post_meta($postID_AR, 'bathroom_num', $bathroom);
            endif;
        endif;

        if ( !empty( $property_size ) ):
            update_post_meta($postID, 'property_size', $property_size);
            if ( $postID_AR != null ):
                update_post_meta($postID_AR, 'property_size', $property_size);
            endif;
        endif;

        if ( !empty( $landArea ) ):
            update_post_meta($postID, 'land_area', $landArea);
            if ( $postID_AR != null ):
                update_post_meta($postID_AR, 'land_area', $landArea);
            endif;
        endif;

        if ( !empty( $attachment ) ):
            update_post_meta($postID, 'property_brochure', $attachment);
            if ( $postID_AR != null ):
                update_post_meta($postID_AR, 'property_brochure', $attachment);
            endif;
        endif;

        if ( !empty( $video ) ):
            update_post_meta($postID, 'property_video_url', $video);
            if ( $postID_AR != null ):
                update_post_meta($postID_AR, 'property_video_url', $video);
            endif;
        endif;

        if ( !empty( $prop_location ) ):
            update_post_meta($postID, 'property_location', $prop_location);
            if ( $postID_AR != null ):
                update_post_meta($postID_AR, 'property_location', $prop_location);
            endif;
        endif;

        if ( !empty( $project ) ):
            update_post_meta($postID, 'property_project', $project);
            if ( $postID_AR != null ):
                // getting arabic project
                $postAR = pll_get_post($project, 'ar');
                //setting arabic project
                update_post_meta($postID_AR, 'property_project', $postAR);
            endif;
        endif;

        if ( !empty( $reference ) ):
            update_post_meta($postID, 'property_ref_no', $reference);
            if ( $postID_AR != null ):
                update_post_meta($postID_AR, 'property_ref_no', $reference);
            endif;
        endif;

        if ( !empty( $amenities ) )
            update_post_meta($postID, 'property_amenities', $amenities);

        // post thumbnail
        if ( !empty($f_img['name']) ):
            $upload = wp_upload_bits($f_img["name"], null, file_get_contents($f_img["tmp_name"]));
            $file_path = $upload['file'];
            $filetype = wp_check_filetype($file_path, null );
            $file_type_suffix_count = strlen($filetype['ext'])+1;
            $unique_file_suffix = substr($f_img['name'],0,0-abs($file_type_suffix_count));
            $post_title = $title ." ".$unique_file_suffix;

            $args = array(
                'post_mime_type' => $filetype['type'],
                'post_title' => sanitize_file_name($post_title),
                'post_content' => '',
                'post_status' => 'inherit'
            );
            $attach_id = wp_insert_attachment( $args, $file_path, $postID );
            $attach_data = wp_generate_attachment_metadata( $attach_id, $file_path );
            wp_update_attachment_metadata( $attach_id, $attach_data );

            set_post_thumbnail( $postID, $attach_id );
            if ($postID_AR != null )
                set_post_thumbnail( $postID_AR, $attach_id );
            endif;

        $old_attachments     = $postData['attatchments_ids'];

        $removed_attachments = explode(",",$postData['removed_attatchments']);
        $gallery             = $files['property_gallery'];
        // Limit is 3 images
            // count( ($old - $removed) + $gallery ) = future images count
            // then we use that count to perform limitation condition and it's action
            // notes : $removed_attachments count can be 1 cause can contain [0] = '', and $gallery['name'] also
            // so added a check for empty if empty the initialized 0 will be the value of the counter
        $old_attachments_count = 0;
        if (isset($old_attachments))
            $old_attachments_count          = count($old_attachments);
        $removed_attachments_count = 0;
        if ( !empty($removed_attachments[0]) )
            $removed_attachments_count      = count($removed_attachments);
        $gallery_count = 0;
        if (!empty($gallery['name'][0]))
            $gallery_count                  = count($gallery['name']);
        $remained_count                 = $old_attachments_count - $removed_attachments_count;
        $remained_count                 = $remained_count + $gallery_count;
        if ( $remained_count < 3 ):
            $response['status'] = 'error';
            $response['message'] = __('gallery can\'t be less than 3 images.', 'sand');
            return $response;

            elseif ($remained_count > 10):
                $response['status'] = 'error';
                $response['message'] = __('gallery can\'t be more than 10 images.', 'sand');
                return $response;
            endelseif;
        endif;
        // post gallery
        if(! empty($gallery['name'][0])):
            $new_attachments = [];
            foreach($gallery['name'] as $key => $value) :

                $upload = wp_upload_bits($gallery["name"][$key], null, file_get_contents($gallery["tmp_name"][$key]));

                $file_path = $upload['file'];
                $filetype = wp_check_filetype($file_path, null );
                $file_type_suffix_count = strlen($filetype['ext'])+1;

                $unique_file_suffix = substr($gallery['name'][$key],0,0-abs($file_type_suffix_count));
                $post_title = $title ." ".$unique_file_suffix;

                $args = array(
                    'post_mime_type' => $filetype['type'],
                    'post_title' => sanitize_file_name($post_title),
                    'post_content' => '',
                    'post_status' => 'inherit'
                );

                $attach_id = wp_insert_attachment( $args, $file_path, $postID );
                $attach_data = wp_generate_attachment_metadata( $attach_id, $file_path );
                wp_update_attachment_metadata( $attach_id, $attach_data );
                add_post_meta($postID, 'thumbnail_id', $attach_id);
                if ($postID_AR != null ):
                    add_post_meta($postID_AR, 'thumbnail_id', $attach_id);
                endif;

            endforeach;

            if(!empty($old_attachments[0]) && !empty($removed_attachments[0])):

            //    $new_old_attachments = array_diff($old_attachments, $removed_attachments);
                foreach($removed_attachments as $removed_attachment):
                    wp_delete_attachment( $removed_attachment, true );
                    delete_post_meta($postID, 'thumbnail_id', $removed_attachment);
                    if ($postID_AR != null ):
                        delete_post_meta($postID_AR, 'thumbnail_id', $removed_attachment);
                    endif;
                endforeach;
            //    echo "<pre>";
            //    var_dump($new_old_attachments);die();
            //    echo "</pre>";

            endif;




        else:
            if(!empty($old_attachments[0]) && empty($ar_old_attachments[0])):

                foreach($old_attachments as $old_attachment):
                    if ($postID_AR != null ):
                        add_post_meta($postID_AR, 'thumbnail_id', $old_attachment);
                    endif;
                endforeach;
            endif;
            if(!empty($old_attachments[0]) && !empty($removed_attachments[0])):

            //    $new_old_attachments = array_diff($old_attachments, $removed_attachments);
                foreach($removed_attachments as $removed_attachment):
                    wp_delete_attachment( $removed_attachment, true );
                    delete_post_meta($postID, 'thumbnail_id', $removed_attachment);
                    if ($postID_AR != null ):
                        delete_post_meta($postID_AR, 'thumbnail_id', $removed_attachment);
                    endif;
                endforeach;

            endif;

        endif;

        if(empty( $reg_errors->errors )){

            $response['status'] = 'success';
            $response['message'] = __('property updated successfully.', 'sand');
            return $response;
        }

}

function sand_delete_property($id){
    $lang = pll_get_post_language($id);
    $otherLang = ( $lang == 'ar' ) ? 'en':'ar';
    $otherLangID = pll_get_post($id, $otherLang);

    $result = wp_delete_post($id);
    if ( $result == null || $result == false ):
        $response['status'] = 'error';
        $response['message'] = __('Error during deletion of property.','sand');
        return $response;
    else:
        // if there is another page containing translation delete it
        if ( $otherLangID != false ):

            $result = wp_delete_post( $otherLangID );
            if ( $result == null || $result == false ):
                $response['status'] = 'error';
                $response['message'] = __('Error during deletion of the translated property.','sand');
                return $response;
                exit;
            endif;

        endif;
        // if reached here then deletion successfully done so redirect
        $args = array(
            'meta_key' => '_wp_page_template',
            'meta_value' => 'page-agent_propList.php'
        );
        $pg = get_pages($args)[0];
        $pageURL = get_permalink( $pg->ID );
        wp_redirect( $pageURL );
    endif;
}

/**********************************************************************************
forget password
************************************************************************************/


function sand_forget_password( $post_data )  {
    global $reg_errors;
    $reg_errors = new WP_Error;

    $email = sanitize_email($post_data['email']);

    if ( !email_exists( $email ) ){
        $reg_errors->add('email', __('Sorry, that Email address is not exist!','sand') );
        return;
    }

    $user = get_user_by('email',$email);
    $rp_key = get_password_reset_key( $user );

    $user_login = $user->user_login;
    $user_name = $user->first_name . ' ' . $user->last_name;

    sand_send_reset_password_mail($user_name,$email,$user_login,$rp_key);

    $response = array(
        'status' => 'success',
        'data'   => __('Reset Password email has been sent to your email address, please cehck your inbox.','sand')
    );
    return $response;
    wp_die();
}
function sand_reset_password($post_data){

    $rp_key = property_clean($_GET['key']);
    $user_login = property_clean($_GET['login']);
    $err_msg = new WP_Error();
    if ( !username_exists( $user_login ) ){
        $err_msg->add('user_not_exist', __('Sorry, this user is not exist. Please request a new reset email and try again.','sand') );
    }
    $check = check_password_reset_key($rp_key,$user_login);
    if (!$check || is_wp_error($check)) {
        if ($check && 'expired_key' == $check->get_error_code()) {
            $fatal_error = true;
            $err_msg->add('password_expired_key', __('Sorry, this reset-key is not valid anymore. Please request a new reset email and try again.', 'sand'));
        } else {
            $fatal_error = true;
            $err_msg->add('password_invalid_key', __('Sorry, we did not find a valid reset-key. Please request a new reset email and try again.', 'sand'));
        }
    }
    if( empty($_POST['password']) || ( $_POST['password'] !== $_POST['re_password'] ) ){
        $fatal_error = true;
        $err_msg->add( 'password_mismatch', __('Password mismatch', 'sand'));
    }
    if(!empty( $err_msg->errors )){
        return $err_msg;
        wp_die();
    }
    wp_set_password($_POST['password'] , get_user_by('login',$user_login)->ID);
    $response = array(
        'status'  => 'success',
        'data'    => __('Password has been changed successfully.', 'sand')
    );
    return $response;
    wp_die();

 }

//region admin login

add_action( 'login_enqueue_scripts', 'admin_login_logo' );
function admin_login_logo() { ?>
    <style type="text/css">
        #login h1, .login h1{
            background: #263844!important;
            padding: 10px;
        }
        #login h1 a, .login h1 a {
            background-image: url(<?php echo get_option('sand_header_logo_img'); ?>);
            width: auto;
            
            height: 75px;
            background-size: contain;
            margin: 0 auto;
        }
        p#nav>a{
            display: none;
        }
        .login form{
            background: #000!important;
        }
        .login label{
            font-weight: 600!important;
            color: #fff!important;
        }
        .wp-core-ui p .button {
            background: #263844;
            border-color: #263844;
        }
        .wp-core-ui .button-primary.focus, .wp-core-ui .button-primary.hover, .wp-core-ui .button-primary:focus, .wp-core-ui .button-primary:hover {
            background: #b68d56!important;
            border-color: #b68d56!important;
        }
        #login-message, .message, #login_error{
            background-color: #000 !important;
            color:white;
        }
        form#language-switcher input.button {
            background: #263844;
            border-color: #263844;
            color: white;
        }
        form#language-switcher input.button:hover,
        #wp-submit:hover {
            background: #fff!important;
            border-color: #263844!important;
            color:#263844!important;
        }
    </style>
<?php }

add_action('admin_bar_menu', 'remove_wp_logo', 999);
function remove_wp_logo($wp_admin_bar) {
    $wp_admin_bar->remove_node('wp-logo');
}

add_filter('admin_footer_text', 'change_footer_admin');
function change_footer_admin() {
    echo '<span id="footer-thankyou"><a href="https://codzilla.net/" target="_blank">Codezilla</a></span>';
}

add_filter( 'login_headerurl', 'sand_login_logo_url' );
function sand_login_logo_url() {
    return home_url();
}

add_filter( 'login_headertext', 'sand_login_logo_url_title' );
function sand_login_logo_url_title() {
    $text = get_bloginfo( 'name' ) . ' | ' . get_bloginfo( 'description' );
    return $text;
}

//endregion admin login

function does_url_exists($url) {
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_NOBODY, true);
    curl_exec($ch);
    $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    if ($code == 200) {
        $status = true;
    } else {
        $status = false;
    }
    curl_close($ch);
    return $status;
}

?>
