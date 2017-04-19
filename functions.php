<?php
	//Bootstrap Nav for sub-menus
    require_once('wp_bootstrap_navwalker.php');
	//Support for feature images in posts
	add_theme_support( 'post-thumbnails' ); 
	//Theme Setup and menu registration
	add_action( 'after_setup_theme', 'wpt_setup' );
		if ( ! function_exists( 'wpt_setup' ) ):
			function wpt_setup() {  
				register_nav_menu( 'primary', __( 'Primary navigation', 'wptuts' ) );
			} endif;
	register_nav_menus( array( 'secondary' => 'Footer Menu' ) );

	function my_menu_notitle( $menu ){
	  return $menu = preg_replace('/ title=\"(.*?)\"/', '', $menu );
	}
	//Remove menu link titles (remove tooltips)
	add_filter( 'wp_nav_menu', 'my_menu_notitle' );
	add_filter( 'wp_page_menu', 'my_menu_notitle' );
	add_filter( 'wp_list_categories', 'my_menu_notitle' );

	
	function wpt_register_js() {
		wp_register_script('html5.js', get_template_directory_uri(). '/js/html5.js', '', '1.0', false);
		wp_register_script('jquery.min', 'http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js', 'jquery', '1.11.3', false);
		wp_register_script('bootstrap.js', get_template_directory_uri() . '/js/bootstrap.js', '', '3.3.4', false);
		wp_enqueue_script('html5.js');
		wp_enqueue_script('jquery.min');
		wp_enqueue_script('bootstrap.js');
	}
	add_action( 'init', 'wpt_register_js' );
	function wpt_register_css() {
		wp_register_style( 'bootstrap.min', get_template_directory_uri() . '/css/bootstrap.min.css','','3.3.4', false );
        //wp_register_style( 'font-awesome.css', get_template_directory_uri() . '/css/font-awesome.css','','3.3.4', false );
		wp_register_style( 'style.css', get_stylesheet_uri(),'','0.82', false );
		wp_enqueue_style( 'bootstrap.min' );
        //wp_enqueue_style( 'font-awesome.css' );
		wp_enqueue_style( 'style.css' );
	}
	add_action( 'wp_enqueue_scripts', 'wpt_register_css' );
	
	
	add_filter( 'post_thumbnail_html', 'remove_width_attribute', 10 );
	add_filter( 'image_send_to_editor', 'remove_width_attribute', 10 );
	
	function remove_width_attribute( $html ) {
	   $html = preg_replace( '/(width|height)="\d*"\s/', "", $html );
	   return $html;
	}

// This theme uses Featured Images (also known as post thumbnails) for per-post/per-page Custom Header images
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'small-thumb', 45, 45, true );
	add_image_size( 'blog-thumb', 500, 400 );
	add_image_size( 'blog-full', 624, 365, true );
	add_image_size( 'portfolio-thumb', 480, 340, true );
	add_image_size( 'portfolio-full' );
	add_image_size( 'homepage-rotator' );


function example_customizer( $wp_customize ) {
//Define Custom Control - Text Area
    class Example_Customize_Textarea_Control extends WP_Customize_Control {
        public $type = 'textarea';

        public function render_content() {
            ?>
                <label>
                    <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                    <textarea rows="5" style="width:100%;" <?php $this->link(); ?>><?php echo esc_textarea( $this->value() ); ?></textarea>Note: text will appear on a single line in the preview but will be on multiple lines when displayed publicly.
                </label>
            <?php
        }
    } 
}

