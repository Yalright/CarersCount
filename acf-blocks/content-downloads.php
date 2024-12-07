<?php

/***
 * Block - Downloads
 *
 ***/ ?>
<?php
$title = get_field('title');
$heading_colours = get_field('heading_colours');

?>

<section class="guten-block block-downloads" id="downloads">
  <div class="container">
    <?php if ($title) { ?>
      <p class="title"><?php echo $title; ?></p>
    <?php } ?>


    <?php if (have_rows('downloads')) { ?>
      <div class="download-grid">
        <?php while (have_rows('downloads')) : the_row();
          $title = get_sub_field('title');
          $description = get_sub_field('description');
          $image = get_sub_field('image');
          if (!empty(get_sub_field('download_id'))) {
            $download_ID = get_sub_field('download_id');
          } else {
            $download_ID = "download-".sanitize_title(get_sub_field('title'));
          }
          $row_id = "download-id-" . get_row_index();
        ?>

          <div id="<?php echo $download_ID; ?>" class="download-item">
            <figure>
              <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" width="386" height="297" />
            </figure>
            <?php if ($title) { ?>
              <a href="#<?php echo $download_ID; ?>" data-anchor="download-area" data-tab="<?php echo $row_id ?>" class="title download-link"><?php echo $title; ?></a>
            <?php } ?>
            <!-- <a href="#<?php echo $download_ID; ?>" data-anchor="download-area" data-tab="<?php echo $row_id ?>" class="more-info">+ More info</a> -->
          </div>

        <?php endwhile; ?>
      </div>
    <?php } ?>



    <?php if (have_rows('downloads')) { ?>
      <div class="download-single-item <?php echo $heading_colours; ?>" id="download-area">
        <?php while (have_rows('downloads')) : the_row();
          $title = get_sub_field('title');
          $description = get_sub_field('description');
          $image = get_sub_field('image');
          $row_id = "download-id-" . get_row_index();

          $useful_links_title = get_sub_field('useful_links_title');
          if (empty($useful_links_title)) {
            $useful_links_title = "Useful links";
          }

          $resources_title = get_sub_field('resources_title');
          if (empty($useful_links_title)) {
            $resources_title = "+ Resources";
          }
        ?>

          <div class="single-item" id="<?php echo $row_id; ?>">
            <div class="content">
              <?php if ($title) { ?>
                <p class="title"><?php echo $title; ?></p>
              <?php } ?>

              <?php if ($description) { ?>
                <p class="description"><?php echo $description; ?></p>
              <?php } ?>

              <?php if (have_rows('useful_links')) { ?>
                <p class="useful-links-title"><?php echo $useful_links_title; ?></p>
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

              <?php if (have_rows('resources')) { ?>
                <p class="useful-links-title"><?php echo $resources_title; ?></p>
                <ul class="useful-links">
                  <?php while (have_rows('resources')) : the_row();
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
              <?php if ($image) { ?>
                <figure>
                  <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" width="300" height="230" />
                </figure>
              <?php } ?>
            </div>

            <div class="close-section">
              <a href="#downloads" class="close-icon">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/svgs/icon-close.svg" alt="Close section" width="56" height="56" />
              </a>
            </div>
          </div>

        <?php endwhile; ?>
      </div>
    <?php } ?>
  </div>
</section>