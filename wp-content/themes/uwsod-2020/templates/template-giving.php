<?php
/**
  * Template Name: Giving
  */
?>

<?php get_header(); 
   $sidebar = get_post_meta($post->ID, "sidebar"); ?>

<?php get_template_part( 'header', 'image' ); ?>

<div class="container uw-body">

  <div class="row">

    <div class="col-md-<?php echo ((!isset($sidebar[0]) || $sidebar[0]!="on") ? "8" : "12" ) ?> uw-content" role='main'>

      
      <?php get_template_part( 'breadcrumbs' ); ?>


      <div id='main_content' class="uw-body-copy" tabindex="-1">

      

        <?php  if (array_key_exists('QUERY_STRING', $_SERVER)) {
                $uri = $_SERVER['QUERY_STRING'];
                } else {
                $uri = 'source_typ=3&amp;source=DENCMP,DEDISC,VADCFD,RPFEND,HSBDEN&appeal=DEP21';
                }
              
            ?>
             
                
         <?php 

          // Start the Loop.
          while ( have_posts() ) : the_post();

            /*
             * Include the post format-specific template for the content. If you want to
             * use this in a child theme, then include a file called called content-___.php
             * (where ___ is the post format) and that will be used instead.
             */
            get_template_part( 'content', 'page' );
            ?>
            
             <iframe src="https://online.gifts.washington.edu/secure/makeagift/givingopps.aspx?<?php echo $uri ?> " width="700" height="750">
             Your browser does not support iframes.
            </iframe>

            <?php

            // If comments are open or we have at least one comment, load up the comment template.
            if ( comments_open() || get_comments_number() ) {
              comments_template();
            }

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
