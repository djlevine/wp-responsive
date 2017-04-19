<?php get_header(); ?> 

<div class="row post">
	<?php 
    // Check if there are any posts to display
    if ( have_posts() ) : ?>
    
    <header>
        <h2><?php single_cat_title(); ?>:</h2>
    </header><br>
    <?php
    // The Loop
    while ( have_posts() ) : the_post();?>
     	<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'blog-thumb' ); 
        $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'post-thumbnail' ); ?>
        <a href="#"> 
            <div class="col-xs-4"><img src="<?php echo $image[0]; ?>" class="img-responsive" alt="<?php the_title(); ?>"></div>
            <div class="col-xs-8"><h2><?php the_title(); ?></h2>
            <?php the_content(); ?></div>
        </a>
    <?php endwhile; // End Loop ?>
    <?php endif; ?>
</div>

<?php get_footer(); ?>

