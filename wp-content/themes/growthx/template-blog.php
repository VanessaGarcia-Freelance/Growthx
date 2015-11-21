<?php
/**
 * Template Name: Blog Template
 */
?>

<?php while (have_posts()) : the_post(); ?>
  <?php //get_template_part('templates/page', 'header'); ?>
  <?php //get_template_part('templates/content', 'page'); ?>
<?php endwhile; ?>


<?php query_posts( array( 'posts_per_page' => -1 ) ); ?>  
 
<?php if(have_posts()): while(have_posts()): the_post(); ?>
 
    <?php $current = $wp_query->current_post; ?>

    <?php if($current == 0) : ?>
        <?php if (has_post_thumbnail( $post->ID ) ):

            $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); 
        else : 
            $image = "#";
        endif;
        ?>

        <div class="page-header container-fluid bgImg" style="background-image: url(<?php echo $image[0]; ?>)">
          <div>
            <div class="heading-content">
              <h1><?php the_title(); ?></h1>
              <p class="readmore"><a href="<?php the_permalink(); ?>">Read More</a></p>
            </div>
          </div>
        </div>

        <div class="search container-fluid">
          <?php get_search_form(); ?>
        </div>

        <div id="main-content" class="container-fluid">
            <div class="articles col-sm-offset-1 col-sm-10" >

            <?php else : ?> 
                <article <?php post_class(); ?>>
                    <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                        <!-- Need to change this message depending on blog category type -->
                        <p class="readmore"><a href="<?php the_permalink(); ?>">Read More</a></p>
                </article>
            <?php endif; ?>

            <?php endwhile; endif; ?> 
            

            <!-- Newsletter Block -->
            <div class="newsletter-block" style="background-image: url(http://growthx1.wpengine.com/wp-content/uploads/2015/11/NewsletterBackground.png)">
                <div class="newsletter-content col-sm-8 col-sm-offset-1">
                    <h2>Your community newsletter, in your inbox.</h2>
                    <h3>Stay ahead of trends, news, and resources.</h3>
                <?php echo do_shortcode('[mc4wp_form]'); ?>
                </div>
            </div>

            </div> <!-- end articles -->

        </div> <!-- end main-content -->


    

