<?php
require 'PluginUpdateChecker/plugin-update-checker.php';
use YahnisElsts\PluginUpdateChecker\v5\PucFactory;

// Initialize the update checker without explicitly specifying context
$myUpdateChecker = PucFactory::buildUpdateChecker(
    'https://bitbucket.org/mikedistras/carerscount',
    get_template_directory() . '/functions.php', // Path to the main theme file
    'carerscount' // Theme slug (same as your theme folder name)
);

if (defined('BITBUCKET_CONSUMER_KEY') && defined('BITBUCKET_CONSUMER_SECRET')) {
    $myUpdateChecker->setAuthentication(array(
        'consumer_key' => BITBUCKET_CONSUMER_KEY,
        'consumer_secret' => BITBUCKET_CONSUMER_SECRET,
    ));
} else {
    error_log('Bitbucket Consumer Key and Secret are not defined.');
}

// Optional: Specify the branch for stable releases
$myUpdateChecker->setBranch('master');
