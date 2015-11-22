  <?php while (have_posts()) : the_post(); ?>
  
  <?php if (has_post_thumbnail( $post->ID ) ): ?>
  <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); 
  
    $quotes = types_child_posts("quote");
    $galleryImages = types_child_posts("gallery");

    ?>
  <?php endif; ?>


  <article class="story">
    <header class="border" style="background-image: url('<?php echo $image[0]; ?>')">
      <div>
        <div class="col-sm-6 col-sm-offset-1">
          <h1 class="entry-title"><?php the_title(); ?></h1>
      <?php //get_template_part('templates/entry-meta'); ?>
        </div>
      </div>
    </header>

     <div class="entry-content">
      <?php the_content(); ?>

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
    <?php //comments_template('/templates/comments.php'); ?>
  </article>
<?php endwhile; ?>
