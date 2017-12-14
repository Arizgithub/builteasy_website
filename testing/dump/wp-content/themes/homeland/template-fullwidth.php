<?php
/*
	Template Name: Fullwidth
*/
?>

<?php get_header(); ?>
	
	<?php 
		$homeland_advance_search = get_post_meta( $post->ID, 'homeland_advance_search', true );
		if(empty($homeland_advance_search)) :
			homeland_advance_search(); //modify function in "includes/lib/custom-functions.php"...
		endif;
	?>

	<!--THEME CONTENTS-->
	<section class="theme-pages">

		<div class="inside clear">

			<!--FULLWIDTH-->			
			<div class="theme-fullwidth">
				
				<?php
					if (have_posts()) : 
						while (have_posts()) : the_post(); 
							the_content(); 								
						endwhile; 
					endif;
				?>
					
			</div>

		</div>

	</section>

<?php get_footer(); ?>