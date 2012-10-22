<?php

	add_action('admin_init','add_contact_meta');
	add_action('save_post', 'save_contact_meta');

	function add_contact_meta() {
		$post_id = 0;

		if (isset($_GET['post'])) {
			$post_id = $_GET['post'];
		}
	
		// checks for post/page ID
		if ($post_id == '73') {
			remove_meta_box('pageparentdiv', 'page', 'side');
	    	add_meta_box("english-box", "US/UK", "english_contacts_options", "page", "normal", "high");
	    	add_meta_box("spanish-box", "Spain", "spanish_contacts_options", "page", "normal", "high");	
		}
		
		add_action('save_post','save_contact_meta');
	}


	function save_contact_meta(){
		global $post;
		if(is_object($post) && $post->ID > 0) {
			if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ){  
				return $post_id;  
			} else {
				update_post_meta($post->ID, "english_contacts", wpautop($_POST["english_contacts"]));
				update_post_meta($post->ID, "spanish_contacts", wpautop($_POST["spanish_contacts"]));
				update_post_meta($post->ID, "english_agent", $_POST["english_agent"]);
				update_post_meta($post->ID, "spanish_agent", $_POST["spanish_agent"]);
			}
		}
	}
	
	function english_contacts_options(){
        global $post;
        if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) return $post_id;
?>  	
		<div>
			<label>US/UK Agent</label>
			<input type="text" value="<?php echo get_previous_content('english_agent', $post->ID); ?>" name="english_agent">
		</div>
		<br>
		<div style="background-color: #fff;" class="customEditor">
			<textarea name="english_contacts"><?php echo get_previous_content('english_contacts', $post->ID); ?></textarea>
		</div>
		
<?php
	
	}

	function spanish_contacts_options(){
        global $post;
        if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) return $post_id;
?>
		<div>
			<label>Spanish Agent</label>
			<input type="text" value="<?php echo get_previous_content('spanish_agent', $post->ID); ?>" name="spanish_agent">
		</div>
		<br>
		<div style="background-color: #fff;" class="customEditor">
			<textarea name="spanish_contacts"><?php echo get_previous_content('spanish_contacts', $post->ID); ?></textarea>
		</div>
		
<?php
	
	}

	add_filter('body_class','contact_classes');
	function contact_classes($classes) {

		if (is_page('contact')) {
			$classes[] = 'contact';
		}
		return $classes;
	}
?>
