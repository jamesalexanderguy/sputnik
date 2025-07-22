<?php

namespace App\Walkers;

use Walker_Nav_Menu;

class Tailwind_Navwalker extends \Walker_Nav_Menu
{
    public function start_lvl(&$output, $depth = 0, $args = null)
    {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul x-cloak x-show=\"open\" @mouseenter.away=\"open = false\" class=\"absolute left-0 mt-2 w-48 bg-white border rounded shadow-lg py-2 z-50\">\n";
    }

    public function end_lvl(&$output, $depth = 0, $args = null)
    {
        $output .= "</ul>\n";
    }

    public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
    {
        $has_children = in_array('menu-item-has-children', $item->classes ?? []);
        $classes = ['relative', 'group'];
        if ($has_children && $depth === 0) {
            $output .= '<li x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false" class="' . esc_attr(join(' ', $classes)) . '">';
            $output .= '<a href="' . esc_url($item->url) . '" class="inline-flex items-center px-4 py-2 text-gray-700 hover:text-blue-500 transition">';
            $output .= apply_filters('the_title', $item->title, $item->ID);
            $output .= '<svg class="ml-1 w-4 h-4 transform group-hover:rotate-180 transition-transform" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 10.939l3.71-3.71a.75.75 0 111.06 1.06l-4.24 4.25a.75.75 0 01-1.06 0L5.25 8.27a.75.75 0 01-.02-1.06z" clip-rule="evenodd"/></svg>';
            $output .= '</a>';
        } else {
            $output .= '<li class="relative">';
            $output .= '<a href="' . esc_url($item->url) . '" class="block px-4 py-2 text-gray-700 hover:text-blue-500 transition">';
            $output .= apply_filters('the_title', $item->title, $item->ID);
            $output .= '</a>';
        }
    }

    public function end_el(&$output, $item, $depth = 0, $args = null)
    {
        $output .= "</li>\n";
    }
}