add_action( 'customize_register', 'example_customizer' );

    function mytheme_customize_register( $wp_customize ) {   
/* Customizer Sections */
    $wp_customize->add_section( 'Color_Customization' , array(
        'title'      => __( 'Colors', 'mytheme' ),
        'priority'   => 30,
    ) );
        
    $wp_customize->add_section( 'carousel_images' , array(
        'title'      => __( 'Splash Images', 'mytheme' ),
        'priority'   => 31,
    ) );
    
    $wp_customize->add_section( 'marketing_images' , array(
        'title'      => __( 'Category Images', 'mytheme' ),
        'priority'   => 32,
    ) );
	
	$wp_customize->add_section( 'Messages' , array(
        'title'      => __( 'Messages', 'mytheme' ),
        'priority'   => 33,
    ) );
/* Begin Settings section*/       
    $wp_customize->add_setting( 'background_color' , array(
        'default'     => '#BBBBBB',
        'transport'   => 'refresh',
    ) );      

    $wp_customize->add_setting( 'body_color' , array(
        'default'     => '#FFFFFF',
        'transport'   => 'refresh',
    ) );
    
    $wp_customize->add_setting( 'text_color' , array(
        'default'     => '#000000',
        'transport'   => 'refresh',
    ) );
    $wp_customize->add_setting( 'link_color' , array(
        'default'     => '#000000',
        'transport'   => 'refresh',
    ) );
    $wp_customize->add_setting( 'link_hover_color' , array(
        'default'     => '#666666',
        'transport'   => 'refresh',
    ) );	
	$wp_customize->add_setting( 'category_glyph_one' , array(
        'default'     => 'http://lorempixel.com/360/250/transport',
        'transport'   => 'refresh',
    ) );
	
	$wp_customize->add_setting( 'category_glyph_two' , array(
        'default'     => 'http://lorempixel.com/360/250/transport',
        'transport'   => 'refresh',
    ) );
	
	$wp_customize->add_setting( 'category_glyph_three' , array(
        'default'     => 'http://lorempixel.com/360/250/transport',
        'transport'   => 'refresh',
    ) );
	
    $wp_customize->add_setting( 'carousel_one' , array(
        'default'     => 'http://lorempixel.com/1200/400/transport',
        'transport'   => 'refresh',
    ) );
    
    $wp_customize->add_setting( 'carousel_two' , array(
        'default'     => 'http://lorempixel.com/1200/400/transport',
        'transport'   => 'refresh',
    ) );
	
	$wp_customize->add_setting( 'message_one_header' , array(
        'default'     => 'Message Header',
        'transport' => 'postMessage',
    ) );

    $wp_customize->add_setting( 'message_one_text' , array(
        'default'     => 'Message 1',
        'transport' => 'postMessage',
    ) );         
/* Customizer Controls */
    /*Background  Color*/
    $wp_customize->add_control( new WP_Customize_color_Control( $wp_customize, 'background_color', array(
        'label'        => __( 'Background Color', 'mytheme' ),
        'section'    => 'Color_Customization',
        'settings'   => 'background_color',
    ) ) );

     $wp_customize->add_control( new WP_Customize_color_Control( $wp_customize, 'body_color', array(
        'label'        => __( 'Container Color', 'mytheme' ),
        'section'    => 'Color_Customization',
        'settings'   => 'body_color',
    ) ) );

    /*Main Text Color*/
    $wp_customize->add_control( new WP_Customize_color_Control( $wp_customize, 'text_color', array(
        'label'        => __( 'Main Text Color', 'mytheme' ),
        'section'    => 'Color_Customization',
        'settings'   => 'text_color',
    ) ) ); 
    /*Hyperlink Color*/
    $wp_customize->add_control( new WP_Customize_color_Control( $wp_customize, 'link_color', array(
        'label'        => __( 'Hyperlink Color', 'mytheme' ),
        'section'    => 'Color_Customization',
        'settings'   => 'link_color',
    ) ) ); 
    /*Hyperlink hover Color*/
    $wp_customize->add_control( new WP_Customize_color_Control( $wp_customize, 'link_hover_color', array(
        'label'        => __( 'Hyperlink Hover Color', 'mytheme' ),
        'section'    => 'Color_Customization',
        'settings'   => 'link_hover_color',
    ) ) ); 
        
    /*Splash Image One*/ 
    $wp_customize->add_control( new WP_Customize_image_Control( $wp_customize, 'carousel_one', array(
        'label'        => __( 'Splash Image One', 'mytheme' ),
        'section'    => 'carousel_images',
        'settings'   => 'carousel_one',
    ) ) );
        
    /*Splash Image Two*/ 
    $wp_customize->add_control( new WP_Customize_image_Control( $wp_customize, 'carousel_two', array(
        'label'        => __( 'Splash Image Two', 'mytheme' ),
        'section'    => 'carousel_images',
        'settings'   => 'carousel_two',
    ) ) );
        
    /*Splash Image Three
    $wp_customize->add_control( new WP_Customize_image_Control( $wp_customize, 'carousel_three', array(
        'label'        => __( 'Splash Image Three', 'mytheme' ),
        'section'    => 'carousel_images',
        'settings'   => 'carousel_three',
    ) ) );
*/
    /*Message One Header Text*/ 
    $wp_customize->add_control('message_one_header', array(
        'label' => 'Message One Header',
        'section' => 'Messages',
        'settings'   => 'message_one_header',
        'type' => 'text',
        'sanitize_callback' => 'sanitize_text',
    ));
	
	/*Message One Text*/ 
    $wp_customize->add_control( new Example_Customize_Textarea_Control( $wp_customize, 'message_one_text', array(
        'label' => 'Message One Text',
        'section' => 'Messages',
        'settings' => 'message_one_text',
        'sanitize_callback' => 'sanitize_text',
    )));

    /*marketing image one*/
    $wp_customize->add_control( new WP_Customize_image_Control( $wp_customize, 'category_glyph_one', array(
        'label' => 'Marketing Image Right',
        'section' => 'marketing_images',
        'settings'   => 'category_glyph_one'
    ) ) );

    /*marketing image two*/
    $wp_customize->add_control( new WP_Customize_image_Control( $wp_customize, 'category_glyph_two', array(
        'label' => 'Marketing Image Center',
        'section' => 'marketing_images',
        'settings'   => 'category_glyph_two'
    ) ) );

    /*marketing image two*/
    $wp_customize->add_control( new WP_Customize_image_Control( $wp_customize, 'category_glyph_three', array(
        'label' => 'Marketing Image Left',
        'section' => 'marketing_images',
        'settings'   => 'category_glyph_three'
    ) ) );
        
		        
    // if ( $wp_customize->is_preview() && ! is_admin() ) {
    //     add_action( 'wp_footer', 'customize_preview', 21);
    // }
   
}

