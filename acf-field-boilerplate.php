<?php
/*
	Plugin Name: Advanced Custom Fields: Field Boilerplate
	Plugin URI: https://github.com/log1x/acf-field-boilerplate
	Description: A simple ACF field boilerplate with clean syntax.
	Version: 1.0.0
	Author: Log1x
	Author URI: https://log1x.com
	License: GPLv2 or later
	License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

namespace Acf\Field;

// Exit if accessed directly.
if (!defined('ABSPATH')) {
	exit;
}

if (!class_exists('init')) {
	class init
	{
		/**
		 * Construct
		 */
		public function __construct()
		{
			$this->settings = [
				'version'	=> '1.0.0',
				'url'		=> plugin_dir_url(__FILE__),
				'path'		=> plugin_dir_path(__FILE__)
			];

			load_plugin_textdomain('acf-field-boilerplate', false, plugin_basename(dirname(__FILE__ )) . '/lang');
			add_action('acf/include_field_types', [$this, 'field_types']);
			add_action('acf/register_fields', [$this, 'field_types']);
		}


		/**
		 * Include our ACF Field Types
		 *
		 * @param  integer $version
		 * @return void
		 */
		public function field_types($version = 5)
		{
			include_once('fields/example.php');
		}
	}

    // Initialize
    new init();
}
