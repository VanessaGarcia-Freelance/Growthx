  <?php while (have_posts()) : the_post(); ?>
  
  <?php if (has_post_thumbnail( $post->ID ) ): ?>
  <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); 
  ?>
  <?php endif; ?>
  <?php 
    $quotes = types_child_posts("quote");
    $galleryImages = types_child_posts("gallery");

    ?>


  <article class="story">
    <header class="border" style="background-image: url('<?php echo $image[0]; ?>')">
      <div>
        <div class="col-sm-6 col-sm-offset-1">
          <h1 class="entry-title"><?php the_title(); ?></h1>
        </div>
      </div>
    </header>

    <div class="meta-bar">
    <div class="back-to-blog col-sm-offset-1"><a href="/blog"> < Back to Blog</a></div>
    <div class="meta col-sm-4 col-sm-offset-4">
      <?php echo get_avatar( $post->post_author, 52 ); ?>
      <?php get_template_part('templates/entry-meta'); ?>
    </div>
    </div>

     <div class="entry-content">
      <?php the_content(); ?>

      <!-- <h4>Quotes</h4> -->
      <?php 
        //using a for loop for now. Will need to break these into individual blocks then insert them throughout the content.

      if($quotes){

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
      }
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
    <div class="share-bar container-fluid">
      <div class="row">
      <?php echo do_shortcode( '[SSB_SHARE class_first="" class_second="" class_link="" class_icon="" layout="square" remove_inside="0" remove_counter="0"]' );  ?>
      </div>
    </div>
    

    <div class="related-posts container-fluid">
      <div class="row">
        <div class="posts-container col-sm-8 col-sm-offset-2">
        <h2>OTHER POSTS YOU’LL LIKE</h2>

        <div class="posts">
          <?php $orig_post = $post;
            global $post;
            $categories = get_the_category($post->ID);
            if ($categories) {
            $category_ids = array();
            foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;
            $args=array(
            'category__in' => $category_ids,
            'post__not_in' => array($post->ID),
            'posts_per_page'=> 5, // Number of related posts that will be displayed.
            'caller_get_posts'=>1,
            'orderby'=>'rand' // Randomize the posts
            );
            $my_query = new wp_query( $args );
            if( $my_query->have_posts() ) {
            // echo '<div id="perfect-related_by-category" class="clear"><h3>Related Posts</h3><ul>';
            while( $my_query->have_posts() ) {
            $my_query->the_post(); ?>
            <li>
             <a href="<?php the_permalink()?>" rel="bookmark" title="<?php the_title(); ?>">
             </a>
             <div class="perfect-related_by-category">
              <span class="thumb-wrap">
                <a href="<? the_permalink()?>" rel="bookmark" title="<?php the_title(); ?>">
                <?php /*echo get_avatar( $post->post_author, 70 );*/ ?>
                <?php echo the_post_thumbnail( array(70, 70)  ); ?></a>
              </span>
               <a href="<? the_permalink()?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a>
             </div>
            </li>
            <? }
            echo '</ul></div>';
            } }
            $post = $orig_post;
            wp_reset_query(); ?>
        </div>

        </div>
      </div>

    </div>

    <footer>
      <?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
    </footer>
    <?php //comments_template('/templates/comments.php'); ?>
  </article>
<?php endwhile; ?>
