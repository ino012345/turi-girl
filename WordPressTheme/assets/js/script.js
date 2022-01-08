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
		$('.slider4').slick({
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

		//logoの表示
		$(window).on('load',function(){
			$("#splash").delay(1500).fadeOut('slow');//ローディング画面を1.5秒（1500ms）待機してからフェードアウト
			$("#splash_logo").delay(1200).fadeOut('slow');//ロゴを1.2秒（1200ms）待機してからフェードアウト
		});

		$(".openbtn").click(function () {//ボタンがクリックされたら
			$(this).toggleClass('active');//ボタン自身に activeクラスを付与し
				$("#g-nav").toggleClass('panelactive');//ナビゲーションにpanelactiveクラスを付与
		});
		
		$("#g-nav a").click(function () {//ナビゲーションのリンクがクリックされたら
				$(".openbtn").removeClass('active');//ボタンの activeクラスを除去し
				$("#g-nav").removeClass('panelactive');//ナビゲーションのpanelactiveクラスも除去
		});

		
		//アコーディオンをクリックした時の動作
		$('.title').on('click', function() {//タイトル要素をクリックしたら
			$('.box').slideUp(500);//クラス名.boxがついたすべてのアコーディオンを閉じる
				
			var findElm = $(this).next(".box");//タイトル直後のアコーディオンを行うエリアを取得
				
			if($(this).hasClass('close')){//タイトル要素にクラス名closeがあれば
				$(this).removeClass('close');//クラス名を除去    
			}else{//それ以外は
				$('.close').removeClass('close'); //クラス名closeを全て除去した後
				$(this).addClass('close');//クリックしたタイトルにクラス名closeを付与し
				$(findElm).slideDown(500);//アコーディオンを開く
			}
		});

		//ページが読み込まれた際にopenクラスをつけ、openがついていたら開く動作※不必要なら下記全て削除
		$(window).on('load', function(){
			$('.accordion-area li:first-of-type section').addClass("open"); //accordion-areaのはじめのliにあるsectionにopenクラスを追加
			$(".open").each(function(index, element){	//openクラスを取得
				var Title =$(element).children('.title');	//openクラスの子要素のtitleクラスを取得
				$(Title).addClass('close');				///タイトルにクラス名closeを付与し
				var Box =$(element).children('.box');	//openクラスの子要素boxクラスを取得
				$(Box).slideDown(500);					//アコーディオンを開く
			});
		});

		$(function() {
			$('.required input').attr('required', '');
		});

		$(function() {
			//始めにjQueryで送信ボタンを無効化する
			$('input[type="submit"]').prop("disabled", true);
			
			//入力欄の操作時
			$('form input:required').change(function () {
					//必須項目が空かどうかフラグ
					let flag = true;
					//必須項目をひとつずつチェック
					$('form input:required').each(function(e) {
							//もし必須項目が空なら
							if ($('form input:required').eq(e).val() === "") {
									flag = false;
							}
					});
					//全て埋まっていたら
					if (flag) {
							//送信ボタンを復活
							$('input[type="submit"]').prop("disabled", false);
					}
					else {
							//送信ボタンを閉じる
							$('input[type="submit"]').prop("disabled", true);
					}
			});
	});

		//アコーディオンをクリックした時の動作
		$('input[type="radio"]').click(function() {//前の項目をクリックしたら
			$('.first .contact__box').slideDown();//アコーディオンの上下動作
		});
		//アコーディオンをクリックした時の動作
		$('.toSecond').click(function() {//前の項目をクリックしたら
			$('.second .contact__box').slideDown();//アコーディオンの上下動作
		});
		//アコーディオンをクリックした時の動作
		$('.contact__skipBtn p').click(function() {//前の項目をクリックしたら
			$('.second .contact__box').slideDown();//アコーディオンの上下動作
		});
		//アコーディオンをクリックした時の動作
		$('.toThird').click(function() {//前の項目をクリックしたら
			$('.third .contact__box').slideDown();//アコーディオンの上下動作
		});
		//アコーディオンをクリックした時の動作
		$('.toFourth').click(function() {//前の項目をクリックしたら
			$('.fourth .contact__box').slideDown();//アコーディオンの上下動作
		});
		//アコーディオンをクリックした時の動作
		$('.toFifth').click(function() {//前の項目をクリックしたら
			$('.fifth .contact__box').slideDown();//アコーディオンの上下動作
		});
		//アコーディオンをクリックした時の動作
		$('.toSixth').click(function() {//前の項目をクリックしたら
			$('.sixth .contact__box').slideDown();//アコーディオンの上下動作
		});

	});
});
