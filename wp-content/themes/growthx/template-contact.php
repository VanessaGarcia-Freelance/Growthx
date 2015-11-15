<?php
/**
 * Template Name: Contact Template
 */
?>

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/page', 'header'); ?>

  <div class="social row">
    <div class="col-sm-12">
    <?php
        if (has_nav_menu('social')) :
          wp_nav_menu(['theme_location' => 'social', 'menu_class' => 'nav navbar-nav']);
        endif;
    ?>
    </div>
  </div>

  <div class="locations">
    <div class="row">
        <div class="col-sm-6 address">
            <div class="col-sm-offset-2">
                <h2>Palo Alto</h2>
                <h3>523 Brigade Blvd</h3>
                <p>paloalto@growthx.com</p>
                <p>(543) 342-1212</p>
            </div>
        </div>
        <div class="col-sm-6 map"><img src="http://growthx.hyperionmedia.us/wp-content/uploads/2015/11/Map01.jpg" width="100%" /></div>
    </div>
    <div class="row">
        <div class="col-sm-6 address">
            <div class="col-sm-offset-2">
                <h2>Dallas</h2>
                <h3>523 Brigade Blvd</h3>
                <p>dallas@growthx.com</p>
                <p>(543) 342-1212</p>
            </div>
        </div>
        <div class="col-sm-6 map"><img src="http://growthx.hyperionmedia.us/wp-content/uploads/2015/11/Map02.jpg" width="100%" /></div>
    </div>
  </div>

  <div class="join row">
    <div class="col-sm-4">
        <h3>Are you a co-investor?</h3>
        <button class="outline">Share your info</button>
    </div>
    <div class="col-sm-4">
        <h3>Are you a co-founder?</h3>
        <button class="outline">Apply</button>
    </div>
     <div class="col-sm-4">
        <h3>Looking for a career?</h3>
        <button class="outline">Go to Careers</button>
    </div>
  </div>

  <!-- <div class="modal">
    <div class="overlay">
      <div class="container">
        <button type="button" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <div class="form">
        <?php //get_template_part('templates/form', 'companies'); ?>
        </div>
      </div>
    </div>
  </div> -->




  <?php //get_template_part('templates/content', 'page'); ?>
<?php endwhile; ?>
