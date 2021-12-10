// ローディング判定
jQuery(function ($) {
	jQuery(window).on("load", function() {
		jQuery("body").attr("data-loading", "true");
	});

	jQuery(function() {
		// スクロール判定
		jQuery(window).on("scroll", function() {
			if (0 < jQuery(this).scrollTop()) {
				jQuery("body").attr("data-scroll", "true");
				jQuery(".flow-nav").css("top", "0");
				jQuery(".flow-nav__arrow").css("top", "40px");
			} else {
				jQuery("body").attr("data-scroll", "false");
				jQuery(".flow-nav").css("top", "-100%");
				jQuery(".flow-nav__arrow").css("top", "-100%");
			}
		});

		/* ドロワー */
		jQuery(".js-drawer").on("click", function(e) {
			e.preventDefault();
			let targetClass = jQuery(this).attr("data-target");
			jQuery("." + targetClass).toggleClass("is-checked");
			return false;
		});

		/* スムーススクロール */
		jQuery('a[href^="#"]').click(function() {
			let header = jQuery(".js-header").height();
			let speed = 300;
			let id = jQuery(this).attr("href");
			let target = jQuery("#" == id ? "html" : id);
			let position = jQuery(target).offset().top - header;
			if ("fixed" !== jQuery("#header").css("position")) {
				position = jQuery(target).offset().top;
			}
			if (0 > position) {
				position = 0;
			}
			jQuery("html, body").animate(
				{
					scrollTop: position
				},
				speed
			);
			return false;
		});

		/* 電話リンク */
		let ua = navigator.userAgent;
		if (ua.indexOf("iPhone") < 0 && ua.indexOf("Android") < 0) {
			jQuery('a[href^="tel:"]')
				.css("cursor", "default")
				.on("click", function(e) {
					e.preventDefault();
				});
		}

		$('.slider').slick({
			autoplay: true,//自動的に動き出すか。初期値はfalse。
			infinite: true,//スライドをループさせるかどうか。初期値はtrue。
			autoplaySpeed: 2000,//自動的に動き出す待ち時間。初期値は3000
			speed: 1000,//スライドのスピード。初期値は300。
			slidesToShow: 3,//スライドを画面に3枚見せる
			slidesToScroll: 1,//1回のスクロールで1枚の写真を移動して見せる
			prevArrow: false,
			nextArrow: false,
			pauseOnHover: false,//オンマウスでスライドを一時停止させるかどうか。初期値はtrue。
			pauseOnFocus: false,//フォーカスした際にスライドを一時停止させるかどうか。初期値はtrue。
			centerMode: true,//要素を中央ぞろえにする
			variableWidth: true,//幅の違う画像の高さを揃えて表示
			dots: true,//下部ドットナビゲーションの表示
		});
		$('.slider2').slick({
			autoplay: true,//自動的に動き出すか。初期値はfalse。
			infinite: true,//スライドをループさせるかどうか。初期値はtrue。
			autoplaySpeed: 1000,//自動的に動き出す待ち時間。初期値は3000
			speed: 1000,//スライドのスピード。初期値は300。
			slidesToShow: 4,
			slidesToScroll: 2,//1回のスクロールで1枚の写真を移動して見せる
			prevArrow: false,
			nextArrow: false,
			pauseOnHover: false,//オンマウスでスライドを一時停止させるかどうか。初期値はtrue。
			pauseOnFocus: false,//フォーカスした際にスライドを一時停止させるかどうか。初期値はtrue。
			centerMode: true,//要素を中央ぞろえにする
			variableWidth: true,//幅の違う画像の高さを揃えて表示
			dots: false,//下部ドットナビゲーションの表示
		});
		$('.slider3').slick({
			autoplay: true,//自動的に動き出すか。初期値はfalse。
			infinite: true,//スライドをループさせるかどうか。初期値はtrue。
			autoplaySpeed: 0,//自動的に動き出す待ち時間。初期値は3000
			speed: 5000,//スライドのスピード。初期値は300。
			slidesToShow: 4,
			slidesToScroll: 2,//1回のスクロールで1枚の写真を移動して見せる
			prevArrow: false,
			nextArrow: false,
			pauseOnHover: false,//オンマウスでスライドを一時停止させるかどうか。初期値はtrue。
			pauseOnFocus: false,//フォーカスした際にスライドを一時停止させるかどうか。初期値はtrue。
			centerMode: true,//要素を中央ぞろえにする
			variableWidth: true,//幅の違う画像の高さを揃えて表示
			dots: false,//下部ドットナビゲーションの表示
			cssEase: 'linear',//動き方。初期値はeaseですが、スムースな動きで見せたいのでlinear
		});
	});
});
