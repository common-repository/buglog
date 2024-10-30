<?php

class Buglog_Public {
	private $plugin_name;
	private $version;

	public function __construct( $plugin_name, $version ) {
		$this->plugin_name = $plugin_name;
		$this->version = $version;
	}

    public function add_inline_script() {
	    $id = get_option('buglog_id');
	    $visibility = get_option('buglog_visibility');
	    $output = '';

	    if (!empty($id) && ($visibility === 'public' || $visibility === 'private' && is_user_logged_in())) {
            $id = preg_replace("/[^A-Za-z0-9?!]/",'', $id);
            $output = <<<EOD
<script>
  (function(d, s) {
    s = d.createElement('script');
    s.src = 'https://api.buglog.com/website/$id/code';
    s.async = 1;
    d.head.appendChild(s);
  })(document);
</script>
EOD;
        }

        echo $output . PHP_EOL;
    }
}
