<?php get_header(); ?>

<div id="splash">
<div id="splash_logo"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-white.svg" alt="" class="fadeIn"></div>
<!--/splash--></div>
<section class="fv">
  <figure class="fv__preImage pc">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/preImage.jpg" alt="イメージ画像">
  </figure>
  <figure class="fv__preImage sp">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/preImage-sp.svg" alt="イメージ画像">
  </figure>
  <!-- <ul class="fv__imageList slider">
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
  </ul> -->
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
  <!-- <div class="news__bannerArea">
    <a href="#" class="news__banner">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/img/noimage.jpg" alt="バナー">
    </a>
    <a  href="#" class="news__banner">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/img/noimage.jpg" alt="バナー">
    </a>
  </div> -->
  <!-- <div class="btn__wrap">
    <a href="#" class="btn">すべてのおしらせをチェック</a>
  </div> -->
</section>
<section class="member">
  <h1 class="section-heading">オフィシャルメンバー</h1>
  <ul class="member__list slider2">
  <?php
      $cat_posts = get_posts(array(
          'post_type' => 'profile', // 投稿タイプ
          'posts_per_page' => 5, // 表示件数
          'orderby' => 'date', // 表示順の基準
          'order' => 'DESC' // 昇順・降順
      ));
      global $post;
      if($cat_posts): foreach($cat_posts as $post): setup_postdata($post); ?>

    <li class="member__item">
      <a href="<?php the_permalink() ?>" class="member__link">
        <figure class="member__image">
          <img src="<?php echo the_field('image1'); ?>" alt="プロフィール写真">
        </figure>
        <p class="member__name"><?php the_title(); ?></p>
        <p class="member__from">拠点：<?php echo post_custom('from'); ?></p>
        <p class="member__favorite">好きな釣り：
        <?php
          if(mb_strlen(get_field('fishing'))>6){
          $text= mb_substr(strip_tags(get_field('fishing')), 0, 6);
          echo $text.'…';
          }else{
          echo strip_tags(get_field('fishing'));
          }
        ?>
        </p>
        <p class="member__arrow">PROFILE >>></p>
      </a>
    </li>
    <?php endforeach; endif; wp_reset_postdata(); ?>
  </ul>
  <div class="btn__wrap">
    <a href="<?php echo home_url('member'); ?>" class="btn">他のオフィシャルメンバーをチェック</a>
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
      <a href="<?php the_permalink(); ?>">
        <figure class="member-blog__image">
          <?php keika_time(3);?>
          <?php if ( has_post_thumbnail() ) : ?>
            <?php the_post_thumbnail(); ?>
          <?php else : ?>
            <p>サムネイルがないです</p>
          <?php endif; ?>
        </figure>
        <p class="member-blog__date"><?php the_time('Y.m.d'); ?></p>
        <p class="member-blog__title"><?php the_title(); ?></p>
        <div class="member-blog__author">
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
        </div>
      </a>
    </li>
    <?php
      endforeach; // ループの終了
    ?>
  </ul>
  <div class="btn__wrap">
    <a href="<?php echo home_url('blog'); ?>" class="btn">すべてのブログをチェック</a>
  </div>
</section>
<section class="pickup">
  <h1 class="section-heading">ピックアップ</h1>
  <div class="pickup__inner">
    <?php
    $cat_posts = get_posts(array(
        'post_type' => 'pickups', // 投稿タイプ
        'posts_per_page' => 2, // 表示件数
        'orderby' => 'date', // 表示順の基準
        'order' => 'DESC' // 昇順・降順
    ));
    global $post;
    if($cat_posts): foreach($cat_posts as $post): setup_postdata($post); ?>

    <a href="<?php the_permalink(); ?>" class="pickup__media">
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
        <p class="pickup__title"><?php the_title(); ?></p>
        <p class="pickup__description"><?php the_excerpt(); ?></p>
        <div class="pickup__author">
          <figure class="pickup__icon">
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
          <p class="pickup__name"><?php echo get_the_author_meta('nickname') ?></p>
        </div>
      </div>
    </a>
    <?php endforeach; endif; wp_reset_postdata(); ?>
  </div>
  <div class="btn__wrap">
    <a href="<?php echo home_url('pickup'); ?>" class="btn">すべてのピックアップ記事をチェック</a>
  </div>
</section>
<section class="instagram">
  <h1 class="section-heading blue">インスタグラム</h1>
  <div class="instagram__inner">
    <!-- <a href="https://www.instagram.com/tsuribijyo/" class="instagram__link" target="_blank" rel="noopener noreferrer">
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
    </a> -->
    <?php
    echo do_shortcode('[instagram-feed]');
    ?>
  </div>
  <div class="instagram__buttonWrap">
    <a href="https://www.instagram.com/tsuribijyo/" class="instagram__button" target="_blank" rel="noopener noreferrer">釣り美女公式Instagramはコチラ</a>
  </div>
</section>

<?php get_footer(); ?>