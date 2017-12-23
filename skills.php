<div class="skills-container">
	<div class="section-title">My Skills</div>
		<div class="skills-boxes flex">

<?php
	$arguments = array(
		'post_type' => 'skills',
	);  
	$skill = new WP_Query( $arguments ); 

	if ( $skill->have_posts() ) : while ( $skill->have_posts() ) : $skill->the_post(); 
	$meta = get_post_meta( $post->ID, 'skill_fields', true );
?>
			<div class="text-box skill-container languages">
				<div class="skill-category">
					<?php the_title(); ?>
				</div>
				
<?php
	// check if the repeater field has rows of data
	if( have_rows('skill_list') ): 
?>
				<ul class="skills-list">
	<?php
	 	// loop through the rows of data
	  while ( have_rows('skill_list') ) : the_row();
	    // display a sub field value 
	?>
					<li>
					  <?php the_sub_field('skill_name'); ?>
					</li>
	<?php endwhile; ?>
				</ul>
<?php
	else :
	  // no rows found
	endif;
?>
			</div>
<?php endwhile; endif; wp_reset_postdata(); ?>
		</div>
	</div>
<!-- </div> -->