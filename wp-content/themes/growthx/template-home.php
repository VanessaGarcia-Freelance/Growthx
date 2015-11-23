<?php
/**
 * Template Name: Home Template
 */
?>

<?php while (have_posts()) : the_post(); ?>

  <?php get_template_part('templates/page', 'header'); ?> <?php 
    //get_template_part('templates/content', 'membergrid');
    ?>
<div id="tempgrid" class="  ">
  <div style="overflow:hidden;background:#333333;">
  <?php 
    echo tempgrid(32,8);
  ?>
  </div>
</div>



  <!-- LATEST BLOG POSTS -->
  <div class="lastest-blog-posts container-fluid">
    <div class="featured-post col-sm-offset-1 col-sm-10">
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

    <div class="post-carousel col-sm-offset-1 col-sm-10">
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
  <div class="latest-founder-story container-fluid">
    <div class="founder-carousel row">

        <div id="carousel-founder" class="carousel slide" data-ride="carousel">

          <div class="carousel-inner" role="listbox">

            <?php 
              //grab all posts
              $args = array( 'post_type' => 'growthx-company', 'posts_per_page' => -1 );

              //Define the loop based on arguments
              $loop = new WP_Query( $args );
              $active = ' active';
              $entry = 0;
             
            //loop through entries
            while ( $loop->have_posts() ) : $loop->the_post();
              $fieldArray = array( "user_id" => $recent["ID"] );
              $founderStory = types_render_field( "founder-story", $fieldArray );

              //if entry has a founder story and there is less than 3 slides created
              if(!empty($founderStory) && $entry < 3) :
                $headerText = types_render_field( "header-text", $fieldArray );
                $headerImage = types_render_field( "header-image", array( "url" => "true", "proportional" => "true" ) );
                ?>
                
                <!-- create a new slide -->
                 <div class="item <?php echo $active; ?>">
                  <div class="story-entry " style="background-image: url( <?php printf($headerImage);  ?> );">
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
                </div>

                <?php
                $entry++;
              endif;
            ?>
           

          <?php 
            $active = '';
            endwhile;
          ?>
          </div><!-- end carousel-inner -->

          <!-- Controls -->
          <a class="left carousel-control" href="#carousel-founder" role="button" data-slide="prev" style="background: url(<?php echo get_stylesheet_directory_uri(); ?>/assets/images/white-arrow-left.png) no-repeat center center;">
            <span class="" aria-hidden="true"> </span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="right carousel-control" href="#carousel-founder" role="button" data-slide="next" style="background: url(<?php echo get_stylesheet_directory_uri(); ?>/assets/images/white-arrow-right.png) no-repeat center center;">
            <span class="" aria-hidden="true"> </span>
            <span class="sr-only">Next</span>
          </a>
        </div><!-- end carousel -->
    </div>
  </div>


  <?php get_template_part('templates/content', 'page'); ?>
<?php endwhile; ?>