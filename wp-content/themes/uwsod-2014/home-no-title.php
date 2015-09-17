<?php
/**
 * Template Name: Home No Title
 */
?>
<?php get_header(); 
?>


<div class="home uw-body">

  <div class="row">

    <div role='main' class="uw-content" >
   
      <a href="//dental.washington.edu" title="<?php echo esc_attr( get_bloginfo() ) ?>"><h2 class="uw-site-title"><?php bloginfo(); ?></h2></a>

      <div id='main_content' class="uw-body-copy" tabindex="-1">
      <h1 class="no-title"><?php the_title() ?></h1>
      <div style="margin-right:40px;">
 <?php if (is_front_page()) { get_template_part( 'menu', 'mobile' ); }?>
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
        <div class="row">
			
<?php get_template_part( 'quicklinks' ); ?>
            </div>
             

		<?php	get_template_part('on-campus');?>
	    </div>
  </div>


<?php get_footer(); ?>