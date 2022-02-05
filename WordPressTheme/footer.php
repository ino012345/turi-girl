<section class="footer-contact">
  <h1 class="section-heading">お問い合わせ</h1>
  <div class="footer-contact__btns">
    <a href="<?php echo home_url('official'); ?>" class="footer-contact__btn">
      <p class="footer-contact__text">オフィシャルメンバーの<br>ご応募はコチラ</p>
    </a>
    <a href="<?php echo home_url('contact'); ?>" class="footer-contact__btn">
      <p class="footer-contact__text">お仕事のご依頼は<br>コチラ</p>
    </a>
  </div>
</section>
<footer class="footer">
  <div class="footer__inner">
    <figure class="footer__logo">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-white.svg" alt="フッターロゴ">
    </figure>
    <nav class="footer__nav">
      <div class="footer__navLeft">
        <div class="footer__navListWrap">
          <p class="footer__navHead">コンテンツ</p>
          <ul class="footer__navList">
            <li class="footer__navItem">
              <a href="<?php echo home_url(); ?>">- トップページ</a>
            </li>
            <li class="footer__navItem">
              <a href="<?php echo home_url('member'); ?>">- オフィシャルメンバー</a>
            </li>
            <li class="footer__navItem">
              <a href="<?php echo home_url('blog'); ?>">- ブログ一覧</a>
            </li>
            <li class="footer__navItem">
              <a href="<?php echo home_url('pickup'); ?>">- ピックアップ</a>
            </li>
          </ul>
        </div>
        <div class="footer__navListWrap">
          <p class="footer__navHead">お問い合わせ</p>
          <ul class="footer_navList">
            <li class="footer__navItem">
              <a href="<?php echo home_url('register'); ?>">- オフィシャルメンバー応募</a>
            </li>
            <li class="footer__navItem">
              <a href="<?php echo home_url('contact'); ?>">- お仕事のご依頼はコチラ</a>
            </li>
            <li class="footer__navItem">
              <a href="<?php echo home_url('contact'); ?>">- お問い合わせ</a>
            </li>
          </ul>
        </div>
      </div>
      <div class="footer__navRight">
        <div class="footer__navListWrap">
          <p class="footer__navHead">SNS</p>
          <ul class="footer_navList">
            <li class="footer__navItem">
              <a href="https://www.instagram.com/tsuribijyo/" target="_blank" rel="noopener noreferrer">- Instagram</a>
            </li>
            <li class="footer__navItem">
              <a href="https://lin.ee/ljxVioK" target="_blank" rel="noopener noreferrer">- LINE</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </div>
  <p class="footer__copyright">©釣り美女</p>
</footer>
<?php wp_footer(); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.
cookie.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/slick.min.js"></script>
</body>
</html>