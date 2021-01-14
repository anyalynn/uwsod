<?php get_template_part( 'header', 'search' );  
   $sidebar = get_post_meta($post->ID, "sidebar"); ?>

<div class="container uw-body">

  <div class="row">

    <div class="col-md-<?php echo ((!isset($sidebar[0]) || $sidebar[0]!="on") ? "8" : "12" ) ?> uw-content" role='main'>
 

      
      <?php get_template_part( 'breadcrumbs' ); ?>

       
  <h1 class="search-title">  Search results: </h1>
  <gcse:search></gcse:search>

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
