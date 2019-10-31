<?php
/*
Plugin Name: Advanced Recent Posts Widget
Plugin URI: http://www.safiweb.co.ke/plugins/safiweb-recent-posts-widget
Description: Adds a widget that can display recent posts from multiple categories or from custom post types.
Version: 1.1a
Author: Anthony Webbs
Author URI: http://www.safiweb.co.ke
*/

/*
    Copyright 2011  Safiweb Interactive  (email : anthony@safiweb.co.ke/ukwelister@gmail.com)
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


include_once('includes/advanced-recent-posts-widget-display.php');

add_action('widgets_init', 'advanced_recent_posts_widget');
function advanced_recent_posts_widget()
{
    register_widget('advanced_recent_posts_widget');
}

class advanced_recent_posts_widget extends WP_Widget
{
    /** constructor */
    function advanced_recent_posts_widget()
    {
        $widget_ops = array(
            'classname' => 'advanced_recent_posts_widget',
            'description' => __('Shows recent posts / custom post types. Includes advanced options.', 'TF_EN')
        );
        parent::__construct('advanced-recent-posts', __('Advanced Recent Posts', 'TF_EN'), $widget_ops);
    }
    function widget($args, $instance)
    {
        extract($args);
        $title = apply_filters('widget_title', empty($instance['title']) ? 'Recent Posts' : $instance['title'], $instance, $this->id_base);
        if (!$number = absint($instance['number'])) $number = 5;
        if (!$excerpt_length = absint($instance['excerpt_length'])) $excerpt_length = 5;
        if (!$cats = $instance["cats"]) $cats = '';
        if (!$show_type = $instance["show_type"]) $show_type = 'post';
        if (!$thumb_h = absint($instance["thumb_h"])) $thumb_h = 300;
        if (!$thumb_w = absint($instance["thumb_w"])) $thumb_w = 490;
        if (!$excerpt_readmore = $instance["excerpt_readmore"]) $excerpt_readmore = 'Read more &rarr;';
        $default_sort_orders = array('date', 'title', 'comment_count', 'rand');
        if (in_array($instance['sort_by'], $default_sort_orders)) {
            $sort_by = $instance['sort_by'];
            $sort_order = (bool)$instance['asc_sort_order'] ? 'ASC' : 'DESC';
        } else {
            // by default, display latest first
            $sort_by = 'date';
            $sort_order = 'DESC';
        }

        //Excerpt more filter
        function fs_excerpt_more($more) {
            global $post;
            return " ";
        }
        add_filter('excerpt_more', 'fs_excerpt_more');

        // Excerpt length filter
        function fs_excerpt_length($length) {
            return " ";
        }
        if ($instance["excerpt_length"] > 0) add_filter('excerpt_length', 'fs_excerpt_length');

        //$new_excerpt_length = create_function('$length', "return " . $excerpt_length . ";");

        // post info array.
        $my_args = array(
            'showposts' => $number,
            'category__in' => $cats,
            'orderby' => $sort_by,
            'order' => $sort_order,
            'post_type' => $show_type
        );
        $adv_recent_posts = null;
        $adv_recent_posts = new WP_Query($my_args);
        echo $before_widget;
        // Widget title
        echo $before_title;
        echo $instance["title"];
        echo $after_title;
        // Post list
        echo "<div>\n";
        while ($adv_recent_posts->have_posts()) {
            $adv_recent_posts->the_post();
            ?>
            <?php
            foreach ((get_the_category()) as $category) {
                //echo $category->cat_name . ' ';
                if ($category->cat_ID != '16' && $category->parent == 0) {
                    $categoryname = $category->cat_name;
                    $category_ID = $category->cat_ID;
                    $saved_data = get_tax_meta($category_ID, 'color_field_id');
                }
            }
            ?>
            <div class="recent-post-item">
            <div class="post-entry">
            <!-- <div class="featured-cat" style="background-color:<?php echo $saved_data; ?>;"><h1><?php echo $categoryname; ?></h1></div> -->
            <?php if (has_post_thumbnail()) { ?>
                <div class="featuredimg">
                    <?php the_post_thumbnail('featured-thumb'); ?>
                </div><!-- /featuredimg -->
            <?php } ?>
            <div class="featured-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
            <div class="homepostsmeta"><?php the_time(get_option('date_format')); ?> </div><!-- /homepostsmeta -->
            <?php if ($instance['date']) : ?>
            <?php endif; ?>
            <?php if ($instance['excerpt'] || $instance["thumb"]) : ?>
                <?php if ($instance['excerpt']) : ?>
                    <?php if ($instance['readmore']) : $linkmore = ' <a href="' . get_permalink() . '" class="more-link">' . $excerpt_readmore . '</a>'; else: $linkmore = ''; endif; ?>
                    <p><?php echo get_the_excerpt(); ?> </p>
                    <p class="readmorelink"> <?php echo $linkmore; ?></p>

                    <div class="homepostsauthormeta">
                        BY <?php the_author_posts_link(); ?></div><!-- /homepostsauthormeta -->

                    <?php /*
                        <div class="sharing">
                            <div class="sharing-header">Share</div>
                            <!-- Go to www.addthis.com/dashboard to customize your tools -->
                            <div class="addthis_sharing_toolbox" data-url="<?php the_permalink(); ?>" data-title="<?php the_title_attribute(); ?>"></div>
                        </div>
                        <div id="posttags"> */
                    ?>
                    <?php /* the_tags( '<p>','','</p>'); */ ?>
                    </div>
                <?php endif; ?>
                </div>
            <?php endif; ?>
            <?php if ($instance['comment_num']) : ?>
                <p class="comment-num">(<?php comments_number(); ?>)</p>
            <?php endif; ?>
            </div>
            <?php
        }
        wp_reset_query();
        echo "</div>\n";
        echo $after_widget;
        remove_filter('excerpt_length', 'fs_excerpt_length');
        remove_filter('excerpt_more', 'fs_excerpt_more');
    }
    function update($new_instance, $old_instance)
    {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['cats'] = $new_instance['cats'];
        $instance['sort_by'] = esc_attr($new_instance['sort_by']);
        $instance['show_type'] = esc_attr($new_instance['show_type']);
        $instance['asc_sort_order'] = esc_attr($new_instance['asc_sort_order']);
        $instance['number'] = absint($new_instance['number']);
        $instance["thumb"] = esc_attr($new_instance['thumb']);
        $instance['date'] = esc_attr($new_instance['date']);
        $instance['comment_num'] = esc_attr($new_instance['comment_num']);
        $instance["excerpt_length"] = absint($new_instance["excerpt_length"]);
        $instance["excerpt_readmore"] = esc_attr($new_instance["excerpt_readmore"]);
        $instance["thumb_w"] = absint($new_instance["thumb_w"]);
        $instance["thumb_h"] = absint($new_instance["thumb_h"]);
        $instance["excerpt"] = esc_attr($new_instance["excerpt"]);
        $instance["readmore"] = esc_attr($new_instance["readmore"]);
        return $instance;
    }
    function form($instance)
    {
        $title = isset($instance['title']) ? esc_attr($instance['title']) : 'Recent Posts';
        $number = isset($instance['number']) ? absint($instance['number']) : 5;
        $thumb_h = isset($instance['thumb_h']) ? absint($instance['thumb_h']) : 300;
        $thumb_w = isset($instance['thumb_w']) ? absint($instance['thumb_w']) : 490;
        $show_type = isset($instance['show_type']) ? esc_attr($instance['show_type']) : 'post';
        $excerpt_length = isset($instance['excerpt_length']) ? absint($instance['excerpt_length']) : 5;
        $excerpt_readmore = isset($instance['excerpt_readmore']) ? esc_attr($instance['excerpt_readmore']) : 'Read more &rarr;';
        ?>
        <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'TF_EN'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>"
                   name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>"/></p>
        <p>
            <label for="<?php echo $this->get_field_id("sort_by"); ?>">
                <?php _e('Sort by', 'TF_EN'); ?>:
                <select id="<?php echo $this->get_field_id("sort_by"); ?>"
                        name="<?php echo $this->get_field_name("sort_by"); ?>">
                    <option value="date"<?php selected($instance["sort_by"], "date"); ?>>Date</option>
                    <option value="title"<?php selected($instance["sort_by"], "title"); ?>>Title</option>
                    <option value="comment_count"<?php selected($instance["sort_by"], "comment_count"); ?>>Number of
                        comments
                    </option>
                    <option value="rand"<?php selected($instance["sort_by"], "rand"); ?>>Random</option>
                </select>
            </label>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id("asc_sort_order"); ?>">
                <input type="checkbox" class="checkbox"
                       id="<?php echo $this->get_field_id("asc_sort_order"); ?>"
                       name="<?php echo $this->get_field_name("asc_sort_order"); ?>"
                    <?php checked((bool)$instance["asc_sort_order"], true); ?> />
                <?php _e('Reverse sort order (ascending)', 'TF_EN'); ?>
            </label>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id("excerpt"); ?>">
                <input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id("excerpt"); ?>"
                       name="<?php echo $this->get_field_name("excerpt"); ?>"<?php checked((bool)$instance["excerpt"], true); ?> />
                <?php _e('Include post excerpt', 'TF_EN'); ?>
            </label>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id("excerpt_length"); ?>">
                <?php _e('Excerpt length (in words):', 'TF_EN'); ?>
            </label>
            <input style="text-align: center;" type="text" id="<?php echo $this->get_field_id("excerpt_length"); ?>"
                   name="<?php echo $this->get_field_name("excerpt_length"); ?>" value="<?php echo $excerpt_length; ?>"
                   size="3"/>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id("readmore"); ?>">
                <input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id("readmore"); ?>"
                       name="<?php echo $this->get_field_name("readmore"); ?>"<?php checked((bool)$instance["readmore"], true); ?> />
                <?php _e('Include read more link in excerpt', 'TF_EN'); ?>
            </label>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id("excerpt_readmore"); ?>">
                <?php _e('Excerpt read more text:', 'TF_EN'); ?>
            </label>
            <input style="text-align: center;" type="text" id="<?php echo $this->get_field_id("excerpt_readmore"); ?>"
                   name="<?php echo $this->get_field_name("excerpt_readmore"); ?>"
                   value="<?php echo $excerpt_readmore; ?>" size="10"/>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id("date"); ?>">
                <input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id("date"); ?>"
                       name="<?php echo $this->get_field_name("date"); ?>"<?php checked((bool)$instance["date"], true); ?> />
                <?php _e('Include post date', 'TF_EN'); ?>
            </label>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id("comment_num"); ?>">
                <input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id("comment_num"); ?>"
                       name="<?php echo $this->get_field_name("comment_num"); ?>"<?php checked((bool)$instance["comment_num"], true); ?> />
                <?php _e('Show number of comments', 'TF_EN'); ?>
            </label>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('number'); ?>"><?php _e('Number of posts to show:', 'TF_EN'); ?></label>
            <input id="<?php echo $this->get_field_id('number'); ?>"
                   name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>"
                   size="3"/></p>
        <?php if (function_exists('the_post_thumbnail') && current_theme_supports("post-thumbnails")) : ?>
        <p>
            <label for="<?php echo $this->get_field_id("thumb"); ?>">
                <input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id("thumb"); ?>"
                       name="<?php echo $this->get_field_name("thumb"); ?>"<?php checked((bool)$instance["thumb"], true); ?> />
                <?php _e('Show post thumbnail', 'TF_EN'); ?>
            </label>
        </p>
        <p>
            <label>
                <?php _e('Thumbnail dimensions', 'TF_EN'); ?>:<br/>
                <label for="<?php echo $this->get_field_id("thumb_w"); ?>">
                    W: <input class="widefat" style="width:40%;" type="text"
                              id="<?php echo $this->get_field_id("thumb_w"); ?>"
                              name="<?php echo $this->get_field_name("thumb_w"); ?>" value="<?php echo $thumb_w; ?>"/>
                </label>
                <label for="<?php echo $this->get_field_id("thumb_h"); ?>">
                    H: <input class="widefat" style="width:40%;" type="text"
                              id="<?php echo $this->get_field_id("thumb_h"); ?>"
                              name="<?php echo $this->get_field_name("thumb_h"); ?>" value="<?php echo $thumb_h; ?>"/>
                </label>
            </label>
        </p>
    <?php endif; ?>
        <p>
            <label for="<?php echo $this->get_field_id('cats'); ?>"><?php _e('Categories:', 'TF_EN'); ?>
                <?php
                $categories = get_categories('hide_empty=0');
                echo "<br/>";
                foreach ($categories as $cat) {
                    $option = '<input type="checkbox" id="' . $this->get_field_id('cats') . '[]" name="' . $this->get_field_name('cats') . '[]"';
                    if (is_array($instance['cats'])) {
                        foreach ($instance['cats'] as $cats) {
                            if ($cats == $cat->term_id) {
                                $option = $option . ' checked="checked"';
                            }
                        }
                    }
                    $option .= ' value="' . $cat->term_id . '" />';
                    $option .= $cat->cat_name;
                    $option .= '<br />';
                    echo $option;
                }
                ?>
            </label>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('show_type'); ?>"><?php _e('Show Post Type:', 'TF_EN'); ?>
                <select class="widefat" id="<?php echo $this->get_field_id('show_type'); ?>"
                        name="<?php echo $this->get_field_name('show_type'); ?>">
                    <?php
                    global $wp_post_types;
                    foreach ($wp_post_types as $k => $sa) {
                        if ($sa->exclude_from_search) continue;
                        echo '<option value="' . $k . '"' . selected($k, $show_type, true) . '>' . $sa->labels->name . '</option>';
                    }
                    ?>
                </select>
            </label>
        </p>
        <?php
    }
}
?>