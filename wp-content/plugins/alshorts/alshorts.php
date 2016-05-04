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
			'menu_name' => 'CDE Course'
		);

		$args = array(
			'labels' => $labels,
			'public' => true,
			'publicly_queryable' => true,
			'show_ui' => true,
			'show_in_menu' => true,
			'rewrite' => array('slug' => 'condented', 'with_front' => false)
		);

		register_post_type('condented', $args);
	}


add_action('admin_init', 'condented_admin_init');
   
   function condented_admin_init(){
		
		add_meta_box('cdeStartdate', 'Course Date', 'cdeStartdate_callback', 'condented', 'normal', 'high');
		add_meta_box('cdeEnddate', 'Course Date', 'cdeEnddate_callback', 'condented', 'normal', 'high');
		add_meta_box('cdetitle', 'Long title (not #)', 'cdetitle_callback', 'condented', 'normal', 'high');
		add_meta_box('instructor', 'Instructor', 'instructor_callback', 'condented', 'normal', 'high');
		add_meta_box('cdenotes', 'Notes', 'cdenotes_callback', 'condented', 'normal', 'high');
		add_meta_box('cdealert', 'Alerts', 'cdealert_callback', 'condented', 'normal', 'high');
		
	}


	function cdeStartdate_callback() {
		global $post;
		$custom = get_post_custom($post->ID);
		$cdeStartdate = $custom['cdeStartdate'][0];
		?><textarea rows="2" cols="20" name="cdeStartdate"><?= $cdeStartdate ?></textarea><?php
	}
	function cdeEnddate_callback() {
		global $post;
		$custom = get_post_custom($post->ID);
		$cdeEnddate = $custom['cdeEnddate'][0];
		?><textarea rows="2" cols="20" name="cdeEnddate"><?= $cdeEnddate ?></textarea><?php
	}
	function cdetitle_callback() {
		global $post;
		$custom = get_post_custom($post->ID);
		$cdetitle = $custom['cdetitle'][0];
		?><textarea rows="2" cols="50" name="cdetitle"><?= $cdetitle ?></textarea><?php
	}
	
	
	function instructor_callback() {
		global $post;
		$custom = get_post_custom($post->ID);
		$instructor = $custom['instructor'][0];
		?><textarea rows="2" cols="50" name="instructor"><?= $instructor ?></textarea><?php
	}
	function cdenotes_callback() {
		global $post;
		$custom = get_post_custom($post->ID);
		$cdenotes = $custom['cdenotes'][0];
		?><textarea rows="2" cols="50" name="cdenotes"><?= $cdenotes ?></textarea><?php
	}
	function cdealert_callback() {
		global $post;
		$custom = get_post_custom($post->ID);
		$cdealert = $custom['cdealert'][0];
		?><textarea rows="2" cols="50" name="cdealert"><?= $cdealert ?></textarea><?php
	}

	
	add_action('save_post', 'save_condented_details');

	function save_condented_details() {
		global $post;
		if (get_post_type($post) == 'condented') {
			update_post_meta($post->ID, 'cdeStartdate', $_POST['cdeStartdate']);
			update_post_meta($post->ID, 'cdeEnddate', $_POST['cdeEnddate']);
			update_post_meta($post->ID, 'cdetitle', $_POST['cdetitle']);
			update_post_meta($post->ID, 'instructor', $_POST['instructor']);
			update_post_meta($post->ID, 'cdenotes', $_POST['cdenotes']);
			update_post_meta($post->ID, 'cdealert', $_POST['cdealert']);
			
		
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
		$content= "<table><tbody>";
	    foreach ($courses as $course):
			$courseID = $course->ID;
    		$title = $course->post_title;
     		$cdeStartdate = get_post_meta($courseID, 'cdeStartdate', true);
			$cdeEnddate = get_post_meta($courseID, 'cdeEnddate', true);
			$cdetitle = get_post_meta($courseID, 'cdetitle', true);
	   		$instructor = get_post_meta($courseID, 'instructor', true);
			$cdenotes = get_post_meta($courseID, 'cdenotes', true);
			$cdealert = get_post_meta($courseID, 'cdealert', true);
			$permalink = rtrim(get_permalink($courseID));
			$today = date('m-d-Y');
			
		    if(checkIsAValidDate($cdeStartdate)) {  
			$courseStartdate = date_create($cdeStartdate);
			if(date_format($courseStartdate,'m-d-Y') > $today) { 
				$content.="<tr><td>".date_format($courseStartdate,'l, M j, Y');
				if(($cdeEnddate != '') && (checkIsAValidDate($cdeEnddate)))
				{
					$courseEnddate = date_create($cdeEnddate);
					$content.="<br />-".date_format($courseEnddate,'l, M j, Y');
				}
				$content .="</td><td><a style='padding-left:0' href=".$permalink.">";
				$content.=$title.": ".$cdetitle."</a><ul><li>".$instructor."</li></ul>";
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
add_shortcode( 'cdecurrent', 'cdecurrent_shortcode' );

   if ( ! function_exists('cdeclast_shortcode') ):
  function cdelast_shortcode( $atts) 
  {
	  
	   $query = new WP_Query( array( 'post_type' => 'condented' ) ); 
   		$courses = $query->get_posts();
		usort($courses,'date_compare');
		$content= "<table><tbody>";
	    foreach ($courses as $course):
			$courseID = $course->ID;
    		$title = $course->post_title;
     		$cdeStartdate = get_post_meta($courseID, 'cdeStartdate', true);
			$cdeEnddate = get_post_meta($courseID, 'cdeEnddate', true);
			$cdetitle = get_post_meta($courseID, 'cdetitle', true);
	   		$instructor = get_post_meta($courseID, 'instructor', true);
			$cdenotes = get_post_meta($courseID, 'cdenotes', true);
			$cdealert = get_post_meta($courseID, 'cdealert', true);
			$permalink = rtrim(get_permalink($courseID));
			$today = date('m-d-Y');
			
		    if(checkIsAValidDate($cdeStartdate)) {  
			$courseStartdate = date_create($cdeStartdate);
			if(date_format($courseStartdate,'m-d-Y') < $today) { 
				$content.="<tr><td>".date_format($courseStartdate,'l, M j, Y');
				if(($cdeEnddate != '') && (checkIsAValidDate($cdeEnddate)))
				{
					$courseEnddate = date_create($cdeEnddate);
					$content.="<br />-".date_format($courseEnddate,'l, M j, Y');
				}
				$content .="</td><td><a style='padding-left:0' href=".$permalink.">";
				$content.=$title.": ".$cdetitle."</a><ul><li>".$instructor."</li></ul>";
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
                            	                                    
                               		$short_content .= ": ";
                                   
                                    $short_content .= $excerpt."</a></p>";
									
                    }  endforeach;
			
                           
			wp_reset_postdata(); 
			return $short_content;
  }
 
endif;
add_shortcode( 'coursedept', 'coursedept_shortcode' );
?>