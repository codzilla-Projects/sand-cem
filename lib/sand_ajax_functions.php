<?php
function sand_ajax_header(){
  echo '<script type="text/javascript">  var ajax_url="'.admin_url('admin-ajax.php' ).'";var ajax_is_running = 0; var post_first_ajax_is_running = 0; var nonce = "'.wp_create_nonce("sand_nonce").'"; </script>';
}
add_action('wp_head','sand_ajax_header' );


function sand_edit_gallery_ajax(){

    $post_id  = $_POST['postId'] ;
    $images =  get_post_meta($post_id,'thumbnail_id');
    $output = '';
    ob_start();

    $output = ob_get_contents();
    ob_end_clean();
    $response = array(
      'type' => 'success',
      'data' => $output,
      'max' => $post_counts
    );


    echo json_encode( $response );
    wp_die();
}

add_action('wp_ajax_nopriv_sand_edit_gallery_ajax', 'sand_edit_gallery_ajax');
add_action('wp_ajax_sand_edit_gallery_ajax', 'sand_edit_gallery_ajax');

