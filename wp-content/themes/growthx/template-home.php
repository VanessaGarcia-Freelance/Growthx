<?php
/**
 * Template Name: Home Template
 */
?>

<?php while (have_posts()) : the_post(); ?>

  <!-- Commenting out the Member Grid for now -->
  <?php //get_template_part('templates/content', 'membergrid'); ?>

  <?php get_template_part('templates/page', 'header'); ?>


  <!-- LATEST BLOG POSTS -->
  <div class="lastest-blog-posts row">
    <div class="featured-post row col-sm-offset-1 col-sm-10">
      <?php
          $args = array( 'numberposts' => '1', 'orderby' => 'post_date',
    'order' => 'ASC' );
          $recent_posts = wp_get_recent_posts( $args );
          foreach( $recent_posts as $recent ){
              echo '<div class="col-sm-7">';
              //echo '<img src="#" />';
              echo '<h2><a href="' . get_permalink($recent["ID"]) . '">' .   $recent["post_title"].'</a></h2> ';
              echo '<p class="readmore"><a href="' . get_permalink($recent["ID"]) . '">Read Our Blog</a></p>';
              echo '</div>';
          }
      ?>
    </div>

    <div class="post-carousel row col-sm-offset-1 col-sm-10">
      <?php
          $args = array( 'numberposts' => '3' );
          $recent_posts = wp_get_recent_posts( $args );
          foreach( $recent_posts as $recent ){
              echo '<div class="col-sm-4">';
              //echo '<img src="#" />';
              echo '<h2><a href="' . get_permalink($recent["ID"]) . '">' .   $recent["post_title"].'</a></h2> ';
              echo '<p class="readmore"><a href="' . get_permalink($recent["ID"]) . '">Read Our Blog</a></p>';
              echo '</div>';
          }
      ?>
    </div>
  </div>


  <!-- Latest Founder Stories --> 
  <div class="latest-founder-story container">
    <div class="founder-carousel row">

    <?php 
      $args = array( 'post_type' => 'profile', 'posts_per_page' => '1' );
      //Define the loop based on arguments
    $loop = new WP_Query( $args );
     
    //Display the contents 
    while ( $loop->have_posts() ) : $loop->the_post();
      $fieldArray = array( "user_id" => $recent["ID"] );
      $headerText = types_render_field( "header-text", $fieldArray );
      $headerImage = types_render_field( "header-image", array( "url" => "true", "proportional" => "true" ) );
    ?>

    <div class="story-entry" style="background-image: url( <?php printf($headerImage);  ?> )">
      <div class="col-sm-12 border">
        <div> 
          <div class="col-sm-6 col-sm-offset-6">
            <h2><?php the_title(); ?></h2>
            <h3><?php printf($headerText);  ?></h3>
            <p class="readmore"><a href="<?php the_permalink() ?>">Read the Founder Story</a></p>
          </div>
        </div>
      </div>
    </div>

  <?php endwhile;?>
    </div>
  </div>


  <?php get_template_part('templates/content', 'page'); ?>
<?php endwhile; ?>