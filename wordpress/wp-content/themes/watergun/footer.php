		<footer id="secondary-nav">

			<nav id="footer-nav">
				<h1 class="outline">Footer Menu</h1>
				<ul class="menu">
					<li>
						<a class="work-toggle" href="#">Work</a>
						<ul class="second-level">
							<li><a href="<?php echo watergun_url; ?>/project">All</a></li>
							<?php wp_list_categories( array('taxonomy' => 'project-type', 'exclude' => 7, 'title_li' => '') ); ?>
						</ul>
					</li>
					<li><a href="<?php echo watergun_url; ?>/about">About</a></li>
					<li><a href="<?php echo watergun_url; ?>/blog">Blog</a></li>
					<li><a href="<?php echo watergun_url; ?>/contact">Contact</a></li>
				</ul>
			</nav>
			
			<ul id="social">
				<li><a href="http://vimeo.com/watergun/videos"><img src="<?php echo template_url; ?>/imgs/bt-vimeo.png" alt="Watergun's Vimeo"></a></li>
				<li><a href="http://twitter.com/Watergunner"><img src="<?php echo template_url; ?>/imgs/bt-twitter.png" alt="Watergun's Twitter"></a></li>
				<li><a href="http://www.facebook.com/watergunner"><img src="<?php echo template_url; ?>/imgs/bt-facebook.png" alt="Watergun's Facebook"></a></li>
			</ul>
		</footer>



		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
		<script>window.jQuery || document.write('<script src="<?php echo template_url; ?>/js/libs/jquery-1.8.2.min.js"><\/script>')</script>

		<script src="<?php echo template_url; ?>/js/plugins/jcarousel.min.js"></script>		
		<script src="<?php echo template_url; ?>/js/watergun.js"></script>
		<?php wp_footer(); ?>

	</body>
</html>
