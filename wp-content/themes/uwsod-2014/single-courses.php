<?php get_header(); ?>

<?php get_template_part( 'header', 'image' ); ?>

<div class="container uw-body">

  <div class="row">

   <div <?php if(function_exists('uw_content_class')){uw_content_class();} ?> role='main'> 

      <?php uw_site_title(); ?>

      <?php get_template_part('menu', 'mobile'); ?>

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

    <?php get_sidebar() ?>

  </div>

</div>

<?php get_footer(); ?>
