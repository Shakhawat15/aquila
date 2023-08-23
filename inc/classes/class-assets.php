<?php
/**
 * Enqueue theme assets
 *
 * @package Auila
 */

namespace AQUILA_THEME\Inc;

use AQUILA_THEME\Inc\Traits\Singleton;

class Assets {
    use Singleton;

    protected function __construct()
    {
//      LOAD CLASS
        $this->setup_hooks();
    }

    protected function setup_hooks(): void
    {
//      ACTIONS AND FILTER
        add_action('wp_enqueue_scripts', [$this, 'register_styles']);
        add_action('wp_enqueue_scripts', [$this, 'register_scripts']);
    }

    public function register_styles(): void
    {
//      REGISTER CSS FILES
        wp_register_style('aquila-stylesheet', get_stylesheet_uri(), [], filemtime(AQUILA_DIR_PATH . '/style.css'), 'all');
        wp_register_style('aquila-bootstrap-min', AQUILA_DIR_URI . '/assets/src/library/css/bootstrap.min.css', [], '5.3.1', 'all');

//      ENQUEUE CSS FILES
        wp_enqueue_style('aquila-stylesheet');
        wp_enqueue_style('aquila-bootstrap-min');
    }

    public function register_scripts(): void
    {
//      REGISTER JS FILES
        wp_register_script('aquila-main', AQUILA_DIR_URI . '/assets/js/main.js', [], filemtime(AQUILA_DIR_PATH . '/assets/src/library/js/main.js'), true);
        wp_register_script('aquila-bootstrap-bundle-min', AQUILA_DIR_URI . '/assets/src/library/js/bootstrap.bundle.min.js', ['jquery'], '5.3.1', true);

//      ENQUEUE JS FILES
        wp_enqueue_script('aquila-main');
        wp_enqueue_script('aquila-bootstrap-bundle-min');
    }
}