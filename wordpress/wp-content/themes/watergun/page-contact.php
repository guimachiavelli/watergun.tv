<?php get_header(); ?>
	<?php
		$contact_page = new WP_Query("pagename=contact");
		while ( $contact_page->have_posts() ) : $contact_page->the_post();
			$english = get_post_custom_values('english_contacts');
			$spanish = get_post_custom_values('spanish_contacts');
			$english_agent = get_post_custom_values('english_agent');
			$spanish_agent = get_post_custom_values('spanish_agent');

	?>

		<section id="contact-info">
			<h1 class="outline">Contact Information</h1>
			<?php //print_r($contact_page); ?>
			<article id="uk-usa">
				<hgroup>
					<h1>UK &amp; USA</h1>
					<h2><?php echo $english_agent[0]; ?></h2>
				 </hgroup>
				<?php echo $english[0]; ?>
			</article>

			<article id="spain">
				<hgroup>
					<h1>Spain</h1>
					<h2><?php echo $spanish_agent[0]; ?></h2>
				 </hgroup>
				<?php echo $spanish[0]; ?>
			</article>

			<aside>
				<?php the_content(); ?>
			</aside>

		</section>
	<?php endwhile; ?>

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

