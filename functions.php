<?php

add_filter('wpseo_pre_analysis_post_content', 'mysite_opengraph_content');
function mysite_opengraph_content($val) {
return preg_replace("/<img[^>]+>/i", "", $val);
}