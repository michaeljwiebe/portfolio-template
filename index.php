<?php get_header(); ?>

	<?php 
		get_template_part( 'skills', get_post_format() );
  ?>
</div> <!-- background-philly div from header.php  -->
<div class="work background-philly2 background-photos flex">
	<?php 
		get_template_part( 'projects', get_post_format() );
  ?>

<?php get_footer(); ?>
</div>