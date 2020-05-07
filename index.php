<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ev_theme
 */

get_header();
?>

	<main>

		<?php
		if ( have_posts() ) : ?>
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
    </section>		
	<section class="container-fluid">
			<div class="row">
			<div class="col-md-10 offset-md-1">
			 	<h3>Latest news</h3>

				<?php 	while ( have_posts() ) : ?>
							<?php the_post(); ?>
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

		<?php 	endwhile; ?>
		</div>
		</div>
	</section>
		<?php the_posts_pagination( array(
		    	'mid_size'=>3,
			 	'prev_text' => _( '« Previous'),
			  	'next_text' => _( 'Next »'),
			) );

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

	</main><!-- #main -->

<?php
get_footer();
