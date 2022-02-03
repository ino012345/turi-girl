<?php
/**
 * Functions
 */

/**
 * WordPress標準機能
 *
 * @codex https://wpdocs.osdn.jp/%E9%96%A2%E6%95%B0%E3%83%AA%E3%83%95%E3%82%A1%E3%83%AC%E3%83%B3%E3%82%B9/add_theme_support
 */
function my_setup() {
	add_theme_support( 'post-thumbnails' ); /* アイキャッチ */
	add_theme_support( 'automatic-feed-links' ); /* RSSフィード */
	add_theme_support( 'title-tag' ); /* タイトルタグ自動生成 */
	add_theme_support(
		'html5',
		array( /* HTML5のタグで出力 */
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		)
	);
}
add_action( 'after_setup_theme', 'my_setup' );



/**
 * CSSとJavaScriptの読み込み
 *
 * @codex https://wpdocs.osdn.jp/%E3%83%8A%E3%83%93%E3%82%B2%E3%83%BC%E3%82%B7%E3%83%A7%E3%83%B3%E3%83%A1%E3%83%8B%E3%83%A5%E3%83%BC
 */
function my_script_init()
{

	wp_enqueue_style( 'my', get_template_directory_uri() . '/assets/css/style.css', array(), '1.0.1', 'all' );

	wp_enqueue_script( 'my', get_template_directory_uri() . '/assets/js/script.js', array( 'jquery' ), '1.0.1', true );

}
add_action('wp_enqueue_scripts', 'my_script_init');




/**
 * メニューの登録
 *
 * @codex https://wpdocs.osdn.jp/%E9%96%A2%E6%95%B0%E3%83%AA%E3%83%95%E3%82%A1%E3%83%AC%E3%83%B3%E3%82%B9/register_nav_menus
 */
// function my_menu_init() {
// 	register_nav_menus(
// 		array(
// 			'global'  => 'ヘッダーメニュー',
// 			'utility' => 'ユーティリティメニュー',
// 			'drawer'  => 'ドロワーメニュー',
// 		)
// 	);
// }
// add_action( 'init', 'my_menu_init' );
/**
 * メニューの登録
 *
 * 参考：https://wpdocs.osdn.jp/%E9%96%A2%E6%95%B0%E3%83%AA%E3%83%95%E3%82%A1%E3%83%AC%E3%83%B3%E3%82%B9/register_nav_menus
 */


/**
 * ウィジェットの登録
 *
 * @codex http://wpdocs.osdn.jp/%E9%96%A2%E6%95%B0%E3%83%AA%E3%83%95%E3%82%A1%E3%83%AC%E3%83%B3%E3%82%B9/register_sidebar
 */
// function my_widget_init() {
// 	register_sidebar(
// 		array(
// 			'name'          => 'サイドバー',
// 			'id'            => 'sidebar',
// 			'before_widget' => '<div id="%1$s" class="p-widget %2$s">',
// 			'after_widget'  => '</div>',
// 			'before_title'  => '<div class="p-widget__title">',
// 			'after_title'   => '</div>',
// 		)
// 	);
// }
// add_action( 'widgets_init', 'my_widget_init' );


/**
 * アーカイブタイトル書き換え
 *
 * @param string $title 書き換え前のタイトル.
 * @return string $title 書き換え後のタイトル.
 */
function my_archive_title( $title ) {

	if ( is_home() ) { /* ホームの場合 */
		$title = 'ブログ';
	} elseif ( is_category() ) { /* カテゴリーアーカイブの場合 */
		$title = '' . single_cat_title( '', false ) . '';
	} elseif ( is_tag() ) { /* タグアーカイブの場合 */
		$title = '' . single_tag_title( '', false ) . '';
	} elseif ( is_post_type_archive() ) { /* 投稿タイプのアーカイブの場合 */
		$title = '' . post_type_archive_title( '', false ) . '';
	} elseif ( is_tax() ) { /* タームアーカイブの場合 */
		$title = '' . single_term_title( '', false );
	} elseif ( is_search() ) { /* 検索結果アーカイブの場合 */
		$title = '「' . esc_html( get_query_var( 's' ) ) . '」の検索結果';
	} elseif ( is_author() ) { /* 作者アーカイブの場合 */
		$title = '' . get_the_author() . '';
	} elseif ( is_date() ) { /* 日付アーカイブの場合 */
		$title = '';
		if ( get_query_var( 'year' ) ) {
			$title .= get_query_var( 'year' ) . '年';
		}
		if ( get_query_var( 'monthnum' ) ) {
			$title .= get_query_var( 'monthnum' ) . '月';
		}
		if ( get_query_var( 'day' ) ) {
			$title .= get_query_var( 'day' ) . '日';
		}
	}
	return $title;
};
add_filter( 'get_the_archive_title', 'my_archive_title' );


