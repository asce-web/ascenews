<?php

/*

Plugin Name: Recent Posts Slider

Plugin URI: http://recent-posts-slider.com

Description: Recent Posts Slider displays your blog's recent posts either with excerpt or thumbnail images using slider.

Version: 0.6.3

Author: Neha Goel

*/


/*
    Copyright 2011  Neha Goel  (email : rps@eworksphere.com)
    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as
    published by the Free Software Foundation.
    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.
    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/


//To perform action while activating pulgin i.e. creating the thumbnail of first image of  all posts
register_activation_hook(__FILE__, 'rps_activate');


//To perform action while publishing post i.e. creating the thumbnail of first image of post
add_action('publish_post', 'rps_publish_post');


//Add  the nedded styles & script
add_action('init', 'rps_add_script');
add_shortcode('rps', 'rps_show');

// register Rps widget
function register_rpswidget() {
    return register_widget("RpsWidget");
}

add_action('widgets_init','register_rpswidget');

/**
 *Set the default options while activating the pugin & create thumbnails of first image of all the posts
 */

function rps_activate()
{
    $width = '460';
    $height = '470';
    $post_per_slide = '1';
    $total_posts = '8';
    $slider_content = '3';
    rps_post_img_thumb();
}

/**
 *Perform operations while publishing post
 */

function rps_publish_post()
{
    $slider_content = get_option('rps_slider_content');
    if ($slider_content == 1 || $slider_content == 3) {
        global $post;
        rps_post_img_thumb((int)$post->ID);

    } else {

        return;

    }

}


/**
 *It creates thumbnails of first image of post
 * @param $post_id
 * @return void
 */

