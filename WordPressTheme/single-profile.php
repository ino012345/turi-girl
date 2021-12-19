<?php get_header(); ?>

<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
<section class="profile-contents">
  <h1 class="section-heading">メンバープロフィール</h1>
  <div class="profile-contents__inner">
    <div class="profile-contents__media">
      <ul class="profile-contents__slider slider4">
        <li class="profile-contents__image">
          <img src="<?php echo the_field('image1'); ?>" alt="プロフィール写真">
        </li>
        <li class="profile-contents__image">
          <img src="<?php echo the_field('image2'); ?>" alt="プロフィール写真">
        </li>
        <li class="profile-contents__image">
          <img src="<?php echo the_field('image3'); ?>" alt="プロフィール写真">
        </li>
        <li class="profile-contents__image">
          <img src="<?php echo the_field('image4'); ?>" alt="プロフィール写真">
        </li>
      </ul>
      <div class="profile-contents__body">
        <p class="profile-contents__name"><?php the_title();?></p>
        <ul class="profile-contents__list">
          <li class="profile-contents__item">
            <p class="profile-contents__head">拠点</p>
            <p class="profile-contents__value"><?php echo post_custom('from'); ?></p>
          </li>
          <li class="profile-contents__item">
            <p class="profile-contents__head">趣味</p>
            <p class="profile-contents__value"><?php echo post_custom('hobby'); ?></p>
          </li>
          <li class="profile-contents__item">
            <p class="profile-contents__head">血液型</p>
            <p class="profile-contents__value"><?php echo post_custom('blood'); ?></p>
          </li>
          <li class="profile-contents__item">
            <p class="profile-contents__head">誕生日</p>
            <p class="profile-contents__value"><?php echo post_custom('birthday'); ?></p>
          </li>
          <li class="profile-contents__item">
            <p class="profile-contents__head">好きな映画</p>
            <p class="profile-contents__value"><?php echo post_custom('movie'); ?></p>
          </li>
          <li class="profile-contents__item">
            <p class="profile-contents__head">好きな言葉</p>
            <p class="profile-contents__value"><?php echo post_custom('word'); ?></p>
          </li>
          <li class="profile-contents__item">
            <p class="profile-contents__head">好きな釣り</p>
            <p class="profile-contents__value"><?php echo post_custom('fishing'); ?></p>
          </li>
        </ul>
      </div>
    </div>
  </div>
</section>
<section class="profile-introduce">
  <h1 class="section-heading mini">自己紹介</h1>
  <div class="profile-introduce__content">
    <p class="profile-introduce__text"><?php echo the_field('introduce'); ?></p>
  </div>
  <div class="profile-btn">
    <a href="#">お仕事・PRのご依頼は<br class="sp">コチラ</a>
  </div>
</section>
<section class="profile-link">
  <h1 class="section-heading mini">リンク</h1>
  <ul class="profile-link__list">
    <li class="profile-link__item instagram-link">
      <a href="<?php echo post_custom('instagram'); ?>">Instagram</a>
    </li>
    <li class="profile-link__item twitter">
      <a href="<?php echo post_custom('twitter'); ?>">Twitter</a>
    </li>
    <li class="profile-link__item youtube">
      <a href="<?php echo post_custom('youtube'); ?>">YouTube</a>
    </li>
    <li class="profile-link__item tiktok">
      <a href="<?php echo post_custom('tiktok'); ?>">Tik Tok</a>
    </li>
    <li class="profile-link__item line">
      <a href="<?php echo post_custom('line'); ?>">LINE</a>
    </li>
    <li class="profile-link__item room">
      <a href="<?php echo post_custom('room'); ?>">ROOM</a>
    </li>
    <li class="profile-link__item amazon">
      <a href="<?php echo post_custom('amazon'); ?>">欲しい物リスト</a>
    </li>
  </ul>
</section>
<?php endwhile; endif; ?>
<section class="member-blog">
  <h1 class="section-heading mini">ブログ</h1>
  <ul class="member-blog__list">
  <?php 
  $blogusers = get_the_author_meta( 'ID' );
  $args = array(
    'author' => $blogusers,
  );
  query_posts($args);?>
<?php if ( have_posts() ): while ( have_posts() ): the_post(); ?>

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

<?php endwhile;
endif;
wp_reset_query();
?>
  </ul>
  <!-- <div class="btn__wrap">
    <a href="#" class="btn">すべてのブログをチェック</a>
  </div> -->
  <div class="profile-btn">
    <a href="#">お仕事・PRのご依頼は<br class="sp">コチラ</a>
  </div>
</section>

<?php get_footer(); ?>