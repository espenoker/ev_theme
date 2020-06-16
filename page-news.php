<?php
/**
 * Template Name: News
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
</section>		-->
<section class="container-fluid">
	<div class="row">
	
			<?php 
			$args = array (
				'post_type' => 'post',
				'order' => 'ASC',
				'posts_per_page' => '-1',

			);

			$the_query = new WP_Query( $args ); ?>

			<?php if ( $the_query->have_posts() ) : ?>	

			<?php // Get the taxonomy's terms
				$terms = get_terms(
					array(
						'taxonomy'   => 'category',
						'hide_empty' => true,
					)
				);
			?>

		<div class="col-md-10 offset-md-1 container-fluid news list" id="news">
			<div class="row">
				<div class="col">
					<h3>Latest news</h3>
				</div>
			</div>
			<div class="row no-gutters">
				<div class="col-md-2">
					<ul class="filter">
						<li><a href="#news" class="active" data-range>All</a></li>
					<?php if ( ! empty( $terms ) && is_array( $terms ) ) {
						foreach ( $terms as $term ) { ?>
							<li>
								<a href="#news" data-range="<?php echo $term->name; ?>"><?php echo $term->name; ?></a>
							</li>
					<?php } }  ?>


					<!--<h5>Archive:</h5>
					<?php wp_get_archives( array( 'type' => 'yearly') ); ?>-->
					</ul>
					<div class="space"></div>

					
				</div>
				<div class="col-md-10 newslist">
						<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
							<?php $exerp = get_the_excerpt();
								$newsExerp = strip_tags($exerp);
									if (strlen($newsExerp) > 250) {
										$stringCut = substr($newsExerp, 0, 250);
										$newsExerp = substr($stringCut, 0, strrpos($stringCut, ' ')).'...'; 
									}
								?>
							<?php $category = get_the_category(); ?>
							<div class="list-item news-item row no-gutters fadeinleft active" data-range="<?php echo esc_html( $category[0]->cat_name ); ?>"> 
								<div class="col-md-4 col-lg-6 details">
									<p><?php
										$category = get_the_category(); 
										echo $category[0]->cat_name;
										?>
									</p>
									<time datetime="<?php echo get_the_date('c'); ?>" itemprop="datePublished"><?php echo get_the_date('F j'); ?><span><?php echo get_the_date('Y'); ?></span></time>
								</div>
								<div class="col-md-8 col-lg-6">
									<h5><?php the_title(); ?></h5>
									<p><?php echo $newsExerp; ?></p>
									<a class="link_button" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">Read more</a>
								</div>
							</div>
					
						<?php endwhile; ?>								
				</div>
			</div>
		
		<?php wp_reset_postdata(); ?>
		
		<?php else : ?>
			<p><?php _e( 'Sorry, no news.' ); ?></p>
		<?php endif; ?>
		</div>
	</section>

<?php endwhile; ?>
</main>

<?php
get_footer();
