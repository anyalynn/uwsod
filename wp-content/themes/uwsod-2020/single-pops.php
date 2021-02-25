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
				$contactName = get_post_meta($theID, 'contactName', true);	
				$contactEmail = get_post_meta($theID, 'contactEmail', true);	
				$contactPhone = get_post_meta($theID, 'contactPhone', true);
				$website = get_post_meta($theID, 'website', true);
				$location = get_post_meta($theID, 'location', true);
				$affiliation = get_post_meta($theID, 'affiliation', true);
				$practiceName = get_post_meta($theID, 'practiceName', true);	
				
				if ($contactName) { echo "<p><strong>Contact Name</strong>: " . $contactName . "<br />"; }
				if ($contactEmail) { echo "<strong>Contact Email</strong>: " . "<a href=\"mailto:$contactEmail\">$contactEmail</a>" . "<br />"; }
				if ($contactPhone) { echo "<strong>Contact Phone</strong>: " . $contactPhone . "<br />"; }
				if ($website) { echo "<strong>Website</strong>: " . make_clickable($website) . "<br />"; }
				if ($location) { echo "<strong>Location</strong>: " . $location . "<br />"; }
				if ($affiliation) { echo "<strong>Affiliation</strong>: " . $affiliation . "<br />"; }
				if ($practiceName) { echo "<strong>Practice Name</strong>: " . $practiceName; }
			
	echo "</p><p><strong>Opportunity</strong>:</p>";
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
