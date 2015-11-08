<?php
/**
 * Template Name: Home Template
 */
?>

<?php while (have_posts()) : the_post(); ?>
  <?php //get_template_part('templates/page', 'header'); ?>

  <?php get_template_part('templates/content', 'membergrid'); ?>

  <div class="home-headline row">
    <div class="col-sm-12">
        <h1> We Are GrowthX </h1>
        <h2>A new type of venture capital built on community</h2>
        <button>Meet Our Community</button>
    </div>
  </div>


  <div class="lastest-blog-post row">
    <?php
        $args = array( 'numberposts' => '1' );
        $recent_posts = wp_get_recent_posts( $args );
        foreach( $recent_posts as $recent ){
            echo '<div class="col-sm-8">';
            //echo '<img src="#" />';
            echo '<h2><a href="' . get_permalink($recent["ID"]) . '">' .   $recent["post_title"].'</a></h2> ';
            echo '<p class="readmore"><a href="' . get_permalink($recent["ID"]) . '">Read Our Blog</a></p>';
            echo '</div>';
        }
    ?>
  </div>

  <div class="latest-founder-story row">
    <?php 
      $args = array( 'post_type' => 'profile', 'numberposts' => '1' );
      $recent_posts = wp_get_recent_posts( $args );
      foreach( $recent_posts as $recent ){
        $fieldArray = array( "user_id" => $recent["ID"] );
        $headerText = types_render_field( "header-text", $fieldArray );
        $headerImage = types_render_field( "header-image", array( "url" => "true", "proportional" => "true" ) );

        ?>

        <div class="story-entry container" style="background-image: url( <?php printf($headerImage);  ?> )">
          <div class="row">
          <div class="col-sm-6 col-sm-offset-6">
          <h1><?php printf($headerText);  ?></h1>
          <p class="readmore"><a href="' . get_permalink($recent["ID"]) . '">Read the Founder Story</a></p>
          </div>
          </div>
        </div>

     <?php      
      }
    ?>
  </div>


  <?php get_template_part('templates/content', 'page'); ?>
<?php endwhile; ?>
