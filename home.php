<?php get_header(); ?>

<div class="row">
  <div class="col-sm-12">
    <img class="img-responsive" src="<?php echo get_theme_mod( 'carousel_one', 'http://lorempixel.com/1200/400/transport' );?>">
  </div>
</div>
    
<div class="row marketing">
<?php 
  $args = array(
  'order' => 'DESC',
  );
  $categories = get_categories($args);
  $glyph1 = wpautop(get_theme_mod( 'category_glyph_one', 'http://lorempixel.com/360/250/transport' ));
  $glyph2 = wpautop(get_theme_mod( 'category_glyph_two', 'http://lorempixel.com/360/250/transport' ));
  $glyph3 = wpautop(get_theme_mod( 'category_glyph_three', 'http://lorempixel.com/360/250/transport' ));
  $tags = array("<p>", "</p>");
  $glyph1 = str_replace($tags, "", $glyph1);
  $glyph2 = str_replace($tags, "", $glyph2);
  $glyph3 = str_replace($tags, "", $glyph3);
foreach( $categories as $category ) {
	echo ('		
      <div class="col-sm-6 col-md-4 marketCol">
        <a href="'. get_category_link( $category->term_id ) .'">
              <img class="img-responsive" src="' . $glyph1 . '" alt="' . $category->name. '">
              <div class="overlay"></div>
              <h3 class="marketText">' . $category->name. '</h3>
        </a>
      </div>
    ');
} ?>
</div>


 <div class="row">
<!--   <div class="col-sm-2"></div>
  <div class="col-sm-8">
    <?php echo '<h4 class="text-center">'. wpautop(get_theme_mod( "message_one_header", "The Message Header" )) .'</h4>'; ?>
    <?php echo wpautop(get_theme_mod( "message_one_text", "
    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean dignissim urna velit, nec mattis justo luctus vel. Morbi a neque condimentum, maximus dui tincidunt, convallis tortor. Cras eget rhoncus leo. Nunc ultrices ullamcorper augue, sit amet commodo velit fermentum sit amet. Aliquam commodo sagittis mi, vehicula condimentum orci luctus at. Nulla non nisi a justo volutpat rhoncus. Praesent molestie malesuada arcu eget tempor. Curabitur varius, massa vel feugiat varius, eros felis iaculis nisi, nec bibendum neque nisl id nulla. Aliquam non neque congue, ornare velit et, aliquet mauris. Proin faucibus et elit ut interdum. Vivamus pellentesque ex neque, in gravida velit consectetur vitae. Praesent et odio maximus, eleifend neque non, luctus augue.
    " )); ?>
  </div>
  <div class="col-sm-2"></div> -->
</div>
<?php get_footer(); ?>