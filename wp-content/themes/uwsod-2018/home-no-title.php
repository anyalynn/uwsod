<?php
/**
 * Template Name: Home No Title
 */
?>
<?php get_header(); ?>


<div class="home uw-body">

  <div class="row">

    <div role='main' class="uw-content" >
   
      <div class="uw-hero-image hero-blank no-title">
  <h1 class="container uw-site-title-blank">Home</h1>
</div>
                         
      <div id='main_content' class="uw-body-copy" tabindex="-1">
   <?php  if ( function_exists( 'soliloquy' ) ) { soliloquy( '14466' ); }  ?>    
         
         <div class="row">
			
<?php get_template_part( 'quicklinks' ); ?>
            </div>
      
            <?php
          // Start the Loop.
          while ( have_posts() ) : the_post();

            /*
             * Include the post format-specific template for the content. If you want to
             * use this in a child theme, then include a file called called content-___.php
             * (where ___ is the post format) and that will be used instead.
             */
      	 the_content(); 

            // If comments are open or we have at least one comment, load up the comment template.
            if ( comments_open() || get_comments_number() ) {
              comments_template();
            }

          endwhile;
        ?>
       </div>
        
             

		
	    </div>
  </div>


<?php get_footer(); ?>
