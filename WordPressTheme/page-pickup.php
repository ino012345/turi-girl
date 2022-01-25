<?php get_header(); ?>

<section class="member-blog">
  <h1 class="section-heading">ピックアップ一覧</h1>
  <ul class="member-blog__list">
  <?php
$cat_posts = get_posts(array(
    'post_type' => 'post', // 投稿タイプ
    'category_name' => 'pickup', // カテゴリをスラッグで指定する場合
    'posts_per_page' => -1, // 表示件数
    'orderby' => 'date', // 表示順の基準
    'order' => 'DESC' // 昇順・降順
));
global $post;
if($cat_posts): foreach($cat_posts as $post): setup_postdata($post); ?>

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
    <?php endforeach; endif; wp_reset_postdata(); ?>
  </ul>
</section>

<?php get_footer(); ?>