<?php while (have_posts()) : the_post(); ?>
  <article class="story">
  <?php 
    $postid = get_the_ID();
    $fieldArray = array( "user_id" => $postid );
    $headerText = types_render_field( "header-text", $fieldArray );
    $headerImage = types_render_field( "header-image", array( "url" => "true", "proportional" => "true" ) );
    $storyContent = types_render_field("story-content", array( "output" => "html" ));
    $quotes = types_child_posts("quote");
    $galleryImages = types_child_posts("gallery");
  ?>

    <header class="border" style="background-image: url( <?php printf($headerImage);  ?> )">
      <div>
        <div class="col-sm-6 col-sm-offset-1">
          <!-- <h1 class="entry-title"><?php the_title(); ?></h1> -->
          <h1><?php printf($headerText);  ?></h1>
        </div>
      </div>
    </header>


    <div class="entry-content">
      <?php printf($storyContent); ?>

      <!-- <h4>Quotes</h4> -->
      <?php 
        //using a for loop for now. Will need to break these into individual blocks then insert them throughout the content.
        foreach ($quotes as $quote) :
          $quoteStyle = $quote->fields['quote-style'];
      ?>
        <div class="row quote <?php if($quote->fields['quote-style'] == 'border-left' || $quote->fields['quote-style'] == 'border-right'){echo 'quote-border';}  ?>" data-position="<?php echo $quote->fields['position'] ?>">
            <blockquote class="<?php echo $quote->fields['quote-style'] ?>">
          <?php
            // will set this later to a class name
              if($quoteStyle == 4) {    
                echo "<img src='" . $quote->fields['quote-image'] . "' />"; 
              }
              echo $quote->fields['quote-text'];
          ?>
            </blockquote> 
        </div>
      <?php  
        endforeach;
      ?>

     <!-- <h4>Gallery</h4> -->
      <?php if (sizeof($galleryImages) > 0) : ?>
      <div class="gallery-container">
        <div id="carousel-founder" class="carousel slide" data-ride="carousel">

          <div class="carousel-inner" role="listbox">
            <?php 
              $active = ' active';
              foreach ($galleryImages as $slide) {
                $image = $slide ->fields['gallery-image'];
                $caption = $slide ->fields['image-caption'];
                echo "<div class='slide item ".$active."' style='background-image: url(" . $image . ")' >";
                echo "<div class='border'>";
                echo "<div class='caption-container'>";
                echo "<div class='caption'><h4>" . $caption . "</h4></div>";
                echo "</div>";
                echo "</div>";
                echo "</div>";

                $active = '';
              }
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
      <?php endif; ?>

      <?php get_template_part('templates/content', 'relatedfounder'); ?>

      <div class="community-forward">
          <a href="/community">LEARN MORE ABOUT THE COMMUNITY</a>
      </div>

    </div> 
    
    <footer>
      <?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
    </footer>
  </article>
  <?php the_content(); ?>
<?php endwhile; ?>
 <?php wp_reset_postdata(); ?>