function sanitize_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}

/* Register Customizations */
    add_action( 'customize_register', 'mytheme_customize_register' );

/* Implement Customizations */
    function mytheme_customize_css(){
        ?>
<style type="text/css">
body { background:<?php echo get_theme_mod('background_color', '#BBBBBB'); ?>;}
.container { background:<?php echo get_theme_mod('body_color', '#FFFFFF'); ?>;}
.container,a{color:<?php echo get_theme_mod('text_color', '#000000');?>;}
.bottom-nav li { border-right: solid 1px <?php echo get_theme_mod('text_color', '#000000'); ?>;}
.row#main{color:<?php echo get_theme_mod('row_text_color', '#000000'); ?>;}
a{color:<?php echo get_theme_mod('link_color', '#000000'); ?>;}
a:hover,a:focus{color:<?php echo get_theme_mod('link_hover_color', '#000000'); ?>;}
/*.navbar-toggle {background-color: }*/
</style>
        <?php
    }

/* Register Implementation */
    add_action( 'wp_head', 'mytheme_customize_css');

//Ajax preview for customizer elements
function customize_preview() {
    ?>
    <script type="text/javascript">
        ( function( $ ) {
            wp.customize('message_one_header',function( value ) {
                value.bind(function(to) {
                    $('#messageOne h4 p').html(to);
                });
            });
            wp.customize('message_one_text',function( value ) {
                value.bind(function(to) {
                    $('#messageOne > p').html(to);
                });
            });
			wp.customize('message_two_header',function( value ) {
                value.bind(function(to) {
                    $('#messageTwo h4 p').html(to);
                });
            });
            wp.customize('message_two_text',function( value ) {
                value.bind(function(to) {
                    $('#messageTwo > p').html(to);
                });
            });
            wp.customize('category_glyph_one',function( value ) {
                value.bind(function(to) {
                    $('#cat1').html(to);
                });
            });
            wp.customize('category_glyph_two',function( value ) {
                value.bind(function(to) {
                    $('#cat2').html(to);
                });
            });
            wp.customize('category_glyph_three',function( value ) {
                value.bind(function(to) {
                    $('#cat3').html(to);
                });
            });		
		

        } )( jQuery )
    </script>
    <?php
}
?>

