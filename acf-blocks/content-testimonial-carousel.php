<?php

/***
 * Block - Link Columns
 *
 ***/ ?>
<?php
$title = get_field('title');

?>

<section class="guten-block block-testimonial-carousel">
  <div class="container">
    <?php if (!empty($title)) { ?>
      <p class="title"><?php echo $title; ?></p>
    <?php } ?>



    <?php if (have_rows('testimonial')) { ?>

      <div class="testimonial-container-images">

        <?php while (have_rows('testimonial')) : the_row();
          $image = get_sub_field('image');
          $name = get_sub_field('name');
          $job_title = get_sub_field('job_title');
          $testimonial = get_sub_field('testimonial');
        ?>

          <div class="column">
            <?php if (!empty($image)) { ?>
              <figure>
                <img src="<?php echo $image['url']; ?>" alt="<?php echo $name; ?> Profile Photo" width="270" height="270" />
              </figure>
            <?php } ?>

            <?php if (!empty($name)) { ?>
              <p class="column--name">
                <?php echo $name; ?>
              </p>
            <?php } ?>
            <?php if (!empty($job_title)) { ?>
              <p class="column--job-title">
                <?php echo $job_title; ?>
              </p>
            <?php } ?>
            <?php if (!empty($testimonial)) { ?>
              <p class="column--testimonial">
                <?php echo $testimonial; ?>
              </p>
            <?php } ?>

          </div>

        <?php endwhile; ?>

      </div>

    <?php } ?>

  </div>
</section>