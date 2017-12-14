<?php
/*
Template Name: Services
*/
?>

<?php get_header(); ?>
	
	<?php 
		$homeland_advance_search = get_post_meta( $post->ID, 'homeland_advance_search', true );
		if(empty($homeland_advance_search)) :
			homeland_advance_search(); //modify function in "includes/lib/custom-functions.php"...
		endif;
	?>

	<!--AGENT LIST-->
	<section class="theme-pages">

		<div class="inside clear">

			<!--LEFT CONTAINER-->			
			<div class="left-container">

				<?php
					if (have_posts()) : 
						while (have_posts()) : the_post(); 
							the_content(); 								
						endwhile; 
					endif;
				?>

				<div class="services-container">
					<?php
						$homeland_services_order = esc_attr( get_option('homeland_services_order') );
						$homeland_services_orderby = esc_attr( get_option('homeland_services_orderby') );
						$homeland_num_services = esc_attr( get_option('homeland_num_services') );
						$homeland_page_nav = esc_attr( get_option('homeland_pnav') );
						
						$args = array( 
							'post_type' => 'homeland_services', 
							'orderby' => $homeland_services_orderby, 
							'order' => $homeland_services_order, 
							'posts_per_page' => $homeland_num_services, 
							'paged' => $paged 
						);

						$wp_query = new WP_Query( $args );	

						if ($wp_query->have_posts()) : 
							while ( $wp_query->have_posts() ) : 
								$wp_query->the_post();												
								get_template_part( 'loop', 'services' );
							endwhile;	
						endif;
					?>
				</div>
				<?php 
					if( $homeland_page_nav == "Next Previous Link" ) : 
						homeland_next_previous(); //modify function in "functions.php"...
					else : homeland_pagination(); //modify function in "functions.php"... 
					endif; 
				?>
			</div>

			<!--SIDEBAR-->	
			<div class="sidebar"><?php get_sidebar(); ?></div>

		</div>

	</section>

<?php get_footer(); ?>