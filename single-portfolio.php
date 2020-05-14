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
		   <div class="col-md-2 offset-md-1">
				<p>Solar</p>
			</div>
			<div class="col-md-6">
		   		<h1><?php the_field('project_title'); ?></h1>
				<p><?php the_field('project_description'); ?></p>
			</div>
			<div class="col-md-2 offset-md-1">
				<a href="#">Overview</a>
			</div>				
		</div>
		<div class="row">   
		   <div class="col-12 fullbleed"> 
			   <div class="image_wrapper aspect-ratio ar-21-9">
					<?php the_post_thumbnail('full'); ?>
				</div>
			</div>
		</div>
		<div class="row">   
		   <div class="col-md-6 offset-md-3">   
				<?php the_field('project_content'); ?>
			</div>
		</div>
</section>

			

		<?php endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_footer();
