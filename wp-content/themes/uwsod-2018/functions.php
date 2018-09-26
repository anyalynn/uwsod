<?php
// allows child them overwriting of either whole UW object or just parts
if (!function_exists('setup_uw_object')){
    function setup_uw_object() {
        require( get_template_directory() . '/setup/class.uw.php' );
        $UW = new UW();
        do_action('extend_uw_object', $UW);
        return $UW;
    }
}

$UW = setup_uw_object();

if ( ! function_exists( 'get_uw_breadcrumbs') ) :

function get_uw_breadcrumbs()
  {
  
    global $post;

    $ancestors = array_reverse( get_post_ancestors( $post->ID ) );

    if ( ! is_home() || ! is_front_page() )
      $ancestors[] = $post->ID;

    $html = '<li><a href="//dental.washington.edu" title="UW School of Dentistry">Home</a></li>';
   

    if ( ! is_front_page() )
    {
      foreach ( $ancestors as $index=>$ancestor )
      {
        $class      = $index+1 == count($ancestors) ? ' class="current" ' : '';
        $page       = get_post( $ancestor );
        $url        = get_permalink( $page->ID );
        $title_attr = esc_attr( $page->post_title );
        $html .= "<li $class><a href=\"$url\" >{$page->post_title}</a>";
      }
    }

    return "<nav class='uw-breadcrumbs' role='navigation' aria-label='breadcrumbs relative navigation'><ul>$html</ul></nav>";
  }

endif;
if ( ! function_exists( 'uw_breadcrumbs') ) :

function uw_breadcrumbs()
  {
    echo get_uw_breadcrumbs();
  }

endif;

/**
 * Register with hook 'wp_enqueue_scripts', which can be used for front end CSS and JavaScript
 */
 
 add_action( 'wp_enqueue_scripts', 'dental_enqueue_default_scripts' );

if ( ! function_exists( 'dental_enqueue_default_scripts' ) ): 
/**
 * This is where all the JS files are registered
 *
 * bloginfo('template_directory')  gives you the url to the parent theme
 * bloginfo('stylesheet_directory')  gives you the url to the child theme
 */
  function dental_enqueue_default_scripts() {
  
	wp_register_script( 'trumba','https://www.trumba.com/scripts/spuds.js');
	
	
 	wp_enqueue_script( 'trumba');
	


 
  }
endif;
