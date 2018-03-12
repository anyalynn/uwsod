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
	
			<div class="uw-body-copy">

        	<?php
          	// Start the Loop.
				while ( have_posts() ) : the_post();
          	?>
					<?php uw_breadcrumbs(); ?>
					<h1><?php the_title() ?></h1>
					<?php	$args = array('post_type' => 'people', 'posts_per_page' => -1);
					$query = new WP_Query($args);
					$people = $query->get_posts();
					usort($people, 'last_name_sort');
					$people[0]->post_title;
					$name_link = true;
				?>  
				<div id="livesearchdiv">
					<input id='livesearch' class="form-control" type="search" placeholder="Name/Department/Role..." name="filter" />
				</div>	
	
				<?php
    			$teams = dont_group_by_team($people); 
				foreach($teams as $team => $people):
    			if (count($people) != 0): 	//just in case there are zero people in a manually specified team (or Team No-Team) 
				{ ?>
    			<div class='searchable-container'>
    				<?php foreach ($people as $person):
            		$personID = $person->ID;
	 				$name = $person->post_title;
				 	$main_pic = esc_url( get_post_meta($personID, 'main_pic', true ));
				 	$position = esc_html( get_post_meta($personID, 'position', true ));
					$position2 = esc_html( get_post_meta($personID, 'position2', true ));
					$research = esc_html( get_post_meta($personID, 'research', true ));
				 	$phone = esc_html( get_post_meta($personID, 'phone', true ));
				 	$email = esc_html( get_post_meta($personID, 'email', true ));
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
						if ($person_teams_item->name == 'Oral and 	Maxillofacial Surgery') {
							$team_class .=  ' oms ';
						}
						if ($person_teams_item->name == 'Oral Medicine') {
							$team_class .= ' oralmed ';
						}
						if ($person_teams_item->name == 'Orthodontics') {
							$team_class .= ' ortho ';
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
        		<div class='profile-list searchable <?= $team_class ?> '>
        			<div class="info-wrapper">
			 			<img <?php if (empty($main_pic)) { ?> class='no-pic'<?php } ?> src='<?= $main_pic ?>' alt='<?= $name ?>' class='pic'/>
						<div class='info'>	
							<?php if (($name_link)){
							?><h3 class='name search-this'><a href="<?= get_permalink($personID) ?>"><?php
							} ?>
							<?= $name ?></a></h3>
							<p class='title search-this'><?= $position  ?><br /><?= $position2 ?></p>                             <p> <?= $phone ?> </p>
							<?php if (($email)) 
							{ ?>
							<p><a href="mailto:<?= $email ?>"><?= $email ?></a></p> 
							<?php } ?>
						</div>  
					<?php if (!empty($research)){ ?>
						<div class="research">
							<h3 class="name research-header">Research Interests</h3> 
							<p class="research-interests"> <?= $research ?> </p>
						</div> 
					<?php } ?>
			  		</div>	 		
         		 </div> 
         		<?php  endforeach; ?>
       		</div> 
				<?php } endif; 
				endforeach; ?>
 				<?php endwhile; ?>
		 </div> 
	</div>
</div> 
</div> 
<?php get_footer(); ?>
