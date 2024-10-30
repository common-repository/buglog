<?php

class Buglog {
    protected $loader;

    protected $plugin_name;

    protected $version;

    public function __construct() {
        $this->version = BUGLOG_VERSION;
        $this->plugin_name = 'buglog';

        $this->load_dependencies();
        $this->define_admin_hooks();
        $this->define_public_hooks();
    }

    private function load_dependencies() {
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-buglog-loader.php';
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-buglog-admin.php';
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-buglog-public.php';

        $this->loader = new Buglog_Loader();
    }

    private function define_admin_hooks() {
        $plugin_admin = new Buglog_Admin( $this->get_plugin_name(), $this->get_version() );
        $this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
        $this->loader->add_action( 'admin_menu', $plugin_admin, 'add_menu' );
        $this->loader->add_action( 'admin_init', $plugin_admin, 'register_settings' );
    }

    private function define_public_hooks() {
        $plugin_public = new Buglog_Public( $this->get_plugin_name(), $this->get_version() );
        $this->loader->add_action( 'wp_footer', $plugin_public, 'add_inline_script' );
    }

    public function run() {
        $this->loader->run();
    }

    public function get_plugin_name() {
        return $this->plugin_name;
    }

    public function get_loader() {
        return $this->loader;
    }

    public function get_version() {
        return $this->version;
    }
}
