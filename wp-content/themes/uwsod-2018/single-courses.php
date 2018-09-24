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
<h1>
<?php the_title() ?>
</h1>

<?php

    
    the_content();
    //comments_template(true);

			

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
