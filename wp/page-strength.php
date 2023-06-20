<?php get_header(); ?>

<main class="strength">

  <section class="hero03 core">
    <div class="containers">
      <div class="hero03__box">
        <h1 class="ttl-primary-lower">東神倉庫が選ばれる2つの理由</h1>
        <div class="lead">利便性の高い立地と高い物流品質が<br class="sp-only">選ばれる理由です。</div>
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>contact/" class="more">お問合せ・お見積りはこちら</a>
      </div>
    </div>
  </section>

  <section class="symmetry">
    <div class="containers">

      <div class="flex aiC sp-reverse item">
        <summary class="item__box">
          <div class="item__box--num">01</div>
          <h2 class="item__box--ttl">高い物流品質</h2>
          <div class="item__box--txt">厚生労働省令で定める基準であるQMS省令に適合し、国際基準であるISO13485を2015年より取得・運用し培った経験を軸とした高品質なサービスを提供可能です。LOT・期限管理といった物流ノウハウの他、教育・訓練体制が確立された環境下、熟練スタッフによる安定した品質を保証します。</div>
        </summary>
        <figure class="item__img" data-aos="fade-left"><img src="<?php echo assets_path() ?>img/strength/img01.jpg" alt="高い物流品質"></figure>
      </div>

      <div class="flex aiC item">
        <figure class="item__img" data-aos="fade-right"><img src="<?php echo assets_path() ?>img/strength/img02.jpg" alt="三井物産グループの豊富な物流ノウハウ"></figure>
        <summary class="item__box">
          <div class="item__box--num">02</div>
          <h2 class="item__box--ttl">三井物産グループの豊富な物流ノウハウ</h2>
          <div class="item__box--txt">自社倉庫はもちろんの事、三井物産グループのネットワークを駆使し、グループ内の様々な立地の倉庫からお客様の商流に最適な「施設」を選定、当社の親会社である三井物産グローバルロジスティクス（株）の大規模物流センターの運営、EC物流、IT技術、物流ロボット導入等のグループ内の豊富な物流ノウハウを駆使してお客様に「最適な物流」を企画・構築します。</div>
        </summary>
      </div>
      
    </div>
  </section>

  <?php get_template_part( 'template-parts/reason' ); ?>

  <?php get_template_part( 'template-parts/inquiry' ); ?>

</main>

<?php get_footer(); ?>