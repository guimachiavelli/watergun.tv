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
					
					<figure id="gallery" class="carousel">
						<ul >
							<li><img src="placeholder/aside1.jpg" alt="making of pictures"></li>
							<li><img src="placeholder/aside1.jpg" alt="making of pictures"></li>
							<li><img src="placeholder/aside1.jpg" alt="making of pictures"></li>
							<li><img src="placeholder/aside1.jpg" alt="making of pictures"></li>
							<li><img src="placeholder/aside1.jpg" alt="making of pictures"></li>
						</ul>
					</figure>

					<div id="credits">
						<?php echo $credits[0]; ?>
					</div>
				</aside>

				<footer>
					<ul>
						<li class="small-work">
							<a href="project.html">
								<article>
									<h1>Heimlich Maneuver Lorem Ipsum</h1>
									<figure>
										<img src="placeholder/allworks1.jpg" alt="Project Name Still">
									<figure>
								</article>
							</a>
						</li>
						<li class="small-work">
							<a href="project.html">
								<article>
									<h1>Heimlich Maneuver Lorem Ipsum</h1>
									<figure>
										<img src="placeholder/allworks1.jpg" alt="Project Name Still">
									<figure>
								</article>
							</a>
						</li>
						<li class="small-work">
							<a href="project.html">
								<article>
									<h1>Heimlich Maneuver Lorem Ipsum</h1>
									<figure>
										<img src="placeholder/allworks1.jpg" alt="Project Name Still">
									<figure>
								</article>
							</a>
						</li>
						<li class="small-work">
							<a href="project.html">
								<article>
									<h1>Heimlich Maneuver Lorem Ipsum</h1>
									<figure>
										<img src="placeholder/allworks1.jpg" alt="Project Name Still">
									<figure>
								</article>
							</a>
						</li>
					</ul>
				</footer>
			</article>
	
<?php
		endwhile;
	}
?>

<?php get_footer(); ?>
