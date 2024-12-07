<?php
require 'PluginUpdateChecker/plugin-update-checker.php';
use YahnisElsts\PluginUpdateChecker\v5\PucFactory;

// Initialize the update checker without explicitly specifying context
$myUpdateChecker = PucFactory::buildUpdateChecker(
    'https://github.com/Yalright/CarersCount',
    get_template_directory() . '/functions.php', // Path to the main theme file
    'carers-count' // Theme slug (same as your theme folder name)
);

// Optional: Set up authentication for private repositories


// Optional: Specify the branch for stable releases
$myUpdateChecker->setBranch('master');





$myUpdateChecker = PucFactory::buildUpdateChecker(
	'https://github.com/Yalright/CarersCount',
	get_template_directory() . '/functions.php',
	'carers-count'
);

//Set the branch that contains the stable release.
$myUpdateChecker->setBranch('main');

//Optional: If you're using a private repository, specify the access token like this:
// $myUpdateChecker->setAuthentication('your-token-here');