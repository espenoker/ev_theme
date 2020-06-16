<?php
/**
 * The template for displaying all team member posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package ev_theme
 */

get_header();
?>

	<main>

		<?php
		while ( have_posts() ) :
			the_post(); ?>

<section class="portfolio-single container-fluid">
	   	<div class="row">   
		   <div class="info col-md-2 offset-md-1 order-md-1">
					<!--<?php 
					$terms = get_field('portfolio_categories');
					if( $terms ): ?>
						<ul>
						<?php foreach( $terms as $term ): ?>
							<p><?php echo esc_html( $term->name ); ?></p>
						<?php endforeach; ?>
						</ul>
					<?php endif; ?> -->

					<?php 

					if( get_field('investment_status') == 'current_investments' ) : ?>
						<p>Current Investment</p>
					<?php endif; ?> 
					<?php 

					if( get_field('investment_status') == 'exited_investments' ) : ?>
						<p>Exited Investment</p>
					<?php endif; ?> 
				
					

			</div>
			<div class="col-md-6 order-md-2">
		   		<h1><?php the_field('project_title'); ?></h1>
				<p><?php the_field('project_description'); ?></p>
			</div>
							
			<div class="col-12 fullbleed order-md-4"> 
			   <div class="image_wrapper aspect-ratio ar-21-9">
					<?php the_post_thumbnail('full'); ?>
				</div>
			</div>

		   <div class="col-md-6 offset-md-3 order-md-5">   
				<?php the_field('project_content'); ?>
			</div>
			<div class="col-md-2 order-md-3">
				<a href="<?php the_field('portfolio_link', 'option') ?>" class="link_button">Overview</a>
			</div>
		</div>
</section>

			

		<?php endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_footer();
