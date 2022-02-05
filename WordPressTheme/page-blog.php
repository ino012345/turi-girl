<?php get_header(); ?>

<section class="member-blog">
  <h1 class="section-heading">ブログ一覧</h1>
  <ul class="member-blog__list">
  <?php
    $paged = get_query_var('paged') ?: 1;
    $args = array(
      'post_type' => "post",//投稿タイプ設定
      'posts_per_page' => 9,// 取得記事数
      'paged' => $paged,
    );

    $my_query = new WP_Query($args);
    if ($my_query->have_posts()): while ( $my_query->have_posts() ) : $my_query->the_post(); 
  ?>
    <li class="member-blog__item">
      <a href="<?php the_permalink(); ?>">
        <figure class="member-blog__image">
          <?php keika_time(3);?>
          <?php if (has_post_thumbnail()) : ?>
            <?php the_post_thumbnail('thumbnail'); ?>
          <?php else : ?>
            <img src="<?php echo catch_that_image(); ?>" alt="" />
          <?php endif ; ?>
        </figure>
        <p class="member-blog__date"><?php the_time('Y.m.d'); ?></p>
        <p class="member-blog__title">

        <?php
          if(mb_strlen(get_the_title())>20){
          $text= mb_substr(strip_tags(get_the_title()), 0, 20);
          echo $text.'…';
          }else{
          echo strip_tags(get_the_title());
          }
        ?>

        </p>
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
    <?php endwhile; ?>
    <?php endif; ?>
  </ul>
  <?php
    if ( function_exists( 'pagination' ) ) :
      pagination( $my_query->max_num_pages, $paged );
    endif;
  ?>
  
  <?php wp_reset_postdata(); ?>
</section>

<?php get_footer(); ?>