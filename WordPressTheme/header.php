<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="format-detection" content="telephone=no">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/slick.css">
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-RWLMYPSBJW"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-RWLMYPSBJW');
  </script>
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>
  <header class="header l-header">
    <div class="header__inner">
      <a href="<?php echo home_url(); ?>" class="header__logo">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/TB_logo_fin_A.png" alt="ヘッダーロゴ">
      </a>
      <nav class="header__nav">
        <ul class="header__navList">
          <li class="header__navItem">
            <a href="<?php echo home_url('official'); ?>">サイトについて</a>
          </li>
          <li class="header__navItem">
            <a href="<?php echo home_url( 'member' ); ?>">メンバー</a>
          </li>
          <li class="header__navItem">
            <a href="<?php echo home_url('blog'); ?>">ブログ</a>
          </li>
          <li class="header__navItem">
            <a href="<?php echo home_url('pickup'); ?>">ピックアップ</a>
          </li>
          <li class="header__navItem">
            <a href="<?php echo home_url('contact'); ?>">PR依頼</a>
          </li>
          <li class="header__navItem">
            <a href="<?php echo home_url('contact'); ?>">お問い合わせ</a>
          </li>
        </ul>
      </nav>
      <ul class="header__snsList">
        <li class="header__sns">
          <a href="https://www.instagram.com/tsuribijyo/" target="_blank" rel="noopener noreferrer">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/instagram.png" alt="インスタグラム">
          </a>
        </li>
        <li class="header__sns">
          <a href="https://lin.ee/ljxVioK" target="_blank" rel="noopener noreferrer">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/line_icon.svg" alt="LINE">
          </a>
        </li>
      </ul>
      <div class="openbtn"><span></span><span></span><span></span></div>
    </div>
    <nav id="g-nav">
      <div id="g-nav-list"><!--ナビの数が増えた場合縦スクロールするためのdiv※不要なら削除-->
        <div class="g-nav__navListWrap">
          <p class="g-nav__navHead">コンテンツ</p>
          <ul class="g-nav__navList">
            <li class="g-nav__navItem">
              <a href="<?php echo home_url(); ?>">- トップページ</a>
            </li>
            <li class="g-nav__navItem">
              <a href="<?php echo home_url('member'); ?>">- オフィシャルメンバー</a>
            </li>
            <li class="g-nav__navItem">
              <a href="<?php echo home_url('blog'); ?>">- ブログ一覧</a>
            </li>
            <li class="g-nav__navItem">
              <a href="<?php echo home_url('pickup'); ?>">- ピックアップ</a>
            </li>
          </ul>
        </div>
        <div class="g-nav__navListWrap">
          <p class="g-nav__navHead">お問い合わせ</p>
          <ul class="g-nav_navList">
            <li class="g-nav__navItem">
              <a href="<?php echo home_url('register'); ?>">- オフィシャルメンバー応募</a>
            </li>
            <li class="g-nav__navItem">
              <a href="<?php echo home_url('contact'); ?>">- お仕事のご依頼はコチラ</a>
            </li>
            <li class="g-nav__navItem">
              <a href="<?php echo home_url('contact'); ?>">- お問い合わせ</a>
            </li>
          </ul>
        </div>
        <div class="g-nav__navListWrap">
          <p class="g-nav__navHead">SNS</p>
          <ul class="g-nav_navList">
            <li class="g-nav__navItem">
              <a href="https://www.instagram.com/tsuribijyo/" target="_blank" rel="noopener noreferrer">- Instagram</a>
            </li>
            <li class="g-nav__navItem">
              <a href="https://lin.ee/ljxVioK" target="_blank" rel="noopener noreferrer">- LINE</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>
  <div class="flow-nav">
    <div class="flow-nav__inner">
      <a href="<?php echo home_url(); ?>" class="flow-nav__logo">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/TB_logo_fin_A.png" alt="ヘッダーロゴ">
      </a>
      <nav class="flow-nav__nav">
        <ul class="flow-nav__navList">
          <li class="flow-nav__navItem">
            <a href="<?php echo home_url('official'); ?>">サイトについて</a>
          </li>
          <li class="flow-nav__navItem">
            <a href="<?php echo home_url('member'); ?>">メンバー</a>
          </li>
          <li class="flow-nav__navItem">
            <a href="<?php echo home_url('blog'); ?>">ブログ</a>
          </li>
          <li class="flow-nav__navItem">
            <a href="<?php echo home_url('pickup'); ?>">ピックアップ</a>
          </li>
          <li class="flow-nav__navItem">
            <a href="<?php echo home_url('contact'); ?>">PR依頼</a>
          </li>
          <li class="flow-nav__navItem">
            <a href="<?php echo home_url('contact'); ?>">お問い合わせ</a>
          </li>
        </ul>
      </nav>
      <ul class="flow-nav__snsList">
        <li class="flow-nav__sns">
          <a href="https://www.instagram.com/tsuribijyo/" target="_blank" rel="noopener noreferrer">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/instagram.png" alt="インスタグラム">
          </a>
        </li>
        <li class="flow-nav__sns">
          <a href="https://lin.ee/ljxVioK" target="_blank" rel="noopener noreferrer">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/line_icon.svg" alt="LINE">
          </a>
        </li>
      </ul>
    </div>
  </div>  