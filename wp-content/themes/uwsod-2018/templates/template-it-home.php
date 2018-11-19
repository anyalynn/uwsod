<?php
/**
 * Template Name: IT Home
 */
?>

<?php get_header(); 
      $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
      if(!$url){
        $url = get_site_url() . "/wp-content/themes/uw-2014/assets/headers/suzzallo.jpg";
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
  		<div class="row">
            
			<div class="it">
					<?php get_template_part( 'itquicklinks' ); ?>
			</div>
   		</div>
		<div id='main_content' class="uw-body-copy" tabindex="-1">
  			<div class="col-md-12">
   
		        <?php
		          while ( have_posts() ) : the_post(); 
            			//the_content();
		            get_template_part( 'content', 'page-noheader' );

           			// If comments are open or we have at least one comment, load up the comment template.
		            if ( comments_open() || get_comments_number() ) {
           			  comments_template();
		            }

		          endwhile;
         
			     ?>

			</div>
		</div>
  	</div>
</div>


<?php get_footer(); ?>


