<?php
require 'PluginUpdateChecker/plugin-update-checker.php';
use YahnisElsts\PluginUpdateChecker\v5\PucFactory;

// Initialize the update checker without explicitly specifying context
$myUpdateChecker = PucFactory::buildUpdateChecker(
    'https://bitbucket.org/mikedistras/carerscount',
    get_template_directory() . '/functions.php', // Path to the main theme file
    'carerscount' // Theme slug (same as your theme folder name)
);

// Optional: Set up authentication for private repositories
if (defined('BITBUCKET_ACCESS_TOKEN')) {
    $myUpdateChecker->setAuthentication(BITBUCKET_ACCESS_TOKEN);
}

// Optional: Specify the branch for stable releases
$myUpdateChecker->setBranch('master');
