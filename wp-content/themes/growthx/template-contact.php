<?php
/**
 * Template Name: Contact Template
 */
?>

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/page', 'header'); ?>

  <div class="social container-fluid">
    <div class="col-sm-12">
    <?php
        if (has_nav_menu('social')) :
          wp_nav_menu(['theme_location' => 'social', 'menu_class' => 'nav navbar-nav']);
        endif;
    ?>
    </div>
  </div>

  <?php get_template_part('templates/content', 'page'); ?>
<?php endwhile; ?>
