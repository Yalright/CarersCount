<?php
require 'PluginUpdateChecker/plugin-update-checker.php';
use YahnisElsts\PluginUpdateChecker\v5\PucFactory;


$myUpdateChecker = PucFactory::buildUpdateChecker(
	'https://github.com/Yalright/CarersCount',
	get_template_directory() . '/functions.php',
	'carers-count'
);

//Set the branch that contains the stable release.
$myUpdateChecker->setBranch('main');

//Optional: If you're using a private repository, specify the access token like this:
// $myUpdateChecker->setAuthentication('your-token-here');