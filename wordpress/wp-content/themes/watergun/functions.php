<?php
	// define template url constant
	define("template_url", get_template_directory_uri());
	define("watergun_url", get_bloginfo("url"));

	add_theme_support( 'post-thumbnails', array('post', 'watergunner', 'project') );  
    set_post_thumbnail_size( 220, 118, true ); // Normal post thumbnails
    add_image_size( 'featured', 955, 540, true ); // Full size screen
    add_image_size( 'gallery', 466, 262, true ); // sidebar gallery size

	/*  Show the post gallery just if it exists  */
	function contains_attachments( $post_id ) {
		$args = array(
			'post_type' => 'attachment',
			'numberposts' => -1,
			'post_status' => null,
			'post_parent' => $post_id
		);

		$attachments = get_posts( $args );

		return $attachments;

	}

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
		
		if (is_object($custom) || is_array($custom) || isset($custom)) {
			if (isset($custom[$content][0])) {
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

	//create back-end for about page
	get_template_part("about_meta");


	//improved get adjacent posts query
	get_template_part("adjacent_posts");






?>
