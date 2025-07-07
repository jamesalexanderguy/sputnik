<?php

/**
 * Theme filters.
 */

namespace App;

/**
 * Add "… Continued" to the excerpt.
 *
 * @return string
 */
add_filter('excerpt_more', function () {
    return sprintf(' &hellip; <a href="%s">%s</a>', get_permalink(), __('Continued', 'sage'));
});

add_filter('use_block_editor_for_post_type', function ($use_block_editor, $post_type) {
    return $post_type === 'page' ? false : $use_block_editor;
}, 10, 2);
