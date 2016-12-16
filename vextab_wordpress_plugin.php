<?php
/*
Plugin Name: VexTab Wordpress
Plugin URI: https://github.com/yxonic/vextab-wordpress
Version: 1.0
Author: yxonic
*/
class VexTab {
	static $add_script;

	public static function init() {
		add_shortcode( 'vextab', array( __CLASS__, 'vextab_shortcode' ) );
		add_action( 'wp_footer', array( __CLASS__, 'add_script' ) );
	}

	public static function add_script() {
		if ( ! self::$add_script ) {
			return;
		}

		$vextab_url = 'https://raw.githubusercontent.com/0xfe/vextab/master/releases/vextab-div.js';

		wp_enqueue_script( 'vextab', $vextab_url, false, 'master', false );
	}

	public static function vextab_shortcode( $atts, $content ) {
		self::$add_script = true;

		$options = '';
		foreach ( $atts as $key => $value )
			$options = $options . ' ' . $key . '=' . $value;

		return '<div class="vex-tabdiv"' . $options . '>'. $content .'</div>';
	}
}

VexTab::init();
?>