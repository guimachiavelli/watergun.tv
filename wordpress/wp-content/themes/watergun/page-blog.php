<?php get_header(); ?>
	<?php
		$blog_posts = new WP_Query("post_type=post&posts_per_page=4");
		while ( $blog_posts->have_posts() ) : $blog_posts->the_post();

	?>

		<ul id="posts">
			<li>
				<article>
					<header>
						<h1><?php the_title();  ?></h1>
						<time datetime="<?php the_time("c"); ?>"><?php the_time("F jS Y"); ?></time>
					</header>
					
					<?php the_content(); ?>

				</article>

				<aside id="sharing">
					<ul>
						<li>
						<iframe src="//www.facebook.com/plugins/like.php?href=<?php urldecode(the_permalink()); ?>&amp;locale=en_US&amp;send=false&amp;layout=box_count&amp;width=150&amp;show_faces=false&amp;action=like&amp;colorscheme=light&amp;height=90" scrolling="no" style="overflow:hidden; height:90px;" allowTransparency="true"></iframe>
						</li>
						
						<li>
							<a href="https://twitter.com/share" class="twitter-share-button" data-url="http://bit.ly/twitter-api-announce" data-counturl="http://groups.google.com/group/twitter-api-announce" data-lang="en" data-count="vertical">Tweet</a>
						</li>
					</ul>
				</aside>
			</li>
		<?php endwhile; ?>

		</ul>

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


<?php get_footer(); ?>

