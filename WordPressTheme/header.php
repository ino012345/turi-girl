<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="format-detection" content="telephone=no">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/slick.css">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>
  <header class="header l-header">
    <div class="header__inner">
      <a href="#" class="header__logo">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/TB_logo_fin_A.png" alt="ヘッダーロゴ">
      </a>
      <nav class="header__nav">
        <ul class="header__navList">
          <li class="header__navItem">
            <a href="#">サイトについて</a>
          </li>
          <li class="header__navItem">
            <a href="#">メンバー</a>
          </li>
          <li class="header__navItem">
            <a href="#">ブログ</a>
          </li>
          <li class="header__navItem">
            <a href="#">ピックアップ</a>
          </li>
          <li class="header__navItem">
            <a href="#">PR依頼</a>
          </li>
          <li class="header__navItem">
            <a href="#">お問い合わせ</a>
          </li>
        </ul>
      </nav>
      <ul class="header__snsList">
        <li class="header__sns">
          <a href="#">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/Instagram.png" alt="インスタグラム">
          </a>
        </li>
        <li class="header__sns">
          <a href="#">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/LINE.png" alt="LINE">
          </a>
        </li>
      </ul>
    </div>
  </header>