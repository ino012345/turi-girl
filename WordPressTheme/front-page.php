<?php get_header(); ?>

<section class="fv">
  <ul class="fv__imageList slider">
    <li class="fv__image">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/img/top.jpg" alt="イメージ画像">
    </li>
    <li class="fv__image">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/img/top.jpg" alt="イメージ画像">
    </li>
    <li class="fv__image">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/img/top.jpg" alt="イメージ画像">
    </li>
    <li class="fv__image">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/img/top.jpg" alt="イメージ画像">
    </li>
  </ul>
</section>
<section class="news">
  <h1 class="section-heading mini">おしらせ</h1>
  <ul class="news__list">
    <?php
      $cat_posts = get_posts(array(
          'post_type' => 'news', // 投稿タイプ
          'posts_per_page' => 3, // 表示件数
          'orderby' => 'date', // 表示順の基準
          'order' => 'DESC' // 昇順・降順
      ));
      global $post;
      if($cat_posts): foreach($cat_posts as $post): setup_postdata($post); ?>
      
      <li class="news__item">
        <p class="news__date"><?php the_time('Y.m.d') ?></p>
        <a href="<?php the_permalink() ?>" class="news__title"><?php the_title(); ?></a>
      </li>
    <?php endforeach; endif; wp_reset_postdata(); ?>
  </ul>
  <div class="news__bannerArea">
    <figure class="news__banner">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/img/noimage.jpg" alt="バナー">
    </figure>
    <figure class="news__banner">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/img/noimage.jpg" alt="バナー">
    </figure>
  </div>
  <div class="btn__wrap">
    <a href="#" class="btn">すべてのおしらせをチェック</a>
  </div>
</section>
<section class="member">
  <h1 class="section-heading">オフィシャルメンバー</h1>
  <ul class="member__list slider2">
  <?php $args = array(
      'orderby'       => 'id', 
      'order'         => 'DESC', 
      'number'        => 3,
      'show_fullname' => true ); ?>

  <?php wp_list_authors( $args ); ?>

  <?php $blogusers = get_users(); foreach ($blogusers as $user): ?>

  <?php if($user->ID !==1): //ここで管理者を排除 ?>

    <li class="member__item">
      <a href="<?php echo $user->display_name; ?>" class="member__link">
        <figure class="member__image">
        <?php
          $user_img = get_avatar($user->ID);
          $imgtag= '/<img.*?src=(["\'])(.+?)\1.*?>/i';
          if(preg_match($imgtag, $user_img, $imgurl)){
            $userimg = $imgurl[2];
          }
          ?>
          <img src="<?php echo $userimg ?>" alt="メンバーのアイコン">
        </figure>
        <p class="member__name"><?php echo $user->display_name; ?></p>
        <p class="member__from">From：<?php echo get_user_meta( $user->ID, 'from', true); ?></p>
        <p class="member__favorite">Favorite：<?php echo get_user_meta( $user->ID, 'favorite', true); ?></p>
        <p class="member__arrow">PROFILE >>></p>
      </a>
    </li>
  <? endif; ?>

  <?php endforeach; ?>
  </ul>
  <div class="btn__wrap">
    <a href="#" class="btn">他のオフィシャルメンバーをチェック</a>
  </div>
</section>
<section class="member-blog">
  <h1 class="section-heading">メンバーズブログ</h1>
  <ul class="member-blog__list">
  <?php
    $args = array(
      'posts_per_page' => 6 // 表示件数
    );
    $posts = get_posts( $args );
    foreach ( $posts as $post ): // ループの開始
    setup_postdata( $post ); // 記事データの取得
  ?>
    <li class="member-blog__item">
      <figure class="member-blog__image">
        <?php keika_time(3);?>
        <?php if ( has_post_thumbnail() ) : ?>
          <?php the_post_thumbnail(); ?>
        <?php else : ?>
          <p>サムネイルがないです</p>
        <?php endif; ?>
      </figure>
      <p class="member-blog__date"><?php the_time('Y.m.d'); ?></p>
      <a href="<?php the_permalink(); ?>" class="member-blog__title"><?php the_title(); ?></a>
      <a href="<?php echo get_the_author_link() ?>" class="member-blog__author">
        <figure class="member-blog__icon">
        <?php
          $author = get_the_author_meta('id');
          $author_img = get_avatar($author);
          $imgtag= '/<img.*?src=(["\'])(.+?)\1.*?>/i';
          if(preg_match($imgtag, $author_img, $imgurl)){
            $authorimg = $imgurl[2];
          }
          ?>
          <img src="<?php echo $authorimg ?>" alt="メンバーのアイコン">
        </figure>
        <p class="member-blog__name"><?php echo get_the_author_meta('nickname') ?></p>
      </a>
    </li>
    <?php
      endforeach; // ループの終了
    ?>
  </ul>
  <div class="btn__wrap">
    <a href="#" class="btn">すべてのブログをチェック</a>
  </div>
