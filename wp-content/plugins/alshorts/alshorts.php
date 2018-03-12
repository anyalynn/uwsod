<?php
/*
Plugin Name: Alshorts
Description: Anya's shortcodes
Version: 1.0
Author: Anya

*/

if ( ! function_exists('infobox_shortcode') ):
  function infobox_shortcode( $atts,  $content = null  ) 
  {
       return '<div class="info-box info-box-large">' . $content . '</div>';
  }
endif;
add_shortcode( 'infobox', 'infobox_shortcode' );

if ( ! function_exists('colfirst_shortcode') ):
  function colfirst_shortcode( $atts,  $content = null  ) 
  {
       return '<div class="row ce-row"><div class="col2">' . $content . '</div>';
  }
endif;
add_shortcode( 'colfirst', 'colfirst_shortcode' );

if ( ! function_exists('collast_shortcode') ):
  function collast_shortcode( $atts,  $content = null  ) 
  {
       return '<div class="col2">' . $content . '</div></div>';
  }
endif;
add_shortcode( 'collast', 'collast_shortcode' );

   
if ( !post_type_exists( 'condented' ) ):   
add_action('init', 'condented_post_type');
add_filter('single_template', 'add_single_condented_template');
add_filter( 'map_meta_cap', 'my_map_meta_cap2', 10, 4 );

function condented_post_type() {
		$labels = array(
			'name' => 'CDE Courses',
			'singular_name' => 'CDE Course',
			'add_new' => 'Add New',
			'add_new_item' => 'Add New CDE Course',
			'edit_item' => 'Edit CDE Course',
			'new_item' => 'New CDE Course',
			'all_items' => 'All CDE Courses',
			'view_item' => 'View CDE Course',
			'search_item' => 'Search CDE Courses',
			'not_found' => 'No CDE Courses found',
			'not_found_in_trash' => 'No CDE Courses found in trash',
			'parent_item_colon' => '',
			'menu_name' => 'CDE Courses'
		);

		$args = array(
			'labels' => $labels,
			'public' => true,
			'capability_type' => 'condented',
			'capabilities' => array(
				'publish_posts' => 'publish_condenteds',
				'edit_posts' => 'edit_condenteds',
				'edit_others_posts' => 'edit_others_condenteds',
				'delete_posts' => 'delete_condenteds',
				'delete_others_posts' => 'delete_others_condenteds',
				'read_private_posts' => 'read_private_condenteds',
				'edit_post' => 'edit_condented',
				'delete_post' => 'delete_condented',
				'read_post' => 'read_condented',
			),
			'publicly_queryable' => true,
			'show_ui' => true,
			'show_in_menu' => true,
			'rewrite' => array('slug' => 'condented', 'with_front' => false)
		);

		register_post_type('condented', $args);
	}


