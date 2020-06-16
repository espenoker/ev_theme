<?php
/**
 * Template part for displaying portfolio
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ev_theme
 */

?>

<section class="container-fluid">
		<div class="row">

		
	
	

			<div class="col-md-10 offset-md-1 container-fluid portfolio list">
			<div class="row">
				<div class="col col-12">
					<h3>Portfolio</h3>
				</div>
				<div class="col col-md-4 col-xl-2 nav" id="nav-tab" role="tablist">
						<a class="nav-item nav-link active" id="current-investments-tab" data-category data-toggle="tab" href="#current-investments" role="tab" aria-controls="current-investments" aria-selected="true">Current investments</a>
						<a class="nav-item nav-link" id="exited-investments-tab" data-category data-toggle="tab" href="#exited-investments" role="tab" aria-controls="exited-investments" aria-selected="false">Exited investments</a>

						
					</div>
				
			</div>
			<div class="tab-content" id="nav-tabContent">

			<?php 
				$args = array (
					'post_type' => 'portfolio',
					'order' => 'ASC',
					'posts_per_page' => '-1',
					'meta_key' => 'investment_status',
					'meta_value' => 'current_investments',

				);

				$the_query = new WP_Query( $args ); ?>

				<?php if ( $the_query->have_posts() ) : ?>	

				<?php // Get the taxonomy's terms
					$terms = get_terms(
						array(
							'taxonomy'   => 'portfolio_category',
							'hide_empty' => true,
							'object_ids' => wp_list_pluck( $the_query->posts, 'ID' ),
						)
					);
				?>
			<div class="tab-pane show active row" id="current-investments" role="tabpanel" aria-labelledby="current-investments-tab">

			<div class="col-md-4 col-xl-2">
						<ul class="filter">
							<li><a href="#all" class="actives" data-category>All</a></li>
							<?php if ( ! empty( $terms ) && is_array( $terms ) ) {
								foreach ( $terms as $term ) { ?>
									<li>
										<a href="#<?php echo str_replace(' ', '', $term->name); ?>" data-category="<?php echo str_replace(' ', '', $term->name); ?>"><?php echo $term->name; ?></a>
									</li>
							<?php } }  ?>

						</ul>
						<div class="space"></div>
					</div>
					<div class="col-md-8 col-xl-10 portfolio_items">
					<div class="row ">
					<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
						

					<?php $terms = get_field('portfolio_categories'); ?>
						
					<div class="col-6 col-md-4 portfolio_item actives" data-category="<?php if( $terms ) : foreach( $terms as $term ) :  echo str_replace(' ', '', $term->name) . ' '; endforeach; endif; ?>">
									<?php $strippedtitle = preg_replace("/[^a-zA-Z]+/", '', get_the_title()); ?>
									<a href="#" data-toggle="modal" data-target="#<?php echo $strippedtitle; ?>">
							<?php $logo = get_field('logo'); ?>
								<div class="image_wrapper logo aspect-ratio ar-1-1">
									<?php if ($logo) echo wp_get_attachment_image( $logo['ID'], 'full' ); ?>
								</div>
							</a>
							<h5><?php the_title(); ?></h5>
							<a href="#" data-toggle="modal" data-target="#<?php echo $strippedtitle; ?>">
									+
							</a>
							<div class="modal fade" id="<?php echo $strippedtitle; ?>" tabindex="-1" role="dialog" aria-labelledby="<?php echo $strippedtitle; ?>" aria-hidden="true">
																<?php get_template_part( 'template-parts/ev_company_modal' ); ?>								

							</div>

						</div>
						<?php endwhile; ?>
							
							
						</div>
					</div>
			</div>
		
		<?php wp_reset_postdata(); ?>
		
		<?php else : ?>
			<p><?php _e( 'Sorry, no Currrent Investments' ); ?></p>
		<?php endif; ?>
		<?php 
				$args = array (
					'post_type' => 'portfolio',
					'order' => 'ASC',
					'posts_per_page' => '-1',
					'meta_key' => 'investment_status',
					'meta_value' => 'exited_investments',

				);

				$the_query = new WP_Query( $args ); ?>

				<?php if ( $the_query->have_posts() ) : ?>	

				<?php // Get the taxonomy's terms
					$terms = get_terms(
						array(
							'taxonomy'   => 'portfolio_category',
							'hide_empty' => true,
							'object_ids' => wp_list_pluck( $the_query->posts, 'ID' ),
						)
					);
				?>

				<div class="tab-pane row" id="exited-investments" role="tabpanel" aria-labelledby="exited-investments-tab">
					<div class="col-md-4 col-xl-2">
						<ul class="filter">
							<li><a href="#all" class="actives" data-category>All</a></li>
							<?php if ( ! empty( $terms ) && is_array( $terms ) ) {
								foreach ( $terms as $term ) { ?>
									<li>
										<a href="#<?php echo str_replace(' ', '', $term->name); ?>" data-category="<?php echo str_replace(' ', '', $term->name); ?>"><?php echo $term->name; ?></a>
									</li>
							<?php } }  ?>

						</ul>
						<div class="space"></div>
					</div>
					<div class="col-md-8 col-xl-10 portfolio_items">
					<div class="row ">
						<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
						

						<?php 
						$terms = get_field('portfolio_categories'); ?>
						
						<div class="col-6 col-md-4 portfolio_item actives" data-category="<?php if( $terms ) : foreach( $terms as $term ) :  echo str_replace(' ', '', $term->name) . ' '; endforeach; endif; ?>">
							<?php $strippedtitle = preg_replace("/[^a-zA-Z]+/", '', get_the_title()); ?>
							<a href="#" data-toggle="modal" data-target="#<?php echo $strippedtitle; ?>">
							<?php $logo = get_field('logo'); ?>
								<div class="image_wrapper logo aspect-ratio ar-1-1">
									<?php if ($logo) echo wp_get_attachment_image( $logo['ID'], 'full' ); ?>
								</div>
							</a>
							<h5><?php the_title(); ?></h5>
							<a href="#" data-toggle="modal" data-target="#<?php echo $strippedtitle; ?>">
									+
							</a>
							<div class="modal fade" id="<?php echo $strippedtitle; ?>" tabindex="-1" role="dialog" aria-labelledby="<?php echo $strippedtitle; ?>" aria-hidden="true">
																<?php get_template_part( 'template-parts/ev_company_modal' ); ?>								

							</div>

						</div>
						<?php endwhile; ?>
							
							
					</div>
			</div>
		</div>
		
		<?php wp_reset_postdata(); ?>
		
		<?php else : ?>
			<p><?php _e( 'Sorry, no Exited Investments' ); ?></p>
		<?php endif; ?>
		</div>
		</div>
	</section>
