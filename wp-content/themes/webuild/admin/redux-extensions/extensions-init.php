<?php
$redux_opt_name = "apro_options";
// Place any extra hooks/configs in here for extensions and
// place the actual extension within the /extensions dir
include 'metaboxes-config.php';
include 'importer-config.php';
// The loader will load all of the extensions automatically.
// Alternatively you can run the include/init statements below.
require_once( get_template_directory() . '/admin/redux-extensions/loader.php' );