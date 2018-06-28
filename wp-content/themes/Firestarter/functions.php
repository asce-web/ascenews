<?php
//Include Fonts
function tf_fonts() {
    $protocol = is_ssl() ? 'https' : 'http';
    wp_enqueue_style( 'tf-opensans', "$protocol://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,400,700,800" );
    wp_enqueue_style( 'tf-opensanscondensed', "$protocol://fonts.googleapis.com/css?family=Open+Sans+Condensed:700" );}
add_action( 'wp_enqueue_scripts', 'tf_fonts' );




//Text Domain
add_action('after_setup_theme', 'fs_setup');
function fs_setup(){
    load_theme_textdomain('tf', get_template_directory() . '/languages');
}


//Image Fallbacks
function tfonebigsmall_filter_post_thumbnail_html( $homeonebigsmallthumb ) {
    // If there is no post thumbnail,
    // Return a default image
    if ( '' == $homeonebigsmallthumb ) { return '<img src="' . get_template_directory_uri() . '/images/postimage.jpg" width="133px" height="140px" />'; }

    // Else, return the post thumbnail
    return $homeonebigsmallthumb; }
add_filter( 'post_thumbnail_html', 'tfonebigsmall_filter_post_thumbnail_html' );


function tfrecentsidebar_filter_post_thumbnail_html( $recentsidebarthumb ) {
    // If there is no post thumbnail,
    // Return a default image
    if ( '' == $recentsidebarthumb ) { return '<img src="' . get_template_directory_uri() . '/images/postimage.jpg" width="460px" height="470px"  />'; }

    // Else, return the post thumbnail
    return $recentsidebarthumb; }
add_filter( 'post_thumbnail_html', 'tfrecentsidebar_filter_post_thumbnail_html' );



//Includes
include_once( 'includes/theme-options.php' );
include_once( 'includes/recent-posts-slider/recent-posts-slider.php' );
include_once( 'includes/wp-parallax-content-slider/wp-parallax-content-slider.php' );
include_once( 'includes/news-ticker/ticker.php' );
include_once( 'includes/advanced-recent-posts-widget/advanced-recent-posts-widget.php' );
include_once( 'includes/custom-styles.php'); // Load Custom Styles


//Theme Supports
add_theme_support( 'post-formats', array( 'quote', 'gallery', 'video', 'audio' ) );
add_theme_support( 'automatic-feed-links' );
add_theme_support ( 'custom-header');
add_theme_support( 'custom-background' );
add_editor_style();
if ( ! isset( $content_width ) ) $content_width = 980;

//Theme Scripts
// Let's hook in our function with the javascript files with the wp_enqueue_scripts hook
add_action( 'wp_enqueue_scripts', 'wp_firestarter_js' );

// Register some javascript files
function wp_firestarter_js() {

wp_register_script( 'wp-parallax-content-slider-modernizr', get_template_directory_uri() . '/includes/wp-parallax-content-slider/js/modernizr.custom-2.6.2.js','','',true );
wp_register_script( 'wp-parallax-content-slider-jgestures', get_template_directory_uri() . '/includes/wp-parallax-content-slider/js/jgestures.min.js','','',true );
wp_register_script( 'wp-parallax-content-slider-jswipe', get_template_directory_uri() . '/includes/wp-parallax-content-slider/js/jquery.jswipe.js','','',true );
wp_register_script( 'wp-parallax-content-slider-cslider', get_template_directory_uri() . '/includes/wp-parallax-content-slider/js/jquery.cslider.js','','',true );
wp_register_style( 'rps', get_template_directory_uri() . '/includes/recent-posts-slider/css/style.css', '','','' );
wp_register_script( 'ticker_pack', get_template_directory_uri() . '/includes/news-ticker/cycle.js', array('jquery'),'',true );
wp_register_script( 'tfscripts', get_template_directory_uri() . '/includes/tfscripts.js', array('jquery'),'',true );
//wp_register_style( 'font-awesome', '//netdna.bootstrapcdn.com/font-awesome/3.1.1/css/font-awesome.css', '','','' );
wp_register_style( 'css', get_template_directory_uri() . '/style.css', '','','' );
wp_register_script( 'retina', get_template_directory_uri() . '/includes/retina/retina.js','','',true );
wp_register_script( 'sharethis', 'https://w.sharethis.com/button/buttons.js','','',true );

if (is_home() || is_category() || is_page() ) {
wp_enqueue_style('rps'); }
wp_enqueue_script( 'comment-reply' );
wp_enqueue_script('sharethis');
wp_enqueue_script('retina');
wp_enqueue_style('css');
wp_enqueue_style('font-awesome');
wp_enqueue_script('tfscripts');
wp_enqueue_script('wp-parallax-content-slider-modernizr');
wp_enqueue_script('wp-parallax-content-slider-jgestures');
wp_enqueue_script('wp-parallax-content-slider-jswipe');
wp_enqueue_script('wp-parallax-content-slider-cslider');
wp_enqueue_script('ticker_pack');
}

