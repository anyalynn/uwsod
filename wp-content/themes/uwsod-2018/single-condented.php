<?php get_header(); 
   $sidebar = get_post_meta($post->ID, "sidebar"); ?>

<?php get_template_part( 'header', 'image' ); ?>

<div class="container uw-body">

  <div class="row">

    <div class="col-md-<?php echo ((!isset($sidebar[0]) || $sidebar[0]!="on") ? "8" : "12" ) ?> uw-content" role='main'>

      
      <?php get_template_part( 'breadcrumbs' ); ?>


      <div id='main_content' class="uw-body-copy" tabindex="-1">

  			<?php
  				// Start the Loop.
		  		
  				while ( have_posts() ) : the_post();
				/*
				* Include the post format-specific template for the content. If you want to
				 * use this in a child theme, then include a file called called content-___.php
				 * (where ___ is the post format) and that will be used instead.
  				 */
			

		  		?>
				<h1><?php the_title() ?></h1>

				<?php
				$theID = get_the_ID();
				$cdeNumber = get_post_meta($theID, 'cdeNumber', true);	
				$cdesecondarytitle = get_post_meta($theID, 'cdesecondarytitle', true);	
				if ($cdesecondarytitle) { echo '<h2 class="cdesecondtitle">' . $cdesecondarytitle . "</h2>"; }
				echo "<p><strong>" . get_post_meta($theID, 'instructor', true) ."</strong></p>";	

				$instrtype = get_post_meta( $post->ID, 'rb_cdeInstructionType', true);
				if(($instrtype) == 'lecture') 
				{   echo('<img src="//dental.washington.edu/wp-content/media/lecture.png" height="25" alt="lecture icon" /><strong> Lecture</strong>');
				}
 				else if(($instrtype) == 'handson') 
  				{	echo('<img src="//dental.washington.edu/wp-content/media/tools.png" height="25" alt="dental tools icon" /><strong> Hands-on</strong>');
				}
 				else if(($instrtype) == 'both') 
  				{	echo('<img src="//dental.washington.edu/wp-content/media/lecture-tools.png" height="25" alt="lecture and dental tools icon" /><strong> Lecture & Hands-on</strong>');
				}
	
				echo "<p>" . get_post_meta($theID, 'cdenotes', true) . "</p>";
				//echo get_post_meta($theID, 'cdealert', true);
				$cdealert = get_post_meta($theID, 'cdealert', true);
				echo "<p class='wronganswer'>".$cdealert."</p>";
	
       			the_content();
   				endwhile;
  			?>

          
 </div>

    </div>

  
          <div id="sidebar"><?php 
      if(!isset($sidebar[0]) || $sidebar[0]!="on"){
        get_sidebar();
      }
    ?></div>


  </div>

</div>

<?php get_footer(); ?>