add_action('admin_init', 'condented_admin_init');
   
   function condented_admin_init(){		
		add_meta_box('cdeStartdate', 'Course Start Date', 'cdeStartdate_callback', 'condented', 'normal', 'high');
		add_meta_box('cdeEnddate', 'Course End Date', 'cdeEnddate_callback', 'condented', 'normal', 'high');
		add_meta_box('cdeThumb', 'CDE Thumbnail', 'cdeThumb_callback', 'condented', 'normal', 'high');
		add_meta_box('cdeNumber', 'CDE Number', 'cdeNumber_callback', 'condented', 'normal', 'high');
		add_meta_box('cdeprimarytitle', 'Primary title', 'cdeprimarytitle_callback', 'condented', 'normal', 'high');
		add_meta_box('cdesecondarytitle', 'Secondary title', 'cdesecondarytitle_callback', 'condented', 'normal', 'high');
		add_meta_box('instructor', 'Instructor', 'instructor_callback', 'condented', 'normal', 'high');
		add_meta_box('cdenotes', 'Notes', 'cdenotes_callback', 'condented', 'normal', 'high');
		add_meta_box('cdealert', 'Alerts', 'cdealert_callback', 'condented', 'normal', 'high');
		add_meta_box('cdeInstructionType', 'Instruction Type', 'cdeInstructionType_callback', 'condented', 'normal', 'high');		
	}
	function cdeInstructionType_callback() {
		global $post;
		$custom = get_post_custom($post->ID);
		$cdeInstrType = $custom['rb_cdeInstructionType'][0];		
		?>
		<input type="radio" <?php checked($cdeInstrType, 'lecture');?> name="rb_cdeInstructionType" value="lecture"/> Lecture 
		<input type="radio" <?php checked($cdeInstrType, 'handson');?> name="rb_cdeInstructionType" value="handson"/> Hands-on
		<input type="radio" <?php checked($cdeInstrType, 'both');?> name="rb_cdeInstructionType" value="both"/> Both <?php 
	}

	function cdeStartdate_callback() {
		global $post;
		$custom = get_post_custom($post->ID);
		$cdeStartdate = esc_html($custom['cdeStartdate'][0]);
		?><textarea rows="2" cols="20" name="cdeStartdate"><?= $cdeStartdate ?></textarea><?php
	}
	function cdeEnddate_callback() {
		global $post;
		$custom = get_post_custom($post->ID);
		$cdeEnddate = esc_html($custom['cdeEnddate'][0]);
		?><textarea rows="2" cols="20" name="cdeEnddate"><?= $cdeEnddate ?></textarea><?php
	}
	function cdeNumber_callback() {
		global $post;
		$custom = get_post_custom($post->ID);
		$cdeNumber = esc_html($custom['cdeNumber'][0]);
		?><textarea rows="2" cols="50" name="cdeNumber"><?= $cdeNumber ?></textarea><?php
	}
	function cdeThumb_callback() {
		global $post;
		$custom = get_post_custom($post->ID);
		$cdeThumb = esc_url($custom['cdeThumb'][0]);
		?><textarea rows="2" cols="50" name="cdeThumb"><?= $cdeThumb ?></textarea><?php
	}
	function cdeprimarytitle_callback() {
		global $post;
		$custom = get_post_custom($post->ID);
		$cdeprimarytitle = esc_html($custom['cdeprimarytitle'][0]);
		?><textarea rows="2" cols="50" name="cdeprimarytitle"><?= $cdeprimarytitle ?></textarea><?php
	}
	function cdesecondarytitle_callback() {
		global $post;
		$custom = get_post_custom($post->ID);
		$cdesecondarytitle = esc_html($custom['cdesecondarytitle'][0]);
		?><textarea rows="2" cols="50" name="cdesecondarytitle"><?= $cdesecondarytitle ?></textarea><?php
	}
	
	
	function instructor_callback() {
		global $post;
		$custom = get_post_custom($post->ID);
		$instructor = esc_html($custom['instructor'][0]);
		?><textarea rows="2" cols="50" name="instructor"><?= $instructor ?></textarea><?php
	}
	function cdenotes_callback() {
		global $post;
		$custom = get_post_custom($post->ID);
		$cdenotes = esc_html($custom['cdenotes'][0]);
		?><textarea rows="2" cols="50" name="cdenotes"><?= $cdenotes ?></textarea><?php
	}
	function cdealert_callback() {
		global $post;
		$custom = get_post_custom($post->ID);
		$cdealert = esc_html($custom['cdealert'][0]);
		?><textarea rows="2" cols="50" name="cdealert"><?= $cdealert ?></textarea><?php
	}

	
	add_action('save_post', 'save_condented_details');

	function save_condented_details() {
		global $post;
		if (get_post_type($post) == 'condented') {
			update_post_meta($post->ID, 'cdeStartdate', sanitize_text_field($_POST['cdeStartdate']));
			update_post_meta($post->ID, 'cdeEnddate', sanitize_text_field($_POST['cdeEnddate']));
			update_post_meta($post->ID, 'cdeNumber', sanitize_text_field($_POST['cdeNumber']));
			update_post_meta($post->ID, 'cdeThumb', filter_var($_POST['cdeThumb'], FILTER_SANITIZE_URL ));
			update_post_meta($post->ID, 'cdeprimarytitle', sanitize_text_field($_POST['cdeprimarytitle']));
			update_post_meta($post->ID, 'cdesecondarytitle', sanitize_text_field($_POST['cdesecondarytitle']));
			update_post_meta($post->ID, 'instructor', sanitize_text_field($_POST['instructor']));
			update_post_meta($post->ID, 'cdenotes', sanitize_text_field($_POST['cdenotes']));
			update_post_meta($post->ID, 'cdealert', sanitize_text_field($_POST['cdealert']));
			update_post_meta($post->ID, 'rb_cdeInstructionType', sanitize_text_field($_POST['rb_cdeInstructionType']));			
		}
	}
	function add_single_condented_template($template) {
		global $post;
		$single_condented_template = 'single-condented.php';
		$this_dir = dirname(__FILE__);
		if ($post->post_type == 'condented') {
			if (file_exists(get_stylesheet_directory() . '/' . $single_condented_template)) {
				return get_stylesheet_directory() . '/' . $single_condented_template;
			}
			else if (file_exists(get_template_directory() . '/' . $single_condented_template)) {
				return get_template_directory() . '/' . $single_condented_template;
			}
			else { 
				return $this_dir . '/' . $single_condented_template;
			}
		}
        return $template;
	}
   
  endif; 
  
