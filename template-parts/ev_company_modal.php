<?php
/**
 * Template part for displaying company modal
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ev_theme
 */

?>
<?php $terms = get_field('portfolio_categories'); ?>
<div class="modal-dialog modal-dialog-centered" role="document">
	<div class="modal-content blue">		
		<a href="#close" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</a>
		<div class="modal-body">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-4 offset-md-1 col-lg-3 company_info">
						<h2><?php the_title(); ?></h2>
						<?php if( $terms ) : foreach( $terms as $term ) :  echo $term->name . '</br>'; endforeach; endif; ?>
						<?php if (get_field('website')) : ?><p><a href="<?php the_field('website'); ?>" target="_blank">Company website</a></p><?php endif ;?>
						<ul >
							<?php if (get_field('hq')) : ?><li>HQ: <span><?php the_field('hq'); ?></span></li><?php endif; ?>
							<?php if (get_field('fund')) : ?><li>Fund: <span><?php the_field('fund'); ?></span></li><?php endif; ?>
							<?php if (get_field('stage')) : ?><li>Stage: <span><?php the_field('stage'); ?></span></li><?php endif; ?>
							<?php if (get_field('revenue_usd')) : ?><li>Revenue <?php if (get_field('revenue_year')) : ?><?php the_field('revenue_year'); ?><?php endif; ?>: <span><?php the_field('revenue_usd'); ?> USD</span></li><?php endif; ?>
							<?php if (get_field('number_of_employees')) : ?><li>Employees: <span><?php the_field('number_of_employees'); ?></span></li><?php endif; ?>
						</ul>


					</div>
					<div class="col-md-5 offset-md-1 col-lg-6">
					<p><?php the_field('company_intro'); ?></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
