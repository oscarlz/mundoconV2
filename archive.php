<?php $mts_options = get_option('hotnews'); ?>
<?php get_header(); ?>
<div id="page">
	<div class="article <?php if (isset($mts_options['mts_homepage_layout']) == '1' && $mts_options['mts_home_layout'] == '1' ) { echo 'grid grid-2'; } elseif (isset($mts_options['mts_homepage_layout']) == '2' && $mts_options['mts_home_layout'] == '1') { echo 'grid grid-3'; }?>">
		<div id="content_box">
			<?php require 'ad-top-body-responsive.php' ?>
			<h1 class="postsby">
				<?php if (is_category()) { ?>
					<span><?php single_cat_title(); ?><?php _e(" Archive", "mythemeshop"); ?></span>
				<?php } elseif (is_tag()) { ?> 
					<span><?php single_tag_title(); ?><?php _e(" Archive", "mythemeshop"); ?></span>
				<?php } elseif (is_author()) { ?>
					<span><?php  $curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author)); echo $curauth->nickname; _e(" Archive", "mythemeshop"); ?></span> 
				<?php } elseif (is_day()) { ?>
					<span><?php _e("Daily Archive:", "mythemeshop"); ?></span> <?php the_time('l, F j, Y'); ?>
				<?php } elseif (is_month()) { ?>
					<span><?php _e("Monthly Archive:", "mythemeshop"); ?>:</span> <?php the_time('F Y'); ?>
				<?php } elseif (is_year()) { ?>
					<span><?php _e("Yearly Archive:", "mythemeshop"); ?>:</span> <?php the_time('Y'); ?>
				<?php } ?>
			</h1>
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
			<?php //if ($mts_options['mts_pagenavigation'] == '1' ) { ?>
				<?php if ($mts_options['mts_pagenavigation_type'] == '1' ) { ?>
					<?php  $additional_loop = 0; mts_pagination($additional_loop['max_num_pages']); ?>           
				<?php } else { ?>
					<div class="pagination">
						<ul>
							<li class="nav-previous"><?php next_posts_link( __( '&larr; '.'Older posts', 'mythemeshop' ) ); ?></li>
							<li class="nav-next"><?php previous_posts_link( __( 'Newer posts'.' &rarr;', 'mythemeshop' ) ); ?></li>
						</ul>
					</div>
				<?php } ?>
			<?php //} ?>
			<!--End Pagination-->
		</div>
	</div>
	<?php get_sidebar(); ?>
<?php get_footer(); ?>