function date_compare($a, $b)
{
    $t1 = strtotime(get_post_meta($a->ID, 'cdeStartdate', true));
    $t2 = strtotime(get_post_meta($b->ID, 'cdeStartdate', true));
    return $t1 - $t2;
}    
function checkIsAValidDate($myDateString){
    return (bool)strtotime($myDateString);
}   
   if ( ! function_exists('cdecurrent_shortcode') ):
  function cdecurrent_shortcode( $atts) 
  {
	  
	   $query = new WP_Query( array( 'post_type' => 'condented' ) ); 
   		$courses = $query->get_posts();
		usort($courses,'date_compare');
		$content= '<table><thead><tr><th style="width:150px">Date</th><th>Course</th></tr></thead><tbody>';
	    foreach ($courses as $course):
			$courseID = $course->ID;
    		$title = $course->post_title;
     		$cdeStartdate = esc_html(get_post_meta($courseID, 'cdeStartdate', true));
			$cdeEnddate = esc_html(get_post_meta($courseID, 'cdeEnddate', true));
			$cdeNumber = esc_html(get_post_meta($courseID, 'cdeNumber', true));
			$cdeThumb='';
			$cdeThumb = esc_url(get_post_meta($courseID, 'cdeThumb', true));
			
			$cdeprimarytitle = esc_html(get_post_meta($courseID, 'cdeprimarytitle', true));
			$cdesecondarytitle = esc_html(get_post_meta($courseID, 'cdesecondarytitle', true));
	   		$instructor = esc_html(get_post_meta($courseID, 'instructor', true));
	  		//$instructtype=get_field('instruction_type', $courseID);
			$instructtype = esc_html(get_post_meta($courseID, 'rb_cdeInstructionType', true));
	  		$lectureimg="//dental.washington.edu/wp-content/media/lecture.png";
	   		$handsonimg="//dental.washington.edu/wp-content/media/tools.png";
	   		$bothimg="//dental.washington.edu/wp-content/media/lecture-tools.png";
			$cdenotes = esc_html(get_post_meta($courseID, 'cdenotes', true));
			$cdealert = esc_html(get_post_meta($courseID, 'cdealert', true));
			$permalink = rtrim(get_permalink($courseID));
			$today = date('Y-m-d');
			$todayPlusOne = date('Y-m-d', strtotime("+1 day"));
		    if(checkIsAValidDate($cdeStartdate)) 
			{  
				$courseStartdate = date_create($cdeStartdate);
				if($cdeStartdate >= $today) { 
					$content.="<tr><td>".date_format($courseStartdate,'D, M j, Y');
					if(($cdeEnddate != '') && (checkIsAValidDate($cdeEnddate)) && ($cdeEnddate > $todayPlusOne))
					{
						$courseEnddate = date_create($cdeEnddate);
						$content.="<br />-".date_format($courseEnddate,'D, M j, Y');
					}
					if($cdeThumb != '')
					{	$content .= '<img src="'.$cdeThumb.'" height="100" width="100" alt="course thumbnail" />';
					}
					$content .="</td><td><a style='padding-left:0' ";
					if($cdeNumber) { $content.='id="'.$cdeNumber.'" '; }
					 $content.='href="'.$permalink.'">';
					
					if($cdeNumber) { $content.=$cdeNumber.": "; }
					$content.= $cdeprimarytitle." ".$cdesecondarytitle."</a><br />";
					if($instructtype=='lecture')
					{ 	$content .='<img src="'.$lectureimg.'" height="25"  alt="lecture icon"  />';
					}
					if($instructtype=='handson')
					{ $content .='<img src="'.$handsonimg.'" height="25"  alt="tools icon"  />';
					}
					if($instructtype=='both')
					{ $content .='<img src="'.$bothimg.'" height="25" alt="lecture & tools icon"   />';
					}
					$content .="<p><strong>".$instructor."</strong></p>";
					
					if($cdealert != ' ') 
					{	$content .= "<span class='wronganswer'>".$cdealert."</span>";
					}
					
					if($cdenotes != ' ') 
					{	$content .= $cdenotes;
					}
					
					$content.="</td></tr>";
				}
				if(($cdeStartdate < $today) && ($cdeEnddate != '') && (checkIsAValidDate($cdeEnddate)) && ($cdeEnddate > $todayPlusOne)) { 
					$content.="<tr><td>".date_format($courseStartdate,'D, M j, Y');
					$courseEnddate = date_create($cdeEnddate);
					$content.="<br />-".date_format($courseEnddate,'D, M j, Y');
					
					if($cdeThumb != '')
					{	$content .= '<img src="'.$cdeThumb.'" height="100" width="100" alt="course thumbnail" />';
					}
					$content .="</td><td><a style='padding-left:0' ";
					
					if($cdeNumber) { $content.='id="'.$cdeNumber.'" '; }
					 $content.='href="'.$permalink.'">';
					
					if($cdeNumber) { $content.=$cdeNumber.": "; }
					$content.= $cdeprimarytitle." ".$cdesecondarytitle."</a><br />";
					
					if($instructtype=='lecture')
					{ 	$content .='<img src="'.$lectureimg.'" height="25"  alt="lecture icon"  />';
					}
					
					if($instructtype=='handson')
					{ $content .='<img src="'.$handsonimg.'" height="25"  alt="tools icon"  />';
					}
					
					if($instructtype=='both')
					{ $content .='<img src="'.$bothimg.'" height="25" alt="lecture & tools icon"   />';
					}
					
					$content .="<p><strong>".$instructor."</strong></p>";
					
					if($cdealert != ' ') 
					{	$content .= "<span class='wronganswer'>".$cdealert." "."</span>";
					}
					
					if($cdenotes != ' ') 
					{	$content .= $cdenotes;
					}
					
					$content.="</td></tr>";					

				}
			}
		 endforeach; 
  	  	 $content .=  "</tbody></table>";
      	 return $content;
  }