function rps_post_img_thumb($post_id = NULL)
{

    $width = '460';

    $height = '470';

    $slider_content = '3';

    $post_per_slide = '1';

    $total_posts = '8';


    $wp_query = $GLOBALS['wp_query'];

    $category = $wp_query->get_queried_object();

    $category_ids = $wp_query->get_queried_object_id();


    $post_include_ids = get_option('rps_post_include_ids');

    $post_exclude_ids = get_option('rps_post_exclude_ids');


    $set_img_width = $width;

    $set_img_height = $height;


    if (empty($post_id)) {

        $args = array(

            'numberposts' => $total_posts,

            'offset' => 0,

            'category' => $category_ids,

            'orderby' => 'post_date',

            'order' => 'DESC',

            'include' => $post_include_ids,

            'exclude' => $post_exclude_ids,

            'post_type' => 'post',

            'post_status' => 'publish');

        $recent_posts = get_posts($args);

        if (count($recent_posts) < $total_posts) {

            $total_posts = count($recent_posts);

        }


        foreach ($recent_posts as $key => $val) {

            $post_details[$key]['post_ID'] = $val->ID;

            $post_details[$key]['post_content'] = $val->post_content;

        }

    } else {

        $post_details['0']['post_ID'] = $post_id;

        $get_post_details = get_post($post_id);

        $post_details['0']['post_content'] = $get_post_details->post_content;

    }


    foreach ($post_details as $key_p => $val_p) {


        $first_img_name = '';

        $img_name = '';

        $first_img_src = '';

        $first_img_name_arr = get_post_custom_values('rps_custom_thumb', $val_p['post_ID']);

        $first_img_name = $first_img_name_arr['0'];


        if (function_exists('has_post_thumbnail') && has_post_thumbnail($val_p['post_ID']) && empty($first_img_name)) {

            $img_details = wp_get_attachment_image_src(get_post_thumbnail_id($val_p['post_ID']), 'full');

            $first_img_name = $img_details[0];

        } else {


            if (empty($first_img_name)) {

                preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $val_p['post_content'], $matches);


                if (count($matches) && isset($matches[1])) {

                    $first_img_name = $matches[1][0];

                }

            }

        }


        if (!empty($first_img_name)) {

            $arr_img = explode('/', $first_img_name);

            unset($arr_img[0]);

            unset($arr_img[1]);

            unset($arr_img[2]);

            $first_img_src = $_SERVER['DOCUMENT_ROOT'] . "/" . implode('/', $arr_img);

        }


        if (!empty($first_img_src)) {

            $size = @getimagesize($first_img_src);


            if ($set_img_width > 0 && $set_img_height > 0 && $size) {

                if ($size[0] <= $set_img_width && $size[1] <= $set_img_height) {

                    $img_file = $first_img_src;

                } else {

                    $img_file = wp_get_image_editor($first_img_src, $set_img_width, $set_img_height, 'true');

                }

            }


            if (!empty($img_file)) {

                $new_wrp_img_src = substr($img_file, strlen($_SERVER['DOCUMENT_ROOT']));


                if ($rps_image_src = get_post_custom_values('_rps_img_src', $val_p['post_ID'])) {

                    $old_wrp_img_src = $rps_image_src['0'];


                    if ($old_wrp_img_src != $new_wrp_img_src) {

                        $old_img_path = $_SERVER['DOCUMENT_ROOT'] . $old_wrp_img_src;

                        if (!empty($old_wrp_img_src)) {

                            $is_delete = get_post_meta($val_p['post_ID'], '_rps_is_delete_img');

                            if (is_file($old_img_path) && $is_delete[0]) {

                                @unlink($old_img_path);

                            }

                        }

                        update_post_meta($val_p['post_ID'], '_rps_img_src', $new_wrp_img_src);

                    }

                } else {

                    add_post_meta($val_p['post_ID'], '_rps_img_src', $new_wrp_img_src);

                }


                if ($size[0] <= $set_img_width && $size[1] <= $set_img_height) {

                    if (get_post_meta($val_p['post_ID'], '_rps_is_delete_img')) {

                        update_post_meta($val_p['post_ID'], '_rps_is_delete_img', 0);

                    }

                } else {

                    if (get_post_meta($val_p['post_ID'], '_rps_is_delete_img')) {

                        update_post_meta($val_p['post_ID'], '_rps_is_delete_img', 1);

                    } else {

                        add_post_meta($val_p['post_ID'], '_rps_is_delete_img', 1);

                    }

                }

            }

        } else {

            if ($rps_image_src = get_post_custom_values('_rps_img_src', $val_p['post_ID'])) {

                $old_wrp_img_src = $rps_image_src['0'];


                $old_img_path = $_SERVER['DOCUMENT_ROOT'] . $old_wrp_img_src;

                if (!empty($old_wrp_img_src)) {

                    $is_delete = get_post_meta($val_p['post_ID'], '_rps_is_delete_img');

                    if (is_file($old_img_path) && $is_delete[0]) {

                        @unlink($old_img_path);

                        delete_post_meta($val_p['post_ID'], '_rps_img_src', $old_wrp_img_src);

                        delete_post_meta($val_p['post_ID'], '_rps_is_delete_img');

                    }

                }

            }

        }

    }

    return;

}


/** To perform admin page functionality */

function rps_admin()
{

    if (!current_user_can('manage_options'))

        wp_die(__('You do not have sufficient permissions to access this page.', 'TF_EN'));

    include('recent-posts-slider-admin.php');

}


/** Link the needed script */

function rps_add_script()
{

    if (!is_admin()) {

        wp_enqueue_script('jquery');

    }

}


/** To show slider
 * @return output
 */

