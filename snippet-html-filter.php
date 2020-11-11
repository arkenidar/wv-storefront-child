<?php

// this provides "final_output" filter

/// solution found at the link (it uses "output buffering")
///https://stackoverflow.com/questions/772510/wordpress-filter-to-modify-final-html-output/52388696#52388696

//we use 'init' action to use ob_start()
add_action( 'init', function() {
     ob_start();
} );

add_action('shutdown', function() {
    $final = '';

    // We'll need to get the number of ob levels we're in, so that we can iterate over each, collecting
    // that buffer's output into the final output.
    $levels = ob_get_level();

    for ($i = 0; $i < $levels; $i++) {
        $final .= ob_get_clean();
    }

    // Apply any filters to the final output
    echo apply_filters('final_output', $final);
}, 0);

/*
/// example filter
add_filter('final_output', function($output) {
    //this is where changes should be made
    return str_replace('foo', 'bar', $output); 
});
*/
