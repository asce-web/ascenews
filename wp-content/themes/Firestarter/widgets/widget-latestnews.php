<?php

/**
 * Plugin Name: Homepage Latest News
 */


add_action('widgets_init', 'fs_latestnews_load');
function fs_latestnews_load()
{
    register_widget('fs_latestnews_widget');
}

class fs_latestnews_widget extends WP_Widget
{
    /**
     * Widget setup.
     */

    function fs_latestnews_widget()
    {
        parent::__construct(
            false, // Base ID
            'Firestarter Homepage Latest News', // Name
            array('description' => 'This widget shows the latest news from a selected category, built for Homepage Left Sidebar.',) // Args
        );
    }

    /**
     * How to display the widget on the screen.
     */

    function widget($args, $instance)
    {

        extract($args);
        /* Our variables from the widget settings. */

        $title = apply_filters('widget_title', $instance['title']);

        $categories = $instance['categories'];


        /* Before widget (defined by themes). */

        echo $before_widget . $before_title . $title . $after_title;


        ?>


        <div class="leftwrapper">
            <?php $latestnewsbreaking = "cat=$categories"; ?>
            <?php query_posts('showposts=2&' . $latestnewsbreaking); ?>
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>


                    <div class="newslatestitem">

                        <div class="newsposttitle"><h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h1></div><!-- /newsposttitle -->

                        <span class="newspostexcerpt"><?php echo excerpt(17); ?></span>

                        <span class="news_meta_date">Posted on <?php the_time(get_option('date_format')); ?></span>

                        <div class="comment-bubble">
                            <a href="<?php comments_link(); ?>">
                                <?php comments_number('+', '1', '%'); ?>
                            </a>
                        </div>


                    </div><!-- /newslatestitem -->

                <?php endwhile; ?>
            <?php endif; ?>


            <?php query_posts($latestnewsbreaking . '&posts_per_page=1&offset=2'); ?>
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>

                    <div id="newslatestitemlast">

                        <div class="newsposttitle"><h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h1></div><!-- /newsposttitle -->

                        <span class="newspostexcerpt"><?php echo excerpt(17); ?></span>

                        <span class="news_meta_date">Posted on <?php the_time(get_option('date_format')); ?></span>

                        <div class="comment-bubble">
                            <a href="<?php comments_link(); ?>">
                                <?php comments_number('+', '1', '%'); ?>
                            </a>
                        </div>


                    </div><!-- /newslatestitemlast -->

                <?php endwhile; ?>
            <?php endif; ?>

        </div><!-- /leftwrapper -->


        <?php


        /* After widget (defined by themes). */

        echo $after_widget;

    }


    /**
     * Update the widget settings.
     */

    function update($new_instance, $old_instance)
    {

        $instance = $old_instance;


        /* Strip tags for title and name to remove HTML (important for text inputs). */

        $instance['title'] = strip_tags($new_instance['title']);

        $instance['categories'] = $new_instance['categories'];


        return $instance;

    }


    function form($instance)
    {


        /* Set up some default widget settings. */

        $defaults = array('title' => __('Latest News', 'TF_EN'));

        $instance = wp_parse_args((array)$instance, $defaults); ?>


        <!-- Widget Title: Text Input -->

        <p>

            <label for="<?php echo $this->get_field_id('title'); ?>">Title:</label>

            <input id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>"
                   value="<?php echo $instance['title']; ?>" style="width:90%;"/>

        </p>


        <!-- Category -->

        <p>

            <label for="<?php echo $this->get_field_id('categories'); ?>">Select Category:</label>

            <select id="<?php echo $this->get_field_id('categories'); ?>"
                    name="<?php echo $this->get_field_name('categories'); ?>" style="width:100%;">

                <?php $categories = get_categories('hide_empty=0&depth=1&type=post'); ?>

                <?php foreach ($categories as $category) { ?>

                    <option value='<?php echo $category->term_id; ?>' <?php if ($category->term_id == $instance['categories']) echo 'selected="selected"'; ?>><?php echo $category->cat_name; ?></option>

                <?php } ?>

            </select>

        </p>


        <?php

    }

}


?>