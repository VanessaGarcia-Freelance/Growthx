<?php
/**
 * Sage includes
 *
 * The $sage_includes array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 *
 * Please note that missing files will produce a fatal error.
 *
 * @link https://github.com/roots/sage/pull/1042
 */
$sage_includes = [
  'lib/assets.php',  // Scripts and stylesheets
  'lib/extras.php',  // Custom functions
  'lib/setup.php',   // Theme setup
  'lib/titles.php',  // Page titles
  'lib/wrapper.php'  // Theme wrapper class
];

foreach ($sage_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'sage'), $file), E_USER_ERROR);
  }

  require_once $filepath;
}
unset($file, $filepath);


//using SVGs inside the media library
function svg_mime_types( $mimes ){
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;}
add_filter( 'upload_mimes', 'svg_mime_types' );



//filtering search just for blog posts at the moment
function searchfilter($query) {
  if ($query->is_search && !is_admin() ) {
    $query->set('post_type',array('post'));
  }
  return $query;
}

add_filter('pre_get_posts','searchfilter');

/* TEMP HOMEPAGE GRID FILTER */

function tempgrid($totalimages,$columns=8) {
  $rows = $totalimages/$columns;
  $height = 640/$rows;
  $width = 100/$columns;
  $i=1;
  $output = '<style>.home .page-header > div {border: 5px solid #f2f3f1;min-height: 620px;}ul.tempgrid,ul.tempgrid li{padding:0px;margin:0px;list-style-type:none;-webkit-filter:grayscale(100%);filter: grayscale(100%);opacity:.5;}</style>';
  $output .= '<ul class="tempgrid">';
   while ($i <= $totalimages) {
     $output .= '<li style="height:'.$height.'px;width:'.$width.'%;margin:0px;float:left;padding:0px;background:url('.get_stylesheet_directory_uri().'/assets/images/grid-'.$i.'.jpg) no-repeat center center;background-size:cover;">
      <a class="member" href="/community"></a></li>';
    $i++;
  }
  return $output . '</ul>';
}