// Theme Options
add_filter( 'ot_show_pages', '__return_false' );
add_filter( 'ot_show_new_layout', '__return_false' );
add_filter( 'ot_theme_mode', '__return_true' );
include_once( 'option-tree/ot-loader.php' );


//Puts link in excerpts more tag
//function new_excerpt_more($more) {
//global $post;
//return '<a class="moretag" href="'. get_permalink($post->ID) . '">Read More</a>'; }

function new_excerpt_more($more) {
    global $post;
	return '...<a class="more-link" href="'. get_permalink( get_the_ID() ) . '">Read More >></a>';
}
add_filter('excerpt_more', 'new_excerpt_more');

function custom_excerpt_length( $length ) {
	return 35;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

function get_excerpt($count){
  $permalink = get_permalink($post->ID);
  $excerpt = get_the_content();
  $excerpt = strip_tags($excerpt);
  $excerpt = substr($excerpt, 0, $count);
  $excerpt = substr($excerpt, 0, strripos($excerpt, " "));
  $excerpt = $excerpt.'... <a class="more-link" href="'.$permalink.'"><br/>Read more >></a>';
  $excerpt = preg_replace( '|\[(.+?)\](.+?\[/\\1\])?|s', '', $excerpt);
  return $excerpt;
}
add_filter( "the_excerpt", "add_class_to_excerpt" );
function add_class_to_excerpt( $excerpt ) {
    return str_replace('<p', '<p class="excerpt"', $excerpt);
}


//Add first and last classes to nav menus
function wpb_first_and_last_menu_class($items) {
$items[1]->classes[] = 'first';
$items[count($items)]->classes[] = 'last';
return $items;
}
add_filter('wp_nav_menu_objects', 'wpb_first_and_last_menu_class');


//Thumbnails
if ( function_exists( 'add_theme_support' ) ) {
add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size(150, 76); // default Post Thumbnail dimensions (cropped) used to be 295x150
//add_image_size( 'generalslidesize', 460, 470, true );
add_image_size( 'recentsidebarthumb', 400, 300, true );
//add_image_size( 'category-sthumb', 160, 90, true );
add_image_size( 'featured-thumb', 490, 300, true );
//add_image_size( 'category-lthumb', 590, 180, true );
add_image_size( 'pthumb', 360, 350, true );
add_image_size( 'channelthumb', 185, 175, true );
//add_image_size( 'newsthumb', 170, 220, true );
//add_image_size( 'homedoublethumb', 205, 230, true );
//add_image_size( 'homedoublesmallthumb', 50, 50, true );
//add_image_size( 'homeonebigthumb', 420, 230, true );
//add_image_size( 'homeonebigsmallthumb', 133, 140, true );
//add_image_size( 'homecompactthumb', 155, 200, true );
add_image_size( 'homeregularthumb', 90, 100, true );
//add_image_size( 'feedthumb', 153, 170, true ); }

//if (class_exists('MultiPostThumbnails')) {
//        new MultiPostThumbnails(
//    array(
//	        'label' => 'Secondary Image',
//                'id' => 'secondary-image',
//                'post_type' => 'post'
//            ) );
}


//Widgets
require_once (TEMPLATEPATH . '/widgets/widget-video.php');
require_once (TEMPLATEPATH . '/widgets/widget-facebook-fans.php');
require_once (TEMPLATEPATH . '/widgets/widget-latestnews.php');
require_once (TEMPLATEPATH . '/widgets/widget-minislider.php');
require_once (TEMPLATEPATH . '/widgets/widget-columnists.php');
require_once (TEMPLATEPATH . '/widgets/widget-180ad.php');
require_once (TEMPLATEPATH . '/widgets/widget-728ad.php');
require_once (TEMPLATEPATH . '/widgets/widget-slider.php');
require_once (TEMPLATEPATH . '/widgets/widget-amodule.php');
require_once (TEMPLATEPATH . '/widgets/widget-bmodule.php');
require_once (TEMPLATEPATH . '/widgets/widget-cmodule.php');
require_once (TEMPLATEPATH . '/widgets/widget-dmodule.php');
require_once (TEMPLATEPATH . '/widgets/archive-widget.php');

//Sidebars
if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'name' => 'Header Ad Area',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => '',
	)); }

