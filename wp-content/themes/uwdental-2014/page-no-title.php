<?php
/**
 * Template Name: No Title
 */
?>
<?php get_header(); 
?>

<div class="uw-body">

  <div class="row">

    <div role='main'>
   
      <a href="<?php echo home_url('/'); ?>" title="<?php echo esc_attr( get_bloginfo() ) ?>"><h2 class="uw-site-title"><?php bloginfo(); ?></h2></a>

      <div id='main_content' class="uw-body-copy" tabindex="-1">

        <?php
          // Start the Loop.
          while ( have_posts() ) : the_post();

            /*
             * Include the post format-specific template for the content. If you want to
             * use this in a child theme, then include a file called called content-___.php
             * (where ___ is the post format) and that will be used instead.
             */
         get_template_part( 'content', 'no-title' );

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
