<?php get_header(); ?>

<section class="member-introduce">
  <h1 class="section-heading">釣り美女<br>オフィシャルメンバー</h1>
  <p class="member-introduce__text">釣りガールの普及や釣り業界を盛り上げてくれている<br>釣り美女オフィシャルメンバーををご紹介します</p>
  <div class="profile-btn">
    <a href="#">オフィシャルメンバーの応募はこちら</a>
  </div>
  <div class="btn__wrap">
    <a href="#" class="btn block">釣り美女・オフィシャルメンバーへの<br>お仕事依頼はこちら</a>
  </div>
  <div class="member-introduce__listWrap">
    <ul class="member-introduce__list">
      <?php
        $cat_posts = get_posts(array(
            'post_type' => 'profile', // 投稿タイプ
            'posts_per_page' => -1, // 表示件数
            'orderby' => 'date', // 表示順の基準
            'order' => 'DESC' // 昇順・降順
        ));
        global $post;
        if($cat_posts): foreach($cat_posts as $post): setup_postdata($post); ?>

      <li class="member-introduce__item">
        <a href="<?php the_permalink() ?>" class="member-introduce__link">
          <figure class="member-introduce__image">
            <img src="<?php echo the_field('image1'); ?>" alt="プロフィール写真">
          </figure>
          <p class="member-introduce__name"><?php the_title(); ?></p>
          <p class="member-introduce__from">拠点：<?php echo post_custom('from'); ?></p>
          <p class="member-introduce__favorite">好きな釣り：<br>
          <?php
            if(mb_strlen(get_field('fishing'))>14){
            $text= mb_substr(strip_tags(get_field('fishing')), 0, 14);
            echo $text.'…';
            }else{
            echo strip_tags(get_field('fishing'));
            }
          ?>
          </p>
          <p class="member-introduce__arrow">PROFILE >>></p>
        </a>
      </li>
      <?php endforeach; endif; wp_reset_postdata(); ?>
    </ul>
  </div>
</section>

<?php get_footer(); ?>