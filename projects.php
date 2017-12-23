<div class="projects-container">
	<div class="section-title">My Work</div>
	<div class="project-boxes flex">

<?php
	$arguments = array(
		'post_type' => 'projects',
	);  
	$project = new WP_Query( $arguments ); 

	if ( $project->have_posts() ) : 
		while ( $project->have_posts() ) : $project->the_post(); 
			$meta = get_post_meta( $post->ID, 'project_fields', true );
?>
		<div class="text-box project-container">
			<h3>
				<?php the_title(); ?>
			</h3>
					
				
<?php
	// check if the repeater field has rows of data
	if( have_rows('details_list') ): 
?>
			<div>
				<ul class="project-description">
	<?php
	 	// loop through the rows of data
	  while ( have_rows('details_list') ) : the_row();
	    // display a sub field value 
	?>
					<li>
					  <?php the_sub_field('detail'); ?>
					</li>
		<?php endwhile; ?>
				</ul>
	<?php endif; ?>
			</div>

<?php
	if( have_rows('links_list') ):
?>
			<div>View:
				<ul class="project-links flex">
	<?php while ( have_rows('links_list') ) : the_row(); ?>
					<li>
						<a class="project-link project-link-live" href=<?php the_sub_field('link'); ?>>
							<?php the_sub_field('type'); ?>
						</a>
					</li>
	<?php endwhile; ?>
				</ul>
<?php endif; ?>
			</div>
		</div>
	<!-- </div> -->
<?php endwhile; endif; wp_reset_postdata(); ?>
</div>
