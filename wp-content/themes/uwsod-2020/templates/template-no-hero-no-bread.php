<?php
/**
 * Template Name: No image No bread
 */
?>

<?php get_header(); ?>
    
<?php $sidebar = get_post_meta($post->ID, "sidebar");   ?>

<div class="container" role='main'> 

	
</div>
<h1 class="container uw-site-title-blank"><?php the_title(); ?></h1>
	<div class="container uw-body">
	  	<div class="row">
			  <div class="col-md-12 uw-content" >

    	  		<div id='main_content' class="uw-body-copy" tabindex="-1">
					
        <?php
          // Start the Loop.
          while ( have_posts() ) : the_post();

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

</div>
    
<div style="margin-top:-20px"></div>
<?php get_footer(); ?>

