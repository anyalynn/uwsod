<div class="on-campus" >
				<div class="uw-on-campus"><h2>At the Dental School</h2></div>
				<div class="container"> 
					<div class="row">
						<div class="box-outer">
							<div class="box three">
                            <div class="tile">
                                 <?php $hometilestwo =  get_post(16528);
								 $metatwo = get_post_meta($hometilestwo->ID);
								 $thecontenttwo = $hometilestwo->post_content; 
								 $posttitletwo = $hometilestwo->post_title;
								 $hometilestwo_pic = get_post_meta($hometilestwo->ID, 'hometile_pic', true);
								 $readmoretwo = get_post_meta($hometilestwo->ID, 'readmore', true);
								 $alttwo = get_post_meta($hometilestwo->ID, 'hometile_pic_alt', true);
 
								 ?>
                                   
								<div><img class="attachment-homepage_tile wp-post-image" src='<?= $hometilestwo_pic ?>' alt='<?= $alttwo ?>' width="379" height="160" /></div>
										<h2><?= $posttitletwo ?></h2>
										<p class="null">
										<?= $thecontenttwo ?></p>


										<?php if(!empty($readmoretwo))
										{ ?>
										<p class="null"><a class="uw-btn btn-sm btn-none" href="<?= $readmoretwo ?>">Read more</a></p>
                                        <? } ?>

									</div>
								<div class="tile">
                                 <?php $hometilesone =  get_post(16403);
								 $meta = get_post_meta($hometilesone->ID);
								 $thecontentone = $hometilesone->post_content; 
								 $posttitleone = $hometilesone->post_title;
								 $hometilesone_pic = get_post_meta($hometilesone->ID, 'hometile_pic', true);
								 $readmoreone = get_post_meta($hometilesone->ID, 'readmore', true);
								  $altone = get_post_meta($hometilesone->ID, 'hometile_pic_alt', true);
 
								 ?>
								<div><img class="attachment-homepage_tile wp-post-image" src='<?= $hometilesone_pic ?>' alt='<?= $altone ?>' width="379" height="160" /></div>
								<h2><?= $posttitleone ?></h2>
								<p class="null">
								<?= $thecontentone ?></p>
								<?php if(!empty($readmoreone))
										{ ?>
										<p class="null"><a class="uw-btn btn-sm btn-none" href="<?= $readmoreone ?>">Read more</a></p>
                                        <? } ?>
								</div>
								
									<div class="tile">
 								 <?php $hometilesthree =  get_post(12790);
								 $metathree = get_post_meta($hometilesthree->ID);
								 $thecontentthree = $hometilesthree->post_content; 
								 $posttitlethree = $hometilesthree->post_title;
								 $hometilesthree_pic = get_post_meta($hometilesthree->ID, 'hometile_pic', true);
								 $readmorethree = get_post_meta($hometilesthree->ID, 'readmore', true);
								  $altthree = get_post_meta($hometilesthree->ID, 'hometile_pic_alt', true);
 
								 ?>
                                   
								<div><img class="attachment-homepage_tile wp-post-image" src='<?= $hometilesthree_pic ?>' alt='<?= $altthree ?>' width="379" height="160" /></div>
										<h2><?= $posttitlethree ?></h2>
										<p class="null">
										<?= $thecontentthree ?></p>

										<?php if(!empty($readmorethree))
										{ ?>
										<p class="null"><a class="uw-btn btn-sm btn-none" href="<?= $readmorethree ?>">Read more</a></p>
                                        <? } ?>

									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
		    </div>