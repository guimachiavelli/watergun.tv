<?php get_header(); ?>

		<section id="all-the-work" class="infinite">
			<h1 class="outline">All the Works</h1>
			<ul class="test">

			<?php
				if (have_posts()) { 
					$counter = 0;
					while ( have_posts() ) : the_post(); 
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
				} 
			?>
			</ul>
			<div class="navigation">
				<p class="next"><?php next_posts_link(); ?></p>
				<?php previous_posts_link(); ?>
			</div>

		</section>

<?php get_footer(); ?>