function rps_show()
{

    $width = '460';

    $height = '470';

    $post_per_slide = '1';

    $total_posts = '8';

    $slider_content = '3';


    $wp_query = $GLOBALS['wp_query'];

    $category = $wp_query->get_queried_object();

    $category_ids = $wp_query->get_queried_object_id();


    $post_include_ids = get_option('rps_post_include_ids');

    $post_exclude_ids = get_option('rps_post_exclude_ids');

    $post_title_color = get_option('rps_post_title_color');

    $post_title_bg_color = get_option('rps_post_title_bg_color');

    $slider_speed = 3;

    $pagination_style = '2';

    $excerpt_words = '15';

    $show_post_date = '1';

    $post_date_text = "";

    $post_date_format = "F jS";


    if (empty($post_date_text)) {

        $post_date_text = "";

    }


    if (empty($post_date_format)) {

        $post_date_format = "F jS";

    }


    if (empty($slider_speed)) {

        $slider_speed = 7000;

    } else {

        $slider_speed = $slider_speed * 1000;

    }

    if (empty($post_title_color)) {

        $post_title_color = "#666";

    } else {

        $post_title_color = "#" . $post_title_color;

    }

    $post_title_bg_color_js = "";

    if (!empty($post_title_bg_color)) {

        $post_title_bg_color_js = "#" . $post_title_bg_color;

    }

    $excerpt_length = '';

    $excerpt_length = abs((($width - 40) / 20) * (($height - 55) / 15));

    /*if ( ($width) > $height)

    $excerpt_length = $excerpt_length - (($excerpt_length * 5) /100);

    else

    $excerpt_length = $excerpt_length - (($excerpt_length * 30) /100);*/


    $post_details = NULL;

    $args = array(

        'numberposts' => $total_posts,

        'offset' => 0,

        'category' => $category_ids,

        'orderby' => 'post_date',

        'order' => 'DESC',

        'include' => $post_include_ids,

        'exclude' => $post_exclude_ids,

        'post_type' => 'post',

        'post_status' => 'publish');

    $recent_posts = get_posts($args);


    if (count($recent_posts) < $total_posts) {

        $total_posts = count($recent_posts);

    }


    if (($total_posts % $post_per_slide) == 0)

        $paging = $total_posts / $post_per_slide;

    else

        $paging = ($total_posts / $post_per_slide) + 1;


    foreach ($recent_posts as $key => $val) {

        $post_details[$key]['post_title'] = $val->post_title;

        $post_details[$key]['post_permalink'] = get_permalink($val->ID);

        $post_details[$key]['post_author'] = $val->post_author;


        if ($slider_content == 2) {

            if (!empty($val->post_excerpt))

                $post_details[$key]['post_excerpt'] = create_excerpt($val->post_excerpt, $excerpt_length, $post_details[$key]['post_permalink'], $excerpt_words);

            else

                $post_details[$key]['post_excerpt'] = create_excerpt($val->post_content, $excerpt_length, $post_details[$key]['post_permalink'], $excerpt_words);

        } elseif ($slider_content == 1) {

            $post_details[$key]['post_first_img'] = get_post_meta($val->ID, '_rps_img_src');

        } elseif ($slider_content == 3) {

            $post_details[$key]['post_first_img'] = wp_get_attachment_image_src(get_post_thumbnail_id($val->ID), 'generalslidesize');

            if (!empty($val->post_excerpt))

                $post_details[$key]['post_excerpt'] = create_excerpt($val->post_excerpt, ($excerpt_length / 2) - 10, $post_details[$key]['post_permalink'], $excerpt_words);

            else

                $post_details[$key]['post_excerpt'] = create_excerpt($val->post_content, ($excerpt_length / 2) - 10, $post_details[$key]['post_permalink'], $excerpt_words);

        }

        if ($show_post_date) {

            $post_details[$key]['post_date'] = date_i18n($post_date_format, strtotime($val->post_date));

        }

    }


    //$upload_dir = wp_upload_dir();

    $output = '<!--Automatic Image Slider w/ CSS & jQuery with some customization-->';

    $output .= '<script type="text/javascript">

	$j = jQuery.noConflict();

	$j(document).ready(function() {';


    //Set Default State of each portfolio piece

    if ($pagination_style != '3') {

        $output .= '$j("#rps .paging").show();';

    }

    $output .= '$j("#rps .paging a:first").addClass("active");

	

	$j(".slide").css({"width" : ' . $width . '});

	$j("#rps .window").css({"width" : ' . ($width) . '});

	$j("#rps .window").css({"height" : ' . $height . '});



	$j("#rps .col").css({"width" : ' . (($width / $post_per_slide) - 2) . '});

	$j("#rps .col").css({"height" : ' . ($height - 4) . '});

	$j("#rps .col p.post-title span").css({"color" : "' . ($post_title_color) . '"});

	$j("#rps .post-date").css({"top" : ' . ($height - 20) . '});

	$j("#rps .post-date").css({"width" : ' . (($width / $post_per_slide) - 12) . '});';


    if (!empty($post_title_bg_color_js)) {

        $output .= '$j("#rps .col p.post-title").css({"background-color" : "' . ($post_title_bg_color_js) . '"});';

    }


    $output .= 'var imageWidth = $j("#rps .window").width();

	//var imageSum = $j("#rps .slider div").size();

	var imageReelWidth = imageWidth * ' . $paging . ';

	

	//Adjust the image reel to its new size

	$j("#rps .slider").css({"width" : imageReelWidth});



	//Paging + Slider Function

	rotate = function(){	

		var triggerID = $active.attr("rel") - 1; //Get number of times to slide

		//alert(triggerID);

		var sliderPosition = triggerID * imageWidth; //Determines the distance the image reel needs to slide



		$j("#rps .paging a").removeClass("active"); 

		$active.addClass("active");

		

		//Slider Animation

		$j("#rps .slider").stop(true,false).animate({ 

			left: -sliderPosition

		}, 500 );

	}; 

	var play;

	//Rotation + Timing Event

	rotateSwitch = function(){		

		play = setInterval(function(){ //Set timer - this will repeat itself every 3 seconds

			$active = $j("#rps .paging a.active").next();

			if ( $active.length === 0) { //If paging reaches the end...

				$active = $j("#rps .paging a:first"); //go back to first

			}

			rotate(); //Trigger the paging and slider function

		}, ' . $slider_speed . ');

	};

	

	rotateSwitch(); //Run function on launch

	

	//On Hover

	$j("#rps .slider a").hover(function() {

		clearInterval(play); //Stop the rotation

	}, function() {

		rotateSwitch(); //Resume rotation

	});	

	

	//On Click

	$j("#rps .paging a").click(function() {	

		$active = $j(this); //Activate the clicked paging

		//Reset Timer

		clearInterval(play); //Stop the rotation

		rotate(); //Trigger rotation immediately

		rotateSwitch(); // Resume rotation

		return false; //Prevent browser jump to link anchor

	});	

});



</script>';


    $saved_data = get_tax_meta($category_ids, 'color_field_id');


    $catname = get_cat_name($category_ids);


    $output .= '<div id="rps">

            <div class="window">	

                <div class="slider">';

    $p = 0;

    for ($i = 1; $i <= $total_posts; $i += $post_per_slide) {

        $output .= '<div class="slide">';

        for ($j = 1; $j <= $post_per_slide; $j++) {


            $output .= '<div class="col">';


            if ($slider_content == 2) {

                $output .= '<p class="slider-content">' . $post_details[$p]['post_excerpt'];

                if ($show_post_date) {

                    $output .= '<div class="post-date">' . $post_date_text . ' ' . $post_details[$p]['post_date'] . '</div>';

                }

                $output .= '</p></div>';

            } elseif ($slider_content == 1) {

                $output .= '<p class="slider-content-img">';

                if (!empty($post_details[$p]['post_first_img']['0'])) {

                    $rps_img_src_path = $post_details[$p]['post_first_img']['0'];

                    if (!empty($rps_img_src_path)) {

                        $output .= '<a href="' . $post_details[$p]['post_permalink'] . '"><center><img src="' . $rps_img_src_path . '" /></center></a>';

                    }

                }

                if ($show_post_date) {

                    $output .= '<div class="post-date">' . $post_date_text . ' ' . $post_details[$p]['post_date'] . '</div>';

                }

                $output .= '</p></div>';


                $feat_image = wp_get_attachment_url(get_post_thumbnail_id($post->ID));


            } elseif ($slider_content == 3) {


                $output .= '<p class="slider-content-both">';

                if (!empty($post_details[$p]['post_first_img']['0']) || !empty($post_details[$p]['post_excerpt'])) {

                    $rps_img_src_path = $post_details[$p]['post_first_img']['0'];


                    $output .= '<a href="' . $post_details[$p]['post_permalink'] . '"><img src="' . $rps_img_src_path . '" align="left" alt="featured" /></a>';


                    $output .= '<div class="featuredtrans"><div class="featuredtext"><a href="' . $post_details[$p]['post_permalink'] . '"><div class="featuredposttitle">' . $post_details[$p]['post_title'] . '</div></a>';

                    $output .= '<p class="post-excerpt">' . $post_details[$p]['post_excerpt'] . '</p>';


                }

                if ($show_post_date) {

                    $author_name = get_the_author_meta('display_name', $post_details[$p]['post_author']);


                    $output .= '



<div class="featuredpostsmeta">' . $post_date_text . ' ' . $post_details[$p]['post_date'] . ' | by&nbsp;<a style="font-weight: 600;

font-style: italic;">' . $author_name . '</a></div>';

                }

                $output .= '</div></div></div>';


            }

            $p++;

            if ($p == $total_posts)

                $p = 0;

        }

        $output .= '<div class="clr"></div>

				</div>';

    }

    $output .= '

                </div>

            </div>

            <div class="paging">';

    for ($p = 1; $p <= $paging; $p++) {

        if ($pagination_style == '2') {

            $output .= '<a href="#" rel="' . $p . '">&bull;</a>';

        } elseif ($pagination_style == '1') {

            $output .= '<a href="#" rel="' . $p . '">' . $p . '</a>';

        } elseif ($pagination_style == '3') {

            $output .= '<a href="#" rel="' . $p . '">&nbsp;</a>';

        }

    }

    $output .= '</div>

        </div><div class="rps-clr"></div>';

    return $output;

}


