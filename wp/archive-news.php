<?php get_header(); ?>

<main>

  <!-- ニュース一覧 -->
  <section class="arc-news">
    <div class="containers">
      <h1 class="ttl-secondary non">お知らせ</h1>
      <div class="item">

        <?php
        $paged = get_query_var('paged') ? get_query_var('paged') : 1;
        $args = array(
          'posts_per_page' => 9,
          'post_type' => 'news',
          'paged' => $paged,
          'order' => 'DESC',
          'post_status' => 'publish',
        );
        $the_query = new WP_Query($args);
        if ($the_query->have_posts()) :
        ?>
          <?php while ($the_query->have_posts()) : $the_query->the_post();
            $post_id = get_the_ID();
            $post_terms = get_the_terms($post_id, 'news_category');
          ?>

            <a href="<?php the_permalink(); ?>" class="item__box">
              <div class="flex gap20 fS aiC inherit item__box--date">
                <time class="time"><?php echo get_the_date(); ?></time>
                <?php if ($post_terms) : ?>
                  <?php foreach ($post_terms as $post_term) : ?>
                    <span class="cat"><?php echo esc_html($post_term->name); ?></span>
                  <?php endforeach; ?>
                <?php endif; ?>
              </div>
              <summary class="item__box--ttl"><h3><?php the_title(); ?></h3></summary>
            </a>

          <?php endwhile; ?>
        <?php endif; ?>

			</div>

      <?php
      $GLOBALS['wp_query']->max_num_pages = $the_query->max_num_pages;
      the_posts_pagination(array(
        'mid_size' => 1,
        'prev_text' => '<span></span>',
        'next_text' => '<span></span>'
      ));

      wp_reset_postdata();
      ?>
      
    </div>
  </section>

  <?php get_template_part( 'template-parts/inquiry' ); ?>

</main>

<?php get_footer(); ?>