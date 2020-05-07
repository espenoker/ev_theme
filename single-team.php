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

<section class="container-fluid">
	   	<div class="row">   
		   <div class="col-md-3 offset-md-1">
			<?php the_post_thumbnail('full'); ?>
			<h1><?php the_title(); ?></h1>
			<p><?php the_field('title'); ?></p>
			<?php 
			$location = get_field('location');
			if( $location ): ?>
				<p><?php echo esc_html( $location->name ); ?></p>
			<?php endif; ?>
			<p><a href="mailto:<?php the_field('email'); ?>"><?php the_field('email'); ?></a></p>
			<p><a href="<?php the_field('link'); ?>"><?php the_field('link_text'); ?></a></p>




		   </div>
		   <div class="col-md-7">
			<p><?php the_field('bio'); ?></p>
			

		   </div>
		</div>
	</section>


		<?php endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_footer();
