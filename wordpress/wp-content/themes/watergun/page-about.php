<?php get_header(); ?>
	<?php
		$about_page = new WP_Query(array ("page_id" => "2"));
		while ( $about_page->have_posts() ) : $about_page->the_post();
			$reel_video = get_post_custom_values('reel_video');
					
		?>

		<section id="reel">
			<h1 class="outline">Watergun Reel & Members' Bios</h1>
			<figure id="main-video">
			<iframe src="http://player.vimeo.com/video/<?php echo $reel_video[0]; ?>?title=0&amp;byline=0&amp;portrait=0&amp;color=00b8ff" width="100%" height="537" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
			</figure>

			<article>
				<?php the_content(); ?>
			</article>
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
		</section>
	<?php endwhile; ?>

		<section id="watergunners">
			<h1>Watergunners</h1>
			
			<ul>

				<?php
					$watergunners = new WP_Query(array ("post_type" => "watergunner", "posts_per_page" => 90) );
					while ( $watergunners->have_posts() ) : $watergunners->the_post();
						$role = get_post_custom_values('role');
						$twitter_handle = get_post_custom_values('twitter_handle');
						
				?>
					<li>
						<article>
							<header>
								<figure>
									<?php echo get_the_post_thumbnail($post->ID); ?>
								</figure> 
								<hgroup>
									<h1><?php the_title(); ?></h1>
									<h2><?php echo $role[0];  ?></h2>
									<h3><a href="http://twitter.com/<?php echo $twitter_handle[0]; ?>">@<?php echo $twitter_handle[0]; ?></a></h3>
								</hgroup>
							</header>
							<?php the_content(); ?>
						</article>
					</li>
				<?php endwhile; ?>	
			</ul>
		</section>  

		<section id="latest-works">
			<h1 class="outline">All the Works</h1>
			<ul>
				<?php
					$all_works = new WP_Query(array ("post_type" => "project", "posts_per_page" => 4) );
					$counter = 0;
					while ( $all_works->have_posts() ) : $all_works->the_post();
						$counter += 1;
				?>
				<li class="small-work <?php if ($counter % 4 == 0) { echo 'fourth'; } ?>">
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
	


<?php get_footer(); ?>

