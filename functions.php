<?php
/**
 * Theme Functions
 *
 * @package Aquila
 */

//echo '<pre>';
//print_r(get_stylesheet_uri());
//echo '</pre>';
//wp_die();

function aquila_enqueue_scripts(): void
{
//  REGISTER CSS FILES
    wp_register_style('aquila-stylesheet', get_stylesheet_uri(), [], filemtime(get_template_directory() . '/style.css'), 'all' );

//  REGISTER JS FILES
    wp_register_script('aquila-main', get_template_directory_uri() . '/assets/js/main.js', [], filemtime(get_template_directory() . '/assets/js/main.js'), true);

//  ENQUEUE CSS FILES
    wp_enqueue_style('aquila-stylesheet');

//  ENQUEUE JS FILES
    wp_enqueue_script('aquila-main');
}

add_action('wp_enqueue_scripts', 'aquila_enqueue_scripts');