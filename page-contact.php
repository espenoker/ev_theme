<?php
/**
 * Template Name: Contact
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ev_theme
 */

get_header();
?>

<main>
<?php	while ( have_posts() ) : the_post(); ?>

<!--
<section class="container-fluid title-section">
<div class="row">
	<div class="col-md-5 offset-md-1">
		<h1><span><?php the_field('supertitle'); ?></span><?php the_field('title'); ?></h1>
	</div>
	<div class="col-md-5">
		<div class="image_wrapper aspect-ratio ar-1-1">
			<?php the_post_thumbnail('full'); ?>
		</div>
	</div>
</div>
</section>	-->	
<section class="container-fluid contact">
	<div class="row">
		<div class="col-11 offset-1 col-md-2 offset-md-0 offset-lg-1 col-lg-1">
			<h1><?php the_title(); ?></h1>
		</div>
		<div class="col-5 offset-1 col-md-3 offset-md-0 offset-md-1 col-xl-2 offset-xl-2">
			<?php the_field('column_1'); ?>
		</div>	
		<div class="col-5 col-md-3 offset-md-0 col-xl-2">
			<?php the_field('column_2'); ?>
		</div>	
		<div class="col-5 offset-1 col-md-3 offset-md-0 col-xl-2">
			<?php the_field('column_3'); ?>
		</div>	
	</div>
	<div class="row">
		   <div class="col-12 fullbleed">   
			   <div class="image_wrapper aspect-ratio ar-21-9">
						   <?php the_post_thumbnail('full'); ?>
			   </div>
		   </div>
	   </div>
</section>

<?php endwhile; ?>
</main>

<?php
get_footer();
