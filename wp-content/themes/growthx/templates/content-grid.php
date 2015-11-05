<div class="grid">
  <h4>Profiles</h4>
  <?php 
 
      //Define your custom post type name in the arguments
   
  $args = array('post_type' => 'profile');
   
  //Define the loop based on arguments
   
  $loop = new WP_Query( $args );
   
  //Display the contents
   
  while ( $loop->have_posts() ) : $loop->the_post();
  ?>
  <p><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></p>
  <?php endwhile;?>

</div>
