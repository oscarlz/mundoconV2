<?php $mts_options = get_option('hotnews'); ?>
<?php get_header(); ?>
<div id="page">
	<div class="article">
		<div id="content_box">
			<?php require 'ad-top-body-responsive.php' ?>
			<?php if (is_home() && !is_paged()) { ?>
				<?php if($mts_options['mts_featured_slider'] == '1') { ?>
					<div class="slider-container">
						<div class="flex-container loading">
							<div id="slider" class="flexslider">
								<ul class="slides">
									<?php $slider_cat = implode(",", $mts_options['mts_featured_slider_cat']); $my_query = new WP_Query('cat='.$slider_cat.'&posts_per_page=3');
										while ($my_query->have_posts()) : $my_query->the_post();
										$image_id = get_post_thumbnail_id();
										$image_url = wp_get_attachment_image_src($image_id,'related');
										$image_url = $image_url[0]; ?>
									<li data-thumb="<?php echo $image_url; ?>"> 
										<a href="<?php the_permalink() ?>">
											<?php if ( has_post_thumbnail() ) { ?> 
												<?php the_post_thumbnail('slider',array('title' => '')); ?>
											<?php } ?>
											<span class="sliderCat">
												<?php
												$category = get_the_category(); 
												echo $category[0]->cat_name;
												?>
											</span>
											<div class="flex-caption">
												<span class="sliderAuthor"><?php the_time('j F, Y'); ?> / <?php _e('By','mythemeshop'); ?> <?php the_author(); ?></span>
												<h2 class="slidertitle"><?php the_title(); ?></h2>
												<span class="slidertext"><?php echo mts_excerpt(20); ?></span>
											</div>
										</a> 
									</li>
									<?php endwhile; wp_reset_query(); ?>
								</ul>
							</div>
						</div>
					</div>
					<!-- slider-container -->
				<?php } ?>
			<?php } ?>

			<?php if (is_home() & !is_paged()) { ?>
				<?php if($mts_options['mts_section_1'] == '1') { ?>
					<div class="cat-posts cat-posts-1">
					<?php $section_1_cat = implode(",", $mts_options['mts_section_1_cat']); ?>
					<?php $i = 1; $my_query = new wp_query( 'cat='.$section_1_cat.'&posts_per_page=3' ); ?>
					<?php $categoryID = $section_1_cat; ?>
					<h4 class="frontTitle"><?php if ($section_1_cat!='') { echo get_the_category_by_ID( $categoryID ); } ?></h4>
					<?php if ($my_query->have_posts()) : while ($my_query->have_posts()) : $my_query->the_post(); ?>
					<div class="frontPost excerpt <?php if($i % 3 == 0){echo 'last';} ?>">
						<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" rel="nofollow" id="featured-thumbnail">
							<?php if ( has_post_thumbnail() ) { ?> 
								<?php echo '<div class="featured-thumbnail">'; the_post_thumbnail('featured-section-1',array('title' => '')); echo '</div>'; ?>
							<?php } else { ?>
								<div class="featured-thumbnail">
									<img width="180" height="130" src="<?php echo get_template_directory_uri(); ?>/images/nothumb_180x130.png" class="attachment-featured wp-post-image" alt="<?php the_title(); ?>">
								</div>
							<?php } ?>
						</a>
						<?php if($mts_options['mts_home_headline_meta'] == '1') { ?>
							<div class="post-info-home">
								<?php if(isset($mts_options['mts_home_headline_meta_info'][3]) == '1') { ?>
									<time><?php the_time('j F'); ?></time>
								<?php } ?>
								<?php if(isset($mts_options['mts_home_headline_meta_info'][1]) == '1') { ?>
									 / <?php _e('By','mythemeshop'); ?> <?php the_author_posts_link(); ?>
								<?php } ?>
							</div>
						<?php } ?>
						<h2 class="title front-view-title"><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
						<div class="front-view-content">
							<?php echo mts_excerpt(8); ?>
						</div>
					</div>                   
					<?php $i++; endwhile; endif;?>
					</div><!-- end .cat-posts -->
				<?php } ?>
			<?php } ?>
			
			<?php if (is_home() & !is_paged()) { ?>
				<?php if($mts_options['mts_section_2'] == '1') { ?>
					<div class="cat-posts cat-posts-2">
					<?php $section_2_cat = implode(",", $mts_options['mts_section_2_cat']); ?>
					<?php $i = 1; $my_query = new wp_query( 'cat='.$section_2_cat.'&posts_per_page=2' ); ?>
					<?php $categoryID = $section_2_cat; ?>
					<h4 class="frontTitle"><?php if ($section_2_cat!='') { echo get_the_category_by_ID( $categoryID ); } ?></h4>
					<?php if ($my_query->have_posts()) : while ($my_query->have_posts()) : $my_query->the_post(); ?>
					<div class="frontPost excerpt <?php if($i % 2 == 0){echo 'last';} ?>">
						<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" rel="nofollow" id="featured-thumbnail">
							<?php if ( has_post_thumbnail() ) { ?> 
								<?php echo '<div class="featured-thumbnail">'; the_post_thumbnail('featured-section-2',array('title' => '')); echo '</div>'; ?>
							<?php } else { ?>
								<div class="featured-thumbnail">
									<img width="280" height="200" src="<?php echo get_template_directory_uri(); ?>/images/nothumb_280x200.png" class="attachment-featured wp-post-image" alt="<?php the_title(); ?>">
								</div>
							<?php } ?>
						</a>
						<?php if($mts_options['mts_home_headline_meta'] == '1') { ?>
							<div class="post-info-home">
								<?php if(isset($mts_options['mts_home_headline_meta_info'][3]) == '1') { ?>
									<time><?php the_time('j F, Y'); ?></time>
								<?php } ?>
								<?php if(isset($mts_options['mts_home_headline_meta_info'][1]) == '1') { ?>
									 / <?php _e('By','mythemeshop'); ?> <?php the_author_posts_link(); ?>
								<?php } ?>
								<?php if(isset($mts_options['mts_home_headline_meta_info'][2]) == '1') { ?>
									<span class="thecategory"> / <?php _e('Category ','mythemeshop'); the_category(', ') ?></span>
								<?php } ?>
							</div>
						<?php } ?>
						<h2 class="title front-view-title"><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
						<div class="front-view-content">
							<?php echo mts_excerpt(11); ?>
						</div>
					</div>                   
					<?php $i++; endwhile; endif;?>
					</div><!-- end .cat-posts -->
				<?php } ?>
			<?php } ?>
			
			<div class="latest-posts <?php if (isset($mts_options['mts_homepage_layout']) == '1' && $mts_options['mts_home_layout'] == '1' ) { echo 'grid grid-2'; } elseif (isset($mts_options['mts_homepage_layout']) == '2' && $mts_options['mts_home_layout'] == '1') { echo 'grid grid-3'; }?>">
				<h4 class="frontTitle"><?php _e('Latest','mythemeshop'); ?></h4>
				<?php $j = 0; $k = 0; if (have_posts()) : while (have_posts()) : the_post(); ?>
					<article class="latestPost excerpt <?php echo (++$k % 2 == 0) ? 'even' : ''; ?> <?php echo (++$j % 3 == 0) ? 'odd' : ''; ?>">
						<?php if ( has_post_thumbnail() ) { ?>
							<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" rel="nofollow" id="featured-thumbnail">
							<?php if (isset($mts_options['mts_homepage_layout']) == '1' && $mts_options['mts_home_layout'] == '1' ) {
									$thumbsize = 'featured-section-2';
								} elseif (isset($mts_options['mts_homepage_layout']) == '2' && $mts_options['mts_home_layout'] == '1') {
									$thumbsize = 'featured-section-1';
								} else {
									$thumbsize = 'featured';
								} 
								echo '<div class="featured-thumbnail">'; the_post_thumbnail($thumbsize,array('title' => '')); echo '</div>'; ?>
							</a>
						<?php } else { ?>
							<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" rel="nofollow" id="featured-thumbnail">
								<div class="featured-thumbnail">
									<img width="223" height="137" src="<?php if (isset($mts_options['mts_homepage_layout']) == '1' && $mts_options['mts_home_layout'] == '1' ) {
									$nothumbsize = 'nothumb_280x200.png';
								} elseif (isset($mts_options['mts_homepage_layout']) == '2' && $mts_options['mts_home_layout'] == '1') {
									$nothumbsize = 'nothumb_180x130.png';
								} else {
									$nothumbsize = 'nothumb.png';
								} echo get_template_directory_uri().'/images/'.$nothumbsize; ?>" class="attachment-featured wp-post-image" alt="<?php the_title(); ?>">
								</div>
							</a>
						<?php } ?>
						<header>
							<?php if($mts_options['mts_home_headline_meta'] == '1') { ?>
								<div class="post-info <?php if ($mts_options['mts_homepage_layout'] == '2') { echo 'post-info-home'; } ?>"> 
									<?php if(isset($mts_options['mts_home_headline_meta_info'][2]) == '1') { ?>
										<span class="thecategory"><?php _e('in: ','mythemeshop'); the_category(', ') ?></span>  
									<?php } ?>
									<?php if(isset($mts_options['mts_home_headline_meta_info'][3]) == '1') { ?>
										<span class="thetime"> / <?php the_time( get_option( 'date_format' ) ); ?></span> 
									<?php } ?>
									<?php if(isset($mts_options['mts_home_headline_meta_info'][1]) == '1') { ?>
										<span class="theauthor"> / <?php  _e('by: ','mythemeshop'); the_author_posts_link(); ?></span>  
									<?php } ?>
								</div>
							<?php } ?>
							<h2 class="title front-view-title"><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
						</header>
						<div class="front-view-content">
							<?php
								if (isset($mts_options['mts_homepage_layout']) == '1') {
									$mts_excerpt_length = 29;
								} else {
									$mts_excerpt_length = 8;
								}
							?>
							<?php echo mts_excerpt($mts_excerpt_length);?>
							<div class="readMore"><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" rel="nofollow"><?php _e('Read More  &raquo','mythemeshop'); ?></a></div>
						</div>
					</article><!--.post excerpt-->
				<?php endwhile; endif; ?>
			</div>
			<div id="footer-ad-mundocon" align="center">
				<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
				<!-- MundoConV2 - 336x280 - Footer (pagination) -->
				<ins class="adsbygoogle"
					 style="display:inline-block;width:336px;height:280px"
					 data-ad-client="ca-pub-6984813678053903"
					 data-ad-slot="8982533874"></ins>
				<script>
				(adsbygoogle = window.adsbygoogle || []).push({});
				</script>
			</div>
			<!--Start Pagination-->
	        <?php if (isset($mts_options['mts_pagenavigation_type']) && $mts_options['mts_pagenavigation_type'] == '1' ) { ?>
	            <?php $additional_loop = 0; mts_pagination($additional_loop['max_num_pages']); ?> 
			<?php } else { ?>
				<div class="pagination" align="center">
					<ul>
						<li class="nav-previous"><?php next_posts_link( __( '&larr; '.'Older posts', 'mythemeshop' ) ); ?></li>
						<li class="nav-next"><?php previous_posts_link( __( 'Newer posts'.' &rarr;', 'mythemeshop' ) ); ?></li>
					</ul>
				</div>
			<?php } ?>
			<!--End Pagination-->
		</div>
	</div>
	<?php get_sidebar(); ?>
<?php get_footer(); ?>