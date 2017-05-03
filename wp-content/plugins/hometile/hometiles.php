<?php

    /*
	Plugin Name:Home Tiles
	Plugin URI: http://www.dental.uw.edu
	Description: Makes a Hometile content type 
	Version: 1.0
	Author: Anya LevySmith
	*/

if (!defined('Hometiles')){
	define('Hometiles', '1.0');
}
if ( ! post_type_exists( 'hometiles' ) ):

	add_action('init', 'hometiles_post_type');
//	add_filter('single_template', 'add_course_template');
//	add_action('template_include', 'add_course_directory_template');


	function hometiles_post_type() {
		$labels = array(
			'name' => 'Hometiles',
			'singular_name' => 'Hometile',
			'add_new' => 'Add New',
			'add_new_item' => 'Add New Hometile',
			'edit_item' => 'Edit Hometile',
			'new_item' => 'New Hometile',
			'all_items' => 'All Hometiles',
			'view_item' => 'View Hometile',
			'search_item' => 'Search Hometiles',
			'not_found' => 'No Hometiles found',
			'not_found_in_trash' => 'No Hometiles found in trash',
			'parent_item_colon' => '',
			'menu_name' => 'Hometiles'
		);

		$args = array(
			'labels' => $labels,
			'public' => true,
			'publicly_queryable' => true,
			'show_ui' => true,
			'show_in_menu' => true,
			'rewrite' => array('slug' => 'hometiles', 'with_front' => false)
		);

		register_post_type('hometiles', $args);
	}

   	add_action('admin_init', 'hometiles_admin_init');

	function hometiles_admin_init(){
		add_meta_box('hometile_pic', 'Hometile Picture', 'hometile_pic_callback', 'hometiles', 'normal', 'low');
		add_meta_box('hometile_pic_alt', 'Hometile Picture Alt Tag', 'hometile_pic_alt_callback', 'hometiles', 'normal', 'low');
		add_meta_box('readmore_link', 'Read more link', 'readmore_link_callback', 'hometiles', 'normal', 'low');
		add_meta_box('readmore_text', 'Read more text', 'readmore_text_callback', 'hometiles', 'normal', 'low');
		
	}

	
	function readmore_link_callback() {
		global $post;
		$custom = get_post_custom($post->ID);
		$readmorelink = $custom['readmore_link'][0];
		?><textarea rows="2" cols="50" name="readmore_link"><?= $readmorelink ?></textarea><?php
	}

function readmore_text_callback() {
		global $post;
		$custom = get_post_custom($post->ID);
		$readmoretext = $custom['readmore_text'][0];
		?><textarea rows="2" cols="50" name="readmore_text"><?= $readmoretext ?></textarea><?php
	}

function hometile_pic_alt_callback() {
		global $post;
		$custom = get_post_custom($post->ID);
		$hometile_pic_alt = $custom['hometile_pic_alt'][0];
		
		?><input style='width:99%' name="hometile_pic_alt" value="<?= $hometile_pic_alt ?>" /><?php
	}
	
	function hometile_pic_callback() {
		global $post;
		$custom = get_post_custom($post->ID);
		$pic_url = $custom['hometile_pic'][0];
		?><p>Use the Add Media button above to the image upload or select from uploaded images. The field below accepts an image url, so enter the generated url here (or if you want to use an image not hosted here, just enter the url for that image).</p><?php
		?><input style='width:99%' name="hometile_pic" value="<?= $pic_url ?>" /><?php
		if (!empty($pic_url)) {
			?><img src="<?= $pic_url ?>" width=180 style='display:block;margin:auto'/><?php
		}
		else {
			?><p>no image currently selected</p><?php
		}
	}	

	add_action('save_post', 'save_hometile_details');

	function save_hometile_details() {
		global $post;
		if (get_post_type($post) == 'hometiles') {
			
			update_post_meta($post->ID, 'readmore_link', $_POST['readmore_link']);
			update_post_meta($post->ID, 'readmore_text', $_POST['readmore_text']);
			update_post_meta($post->ID, 'hometile_pic_alt', $_POST['hometile_pic_alt']);
			update_post_meta($post->ID, 'hometile_pic', $_POST['hometile_pic']);
		}
	}

endif;



if ( !class_exists( "Hometiles_Shortcode" ) ) 
{
  class Hometiles_Shortcode
  {
    public function Hometiles_Shortcode() {
      add_shortcode( 'hometiles', array($this, 'shortcode') );
    }


    public function shortcode( $atts ) {
      $params = shortcode_atts(array(
        'id'=>''
      ), $atts );


      if ( ! is_numeric($params['id']) )
        return '';


      $hometile = get_post($params['id']);


      if ( $hometile->post_status != 'publish' )
        return '';


      $content = wpautop( $hometile->post_content );
      return $content;
       
    }
  }


  new Hometiles_Shortcode;


}



?>
