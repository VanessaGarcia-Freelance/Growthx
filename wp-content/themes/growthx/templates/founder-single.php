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
        <div class="row quote">
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
          <?php 
            foreach ($galleryImages as $slide) {
              $image = $slide ->fields['gallery-image'];
              $caption = $slide ->fields['image-caption'];
              echo "<div class='slide' style='background-image: url(" . $image . ")' >";
              echo "<div class='border'>";
              echo "<div class='caption-container'>";
              echo "<div class='caption'><h4>" . $caption . "</h4></div>";
              echo "</div>";
              echo "</div>";
              echo "</div>";
            }
          ?>
      </div>
      <?php endif; ?>
    
    </div>
    <footer>
      <?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
    </footer>
  </article>
<?php endwhile; ?>
