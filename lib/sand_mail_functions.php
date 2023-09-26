<?php
function sand_res_fromemail($email) {
$sandfrom = get_option( 'admin_email' );

return $sandfrom;
}

function sand_res_fromname($email){
$sandfrom = get_option('blogname');
return $sandfrom;
}

add_filter('wp_mail_from', 'sand_res_fromemail');
add_filter('wp_mail_from_name', 'sand_res_fromname');

function send_new_property_request_admin_email( $admin_mail ,$name , $email , $phone , $message , $property_id ){
    $logo_dark = get_option('sand_dark_logo');
    $property = get_post($property_id);
    $to = get_option('sand_email');
    $subject = 'sand - Request about '.$property->post_title;
    $body = '
        <html>
            <head>
                <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
            </head>
            <body>
                <table style="font-family: Verdana,sans-serif; font-size: 13px; color: #374953; width: 700px;margin: auto;border: 1px solid #dddddd;padding: 70px 30px;">
                  <tr>
                    <td align="left"><a href="'.sand_BlogUrl.'" title="sand"><img src="'.$logo_dark.'" alt="sand Logo" style="width: 200px;display: block;margin: auto;" ></a></td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td><h2 style="background-color: #D6A665; color:#FFF; font-weight: bold; padding: 1em 1em;text-align:center">New property request exploration</h2></td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td align="left"><h3>Hello Admin,</h3></td>
                  </tr>
                  <tr>
                    <td><p>You\'ve recieved a new property request exploration on your website </p></td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td>
                        <p> Property name: <a href="'.get_the_permalink($property_id).'">'. $property->post_title .'</a></p>
                        <p> Name: '. $name .'</p>
                        <p> Email: '. $email .'</p>
                        <p> Phone: '. $phone .'</p>
                        <p> Message: '. $message .'</p>

                    </td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td align="center" style="font-size: 15px;border-top: 1px solid #dddddd;padding: 10px;">
                        <p><i>Thank you!</i><br/><b>sand.</b></p>
                    </td>
                  </tr>
                </table>
            </body>
        </html>';
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-Type: text/html; charset=UTF-8' . "\r\n";
    $headers .= 'From: info@sand.com' . "\r\n";
    wp_mail( $to, $subject, $body, $headers );
}

function sand_send_reset_password_mail($name,$email,$login,$rp_key){

    $args = array(

        'meta_key' => '_wp_page_template',

        'meta_value' => 'page-reset-password.php'

    );

    $forget_password = get_pages($args)[0];
    $link = get_the_permalink($forget_password->ID).'?key='.$rp_key.'&login='.rawurlencode($login);
    $to = $email;
    $subject = 'sand - Reset Your Password.';
    $body = '
        <html>
            <head>
                <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
            </head>
            <body>
                <table style="font-family: Verdana,sans-serif; font-size: 13px; color: #374953; width: 600px;margin: auto;border: 1px solid #0e1c2c;padding: 70px 30px;">
                  <tr>
                    <td align="left"><a href="'.sand_BlogUrl.'" title="sand"><img src="'.sand_BlogUrl.'/wp-content/themes/sand/assets/images/sand-Logo.png" alt="sand Logo" style="width: 200px;display: block;margin: auto;" ></a></td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td><h2 style="background-color: #D6A665; color:#FFF; font-weight: bold; padding: 1em 1em;text-align:center">Reset Your Password</h2></td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td align="left"><h3>Hello '.$name.',</h3></td>
                  </tr>
                  <tr>
                    <td><p>you request a reset password ,please follow this link :</p><br><p><a href="'.$link.'" target="blank">'.$link.'</a></p></td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td align="center" style="font-size: 15px;border-top: 1px solid #0e1c2c;padding: 10px;">
                        <p><i>Thank you!</i><br/><b>sand - Real Estate Consultancy.</b></p>
                    </td>
                  </tr>
                </table>
            </body>
        </html>';
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-Type: text/html; charset=UTF-8' . "\r\n";
    $headers .= 'From: info@sand.com' . "\r\n";
    wp_mail( $to, $subject, $body, $headers );
}
