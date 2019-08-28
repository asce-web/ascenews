<?php

/*
Plugin Name: Simple Sitemap
Plugin URI: http://wordpress.org/plugins/simple-sitemap/
Description: HTML sitemap to display content as a single linked list of posts, pages, or custom post types. You can even display posts in groups sorted by taxonomy!
Version: 3.4
Author: David Gwyer
Author URI: http://www.wpgoplugins.com
Text Domain: simple-sitemap
*/
/*  Copyright 2019 David Gwyer (email : david@wpgoplugins.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
if ( !defined( 'ABSPATH' ) ) {
    exit;
}

if ( function_exists( 'ss_fs' ) ) {
    ss_fs()->set_basename( false, __FILE__ );
} else {
    
    if ( !function_exists( 'ss_fs' ) ) {
        // Create a helper function for easy SDK access.
        function ss_fs()
        {
            global  $ss_fs ;
            
            if ( !isset( $ss_fs ) ) {
                // Include Freemius SDK.
                require_once dirname( __FILE__ ) . '/freemius/start.php';
                $ss_fs = fs_dynamic_init( array(
                    'id'             => '4087',
                    'slug'           => 'simple-sitemap',
                    'premium_slug'   => 'simple-sitemap-pro',
                    'type'           => 'plugin',
                    'public_key'     => 'pk_d7776ef9a819e02b17ef810b17551',
                    'is_premium'     => false,
                    'premium_suffix' => 'Pro',
                    'has_addons'     => false,
                    'has_paid_plans' => true,
                    'menu'           => array(
                    'slug'       => 'simple-sitemap-menu',
                    'first-path' => 'admin.php?page=simple-sitemap-menu',
                ),
                    'is_live'        => true,
                ) );
            }
            
            return $ss_fs;
        }
        
        // Init Freemius.
        ss_fs();
        // Signal that SDK was initiated.
        do_action( 'ss_fs_loaded' );
    }
    
    class WPGO_Simple_Sitemap
    {
        protected  $module_roots ;
        /* Main class constructor. */
        public function __construct( $module_roots )
        {
            $this->module_roots = $module_roots;
            $this->bootstrap();
            // Add custom block category
            // @todo move to another location
            add_filter(
                'block_categories',
                function ( $categories, $post ) {
                return array_merge( $categories, [ [
                    'slug'  => 'simple-sitemap',
                    'title' => __( 'Simple Sitemap', 'simple-sitemap' ),
                ] ] );
            },
                10,
                2
            );
        }
        
        /* Bootstrap plugin. */
        public function bootstrap()
        {
            $root = $this->module_roots['dir'];
            $path = $root . 'classes/bootstrap.php';
            require_once $path;
            new WPGO_Simple_Sitemap_Bootstrap( $this->module_roots );
        }
    
    }
    /* End class definition */
    $module_roots = array(
        'dir'  => plugin_dir_path( __FILE__ ),
        'pdir' => plugin_dir_url( __FILE__ ),
        'uri'  => plugins_url( '', __FILE__ ),
        'file' => __FILE__,
    );
    new WPGO_Simple_Sitemap( $module_roots );
}
