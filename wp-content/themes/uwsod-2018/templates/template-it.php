<?php
/**
 * Template Name: IT Page
 */
?>

<?php get_header(); 
      $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
      if(!$url){
        $url = "https://dental.washington.edu/wp-content/media/cyber-18.jpg";
      }
      $mobileimage = get_post_meta($post->ID, "mobileimage");
      $hasmobileimage = '';
      if( !empty($mobileimage) && $mobileimage[0] !== "") {
        $mobileimage = $mobileimage[0];
        $hasmobileimage = 'hero-mobile-image';
      }
      $sidebar = get_post_meta($post->ID, "sidebar");
      $banner = get_post_meta($post->ID, "banner");
      $buttontext = get_post_meta($post->ID, "buttontext");
      $buttonlink = get_post_meta($post->ID, "buttonlink");   ?>


<div class="uw-body">
	<div class="row">
		<div class="uw-hero-image hero-height2 <?php echo $hasmobileimage ?>" style="background-image: url(<?php echo $url ?>);">
         
	      	<div class="container">
           
			  	<h1 >Information Technology</h1>
	        	<span class="udub-slant"><span></span></span>
        
			</div>
	 	</div>
	    <div class="col-md-<?php echo (($sidebar[0]!="on") ? "8" : "12" ) ?> uw-content" role='main'>
   	
		<?php get_template_part( 'breadcrumbs' ); ?>

			<div id='main_content' class="uw-body-copy" tabindex="-1">

			<?php
    	      while ( have_posts() ) : the_post(); 

        	    //the_content();
            	get_template_part( 'content', 'page-header' );

	            // If comments are open or we have at least one comment, load up the comment template.
    	        if ( comments_open() || get_comments_number() ) {
        	      comments_template();
            	}

		        endwhile;
          
        	?>

	      </div>
	    </div>
	    <div id="sidebar"><?php 
    	  if($sidebar[0]!="on"){
        	get_sidebar();
	      }
    	?></div>
  </div>
</div>

<?php get_footer(); ?>


