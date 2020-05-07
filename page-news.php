<?php
/**
 * Template Name: Newspage
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ev_theme
 */

get_header();
?>

<main>
<?php	while ( have_posts() ) : the_post(); ?>
<main>


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
<section class="container-fluid" id="news">
	<div class="row">
	
	<?php 
	$args = array (
		'post_type' => 'post',
		'posts_per_page' => '10',
	);
	$the_query = new WP_Query( $args ); 
	?>

	<?php if ( $the_query->have_posts() ) : ?>	
		<div class="col-md-10 offset-md-1 newslist container-fluid">
				<h3>Latest news</h3>
				<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
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
			<div class="pagination">
				<?php 
					echo paginate_links( array(
						'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
						'total'        => $the_query->max_num_pages,
						'current'      => max( 1, get_query_var( 'paged' ) ),
						'format'       => '?paged=%#%',
						'show_all'     => false,
						'type'         => 'plain',
						'end_size'     => 1,
						'mid_size'     => 1,
						'prev_next'    => true,
						'prev_text'    => _( 'Previous'),
						'next_text'    => _( 'Next'),
						'add_args'     => true,
						'add_fragment' => '#news',
					) );
				?>
			</div>
		
		<?php wp_reset_postdata(); ?>
		
		<?php else : ?>
			<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
		<?php endif; ?>
		</div>
</section>
</main>
<?php endwhile; ?>

<?php
get_footer();
