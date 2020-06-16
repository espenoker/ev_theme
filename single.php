<?php
/**
 * The template for displaying all single posts
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
					<div class="col-md-2 offset-md-1 details">
						<p><?php $category = get_the_category(); echo $category[0]->cat_name;?></p> 

						<time datetime="<?php echo get_the_date('c'); ?>" itemprop="datePublished"><?php echo get_the_date('F j'); ?> <span><?php echo get_the_date('Y'); ?></span></time>
					</div>
					<div class="col-md-6">
						<h1><?php the_title(); ?></h1>
						<?php the_content(); ?>
					</div>
					<div class="col-md-2 offset-md-1">
						<a href="<?php the_field('newslink', 'option') ?>" class="link_button">Overview</a>
					</div>
				</div>
			</section>

		

			<?php 
			

			

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_footer();
