<?php
/*
Plugin Name: Pops Custom Post Type
Description: Anya's Pops Custom Post Type
Version: 1.0
Author: Anya

*/   
if ( !post_type_exists( 'pops' ) ):   
add_action('init', 'pops_post_type');
add_filter('single_template', 'add_single_pops_template');

function pops_post_type() {
		$labels = array(
			'name' => 'Practice Opportunities',
			'singular_name' => 'Practice Opportunity',
			'add_new' => 'Add New',
			'add_new_item' => 'Add New Practice Opportunity',
			'edit_item' => 'Edit Practice Opportunity',
			'new_item' => 'New Practice Opportunity',
			'all_items' => 'All Practice Opportunities',
			'view_item' => 'View Practice Opportunity',
			'search_item' => 'Search Practice Opportunities',
			'not_found' => 'No Practice Opportunities found',
			'not_found_in_trash' => 'No Practice Opportunities found in trash',
			'parent_item_colon' => '',
			'menu_name' => 'Practice Opportunities'
		);

		$args = array(
			'labels' => $labels,
			'capability_type' => 'pops',
			'capabilities' => array(
				'publish_posts' => 'publish_popss',
				'edit_posts' => 'edit_popss',
				'edit_others_posts' => 'edit_others_popss',
				'delete_posts' => 'delete_popss',
				'delete_others_posts' => 'delete_others_popss',
				'read_private_posts' => 'read_private_popss',
				'edit_post' => 'edit_pops',
				'delete_post' => 'delete_pops',
				'read_post' => 'read_pops',
			),
			'public' => true,
			'publicly_queryable' => true,
			'show_ui' => true,
			'show_in_menu' => true,
			'rewrite' => array('slug' => 'pops', 'with_front' => false)
		);

		register_post_type('pops', $args);
	}


add_action('admin_init', 'pops_admin_init');
   
   function pops_admin_init(){		
		
		add_meta_box('type', 'Type', 'type_callback', 'pops', 'normal', 'high');
		add_meta_box('location', 'Location', 'location_callback', 'pops', 'normal', 'high');
		add_meta_box('practiceName', 'Practice Name', 'practiceName_callback', 'pops', 'normal', 'high');
		add_meta_box('contactName', 'Contact Name', 'contactName_callback', 'pops', 'normal', 'high');
		add_meta_box('contactEmail', 'Contact Email', 'contactEmail_callback', 'pops', 'normal', 'high');
		add_meta_box('contactPhone', 'Contact Phone', 'contactPhone_callback', 'pops', 'normal', 'high');
		
		add_meta_box('affiliation', 'Affiliation', 'affiliation_callback', 'pops', 'normal', 'high');	
		add_meta_box('website', 'Website', 'website_callback', 'pops', 'normal', 'high');	
	}
	function contactName_callback() {
		global $post;
		$custom = get_post_custom($post->ID);
		$contactName = $custom['contactName'][0];		
		?>
		<textarea rows="2" cols="40" name="contactName"><?= $contactName ?></textarea><?php
	}
	function contactEmail_callback() {
		global $post;
		$custom = get_post_custom($post->ID);
		$contactEmail = $custom['contactEmail'][0];		
		?>
		<textarea rows="2" cols="40" name="contactEmail"><?= $contactEmail ?></textarea><?php
	}
	function contactPhone_callback() {
		global $post;
		$custom = get_post_custom($post->ID);
		$contactPhone = $custom['contactPhone'][0];		
		?>
		<textarea rows="2" cols="40" name="contactPhone"><?= $contactPhone ?></textarea><?php
	}

function website_callback() {
		global $post;
		$custom = get_post_custom($post->ID);
		$website = $custom['website'][0];		
		?>
		<textarea rows="2" cols="40" name="website"><?= $website ?></textarea><?php
	}
	
