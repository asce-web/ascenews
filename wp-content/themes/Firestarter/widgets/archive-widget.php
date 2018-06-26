<?php 
/*
 * Archive Widget
 * 
 */

class cb_archive_widget extends WP_Widget {

    /*
     * Register widget with WordPress.
     */
    function cb_archive_widget() {
        parent::WP_Widget(
            false, // Base ID
            'Custom Archive Widget', // Name
            array( 'description' =>  'Use this widget to place Specific Archives depending on category selection', ) // Args
        );
    }

    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget( $args, $instance ) {
        extract( $args );
        global $cat;
        $cat = $instance['arc_cat'];
        $catID = get_cat_ID( $cat );
        $arc_title = $instance['arc_title'];

        //add the archive filters
        add_filter('getarchives_where','ik_custom_archives_where',10,3);
        add_filter('getarchives_join','ik_custom_archives_join',10,3);

        //add custom SQL to the archives widget JOIN clause
        function ik_custom_archives_join($sql){
            global $wpdb;

            $sql = $sql . "LEFT JOIN $wpdb->term_relationships ON($wpdb->posts.ID = $wpdb->term_relationships.object_id) ";
            $sql = $sql . "LEFT JOIN $wpdb->term_taxonomy ON($wpdb->term_relationships.term_taxonomy_id = $wpdb->term_taxonomy.term_taxonomy_id) ";

            return $sql;
        }

        //add custom SQL to the archives widget WHERE clause
        function ik_custom_archives_where($sql){

            global $wpdb;
            global $cat;
            $catID = get_cat_ID( $cat );

            $sql = "WHERE post_type = 'post' AND post_status = 'publish' ";
            $sql = $sql . "AND $wpdb->term_taxonomy.term_id IN ($catID)";

            return $sql;
        }


        $checked = $instance['arc_count'];
        if ($checked == 'on') { $counter_arc = 1; } else { $counter_arc = 0; };
        $args = array(
                'show_post_count' => $counter_arc,
            );
        ?>

        <!-- Display HTML -->
        <?php
        echo $before_widget;
        echo $before_title . $arc_title . $after_title;
        ?>
        <ul>
            <?php wp_get_archives($args); ?>
        </ul>
        <?php 
        echo $after_widget;
    }

    /**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param array $new_instance Values just sent to be saved.
     * @param array $old_instance Previously saved values from database.
     *
     * @return array Updated safe values to be saved.
     */
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance = $old_instance;
        $instance['arc_title'] = strip_tags( $new_instance['arc_title'] );
        $instance['arc_cat'] = strip_tags( $new_instance['arc_cat'] );
        $instance['arc_count'] = strip_tags( $new_instance['arc_count'] );
        return $instance;
    }

    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param array $instance Previously saved values from database.
     */
    public function form( $instance ) {
        $arc_title = $instance['arc_title'];
        $arc_checked = $instance['arc_count']; ?>
        <label for="<?php echo $this->get_field_id('arc_title'); ?>"><?php _e( 'Add Title:' ); ?></label><br/> 
        <input type="text" value="<?php echo attribute_escape($arc_title); ?>" name="<?php echo $this->get_field_name('arc_title'); ?>" id="<?php echo $this->get_field_id('arc_title'); ?>" /><br/>
        <label for="<?php echo $this->get_field_id('arc_cat'); ?>"><?php _e( 'Choose Category:' ); ?></label><br/> 
        <?php 

            $args = array(
                'style'              => 'list',
                'show_count'         => 1,
                'depth'              => 1,
                'taxonomy'           => 'category',
                'walker'             => null
            );
            $test = get_categories( $args );
            ?>
            <select id="<?php echo $this->get_field_id('arc_cat'); ?>" name="<?php echo $this->get_field_name('arc_cat'); ?>">
            <?php
            foreach( $test as $category) {
                if ($category->category_parent == 0) { ?>
                    <option value="<?php echo $category->name?>" <?php if($category->name == $instance['arc_cat']) echo ' selected="selected"'; ?>><?php echo $category->name ?></option>
        <?php   }
        }
        ?>
        </select><br/>
        <label for="<?php echo $this->get_field_id('arc_count'); ?>"><?php _e( 'Show Count:' ); ?></label><br/>
        <input type="checkbox" <?php checked( (bool) $arc_checked, true ); ?> name="<?php echo $this->get_field_name('arc_count'); ?>" id="<?php echo $this->get_field_id('arc_count'); ?>"/>

        <?php 
    }
}// register widget

add_action( 'widgets_init', create_function('', 'return register_widget("cb_archive_widget");') );?>