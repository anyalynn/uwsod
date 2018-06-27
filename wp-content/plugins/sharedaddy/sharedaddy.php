<?php
/*
Plugin Name: Sharedaddy
Description: Future upgrades to Sharedaddy plugin will only be available in <a href="http://jetpack.me/" target="_blank">Jetpack</a>. Jetpack connects your blog to the WordPress.com cloud, <a href="http://jetpack.me/support/" target="_blank">enabling awesome features</a>.
Version: 0.2.13
Author: Automattic, Inc. modified by Ramon Qu
Author URI: http://dental.uw.edu
Plugin URI: http://en.blog.wordpress.com/2010/08/24/more-ways-to-share/
*/

//To compatible with PHP7


if ( ! class_exists( 'Automattic_Deprecated_Notice' ) ) {
	require_once( '_inc/class.automattic-deprecated-notice.php' );
	$adn = new Automattic_Deprecated_Notice;
}

require_once plugin_dir_path( __FILE__ ).'sharing.php';

function sharing_email_send_post( $data ) {
	$content  = sprintf( __( '%1$s (%2$s) thinks you may be interested in the following post:'."\n\n", 'sharedaddy' ), $data['name'], $data['source'] );
	$content .= $data['post']->post_title."\n";
	$content .= get_permalink( $data['post']->ID )."\n";

	wp_mail( $data['target'], '['.__( 'Shared Post', 'sharedaddy' ).'] '.$data['post']->post_title, $content );
}

function sharing_add_meta_box() {
	add_meta_box( 'sharing_meta', __( 'Sharing', 'sharedaddy' ), 'sharing_meta_box_content', 'page', 'advanced', 'high' );
	add_meta_box( 'sharing_meta', __( 'Sharing', 'sharedaddy' ), 'sharing_meta_box_content', 'post', 'advanced', 'high' );
}

function sharing_meta_box_content( $post ) {
	$sharing_checked = get_post_meta( $post->ID, 'sharing_disabled', false );

	if ( empty( $sharing_checked ) || $sharing_checked === false )
		$sharing_checked = ' checked="checked"';
	else
		$sharing_checked = '';

	echo '<p><label for="enable_post_sharing"><input name="enable_post_sharing" id="enable_post_sharing" value="1"' . $sharing_checked . ' type="checkbox"> ' . __( 'Show sharing buttons on this post.', 'sharedaddy' ) . '</label><input type="hidden" name="sharing_status_hidden" value="1" /></p>';
}

function sharing_meta_box_save( $post_id ) {
	if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE )
		return $post_id;

	// Record sharing disable
	if ( 'post' == $_POST['post_type'] || 'page' == $_POST['post_type'] ) {
		if ( current_user_can( 'edit_post', $post_id ) ) {
			if ( isset( $_POST['sharing_status_hidden'] ) ) {
				if ( !isset( $_POST['enable_post_sharing'] ) )
					update_post_meta( $post_id, 'sharing_disabled', 1 );
				else
					delete_post_meta( $post_id, 'sharing_disabled' );
			}
		}
	}

  return $post_id;
}

function sharing_plugin_settings( $links ) {
	$settings_link = '<a href="options-general.php?page=sharing.php">'.__( 'Settings', 'sharedaddy' ).'</a>';
	array_unshift( $links, $settings_link );
	return $links;
}

function sharing_add_plugin_settings($links, $file) {
	if ( $file == basename( dirname( __FILE__ ) ).'/'.basename( __FILE__ ) ) {
		$links[] = '<a href="options-general.php?page=sharing.php">' . __( 'Settings', 'sharedaddy' ) . '</a>';
		$links[] = '<a href="http://support.wordpress.com/sharing/">' . __( 'Support', 'sharedaddy' ) . '</a>';
	}
	
	return $links;
}

function sharing_restrict_to_single( $services ) {
	// This removes Press This from non-multisite blogs - doesnt make much sense
	if ( is_multisite() === false ) {
		unset( $services['press-this'] );
	}

	return $services;
}

function sharing_init() {
	load_plugin_textdomain( 'sharedaddy', false, basename( dirname( __FILE__ ) ).'/languages/' );
	
	if ( get_option( 'sharedaddy_disable_resources' ) ) {
		add_filter( 'sharing_js', 'sharing_disable_js' );
		remove_action( 'wp_head', 'sharing_add_header', 1 );
	}
}

function sharing_disable_js() {
	return false;
}

function sharing_global_resources() {
	$disable = get_option( 'sharedaddy_disable_resources' );
?>
<tr valign="top">
	<th scope="row"><label for="disable_css"><?php _e( 'Disable CSS and JS', 'sharedaddy' ); ?></label></th>
	<td>
		<input id="disable_css" type="checkbox" name="disable_resourcse" <?php if ( $disable == 1 ) echo ' checked="checked"'; ?>/>  <small><em><?php _e( 'Advanced - you must include these in your theme for Sharedaddy to work', 'sharedaddy' ); ?></em></small>
	</td>
</tr>
<?php
}

function shareing_global_resources_save() {
	update_option( 'sharedaddy_disable_resources', isset( $_POST['disable_resourcse'] ) ? 1 : 0 );
}

// Only run if PHP5
if ( version_compare( phpversion(), '5.0', '>=' ) ) {
	add_action( 'init', 'sharing_init' );
	add_action( 'admin_init', 'sharing_add_meta_box' );
	add_action( 'save_post', 'sharing_meta_box_save' );
	add_action( 'sharing_email_send_post', 'sharing_email_send_post' );
	add_action( 'sharing_global_options', 'sharing_global_resources' );
	add_action( 'sharing_admin_update', 'shareing_global_resources_save' );
	add_filter( 'sharing_services', 'sharing_restrict_to_single' );
	add_action( 'plugin_action_links_'.basename( dirname( __FILE__ ) ).'/'.basename( __FILE__ ), 'sharing_plugin_settings', 10, 4 );
	add_filter( 'plugin_row_meta', 'sharing_add_plugin_settings', 10, 2 );
}