</section>
<section class="pickup">
  <h1 class="section-heading">ピックアップ</h1>
  <div class="pickup__inner">
    <?php
    $cat_posts = get_posts(array(
        'post_type' => 'post', // 投稿タイプ
        'category_name' => 'pickup', // カテゴリをスラッグで指定する場合
        'posts_per_page' => 2, // 表示件数
        'orderby' => 'date', // 表示順の基準
        'order' => 'DESC' // 昇順・降順
    ));
    global $post;
    if($cat_posts): foreach($cat_posts as $post): setup_postdata($post); ?>

    <div class="pickup__media">
      <figure class="pickup__image">
        <?php keika_time_pickup(3);?>
        <?php if ( has_post_thumbnail() ) : ?>
          <?php the_post_thumbnail(); ?>
        <?php else : ?>
          <p>サムネイルがないです</p>
        <?php endif; ?>
      </figure>
      <div class="pickup__body">
        <p class="pickup__date"><?php the_time('Y.m.d') ?></p>
        <a href="#" class="pickup__title"><?php the_title(); ?></a>
        <p class="pickup__description"><?php the_excerpt(); ?></p>
        <a href="#" class="pickup__author">
          <figure class="pickup__icon">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon.png" alt="メンバーのアイコン">
          </figure>
          <p class="pickup__name">ようこ</p>
        </a>
      </div>
    </div>
    <?php endforeach; endif; wp_reset_postdata(); ?>
  </div>
  <div class="btn__wrap">
    <a href="#" class="btn">すべてのピックアップ記事をチェック</a>
  </div>
</section>
<section class="instagram">
  <h1 class="section-heading blue">インスタグラム</h1>
  <div class="instagram__inner">
    <a href="https://www.instagram.com/tsuribijyo/" class="instagram__link" target="_blank" rel="noopener noreferrer">
      <ul class="instagram__imageList slider3">
        <li class="instagram__imageItem">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/top.jpg" alt="インスタグラムの投稿">
        </li>
        <li class="instagram__imageItem">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/top.jpg" alt="インスタグラムの投稿">
        </li>
        <li class="instagram__imageItem">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/top.jpg" alt="インスタグラムの投稿">
        </li>
        <li class="instagram__imageItem">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/top.jpg" alt="インスタグラムの投稿">
        </li>
        <li class="instagram__imageItem">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/top.jpg" alt="インスタグラムの投稿">
        </li>
        <li class="instagram__imageItem">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/top.jpg" alt="インスタグラムの投稿">
        </li>
        <li class="instagram__imageItem">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/top.jpg" alt="インスタグラムの投稿">
        </li>
        <li class="instagram__imageItem">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/top.jpg" alt="インスタグラムの投稿">
        </li>
        <li class="instagram__imageItem">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/top.jpg" alt="インスタグラムの投稿">
        </li>
        <li class="instagram__imageItem">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/top.jpg" alt="インスタグラムの投稿">
        </li>
      </ul>
    </a>
  </div>
  <div class="instagram__buttonWrap">
    <a href="https://www.instagram.com/tsuribijyo/" class="instagram__button" target="_blank" rel="noopener noreferrer">釣り美女公式Instagramはコチラ</a>
  </div>
</section>

<?php get_footer(); ?>