<?php get_header(); ?>
<div class="content postcontent">
<?php
if(have_posts()) : while(have_posts()) : the_post();?>
<div class="singlePost">
<?php the_post_thumbnail(); 
echo "<br>";
the_title();
the_content();
?>
</div>			 
<?php
endwhile;
else :
    echo 'No posts were found'; //No posts were found
endif;
?>
</div>
<?php get_footer(); ?> 