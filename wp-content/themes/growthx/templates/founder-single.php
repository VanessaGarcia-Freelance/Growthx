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

    <header style="background-image: url( <?php printf($headerImage);  ?> )">
      <h1><?php printf($headerText);  ?></h1>
      <!-- <h1 class="entry-title"><?php the_title(); ?></h1> -->
    </header>
    <div class="entry-content">
      <?php printf($storyContent); ?>

       <hr/><br/>

      <div class="gallery">
      <h4>Gallery</h4>
        <?php 
          foreach ($galleryImages as $slide) {
            $image = $slide ->fields['gallery-image'];
            $caption = $slide ->fields['image-caption'];

              //echo $image;
            echo "<div class='slide'>";
            echo "<img src='" . $image . "' />";
            echo "<caption>" . $caption . "</caption>";
            echo "</div>";

          }
        ?>
      </div>

      <hr/><br/>


      <h4>Quotes</h4>

      <?php 
        // using a for loop for now. Will need to break these into individual blocks then insert them throughout the content.
        foreach ($quotes as $quote) {
          $quoteStyle = $quote->fields['quote-style'];
      ?>
        <blockquote class=="<?php $quote->fields['quote-style']; ?>">
      <?php
        // will set this later to a class name
          if($quoteStyle == 4) {    
            echo "<img src='" . $quote->fields['quote-image'] . "' />"; 
          }
          echo $quote->fields['quote-text'];
      ?>
        </blockquote> 
      <?php  
        }
      ?>

    </div>
    <footer>
      <?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
    </footer>
  </article>
<?php endwhile; ?>
