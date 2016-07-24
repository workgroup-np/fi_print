<?php // Exit if accessed directly
if (!defined('ABSPATH')) {
    echo '<h1>Forbidden</h1>';
    exit();
}
?>
<?php
global $fi_print_options;
global $post;
if (is_home()) {
    $pageid = get_option('page_for_posts');
} else {
    $pageid = get_the_ID();
}
if ($menu = get_post_meta($pageid, 'fi_print_menu_select', true)) {
    $menu_object = get_term_by('term_taxonomy_id', $menu[0], 'nav_menu');
}
                if (isset($menu_object) && is_object($menu_object)) {
                    $args = array(
                         'menu'        => $menu_object->slug,
                         'items_wrap'  => '<ul class="nav nav-spliter navbar-nav">%3$s</ul>',
                         'echo'        => true,
                         'fallback_cb' => 'wp_page_menu()',
                         'walker'      => new fi_print_description_walker()
                    );
                } else {
                     $args            = array(
                     'theme_location' => __('primary','fi_print'),
                     'items_wrap'     => '<ul class="nav nav-spliter navbar-nav">%3$s</ul>',
                     'echo'           => true,
                     'fallback_cb'    => 'wp_page_menu()',
                     'walker'         => new fi_print_description_walker()
                     );
                }
                wp_nav_menu($args);
                
Class fi_print_description_walker extends Walker_Nav_Menu
{
    function start_lvl(&$output, $depth = 0, $args = array())
    {
        $indent = str_repeat("\t", $depth);
        $output.= "\n$indent<ul class=\"nav-submenu depth_$depth\ role=menu\ \">\n";
    }
    function display_element($element, &$children_elements, $max_depth, $depth = 0, $args, &$output)
    {
        // check, whether there are children for the given ID and append it to the element with a (new) ID
        $element->hasChildren = isset($children_elements[$element->ID]) && !empty($children_elements[$element->ID]);
        return parent::display_element($element, $children_elements, $max_depth, $depth, $args, $output);
    }
    function start_el(&$output, $item, $depth = 0, $args = array() , $current_object_id = 0)
    {
        global $wp_query;
        $attributes = '';
        $indent = ($depth) ? str_repeat("\t", $depth) : '';
        $class_names = $value = '';
        $classes = empty($item->classes) ? array() : (array)$item->classes;
        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes) , $item));
        $class_names = ' ' . esc_attr($class_names) . '';
        
        $output.= $indent . '<li class="nav-item" >';
        $attributes.= !empty($item->url) ? ' href="' . esc_attr($item->url) . '"' : '';
        $attributes .= !empty($item->attr_title) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
        $attributes.= !empty($item->target) ? ' target="' . esc_attr($item->target) . '"' : '';
        $prepend = '';
        $append = '';
        $description = !empty($item->description) ? '<span>' . esc_attr($item->description) . '</span>' : '';
        $item_output = $args->before;
        if ($item->hasChildren) {
            $item_output.= '';
            $item_output.= '<a class="nav-link' . esc_attr($class_names) . '" ' . $attributes . '>';
        }
        else {
            $item_output.= '<a class="nav-link '. esc_attr($class_names) . '" ' . $attributes . '>';
        }
        $item_output.= $args->link_before . $prepend . apply_filters('the_title', $item->title, $item->ID) . $append;
        $item_output.= $description . $args->link_after;
        $item_output.= '</a>';
        $item_output.= $args->after;
        $output.= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }
}