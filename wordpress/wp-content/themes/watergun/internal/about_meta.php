<?php
	
	add_action('admin_init','add_about_meta');
	add_action('save_post', 'save_home_meta');


	function add_about_meta() {
		$post_id = 0;

		if (isset($_GET['post'])) {
			$post_id = $_GET['post'];
		}	

		if ($post_id == '2') {
			remove_meta_box('pageparentdiv', 'page', 'side');	
			add_action( 'be_gallery_metabox_post_types', 'add_about_gallery' );
			add_meta_box('about-specifics', 'About page video', 'about_meta_options', 'page', 'side', 'default');
		}
		add_action('save_post','save_about_meta');
		
	}
	
	function add_about_gallery( $post_types ) { return array( 'page' ); }


	function save_about_meta(){
		global $post;
		if(is_object($post) && $post->ID > 0) {
			if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ){  
				return $post_id;  
			} else {
				update_post_meta($post->ID, "reel_video", $_POST["reel_video"]);
			}
		}
	}


	function about_meta_options(){
        global $post;
        if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) return $post_id;
?>  	
		<input name="reel_video" id="reel-video" value="<?php echo get_previous_content("reel_video", $post->ID); ?>">
<?php

	}

	add_filter('body_class','about_classes');
	function about_classes($classes) {
		if (is_page('about')) {
			$classes[] = 'about';
		}
		return $classes;
	}
?>
