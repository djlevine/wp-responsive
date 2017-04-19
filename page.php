<?php get_header();

 if(is_page( 'contact' || 'thank-you' )){ ?>
<div class="parallax-window parallax-container" id="" data-position="center" data-bleed="5" data-parallax="scroll" data-image-src="<?php echo get_theme_mod( 'carousel_two', 'http://lorempixel.com/1024/768/transport' );?>"></div>
<?php } ?>

<div class="content postcontent">
	<div class="container">
    	<div class="col-lg-12">
<?php
if(have_posts()) : while(have_posts()) : the_post();?>
<?php the_post_thumbnail(); 
echo "<header class=\"archive-header\">
	<h3 class=\"archive-title\">";
the_title();
echo "</h3>
	</header>";
the_content();
?>	 
<?php
endwhile;
else :
    echo 'No posts were found'; //No posts were found
endif;
?>
        </div>
    </div>
</div>
<?php get_footer(); ?> 

<?php if(is_page( 42 )){ ?>
<div class="parallax-window" id="" data-parallax="scroll" data-bleed="5" data-image-src="<?php echo get_theme_mod( 'carousel_two', 'http://lorempixel.com/1024/768/transport' );?>"></div>
<?php } ?>