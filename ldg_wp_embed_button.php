<?php

/**
 * Plugin Name: LDG WP Embed Button
 * Plugin URI: http://ldgabet.fr
 * Version: 1.0
 * Author: Louis-David GABET
 * Author URI: http://ldgabet.fr
 * Description: A simple TinyMCE Plugin to add a button to embed media
 * License: GPL2
 */

class LDG_WP_Embed_Button {

	function __construct() {
		if (is_admin()) {
			add_action('admin_head', array(&$this, 'setup_plugin'));
			add_action('admin_enqueue_scripts', array(&$this, 'add_tinymce_css'));
			add_action('plugins_loaded', array(&$this, 'load_textdomain'));
		}
	}

	function setup_plugin() {
		if (!current_user_can('edit_posts') && !current_user_can('edit_pages'))
			return false;

		if (!get_user_option('rich_editing'))
			return false;

		add_filter('mce_external_plugins', array(&$this, 'add_tinymce_plugin'));
		add_filter('mce_buttons', array(&$this, 'add_tinymce_button'));
		add_filter('mce_external_languages', array(&$this, 'add_tinymce_lang'));
	}

	function add_tinymce_plugin($plugins) {
		$plugins['ldg_embed_button'] = plugins_url('/js/script.js', __FILE__);
		return $plugins;
	}

	function add_tinymce_button($buttons) {
		array_push($buttons, 'ldg_embed_button');
		return $buttons;
	}

	function add_tinymce_lang($locales) {
		$locales['ldg_embed_button'] = plugin_dir_path(__FILE__).'/inc/locale.php';
		return $locales;
	}

	function add_tinymce_css() {
		wp_enqueue_style('ldg_embed_button', plugins_url('/css/style.css', __FILE__));
	}

	function load_textdomain() {
		load_plugin_textdomain('ldg_embed_button', false, dirname(plugin_basename(__FILE__)).'/lang');
	}

}

$ldg_wp_embed_button = new LDG_WP_Embed_Button();

?>