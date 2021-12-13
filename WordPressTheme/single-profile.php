<?php get_header(); ?>

<section class="profile-contents">
  <div class="profile-contents__inner">
    <div class="profile-contents__media">
      <ul class="profile-contents__slider">
        <li class="profile-contents__image">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/top.jpg" alt="プロフィール写真">
        </li>
        <li class="profile-contents__image">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/top.jpg" alt="プロフィール写真">
        </li>
        <li class="profile-contents__image">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/top.jpg" alt="プロフィール写真">
        </li>
        <li class="profile-contents__image">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/top.jpg" alt="プロフィール写真">
        </li>
      </ul>
      <div class="profile-contents__body">
        <p class="profile-contents__name">ようこ</p>
        <ul class="profile-contents__list">
          <li class="profile-contents__item">
            <p class="profile-contents__head">拠点</p>
            <p class="profile-contents__value"></p>
          </li>
          <li class="profile-contents__item">
            <p class="profile-contents__head">趣味</p>
            <p class="profile-contents__value"></p>
          </li>
          <li class="profile-contents__item">
            <p class="profile-contents__head">血液型</p>
            <p class="profile-contents__value"></p>
          </li>
          <li class="profile-contents__item">
            <p class="profile-contents__head">誕生日</p>
            <p class="profile-contents__value"></p>
          </li>
          <li class="profile-contents__item">
            <p class="profile-contents__head">好きな映画</p>
            <p class="profile-contents__value"></p>
          </li>
          <li class="profile-contents__item">
            <p class="profile-contents__head">好きな言葉</p>
            <p class="profile-contents__value"></p>
          </li>
          <li class="profile-contents__item">
            <p class="profile-contents__head">好き釣り</p>
            <p class="profile-contents__value"></p>
          </li>
        </ul>
      </div>
    </div>
  </div>
</section>
<section class="profile-introduce">
  <h1 class="section-heading mini">自己紹介</h1>
  <div class="profile-introduce__content">
    <p class="profile-introduce__text"></p>
  </div>
</section>
<div class="profile-btn">
  <a href="#">お仕事・PRのご依頼はコチラ</a>
</div>
<section class="profile-link">
  <h1 class="section-heading mini">リンク</h1>
  <ul class="profile-link__list">
    <li class="profile-link__item">
      <a href="#">Instagram</a>
    </li>
    <li class="profile-link__item">
      <a href="#">Twitter</a>
    </li>
    <li class="profile-link__item">
      <a href="#">YouTube</a>
    </li>
    <li class="profile-link__item">
      <a href="#">Tik Tok</a>
    </li>
    <li class="profile-link__item">
      <a href="#">LINE</a>
    </li>
    <li class="profile-link__item">
      <a href="#">ROOM</a>
    </li>
    <li class="profile-link__item">
      <a href="#">欲しい物リスト</a>
    </li>
  </ul>
</section>
<section class="member-blog">
  <h1 class="section-heading mini">ブログ</h1>
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
  <!-- <div class="btn__wrap">
    <a href="#" class="btn">すべてのブログをチェック</a>
  </div> -->
</section>
<div class="profile-btn">
  <a href="#">お仕事・PRのご依頼はコチラ</a>
</div>

<?php get_footer(); ?>