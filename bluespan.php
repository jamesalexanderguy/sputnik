<?php
/**
 * Plugin Name: Text colour shortcode
 * Plugin URI: https://spaceracedigital.com
 * Description: Make
 * Version: 0.1
 * Author: SpaceRace Digital
 * Author URI: https://spaceracedigital.com
 */


function sr_bluespan($atts, $content="") {
	return '<span style="color: blue;">'.$content.'</span>';
}

add_shortcode('blue', 'sr_bluespan');

function sr_redspan($atts, $content="") {
	return '<span style="color: red;">'.$content.'</span>';
}

add_shortcode('red', 'sr_redspan');