<?php
$footer_logo = get_field('footer_logo', 'option');
$facebook_url = get_field('facebook_url', 'option');
$twitter_url = get_field('twitter_url', 'option');
$youtube_url = get_field('youtube_url', 'option');
$linkedin_url = get_field('linkedin_url', 'option');
$instagram_url = get_field('instagram_url', 'option');
$footer_cta = get_field('footer_cta', 'option');
if ($footer_cta) {
  $footer_cta_url = $footer_cta['url'];
  $footer_cta_title = $footer_cta['title'];
  $footer_cta_target = $footer_cta['target'] ? $footer_cta['target'] : '_self';
}

$secondary_logo = get_field('secondary_logo', 'option');
$secondary_logo_url = get_field('secondary_logo_url', 'option');
$secondary_text = get_field('secondary_text', 'option');
$accreditation_image = get_field('accreditation_image', 'option');
$copyright_text = get_field('copyright_text', 'option');
?>
<footer class="footer">
  <div class="container">
    <div class="primary">
      <?php if ($footer_logo) { ?>
        <figure class="footer-logo">
          <a href="/"><img src="<?php echo $footer_logo['url']; ?>" alt="<?php echo $footer_logo['alt']; ?>" width="380" height="150" /></a>
        </figure>
      <?php } ?>
      <p class="call-us">Call us on <span class="phone"><?php echo get_field('phone', 'option'); ?></span></p>
      <p class="email-us"><span class="email"><a href="mailto:<?php echo get_field('email', 'option'); ?>"><?php echo get_field('email', 'option'); ?></a></span></p>
      <p class="address"><span class="address"><?php echo get_field('address', 'option'); ?></span></p>
      <p class="social">
        <?php if ($facebook_url) { ?>
          <a href="<?php echo $facebook_url; ?>" target="_blank"><i class="fab fa-facebook" style="color: #4267b2;"></i><span class="visually-hidden">Facebook</span></a>
        <?php } ?>
        <?php if ($twitter_url) { ?>
          <a href="<?php echo $twitter_url; ?>" target="_blank"><i class="fab fa-x-twitter" style="color: #0f141a;"></i><span class="visually-hidden">Twitter</span></a>
        <?php } ?>

        <?php if ($youtube_url) { ?>
          <a href="<?php echo $youtube_url; ?>" target="_blank"><i class="fab fa-youtube" style="color: #ff0000;"></i><span class="visually-hidden">YouTube</span></a>
        <?php } ?>

        <?php if ($linkedin_url) { ?>
          <a href="<?php echo $linkedin_url; ?>" target="_blank"><i class="fab fa-linkedin" style="color: #0A66C2;"></i><span class="visually-hidden">LinkedIn</span></a>
        <?php } ?>

        <?php if ($instagram_url) { ?>
          <a href="<?php echo $instagram_url; ?>" target="_blank"><i class="fab fa-instagram" style="color: #E1306C;"></i><span class="visually-hidden">Instagram</span></a>
        <?php } ?>
      </p>
      <?php if ($footer_cta) { ?>
        <a href="<?php echo $footer_cta_url; ?>" target="<?php echo $footer_cta_target; ?>" class="cta cta--blue"><?php echo $footer_cta_title; ?></a>
      <?php } ?>
    </div>

    <div class="secondary">
      <?php if ($secondary_logo) { ?>
        <figure class="footer-secondary-logo">
          <a href="<?php echo $secondary_logo_url; ?>" target="_blank"><img src="<?php echo $secondary_logo['url']; ?>" alt="Cloverleaf Logo" width="509" height="200" /></a>
        </figure>
      <?php } ?>
      <?php if ($secondary_text) { ?>
        <p class="footer-info"><?php echo $secondary_text; ?></p>
      <?php } ?>

      <?php if (have_rows('footer_links', 'option')) { ?>
        <p class="legal-links">
          <?php while (have_rows('footer_links', 'option')) : the_row();
            $link = get_sub_field('link');
            if ($link) {
              $link_url = $link['url'];
              $link_title = $link['title'];
              $link_target = $link['target'] ? $link['target'] : '_self';
            }
          ?>
            <a href="<?php echo $link_url; ?>" target="<?php echo $link_target; ?>"><?php echo $link_title; ?></a>
          <?php endwhile; ?>
        </p>
      <?php } ?>

      <?php if ($accreditation_image) { ?>
        <p class="cert-icons"><img src="<?php echo $accreditation_image['url']; ?>" alt="" /></p>
      <?php } ?>

      <?php if ($copyright_text) { ?>
        <p class="copyright"><?php echo $copyright_text; ?></p>
      <?php } ?>
    </div>
  </div>
</footer>

<a class="back-to-top" href="#top"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/svgs/icon-backtotop.svg" alt=" Back to top" width="56" height="56" /></a>
<?php wp_footer(); ?>

</body>

</html>