//if ( function_exists('register_sidebar') ) {
//	register_sidebar(array(
//		'name' => 'Homepage Left Sidebar',
//		'before_widget' => '<li class="newslatest">',
//		'after_widget' => '</li>',
//		'before_title' => '<div class="newscategorytitle"><span>',
//		'after_title' => '</span></div>',
//	)); }

if ( function_exists('register_sidebar') ) {
	register_sidebar(array('name'=>'Featured Post',
		'before_widget' => '<div class="featured-post">',
		'after_widget' => '</div>',
		'before_title' => '',
		'after_title' => '',
	)); }

if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'name' => 'Homepage Middle Section',
		'before_widget' => '<li class="homedouble">',
		'after_widget' => '</li>',
		'before_title' => '',
		'after_title' => '',
	)); }

//if ( function_exists('register_sidebar') ) {
//	register_sidebar(array(
//		'name' => 'Homepage Middle Section 2',
//		'before_widget' => '<li class="homedouble">',
//		'after_widget' => '</li>',
//		'before_title' => '',
//		'after_title' => '',
//	)); }

if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'name' => 'Homepage Right Sidebar',
		'before_widget' => '<li class="widget">',
		'after_widget' => '</li>',
		'before_title' => '<div class="widgettitle"><span>',
		'after_title' => '</span></div><div class="rightwrapper">',
	)); }

