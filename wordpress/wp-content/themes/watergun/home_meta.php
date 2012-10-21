<?php

	add_action('admin_init','add_home_meta');

	function add_home_meta() {
		global $post;

		// checks for post/page ID
		if(is_object($post)) {
			if ($post->ID == '41') {
				remove_meta_box('pageparentdiv', 'page', 'side');
				remove_meta_box('posttitlediv', 'page', 'normal');
				add_meta_box('home-specifics', 'Main page video', 'home_meta_options', 'page', 'side', 'default');
			}
		}
		add_action('save_post','save_home_meta');
	}


	add_action('save_post', 'save_home_meta');
	function save_home_meta(){
		global $post;
		if(is_object($post) && $post->ID > 0) {
			if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ){  
				return $post_id;  
			} else {
				update_post_meta($post->ID, "home_video", $_POST["home_video"]);
			}
		}
	}

	function home_meta_options(){
        global $post;
        if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) return $post_id;
?>  	
		<input name="home_video" id="home-video" value="<?php echo get_previous_content("home_video", $post->ID); ?>">
<?php

	}

?>
