<?php
/*
Plugin Name: Advanced Custom Fields: Field Boilerplate
Plugin URI:  https://github.com/log1x/acf-field-boilerplate
Description: A better way to create ACF Fields.
Version:     1.0.5
Author:      Brandon Nifong
Author URI:  https://log1x.com
*/

namespace Log1x\ExampleField;

if (! file_exists($composer = __DIR__ . '/vendor/autoload.php')) {
    return;
}

require_once($composer);
return new FieldLoader();
