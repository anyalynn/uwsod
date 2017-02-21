<?php get_header(); ?>

<?php get_template_part( 'header', 'image' ); ?>

<div class="container uw-body">

  <div class="row">

   <div <?php if(function_exists('uw_content_class')){uw_content_class();} ?> role='main'> 

      <?php uw_site_title(); ?>

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
				echo "<h2>" . get_post_meta($theID, 'cdesecondarytitle', true) . "</h2>";
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
				echo "<span class='wronganswer'>".$cdealert."</span>";
	
       			the_content();
   				endwhile;
  			?>

          

      </div>

    </div>

    <?php get_sidebar() ?>

  </div>

</div>

<?php get_footer(); ?>
