<?php get_header(); ?>
	<ul id="posts">
	<?php
		if (have_posts()) { 
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
		<?php 
				endwhile;
			}
		 ?>

		</ul>

		<nav id="blog-navigation">
			<section>
				<h1>Tags</h1>
				<?php
					$terms = get_terms("post_tag");
					$count = count($terms);

					 if ( $count > 0 ){
						 foreach ( $terms as $term ) {
				?>
					<li><a href="<?php echo watergun_url . "/tag/" . $term->slug; ?>"><?php echo $term->name; ?></a></li>
				<?php
						 }
					 }
				?>
				<ul>
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