/*register_sidebar(array(
'name' => 'Footer Column 1',
'before_widget' => '<div class="footerwidget">',
'after_widget' => '</div>',
'before_title' => '<div class="footerwidgettitle">',
'after_title' => '</div>', ));

register_sidebar(array(
'name' => 'Footer Column 2',
'before_widget' => '<div class="footerwidget">',
'after_widget' => '</div>',
'before_title' => '<div class="footerwidgettitle">',
'after_title' => '</div>', ));

register_sidebar(array(
'name' => 'Footer Column 3',
'before_widget' => '<div class="footerwidget">',
'after_widget' => '</div>',
'before_title' => '<div class="footerwidgettitle">',
'after_title' => '</div>', ));

register_sidebar(array(
'name' => 'Footer Column 4',
'before_widget' => '<div class="footerwidget">',
'after_widget' => '</div>',
'before_title' => '<div class="footerwidgettitle">',
'after_title' => '</div>', ));

if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'name' => 'Alternative Left Sidebar 1',
		'before_widget' => '<li class="widget">',
		'after_widget' => '</li>',
		'before_title' => '<div class="widgettitle"><span>',
		'after_title' => '</span></div><div class="rightwrapper">',
	)); }

if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'name' => 'Alternative Left Sidebar 2',
		'before_widget' => '<li class="widget">',
		'after_widget' => '</li>',
		'before_title' => '<div class="widgettitle"><span>',
		'after_title' => '</span></div><div class="rightwrapper">',
	)); }

if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'name' => 'Alternative Left Sidebar 3',
		'before_widget' => '<li class="widget">',
		'after_widget' => '</li>',
		'before_title' => '<div class="widgettitle"><span>',
		'after_title' => '</span></div><div class="rightwrapper">',
	)); }

if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'name' => 'Alternative Left Sidebar 4',
		'before_widget' => '<li class="widget">',
		'after_widget' => '</li>',
		'before_title' => '<div class="widgettitle"><span>',
		'after_title' => '</span></div><div class="rightwrapper">',
	)); }

if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'name' => 'Alternative Left Sidebar 5',
		'before_widget' => '<li class="widget">',
		'after_widget' => '</li>',
		'before_title' => '<div class="widgettitle"><span>',
		'after_title' => '</span></div><div class="rightwrapper">',
	)); }

if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'name' => 'Alternative Right Sidebar 1',
		'before_widget' => '<li class="widget">',
		'after_widget' => '</li>',
		'before_title' => '<div class="widgettitle"><span>',
		'after_title' => '</span></div><div class="rightwrapper">',
	)); }

if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'name' => 'Alternative Right Sidebar 2',
		'before_widget' => '<li class="widget">',
		'after_widget' => '</li>',
		'before_title' => '<div class="widgettitle"><span>',
		'after_title' => '</span></div><div class="rightwrapper">',
	)); }

if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'name' => 'Alternative Right Sidebar 3',
		'before_widget' => '<li class="widget">',
		'after_widget' => '</li>',
		'before_title' => '<div class="widgettitle"><span>',
		'after_title' => '</span></div><div class="rightwrapper">',
	)); }

if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'name' => 'Alternative Right Sidebar 4',
		'before_widget' => '<li class="widget">',
		'after_widget' => '</li>',
		'before_title' => '<div class="widgettitle"><span>',
		'after_title' => '</span></div><div class="rightwrapper">',
	)); }

if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'name' => 'Alternative Right Sidebar 5',
		'before_widget' => '<li class="widget">',
		'after_widget' => '</li>',
		'before_title' => '<div class="widgettitle"><span>',
		'after_title' => '</span></div><div class="rightwrapper">',
	)); }

if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'name' => 'Alternative Category Body 1',
		'before_widget' => '<li class="homedouble">',
		'after_widget' => '</li>',
		'before_title' => '',
		'after_title' => '',
	)); }

if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'name' => 'Alternative Category Body 2',
		'before_widget' => '<li class="homedouble">',
		'after_widget' => '</li>',
		'before_title' => '',
		'after_title' => '',
	)); }

if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'name' => 'Alternative Category Body 3',
		'before_widget' => '<li class="homedouble">',
		'after_widget' => '</li>',
		'before_title' => '',
		'after_title' => '',
	)); }

if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'name' => 'Alternative Category Body 4',
		'before_widget' => '<li class="homedouble">',
		'after_widget' => '</li>',
		'before_title' => '',
		'after_title' => '',
	)); }

if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'name' => 'Alternative Category Body 5',
		'before_widget' => '<li class="homedouble">',
		'after_widget' => '</li>',
		'before_title' => '',
		'after_title' => '',
	)); }*/






//Menus
add_action( 'init', 'register_my_menus' );
function register_my_menus() {
register_nav_menus( array(
'mainnav' => __( 'Main Menu', 'TF_EN' ),
'secondarynav' => __( 'Secondary Menu', 'TF_EN' ),
'footernav' => __( 'Footer Menu', 'TF_EN' ), ) ); }


//Social Media Links Author Profile
function add_social_contactmethod( $contactmethods ) {
$contactmethods['facebook'] = 'Facebook URL';
$contactmethods['twitter'] = 'Twitter URL';
$contactmethods['flickr'] = 'Flickr URL';
$contactmethods['pinterest'] = 'Pinterest URL';
$contactmethods['googleplus'] = 'Google+ URL';
$contactmethods['dribble'] = 'Dribble URL';
$contactmethods['linkedin'] = 'Linkedin URL';
$contactmethods['lastfm'] = 'LastFM URL';
$contactmethods['vimeo'] = 'Vimeo URL';
$contactmethods['youtube'] = 'YouTube URL';
$contactmethods['mail'] = 'Mail Adress on Profile';
return $contactmethods; }
add_filter('user_contactmethods','add_social_contactmethod',10,1);
function dropcap($atts, $content = null) {
return '<em class="dropcap">'.$content.'</em>'; }
add_shortcode('dropcap', 'dropcap');


