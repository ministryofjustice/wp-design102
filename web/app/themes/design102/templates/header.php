<nav class="navbar navbar-toggleable-md fixed-top navbar-light bg-faded">
    <div class="container">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="<?= esc_url(home_url('/')); ?>"><?php //bloginfo('name'); ?><strong>design</strong>102</a>
        <div class="collapse navbar-collapse flex-row-reverse" id="navbarCollapse">
            <?php
            if (has_nav_menu('primary_navigation')) :
                wp_nav_menu([
                    'theme_location' => 'primary_navigation',
                    'menu_class' => 'navbar-nav',
                    'container' => false,
                    'walker' => new WP_Bootstrap_Navwalker()
                ]);
            endif;
            ?>
        </div>
    </div>
</nav>
