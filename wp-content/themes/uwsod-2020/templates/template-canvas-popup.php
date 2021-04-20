<?php
/**
 * Template Name: Canvas Popup
 */
?>

<?php get_header-popup();
      $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
      if(!$url){
        $url = "https://dental.washington.edu/wp-content/media/Campus_Drone_Shots0042Crop-scaled.jpg";
      }
      $mobileimagesrc = get_post_meta($post->ID, "mobileimage");
      $hasmobileimage = '';
      if( !empty($mobileimagesrc) && $mobileimagesrc[0] !== "") {
        $mobileimage = $mobileimagesrc[0];
        $hasmobileimage = 'hero-mobile-image';
      }
      $sidebar = get_post_meta($post->ID, "sidebar");
      $banner = get_post_meta($post->ID, "banner");
      $buttontext = get_post_meta($post->ID, "buttontext");
      $buttonlink = get_post_meta($post->ID, "buttonlink");   ?>


<div class="uw-hero-image hero-height2 <?php echo $hasmobileimage ?>" style="background-image: url(<?php echo $url ?>);">
    <?php if( isset($mobileimage)) { ?>
        <div class="mobile-image" style="background-image: url(<?php echo $mobileimage ?>);"></div>
      <?php } ?>
     
      <div class="container">
        <div id="hashtag" class="mask"><span><span><?php echo $banner[0] ? $banner[0] : ''; ?></span></span></div>
        <?php if(!empty($banner) && $banner[0]){ ?>
        <div id="hashtag"><span><span><?php echo $banner[0] ? $banner[0] : ''; ?></span></span></div>
        <?php } ?>
        
        <h1 class="uw-site-title2"><?php the_title(); ?></h1>
        <span class="udub-slant"><span></span></span>
        <?php if(!empty($buttontext) && $buttontext[0]){ ?>
        <a class="uw-btn btn-sm btn-none" href="<?php echo $buttonlink[0] ? $buttonlink[0] : ''; ?>"><?php echo $buttontext[0] ? $buttontext[0] : ''; ?></a> 
        <?php } ?>     
      </div>
</div>

<div class="container uw-body">
  <div class="row">
    <div class="hero-content col-md-<?php echo (($sidebar[0]!="on") ? "8" : "12" ) ?> uw-content" role='main'>
   

      <?php get_template_part( 'breadcrumbs' ); ?>

      <div id='main_content' class="uw-body-copy" tabindex="-1">

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

    <div id="sidebar"><?php 
      if($sidebar[0]!="on"){
        get_sidebar();
      }
    ?></div>

  </div>

</div>

<?php get_footer(); ?>


