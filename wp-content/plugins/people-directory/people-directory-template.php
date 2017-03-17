<?php
/*
Template Name: People Directory
*/

//helper functions
include 'template_functions.php';
?>

<?php get_header(); ?>

		<?php get_template_part( 'header', 'image' ); ?>

<div class="container uw-body" >

  <div class="row">

    <div class="col-md-12 uw-content" role='main' id="main_content">

      <a href=" <?php echo home_url('/'); ?> " title="<?php echo esc_attr( get_bloginfo() ) ?>"><h2 class="uw-site-title"><?php bloginfo(); ?></h2></a>

     

      <div class="uw-body-copy">


        <?php
          // Start the Loop.
          while ( have_posts() ) : the_post();
          ?>
          
				
      <?php uw_breadcrumbs(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="entry-header">
                    <h1 class="hide"><?php echo apply_filters('italics', get_the_title()); ?></h1>
                </header><!-- .entry-header -->

           <!--    <div id="filter">
                    <input id='livesearch' type="search" name="filter" value="Search" />
                </div> -->
                
                <?php
                $args = array('post_type' => 'people', 'posts_per_page' => -1);
                $query = new WP_Query($args);
                $people = $query->get_posts();
                usort($people, 'last_name_sort');
                $people[0]->post_title;
				  $name_link = true;
                ?>

            
            
		<div id="options">
      	<ul id="filters" class="option-set clearfix" data-option-key="filter">
        <li><a href="#filter" data-option-value="*" class="selected">show all</a></li>
         <li><a href="#filter" data-option-value=".faculty">Faculty</a></li>
          <li><a href="#filter" data-option-value=".staff">Staff</a></li>
            <li><a href="#filter" data-option-value=".affiliate">Affiliate Faculty</a></li>
  		<li><a href="#filter" data-option-value=".endo">Endodontics</a></li>
  		<li><a href="#filter" data-option-value=".ohs">Oral Health Sciences</a></li>
		<li><a href="#filter" data-option-value=".oms">Oral and Maxillofacial Surgery</a></li>
		<li><a href="#filter" data-option-value=".oralmed">Oral Medicine</a></li>
		<li><a href="#filter" data-option-value=".ortho">Orthodontics</a></li>
        <li><a href="#filter" data-option-value=".pedo">Pediatric Dentistry</a></li>
	    <li><a href="#filter" data-option-value=".perio">Periodontics</a></li>
    	<li><a href="#filter" data-option-value=".restore">Restorative Dentistry</a></li>
        <li><a href="#filter" data-option-value=".fp">Faculty Practice</a></li>
      </ul>
  	</div> <!-- #options -->
    <?php
    
	   	    $teams = dont_group_by_team($people); 
	   
            foreach($teams as $team => $people):
               if (count($people) != 0): 	//just in case there are zero people in a manually specified team (or Team No-Team) 
{ ?>
                   <div id='isotope' class='searchable-container clearfix'>
                    <?php foreach ($people as $person):
                        $personID = $person->ID;
                        $name = $person->post_title;
                        $main_pic = get_post_meta($personID, 'main_pic', true);
                        $position = get_post_meta($personID, 'position', true);
                        $phone = get_post_meta($personID, 'phone', true);
                        $email = get_post_meta($personID, 'email', true);
                        $person_teams_arr = get_the_terms($personID, 'teams');
						$team_class = '';
                        $person_teams = '';
						$content=$person->post_content;
                        if (!empty($person_teams_arr)) {
							$count = 0;
                            foreach ($person_teams_arr as $person_teams_item) {
								if ($person_teams_item->name == 'Faculty') {
									$team_class  .= ' faculty ';
								}
								if ($person_teams_item->name == 'Staff') {
									$team_class  .= ' staff ';
								}
								if ($person_teams_item->name == 'Affiliate Faculty') {
									$team_class  .= ' affiliate ';
								}
								if ($person_teams_item->name == 'Endodontics') {
									$team_class  .= ' endo ';
								}
								if ($person_teams_item->name == 'Periodontics') {
									$team_class .= ' perio ';
								}
								if ($person_teams_item->name == 'Pediatric Dentistry') {
									$team_class .= ' pedo ';
								}
								if ($person_teams_item->name == 'Restorative Dentistry') {
									$team_class .= ' restore ';
								}
								if ($person_teams_item->name == 'Oral Health Sciences') {
									$team_class .=  ' ohs ';
								}
								if ($person_teams_item->name == 'Oral and Maxillofacial Surgery') {
									$team_class .=  ' oms ';
								}
								if ($person_teams_item->name == 'Oral Medicine') {
									$team_class .= ' oralmed ';
								}
								if ($person_teams_item->name == 'Orthodontics') {
									$team_class .= ' ortho ';
								}
								if ($person_teams_item->name == 'Faculty Practice') {
									$team_class .= ' fp ';
								}
								if($count == 0)
								{	
                               		 $person_teams = $person_teams . ' ' . $person_teams_item->name;
								}
								else
									$person_teams = $person_teams . ', ' . $person_teams_item->name;
								
								$count++;
                            }
                        }
                        ?>
                        <div class='profile-list searchable element <?= $team_class ?> '>
                       
                          <div class='pic'><img width='75' height='100' <?php if (empty($main_pic)) { ?> class='no-pic'<?php } ?> src='<?= $main_pic ?>' alt='<?= $name ?>' /></div>
                            <div class='info'>
                                <?php if (($name_link)){
                                    ?><a href="<?= get_permalink($personID) ?>"><?php
                                } ?>
								<p class='name search-this'><?= $name ?></p></a>
                                
                                <p class='title search-this'><?= $position  ?></p>
                                                                              
                                <p> <?= $phone ?></p>
                                 <?php if (($email)){
                                    ?><p> <a href="mailto:<?= $email ?> "><?= $email ?></a></p><?php
                                } ?>
                                
                            </div>
                             
                        </div>
                    <?php  endforeach; ?>
                       
                    </div>
                
                <?php } endif; 
            endforeach; ?>
            
        </article>
        <?php
        endwhile;
        ?>
       </div>
      </div>
	</div> 
  </div>
<?php get_footer(); ?>
