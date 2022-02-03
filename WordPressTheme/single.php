<?php get_header(); ?>

<div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
  <?php
  breadcrumb_trail(
    array(
      'separator' => '&raquo;',//区切りの記号
      'show_browse' => false,//Browse: を非表示に
      'labels' => array(
        'home'	=> __( 'ホーム',	'breadcrumb-trail' ),//Homeを日本語で
      ),
    )
  );
  ?>
</div>
<section class="article">
  <p class="article__date"><?php the_time('Y.m.d'); ?></p>
  <?php if ( get_post_type() === 'pickups' ): ?>
    <h1 class="article__title article__title--pickup"><?php the_title();?></h1>
  <?php endif; ?>
  <?php if ( get_post_type() !== 'pickups' ): ?>
    <h1 class="article__title"><?php the_title();?></h1>
    <div class="article__information">
      <?php
        $blogusers = $post->post_author;
        $args = array(
          'author' => $blogusers,
          'post_type' => 'profile', // 投稿タイプ
        );
        query_posts($args);
      ?>
      <?php if ( have_posts() ): while ( have_posts() ): the_post(); ?>
      <a href="<?php the_permalink(); ?>" class="member-blog__author">
        <figure class="member-blog__icon">
          <img src="<?php echo the_field('image1'); ?>" alt="メンバーのアイコン">
        </figure>
        <p class="member-blog__name"><?php the_title();?></p>
      </a>
      <?php endwhile;
        endif;
        wp_reset_query();
      ?>
    </div>
  <?php endif; ?>
  <div class="article__contentWrap">
    <?php the_content(); ?>
  </div>
</section>

<?php if ( get_post_type() !== 'pickups' ): ?>

  <section class="information">
  <?php 
    $blogusers = $post->post_author;
    $args = array(
      'author' => $blogusers,
      'post_type' => 'profile', // 投稿タイプ
    );
    query_posts($args);?>
  <?php if ( have_posts() ): while ( have_posts() ): the_post(); ?>
  
    <div class="information__main">
      <a href="<?php the_permalink(); ?>">
      <p class="information__text">この記事を書いた人</p>
      <div class="information__media">
        <div class="information__author">
          <figure class="information__icon">
            <img src="<?php echo the_field('image1'); ?>" alt="メンバーのアイコン">
          </figure>
        </div>
        <div class="information__introduce">
          <p class="information__name"><?php the_title();?></p>
          <p class="information__introText"><?php echo the_field('introduce'); ?></p>
        </div>
      </div>
      </a>
    </div>
  
  <?php endwhile;
  endif;
  wp_reset_query();
  ?>
  <p class="information__arrow">PROFILE >>></p>
  </section>
  <div class="profile-btn">
    <a href="<?php echo home_url('contact'); ?>">お仕事・PRのご依頼はコチラ</a>
  </div>
  
<?php endif; ?>

<section class="recommend">
  <!-- <div class="recommend__bannerArea">
    <a href="#" class="recommend__banner">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/img/noimage.jpg" alt="バナー">
    </a>
    <a  href="#" class="recommend__banner">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/img/noimage.jpg" alt="バナー">
    </a>
  </div> -->
  <p class="recommend__heading">コチラの記事もオススメ！</p>
  <ul class="member-blog__list">
    <?php
      $args = array(
        'posts_per_page' => 3 // 表示件数
      );
      $posts = get_posts( $args );
      foreach ( $posts as $post ): // ループの開始
      setup_postdata( $post ); // 記事データの取得
    ?>
    <li class="member-blog__item recommend-blog">
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