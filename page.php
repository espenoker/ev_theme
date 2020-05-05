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
		   <div class="col-md-5">
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

	<?php endif; ?>

<?php endwhile; ?>
<?php endif; ?>

<section class="container-fluid title-section">
        <div class="row">
            <div class="col-md-5 offset-md-1">
                <h1><span>About EV</span>EV Private Equity is an independent growth equity firm dedicated to creating value and driving superior returns for our investors.</h1>
            </div>
            <div class="col-md-5">
                <div class="image_wrapper aspect-ratio ar-1-1">
                    <img src="img/about.png">
                </div>
            </div>
        </div>
    </section>
    <section class="container-fluid">
        <div class="row">
            <div class="col-md-7  bleed-left">
                <img src="img/vision.png">
            </div>
            <div class="col-md-3 offset-md-1">
                <h3>Vision</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In auctor tincidunt ipsum, ut eleifend nisi malesuada quis. Pellentesque vestibulum erat est, sit amet molestie felis lacinia vitae.</p>
            </div>
            <div class="col-md-5 offset-md-1">
                <h3>Values</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In auctor tincidunt ipsum, ut eleifend nisi malesuada quis. Pellentesque vestibulum erat est, sit amet molestie felis lacinia vitae. Sed tempus ante a mattis rutrum. Donec tempus molestie eros pulvinar tristique. Integer eu turpis consectetur, consequat eros eget, semper enim.</p>
            </div>
        </div>
    </section>
   

</main><!-- #main -->
<?php endwhile; ?>

<?php
get_footer();