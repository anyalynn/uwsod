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
			'menu_name' => 'CDE Courses'
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
		
		add_meta_box('cdeStartdate', 'Course Start Date', 'cdeStartdate_callback', 'condented', 'normal', 'high');
		add_meta_box('cdeEnddate', 'Course End Date', 'cdeEnddate_callback', 'condented', 'normal', 'high');
		add_meta_box('cdeThumb', 'CDE Thumbnail', 'cdeThumb_callback', 'condented', 'normal', 'high');
		add_meta_box('cdeNumber', 'CDE Number', 'cdeNumber_callback', 'condented', 'normal', 'high');
		add_meta_box('cdeprimarytitle', 'Primary title', 'cdeprimarytitle_callback', 'condented', 'normal', 'high');
		add_meta_box('cdesecondarytitle', 'Secondary title', 'cdesecondarytitle_callback', 'condented', 'normal', 'high');
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
	function cdeNumber_callback() {
		global $post;
		$custom = get_post_custom($post->ID);
		$cdeNumber = $custom['cdeNumber'][0];
		?><textarea rows="2" cols="50" name="cdeNumber"><?= $cdeNumber ?></textarea><?php
	}
	function cdeThumb_callback() {
		global $post;
		$custom = get_post_custom($post->ID);
		$cdeThumb = $custom['cdeThumb'][0];
		?><textarea rows="2" cols="50" name="cdeThumb"><?= $cdeThumb ?></textarea><?php
	}
	function cdeprimarytitle_callback() {
		global $post;
		$custom = get_post_custom($post->ID);
		$cdeprimarytitle = $custom['cdeprimarytitle'][0];
		?><textarea rows="2" cols="50" name="cdeprimarytitle"><?= $cdeprimarytitle ?></textarea><?php
	}
	function cdesecondarytitle_callback() {
		global $post;
		$custom = get_post_custom($post->ID);
		$cdesecondarytitle = $custom['cdesecondarytitle'][0];
		?><textarea rows="2" cols="50" name="cdesecondarytitle"><?= $cdesecondarytitle ?></textarea><?php
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
			update_post_meta($post->ID, 'cdeNumber', $_POST['cdeNumber']);
			update_post_meta($post->ID, 'cdeThumb', $_POST['cdeThumb']);
			update_post_meta($post->ID, 'cdeprimarytitle', $_POST['cdeprimarytitle']);
			update_post_meta($post->ID, 'cdesecondarytitle', $_POST['cdesecondarytitle']);
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
		$content= '<table><thead><tr><th style="width:150px">Date</th><th>Course</th></tr></thead><tbody>';
	    foreach ($courses as $course):
			$courseID = $course->ID;
    		$title = $course->post_title;
     		$cdeStartdate = get_post_meta($courseID, 'cdeStartdate', true);
			$cdeEnddate = get_post_meta($courseID, 'cdeEnddate', true);
			$cdeNumber = get_post_meta($courseID, 'cdeNumber', true);
			$cdeThumb='';
			$cdeThumb = get_post_meta($courseID, 'cdeThumb', true);
			
			$cdeprimarytitle = get_post_meta($courseID, 'cdeprimarytitle', true);
			$cdesecondarytitle = get_post_meta($courseID, 'cdesecondarytitle', true);
	   		$instructor = get_post_meta($courseID, 'instructor', true);
			$cdenotes = get_post_meta($courseID, 'cdenotes', true);
			$cdealert = get_post_meta($courseID, 'cdealert', true);
			$permalink = rtrim(get_permalink($courseID));
			$today = date('Y-m-d');
			
		    if(checkIsAValidDate($cdeStartdate)) {  
			$courseStartdate = date_create($cdeStartdate);
			if($cdeStartdate > $today) { 
				$content.="<tr><td>".date_format($courseStartdate,'D, M j, Y');
				if(($cdeEnddate != '') && (checkIsAValidDate($cdeEnddate)))
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
				$content.= $cdeprimarytitle." ".$cdesecondarytitle."</a><br/><ul><li>".$instructor."</li></ul>";
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
			$cdeNumber = get_post_meta($courseID, 'cdeNumber', true);
			$cdeprimarytitle = get_post_meta($courseID, 'cdeprimarytitle', true);
			$cdesecondarytitle = get_post_meta($courseID, 'cdesecondarytitle', true);
	   		$instructor = get_post_meta($courseID, 'instructor', true);
			$cdenotes = get_post_meta($courseID, 'cdenotes', true);
			$cdealert = get_post_meta($courseID, 'cdealert', true);
			$permalink = rtrim(get_permalink($courseID));
			$today = date('Y-m-d');
			
		    if(checkIsAValidDate($cdeStartdate)) {  
			$courseStartdate = date_create($cdeStartdate);
			if($cdeStartdate < $today) { 
				$content.="<tr><td>".date_format($courseStartdate,'l, M j, Y');
				if(($cdeEnddate != '') && (checkIsAValidDate($cdeEnddate)))
				{
					$courseEnddate = date_create($cdeEnddate);
					$content.="<br />-".date_format($courseEnddate,'l, M j, Y');
				}
				$content .="</td><td><a style='padding-left:0' href=".$permalink.">";
				$content.=$cdeNumber.": ".$cdeprimarytitle."</a><ul><li>".$instructor."</li></ul>";
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
								 $metatwo = get_post_meta($hometilestwo->ID);
								 $thecontenttwo = $hometilestwo->post_content; 
								 $posttitletwo = $hometilestwo->post_title;
								 $hometilestwo_pic = get_post_meta($hometilestwo->ID, 'hometile_pic', true);
								 $readmoretwo = get_post_meta($hometilestwo->ID, 'readmore', true);
								 $alttwo = get_post_meta($hometilestwo->ID, 'hometile_pic_alt', true);
 
								 ?>
                                   
								<div><img class="attachment-homepage_tile wp-post-image" src='<?= $hometilestwo_pic ?>' alt='<?= $alttwo ?>' width="379" height="160" /></div>
										<h2><?= $posttitletwo ?></h2>
										<p class="null">
										<?= $thecontenttwo ?></p>


										<?php if(!empty($readmoretwo))
										{ ?>
										<p class="null"><a class="uw-btn btn-sm btn-none" href="<?= $readmoretwo ?>">Read more</a></p>
                                        <? } ?>

									</div>
								<div class="tile">
                                 <?php $hometilesone =  get_post($htile2);
								 $meta = get_post_meta($hometilesone->ID);
								 $thecontentone = $hometilesone->post_content; 
								 $posttitleone = $hometilesone->post_title;
								 $hometilesone_pic = get_post_meta($hometilesone->ID, 'hometile_pic', true);
								 $readmoreone = get_post_meta($hometilesone->ID, 'readmore', true);
								  $altone = get_post_meta($hometilesone->ID, 'hometile_pic_alt', true);
 
								 ?>
								<div><img class="attachment-homepage_tile wp-post-image" src='<?= $hometilesone_pic ?>' alt='<?= $altone ?>' width="379" height="160" /></div>
								<h2><?= $posttitleone ?></h2>
								<p class="null">
								<?= $thecontentone ?></p>
								<?php if(!empty($readmoreone))
										{ ?>
										<p class="null"><a class="uw-btn btn-sm btn-none" href="<?= $readmoreone ?>">Read more</a></p>
                                        <? } ?>
								</div>
								
									<div class="tile"> 
 								 <?php $hometilesthree =  get_post($htile3);
								 $metathree = get_post_meta($hometilesthree->ID);
								 $thecontentthree = $hometilesthree->post_content; 
								 $posttitlethree = $hometilesthree->post_title;
								 $hometilesthree_pic = get_post_meta($hometilesthree->ID, 'hometile_pic', true);
								 $readmorethree = get_post_meta($hometilesthree->ID, 'readmore', true);
								  $altthree = get_post_meta($hometilesthree->ID, 'hometile_pic_alt', true);
 
								 ?>
                                   
								<div><img class="attachment-homepage_tile wp-post-image" src='<?= $hometilesthree_pic ?>' alt='<?= $altthree ?>' width="379" height="160" /></div>
										<h2><?= $posttitlethree ?></h2>
										<p class="null">
										<?= $thecontentthree ?></p>

										<?php if(!empty($readmorethree))
										{ ?>
										<p class="null"><a class="uw-btn btn-sm btn-none" href="<?= $readmorethree ?>">Read more</a></p>
                                        <? } ?>

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

?>