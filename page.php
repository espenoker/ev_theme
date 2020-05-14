<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ev_theme
 */

get_header();
?>
<main>
<?php	while ( have_posts() ) : the_post(); ?>

<?php if ( have_rows('sections')): ?>
<?php while (have_rows('sections')): the_row(); ?>
	<?php if( get_row_layout() == 'title_section_frontpage_top' ): ?>
	<section class="container-fluid title-section title-section-frontpage">
	   <div class="row">
		   <div class="col-9 offset-1 col-md-6">
			   <h1><?php the_sub_field('title'); ?></h1>
		   </div>
	   </div>
   </section>
   <?php elseif( get_row_layout() == 'fullbleed_slider' ): ?>
	<section class="container-fluid slider fullbleed">
		<div class="slider-wrapper">
		<?php
		if( have_rows('slider') ):
		while ( have_rows('slider') ) : the_row(); ?>
			<?php 
		$image = get_sub_field('image');
		$link = get_sub_field('link');
		if ( $link ):
			$link_url = $link['url'];
			$link_title = $link['title'];
			$link_target = $link['target'] ? $link['target'] : '_self';
		endif;
		?>

		<div>
			<div class="slide row">
				<div class="media col-12 col-md-9 ">
				<a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
					<?php echo wp_get_attachment_image( $image['ID'], 'full' ); ?>
				</a>
				</div>
				<div class="content col-12 col-md-3">
					<p><span class="count">0/0</span> <?php the_sub_field('supertitle') ?></p> 
					<a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
						<h3><?php the_sub_field('title') ?></h3>
					</a>
				</div>
			</div>
		</div>

		<?php endwhile;

		else :

			// no rows found

		endif; ?>

		</div>
   </section>
   <?php elseif( get_row_layout() == 'title_section' ): ?>
	<section class="container-fluid title-section">
	   <div class="row">
		   <div class="col-md-8 offset-md-1">
			   <h1><span><?php the_sub_field('supertitle'); ?></span><?php the_sub_field('title'); ?></h1>
		   </div>
	   </div>
   </section>
   <?php elseif( get_row_layout() == '2column_section' ): ?>
	<section class="container-fluid">
	   <div class="row">
		   <div class="col-md-5 offset-md-1">
		   <?php 
		   		$image1 = get_sub_field('image_1');
				$link_1 = get_sub_field('link_1');
				if ( $link_1 ):
				$link_1_url = $link_1['url'];
				$link_1_title = $link_1['title'];
				$link_1_target = $link_1['target'] ? $link_1['target'] : '_self';
				?>
				<?php endif; ?>
			   <div class="image_wrapper aspect-ratio ar-1-1">
			   <?php if( $link_1 ): ?>
			   <a href="<?php echo esc_url( $link_1_url ); ?>" target="<?php echo esc_attr( $link_1_target ); ?>">
					<?php echo wp_get_attachment_image( $image1['ID'], 'full' ); ?>
			   </a>
			   <?php else: ?>
					<?php echo wp_get_attachment_image( $image1['ID'], 'full' ); ?>
				<?php endif; ?>
			   </div>
			   <h3><?php the_sub_field('title_1'); ?></h3>
			   <p><?php the_sub_field('text_1'); ?></p>
			   <?php if( $link_1 ): ?>
			   		<a class="link_button" href="<?php echo esc_url( $link_1_url ); ?>" target="<?php echo esc_attr( $link_1_target ); ?>"><?php echo esc_html( $link_1_title ); ?></a>
				<?php endif; ?>
		   </div>
		   <div class="col-md-5">
		   <?php 
		   		$image2 = get_sub_field('image_2');
				$link_2 = get_sub_field('link_2');
				if ( $link_2 ):
				$link_2_url = $link_2['url'];
				$link_2_title = $link_2['title'];
				$link_2_target = $link_2['target'] ? $link_2['target'] : '_self';
				?>
				<?php endif; ?>
			   <div class="image_wrapper aspect-ratio ar-1-1">
			   <?php if( $link_2 ): ?>
			   <a href="<?php echo esc_url( $link_2_url ); ?>" target="<?php echo esc_attr( $link_2_target ); ?>">
			  		<?php echo wp_get_attachment_image( $image2['ID'], 'full' ); ?>
			   </a>
			   <?php else: ?>
					<?php echo wp_get_attachment_image( $image2['ID'], 'full' ); ?>
				<?php endif; ?>
			   </div>
			   <h3><?php the_sub_field('title_2'); ?></h3>
			   <p><?php the_sub_field('text_2'); ?></p>
				<?php if( $link_2 ): ?>
				<a class="link_button" href="<?php echo esc_url( $link_2_url ); ?>" target="<?php echo esc_attr( $link_2_target ); ?>"><?php echo esc_html( $link_2_title ); ?></a>
				<?php endif; ?>
		   </div>
	   </div>
   </section>
   <?php elseif( get_row_layout() == 'fullbleed_image_section' ): 
	$image = get_sub_field('image');
	$link = get_sub_field('link');
	
	?>
	<section class="container-fluid">
	   <div class="row">
		   <div class="col-12 fullbleed">   
			   <div class="image_wrapper aspect-ratio ar-21-9">
			   			<?php echo wp_get_attachment_image( $image['ID'], 'full' ); ?>
			   </div>
		   </div>
		   <div class="col-md-5 offset-md-1">
			   <h3><?php the_sub_field('title'); ?></h3>
		   </div>
		   <div class="col-md-5 col-xxl-4">
			   <p><?php the_sub_field('text'); ?></p>
			   <?php if( $link ): 
					$link_url = $link['url'];
					$link_title = $link['title'];
					$link_target = $link['target'] ? $link['target'] : '_self';
				?>
				<a class="link_button" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
				<?php endif; ?>
		   </div>
	   </div>
   </section>
   <?php elseif( get_row_layout() == 'image_bleed_right' ): 
	$image = get_sub_field('image');
	?>
	<section class="container-fluid">
	   <div class="row">
		   <div class="col-md-3 offset-md-1">
			   <h3><?php the_sub_field('title'); ?></h3>
			   <p><?php the_sub_field('text'); ?></p>
			   <a class="link_button" href="#">Learn more</a>
		   </div>
		   <div class="col-md-7 offset-md-1 bleed-right">
			   <div class="image_wrapper">
			   		<?php echo wp_get_attachment_image( $image['ID'], 'full' ); ?>
			   </div>
		   </div>
	   </div>
	</section>
	
	<?php elseif( get_row_layout() == 'post_list_3items' ): ?>
	<section class="container-fluid">
		<div class="row">
	
	<?php 
	$args = array (
		'post_type' => 'post',
		'posts_per_page' => '3',
    	'ignore_sticky_posts' => 1
	);

	$the_query = new WP_Query( $args ); ?>

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
		
		<?php wp_reset_postdata(); ?>
		
		<?php else : ?>
			<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
		<?php endif; ?>
		</div>
	</section>
	<?php elseif( get_row_layout() == 'cs_img_left' ): 
	$image = get_sub_field('image');
	$link = get_sub_field('link');
	
	?>
	<section class="container-fluid">
	   	<div class="row">    
		   	<div class="col-md-5 offset-md-1">
		   		<?php echo wp_get_attachment_image( $image['ID'], 'full' ); ?>
		   	</div>
			<div class="col-md-5">
				<h5><?php the_sub_field('supertitle'); ?></h5>
				<h3><?php the_sub_field('title'); ?></h3>
				<p><?php the_sub_field('introtext'); ?></p>
				<?php if( $link ): 
					$link_url = $link['url'];
					$link_title = $link['title'];
					$link_target = $link['target'] ? $link['target'] : '_self';
				?>
				<a class="link_button" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
				<?php endif; ?>	
			</div>
	   	</div>
	</section>
	<?php elseif( get_row_layout() == 'title_section_1-1_image' ): 
	$image = get_sub_field('image');
	?>
	<section class="container-fluid title-section">
        <div class="row">
            <div class="col-md-5 offset-md-1">
				<h1><span><?php the_sub_field('supertitle'); ?></span><?php the_sub_field('title'); ?></h1>
            </div>
            <div class="col-md-5">
                <div class="image_wrapper aspect-ratio ar-1-1">
					<?php echo wp_get_attachment_image( $image['ID'], 'full' ); ?>
                </div>
            </div>
        </div>
    </section>		
	<?php elseif( get_row_layout() == 'section_2text_1image' ): 
	$image = get_sub_field('image');
	?>
	<section class="container-fluid">
        <div class="row">
            <div class="col-md-7  bleed-left">
				<?php echo wp_get_attachment_image( $image['ID'], 'full' ); ?>
            </div>
            <div class="col-md-3 offset-md-1">
                <h3><?php the_sub_field('title_1'); ?></h3>
                <p><?php the_sub_field('text_1'); ?></p>
            </div>
            <div class="col-md-5 offset-md-1">
				<h3><?php the_sub_field('title_2'); ?></h3>
                <p><?php the_sub_field('text_2'); ?></p>
			</div>
        </div>
    </section>	 
	<?php elseif( get_row_layout() == 'section_2text_1image_2' ): 
	$image = get_sub_field('image');
	?>
	<section class="container-fluid">
        <div class="row">
			<div class="col-md-7 bleed-left">
				<div class="row no-gutters">
					<div class="col-md-10 offset-md-2">
						<h3><?php the_sub_field('title_1'); ?></h3>
						<p><?php the_sub_field('text_1'); ?></p>
					</div>
					<div class="col-md-12 bleed-left">
						<?php echo wp_get_attachment_image( $image['ID'], 'full' ); ?>
					</div>
				</div>
			</div>
            
            <div class="col-md-3 offset-md-1">
				<h3><?php the_sub_field('title_2'); ?></h3>
                <p><?php the_sub_field('text_2'); ?></p>
			</div>
        </div>
    </section>	   
	<?php elseif( get_row_layout() == 'team' ): ?>
		<section class="container-fluid">
		<div class="row">
	
	<?php 
	$args = array (
		'post_type' => 'team',
	);

	$the_query = new WP_Query( $args ); ?>

	<?php if ( $the_query->have_posts() ) : ?>	

	<?php // Get the taxonomy's terms
		$terms = get_terms(
			array(
				'taxonomy'   => 'team_location',
				'hide_empty' => true,
			)
		);
	?>

			<div class="col-md-10 offset-md-1 container-fluid team">
			<h3>The People</h3>
			
				<div class="row no-gutters">
					<div class="col-md-2">
						<ul class="filter">
							<li><a href="#all" class="active" data-location>All</a></li>
						<?php if ( ! empty( $terms ) && is_array( $terms ) ) {
							foreach ( $terms as $term ) { ?>
								<li>
									<a href="#<?php echo $term->name; ?>" data-location="<?php echo $term->name; ?>"><?php echo $term->name; ?></a>
								</li>
						<?php } }  ?>

						<ul>
					</div>
					<div class="col-md-10 team_people">
					<div class="row ">
					<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
					<?php $location = get_field('location'); ?>
						<div class="col-md-6 team_person active" data-location="<?php echo esc_html( $location->name ); ?>">
							<a href="#" data-toggle="modal" data-target="#<?php echo str_replace(' ', '', get_the_title()); ?>">
								<div class="image_wrapper aspect-ratio ar-1-1">
									<?php the_post_thumbnail('full'); ?>
								</div>
							</a>
							<h5><?php the_title(); ?></h5>
							<p><?php the_field('title'); ?></p>
							<a href="#" data-toggle="modal" data-target="#<?php echo str_replace(' ', '', get_the_title()); ?>">
									+
							</a>
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
														<p><?php the_field('title'); ?></p>
														<?php 
														$location = get_field('location');
														if( $location ): ?>
															<p><?php echo esc_html( $location->name ); ?></p>
														<?php endif; ?>
														<p><a href="mailto:<?php the_field('email'); ?>"><?php the_field('email'); ?></a></p>
														<p><a href="<?php the_field('link'); ?>"><?php the_field('link_text'); ?></a></p>
													</div>
													<div class="col-md-6 offset-md-1">
														<?php the_field('bio'); ?>
													</div>
												</div>
											</div>
										</div>


									</div>
								</div>
							</div>

						</div>
						<?php endwhile; ?>
							
							
						</div>
					</div>
			</div>
		
		<?php wp_reset_postdata(); ?>
		
		<?php else : ?>
			<p><?php _e( 'Sorry, no team members yet.' ); ?></p>
		<?php endif; ?>
		</div>
	</section>
	<?php elseif( get_row_layout() == '3_postobjects' ): ?>

	<section class="container-fluid">
            <div class="row">
				<?php

				$post_object1 = get_sub_field('post_1');

				if( $post_object1 ): 

				$post = $post_object1;
				setup_postdata( $post ); 

				?>
				<div class="col-md-10 offset-md-1">
                    <div class="row">    
                        <div class="col-md-6">
							<div class="image_wrapper aspect-ratio ar-1-1">
								<?php the_post_thumbnail('full'); ?>
							</div>
                        </div>
                        <div class="col-md-6">
                            <h3><?php the_field('project_title'); ?></h3>
                            <p><?php the_field('project_description'); ?></p>
                            <a class="link_button" href="<?php the_permalink(); ?>">Learn more</a>
                        </div>
                    </div>
                </div>
				
				<?php wp_reset_postdata(); ?>
				<?php endif; ?>
				
				<?php

				$post_object2 = get_sub_field('post_2');

				if( $post_object2 ): 

				$post = $post_object2;
				setup_postdata( $post ); 

				?>
                <div class="col-md-5 offset-md-1">
                    <div class="image_wrapper aspect-ratio ar-1-1">
						<?php the_post_thumbnail('full'); ?>
                    </div>
                    <h3><?php the_field('project_title'); ?></h3>
					<p><?php the_field('project_description'); ?></p>
					<a class="link_button" href="<?php the_permalink(); ?>">Learn more</a>
                </div>
				<?php wp_reset_postdata(); ?>
				<?php endif; ?>

                <?php

				$post_object3 = get_sub_field('post_3');

				if( $post_object3 ): 

				$post = $post_object3;
				setup_postdata( $post ); 

				?>
                <div class="col-md-5">
                    <div class="image_wrapper aspect-ratio ar-1-1">
						<?php the_post_thumbnail('full'); ?>
                    </div>
                    <h3><?php the_field('project_title'); ?></h3>
					<p><?php the_field('project_description'); ?></p>
					<a class="link_button" href="<?php the_permalink(); ?>">Learn more</a>
                </div>
				<?php wp_reset_postdata(); ?>
				<?php endif; ?>
            </div>
		</section>
	<?php elseif( get_row_layout() == 'map' ): ?>
		<?php get_template_part( 'template-parts/ev_map' ); ?>
	<?php endif; ?>