//Include the main class file

require_once("includes/Tax-meta-class/Tax-meta-class.php");
$config = array(
   'id' => 'demo_meta_box',                         // meta box id, unique per meta box
   'title' => 'Demo Meta Box',                      // meta box title
   'pages' => array('category'),                    // taxonomy name, accept categories, post_tag and custom taxonomies
   'context' => 'normal',                           // where the meta box appear: normal (default), advanced, side; optional
   'fields' => array(),                             // list of meta fields (can be added by field arrays)
   'local_images' => false,                         // Use local or hosted images (meta box images for add/remove)
   'use_with_theme' => false                        //change path if used with theme set to true, false for a plugin or anything else for a custom path(default false).
);

$my_meta = new Tax_Meta_Class($config);

//Color field
$my_meta->addText('color_field_id',array('name'=> 'Category Color '));
$repeater_fields[] = $my_meta->addText('re_text_field_id',array('name'=> 'My Text '),true);
$repeater_fields[] = $my_meta->addTextarea('re_textarea_field_id',array('name'=> 'My Textarea '),true);
$repeater_fields[] = $my_meta->addCheckbox('re_checkbox_field_id',array('name'=> 'My Checkbox '),true);
$repeater_fields[] = $my_meta->addImage('image_field_id',array('name'=> 'My Image '),true);

//Alternative left sidebar field
$my_meta->addText('left_sidebar_field_id',array('name'=> 'Alternative Left Sidebar Name '));
$repeater_fields[] = $my_meta->addText('re_text_field_id',array('name'=> 'My Text '),true);
$repeater_fields[] = $my_meta->addTextarea('re_textarea_field_id',array('name'=> 'My Textarea '),true);
$repeater_fields[] = $my_meta->addCheckbox('re_checkbox_field_id',array('name'=> 'My Checkbox '),true);
$repeater_fields[] = $my_meta->addImage('image_field_id',array('name'=> 'My Image '),true);

//Alternative right sidebar field
$my_meta->addText('right_sidebar_field_id',array('name'=> 'Alternative Right Sidebar Name '));
$repeater_fields[] = $my_meta->addText('re_text_field_id',array('name'=> 'My Text '),true);
$repeater_fields[] = $my_meta->addTextarea('re_textarea_field_id',array('name'=> 'My Textarea '),true);
$repeater_fields[] = $my_meta->addCheckbox('re_checkbox_field_id',array('name'=> 'My Checkbox '),true);
$repeater_fields[] = $my_meta->addImage('image_field_id',array('name'=> 'My Image '),true);

//Alternative main area field
$my_meta->addText('main_sidebar_field_id',array('name'=> 'Alternative Category Body Name '));
$repeater_fields[] = $my_meta->addText('re_text_field_id',array('name'=> 'My Text '),true);
$repeater_fields[] = $my_meta->addTextarea('re_textarea_field_id',array('name'=> 'My Textarea '),true);
$repeater_fields[] = $my_meta->addCheckbox('re_checkbox_field_id',array('name'=> 'My Checkbox '),true);
$repeater_fields[] = $my_meta->addImage('image_field_id',array('name'=> 'My Image '),true);


//Finish Taxonomy Extra fields Deceleration
$my_meta->Finish();


function time_ago( $type = 'post' ) {
	$d = 'comment' == $type ? 'get_comment_time' : 'get_post_time';
	return human_time_diff($d('U'), current_time('timestamp')) . " " . __('ago', 'TF_EN'); }


