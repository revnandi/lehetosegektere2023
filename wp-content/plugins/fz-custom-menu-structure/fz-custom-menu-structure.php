<?php

/**
 * Plugin Name: FZ Custom Menu Structure
 * Description: Custom menu walker to add custom menu structure and classes. Following this guide: https://pressidium.com/blog/understanding-the-walker-class-in-wordpress/
 * Version: 1.0
 * Author: Studio Freizeit
 * Author URI: freizeit.hu
 */

function walk_nav_menu_tree( $items, $depth, $r ) {
  if( !function_exists('_wp_menu_output')) {
    $walker = ( empty( $r->walker ) ) ? new Walker_Nav_Menu : $r->walker;

    return $walker->walk( $items, $depth, $r );
  }
}