<?php endwhile; ?>
<?php endif; ?>

<?php
if (is_page( 'Investments' ) ): ?>
<section class="container-fluid">
	<div class="row">
		<div class="col-md-10 offset-md-1">
			<h3>Portfolio</h3>
			<ul class="toggle-tabs">
				<li class="active-tab">Current Investments</li>
				<li>Exited Investments</li>
			</ul>
			<div class="tabbed-content-wrap">
				<?php 
				$args = array (
					'post_type' => 'portfolio',
					'posts_per_page' => '10',
					'meta_key' => 'investment_status',
					'meta_value' => 'current_investments'
				);
				$the_query = new WP_Query( $args ); 
				?>
				
				<?php if ( $the_query->have_posts() ) : ?>	
					<div class="content-box active-content-box col newslist container-fluid" id="current_investments">
							
						<?php while ( $the_query->have_posts() ) : $the_query->the_post(); 
						$image = get_field('logo');
						?>
						
						<div class="news-item row ">
							<div class="col-md-2 ">
								<?php echo wp_get_attachment_image( $image['ID'], 'full' ); ?>
							</div>					
							<div class="col-md-10 col-lg-6">
								<h5><?php the_title(); ?></h5>
								<p><?php the_field('company_intro'); ?></p>

							</div>
						</div>
					</div>

						<?php endwhile; ?>
									
						<?php wp_reset_postdata(); ?>
						
						<?php else : ?>
							<p><?php _e( 'No Current Investments' ); ?></p>
				<?php endif; ?>

				<?php 
				$args = array (
					'post_type' => 'portfolio',
					'posts_per_page' => '10',
					'meta_key' => 'investment_status',
					'meta_value' => 'exited_investments'
				);
				$the_query = new WP_Query( $args ); 
				?>
				
				<?php if ( $the_query->have_posts() ) : ?>	
					<div class="content-box col newslist container-fluid" id="exited">
						
						<?php while ( $the_query->have_posts() ) : $the_query->the_post(); 
						$image = get_field('logo');
						?>
						
						<div class="news-item row ">
							<div class="col-md-2 ">
								<?php echo wp_get_attachment_image( $image['ID'], 'full' ); ?>
							</div>					
							<div class="col-md-10 col-lg-6">
								<h5><?php the_title(); ?></h5>
								<p><?php the_field('company_intro'); ?></p>

							</div>
						</div>
					</div>

						<?php endwhile; ?>
								
						<?php wp_reset_postdata(); ?>
					
						<?php else : ?>
							<p><?php _e( 'No Current Investments' ); ?></p>
				<?php endif; ?>
			</div>	
		</div>
	</div>
</section>
  
<?php endif;
?>
</main><!-- #main -->
<?php endwhile; ?>

<?php
get_footer();