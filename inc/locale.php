<?php

if (!defined('ABSPATH'))
	exit;

if (!class_exists('_WP_Editors'))
	require(ABSPATH.WPINC.'/class-wp-editor.php');

function tinymce_translation() {
	$strings = array(
		'button_title' => esc_js(__('Insert a media Image/Audio/Video', 'ldg_embed_button')),
		'window_title' => esc_js(__('Insert a media', 'ldg_embed_button'))
	);

	$locale = _WP_Editors::$mce_locale;
	$translated = 'tinyMCE.addI18n("'.$locale.'.ldg_embed_button",'.json_encode($strings).");\n";

	return $translated;
}

$strings = tinymce_translation();

?>