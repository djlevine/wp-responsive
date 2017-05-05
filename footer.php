    <footer>
        <div class="row">
            <div class="col-sm-4">
                <h4>About Me</h4>
                Bringing your website to life.
            </div>
            <div class="col-sm-4">
                <h4>Contact Me</h4>
                <a href="mailto:email@domain.com">email@domain.com</a>
            </div>
            <div class="col-sm-4">
                <h4>Follow Me</h4>
                <a href="#" target="_blank"><i class="fa fa-twitter-square"></i></a>
                <a href="#" target="_blank"><i class="fa fa-facebook-square"></i></a>
                <a href="#" target="_blank"><i class="fa fa-youtube-square"></i></a>
                <!--  -->
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 col-sm-12"><?php bloginfo( 'description' ); ?></div>
            <div class="col-md-6"></div>
            <div class="col-md-3 col-sm-12">
                <?php /* Footer navigation */
                wp_nav_menu( array(
                  'menu' => 'footer_menu',
                  'depth' => 2,
                  'container' => false,
                  'theme_location' => 'secondary', 
                  'menu_class' => 'navbar-nav',
                  //Process nav menu using our custom nav walker
                  //'walker' => new wp_bootstrap_navwalker()
                  ) );
                ?>
                
            </div>
        </div>
    </footer>
</div>
<?php wp_footer(); ?>
</body>
</html>