/** Create post excerpt manually
 * @param $post_content
 * @param $excerpt_length
 * @return post_excerpt or  void
 */

function create_excerpt($post_content, $excerpt_length, $post_permalink, $excerpt_words = NULL)
{

    $keep_excerpt_tags = get_option('rps_keep_excerpt_tags');


    if (!$keep_excerpt_tags) {

        $post_excerpt = strip_shortcodes($post_content);

        $post_excerpt = str_replace(']]>', ']]&gt;', $post_excerpt);

        $post_excerpt = strip_tags($post_excerpt);

    } else {

        $post_excerpt = $post_content;

    }


    $link_text = get_option('rps_link_text');

    if (!empty($link_text)) {

        $more_link = "";

    } else {

        $more_link = "";

    }

    if (!empty($excerpt_words)) {

        if (!empty($post_excerpt)) {

            $words = explode(' ', $post_excerpt, $excerpt_words + 1);

            array_pop($words);

            array_push($words, ' <a href="' . $post_permalink . '">' . $more_link . '</a>');

            $post_excerpt_rps = implode(' ', $words);

            return $post_excerpt_rps;

        } else {

            return;

        }

    } else {

        $post_excerpt_rps = substr($post_excerpt, 0, $excerpt_length);

        if (!empty($post_excerpt_rps)) {

            if (strlen($post_excerpt) > strlen($post_excerpt_rps)) {

                $post_excerpt_rps = substr($post_excerpt_rps, 0, strrpos($post_excerpt_rps, ' '));

            }

            $post_excerpt_rps .= ' <a href="' . $post_permalink . '">' . $more_link . '</a>';

            return $post_excerpt_rps;

        } else {

            return;

        }

    }

}

/**
 * RpsWidget Class
 */
class RpsWidget extends WP_Widget
{

    /** constructor */

    public function __construct()
    {
        parent::__construct(false, $name = 'Recent Posts Slider', array('description' => __('Your blogs recent post using slider', 'TF_EN')));
    }

    /** @see WP_Widget::widget */

    function widget($args, $instance)
    {

        extract($args);

        $title = apply_filters('widget_title', $instance['title']);

        echo $before_widget;

        if ($title)

            echo $before_title . $title . $after_title;

        if (function_exists('rps_show')) echo rps_show();

        echo $after_widget;

    }


    /** @see WP_Widget::update */

    function update($new_instance, $old_instance)
    {

        $instance = $old_instance;

        $instance['title'] = strip_tags($new_instance['title']);

        return $instance;

    }


    /** @see WP_Widget::form */

    function form($instance)
    {

        $title = esc_attr($instance['title']);

        ?>

        <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'TF_EN'); ?> <input
                        class="widefat" id="<?php echo $this->get_field_id('title'); ?>"
                        name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>"/></label>
        </p>

        <?php

    }


} // class RpsWidget

?>