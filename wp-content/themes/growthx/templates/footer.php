<?php get_template_part('templates/content', 'newsletter'); ?>
<footer>
    <div class="container">
        <div class="row">
            <div class="col-sm-5">
                <nav class="navmenu">
                    <?php
                        if (has_nav_menu('footer_navigation')) :
                          wp_nav_menu(['theme_location' => 'footer_navigation', 'menu_class' => 'nav navbar-nav navbar-left']);
                        endif;
                    ?>
                </nav>
            </div>
            <div class="col-sm-2">
                <a class="navbar-brand" href="<?= esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>
            </div>
            <div class="col-sm-5">
                <nav class="navmenu navbar-right">
                    <?php
                        if (has_nav_menu('social')) :
                          wp_nav_menu(['theme_location' => 'social', 'menu_class' => 'nav navbar-nav']);
                        endif;
                    ?>
                    <div class="copyright">&copy; <?php echo date('Y'); ?> GrowthX</div>
                </nav>
            </div>
        </div>
    </div>
</footer>
