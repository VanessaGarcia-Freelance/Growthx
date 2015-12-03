

<div id="ri-grid" class="membergrid ri-grid ri-grid-size-3">
  <img class="ri-loading-image" src="http://growthx1.wpengine.com/wp-content/uploads/2015/11/loading.gif"/>

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
      $targetUrl = '';//get_the_ID(); //get_permalink(); 
      $memberId = get_the_ID(); //'bio-modal';

      if(!empty($parent_id)) {
          $founderStory = types_render_field("founder-story", array( "post_id" => $parent_id, "show_name" => true, 'checked'=>true));

          if(!empty($founderStory)){
            $targetUrl = get_permalink($parent_id);
            //$class = '';
          }
      }
    ?>
    <li>
      <a class="member bio-modal" data-url="<?php echo $memberId; ?>" href="<?php echo $targetUrl; ?>">
        <img src="<?php printf($headshot);  ?>"/>
        <div class="text">

          <p class="name"><?php the_title(); ?></p>
          <?php 
            if (!empty($founderStory)) :
              $parent_url = get_permalink($parent_id); ?>
            <p class="f-story">Founder Story</p>
          <?php else: ?>
            <p class="bio-link">Bio</p>
          <?php endif; ?>
        </div>
      </a>
    </li>

  <?php endwhile;?>
  <?php wp_reset_postdata(); ?>

</ul>
</div>

<div class="modal member">
  <div class="modal-container container-fluid">
    <div class="close">Close</div>
    <div class="modal-header col-sm-12">
      <div class="modal-image">
      </div>
      <div>
        <h1 class="name">Name</h1>
        <h2 class="company">Company</h2>
      </div>
    </div>

    <div class="bio-content col-sm-10 col-sm-offset-1">
      <div class="links">
        <ul>
        </ul>
      </div>
      <div class="bio col-sm-12">
      </div>
    </div>
  </div>
</div>
