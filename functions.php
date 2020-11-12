<?php
/*
function add_css_js() {
    
    wp_enqueue_style('vw-storefront-basic-style', get_template_directory_uri()."/style.css");
    wp_enqueue_style( "child-style", get_stylesheet_uri() );
    
    wp_enqueue_script("child-script", get_stylesheet_directory_uri()."/child-script.js");
}
add_action("wp_enqueue_scripts","add_css_js");
*/

// JS DOM edit replaced by PHP filter (see below)
/*
function html_breadcrumb() {
    $html=do_shortcode("[wpseo_breadcrumb]");
    echo "<script>var html_breadcrumb=`$html`;</script>\n";
}
add_action("wp_head","html_breadcrumb");
*/

function html_filter($html){
    $before='<div id="content-vw">';
    $after=$before."\n".do_shortcode("[wpseo_breadcrumb]");
    $html=str_replace($before,$after,$html);
    return $html;
}
add_filter("final_output","html_filter");
// final_output filter defined here
include("snippet-html-filter.php");

// cascading child theme styles after parent theme styles
define("WPEX_THEME_STYLE_HANDLE","vw-storefront-basic-style");
define("WPEX_THEME_VERSION","1.0");
include("snippet-child-theme-styles.php");
