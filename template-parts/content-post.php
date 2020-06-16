<?php $exerp = get_the_excerpt();
					$newsExerp = strip_tags($exerp);
						if (strlen($newsExerp) > 250) {
							$stringCut = substr($newsExerp, 0, 250);
							$newsExerp = substr($stringCut, 0, strrpos($stringCut, ' ')).'...'; 
						}
					?>
				<div class="news-item row no-gutters">
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