endif;
add_shortcode( 'cdecurrent', 'cdecurrent_shortcode' );

   if ( ! function_exists('cdelast_shortcode') ):
  function cdelast_shortcode( $atts) 
  {
	  
	   $query = new WP_Query( array( 'post_type' => 'condented' ) ); 
   		$courses = $query->get_posts();
		usort($courses,'date_compare');
		$content= '<table><thead><tr><th style="width:150px">Date</th><th>Course</th></tr></thead><tbody>';
	    foreach ($courses as $course):
			$courseID = $course->ID;
    		$title = $course->post_title;
     		$cdeStartdate = esc_html(get_post_meta($courseID, 'cdeStartdate', true));
			$cdeEnddate = esc_html(get_post_meta($courseID, 'cdeEnddate', true));
			$cdeNumber = esc_html(get_post_meta($courseID, 'cdeNumber', true));
			$cdeprimarytitle = esc_html(get_post_meta($courseID, 'cdeprimarytitle', true));
			$cdesecondarytitle = esc_html(get_post_meta($courseID, 'cdesecondarytitle', true));
	   		$instructor = esc_html(get_post_meta($courseID, 'instructor', true));

			$instrtype = esc_html(get_post_meta($courseID, 'rb_cdeInstructionType', true));

			$cdenotes = esc_html(get_post_meta($courseID, 'cdenotes', true));
			$cdealert = esc_html(get_post_meta($courseID, 'cdealert', true));
			$permalink = rtrim(get_permalink($courseID));
			$today = date('Y-m-d');
			
		    if(checkIsAValidDate($cdeStartdate)) {  
				$courseStartdate = date_create($cdeStartdate);
				//$courseEnddate = date_create($cdeEnddate);
				if($cdeStartdate < $today) { 
					$content.="<tr><td>".date_format($courseStartdate,'D, M j, Y');
					if(($cdeEnddate != '') && (checkIsAValidDate($cdeEnddate)) && ($cdeEnddate < $today))
					{
						$courseEnddate = date_create($cdeEnddate);
						$content.="<br />-".date_format($courseEnddate,'D, M j, Y');
					}
					$content .="</td><td><a style='padding-left:0' href=".$permalink.">";
					$content.=$cdeNumber.": ".$cdeprimarytitle."</a><br>";
					if(($instrtype) == 'lecture') 
					{   $content .= '<img src="//dental.washington.edu/wp-content/media/lecture.png" height="25" alt="lecture icon" title="Lecture" />';
					}
					else if(($instrtype) == 'handson') 
					{	$content .= '<img src="//dental.washington.edu/wp-content/media/tools.png" height="25" alt="dental tools icon" title="Hands-on" />';
					}
					else if(($instrtype) == 'both') 
					{	$content .= '<img src="//dental.washington.edu/wp-content/media/lecture-tools.png" height="25" alt="lecture and dental tools icon" title="Lecture & Hands-on" />';
					}

					$content .= "<ul><li>".$instructor."</li></ul>";

					if($cdealert != ' ') 
					{	$content .= "<span class='wronganswer'>".$cdealert."</span>";
					}
					
					if($cdenotes != ' ') 
					{	$content .= $cdenotes;
					}
					
					$content.="</td></tr>";
				}
			}
		 endforeach; 
  	  	 $content .=  "</tbody></table>";
      	 return $content;
  	  	  }
