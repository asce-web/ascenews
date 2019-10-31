<?php

/**
 * Plugin Name: Homepage Module-C
 */

add_action('widgets_init', 'fs_cmodule_load');
function fs_cmodule_load()
{
    register_widget('fs_cmodule_widget');
}

class fs_cmodule_widget extends WP_Widget
{
    /**
     * Widget setup.
     */

    function fs_cmodule_widget()
    {
        parent::__construct(
            false, // Base ID
            'Firestarter Homepage Module-C', // Name
            array('description' => 'This widget shows the latest posts from a selected category, built for Homepage Middle Section.',) // Args
        );
    }

    /**
     * How to display the widget on the screen.
     */

    function widget($args, $instance)
    {
        extract($args);

        /* Our variables from the widget settings. */
        $module3cat = $instance['categories'];

        /* Before widget (defined by themes). */
        echo $before_widget;
        ?>

        <?php $module3catbreaking = "cat=$module3cat"; ?>
        <?php query_posts('showposts=1&' . $module3catbreaking); ?>
        <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>

            <?php
            $category_ID = $module3cat;
            $categoryname = get_the_category_by_ID($category_ID);
            $saved_data = get_tax_meta($category_ID, 'color_field_id');
            $catlink = get_category_link($category_ID);
            ?>

            <div class="homecategorytitle" style="background-color:<?php echo $saved_data; ?>;">
                <a href="<?php echo $catlink; ?>"><?php echo $categoryname; ?></a>
            </div><!-- /homecategorytitle -->

            <div class="middlewrapper">
            <div id="homecompactimg">
                <div class="homecompactimgfirst"><?php if (has_post_thumbnail()) {
                        the_post_thumbnail('homecompactthumb');
                    } ?></div><!-- /homecompactimgfirst -->

                <div class="homecompactimgsecond"><?php if (class_exists('MultiPostThumbnails')) : MultiPostThumbnails::the_post_thumbnail(get_post_type(), 'secondary-image', NULL, 'homecompactthumb'); endif; ?></div>
                <!-- /homecompactimgsecond -->

                <a href="<?php the_permalink() ?>"><?php if (has_post_format('quote')) {
                        echo '<img src="' . get_template_directory_uri() . '/images/quotebig.png" alt="watermark" class="watermark" height="64px" width="64px" />';
                    } elseif (has_post_format('gallery')) {
                        echo '<img src="' . get_template_directory_uri() . '/images/gallerybig.png" alt="watermark" class="watermark" height="64px" width="64px" />';
                    } elseif (has_post_format('video')) {
                        echo '<img src="' . get_template_directory_uri() . '/images/videobig.png" alt="watermark" class="watermark" height="64px" width="64px" />';
                    } elseif (has_post_format('audio')) {
                        echo '<img src="' . get_template_directory_uri() . '/images/audiobig.png" alt="watermark" class="watermark" height="64px" width="64px" />';
                    } else {
                        echo '<img src="' . get_template_directory_uri() . '/images/articlebig.png" alt="watermark" class="watermark" height="64px" width="64px" />';
                    } ?></a>

                <?php
                $tf_review_enable = get_post_meta(get_the_ID(), 'tf_review_enable', true);
                $tf_final_score = get_post_meta(get_the_ID(), 'tf_final_score', true);
                $tf_final_percentage = $tf_final_score * 20; ?>

                <?php if ($tf_review_enable == 1) { ?>
                    <div class="compactstarswrapper"><span class="thumbstarunder"><span class="thumbstartop"
                                                                                        style="width:<?php echo $tf_final_percentage; ?>%"></span></span>
                    </div>
                <?php } else { ?>
                <?php } ?>

            </div><!-- /homecompactimg -->
            <div id="homecompacttitle">
                <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
            </div><!-- /homecompacttitle -->

            <div class="homecompactexcerpt"><p><?php echo strip_tags(excerpt(12)); ?></p>
            </div><!-- /homecompactexcerpt -->


            <div class="homepostsinfo">

                <div class="homepostsmeta"><?php the_time(get_option('date_format')); ?> | by&nbsp;</div>
                <!-- /homepostsmeta -->

                <div class="homepostsauthormeta"><?php the_author_posts_link(); ?></div><!-- /homepostsauthormeta -->

                <div class="comment-bubble">
                    <a href="<?php comments_link(); ?>">
                        <?php comments_number('+', '1', '%'); ?>
                    </a>
                </div>

            </div><!-- /homepostsinfo -->

        <?php endwhile; ?>
    <?php endif; ?>
        <div id="homecompactsmalls">

            <?php query_posts($module3catbreaking . '&posts_per_page=3&offset=1'); ?>
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                    <div class="homecompactsmall">
                        <div class="homecompactsmalltitle">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </div><!-- /homecompactsmalltitle -->
                    </div><!-- /homecompactsmall -->
                <?php endwhile; ?>
            <?php endif; ?>
        </div><!-- /homecompactsmalls -->
        <div id="homecompactsubcats">
            <div id="alsoin">
                also in the
                <div id="subcatstitle" style="color:<?php echo $saved_data; ?>;">
                    <a href="<?php echo $catlink; ?>"><?php echo $categoryname; ?></a>
                </div><!-- /subcatstitle -->
                category:
            </div><!-- /alsoin -->
            <?php $args = array('child_of' => $module3cat);
            $categories = get_categories($args);
            foreach ($categories as $category) {
                $saved_data = get_tax_meta($category, 'color_field_id');
                echo '<div id="homesubcatboxes" style="background-color:' . $saved_data . '"><a href="' . get_category_link($category->term_id) . '" title="' . sprintf(__('View all posts in %s', 'TF_EN'), $category->name) . '" ' . '>' . $category->name . '</a></div>';
            } ?>
        </div><!-- /homecompactsubcats -->
        </div><!-- /middlewrapper -->
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
        $instance['categories'] = $new_instance['categories'];
        return $instance;
    }
    function form($instance)
    {
        /* Set up some default widget settings. */
        $instance = wp_parse_args((array)$instance, $defaults); ?>
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
}?>