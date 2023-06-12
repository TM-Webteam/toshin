<?php get_header(); ?>

<main class="tax-column">

  <section class="">
    <div class="containers flex">

      <!-- タクソノミー -->
      <section class="main-conts article">

        <h1 class="article__ttl"><span><?php esc_html(single_cat_title()); ?></span>に関するコラム</h1>

        <h2 class="article__lead"><span><?php esc_html(single_cat_title()); ?></span>に関する記事をお届けしています。</h2>

        <div class="article__wrap">

          <?php
            $queried_object = get_queried_object();
            $term_id = esc_html($queried_object->term_id);
            $paged = get_query_var('paged') ? get_query_var('paged') : 1;
            $args = array(
              'posts_per_page' => 10,
              'post_type' => 'column',
              'paged' => $paged,
              'order' => 'DESC',
              'orderby' => 'post_date',
              'post_status' => 'publish',
              'tax_query'  => array(
                'relation'  => 'AND',
                array(
                  'taxonomy' => 'column_category',
                  'field' => 'term_id',
                  'terms' => array($term_id),
                  'operator' => 'IN',
                ),
              ),
            );
            $the_query = new WP_Query($args);
            if ($the_query->have_posts()) :
            ?>

            <?php while ($the_query->have_posts()) : $the_query->the_post();
              $post_id = get_the_ID();
              $post_terms = get_the_terms($post_id, 'column_category');
            ?>

              <a href="<?php the_permalink(); ?>" class="flex item">
                <figure class="item__img"><?php the_post_thumbnail(); ?></figure>
                <summary class="item__box">
                  <div class="flex fS aiC gap10 item__box--row">
                    <span class="time"><?php echo get_the_date('Y.m.d', $post_id); ?></span>
                    <?php if ($post_terms) : ?>
                      <?php foreach ($post_terms as $post_term) : ?>
                        <span class="cat02"><?php echo esc_html($post_term->name); ?></span>
                      <?php endforeach; ?>
                    <?php endif; ?>
                  </div>
                  <h2 class="item__box--ttl"><?php the_title(); ?></h2>
                  <h3 class="item__box--lead"><?php echo CFS()->get('lead'); ?></h3>
                </summary>
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

      </section>

      <?php get_sidebar(); ?>
      
    </div>
  </section>

</main>

<?php get_footer(); ?>