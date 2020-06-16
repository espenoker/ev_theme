<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ev_theme
 */

get_header();
?>

	<main>

	<section class="container-fluid">
		<div class="row">
	
	

	<?php if ( have_posts() ) : ?>	
			<div class="col-md-10 offset-md-1 newslist container-fluid">
				<h3><?php the_archive_title(); ?></h3>
			<?php while ( have_posts() ) : the_post(); ?>
			<?php $exerp = get_the_excerpt();
				$newsExerp = strip_tags($exerp);
					if (strlen($newsExerp) > 250) {
						$stringCut = substr($newsExerp, 0, 250);
						$newsExerp = substr($stringCut, 0, strrpos($stringCut, ' ')).'...'; 
					}
				?>
				<div class="news-item row no-gutters">
					<div class="col-md-4 col-lg-6">
						<p><?php
							$category = get_the_category(); 
							echo $category[0]->cat_name;
							?>
						</p>
						<time datetime="<?php echo get_the_date('c'); ?>" itemprop="datePublished"><?php echo get_the_date('F j'); ?></br><?php echo get_the_date('Y'); ?></time>
					</div>
					<div class="col-md-8 col-lg-6">
						<h5><?php the_title(); ?></h5>
						<p><?php echo $newsExerp; ?></p>
						<a class="link_button" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">Read more</a>
					</div>
			</div>
			<?php endwhile; ?>
		
		
		<?php else : ?>
			<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
		<?php endif; ?>
		</div>
	</section>

	</main><!-- #main -->

<?php
get_footer();
