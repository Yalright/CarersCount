<?php

/***
 * Block - Content Media Block
 *
 ***/ ?>
<?php
$content_size = get_field('content_size');
$title = get_field('title');
$content = get_field('content');
$image = get_field('image');
$include_accordion = get_field('include_accordion');

$block_id = get_field('block_id');


?>

<section class="guten-block block-content-media" id="<?php echo $block_id; ?>">
  <div class="container <?php echo $content_size; ?>">
    <p class="title">
      <?php echo $title; ?>
    </p>
    <div class="content">

      <div class="wysiwyg-wrapper">
        <?php echo $content; ?>
      </div>

      <?php
      if ($include_accordion && have_rows('accordion')) { ?>
        <div class="accordion-wrapper">

          <?php while (have_rows('accordion')) : the_row();
            $question = get_sub_field('question');
            $answer = get_sub_field('answer');
          ?>
            <div class="single-item">
              <span class="question">
                <?php echo $question; ?>
              </span>
              <span class="answer">
                <?php echo $answer; ?>
              </span>
            </div>
          <?php endwhile; ?>
        </div>
      <?php } ?>
    </div>
    <div class="media">
      <figure>
        <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
      </figure>
    </div>
  </div>
</section>