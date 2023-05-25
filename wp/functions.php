<?php
//----------------------------------------------
// Assets path
/* <img src="<?php echo assets_path(); ?>img/logo.png"> */
//----------------------------------------------

function assets_path()
{
  return esc_url(bloginfo('stylesheet_directory') . '/assets/');
}

//----------------------------------------------
// Hide WP admin bar when logged in
//----------------------------------------------

add_filter('show_admin_bar', '__return_false');

add_theme_support('post-thumbnails');
//----------------------------------------------
// Hide unused WP menu items
//----------------------------------------------

function remove_menus()
{
  // remove_menu_page( 'index.php' );                  //Dashboard
  // remove_menu_page( 'jetpack' );                    //Jetpack*
  remove_menu_page('edit.php');                   //Posts
  // remove_menu_page( 'upload.php' );                 //Media
  // remove_menu_page( 'edit.php?post_type=page' );    //Pages
  remove_menu_page('edit-comments.php');          //Comments
  // remove_menu_page( 'themes.php' );                 //Appearance
  // remove_menu_page( 'plugins.php' );                //Plugins
  // remove_menu_page( 'users.php' );                  //Users
  // remove_menu_page( 'tools.php' );                  //Tools
  // remove_menu_page( 'options-general.php' );        //Settings
}
add_action('admin_menu', 'remove_menus');

add_action('init', function() {
  remove_filter('the_excerpt', 'wpautop');
  remove_filter('the_content', 'wpautop');
  });


//----------------------------------------------
// WP ヘッダーに挿入されるCSSを削除
//----------------------------------------------
add_action( 'wp_enqueue_scripts', 'remove_block_library_style' );
function remove_block_library_style() {
  wp_dequeue_style( 'wp-block-library' );//style.min.cssの削除
  wp_dequeue_style( 'wp-block-library-theme' ); //theme.min.cssの削除
}


//----------------------------------------------
// Find if is child or page
//----------------------------------------------
add_theme_support('post-thumbnails');
function is_tree($page_id, $use_slug = true)
{

  if ($use_slug === true && !is_string($page_id)) {
    return false;
  } else if ($use_slug !== true && !is_int($page_id)) {
    return false;
  }
  if ($use_slug === true) {
    $page_data = get_page_by_path($page_id);
    if (null === $page_data) {
      return false;
    }
    $page_id = $page_data->ID;
  }

  global $post;
  if (is_page($page_id)) {
    return true;
  }

  $anc = get_post_ancestors($post->ID);
  foreach ($anc as $ancestor) {
    if (is_page() && $ancestor == $page_id) {
      return true;
    }
  }

  return false;
};

add_filter('page_template_hierarchy', 'my_page_templates');

function my_page_templates($templates)
{
  global $wp_query;

  $template = get_page_template_slug();
  $pagename = $wp_query->query['pagename'];

  if ($pagename && !$template) {
    $pagename = str_replace('/', '__', $pagename);
    $decoded = urldecode($pagename);

    if ($decoded == $pagename) {
      array_unshift($templates, "page-{$pagename}.php");
    }
  }

  return $templates;
}

$allowed_html = array(
    'a' => array(
        'href' => array (),
        'target' => array()
    ),
    'br' => array(),
    'p' => array(),
);


//内部リンクをブログカードにするショートコード
function show_blogcard($atts)
{

  $atts = shortcode_atts(array(
    'url' => "",
  ), $atts, 'sc_blogcard');

  //URLから投稿IDを取得
  $id = url_to_postid($atts['url']);
  // $image_file = wp_get_attachment_url(get_post_meta($id, 'blog_img', true));
  $introduction_text = get_post_meta($id, 'lead', true);
  $introduction_text = strip_tags($introduction_text);
  // $introduction_text = my_trim($introduction_text, 121)
  //タイトルを取得
  if (empty($title)) {
    $title = get_the_title($id);
  }

  //アイキャッチ画像を取得
  $img_tag = "";
  if (empty($img_tag)) {
    // $img_tag = '<img src="' . $image_file . '" alt="' . $title . '" />';
    $size = 'full';
    $thumb_id = get_post_thumbnail_id($id);
    $thumb_img = wp_get_attachment_image_src($thumb_id, $size);
    $img_tag = $thumb_img[0];
    $img_tag = get_the_post_thumbnail($id, 'thumbnail');
  }
  // $img_tag = get_the_post_thumbnail($id, 'thumbnail');

  //ブログカード部分のHTML
  $sc_blogcard = "";
  $sc_blogcard .= '
      <a href="' . $atts['url'] . '" class="flex cardLink">
        <figure class="cardLink__img">' . $img_tag . '</figure>
        <summary class="cardLink__box">
          <div class="cardLink__box--ttl">' . $title . '</div>
          <div class="cardLink__box--txt">' . $introduction_text . '</div>
        </summary>
      </a>';

  return $sc_blogcard;
}
//ショートコードに追加
add_shortcode("sc_blogcard", "show_blogcard");


// 人気記事出力用関数
function getPostViews($postID)
{
  $count_key = 'post_views_count';
  $count = get_post_meta($postID, $count_key, true);
  if ($count == '') {
    delete_post_meta($postID, $count_key);
    add_post_meta($postID, $count_key, '0');
    return "0 View";
  }
  return $count . ' Views';
}
// 記事viewカウント用関数
function setPostViews($postID)
{
  $count_key = 'post_views_count';
  $count = get_post_meta($postID, $count_key, true);
  if ($count == '') {
    $count = 0;
    delete_post_meta($postID, $count_key);
    add_post_meta($postID, $count_key, '0');
  } else {
    $count++;
    update_post_meta($postID, $count_key, $count);
  }
}
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

