<?php
/*
Template Name: Single Person
*/

//helper functions
include 'template_functions.php';
?>

<?php get_header(); ?>
				
<?php get_template_part( 'header', 'image' ); ?>

<div class="container uw-body">

  <div class="row">

    <div class="col-md-8 uw-content" role='main' id="main_content">
     
      <?php get_template_part( 'breadcrumbs' ); ?>

      <div class="uw-body-copy">
						
					<?php while ( have_posts() ) : the_post(); ?>
				
						
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<?php $meta = get_post_meta(get_the_ID()); ?>

							
						<div class="entry-content">
                         <?php $title = get_the_title();
						 	$degrees = esc_html( $meta['degrees'][0] );
                             $main_pic = esc_url( $meta['main_pic'][0] );
                            if (!empty($main_pic)) { ?>
							    <img class='people-image' src=<?= $main_pic ?> alt=<?= $title ?> />
                            <?php }
                            $office_location =  $meta['office_location'][0] ;
                            
                            $location_present = false;
                            if (!empty($office_location)){
                                $location_present = true;
                            } ?>
                                <div class='people-contact<?php if ($location_present) { ?> big-people-contact<?php } if (empty($main_pic)) { ?> wide-people-contact<?php } ?>'>
                                
                                <?php 
							if (!empty($title)): ?>
							<h1><?= $title ?> <?php endif; ?>
                             <?php if (!empty($degrees)) : ?> ,  
                            <?= $degrees ?> <?php endif; ?> </h1>
							
					
                                
								<p class="title"><?= esc_html( $meta['position'][0] ) ?>                            
                               
								<?php 
								if (!empty(esc_html( $meta['position2'][0] ))){ ?>
									
									<br /><?= $meta['position2'][0] ?> 
									<?php
								}?>
                                </p><div class='contact<?php if ($location_present && $hours_present) { ?> big-contact<?php } ?>'>
									<p><?=  $meta['phone'][0]  ?></p>
									<?php $email =  $meta['email'][0] ; ?>
									 <?php if (($email)){
                                    ?><p> <a href="mailto:<?= $email ?> "><?= $email ?></a></p><?php
                                } ?>
									
                                    <?php if ($location_present){
                                        ?><p><?= $office_location ?></p><?php
                                    }
                                     ?>
								</div>
							</div>
							<div class="people-info">
								<?php the_content(); ?>
							</div>
							<?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'uw' ) . '</span>', 'after' => '</div>' ) ); ?>
						</div><!-- .entry-content -->
						<footer class="entry-meta">
              <?php the_tags('This article was posted under: ', ', ', '<br />'); ?> 
							<?php edit_post_link( __( 'Edit', 'uw' ), '<span class="edit-link">', '</span>' ); ?>
						</footer><!-- .entry-meta -->
					</article><!-- #post-<?php the_ID(); ?> -->
				
							<?php comments_template( '', true ); ?>
				
					<?php endwhile; // end of the loop. ?>
				 </div>

    </div>

    <?php get_sidebar() ?>

  </div>

</div>

<?php 
get_footer(); ?>
