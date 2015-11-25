<?php
    $parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
    require_once( $parse_uri[0] . 'wp-load.php' );
    $memberID = $_REQUEST['action'];
    $post = get_post($memberID);

    $fieldArray = array( "post_id" => $memberID );

//Headshot URL
    $profileImg = types_render_field( "headshot", array( "post_id" => $memberID, "url" => true ) );
//WideImage URL
    $wideImage = types_render_field( "wide-image", array( "post_id" => $memberID, "url" => true ) );
//Name (Title)
    $title = $post->post_title;

//if connected to a Company
    $parent_id = wpcf_pr_post_get_belongs($memberID, 'growthx-company');
    if(!empty($parent_id)) {
        $parentPost = get_post($parent_id);
//Company
        $company = $parentPost->post_title;
    }     
//Email
    $email = types_render_field("email", array( $fieldArray ));
//Angellist
    $angellist = types_render_field("angellist-url", array( "post_id" => $memberID, 'title' => "AngelList", "target" => "blank" ));
//Twitter
     $twitter = types_render_field("twitter-url", array( "post_id" => $memberID, 'title' => "Twitter", "target" => "blank" ));
//LinkedIn
    $linkedIn = types_render_field("linkedin-url", array( "post_id" => $memberID, 'title' => "LinkedIn", "target" => "blank" ));
//Bio
    $bio = types_render_field( "bio", array( $fieldArray ) );

   
   $memberInfo = array(
        "Headshot"   => $profileImg,
        "Wideimage"  => $wideImage,
        "Name"       => $title,
        "Company"    => $company,
        "Email"      => $email,
        "Angellist"  => $angellist,
        "Twitter"    => $twitter,
        "Linkedin"   => $linkedIn,
        "Bio"        => $bio
    );

   //var_dump($memberInfo);
   print json_encode($memberInfo, false );
   //echo '["' . implode('", "', $memberInfo) . '"]'

   

?>
