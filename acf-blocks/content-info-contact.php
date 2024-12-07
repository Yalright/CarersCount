<?php

/***
 * Block - Information & Contact
 *
 ***/ ?>
<?php
$title = get_field('title');
$content = get_field('content');
$image = get_field('image');
$include_contact_form = get_field('include_contact_form');
$block_id = get_field('block_id');

?>

<section class="guten-block block-info-contact" id="<?php echo $block_id; ?>">
  <div class="container">
    <?php if (!empty($title)) { ?>
      <p class="title"><?php echo $title; ?></p>
    <?php } ?>

    <div class="content-container">
      <div class="content">
        <?php if (!empty($content)) {
          echo $content;
        } ?>

        <?php if (have_rows('useful_links')) { ?>
          <p class="useful-links-title">Useful links</p>
          <ul class="useful-links">
            <?php while (have_rows('useful_links')) : the_row();
              $link = get_sub_field('link');
              if ($link) {
                $link_url = $link['url'];
                $link_title = $link['title'];
                $link_target = $link['target'] ? $link['target'] : '_self';
              }
            ?>

              <li><a href="<?php echo $link_url; ?>" target="<?php echo $link_target; ?>"><?php echo $link_title; ?></a></li>

            <?php endwhile; ?>
          </ul>
        <?php } ?>
      </div>
      <div class="image">
        <?php if (!empty($image)) { ?>
          <figure>
            <img src="<?php echo $image['url']; ?>" alt="" width="3" height="2" />
          </figure>
        <?php } ?>
      </div>
    </div>

    <?php if (!empty($include_contact_form)) { ?>
      <div class="contact-wrapper">
        <figure>
          <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/svgs/icon-callmail.svg" alt="" width="96" height="96" />
        </figure>
        <p class="title">Need more info? Leave your details and we'll get back in touch.</p>
        <div class="details">
          <p class="title">Need more info? Leave your details and we'll get back in touch.</p>
          <div class="form-wrapper">
            <?php echo do_shortcode('[contact-form-7 id="49" title="Contact form"]'); ?>
          </div>
          <!-- <a class="back-to-top" href="#top"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/svgs/icon-backtotop.svg" " alt=" Back to top" width="56" height="56" /></a> -->
        </div>
      </div>
    <?php } ?>
  </div>
</section>