/**
 * 抜粋文の文字数の変更
 *
 * @param int $length 変更前の文字数.
 * @return int $length 変更後の文字数.
 */
function my_excerpt_length( $length ) {
	return 80;
}
add_filter( 'excerpt_length', 'my_excerpt_length', 999 );


/**
 * 抜粋文の省略記法の変更
 *
 * @param string $more 変更前の省略記法.
 * @return string $more 変更後の省略記法.
 */
function my_excerpt_more( $more ) {
	return '...';

}
add_filter( 'excerpt_more', 'my_excerpt_more' );

function keika_time($days){
	$today = date_i18n('U');
	$entry_day = get_the_time('U');
	$keika = date('U',($today - $entry_day)) / 86400;
	if ( $days > $keika ):
		echo '<img src="/wp-content/themes/WordPressTheme/assets/img/new.png" alt="新着マーク" class="new">';
	endif;
}
function keika_time_pickup($days){
	$today = date_i18n('U');
	$entry_day = get_the_time('U');
	$keika = date('U',($today - $entry_day)) / 86400;
	if ( $days > $keika ):
		echo '<img src="/wp-content/themes/WordPressTheme/assets/img/new-pickup.png" alt="新着マーク" class="new">';
	endif;
}

//カスタム投稿（投稿項目の名前）
register_post_type( 'news', array( //カスタム投稿の名前
	'label' => 'ニュース', //管理画面に表示される名前
	'public' => true, //trueでOK
	'query_var' => true, //URLの最適化。trueでOK
	'rewrite' => array( 'slug' => 'news' ), //スラッグの指定
	'capability_type' => 'post', //権限の設定。postでOK
	'hierarchical' => false, //カスタム投稿タイプで親子関係を作るか。（今回はfalse）
	'menu_position' => 5, //管理画面での表示場所。5=（投稿の下）10=（メディアの下）
	'supports' => array( //編集ページに表示させるもの
			'title', //タイトル
	),
	'has_archive' => true //通常のarchive.phpを使うか。基本trueでOK
));

//カスタム投稿（投稿項目の名前）
register_post_type( 'profile', array( //カスタム投稿の名前
	'label' => 'プロフィール', //管理画面に表示される名前
	'public' => true, //trueでOK
	'query_var' => true, //URLの最適化。trueでOK
	'rewrite' => array( 'slug' => 'profile' ), //スラッグの指定
	'capability_type' => 'post', //権限の設定。postでOK
	'hierarchical' => false, //カスタム投稿タイプで親子関係を作るか。（今回はfalse）
	'menu_position' => 6, //管理画面での表示場所。5=（投稿の下）10=（メディアの下）
	'supports' => array( //編集ページに表示させるもの
			'title', //タイトル
	),
	'has_archive' => true //通常のarchive.phpを使うか。基本trueでOK
));

//カスタム投稿（投稿項目の名前）
register_post_type( 'pickup', array( //カスタム投稿の名前
	'label' => 'ピックアップ', //管理画面に表示される名前
	'public' => true, //trueでOK
	'query_var' => true, //URLの最適化。trueでOK
	'rewrite' => array( 'slug' => 'pickup' ), //スラッグの指定
	'capability_type' => 'post', //権限の設定。postでOK
	'hierarchical' => false, //カスタム投稿タイプで親子関係を作るか。（今回はfalse）
	'menu_position' => 7, //管理画面での表示場所。5=（投稿の下）10=（メディアの下）
	'supports' => array('title','editor','thumbnail','custom-fields','author','comments','revisions','page-attributes'),
	'has_archive' => true //通常のarchive.phpを使うか。基本trueでOK
));
// カスタム投稿タイプの記事編集画面にメタボックス（作成者変更）を表示する

/* admin_menu アクションフックでカスタムボックスを定義 */
add_action('admin_menu', 'myplugin_add_custom_box');

