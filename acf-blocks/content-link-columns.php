<?php

/***
 * Block - Link Columns
 *
 ***/ ?>
<?php
$title = get_field('title');
$block_id = get_field('block_id');

?>

<section class="guten-block block-link-columns" id="<?php echo $block_id; ?>">
  <div class="container">
    <?php if (!empty($title)) { ?>
      <p class="title"><?php echo $title; ?></p>
    <?php } ?>

    <?php if (have_rows('column')) {
      $columns_per_row = "columns-" . get_field('columns_per_row'); ?>

      <div class="column-container <?php echo $columns_per_row; ?>">

        <?php while (have_rows('column')) : the_row();
          $image = get_sub_field('image');
          $title = get_sub_field('title');
          $title_link = get_sub_field('title_link');
          if ($title_link) {
            $title_link_url = $title_link['url'];
            $title_link_title = $title_link['title'];
            $title_link_target = $title_link['target'] ? $title_link['target'] : '_self';
          }
        ?>

          <div class="column">
            <?php if (!empty($image)) { ?>
              <figure>
                <img src="<?php echo $image['url']; ?>" alt="" width="1" height="1" />
              </figure>
              <?php if (!empty($title) && !empty($title_link)) { ?>
                <p class="column--title">
                  <a href="<?php echo $title_link_url; ?>" target="<?php echo $title_link_target; ?>">
                    <?php if (!empty($title_link_title)) {
                      echo $title_link_title;
                    } else {
                      echo $title;
                    } ?>
                  </a>
                </p>
              <?php } elseif (!empty($title)) { ?>
                <p class="column--title">
                  <?php echo $title; ?>
                </p>
              <?php } ?>

              <?php if (have_rows('link')) { ?>
                <ul>
                  <?php while (have_rows('link')) : the_row();
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
            <?php } ?>
          </div>

        <?php endwhile; ?>

      </div>

    <?php } ?>
  </div>
</section>