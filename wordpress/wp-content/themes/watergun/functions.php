<?php
	// define template url constant
	define("template_url", get_template_directory_uri());

	add_theme_support( 'post-thumbnails', array('post', 'about', 'project') );  
    set_post_thumbnail_size( 220, 118, true ); // Normal post thumbnails
    add_image_size( 'featured', 955, 540 ); // Full size screen  


	//remove blog class from the first page
	function remove_blog_from_cpt_classes($classes, $class){
		global $post;
		if (is_home()){
			foreach($classes as &$str){
				if(strpos($str, "blog") > -1){
					$str = "";
				}
			}
		}
		return $classes;
	}
	add_filter("body_class", "remove_blog_from_cpt_classes", 10, 2);


	//Helper function for creating new post types
	function get_previous_content($content, $id) {
        $custom = get_post_custom($id);
		
		if (is_object($custom) || is_array($custom)) {
			if ($custom[$content][0]) {
				$previous = $custom[$content][0];
			} else {
				$previous = '';
			}
		} else { $previous = ''; }

		return $previous;

	}


	//create post type: Projects
	get_template_part("register_projects");

	//create post type: Watergunners
	get_template_part("register_watergunners");
	
	//create back-end for home page
	get_template_part("home_meta");

?>
