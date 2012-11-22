<?php

function get_post_siblings($limit = 2, $date = '') {
    global $wpdb, $post;

    if( empty( $date ) )
        $date = $post->post_date;

    //$date = '2009-06-20 12:00:00'; // test data

    $limit = absint( $limit );
    if( !$limit )
        return;

    $p = $wpdb->get_results( "
    (
        SELECT 
            p1.post_title, 
            p1.post_date,
            p1.ID
        FROM 
            $wpdb->posts p1 
        WHERE 
            p1.post_date < '$date' AND 
            p1.post_type = 'project' AND 
            p1.post_status = 'publish' 
        ORDER by 
            p1.post_date DESC
        LIMIT 
            $limit
    )
    UNION 
    (
        SELECT 
            p2.post_title, 
            p2.post_date,
            p2.ID 
        FROM 
            $wpdb->posts p2 
        WHERE 
            p2.post_date > '$date' AND 
            p2.post_type = 'project' AND 
            p2.post_status = 'publish' 
        ORDER by
            p2.post_date ASC
        LIMIT 
            $limit
    ) 
    ORDER by post_date ASC
    " );
    $i = 0;
    $adjacents = array();
    for( $c = count($p); $i < $c; $i++ )
        if( $i < 2 )
            $adjacents['prev'][] = $p[$i];
        else
			$adjacents['next'][] = $p[$i];

    return $adjacents;
}
?>
