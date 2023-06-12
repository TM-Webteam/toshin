<?php get_header(); ?>

<main class="arc-column">

  <section class="hero03 core">
    <div class="containers">
      <div class="hero03__box">
        <h1 class="ttl-primary-lower">お役立ちコラム</h1>
        <div class="lead">医療機器や化粧品の物流に関するノウハウ・<br class="sp-only">トレンド情報をお届けするコラムです。</div>
      </div>
    </div>
  </section>

  <section>
		<div class="containers">
      <div class="search">
        <form method="get" action="<?php echo home_url('/'); ?>" class="search__form">
          <input name="s" class="search__input" type="search" placeholder="キーワードから探す">
          <input type="hidden" name="post_type" value="column">
          <button accesskey="f" class="search__btn" type="submit"><img src="<?php echo assets_path() ?>img/common/icon-search-w.svg"></button>
        </form>
      </div>
			<div class="flex gap20 fS inherit">
        <?php
        $args = array(
          'post_type'    => 'column',
          'taxonomy'  => 'column_category',
        );
        $categories = get_terms($args);
        $cnt = 0;
        foreach ($categories as $category) :
          $cnt++;
        ?>
          <a href="<?php echo esc_url(get_term_link($category)); ?>" class="cat"><?php echo esc_html($category->name); ?></a>
        <?php endforeach; ?>
      </div>
		</div>
	</section>

  <section class="latest">
    <div class="containers">
      <h2 class="ttl-secondary">最新コラム</h2>
      <div class="flex gap30">

        <?php
          $args = array(
            'posts_per_page'   => 2,
            'post_type'    => 'column',
            'paged' => $paged,
            'order' => 'DESC',
            'orderby' => 'post_date',
            'post_status' => 'publish',
          );
          $latest_query = new WP_Query($args);
          $exclude_ids = array();
          if ($latest_query->have_posts()) :
          ?>
            <?php while ($latest_query->have_posts()) : $latest_query->the_post();
              $exclude_ids[] = get_the_ID();
              $post_terms = get_the_terms(get_the_ID(), 'column_category');
            ?>

            <a href="<?php the_permalink(); ?>" class="flex item">
              <h3 class="item__ttl"><?php the_title(); ?></h3>
              <div class="item__img"><?php the_post_thumbnail(); ?></div>
              <div class="item__box">
                <div class="item__box--cat">
                  <?php if ($post_terms) : ?>
                    <?php foreach ($post_terms as $post_term) : ?>
                      <span class="cat"><?php echo esc_html($post_term->name); ?></span>
                    <?php endforeach; ?>
                  <?php endif; ?>
                </div>
                <div class="item__box--txt"><?php echo CFS()->get('lead'); ?></div>
              </div>
            </a>

        <?php endwhile; endif; ?>
        
      </div>
    </div>
  </section>

  <section class="grid">
    <div class="containers">

      <div class="flex gap30 grid">

        <?php
          $paged = get_query_var('paged') ? get_query_var('paged') : 1;
          $args = array(
            'posts_per_page' => 12,
            'post_type' => 'column',
            'paged' => $paged,
            'order' => 'DESC',
            'orderby' => 'post_date',
            'post_status' => 'publish',
            'post__not_in' => $exclude_ids,
          );
          $the_query = new WP_Query($args);
          if ($the_query->have_posts()) :
          ?>

          <?php while ($the_query->have_posts()) : $the_query->the_post();
            $post_id = get_the_ID();
            $post_terms = get_the_terms($post_id, 'column_category');
          ?>

          <a href="<?php the_permalink(); ?>" class="grid__card">
            <div class="grid__card--img"><?php the_post_thumbnail(); ?></div>
            <div class="flex fS grid__card--cat">
              <?php if ($categories) : ?>
                <?php foreach ($post_terms as $post_term) : ?>
                  <span class="cat"><?php echo esc_html($post_term->name); ?></span>
                <?php endforeach; ?>
              <?php endif; ?>
            </div>
            <h3 class="grid__card--ttl"><?php the_title(); ?></h3>
            <div class="grid__card--time"><time class="time"><?php echo get_the_date('Y.m.d', $post_id); ?></time></div>
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