/* 投稿ページの "advanced" 画面にカスタムセクションを追加 */
function myplugin_add_custom_box() {
  if( function_exists( 'add_meta_box' )) {
    add_meta_box( 'myplugin_sectionid', __( '作成者', 'myplugin_textdomain' ), 'post_author_meta_box', 'profile', 'side' );
  }
}

// function user_profile_hide_script( $hook ) {
// 	$script = <<<SCRIPT
// 	jQuery(function($) {
// 		jQuery('#your-profile .user-rich-editing-wrap').hide(); //ビジュアルエディター
// 		jQuery('#your-profile .user-syntax-highlighting-wrap').hide(); //シンタックスハイライト
// 		jQuery('#your-profile .user-comment-shortcuts-wrap').hide(); //キーボードショートカット
// 		jQuery('#your-profile .show-admin-bar').hide(); //ツールバー
// 		jQuery('#your-profile .user-language-wrap').hide(); //言語
// 		jQuery('#your-profile .user-url-wrap').hide(); //サイト
// 		jQuery('#your-profile .user-aim-wrap').hide(); //AIM
// 		jQuery('#your-profile .user-yim-wrap').hide(); //Yahoo IM
// 		jQuery('#your-profile .user-jabber-wrap').hide(); //Jabber / Google Talk
// 		jQuery('#your-profile .user-googleplus-wrap').hide(); //Google+
// 		jQuery('#your-profile .user-description-wrap').hide(); //プロフィール情報
// 		jQuery('#your-profile .user-sessions-wrap').hide(); //セッション
// 	});
// 	SCRIPT;
// 	wp_add_inline_script( 'jquery-core', $script );
// 	}
// 	add_action( 'admin_enqueue_scripts', 'user_profile_hide_script' );

	// カスタム投稿タイプの記事一覧に投稿者の項目を追加する
// function manage_books_columns ($columns) {
// 	$columns['author'] = '作成者';
// 	return $columns;
// }

// function add_books_column ($column, $post_id) {
// 	if ('author' == $column) {
// 			$value = get_the_term_list($post_id, 'author');
// 			echo attribute_escape($value);
// 	}
// }

// add_filter('manage_posts_columns', 'manage_books_columns');
// add_action('manage_posts_custom_column', 'add_books_column', 10, 2);

//スマホ表示分岐
function is_mobile(){
	$useragents = array(
			'iPhone', // iPhone
			'iPod', // iPod touch
			'Android.*Mobile', // 1.5+ Android *** Only mobile
			'Windows.*Phone', // *** Windows Phone
			'dream', // Pre 1.5 Android
			'CUPCAKE', // 1.5+ Android
			'blackberry9500', // Storm
			'blackberry9530', // Storm
			'blackberry9520', // Storm v2
			'blackberry9550', // Storm v2
			'blackberry9800', // Torch
			'webOS', // Palm Pre Experimental
			'incognito', // Other iPhone browser
			'webmate' // Other iPhone browser

	);
	$pattern = '/'.implode('|', $useragents).'/i';
	return preg_match($pattern, $_SERVER['HTTP_USER_AGENT']);
}

add_filter( 'mwform_choices_mw-wp-form-98', 'mwform_add_birthday_options', 10, 2 );
function mwform_add_birthday_options( $children, $atts ) {
  // 年設定
  if ( $atts['name'] === 'birthday-year' ) {
    for ( $i = 1980; $i <= date( 'Y' ); $i++ ) {
      $children[$i] = $i;
    }
  }

  // 月設定
  if ( $atts['name'] === 'birthday-month' ) {
    for ( $i = 1; $i <= 12; $i++ ) {
      $children[$i] = $i;
    }
  }

  // 日設定
  if ( $atts['name'] === 'birthday-day' ) {
    for ( $i = 1; $i <= 31; $i++ ) {
      $children[$i] = $i;
    }
  }

  return $children;
}

add_filter( 'mwform_value_mw-wp-form-xxx', 'mwform_birthday_year_value_setting', 10, 2 );
function mwform_birthday_year_value_setting( $value, $name ) {
  if ( $name === 'birthday-year' ) {
    $value = 2000;
  }
  if ( $name === 'birthday-month' ) {
    $value = 1;
  }
  if ( $name === 'birthday-day' ) {
    $value = 1;
  }
  return $value;
}