endif;
add_shortcode( 'cdelast', 'cdelast_shortcode' );



	//this function sorts two titles */
if ( ! function_exists('coursetitle_sort') ):
function coursetitle_sort($a, $b) {
	 //$titleorder = new SplFixedArray(13);
	 
	
	 $titleorder[0]="dentfn";
	 $titleorder[1]="dentpc";
	 $titleorder[2]="dentcl";
	 $titleorder[3]="dentgp";
	 $titleorder[4]="dentsl";
	 $titleorder[5]="dentel";
	 $titleorder[6]="dent";
	 $titleorder[7]="dphs";
	 $titleorder[8]="endo";
	 $titleorder[9]="oralb";
	 $titleorder[10]="oralm";
	 $titleorder[11]="perio";
	 $titleorder[12]="resd";
	  $titleorder[13]="os";
	    $titleorder[14]="ortho";
	
		
	$first = strtolower($a->post_title);
	$first = rtrim($first,'0-9');
	$first = explode(' ', $first);
	
	$fdept = $first[0];
	$fcourse = $first[1];
	
	
	$second = strtolower($b->post_title);
	$second = rtrim($second,'0-9');
	$second = explode(' ', $second);
	
	$sdept = $second[0];
	$scourse = $second[1];
	
	
	$first_index = array_search($fdept, $titleorder,true);
	$second_index = array_search($sdept, $titleorder,true);
	
	
	//If department name is not found
	if(!first_index && second_index) {
		return -1;
	} elseif (first_index && !second_index) {
		return 1;
	} elseif (!first_index && !second_index) {
		return 1;
	}
	
	
	
	if ($first_index != $second_index) {
		
		return intcmp($first_index, $second_index);
	} else {
		return strcmp($fcourse, $scourse);
	}
}
	
	/*
	if ($first_index) {
		if ($second_index) {
			return strcmp($first_index, $second_index);
		}
		else {
			return -1;
		}
	}
	elseif ($second_index) {
         return 1;
    }
	$first = explode(' ', $first);
	$second = explode(' ', $second);
	return strcmp($first[sizeof($first) - 1], $second[sizeof($second) - 1]);
	
}
*/
endif;

