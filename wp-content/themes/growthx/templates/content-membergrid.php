<div class="membergrid ri-grid ri-grid-size-3">
  <img class="ri-loading-image" src="http://tympanus.net/Development/AnimatedResponsiveImageGrid/images/loading.gif"/>

  <ul>
  <?php 
      $args = array( 'post_type' => 'member', 'posts_per_page' => -1, 'post_status' => 'published' );
      //Define the loop based on arguments
    $loop = new WP_Query( $args );
     
    //Display the contents 
    while ( $loop->have_posts() ) : $loop->the_post();
      $fieldArray = array( "user_id" => $recent["ID"] );
      $headshot = types_render_field( "headshot", array( "url" => "true", "proportional" => "true" ) );
      $parent_id = wpcf_pr_post_get_belongs(get_the_ID(), 'growthx-company');
      $targetUrl = get_permalink();

      if(!empty($parent_id)) {
          $founderStory = types_render_field("founder-story", array( "post_id" => $parent_id, "show_name" => true, 'checked'=>true));

          if(!empty($founderStory)){
            $targetUrl = get_permalink($parent_id);
          }
      }
    ?>
    <li>
      <a class="member" href="<?php echo $targetUrl; ?>">
        <img src="<?php printf($headshot);  ?>"/>
        <div class="text">
          <p class="name"><?php the_title(); ?></p>
          <?php 
            if (!empty($founderStory)) :
              $parent_url = get_permalink($parent_id); ?>
            <p class="f-story">View Founder Story</p>
          <?php endif; ?>
        </div>
      </a>
    </li>

  <?php endwhile;?>
  wp_reset_postdata();

</ul>
</div>

