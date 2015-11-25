<?php get_template_part('templates/page', 'header'); ?>

<?php if (!have_posts()) : ?>
  <div class="alert alert-warning">
    <?php _e('Sorry, no results were found.', 'sage'); ?>
  </div>
  <div class="container">
  		<?php get_search_form(); ?>
	</div>
<?php endif; ?>

<div class="col-sm-8 col-sm-offset-2">
<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/content', 'search'); ?>
<?php endwhile; ?>
</div>

<?php the_posts_navigation(); ?>
