<?php get_header(); ?>
	<section id="post-listing">
		<ul id="posts">
		<?php
			while ( have_posts() ) : the_post(); 
		?>
				<li>
					<article>
						<header>
							<h1><?php the_title();  ?></h1>
							<time datetime="<?php the_time("c"); ?>"><?php the_time("F jS Y"); ?></time>
						</header>
						
						<?php the_content(); ?>

					</article>

					<aside class="sharing">
						<ul>
							<li>
							<span class="fb-like" data-href="<?php the_permalink(); ?>" data-send="false" data-layout="box_count" data-width="450" data-show-faces="true"></span>


							</li>
							
							<li>
								<a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php the_permalink(); ?>" data-lang="en" data-count="vertical">Tweet</a>
								<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
							</li>
							
							<li>
								<div class="g-plusone" data-size="tall" data-href="<?php the_permalink(); ?>"></div>
								<script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script>
							</li>

						</ul>
					</aside>
				</li>
			<?php endwhile; ?>

			</ul>
		</section>
		<nav id="blog-navigation">
			<section>
				<h1>Tags</h1>
				<ul>
					<?php get_the_tag_list(); ?>
				</ul>
			</section>

			<section>
				<h1>Archives</h1>
				<ol>
					<?php wp_get_archives(); ?>
				</ol>
			</section>	
		</nav>

		<div id="fb-root"></div>
		<script>(function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) return;
		  js = d.createElement(s); js.id = id;
		  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
		  fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));</script>

<?php get_footer(); ?>


