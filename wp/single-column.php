<?php get_header(); ?>

<main class="sng-column">

  <section class="">
    <div class="containers flex">

      <!-- 投稿記事詳細メイン -->
      <article class="main-conts single">

        <h1 class="single__h1"><?php the_title(); ?></h1>

        <div class="single__time"><span class="time"><?php echo get_the_date('Y.m.d', $post_id); ?></span></div>

        <?php get_template_part( 'template-parts/sns' ); ?>

        <div class="single__lead"><?php echo CFS()->get('lead'); ?></div>


        <div class="single__toc">
          <div class="single__toc--ttl">目次</div>
          <dl>
            <?php
            $paragraph_arr = CFS()->get('paragraph');
            $i = 0;
            ?>
            <?php if ($paragraph_arr) : foreach ($paragraph_arr as $paragraph) :
                $i++;
                $i2 = 0;
            ?>

              <dt><a href="#toc<?php echo $i ?>"><?php echo esc_html(strip_tags($paragraph['title'])) ?></a></dt>

              <?php if ($paragraph['caption']) : ?>

                <dd>
                  <ul>
                    <?php foreach ((array)$paragraph['caption'] as $caption) :
                      $i2++;
                      if (!empty($caption['caption_title'])) :
                    ?>
                      <li><a href="#toc<?php echo $i ?>-<?php echo $i2 ?>"><?php echo esc_html(strip_tags($caption['caption_title'])) ?></a></li>
                    <?php endif; endforeach; ?>
                  </ul>
                </dd>

              <?php endif; ?>
            <?php endforeach; endif; ?>
          </dl>
        </div>

        <?php
        $i = 0;
        if ($paragraph_arr) : foreach ($paragraph_arr as $paragraph) :
          $i++;
          $i2 = 0;
        ?>
          <h2 id="toc<?php echo $i; ?>" class="single__h2"><?php echo $paragraph['title'] ?></h2>
          <div class="single__txt"><?php echo $paragraph['comment'] ?></div>
          <?php foreach ((array)$paragraph['caption'] as $caption) :
            $i2++;
          ?>
            <h3 id="toc<?php echo $i; ?>-<?php echo $i2 ?>" class="single__h3"><?php echo $caption['caption_title'] ?></h3>
            <div class="single__txt">
              <?php echo wp_kses_post($caption['caption_comment']) ?>
            </div>
          <?php endforeach ?>
        <?php endforeach; endif; ?>

        <?php
        if (!empty(CFS()->get('whitepaper'))) :
        ?>

        <!-- 記事詳細下部お役立ち資料 -->
        <div class="useful">
          <h3 class="single__ttl"><span class="doc">お役立ち資料</span></h3>

          <?php foreach (CFS()->get('whitepaper') as $val) : ?>

            <div class="item">
              <div class="flex">
                <figure class="item__img"><?php echo get_the_post_thumbnail($val, 'medium') ?></figure>
                <summary class="item__box">
                  <div class="item__box--ttl"><?php echo get_post($val)->post_title; ?></div>
                  <div class="item__box--txt"><?php echo get_post_meta($val, 'lead', true); ?></div>
                </summary>
              </div>
              <a href="<?php echo get_permalink($val); ?>" class="more small"><span>資料をダウンロード</span></a>
            </div>

          <?php endforeach; ?>

        </div>

        <?php endif; ?>



        <?php
        $paged = get_query_var('paged') ? get_query_var('paged') : 1;
        $relation = CFS()->get('relation');
        if (!empty($relation)) :
        $args = array(
          'posts_per_page'   => 3,
          'post_type'    => 'column',
          'post__not_in' => array($post->ID),
          'post__in' => $relation,
          'post_status' => 'publish',
          'paged' => $paged,
          'order'          => 'DESC',
        );
        $the_query = new WP_Query($args);
        if ($the_query->have_posts()) :
        ?>

        <!-- 記事詳細下部関連コラム -->
        <div class="relation">
          <h3 class="single__ttl"><span class="pen">関連コラム</span></h3>
          <div class="flex aiC item">

            <?php
            while ($the_query->have_posts()) : $the_query->the_post();
            ?>

              <a href="<?php the_permalink(); ?>" class="flex aiC inherit item__box">
                <div class="item__box--img"><?php the_post_thumbnail(); ?></div>
                <div class="item__box--txt"><?php the_title(); ?></div>
              </a>

            <?php endwhile; ?>

          </div>
        </div>

        <?php endif; ?>
        <?php endif; ?>
        
      </article>

      <?php get_sidebar(); ?>
      
    </div>
  </section>

</main>

<?php get_footer(); ?>