function my_map_meta_cap2( $caps, $cap, $user_id, $args ) {

	/* If editing, deleting, or reading a condented, get the post and post type object. */
	if ( 'edit_condented' == $cap || 'delete_condented' == $cap || 'read_condented' == $cap ) {
		$post = get_post( $args[0] );
		$post_type = get_post_type_object( $post->post_type );

		/* Set an empty array for the caps. */
		$caps = array();
	}

	/* If editing a condented, assign the required capability. */
	if ( 'edit_condented' == $cap ) {
		if ( $user_id == $post->post_author )
			$caps[] = $post_type->cap->edit_posts;
		else
			$caps[] = $post_type->cap->edit_others_posts;
	}

	/* If deleting a condented, assign the required capability. */
	elseif ( 'delete_condented' == $cap ) {
		if ( $user_id == $post->post_author )
			$caps[] = $post_type->cap->delete_posts;
		else
			$caps[] = $post_type->cap->delete_others_posts;
	}

	/* If reading a private condented, assign the required capability. */
	elseif ( 'read_condented' == $cap ) {

		if ( 'private' != $post->post_status )
			$caps[] = 'read';
		elseif ( $user_id == $post->post_author )
			$caps[] = 'read';
		else
			$caps[] = $post_type->cap->read_private_posts;
	}

	/* Return the capabilities required by the user. */
	return $caps;
}
  

//Comparison function for integers
function intcmp($a, $b) {
	if((int)$a == (int)$b) {
		return 0;
	} else if((int)$a  > (int)$b) {
		return 1;
	} else {
		return -1;	
	}
}

// Creating the shortcode 

if ( ! function_exists('coursedept_shortcode') ):
  function coursedept_shortcode( $atts  ) 
  {
	  $a = shortcode_atts( array(
        'dept' => 'resd'
    ), $atts );
                $args = array('post_type' => 'courses', 'posts_per_page' => -1);
                $query = new WP_Query($args);
                $courses = $query->get_posts();
                usort($courses, 'coursetitle_sort');
               		            
    	   	    foreach ($courses as $course):
					   $thisCourse = false;
                       $courseID = $course->ID;
                       $num = $course->post_title;
                       $excerpt = $course->post_excerpt;
                       $course_depts_arr = get_the_terms($courseID, 'course-department');
					   $course_depts = '';
                        if (!empty($course_depts_arr)) {
							$count = 0;
							 foreach ($course_depts_arr as $course_depts_item) {
								
								if($course_depts_item->name == $a['dept'])
								{	$thisCourse = true;
								}
    							if($count == 0)
								{	
                             		 $course_depts = $course_depts . ' ' . $course_depts_item->name;
								}
								else
									$course_depts = $course_depts . ', ' . $course_depts_item->name;
						
								$count++;
                           	 }

						}
                        if($thisCourse == true) {
						 
                       		          		
                                    $short_content .= "<p><a href=" .get_permalink($courseID).">";
                             
                            		$short_content .= $num;
                            	                                    
                               		$short_content .= " ";
                                   
                                    $short_content .= $excerpt."</a></p>";
									
                    }  endforeach;
			
                           
			wp_reset_postdata(); 
			return $short_content;
  }
 
endif;
add_shortcode( 'coursedept', 'coursedept_shortcode' );

