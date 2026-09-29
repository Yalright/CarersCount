<?php
$footer_logo = function_exists('get_field') ? get_field('footer_logo', 'option') : null;
$facebook_url = function_exists('get_field') ? get_field('facebook_url', 'option') : null;
$twitter_url = function_exists('get_field') ? get_field('twitter_url', 'option') : null;
$youtube_url = function_exists('get_field') ? get_field('youtube_url', 'option') : null;
$linkedin_url = function_exists('get_field') ? get_field('linkedin_url', 'option') : null;
$instagram_url = function_exists('get_field') ? get_field('instagram_url', 'option') : null;
$phone = function_exists('get_field') ? get_field('phone', 'option') : '';
$email = function_exists('get_field') ? get_field('email', 'option') : '';
$address = function_exists('get_field') ? get_field('address', 'option') : '';

// Support ACF "Link" fields (arrays) as well as plain URL strings.
if (is_array($facebook_url)) {
  $facebook_url = $facebook_url['url'] ?? '';
}
if (is_array($twitter_url)) {
  $twitter_url = $twitter_url['url'] ?? '';
}
if (is_array($youtube_url)) {
  $youtube_url = $youtube_url['url'] ?? '';
}
if (is_array($linkedin_url)) {
  $linkedin_url = $linkedin_url['url'] ?? '';
}
if (is_array($instagram_url)) {
  $instagram_url = $instagram_url['url'] ?? '';
}

$facebook_url = is_string($facebook_url) ? trim($facebook_url) : '';
$twitter_url = is_string($twitter_url) ? trim($twitter_url) : '';
$youtube_url = is_string($youtube_url) ? trim($youtube_url) : '';
$linkedin_url = is_string($linkedin_url) ? trim($linkedin_url) : '';
$instagram_url = is_string($instagram_url) ? trim($instagram_url) : '';
$footer_cta = function_exists('get_field') ? get_field('footer_cta', 'option') : null;
if ($footer_cta) {
  $footer_cta_url = $footer_cta['url'] ?? '';
  $footer_cta_title = $footer_cta['title'] ?? '';
  $footer_cta_target = !empty($footer_cta['target']) ? $footer_cta['target'] : '_self';
}

$secondary_logo = function_exists('get_field') ? get_field('secondary_logo', 'option') : null;
$secondary_logo_url = function_exists('get_field') ? get_field('secondary_logo_url', 'option') : '';
$secondary_text = function_exists('get_field') ? get_field('secondary_text', 'option') : null;
$accreditation_image = function_exists('get_field') ? get_field('accreditation_image', 'option') : null;
$copyright_text = function_exists('get_field') ? get_field('copyright_text', 'option') : null;
?>
<footer class="footer">
  <div class="container">
    <div class="primary">
      <?php if ($footer_logo) { 
        $footer_logo_url = is_array($footer_logo) ? $footer_logo['url'] : $footer_logo;
        $footer_logo_alt = is_array($footer_logo) ? $footer_logo['alt'] : '';
      ?>
        <figure class="footer-logo">
          <a href="/"><img src="<?php echo esc_url($footer_logo_url); ?>" alt="<?php echo esc_attr($footer_logo_alt); ?>" width="380" height="150" /></a>
        </figure>
      <?php } ?>
      <p class="call-us">Call us on <span class="phone"><?php echo esc_html($phone); ?></span></p>
      <p class="email-us"><span class="email"><a href="mailto:<?php echo esc_attr($email); ?>"><?php echo esc_html($email); ?></a></span></p>
      <p class="address"><span class="address"><?php echo esc_html($address); ?></span></p>
      <p class="social">
        <?php if ($facebook_url) { ?>
          <a href="<?php echo esc_url($facebook_url); ?>" target="_blank" rel="noopener noreferrer"><i class="fab fa-facebook" style="color: #4267b2;"></i><span class="visually-hidden">Facebook</span></a>
        <?php } ?>
        <?php if ($twitter_url) { ?>
          <a href="<?php echo esc_url($twitter_url); ?>" target="_blank" rel="noopener noreferrer"><i class="fab fa-x-twitter" style="color: #0f141a;"></i><span class="visually-hidden">Twitter</span></a>
        <?php } ?>

        <?php if ($youtube_url) { ?>
          <a href="<?php echo esc_url($youtube_url); ?>" target="_blank" rel="noopener noreferrer"><i class="fab fa-youtube" style="color: #ff0000;"></i><span class="visually-hidden">YouTube</span></a>
        <?php } ?>

        <?php if ($linkedin_url) { ?>
          <a href="<?php echo esc_url($linkedin_url); ?>" target="_blank" rel="noopener noreferrer"><i class="fab fa-linkedin" style="color: #0A66C2;"></i><span class="visually-hidden">LinkedIn</span></a>
        <?php } ?>

        <?php if ($instagram_url) { ?>
          <a href="<?php echo esc_url($instagram_url); ?>" target="_blank" rel="noopener noreferrer"><i class="fab fa-instagram" style="color: #E1306C;"></i><span class="visually-hidden">Instagram</span></a>
        <?php } ?>
      </p>
      <?php if (!empty($footer_cta_url) && !empty($footer_cta_title)) { ?>
        <a href="<?php echo esc_url($footer_cta_url); ?>" target="<?php echo esc_attr($footer_cta_target); ?>" class="cta cta--blue"><?php echo esc_html($footer_cta_title); ?></a>
      <?php } ?>
    </div>

    <div class="secondary">
      <?php if ($secondary_logo) { 
        $secondary_logo_img_url = is_array($secondary_logo) ? $secondary_logo['url'] : $secondary_logo;
      ?>
        <figure class="footer-secondary-logo">
          <a href="<?php echo esc_url($secondary_logo_url); ?>" target="_blank" rel="noopener noreferrer"><img src="<?php echo esc_url($secondary_logo_img_url); ?>" alt="Cloverleaf Logo" width="509" height="200" /></a>
        </figure>
      <?php } ?>
      <?php if ($secondary_text) { ?>
        <p class="footer-info"><?php echo wp_kses_post($secondary_text); ?></p>
      <?php } ?>

      <?php if (function_exists('have_rows') && have_rows('footer_links', 'option')) { ?>
        <p class="legal-links">
          <?php while (have_rows('footer_links', 'option')) : the_row();
            $link = get_sub_field('link');
            $link_url = '';
            $link_title = '';
            $link_target = '_self';
            if (is_array($link)) {
              $link_url = $link['url'] ?? '';
              $link_title = $link['title'] ?? '';
              $link_target = !empty($link['target']) ? $link['target'] : '_self';
            }
          ?>
            <?php if (!empty($link_url) && !empty($link_title)) { ?>
              <a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
            <?php } ?>
          <?php endwhile; ?>
        </p>
      <?php } ?>

      <?php if ($accreditation_image) { 
        $accreditation_image_url = is_array($accreditation_image) ? $accreditation_image['url'] : $accreditation_image;
      ?>
        <p class="cert-icons"><img src="<?php echo esc_url($accreditation_image_url); ?>" alt="" /></p>
      <?php } ?>

      <?php if ($copyright_text) { ?>
        <p class="copyright"><?php echo wp_kses_post($copyright_text); ?></p>
      <?php } ?>
    </div>
  </div>
</footer>

<a class="back-to-top" href="#top"><img src="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/assets/images/svgs/icon-backtotop.svg" alt=" Back to top" width="56" height="56" /></a>
<?php wp_footer(); ?>

</body>

</html>