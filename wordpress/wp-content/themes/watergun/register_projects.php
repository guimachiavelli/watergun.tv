<?php
	
	add_action("init", "create_project_section");
	add_action("save_post", "save_project_meta");
	add_action("admin_init", "project_credits_box");
	add_action("admin_print_footer_scripts", "my_admin_print_footer_scripts", 99);
	
	//Create the post type
	function create_project_section() {
		register_post_type( "project",
			array(
				"labels" => array(
					"name" => __( "Projects" ),
					"singular_name" => __( "Project" )
				),
			"public" => true,
			"has_archive" => true,
			"menu_position" => 0,
			"hierarchical" => true, 
			"supports" => array("title", "editor", "thumbnail", "excerpt")

			)
		);
	}
	
	//Add categories to the projects
	register_taxonomy(
		"project-type", 
		array("project"), 
		array(
			"hierarchical" => true, 
			"label" => "Project Types", 
			"singular_label" => "Project Type", 
			"rewrite" => array("slug" => "project/type")
		)
	);

	//Function for saving the info to the database
	function save_project_meta() {
		global $post;

		if(is_object($post) && $post->ID > 0) {
			if (defined("DOING_AUTOSAVE") && DOING_AUTOSAVE) {
				return $post_id;  
			} else {
				update_post_meta($post->ID, "main_video", $_POST["main_video"]);
				update_post_meta($post->ID, "credits", wpautop($_POST["credits"]));
			}
		}
	}

	
	function project_credits_box() {
    	add_meta_box("credits-box", "Credits", "project_credits_options", "project", "normal", "high");
    	add_meta_box("main-video-box", "Main Video", "project_main_video_options", "project", "side", "default");
	}
	

	function project_credits_options(){
        global $post;
        if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) return $post_id;
?>  
		<div style="background-color: #fff;" class="customEditor">
			<textarea  style="p" name="credits"><?php echo get_previous_content('credits', $post->ID); ?></textarea>
		</div>
		
<?php
	
	}

	function project_main_video_options(){
        global $post;  
        if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) return $post_id;
?>  
		<input name="main_video" value="<?php echo get_previous_content('main_video', $post->ID); ?>">

<?php
	}

	// important: note the priority of 99, the js needs to be placed after tinymce loads
	function my_admin_print_footer_scripts() {
?>
		<script type="text/javascript">
			jQuery(function($) {
				var i=1;

				$('.customEditor textarea').each(function(e) {
					var id = $(this).attr('id');
	 
					if (!id) {
						id = 'customEditor-' + i++;
						$(this).attr('id',id);
					}
	 
					tinyMCE.execCommand('mceAddControl', false, id);
					 
				});
			});
		</script>
<?php 
	}
	add_filter('post_link', 'project_permalink', 10, 3);
	add_filter('post_type_link', 'project_permalink', 10, 3);
	 
	function project_permalink($permalink, $post_id, $leavename) {
		if (strpos($permalink, '%type%') === FALSE) return $permalink;
	 
			// Get post
			$post = get_post($post_id);
			if (!$post) return $permalink;
	 
			// Get taxonomy terms
			$terms = wp_get_object_terms($post->ID, 'type');	
			if (!is_wp_error($terms) && !empty($terms) && is_object($terms[0])) $taxonomy_slug = $terms[0]->slug;
			//else $taxonomy_slug = 'not-rated';
	 
		return str_replace('%type%', $taxonomy_slug, $permalink);
	}

	add_filter('body_class','project_classes');
	function project_classes($classes) {

		if ( 'project' == get_post_type() && !is_single()) {
			$classes[] = 'project';
		}
		return $classes;
	}

?>
