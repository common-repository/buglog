<?php

class Buglog_Admin {
	private $plugin_name;
	private $version;

	public function __construct( $plugin_name, $version ) {
		$this->plugin_name = $plugin_name;
		$this->version = $version;
	}

	public function enqueue_styles() {
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/buglog-admin.css', array(), $this->version, 'all' );
	}


	public function enqueue_scripts() {
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/buglog-admin.js', array( 'jquery' ), $this->version, false );
	}

	public function add_menu() {
	    add_menu_page('Buglog', 'Buglog', 'manage_options', 'buglog', array($this, 'display'), 'dashicons-tickets');
    }

    public function display() {
        require_once 'partials/buglog-admin-display.php';
    }

    public function register_settings() {
        register_setting('buglogsettings', 'buglog_id');
        register_setting('buglogsettings', 'buglog_visibility');
    }
}
