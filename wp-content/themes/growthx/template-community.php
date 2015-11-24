<?php
/**
 * Template Name: Community Template
 */
?>

<script>
  var templateDir = "<?php echo get_stylesheet_directory_uri() ?>";

</script>

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/page', 'header'); ?>

  <?php get_template_part('templates/content', 'membergrid'); ?>
  
  <?php get_template_part('templates/content', 'page'); ?>

  <?php get_template_part('templates/content', 'relatedfounder'); ?>

  
<?php endwhile; ?>
