<?php get_header(); ?>

<main class="sng-whitepaper">

  <section class="">
    <div class="containers flex">

      <!-- 資料紹介 -->
      <article class="sub-conts article">

        <h1 class="article__ttl"><?php the_title(); ?></h1>

        <!-- 資料のスライダー -->
        <div class="wp-slick">
          <div id="wp-slick">
            <figure><?php the_post_thumbnail(); ?></figure>
            <?php if (!empty(CFS()->get('img-wp2'))) : ?>
              <figure><img src="<?php echo esc_url(CFS()->get('img-wp2')); ?>" alt=""></figure>
            <?php endif; ?>
            <?php if (!empty(CFS()->get('img-wp3'))) : ?>
              <figure><img src="<?php echo esc_url(CFS()->get('img-wp3')); ?>" alt=""></figure>
            <?php endif; ?>
          </div>
        </div>
        

        <h2 class="article__desc"><?php echo CFS()->get('lead'); ?></h2>

        <div class="article__toc">
          <h2 class="article__toc--ttl">本資料の目次</h2>
          <div class="article__toc--list">

          <?php $paragraph_arr = CFS()->get('toc'); ?>
          <?php if ($paragraph_arr) : ?>
            <dl>
              <?php foreach ($paragraph_arr as $paragraph) : ?>
              <dt><h3><?php echo esc_html(strip_tags($paragraph['title'])) ?></h3></dt>
              <?php if ($paragraph['caption']) : ?>
              <dd>
                <ul>
                  <?php foreach ((array)$paragraph['caption'] as $caption) : ?>
                    <li><h4><?php echo esc_html(strip_tags($caption['caption_title'])) ?></h4></li>
                  <?php endforeach ?>
                </ul>
              </dd>
              <?php endif; ?>
              <?php endforeach; ?>
            </dl>
          <?php endif; ?>

          </div>
        </div>

      </article>

      <!-- サイドメニュー -->
      <aside class="side-form">

        <!-- カイロスタグ挿入 -->
        <form action="" class="form">
          <div class="form__ttl">ダウンロード申込みフォーム</div>
          <div class="form__table">
            <table>
              <colgroup>
                <col>
                <col>
              </colgroup>
              <tbody><tr>
                <th class="flex aiC">
                  <span class="item">会社名</span>
                  <span class="required"></span>
                </th>
                <td><input type="text" placeholder="例）〇〇〇株式会社"></td>
              </tr>
              <tr>
                <th class="flex aiC">
                  <span class="item">部署名</span>
                  <span class="required"></span>
                </th>
                <td><input type="text" placeholder="例）システム管理室"></td>
              </tr>
              <tr>
                <th class="flex aiC">
                  <span class="item">ご担当者名</span>
                  <span class="required"></span>
                </th>
                <td>
                  <div class="flex aiC">
                    <p class="flex fS aiC half"><span>氏：</span><input type="text" placeholder="例）佐藤"></p>
                    <p class="flex fS aiC half"><span>名：</span><input type="text" placeholder="例）太郎"></p>
                  </div>
                </td>
              </tr>
              <tr>
                <th class="flex aiC">
                  <span class="item">メールアドレス</span>
                  <span class="required"></span>
                </th>
                <td><input type="email" placeholder="例）sample@gmail.com.jp"></td>
              </tr>
              <tr>
                <th class="flex aiC">
                  <span class="item">電話番号</span>
                  <span class="required"></span>
                </th>
                <td><input type="tel" placeholder="例）090-1234-5678"></td>
              </tr>
              <tr>
                <th class="flex aiC">
                  <span class="item">お問合せ・相談事項がある方<br class="pc-only">はご記入ください。</span>
                  <span class="optional">任意</span>
                </th>
                <td><textarea placeholder="例）ダウンロード資料を見ながら説明もしてほしい。"></textarea></td>
              </tr>
              <tr>
                <th class="flex aiC">
                  <span class="item">個人情報の取扱いについて</span>
                  <span class="required"></span>
                </th>
                <td><div class="flex fS aiC"><input type="checkbox">同意する</div><p>弊社Webサイトの<a href="/privacy/">プライバシーポリシー</a>をご確認の上、ご同意いただき送信をお願いいたします。</p></td>
              </tr>
            </tbody></table>
            <button type="submit" class="more small">確認画面へ進む</button>
          </div>
        </form>
        <!-- カイロスタグ挿入 end -->

      </aside>
      
    </div>
  </section>

</main>

<?php get_footer(); ?>