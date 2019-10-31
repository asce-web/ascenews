<?php

/**
 * Plugin Name: Homepage Mini Slider
 */


add_action('widgets_init', 'fs_minislider_load');
function fs_minislider_load()
{
    register_widget('fs_minislider_widget');
}

class fs_minislider_widget extends WP_Widget
{
    /**
     * Widget setup.
     */
    function fs_minislider_widget()
    {
        parent::__construct(
            false, // Base ID
            'Firestarter Homepage Mini Slider', // Name
            array('description' => 'This widget shows a mini slider of a category posts, built for Homepage Left Sidebar.',) // Args
        );
    }

    /**
     * How to display the widget on the screen.
     */

    function widget($args, $instance)
    {

        extract($args);


        /* Our variables from the widget settings. */


        $categories = $instance['categories'];


        ?>


        <?php echo do_shortcode('[parallaxcontentslider categ="' . $categories . '"]'); ?>


        <?php


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

}


?>