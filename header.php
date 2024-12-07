<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <meta name="theme-color" content="#F1F1F1">
    <meta name="description" content="<?php echo get_bloginfo('description'); ?>">
    <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon.png">
    <link href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon.png" rel="apple-touch-icon" />
    <link rel="stylesheet" href="https://use.typekit.net/vty5kkm.css">
    <title><?php wp_title(''); ?></title>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <?php
    $search_form = get_field('global_search_form', 'option');
    $header_logo = get_field('header_logo', 'option');
    ?>

    <header class="header">
        <?php if ($search_form) { ?>
            <div class="container searchbar-wrapper">
                <div class="searchbar">
                    <?php echo do_shortcode('[searchandfilter id="' . $search_form . '"]'); ?>
                </div>
            </div>
        <?php } ?>
        <div class="container">
            <figure class="primary">
                <?php if (!empty($header_logo)) { ?>
                    <a href="/"><img src="<?php echo $header_logo['url']; ?>" alt="<?php echo $header_logo['alt']; ?>" width="380" height="150" /></a>
                <?php } else { ?>
                    <a href="/"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/svgs/logo-barnsley_carers.svg" alt="Barnsley Carers Logo" width="380" height="150" /></a>
                <?php } ?>
            </figure>
            <div class="secondary">
                <nav class="cta-row">
                    <ul>
                        <li class="call"><a href="#">Call <?php echo get_field('phone', 'option'); ?></a></li>
                        <li class="accessibility"><a href="#reciteme" class="cta cta--blue cta--accessibility">Accessibility</a></li>
                        <?php if (!empty(get_field('enable_donations', 'option'))) {
                            $link = get_field('donations_link', 'option');
                            $link_url = $link['url'];
                            $link_target = $link['target'] ? $link['target'] : '_self';

                        ?>
                            <li class="donate"><a href="<?php echo $link_url; ?>" target="<?php echo $link_target; ?>" class="cta cta--pink cta--donate">Donate</a></li>
                        <?php } ?>
                        <li class="search"><a href="/search" target="<?php echo $link_target; ?>" class="cta cta--white cta--search">Search</a></li>
                        <li class="contact"><a href="/contact-us/" class="cta cta--blue cta--contact">Contact</a></li>
                        <li class="mobileMenu-toggle"><button class="mobile-menu-toggle">Menu</button></li>
                    </ul>
                </nav>
                <nav class="nav-row">
                    <!-- <ul>
                        <li class="active"><a href="#">Home</a></li>
                        <li><a href="#">How can we help?</a></li>
                        <li><a href="#">About us</a></li>
                        <li><a href="#">Donate/Volunteer</a></li>
                        <li><a href="#">News/Events</a></li>
                        <li><a href="#">Contact us</a></li>
                    </ul> -->
                    <?php
                    if (has_nav_menu('header-nav')) {
                        wp_nav_menu(array(
                            'theme_location'    => "header-nav",
                            'menu_class'        => "",
                            'menu_id'           => "",
                            'container'         => false,
                        ));
                    }
                    ?>
                </nav>
            </div>
            <nav class="mobile-menu">
                <!-- <ul>
                    <li><a href="#">Home</a></li>
                    <li class="submenu"><a href="#">How can we help?</a>
                        <ul>
                            <li><a href="#">Financial help</a></li>
                            <li><a href="#">Financial help</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Support</a></li>
                    <li><a href="#">About Us</a></li>
                    <li class="submenu"><a href="#">Donate</a>
                        <ul>
                            <li><a href="#">Child</a></li>
                            <li><a href="#">Child two</a></li>
                        </ul>
                    </li>

                </ul> -->

                <?php
                if (has_nav_menu('header-nav')) {
                    wp_nav_menu(array(
                        'theme_location'    => "header-nav",
                        'menu_class'        => "",
                        'menu_id'           => "",
                        'container'         => false,
                    ));
                }
                ?>
            </nav>
        </div>
    </header>