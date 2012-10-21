<?php get_header(); ?>



<?php 
	if ( have_posts() ) { 
		while ( have_posts() ) : the_post(); 
			
			$credits = get_post_meta($post->ID, 'credits');
			$main_video = get_post_meta($post->ID, 'main_video');

?>

			<article id="project">
				<figure id="main-video">
				<iframe src="http://player.vimeo.com/video/<?php echo $main_video[0];?>?title=0&amp;byline=0&amp;portrait=0&amp;color=00b8ff" width="100%" height="536" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
				</figure>

				<div id="content">
					<header>
						<hgroup>
							<h1><?php the_title(); ?></h1>
							<h2><?php the_excerpt_rss(); ?></h2>
						</hgroup>
					</header>

				<?php the_content(); ?>

				</div>

				<aside id="meta">
					<ul id="sharing">
						<li class="facebook">
						<span class="fb-like" data-href="<?php the_permalink(); ?>" data-send="false" data-layout="button_count" data-width="450" data-show-faces="true"></span>
						</li>
						
						<li class="twitter">
							<a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php the_permalink(); ?>" data-lang="en">Tweet</a>
						</li>
						
						<li>
							<g:plusone></g:plusone>
						</li>

					</ul>

					<?php
		   				$attachments = contains_attachments($post->ID);	
						if($attachments) { ?>
						<figure id="gallery" class="carousel">
							<ul>
								<?php
									foreach ($attachments as $attachment) {
										echo  '<li>';
											echo wp_get_attachment_image( $attachment->ID, 'gallery' );
										echo '</li>';
									}
								?>
							</ul>
						</figure>
					<?php } ?>
					<div id="credits">
						<?php echo $credits[0]; ?>
					</div>
				</aside>

				<footer>
					<ul>
						<?php 
							$siblings = get_post_siblings(2);
							$unpublished = 4;

							if (!empty($siblings['next'])) {
								$next = $siblings['next'];
								foreach($next as $p) {

						?>
									<li class="small-work">
										<a href="<?php the_permalink(); ?>">
											<article>
											<h1><?php the_title(); ?></h1>
												<figure>
													<?php echo get_the_post_thumbnail($post->ID); ?>
												<figure>
											</article>
										</a>
									</li>
						<?php
									$unpublished -= 1;
								}
							}

							if (!empty($siblings['prev'])) {
								$prev = $siblings['prev'];
								foreach($prev as $p) {

						?>
									<li class="small-work">
										<a href="<?php the_permalink(); ?>">
											<article>
											<h1><?php the_title(); ?></h1>
												<figure>
													<?php echo get_the_post_thumbnail($post->ID); ?>
												<figure>
											</article>
										</a>
									</li>
						<?php
									$unpublished -= 1;
								}
							} 	

							if ($unpublished > 0) {
								$the_query = new WP_Query(array ('post_type' => 'project', 'posts_per_page' => $unpublished, 'orderby' => 'rand') );
								while ( $the_query->have_posts() ) : $the_query->the_post();
						?>
									<li class="small-work">
										<a href="<?php the_permalink(); ?>">
											<article>
											<h1><?php the_title(); ?></h1>
												<figure>
													<?php echo get_the_post_thumbnail($post->ID); ?>
												<figure>
											</article>
										</a>
									</li>

						<?php
								endwhile;
							}

						?>
					</ul>
				</footer>
			</article>
	
<?php
		endwhile;
	}
?>

<?php get_footer(); ?>
