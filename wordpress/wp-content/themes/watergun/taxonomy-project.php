<?php get_header(); ?>

		<section id="all-the-work">
			<h1 class="outline">All the Works</h1>
			<ul>
				<?php
					if ( have_posts() ) { 
						while ( have_posts() ) : the_post(); 
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
			<div class="navigation">
				<p class="next"><?php next_posts_link(); ?></p>
				<?php previous_posts_link(); ?>
			</div>
		</section>


<?php get_footer(); ?>
