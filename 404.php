<?php get_header(); ?>
<section class="guten-block block-content-media">
    <div class="container full">
        <div class="content">
            <h1 class="title"><?php the_title(); ?><?php _e('Not Found', 'cloverleaf-theme'); ?></h1>
            <div class="wysiwyg-wrapper">
                <p><?php _e('Unfortunately we couldn\'t the page you were looking for.<br />Please go back to the <a href="/">homepage</a>. If the error persists please get in <a href="/contact-us">contact with us.</a>'); ?></p>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>