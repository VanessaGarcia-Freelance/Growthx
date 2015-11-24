 <div class="related-founders container-fluid">
  <div class="row">
    <div class="posts-container col-sm-10 col-sm-offset-1">

    <div class="posts">
      <?php 

        $page = $wp_query->query_vars["pagename"];
        wp_reset_query();

        if($page === "community"){
          //grab all posts
          $args = array( 'post_type' => 'growthx-company', 'posts_per_page' => -1, 'orderby'=>'rand' );
        }
        else {
           //grab all posts, minus the post that is currently being viewed
          $args = array( 'post_type' => 'growthx-company', 'posts_per_page' => -1, 'orderby'=>'rand', 'post__not_in' => array($post->ID) );
        }

        //Define the loop based on arguments
        $loop = new WP_Query( $args );
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
          
        <div class="col-sm-4 post">
          <div class="img" style="background-image:url('<?php printf($headerImage);  ?>')">
          </div>
          <div class="">
            <h2><a href="<?php the_permalink() ?>"><?php echo $headerText; ?></a></h2>
          </div>
        </div>


      <?php

      //limit to 3 founder stories unless it's the community page
      if($page !== "community") {
        $entry++;
      }

      endif;
      endwhile;
            
        wp_reset_query(); ?>
    </div>

    </div>
  </div>

</div>

