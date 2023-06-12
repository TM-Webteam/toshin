<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php esc_html(bloginfo('charset')); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="keywords" content="">
<!-- <meta name="description" content="<?php bloginfo('description'); ?>"> -->
<meta name="author" content="">
<title><?php wp_title('|', true, 'right'); ?></title>
<meta name="format-detection" content="telephone=no">

<!-- Web font -->
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;500;700;900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://use.typekit.net/ncf8fus.css">

<!-- Style sheet -->
<link rel="stylesheet" href="<?php echo assets_path() ?>css/main.css">
<?php wp_head(); ?>

</head>

<?php if (!empty($class)) : ?>
  <body <?php body_class($class); ?>>
<?php else : ?>
  <body <?php body_class(); ?>>
<?php endif; ?>

  <header>
  <div class="in">
    <aside class="flex aiC inherit">
      <div class="in__logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo assets_path() ?>img/common/logo.svg" alt="東神倉庫株式会社"></a></div>
      <nav class="in__nav pc-only">
        <ul class="flex jcE aiC">
          <li><a href="tel:0337666054" class="tel">03-3766-6054</a>　（平日：9:00~17:00）</li>
          <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>catalog/" class="more tiny">サービス資料</a></li>
          <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>contact/" class="more tiny">お問合せ・お見積り</a></li>
        </ul>
      </nav>
      <div id="nav-toggle" class="sp-only">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </aside>
  </div>
  <nav class="nav-list pc-only">
    <ul class="flex nav-list-box">
      <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>solutions/" class="link">医療機器・化粧品の物流にお困りの企業様へ</a></li>
      <li class="parent">
        <a href="#" class="arrow disabled">物流サービス</a>
        <div class="mega flex pull">
          <div class="mega__parent">物流サービス</div>
          <div class="mega__box flex">
            <div class="mega__box--list">
              <a href="<?php echo esc_url( home_url( '/' ) ); ?>medical/" class="ttl">医療機器物流</a>
            </div>
            <div class="mega__box--list">
              <a href="<?php echo esc_url( home_url( '/' ) ); ?>cosmetic/" class="ttl">化粧品物流</a>
            </div>
          </div>
        </div>
      </li>
      <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>strength/" class="link">選ばれる理由</a></li>
      <li class="parent">
        <a href="#" class="arrow disabled">お役立ち情報</a>
        <div class="mega flex pull">
          <div class="mega__parent">お役立ち情報</div>
          <div class="mega__box flex">
            <div class="mega__box--list">
              <a href="<?php echo esc_url( home_url( '/' ) ); ?>whitepaper/" class="ttl">お役立ち資料</a>
            </div>
            <div class="mega__box--list">
              <a href="<?php echo esc_url( home_url( '/' ) ); ?>column/" class="ttl">お役立ちコラム</a>
            </div>
            <div class="mega__box--list">
              <a href="<?php echo esc_url( home_url( '/' ) ); ?>news/" class="ttl">お知らせ</a>
            </div>
          </div>
        </div>
      </li>
      <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>company/" class="link">会社概要</a></li>
    </ul>
  </nav>

  <div id="gloval-nav" class="sp-only">
    <ul class="list">
      <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>solutions/">医療機器・化粧品の物流にお困りの企業様へ</a></li>
      <li><a href="#" class="disabled">物流サービス</a></li>
      <li class="child"><a href="<?php echo esc_url( home_url( '/' ) ); ?>medical/">医療機器物流</a></li>
      <li class="child"><a href="<?php echo esc_url( home_url( '/' ) ); ?>cosmetic/">化粧品物流</a></li>
      <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>strength/">選ばれる理由</a></li>
      <li><a href="#" class="disabled">お役立ち情報</a></li>
      <li class="child"><a href="<?php echo esc_url( home_url( '/' ) ); ?>whitepaper/">お役立ち資料</a></li>
      <li class="child"><a href="<?php echo esc_url( home_url( '/' ) ); ?>column/">お役立ちコラム</a></li>
      <li class="child"><a href="<?php echo esc_url( home_url( '/' ) ); ?>news/">お知らせ</a></li>
      <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>company/">会社概要</a></li>
    </ul>
    <ul class="aside">
      <li><a href="tel:0337666054" class="tel">03-3766-6054</a><br>（平日：9:00~17:00）</li>
      <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>catalog/" class="more small">サービス資料</a></li>
      <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>contact/" class="more small">お問合せ・お見積り</a></li>
    </ul>
  </div>
</header>
  