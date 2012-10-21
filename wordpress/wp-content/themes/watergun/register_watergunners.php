<?php
	
	add_action( "init", "create_watergunner_section" );
	function create_watergunner_section() {
		register_post_type( "watergunner",
			array(
				"labels" => array(
					"name" => __( "Watergunners" ),
					"singular_name" => __( "Watergunner" )
				),
			"public" => true,
			"has_archive" => true,
			"menu_position" => 0,
			"supports" => array("title", "editor", "thumbnail")

			)
		);
	}

	add_action('save_post', 'save_watergunner');
	function save_watergunner(){  
		global $post;
		if(is_object($post) && $post->ID > 0) {
			if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ){  
				return $post_id;  
			} else {
				update_post_meta($post->ID, "twitter_handle", $_POST["twitter_handle"]);
				update_post_meta($post->ID, "role", $_POST["role"]);
			}
		}
	}

	
	add_action("admin_init", "watergunner_box");  
	function watergunner_box(){
    	add_meta_box("personal-info-box", "Role and Twitter", "watergunner_options", "watergunner", "side", "default");
	}

	function watergunner_options(){
        global $post;  
        if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) return $post_id;
?>  	
		<label for="role">Role</label>
		<input name="role" id="role" value="<?php echo get_previous_content('role', $post->ID); ?>">
		<label for="twitter-handle">Twitter Username</label>
		<input name="twitter_handle" id="twitter-handle" value="<?php echo get_previous_content('twitter_handle', $post->ID); ?>">
<?php

	}

?>
