<?php

namespace App\Walkers;

use Walker_Nav_Menu;

class ColumnNavWalker extends Walker_Nav_Menu {
    private $item_count = 0;

    public function start_lvl(&$output, $depth = 0, $args = []) {
        if ($depth === 0) {
            $output .= '<ul class="mt-2 space-y-1">';
        }
    }

    public function end_lvl(&$output, $depth = 0, $args = []) {
        if ($depth === 0) {
            $output .= '</ul>';
        }
    }

    public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
    {
        static $top_level_index = 0;

        if ($depth === 0) {
            $top_level_index++;

            $output .= '<div class="col-span-1 p-8">';

            // Hide the first top-level link (used as submenu wrapper only)
            if ($top_level_index !== 1) {
                $output .= esc_html($item->title);
                $output .= '<div class="mb-2">';
                $output .= '<a href="' . esc_url($item->url) . '" class="hover:underline font-inter uppercase text-lg">';
                $output .= '</a></div>';
            }
        } elseif ($depth === 1) {
            $output .= '<li><a href="' . esc_url($item->url) . '" class="hover:text-blue-700 block">';
            $output .= esc_html($item->title);
            $output .= '</a></li>';
        }
    }

    public function end_el(&$output, $item, $depth = 0, $args = null)
    {
        if ($depth === 0) {
            $output .= '</div>';
        }
    }



    public function start_lvl_wrapper() {
        return '<ul id="menu-primary">';
    }

    public function end_lvl_wrapper() {
        return '</div></ul>';
    }
}
