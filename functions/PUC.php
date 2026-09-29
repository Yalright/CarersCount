<?php
require 'PluginUpdateChecker/plugin-update-checker.php';
use YahnisElsts\PluginUpdateChecker\v5\PucFactory;

// Initialize the update checker against the GitHub source of truth.
$myUpdateChecker = PucFactory::buildUpdateChecker(
    'https://github.com/Yalright/CarersCount',
    get_template_directory() . '/functions.php', // Path to the main theme file
    'carerscount' // Theme slug (same as your theme folder name)
);

// Optional: Specify the branch for stable releases.
$myUpdateChecker->setBranch('main');