//function excerpt($limit) {
//      $excerpt = explode(' ', get_the_content(), $limit);
//      if (count($excerpt)>=$limit) {
//        array_pop($excerpt);
//        $excerpt = implode(" ",$excerpt).'...';
//      } else {
//        $excerpt = implode(" ",$excerpt);
//      }
//      $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
//      return $excerpt;
//    }
//    function content($limit) {
//      $content = explode(' ', get_the_content(), $limit);
//      if (count($content)>=$limit) {
//        array_pop($content);
//        $content = implode(" ",$content).'...';
//      } else {
//        $content = implode(" ",$content);
//      }
//
//      $content = preg_replace('/\[.+\]/','', $content);
//      $content = apply_filters('the_content', $content);
//      $content = str_replace(']]>', ']]&gt;', $content);
//      return $content;
//    }

function mytheme_comment($comment, $args, $depth) {
		$GLOBALS['comment'] = $comment;
		extract($args, EXTR_SKIP);

		if ( 'div' == $args['style'] ) {
			$tag = 'div';
			$add_below = 'comment';
		} else {
			$tag = 'li';
			$add_below = 'div-comment';
		}

?>

		<<?php echo $tag ?> <?php comment_class(empty( $args['has_children'] ) ? '' : 'parent') ?> id="comment-<?php comment_ID() ?>">
		<?php if ( 'div' != $args['style'] ) : ?>
		<div id="div-comment-<?php comment_ID() ?>" class="comment-body">
		<?php endif; ?>
		<div class="comment-author vcard">
		<?php if ($args['avatar_size'] != 0) echo get_avatar( $comment, 35 ); ?>
		<?php printf(__('<cite class="fn">%s</cite> <span class="says"></span>'), get_comment_author_link()) ?>
<?php if ($comment->comment_approved == '0') : ?>
		<em class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.', 'TF_EN') ?></em>
		<br />
<?php endif; ?>
		<div class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>">


<?php /* translators: 1: date, 2: time */
				printf( __('%1$s at %2$s', 'TF_EN'), get_comment_date(),  get_comment_time()) ?></a><?php edit_comment_link(__('(Edit)', 'TF_EN'),'  ','' );

			?>
		</div></div>
		<h3 class="clear"></h3>
		<div class="commenttext"><?php comment_text() ?></div>
		<div class="reply">
<?php if(function_exists('up_down_post_votes')) { up_down_post_votes( get_the_ID() ); } ?>
		<?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
		</div>
		<?php if ( 'div' != $args['style'] ) : ?>
		</div>
		<?php endif; ?>

<?php
        }

// Re-define meta box path and URL
define( 'RWMB_URL', trailingslashit( get_stylesheet_directory_uri().'/includes/meta-box' ) );
define( 'RWMB_DIR', trailingslashit( get_stylesheet_directory().'/includes/meta-box' ) );

// Include the meta box script
require_once RWMB_DIR.'meta-box.php';




/********************* META BOX REGISTER ***********************/
/**
 * Register meta boxes
 *
 * @return void
 */
//function YOUR_PREFIX_register_meta_boxes()
//{
//	global $meta_boxes;
//	// Make sure there's no errors when the plugin is deactivated or during upgrade
//	if ( class_exists( 'RW_Meta_Box' ) )
//	{
//		foreach ( $meta_boxes as $meta_box )
//		{
//			new RW_Meta_Box( $meta_box );
//		}
//	}
//}

// Hook to 'admin_init' to make sure the meta box class is loaded
//  before (in case using the meta box class in another plugin)
// This is also helpful for some conditionals like checking page template, categories, etc.
//add_action( 'admin_init', 'YOUR_PREFIX_register_meta_boxes' );



//function tf_author_pre_get( $query ) {
//    if ( $query->is_author() && $query->is_main_query() ) :
//        $query->set( 'posts_per_page', 4 );
//    endif;
//}
//add_action( 'pre_get_posts', 'tf_author_pre_get' );

function exclude_widget_categories($args){
$exclude = "1,16,3955,3956,28,29,3088"; // The IDs of the excluding categories
$args["exclude"] = $exclude;
return $args;
}
add_filter("widget_categories_args","exclude_widget_categories");

