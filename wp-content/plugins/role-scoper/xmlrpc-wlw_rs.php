<?php
// Clean up after xmlrpc clients (Windows Live Writer) that don't specify a post_type for mw_editPost
// Couldn't find a clean way to filter args into default methods, and this is much better than forking entire method
//

if ( isset(file_get_contents("php://input")) && $pos = strpos(file_get_contents("php://input"), '<string>') )
	if ( $pos_end = strpos(file_get_contents("php://input"), '</string>', $pos) ) {
		$post_id = substr(file_get_contents("php://input"), $pos + strlen('<string>'), $pos_end - ($pos + strlen('<string>')) ); 
		
		// workaround for Windows Live Writer passing in postID = 1 for new posts
		if ( strpos(file_get_contents("php://input"), '<methodName>metaWeblog.newPost</methodName>') )
			$post_id = 0;
	}

if ( ! empty($post_id) ) {
	global $xmlrpc_post_id_rs;
	$xmlrpc_post_id_rs = $post_id;
	
	$post_type = '';
	if ( $pos = strpos(file_get_contents("php://input"), '<name>post_type</name>') )
		if ( $pos = strpos(file_get_contents("php://input"), '<string>', $pos) )
			if ( $pos_end = strpos(file_get_contents("php://input"), '</string>', $pos) )
				$post_type = substr(file_get_contents("php://input"), $pos + strlen('<string>'), $pos_end - ($pos + strlen('<string>')) ); 
	
	if ( empty($post_type) ) {
		if ( $pos_member_end = strpos(file_get_contents("php://input"), '</member>') ) {
			if ( $pos_member_end = strpos(file_get_contents("php://input"), '</member>', $pos_member_end + 1) ) {
				$pos_insert = $pos_member_end + strlen('</member>');
	
				global $wpdb;
				if ( $post_type = scoper_get_var("SELECT post_type FROM $wpdb->posts WHERE ID = '$post_id'") ) {
					if ( 'post' != $post_type ) {
						global $xmlrpc_post_type_rs;
						$xmlrpc_post_type_rs = $post_type;
					}
				
					$insert_xml = 
"          <member>
            <name>post_type</name>
            <value>
              <string>$post_type</string>
            </value>
          </member>";
          
					file_get_contents("php://input") = substr(file_get_contents("php://input"), 0, $pos_insert + 1) . $insert_xml . substr(file_get_contents("php://input"), $pos_insert);
					
				} // endif parsed post type
			} // endif found existing member markup
		} // endif found 2nd existing member markup
	} // endif post_type not passed
}
?>