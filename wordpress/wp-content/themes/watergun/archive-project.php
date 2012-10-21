<?php get_header(); ?>
	
		<section id="all-the-work">
			<h1 class="outline">All the Works</h1>
			<ul>
				<?php
					
					$all_works = new WP_Query(array ("post_type" => "project", "posts_per_page" => 16) );
					while ( $all_works->have_posts() ) : $all_works->the_post();
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
				?>
			</ul>
		</section>

		<section id="latest-blog">
			<h1><a href="#">Blog</a></h1>

			<ol>


				<?php
					$latest_blog_posts = new WP_Query(array ("post_type" => "post", "posts_per_page" => 2));
					while ( $latest_blog_posts->have_posts() ) : $latest_blog_posts->the_post();
				?>
				<li>
					<article>
						<header>
							<h1><?php the_title(); ?></h1>
							<time datetime="<?php the_time("c"); ?>"><?php the_time("F jS Y"); ?></time>
						</header>
						<p><?php the_excerpt(); ?></p>
						<footer>
							<a class="read-more" href="<?php the_permalink(); ?>">Read the full post</a>
						</footer>
					</article>
				</li>

				<?php
					endwhile;
				?>
			</ol>
		</section>


<?php get_footer(); ?>
