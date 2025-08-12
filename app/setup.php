<?php

/**
 * Theme setup.
 */

namespace App;

use function Roots\bundle;

/**
 * Register the theme assets.
 */
add_action('wp_enqueue_scripts', function () {
    bundle('app')->enqueue();
}, 100);

/**
 * Register the theme assets with the block editor.
 */
add_action('enqueue_block_editor_assets', function () {
    bundle('editor')->enqueue();
}, 100);

/**
 * Initial theme setup.
 */
add_action('after_setup_theme', function () {
    remove_theme_support('block-templates');

    register_nav_menus([
        'primary_navigation' => __('Primary Navigation', 'sage'),
    ]);

    remove_theme_support('core-block-patterns');

    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('responsive-embeds');

    add_theme_support('html5', [
        'caption',
        'comment-form',
        'comment-list',
        'gallery',
        'search-form',
        'script',
        'style',
    ]);

    add_theme_support('customize-selective-refresh-widgets');
}, 20);

/**
 * Register sidebars.
 */
add_action('widgets_init', function () {
    $config = [
        'before_widget' => '<section class="widget %1$s %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>',
    ];

    register_sidebar([
        'name' => __('Primary', 'sage'),
        'id'   => 'sidebar-primary',
    ] + $config);

    register_sidebar([
        'name' => __('Footer', 'sage'),
        'id'   => 'sidebar-footer',
    ] + $config);
});

/**
 * REST API routes.
 */
add_action('rest_api_init', function () {
    register_rest_route('sputnik/v1', '/posts', [
        'methods'             => 'GET',
        'callback'            => '\App\sputnik_get_posts',
        'permission_callback' => '__return_true',
    ]);

    register_rest_route('sputnik/v1', '/courses', [
        'methods'             => 'GET',
        'callback'            => '\App\sputnik_get_courses',
        'permission_callback' => '__return_true',
    ]);
});

/**
 * Fetch blog posts.
 */
function sputnik_get_posts($request) {
    $page   = $request instanceof \WP_REST_Request ? $request->get_param('page') : null;
    $search = $request instanceof \WP_REST_Request ? $request->get_param('search') : null;
    $cats   = $request instanceof \WP_REST_Request ? $request->get_param('categories') : null;

    $args = [
        'post_type'      => 'post',
        'posts_per_page' => 6,
        'paged'          => $page ?: 1,
        's'              => $search ?: '',
    ];

    if ($cats) {
        $args['tax_query'] = [
            [
                'taxonomy' => 'category',
                'field'    => 'term_id',
                'terms'    => array_map('intval', explode(',', $cats)),
            ]
        ];
    }

    $query = new \WP_Query($args);
    $posts = [];

    foreach ($query->posts as $post) {
        $thumb_id = get_post_thumbnail_id($post->ID);

        $posts[] = [
            'id'                    => $post->ID,
            'title'                 => get_the_title($post),
            'excerpt'               => get_the_excerpt($post),
            'date'                  => get_the_date('', $post),
            'link'                  => get_permalink($post),
            'sticky'                => is_sticky($post->ID),
            'featured_image'        => wp_get_attachment_image_url($thumb_id, 'medium_large'),
            'featured_image_srcset' => wp_get_attachment_image_srcset($thumb_id, 'medium_large'),
            'featured_image_sizes'  => wp_get_attachment_image_sizes($thumb_id, 'medium_large'),
        ];
    }

    return rest_ensure_response($posts);
}

/**
 * Fetch courses.
 */
function sputnik_get_courses($request) {
    $page   = $request instanceof \WP_REST_Request ? $request->get_param('page') : null;
    $search = $request instanceof \WP_REST_Request ? $request->get_param('search') : null;
    $cats   = $request instanceof \WP_REST_Request ? $request->get_param('categories') : null;

    $args = [
        'post_type'      => 'course',
        'posts_per_page' => 6,
        'paged'          => $page ?: 1,
        's'              => $search ?: '',
    ];

    if ($cats) {
        $args['tax_query'] = [
            [
                'taxonomy' => 'course_category',
                'field'    => 'term_id',
                'terms'    => array_map('intval', explode(',', $cats)),
            ]
        ];
    }

    $query = new \WP_Query($args);
    $posts = [];

    foreach ($query->posts as $post) {
        $thumb_id = get_post_thumbnail_id($post->ID);

        $posts[] = [
            'id'                    => $post->ID,
            'title'                 => get_the_title($post),
            'excerpt'               => get_the_excerpt($post),
            'date'                  => get_the_date('', $post),
            'link'                  => get_permalink($post),
            'sticky'                => is_sticky($post->ID),
            'featured_image'        => wp_get_attachment_image_url($thumb_id, 'medium_large'),
            'featured_image_srcset' => wp_get_attachment_image_srcset($thumb_id, 'medium_large'),
            'featured_image_sizes'  => wp_get_attachment_image_sizes($thumb_id, 'medium_large'),
        ];
    }

    return rest_ensure_response($posts);
}


