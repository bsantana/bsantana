<?php 
  // Template Name: Home 
  get_header();

  $banner_image = get_post_meta(get_the_ID(), 'URL_BANNER', true);
  $banner_title = get_post_meta(get_the_ID(), 'TITLE_BANNER', true);
  $banner_text = get_post_meta(get_the_ID(), 'TEXT_BANNER', true);
?>

<div id="banner" style="background-image: url(<?php echo $banner_image; ?>);">
  <div class="container">
    <div class="content">
      <h2><?php echo $banner_title; ?></h2>
      <p><?php echo $banner_text; ?></p>
      <button>BUTTON LOREM</button>
    </div>
  </div>
</div>

<section class="container" id="sobre">
  <div class="main">
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <h2><?php the_title(); ?></h2>
    <?php the_content(); ?>
  <?php endwhile; endif; ?>
  </div>
</section>

<?php get_footer(); ?>