<?php 
/*
Template Name: デフォルトテンプレート
Template Post Type: page
*/
get_header(); ?>

<main class="template">

  <section>
    <div class="containers">

      <?php if ( have_posts() ) : ?>
        <?php while ( have_posts() ) : the_post(); ?>

          <?php the_content(); ?>

        <?php endwhile; ?>
      <?php endif; ?>
        
    </div>
  </section>

</main>

<?php get_footer(); ?>