/**
 * Block template defaults & patterns.
 */
add_action('init', function () {
    $title_cover = [
        'core/cover',
        [
            'url'                => 'https://kootenayavalanchecourses.test/wp-content/uploads/2025/08/4A9DB131-A2CC-469C-8F59-34B18F887A81_1_105_c-1-1.jpeg',
            'id'                 => 2873,
            'customOverlayColor' => 'transparent',
            'dimRatio'           => 0,
            'className'          => 'standard-cover',
            'sizeSlug'           => 'full',
            'layout'             => ['type' => 'constrained'],
            'style'              => [
                'spacing' => [
                    'padding' => [
                        'left'  => 'var:preset|spacing|80',
                        'right' => 'var:preset|spacing|80',
                    ],
                ],
            ],
        ],
        [
            [
                'core/group',
                [
                    'className' => 'hero-standard',
                    'layout'    => [
                        'type'          => 'flex',
                        'orientation'   => 'vertical',
                        'flexWrap'      => 'wrap',
                        'justifyContent'=> 'left',
                    ],
                ],
                [
                    [
                        'core/post-title',
                        [
                            'className' => 'hero-standard text-white has-darkroyal-transp-background-color has-background',
                            'level'     => 2,
                        ],
                    ],
                ]
            ]
        ]
    ];

    $date_cover = [
        'core/cover',
        [
            'customOverlayColor' => '#ffffff',
            'dimRatio'           => 100,
            'className'          => 'is-light',
            'minHeight'          => 74,
            'aspectRatio'        => 'unset',
            'style'              => [
                'spacing' => [
                    'padding' => [
                        'left'  => 'var:preset|spacing|80',
                        'right' => 'var:preset|spacing|80',
                    ],
                ],
            ],
        ],
        [
            [
                'core/post-date',
                [
                    'format' => 'F j, Y',
                    'style'  => [
                        'spacing' => [
                            'padding' => [
                                'top'    => '0',
                                'right'  => '0',
                                'bottom' => '0',
                                'left'   => '0',
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ];

    if ($page_pt = get_post_type_object('page')) {
        $page_pt->template = [$title_cover];
    }

    if ($course_pt = get_post_type_object('course')) {
        $course_pt->template = [$title_cover];
    }

    if ($post_pt = get_post_type_object('post')) {
        $post_pt->template = [$title_cover, $date_cover];
    }

    if (function_exists('register_block_pattern')) {
        $date_pattern_content = '
<!-- wp:cover {"customOverlayColor":"#ffffff","dimRatio":100,"minHeight":74,"style":{"spacing":{"padding":{"left":"var:preset|spacing|80","right":"var:preset|spacing|80"}}},"className":"is-light","aspectRatio":"unset"} -->
<div class="wp-block-cover is-light" style="padding-right:var(--wp--preset--spacing--80);padding-left:var(--wp--preset--spacing--80);min-height:74px;aspect-ratio:unset"><span aria-hidden="true" class="wp-block-cover__background has-white-background-color has-background-dim-100"></span><div class="wp-block-cover__inner-container"><!-- wp:post-date {"format":"F j, Y","style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"}}}} /--></div></div>
<!-- /wp:cover -->
        ';

        register_block_pattern(
            'kac/date-cover',
            [
                'title'       => __('Date cover (KAC)', 'kootenayavalanche'),
                'description' => __('Cover bar with dynamic post date and matching padding', 'kootenayavalanche'),
                'content'     => $date_pattern_content,
            ]
        );
    }
}, 20);
