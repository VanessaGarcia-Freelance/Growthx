<div class="membergrid">
<h2>Member Grid</h2>
  <?php 
 
  //Define your custom post type name in the arguments
  $args = array('post_type' => 'gcompany');
   
  //Define the members based on arguments
  $members = new WP_Query( $args );
   
  //Display the contents 
  //while ( $members->have_posts() ) : $members->the_post();
  foreach ($members as $member) {
    $memberName = $members->fields['title'];

  ?>

  <!-- <div class="member"><img src="#"/><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></div> -->
  <?php //endwhile;?>
  <?php } ?>
</div>