/**
 * Tests if any of a post's assigned categories are descendants of target categories
 *
 * @param int|array $cats The target categories. Integer ID or array of integer IDs
 * @param int|object $_post The post. Omit to test the current post in the Loop or main query
 * @return bool True if at least 1 of the post's categories is a descendant of any of the target categories
 * @see get_term_by() You can get a category by name or slug, then pass ID to this function
 * @uses get_term_children() Passes $cats
 * @uses in_category() Passes $_post (can be empty)
 * @version 2.7
 * @link http://codex.wordpress.org/Function_Reference/in_category#Testing_if_a_post_is_in_a_descendant_category
 */
if ( ! function_exists( 'post_is_in_descendant_category' ) ) {
	function post_is_in_descendant_category( $cats, $_post = null ) {
		foreach ( (array) $cats as $cat ) {
			// get_term_children() accepts integer ID only
			$descendants = get_term_children( (int) $cat, 'category' );
			if ( $descendants && in_category( $descendants, $_post ) )
				return true;
		}
		return false;
	}
}

function is_subcategory($category = null) {
    if (is_category()) {
        if (null != $category){
            $cat = get_category($category);
        }else{
            $cat = get_category(get_query_var('cat'),false);
        }
        if ($cat->parent == 0 ){
            return false;
        }else{
            return true;
        }
    }
    return false;
}

/*function the_post_thumbnail_caption() {
  global $post;

  $thumbnail_id    = get_post_thumbnail_id($post->ID);
  $thumbnail_image = get_posts(array('p' => $thumbnail_id, 'post_type' => 'attachment'));

  if ($thumbnail_image && isset($thumbnail_image[0])) {
    echo '<span>'.$thumbnail_image[0]->post_excerpt.'</span>';
  }
}*/


/*//Code below excludes the 'featured' category on the listing
function the_category_filter($thelist,$separator=' ') {
    if(!defined('WP_ADMIN')) {
        //Category IDs to exclude
        $exclude = array(16);

        foreach($exclude as $c) {
            $exclude2[] = get_cat_name($c);
        }

        $cats = explode($separator,$thelist);
        $newlist = array();
        foreach($cats as $cat) {
            $catname = trim(strip_tags($cat));
            if(!in_array($catname,$exclude2))
                $newlist[] = $cat;
        }
        return implode($separator,$newlist);
    } else {
        return $thelist;
    }
}
add_filter('the_category','the_category_filter', 10, 2);
*/
add_filter('wp_list_categories', 'remove_category_link_prefix');

function remove_category_link_prefix($output) {
	return str_replace('View all posts filed under ', '', $output); //removes title when you hover on the category
}

add_filter('the_category', 'remove_the_category_link_prefix');

function remove_the_category_link_prefix($output) {
	return str_replace('View all posts in ', '', $output); //removes title when you hover on the category
}

//add_rewrite_rule('^podcast.php$', 'http://blogs.asce.org/tag/insights-podcast/feed/?insights-podcast=podcasts [NC,L]', 'top');
add_rewrite_rule('^govrel/feed/?$', 'index.php/category/save-americas-infrastructure/feed/ [NC,L]', 'top');
add_rewrite_rule('^govrel/?$', 'index.php/category/save-americas-infrastructure/ [NC,L]', 'top');

/*Register Custom Taxonomy

function series_init() {
	// create a new taxonomy
	register_taxonomy(
		'series',
		'post',
		array(
			'label' => __( 'Series' ),
			'rewrite' => array( 'slug' => 'series' )
		)
	);
}
add_action( 'init', 'series_init' );*/

// THIS INCLUDES THE THUMBNAIL IN OUR RSS FEED
function insertThumbnailRSS($content) {
global $post;
if ( has_post_thumbnail( $post->ID ) ){
$content = '' . get_the_post_thumbnail( $post->ID, 'thumbnail' ) . '' . $content;
}
return $content;
}

add_filter('the_excerpt_rss', 'insertThumbnailRSS');
add_filter('the_content_feed', 'insertThumbnailRSS');

function http_request_local( $args ) {
$args['reject_unsafe_urls'] = false;
return $args;
}
add_filter( 'http_request_args', 'http_request_local' );
?>
