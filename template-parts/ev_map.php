<?php
/**
 * Template part for displaying mamp
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ev_theme
 */

?>

<section id="map">
	<div class="container-fluid">
  

		<div class="row">
			<div class="col-md-10 offset-md-1">
					<div class="nav" id="nav-tab" role="tablist">
						<a class="nav-item nav-link active" id="<?php echo str_replace(' ', '', get_field('map_title', 'option')); ?>-tab" data-toggle="tab" href="#<?php echo str_replace(' ', '', get_field('map_title', 'option')); ?>" role="tab" aria-controls="<?php echo str_replace(' ', '', get_field('map_title', 'option')); ?>" aria-selected="true"><?php the_field('map_title', 'option'); ?></a>
					<?php if( have_rows('map_tabs', 'option') ): ?>
					<?php while( have_rows('map_tabs', 'option') ): the_row(); ?>
						<a class="nav-item nav-link" id="<?php echo str_replace(' ', '', get_sub_field('tab_title', 'option')); ?>-tab" data-toggle="tab" href="#<?php echo str_replace(' ', '', get_sub_field('tab_title', 'option')); ?>" role="tab" aria-controls="<?php echo str_replace(' ', '', get_sub_field('tab_title', 'option')); ?>" aria-selected="false"><?php the_sub_field('tab_title', 'option'); ?></a>
					<?php endwhile; ?>
					<?php endif; ?>
					</div>
			</div>
		</div>
	</div>
	<div class="container-fluid tab-content" id="nav-tabContent">
		<div class="tab-pane fade show active row" id="<?php echo str_replace(' ', '', get_field('map_title', 'option')); ?>" role="tabpanel" aria-labelledby="<?php echo str_replace(' ', '', get_field('map_title', 'option')); ?>-tab">
					<div class="col-md-10 offset-md-1 map-image">
						<?php $imagestart = get_field('map_image_start', 'option'); ?>
						<?php echo wp_get_attachment_image( $imagestart['ID'], 'full' ); ?>
					</div>
					<div class="col-md-4 offset-md-1" id="counter">
						<h2>+ <span class="counter-value" data-count="300">0</span></h2>
						<p>Years combined team experience within management, private equity and finance</p>
					</div>
					<div class="col-md-6">
						<div class="row">
							<div class="col-6">
								<h3>+ 20</h3>
								<p>Portfolio companies</p>
							</div>	
							<div class="col-6">
								<h3>+ 20</h3>
								<p>Portfolio companies</p>
							</div>	
							<div class="col-6">
								<h3>+ 20</h3>
								<p>Portfolio companies</p>
							</div>	
							<div class="col-6">
								<h3>+ 20</h3>
								<p>Portfolio companies</p>
							</div>	
						</div>
					</div>

							
		</div>
		<?php if( have_rows('map_tabs', 'option') ): ?>
				<?php while( have_rows('map_tabs', 'option') ): the_row(); ?>
					<div class="tab-pane fade row" id="<?php echo str_replace(' ', '', get_sub_field('tab_title', 'option')); ?>" role="tabpanel" aria-labelledby="<?php echo str_replace(' ', '', get_sub_field('tab_title', 'option')); ?>-tab">
						<?php if( get_row_layout() == 'company_locations' ): 
							$image = get_sub_field('map_image');
							$title = get_sub_field('tab_title'); ?>
							<div class="col-md-10 offset-md-1 map-image">
								<?php echo wp_get_attachment_image( $image['ID'], 'full' ); ?>
							</div>
							<div class="col-md-4 offset-md-1">
								<h2><?php echo ($title); ?></h2>
							</div>
							<?php if( have_rows('locations')): while ( have_rows('locations')) : the_row(); ?>
							<div class="col-md-2">		
								<h5><?php the_sub_field('location_title'); ?></h5>
								<?php the_sub_field('location_content'); ?>
							</div>
								<?php endwhile; endif; ?>
						<?php elseif( get_row_layout() == 'portfolio_companies' ):
							$image = get_sub_field('map_image_3');
							$title = get_sub_field('tab_title'); ?>
							<div class="col-md-10 offset-md-1 map-image">
								<?php echo wp_get_attachment_image( $image['ID'], 'full' ); ?>
							</div>
							<div class="col-md-4 offset-md-1">
								<h2><?php echo ($title); ?></h2>
							</div>
							<?php if( have_rows('region')): ?>
							<div class="col-md-6 ">
							<?php while ( have_rows('region')) : the_row(); ?>
								<h2><?php the_sub_field('region_title'); ?></h2>
								<div class="row">
								<?php if( have_rows('city')): while ( have_rows('city')) : the_row(); ?>
									<div class="col-4">
									<h5><?php the_sub_field('city_name'); ?></h5>
									<?php if( have_rows('companies')): while ( have_rows('companies')) : the_row(); ?>
									
										<?php $post_object = get_sub_field('company');
											if( $post_object ): 
											$post = $post_object;
											setup_postdata( $post ); 
										?>
										<p>
											<a href="#<?php echo str_replace(' ', '', get_the_title()); ?>" data-toggle="modal" data-target="#<?php echo str_replace(' ', '', get_the_title()); ?>">
												<?php the_title(); ?>
											</a>
											<?php if(get_sub_field('hq')) : ?>
												<span>(HQ)</span> </p>
											<?php endif; ?>
											<div class="modal fade" id="<?php echo str_replace(' ', '', get_the_title()); ?>" tabindex="-1" role="dialog" aria-labelledby="<?php echo str_replace(' ', '', get_the_title()); ?>" aria-hidden="true">
												<div class="modal-dialog modal-dialog-centered" role="document">
													<div class="modal-content blue">
														
															<a href="#close" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">&times;</span>
															</a>
												

														<div class="modal-body">
															<div class="container-fluid">
																<div class="row">
																	<div class="col-md-3 offset-md-1">
																		<h2><?php the_title(); ?></h2>
																		<p><a href="<?php the_field('website'); ?>"><?php the_field('website'); ?></a></p>
																		<p>HQ: <?php the_field('hq'); ?></p>
																		<p>Stage: <?php the_field('stage'); ?></p>
																	</div>
																	<div class="col-md-6 offset-md-1">
																		<?php the_field('company_intro'); ?>
																	</div>
																</div>
															</div>
														</div>


													</div>
												</div>
											</div>
											
										<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
										<?php endif; ?>

									<?php endwhile; endif; ?><!--companies-->
								</div>

								<?php endwhile; endif; ?><!--City-->
							</div>											

							<?php endwhile; endif; ?><!--region-->
							</div>

						<?php elseif( get_row_layout() == 'advisory_board_members' ):
							$image = get_sub_field('map_image');
							$title = get_sub_field('tab_title'); ?>
							<div class="col-md-10 offset-md-1 map-image">
								<?php echo wp_get_attachment_image( $image['ID'], 'full' ); ?>
							</div>
							<div class="col-md-4 offset-md-1">
								<h2><?php echo ($title); ?></h2>
							</div>
							<?php if( have_rows('members')): ?>
							<div class="col-md-6">
								<div class="row">
								<?php while ( have_rows('members')) : the_row(); ?>
									<div class="col-md-4">		
										<h5><?php the_sub_field('member'); ?></h5>
										<?php the_sub_field('member_location'); ?>
									</div>
								<?php endwhile; ?>
								</div>
							</div>
							<?php endif; ?>

							<?php elseif( get_row_layout() == 'operation_partners' ):
							$image = get_sub_field('map_image');
							$title = get_sub_field('tab_title'); ?>
							<div class="col-md-10 offset-md-1 map-image">
								<?php echo wp_get_attachment_image( $image['ID'], 'full' ); ?>
							</div>
							<div class="col-md-4 offset-md-1">
								<h2><?php echo ($title); ?></h2>
							</div>
							<?php if( have_rows('partners')): ?>
							<div class="col-md-6">
								<div class="row">
								<?php while ( have_rows('partners')) : the_row(); ?>
									<div class="col-md-4">		
										<h5><?php the_sub_field('partner'); ?></h5>
										<?php the_sub_field('partner_location'); ?>
									</div>
								<?php endwhile; ?>
								</div>
							</div>
							<?php endif; ?>
							
							
						<?php endif; ?>
					</div><!--row-->
				<?php endwhile; ?>
		<?php endif; ?>
	</div>
</section>