function location_callback() {
		global $post;
		$custom = get_post_custom($post->ID);
		$location = $custom['location'][0];		
		?>
		<textarea rows="2" cols="40" name="location"><?= $location ?></textarea><?php
	}
	
	function affiliation_callback() {
		global $post;
		$custom = get_post_custom($post->ID);
		$affiliation = $custom['affiliation'][0];		
		?>
		<textarea rows="2" cols="40" name="affiliation"><?= $affiliation ?></textarea><?php
	}
	function practiceName_callback() {
		global $post;
		$custom = get_post_custom($post->ID);
		$practiceName = $custom['practiceName'][0];		
		?>
		<textarea rows="2" cols="40" name="practiceName"><?= $practiceName ?></textarea><?php
	}
	function type_callback() {
		global $post;
		$custom = get_post_custom($post->ID);
		$type = $custom['type'][0];	?>
		 <select name="type">
            <option value="DDS/DMD" <?php selected( $type, 'DDS/DMD' ); ?>>DDS/DMD</option>
            <option value="Support Staff" <?php selected( $type, 'Support Staff' ); ?>>Support Staff</option>
            <option value="Office Space" <?php selected( $type, 'Office Space' ); ?>>Office Space</option>
            <option value="Practice Purchase" <?php selected( $type, 'Practice Purchase' ); ?>>Practice Purchase</option>
            <option value="Equipment for Sale" <?php selected( $type, 'Equipment for Sale' ); ?>>Equipment for Sale</option>
            <option value="Other" <?php selected( $type, 'Other' ); ?>>Other</option>
        </select>	
		
		<?php
	}
	
	
		
	add_action('save_post', 'save_pops_details');

	function save_pops_details() {
		global $post;
		if (get_post_type($post) == 'pops') {
			update_post_meta($post->ID, 'contactName', $_POST['contactName']);
			update_post_meta($post->ID, 'contactEmail', $_POST['contactEmail']);
			update_post_meta($post->ID, 'contactPhone', $_POST['contactPhone']);
			update_post_meta($post->ID, 'website', $_POST['website']);
			update_post_meta($post->ID, 'location', $_POST['location']);
			update_post_meta($post->ID, 'affiliation', $_POST['affiliation']);
			update_post_meta($post->ID, 'practiceName', $_POST['practiceName']);
			update_post_meta($post->ID, 'type', $_POST['type']);
						
		}
	}
	function add_single_pops_template($template) {
		global $post;
		$single_pops_template = 'single-pops.php';
		$this_dir = dirname(__FILE__);
		if ($post->post_type == 'pops') {
			if (file_exists(get_stylesheet_directory() . '/' . $single_pops_template)) {
				return get_stylesheet_directory() . '/' . $single_pops_template;
			}
			else if (file_exists(get_template_directory() . '/' . $single_pops_template)) {
				return get_template_directory() . '/' . $single_pops_template;
			}
			else { 
				return $this_dir . '/' . $single_pops_template;
			}
		}
        return $template;
	}
	add_filter( 'map_meta_cap', 'my_map_meta_cap', 10, 4 );

function my_map_meta_cap( $caps, $cap, $user_id, $args ) {

	/* If editing, deleting, or reading a pops, get the post and post type object. */
	if ( 'edit_pops' == $cap || 'delete_pops' == $cap || 'read_pops' == $cap  || 'publish_popss' == $cap) {
		$post = get_post( $args[0] );
		$post_type = get_post_type_object( $post->post_type );

		/* Set an empty array for the caps. */
		$caps = array();
	}

	/* If editing a pops, assign the required capability. */
	if ( 'edit_pops' == $cap ) {
		if ( $user_id == $post->post_author )
			$caps[] = $post_type->cap->edit_posts;
		else
			$caps[] = $post_type->cap->edit_others_posts;
	}

	/* If deleting a pops, assign the required capability. */
	elseif ( 'delete_pops' == $cap ) {
		if ( $user_id == $post->post_author )
			$caps[] = $post_type->cap->delete_posts;
		else
			$caps[] = $post_type->cap->delete_others_posts;
	}

	/* If reading a private pops, assign the required capability. */
	elseif ( 'read_pops' == $cap ) {

		if ( 'private' != $post->post_status )
			$caps[] = 'read';
		elseif ( $user_id == $post->post_author )
			$caps[] = 'read';
		else
			$caps[] = $post_type->cap->read_private_posts;
	}
	elseif ( 'publish_popss' == $cap ) {

			$caps[] = $post_type->cap->publish_posts;
	}

	/* Return the capabilities required by the user. */
	return $caps;
}
   
  endif; 
  

?>