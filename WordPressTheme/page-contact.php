<?php get_header(); ?>

<section class="contact">

<?php the_content(); ?>

  <div class="contact__radioWrap">
    <div class="contact__radio">
      [mwform_radio name="genre" children="取材について,広告掲載について,製品・サービスPRについて,サービスについて,業務提携について,その他"]
    </div>
    <input type="">
  </div>
  <ul class="contact__accordion-area">

    <li>
      <section>
        <h3 class="contact__title">会社名</h3>
        <div class="contact__box">
          [mwform_text name="company" size="60"]
        </div>
      </section>
    </li>
    <li>
      <section>
        <h3 class="contact__title need">お名前</h3>
        <div class="contact__box">
          [mwform_text name="name" size="60"]
        </div>
      </section>
    </li>
    <li>
      <section>
        <h3 class="contact__title need">カナ</h3>
        <div class="contact__box">
          [mwform_text name="kana" size="60"]
        </div>
      </section>
    </li>
    <li>
      <section>
        <h3 class="contact__title need">メールアドレス</h3>
        <div class="contact__box">
          [mwform_email name="mail" size="60"]
        </div>
      </section>
    </li>
    <li>
      <section>
        <h3 class="contact__title need">電話番号</h3>
        <div class="contact__box">
          [mwform_tel name="call"]
        </div>
      </section>
    </li>
    <li>
      <section>
        <h3 class="contact__title need">お問い合わせ内容</h3>
        <div class="contact__box">
          [mwform_textarea name="detail" cols="50" rows="5"]
        </div>
      </section>
    </li>

  </ul>
</section>

<?php get_footer(); ?>