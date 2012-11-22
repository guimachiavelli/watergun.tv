<?php get_header(); ?>

		<section id="featured" class="carousel">
			<h1 class="outline">Featured Works</h1>

			<ul>

				<?php
					$the_query = new WP_Query(array ('post_type' => 'project', 'posts_per_page' => 5, 'project-type' => 'featured') );
					while ( $the_query->have_posts() ) : $the_query->the_post();
				?>

				<li>
					<a href="<?php the_permalink(); ?>">
						<article>
							<figure>
								<?php echo get_the_post_thumbnail($post->ID, 'featured'); ?>
							</figure>
							<header>
							<h1><?php the_title(); ?></h1>
							<p><?php the_excerpt_rss(); ?></p>
							</header>
						</article>
					</a>
				</li>
	

				<?php	
					endwhile;
				?>
			</ul>
		</section>

		<section id="branding">
			<h1 class="outline">About Watergun</h1>

				<?php
					$branding_page = new WP_Query(array ("page_id" => "41"));
					while ( $branding_page->have_posts() ) : $branding_page->the_post();
						$home_video = get_post_custom_values('home_video');
					
				?>
	
						<iframe src="http://player.vimeo.com/video/<?php echo $home_video[0]; ?>?title=0&amp;byline=0&amp;portrait=0&amp;color=00b8ff" width="710" height="398" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
						<?php the_content(); ?>

				<?php endwhile; ?>
		</section>
		
		<section id="all-the-work" class="infinite">
			<h1 class="outline">All the Works</h1>
			<ul>
			<?php
					$paged = (get_query_var('page')) ? get_query_var('page') : 1;
					$temp_query = $wp_query;
					$wp_query = null;
					$wp_query = new WP_Query(array ("post_type" => "project", "posts_per_page" => 12, "paged" => $paged) );
					$counter = 0;

					while ( $wp_query->have_posts() ) : $wp_query->the_post();
						$counter += 1;
				?>
					<li class="small-work <?php if ($counter % 3 == 0) { echo 'third'; } ?>">
					<a href="<?php the_permalink(); ?>">
						<article>
							<h1><?php the_title(); ?></h1>
							<figure>
								<?php echo get_the_post_thumbnail($post->ID); ?>
							</figure>
						</article>
					</a>
				</li>

				<?php
					endwhile;
				?>
			</ul>
			<div class="navigation">
				<p class="next"><?php next_posts_link(); ?></p>
				<?php previous_posts_link(); ?>
			</div>
			<?php $wp_query = $temp_query; ?>
		</section>

		<section id="latest-blog">
			<h1><a href="#">Blog</a></h1>

			<ol>


				<?php
					$latest_blog_posts = new WP_Query(array ("post_type" => "post", "posts_per_page" => 3));
					while ( $latest_blog_posts->have_posts() ) : $latest_blog_posts->the_post();
				?>
				<li>
					<article>
						<header>
							<h1><?php the_title(); ?></h1>
							<time datetime="<?php the_time("c"); ?>"><?php the_time("F jS Y"); ?></time>
						</header>
						<p><?php the_excerpt_rss(); ?></p>
						<footer>
							<a class="read-more" href="<?php the_permalink(); ?>">Read the full post</a>
						<!--	<a class="read-more" href="<?php echo watergun_url; ?>/blog">Read the full post</a> -->
						</footer>
					</article>
				</li>

				<?php
					endwhile;
				?>
			</ol>
		</section>


<?php get_footer(); ?>