if ( ! function_exists('htiles_shortcode') ):
  function htiles_shortcode( $atts  ) 
  {
	  $a = shortcode_atts( array(
        'htile1' => 0,
		 'htile2' =>0,
		  'htile3' =>0
    ), $atts );
	$htile1=$a['htile1'];
	$htile2=$a['htile2'];
	$htile3=$a['htile3'];
	
?>
<div class="on-campus" >
	<div class="uw-on-campus"><h2>At the Dental School</h2></div>
		<div class="container"> 
			<div class="row">
				<div class="box-outer">
					<div class="box three">
                         <div class="tile">
                          <?php $hometilestwo =  get_post($htile1);
			    			 $metatwo = esc_html(get_post_meta($hometilestwo->ID));
							 $thecontenttwo = $hometilestwo->post_content; 
							 $posttitletwo = $hometilestwo->post_title;
							 $hometilestwo_pic = esc_url(get_post_meta($hometilestwo->ID, 'hometile_pic', true));
							 $readmore_texttwo = esc_html(get_post_meta($hometilestwo->ID, 'readmore_text', true));
	   						 $readmore_linktwo = esc_html(get_post_meta($hometilestwo->ID, 'readmore_link', true));
							 $alttwo = esc_html(get_post_meta($hometilestwo->ID, 'hometile_pic_alt', true));
 
								 ?>
                                   
								<div><img class="attachment-homepage_tile wp-post-image" src='<?= $hometilestwo_pic ?>' alt='<?= $alttwo ?>' width="379" height="160" /></div>
								<h2><?= $posttitletwo ?></h2>
								<p class="null">
								<?= $thecontenttwo ?></p>
								<?php if(!empty($readmore_linktwo))
								{ ?>
									<p class="null"><a class="uw-btn btn-sm btn-none" href="<?= $readmore_linktwo ?>"><?= $readmore_texttwo ?></a></p>
                                 <?php } ?>
								</div>
								<div class="tile">
                                 <?php $hometilesone =  get_post($htile2);
								 $meta = esc_html(get_post_meta($hometilesone->ID));
								 $thecontentone = $hometilesone->post_content; 
								 $posttitleone = $hometilesone->post_title;
								 $hometilesone_pic = esc_url(get_post_meta($hometilesone->ID, 'hometile_pic', true));
								 $readmore_textone = esc_html(get_post_meta($hometilesone->ID, 'readmore_text', true));
	   						     $readmore_linkone = esc_html(get_post_meta($hometilesone->ID, 'readmore_link', true));
								 $altone = esc_html(get_post_meta($hometilesone->ID, 'hometile_pic_alt', true));
 
								 ?>
								<div><img class="attachment-homepage_tile wp-post-image" src='<?= $hometilesone_pic ?>' alt='<?= $altone ?>' width="379" height="160" /></div>
								<h2><?= $posttitleone ?></h2>
								<p class="null">
								<?= $thecontentone ?></p>
								<?php if(!empty($readmore_linkone))
										{ ?>
											<p class="null"><a class="uw-btn btn-sm btn-none" href="<?= $readmore_linkone ?>"><?= $readmore_textone ?></a></p>
                                        <?php } ?>
								</div>
								
									<div class="tile"> 
 								 <?php $hometilesthree =  get_post($htile3);
								 $metathree = esc_html(get_post_meta($hometilesthree->ID)); 
								 $thecontentthree = $hometilesthree->post_content; 
								 $posttitlethree = $hometilesthree->post_title;
								 $hometilesthree_pic = esc_url(get_post_meta($hometilesthree->ID, 'hometile_pic', true));
								 $readmore_textthree = esc_html(get_post_meta($hometilesthree->ID, 'readmore_text', true));
	   						      $readmore_linkthree = esc_html(get_post_meta($hometilesthree->ID, 'readmore_link', true));
								  $altthree = esc_html(get_post_meta($hometilesthree->ID, 'hometile_pic_alt', true));
 
								 ?>
                                   
								<div><img class="attachment-homepage_tile wp-post-image" src='<?= $hometilesthree_pic ?>' alt='<?= $altthree ?>' width="379" height="160" /></div>
								<h2><?= $posttitlethree ?></h2>
								<p class="null">
								<?= $thecontentthree ?></p>

								<?php if(!empty($readmore_linkthree))
								{ ?>
								<p class="null"><a class="uw-btn btn-sm btn-none" href="<?= $readmore_linkthree ?>"><?= $readmore_textthree ?></a></p>
                                 <?php } ?>

								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
  <?php
  }
	
	
endif;
add_shortcode( 'htiles', 'htiles_shortcode' );

if ( !function_exists('qw_date_filter_callback')):

function qw_date_filter_callback($args, $filter){
	$args['date_query'] = array(
		array(
			'after'     => '3 months ago',
			
			'inclusive' => true,
		),
	);

	return $args;
}
endif;

?>