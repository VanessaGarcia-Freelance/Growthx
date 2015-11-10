<?php use Roots\Sage\Titles; ?>

<?php
  $bgimg = "";

  $pageHeadline = types_render_field( "page-headline", array( ) );
  $pageSubheading = types_render_field( "page-subheading", array( ) );
  $pageHeaderImage = types_render_field("page-header-image", array( "output" => "raw" ));
  $pageLink = types_render_field("header-include-link", array());

  //if image was provided for the background, add a class to change the text color to white. Defualts to black.
  if($pageHeaderImage) {
    $bgimg = "bgImg";
  }

  //page link exists, grab the values for the link
  if($pageLink == "1") {
    $pageLinkText = types_render_field( "header-link-text", array( ) );
    $pageLinkUrl = types_render_field("header-link-url", array("output" => "raw" ));
  }
?>

<div class="page-header row <?php echo $bgimg; ?>" style="background-image: url(<?php printf($pageHeaderImage); ?>)">
  <!-- <h1><?= Titles\title(); ?></h1> -->
  <div class="col-sm-8 col-sm-offset-1">
    <div class="heading-content">
      <h1><?php print_r($pageHeadline); ?></h1>
      <h2><?php print_r($pageSubheading); ?></h2>
    </div>
  </div>
</div>
