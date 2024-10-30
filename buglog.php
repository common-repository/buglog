<?php
/*
Plugin Name: Buglog
Plugin URI: https://buglog.com
Description: Plugin allows you to integrate Buglog into your website
Version: 1.0.0
Author: Buglog Team
*/

if ( ! defined( 'WPINC' ) ) {
    die;
}

define( 'BUGLOG_VERSION', '1.0.0' );

function activate_buglog() {
    require_once plugin_dir_path( __FILE__ ) . 'includes/class-buglog-activator.php';
    Buglog_Activator::activate();
}

function deactivate_buglog() {
    require_once plugin_dir_path( __FILE__ ) . 'includes/class-buglog-deactivator.php';
    Buglog_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_buglog' );
register_deactivation_hook( __FILE__, 'deactivate_buglog' );

require plugin_dir_path( __FILE__ ) . 'includes/class-buglog.php';

function run_buglog() {
    $plugin = new Buglog();
    $plugin->run();
}

run_buglog();
