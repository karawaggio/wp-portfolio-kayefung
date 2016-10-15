<?php

//Change Excerpt read More
function kayesha_excerpt_more( $more ) {
    return '<a class="read-more" href="' . get_permalink() . '">Read More</a>';
}
add_filter( 'excerpt_more', 'kayesha_excerpt_more' );

//Change the length of the excerpt
function kayesha_excerpt_length( $length ) {
        return 0;
}
add_filter( 'excerpt_length', 'kayesha_excerpt_length', 999 );
