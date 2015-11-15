<script type="text/javascript">
    var stylesheet_directory_uri = "<?php echo get_stylesheet_directory_uri(); ?>";
</script>

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/page', 'header'); ?>
  <?php get_template_part('templates/content', 'page'); ?>
<?php endwhile; ?>
