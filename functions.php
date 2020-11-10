<?php
function add_css_js() {
    wp_enqueue_style("stylesheet",get_template_directory_uri()."/style.css");
    wp_enqueue_script("child_script_handle",get_stylesheet_directory_uri()."/child-script.js");
}
function html_breadcrumb() {
    $html=do_shortcode("[wpseo_breadcrumb]");
    echo "<script>var html_breadcrumb=`$html`;</script>\n";
}
add_action("wp_head","html_breadcrumb");
add_action("wp_enqueue_scripts","add_css_js");