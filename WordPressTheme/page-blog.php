<?php get_header(); ?>

<section class="member-blog">
  <h1 class="section-heading">ブログ一覧</h1>
  <ul class="member-blog__list">
  <?php
    $args = array(
      'posts_per_page' => -1 // 表示件数
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
</section>

<?php get_footer(); ?>