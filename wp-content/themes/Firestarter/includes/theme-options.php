<?php

/**

 * Initialize the options before anything else.

 */

add_action( 'admin_init', 'custom_theme_options', 1 );



/**

 * Build the custom settings & update OptionTree.

 */

function custom_theme_options() {

  /**

   * Get a copy of the saved settings array. 

   */

  $saved_settings = get_option( 'option_tree_settings', array() );

  

  /**

   * Custom settings array that will eventually be 

   * passes to the OptionTree Settings API Class.

   */


					

  $custom_settings = array( 

    'contextual_help' => array(

      

      'sidebar'       => ''

    ),

    'sections'        => array( 

      array(

        'id'          => 'general',

        'title'       => 'General'

      ),

      array(

        'id'          => 'header',

        'title'       => 'Header Area'

      ),

      array(

        'id'          => 'menupanel',

        'title'       => 'Menu Panel Area'

      ),

      array(

        'id'          => 'feedbox',

        'title'       => 'Feed Boxes Categories'

      ),

      array(

        'id'          => 'sociallinks',

        'title'       => 'Social Media Links'

      ),

      array(

        'id'          => 'authors',

        'title'       => 'All Authors Page'

      ),

      array(

        'id'          => 'customcss',

        'title'       => 'Custom CSS'

      )

    ),

    'settings'        => array(

	array(

        'id'          => 'tf_uniformcolor',

        'label'       => 'Homepage Uniform Color',

        'desc'        => 'Type your uniform color as hex code (e.g.: #5050aa) ',

        'std'         => '#e65a1e',

        'type'        => 'textarea-simple',

        'section'     => 'general',

        'rows'        => '1',

        'post_type'   => '',

        'taxonomy'    => '',

        'class'       => ''

      ), 

array(

        'id'          => 'tf_enable_fixedmenu',

        'label'       => 'Enable Fixed Menu',

        'desc'        => 'Enable fixed menu which will scroll down with the user. ',

        'std'         => '',

        'type'        => 'checkbox',

        'section'     => 'general',

        'rows'        => '',

        'post_type'   => '',

        'taxonomy'    => '',

        'class'       => '',

        'choices'     => array( 

          array(

            'value'       => 'no',

            'label'       => 'Yes',

            'src'         => ''

          )

        ),

      ),

	array(

        'id'          => 'tf_enable_responsive',

        'label'       => 'Enable Responsive Design',

        'desc'        => 'Responsive design means that your website will fit to the device its being shown and will have a slightly different desing for each type of device size. If you dont want this feature, you can go with the traditional one-design-for-all type of layout. ',

        'std'         => '',

        'type'        => 'checkbox',

        'section'     => 'general',

        'rows'        => '',

        'post_type'   => '',

        'taxonomy'    => '',

        'class'       => '',

        'choices'     => array( 

          array(

            'value'       => 'no',

            'label'       => 'Yes',

            'src'         => ''

          )

        ),

      ),

	array(

        'id'          => 'tf_enable_teaser',

        'label'       => 'Enable Post Excerpt Teaser',

        'desc'        => 'Enable the post excerpt teasers on single posts. Editing a post, click on screen options on top right and check post excerpts. Now what you will write here as a post excerpt will be used as a teaser for this post. ',

        'std'         => '',

        'type'        => 'checkbox',

        'section'     => 'general',

        'rows'        => '',

        'post_type'   => '',

        'taxonomy'    => '',

        'class'       => '',

        'choices'     => array( 

          array(

            'value'       => 'no',

            'label'       => 'Yes',

            'src'         => ''

          )

        ),

      ),


	  array(

        'id'          => 'tf_favicon',

        'label'       => 'Favicon Image',

        'desc'        => 'Upload a favicon icon image.',

        'std'         => '',

        'type'        => 'upload',

        'section'     => 'general',

        'rows'        => '',

        'post_type'   => '',

        'taxonomy'    => '',

        'class'       => ''

      ),

	array(

        'id'          => 'tf_google_analytics',

        'label'       => 'Google Analytics Code',

        'desc'        => 'Enter your Google Analytics Code.',

        'std'         => '',

        'type'        => 'textarea-simple',

        'section'     => 'general',

        'rows'        => '7',

        'post_type'   => '',

        'taxonomy'    => '',

        'class'       => ''

      ),

	array(

        'id'          => 'tf_logo_image',

        'label'       => 'Logo Image',

        'desc'        => 'Upload your logo image (optimum height: 90px) (maximum width: 300px)',

        'std'         => '',

        'type'        => 'upload',

        'section'     => 'header',

        'rows'        => '',

        'post_type'   => '',

        'taxonomy'    => '',

        'class'       => ''

      ),

	array(

        'id'          => 'tickertitle',

        'label'       => 'Type Ticker Panel Title',

        'desc'        => 'Ticker panel is under the logo, please type a title e.g. Breaking News or Trending Topics. Do not forget to select your news ticker category under Settings > News Ticker',

        'std'         => 'Trending Topics',

        'type'        => 'textarea-simple',

        'section'     => 'header',

        'rows'        => '1',

        'post_type'   => '',

        'taxonomy'    => '',

        'class'       => ''

      ),

	array(

        'id'          => 'panelwidget2icon',

        'label'       => 'Type First Menu Panel Icon Code',

        'desc'        => 'Menu panel is at the right side of the top menu. Third widget area is reserved for log-in section. Please type the icon code for first widget area (You can find the icon codes at: http://fortawesome.github.io/Font-Awesome/icons/)',

        'std'         => '<i class="icon-info-sign"></i>',

        'type'        => 'textarea-simple',

        'section'     => 'menupanel',

        'rows'        => '1',

        'post_type'   => '',

        'taxonomy'    => '',

        'class'       => ''

      ),

	array(

        'id'          => 'panelwidget2title',

        'label'       => 'Type First Menu Panel Title',

        'desc'        => 'Menu panel is at the right side of the top menu. Third widget area is reserved for log-in section. Please type the title for first widget area',

        'std'         => 'Join Us!',

        'type'        => 'textarea-simple',

        'section'     => 'menupanel',

        'rows'        => '1',

        'post_type'   => '',

        'taxonomy'    => '',

        'class'       => ''

      ),

	array(

        'id'          => 'panelwidget2code',

        'label'       => 'Code of First Menu Panel Content',

        'desc'        => 'Add HTML code and use paragraphs if you will.',

        'std'         => '',

        'type'        => 'textarea-simple',

        'section'     => 'menupanel',

        'rows'        => '10',

        'post_type'   => '',

        'taxonomy'    => '',

        'class'       => ''

      ),

	array(

        'id'          => 'panelwidget1icon',

        'label'       => 'Type Second Menu Panel Icon Code',

        'desc'        => 'Menu panel is at the right side of the top menu. Third widget area is reserved for log-in section. Please type the icon code for second widget area (You can find the icon codes at: http://fortawesome.github.io/Font-Awesome/icons/)',

        'std'         => '<i class="icon-location-arrow"></i>',

        'type'        => 'textarea-simple',

        'section'     => 'menupanel',

        'rows'        => '1',

        'post_type'   => '',

        'taxonomy'    => '',

        'class'       => ''

      ),

	array(

        'id'          => 'panelwidget1title',

        'label'       => 'Type Second Menu Panel Title',

        'desc'        => 'Menu panel is at the right side of the top menu. Third widget area is reserved for log-in section. Please type the title for second widget area',

        'std'         => 'Contact Us!',

        'type'        => 'textarea-simple',

        'section'     => 'menupanel',

        'rows'        => '1',

        'post_type'   => '',

        'taxonomy'    => '',

        'class'       => ''

      ),

	array(

        'id'          => 'panelwidget1code',

        'label'       => 'Code of Second Menu Panel Content',

        'desc'        => 'Add HTML code and use paragraphs if you will.',

        'std'         => '',

        'type'        => 'textarea-simple',

        'section'     => 'menupanel',

        'rows'        => '10',

        'post_type'   => '',

        'taxonomy'    => '',

        'class'       => ''

      ),


	array(

        'id'          => 'tf_enable_feedblock',

        'label'       => 'Enable Feedboxes Block',

        'desc'        => 'Enable the six feedboxes which come before footer, please select these six categories to display the block proparly ',

        'std'         => '',

        'type'        => 'checkbox',

        'section'     => 'feedbox',

        'rows'        => '',

        'post_type'   => '',

        'taxonomy'    => '',

        'class'       => '',

        'choices'     => array( 

          array(

            'value'       => 'no',

            'label'       => 'Yes',

            'src'         => ''

          )

        ),

      ),

      array(

        'id'          => 'feedboxcat1',

        'label'       => 'Select Feedbox 1 Category',

        'desc'        => 'Select the category of feedbox (feedbox section comes before footer)',

        'std'         => '',

        'type'        => 'category-select',

        'section'     => 'feedbox',

        'rows'        => '',

        'post_type'   => '',

        'taxonomy'    => '',

        'class'       => ''

      ),

	  array(

        'id'          => 'feedboxcat2',

        'label'       => 'Select Feedbox 2 Category',

        'desc'        => 'Select the category of feedbox (feedbox section comes before footer)',

        'std'         => '',

        'type'        => 'category-select',

        'section'     => 'feedbox',

        'rows'        => '',

        'post_type'   => '',

        'taxonomy'    => '',

        'class'       => ''

      ),

	  array(

        'id'          => 'feedboxcat3',

        'label'       => 'Select Feedbox 3 Category',

        'desc'        => 'Select the category of feedbox (feedbox section comes before footer)',

        'std'         => '',

        'type'        => 'category-select',

        'section'     => 'feedbox',

        'rows'        => '',

        'post_type'   => '',

        'taxonomy'    => '',

        'class'       => ''

      ),

	  array(

        'id'          => 'feedboxcat4',

        'label'       => 'Select Feedbox 4 Category',

        'desc'        => 'Select the category of feedbox (feedbox section comes before footer)',

        'std'         => '',

        'type'        => 'category-select',

        'section'     => 'feedbox',

        'rows'        => '',

        'post_type'   => '',

        'taxonomy'    => '',

        'class'       => ''

      ),

	  array(

        'id'          => 'feedboxcat5',

        'label'       => 'Select Feedbox 5 Category',

        'desc'        => 'Select the category of feedbox (feedbox section comes before footer)',

        'std'         => '',

        'type'        => 'category-select',

        'section'     => 'feedbox',

        'rows'        => '',

        'post_type'   => '',

        'taxonomy'    => '',

        'class'       => ''

      ),

	  array(

        'id'          => 'feedboxcat6',

        'label'       => 'Select Feedbox 6 Category',

        'desc'        => 'Select the category of feedbox (feedbox section comes before footer)',

        'std'         => '',

        'type'        => 'category-select',

        'section'     => 'feedbox',

        'rows'        => '',

        'post_type'   => '',

        'taxonomy'    => '',

        'class'       => ''

      ),

array(

        'id'          => 'tf_enable_share',

        'label'       => 'Enable Sharethis Buttons On Single Posts',

        'desc'        => 'Enable Sharethis buttons on under the post title on single post.',

        'std'         => '',

        'type'        => 'checkbox',

        'section'     => 'sociallinks',

        'rows'        => '',

        'post_type'   => '',

        'taxonomy'    => '',

        'class'       => '',

        'choices'     => array( 

          array(

            'value'       => 'no',

            'label'       => 'Yes',

            'src'         => ''

          )

        ),

      ),

	array(

        'id'          => 'tf_enable_sharefb',

        'label'       => 'Enable Sharethis Facebook Button',

        'desc'        => 'Enable Sharethis Facebook button on single posts.',

        'std'         => '',

        'type'        => 'checkbox',

        'section'     => 'sociallinks',

        'rows'        => '',

        'post_type'   => '',

        'taxonomy'    => '',

        'class'       => '',

        'choices'     => array( 

          array(

            'value'       => 'no',

            'label'       => 'Yes',

            'src'         => ''

          )

        ),

      ),

	array(

        'id'          => 'tf_enable_sharetw',

        'label'       => 'Enable Sharethis Twitter Button',

        'desc'        => 'Enable Sharethis Twitter button on single posts.',

        'std'         => '',

        'type'        => 'checkbox',

        'section'     => 'sociallinks',

        'rows'        => '',

        'post_type'   => '',

        'taxonomy'    => '',

        'class'       => '',

        'choices'     => array( 

          array(

            'value'       => 'no',

            'label'       => 'Yes',

            'src'         => ''

          )

        ),

      ),

	array(

        'id'          => 'tf_enable_sharema',

        'label'       => 'Enable Sharethis Mail Button',

        'desc'        => 'Enable Sharethis mail button on single posts.',

        'std'         => '',

        'type'        => 'checkbox',

        'section'     => 'sociallinks',

        'rows'        => '',

        'post_type'   => '',

        'taxonomy'    => '',

        'class'       => '',

        'choices'     => array( 

          array(

            'value'       => 'no',

            'label'       => 'Yes',

            'src'         => ''

          )

        ),

      ),

	array(

        'id'          => 'tf_enable_shareli',

        'label'       => 'Enable Sharethis Linkedin Button',

        'desc'        => 'Enable Sharethis Linkedin button on single posts.',

        'std'         => '',

        'type'        => 'checkbox',

        'section'     => 'sociallinks',

        'rows'        => '',

        'post_type'   => '',

        'taxonomy'    => '',

        'class'       => '',

        'choices'     => array( 

          array(

            'value'       => 'no',

            'label'       => 'Yes',

            'src'         => ''

          )

        ),

      ),

	array(

        'id'          => 'tf_enable_sharegp',

        'label'       => 'Enable Sharethis Google+ Button',

        'desc'        => 'Enable Sharethis Google+ button on single posts.',

        'std'         => '',

        'type'        => 'checkbox',

        'section'     => 'sociallinks',

        'rows'        => '',

        'post_type'   => '',

        'taxonomy'    => '',

        'class'       => '',

        'choices'     => array( 

          array(

            'value'       => 'no',

            'label'       => 'Yes',

            'src'         => ''

          )

        ),

      ),

	array(

        'id'          => 'tf_enable_sharepi',

        'label'       => 'Enable Sharethis Pinterest Button',

        'desc'        => 'Enable Sharethis Pinterest button on single posts.',

        'std'         => '',

        'type'        => 'checkbox',

        'section'     => 'sociallinks',

        'rows'        => '',

        'post_type'   => '',

        'taxonomy'    => '',

        'class'       => '',

        'choices'     => array( 

          array(

            'value'       => 'no',

            'label'       => 'Yes',

            'src'         => ''

          )

        ),

      ),

	array(

        'id'          => 'tf_enable_sharesu',

        'label'       => 'Enable Sharethis StumbleUpon Button',

        'desc'        => 'Enable Sharethis StumbleUpon button on single posts.',

        'std'         => '',

        'type'        => 'checkbox',

        'section'     => 'sociallinks',

        'rows'        => '',

        'post_type'   => '',

        'taxonomy'    => '',

        'class'       => '',

        'choices'     => array( 

          array(

            'value'       => 'no',

            'label'       => 'Yes',

            'src'         => ''

          )

        ),

      ),


      array(

        'id'          => 'tf_facebook',

        'label'       => 'Facebook URL',

        'desc'        => 'Paste in your Facebook URL.',

        'std'         => '',

        'type'        => 'textarea-simple',

        'section'     => 'sociallinks',

        'rows'        => '1',

        'post_type'   => '',

        'taxonomy'    => '',

        'class'       => ''

      ),

      array(

        'id'          => 'tf_twitter',

        'label'       => 'Twitter URL',

        'desc'        => 'Paste in your Twitter URL.',

        'std'         => '',

        'type'        => 'textarea-simple',

        'section'     => 'sociallinks',

        'rows'        => '1',

        'post_type'   => '',

        'taxonomy'    => '',

        'class'       => ''

      ),

      array(

        'id'          => 'tf_pinterest',

        'label'       => 'Pinterest URL',

        'desc'        => 'Paste in your Pinterest URL.',

        'std'         => '',

        'type'        => 'textarea-simple',

        'section'     => 'sociallinks',

        'rows'        => '1',

        'post_type'   => '',

        'taxonomy'    => '',

        'class'       => ''

      ),

      array(

        'id'          => 'tf_vimeo',

        'label'       => 'Vimeo URL',

        'desc'        => 'Paste in your Vimeo URL.',

        'std'         => '',

        'type'        => 'textarea-simple',

        'section'     => 'sociallinks',

        'rows'        => '1',

        'post_type'   => '',

        'taxonomy'    => '',

        'class'       => ''

      ),

      array(

        'id'          => 'tf_flickr',

        'label'       => 'Flickr URL',

        'desc'        => 'Paste in your Flickr URL.',

        'std'         => '',

        'type'        => 'textarea-simple',

        'section'     => 'sociallinks',

        'rows'        => '1',

        'post_type'   => '',

        'taxonomy'    => '',

        'class'       => ''

      ),

      array(

        'id'          => 'tf_youtube',

        'label'       => 'YouTube URL',

        'desc'        => 'Paste in your YouTube URL. Empty and save to remove.',

        'std'         => '',

        'type'        => 'textarea-simple',

        'section'     => 'sociallinks',

        'rows'        => '1',

        'post_type'   => '',

        'taxonomy'    => '',

        'class'       => ''

      ),

      array(

        'id'          => 'tf_googleplus',

        'label'       => 'Google+ URL',

        'desc'        => 'Paste in your Google+ URL.',

        'std'         => '',

        'type'        => 'textarea-simple',

        'section'     => 'sociallinks',

        'rows'        => '1',

        'post_type'   => '',

        'taxonomy'    => '',

        'class'       => ''

      ),

      array(

        'id'          => 'tf_mail',

        'label'       => 'Email Adress',

        'desc'        => 'Paste in your Email adress.',

        'std'         => '',

        'type'        => 'textarea-simple',

        'section'     => 'sociallinks',

        'rows'        => '1',

        'post_type'   => '',

        'taxonomy'    => '',

        'class'       => ''

      ),

	array(

        'id'          => 'staffgroup1title',

        'label'       => 'Type First Staff Group Title',

        'desc'        => 'You can have two staff groups on your authors page. Every staff group can contain up to 16 people, so keep in mind that in settings below authors 1-16 belong to first, 17-24 second staff group (If empty staff group will not show up)',

        'std'         => 'Staff Title 1',

        'type'        => 'textarea-simple',

        'section'     => 'authors',

        'rows'        => '1',

        'post_type'   => '',

        'taxonomy'    => '',

        'class'       => ''

      ),

	array(

        'id'          => 'staffgroup2title',

        'label'       => 'Type Second Staff Group Title',

        'desc'        => 'You can have two staff groups on your authors page. Every staff group can contain up to 16 people, so keep in mind that in settings below authors 1-16 belong to first, 17-24 second staff group (If empty staff group will not show up)',

        'std'         => 'Staff Title 2',

        'type'        => 'textarea-simple',

        'section'     => 'authors',

        'rows'        => '1',

        'post_type'   => '',

        'taxonomy'    => '',

        'class'       => ''

      ),

	/*array(

        'id'          => 'staffgroup3title',

        'label'       => 'Type Third Staff Group Title',

        'desc'        => 'You can have three staff groups on your authors page. Every staff group can contain up to 8 people, so keep in mind that in settings below authors 1-8 belong to first, 9-16 to second and 17-24 belong to third staff group (If empty staff grup will not show up)',

        'std'         => 'Staff Title 3',

        'type'        => 'textarea-simple',

        'section'     => 'authors',

        'rows'        => '1',

        'post_type'   => '',

        'taxonomy'    => '',

        'class'       => ''

      ),*/

      array(

        'id'          => 'author1',

        'label'       => 'Author 1',

        'desc'        => 'Enter the ID of the Author 1 to show them up on the authors page.',

        'std'         => '',

        'type'        => 'textarea-simple',

        'section'     => 'authors',

        'rows'        => '1',

        'post_type'   => '',

        'taxonomy'    => '',

        'class'       => ''

      ),

      array(

        'id'          => 'author2',

        'label'       => 'Author 2',

        'desc'        => 'Enter the ID of the Author 2 to show them up on the authors page.',

        'std'         => '',

        'type'        => 'textarea-simple',

        'section'     => 'authors',

        'rows'        => '1',

        'post_type'   => '',

        'taxonomy'    => '',

        'class'       => ''

      ),

      array(

        'id'          => 'author3',

        'label'       => 'Author 3',

        'desc'        => 'Enter the ID of the Author 3 to show them up on the authors page.',

        'std'         => '',

        'type'        => 'textarea-simple',

        'section'     => 'authors',

        'rows'        => '1',

        'post_type'   => '',

        'taxonomy'    => '',

        'class'       => ''

      ),

      array(

        'id'          => 'author4',

        'label'       => 'Author 4',

        'desc'        => 'Enter the ID of the Author 4 to show them up on the authors page.',

        'std'         => '',

        'type'        => 'textarea-simple',

        'section'     => 'authors',

        'rows'        => '1',

        'post_type'   => '',

        'taxonomy'    => '',

        'class'       => ''

      ),

      array(

        'id'          => 'author5',

        'label'       => 'Author 5',

        'desc'        => 'Enter the ID of the Author 5 to show them up on the authors page.',

        'std'         => '',

        'type'        => 'textarea-simple',

        'section'     => 'authors',

        'rows'        => '1',

        'post_type'   => '',

        'taxonomy'    => '',

        'class'       => ''

      ),

      array(

        'id'          => 'author6',

        'label'       => 'Author 6',

        'desc'        => 'Enter the ID of the Author 6 to show them up on the authors page.',

        'std'         => '',

        'type'        => 'textarea-simple',

        'section'     => 'authors',

        'rows'        => '1',

        'post_type'   => '',

        'taxonomy'    => '',

        'class'       => ''

      ),

      array(

        'id'          => 'author7',

        'label'       => 'Author 7',

        'desc'        => 'Enter the ID of the Author 7 to show them up on the authors page.',

        'std'         => '',

        'type'        => 'textarea-simple',

        'section'     => 'authors',

        'rows'        => '1',

        'post_type'   => '',

        'taxonomy'    => '',

        'class'       => ''

      ),

      array(

        'id'          => 'author8',

        'label'       => 'Author 8',

        'desc'        => 'Enter the ID of the Author 8 to show them up on the authors page.',

        'std'         => '',

        'type'        => 'textarea-simple',

        'section'     => 'authors',

        'rows'        => '1',

        'post_type'   => '',

        'taxonomy'    => '',

        'class'       => ''

      ),

      array(

        'id'          => 'author9',

        'label'       => 'Author 9',

        'desc'        => 'Enter the ID of the Author 9 to show them up on the authors page.',

        'std'         => '',

        'type'        => 'textarea-simple',

        'section'     => 'authors',

        'rows'        => '1',

        'post_type'   => '',

        'taxonomy'    => '',

        'class'       => ''

      ),

      array(

        'id'          => 'author10',

        'label'       => 'Author 10',

        'desc'        => 'Enter the ID of the Author 10 to show them up on the authors page.',

        'std'         => '',

        'type'        => 'textarea-simple',

        'section'     => 'authors',

        'rows'        => '1',

        'post_type'   => '',

        'taxonomy'    => '',

        'class'       => ''

      ),

      array(

        'id'          => 'author11',

        'label'       => 'Author 11',

        'desc'        => 'Enter the ID of the Author 11 to show them up on the authors page.',

        'std'         => '',

        'type'        => 'textarea-simple',

        'section'     => 'authors',

        'rows'        => '1',

        'post_type'   => '',

        'taxonomy'    => '',

        'class'       => ''

      ),

      array(

        'id'          => 'author12',

        'label'       => 'Author 12',

        'desc'        => 'Enter the ID of the Author 12 to show them up on the authors page.',

        'std'         => '',

        'type'        => 'textarea-simple',

        'section'     => 'authors',

        'rows'        => '1',

        'post_type'   => '',

        'taxonomy'    => '',

        'class'       => ''

      ),

      array(

        'id'          => 'author13',

        'label'       => 'Author 13',

        'desc'        => 'Enter the ID of the Author 13 to show them up on the authors page.',

        'std'         => '',

        'type'        => 'textarea-simple',

        'section'     => 'authors',

        'rows'        => '1',

        'post_type'   => '',

        'taxonomy'    => '',

        'class'       => ''

      ),

      array(

        'id'          => 'author14',

        'label'       => 'Author 14',

        'desc'        => 'Enter the ID of the Author 14 to show them up on the authors page.',

        'std'         => '',

        'type'        => 'textarea-simple',

        'section'     => 'authors',

        'rows'        => '1',

        'post_type'   => '',

        'taxonomy'    => '',

        'class'       => ''

      ),

      array(

        'id'          => 'author15',

        'label'       => 'Author 15',

        'desc'        => 'Enter the ID of the Author 15 to show them up on the authors page.',

        'std'         => '',

        'type'        => 'textarea-simple',

        'section'     => 'authors',

        'rows'        => '1',

        'post_type'   => '',

        'taxonomy'    => '',

        'class'       => ''

      ),

	array(

        'id'          => 'author16',

        'label'       => 'Author 16',

        'desc'        => 'Enter the ID of the Author 16 to show them up on the authors page.',

        'std'         => '',

        'type'        => 'textarea-simple',

        'section'     => 'authors',

        'rows'        => '1',

        'post_type'   => '',

        'taxonomy'    => '',

        'class'       => ''

      ),

	array(

        'id'          => 'author17',

        'label'       => 'Author 17',

        'desc'        => 'Enter the ID of the Author 17 to show them up on the authors page.',

        'std'         => '',

        'type'        => 'textarea-simple',

        'section'     => 'authors',

        'rows'        => '1',

        'post_type'   => '',

        'taxonomy'    => '',

        'class'       => ''

      ),

	array(

        'id'          => 'author18',

        'label'       => 'Author 18',

        'desc'        => 'Enter the ID of the Author 18 to show them up on the authors page.',

        'std'         => '',

        'type'        => 'textarea-simple',

        'section'     => 'authors',

        'rows'        => '1',

        'post_type'   => '',

        'taxonomy'    => '',

        'class'       => ''

      ),

	array(

        'id'          => 'author19',

        'label'       => 'Author 19',

        'desc'        => 'Enter the ID of the Author 19 to show them up on the authors page.',

        'std'         => '',

        'type'        => 'textarea-simple',

        'section'     => 'authors',

        'rows'        => '1',

        'post_type'   => '',

        'taxonomy'    => '',

        'class'       => ''

      ),

	array(

        'id'          => 'author20',

        'label'       => 'Author 20',

        'desc'        => 'Enter the ID of the Author 20 to show them up on the authors page.',

        'std'         => '',

        'type'        => 'textarea-simple',

        'section'     => 'authors',

        'rows'        => '1',

        'post_type'   => '',

        'taxonomy'    => '',

        'class'       => ''

      ),

	array(

        'id'          => 'author21',

        'label'       => 'Author 21',

        'desc'        => 'Enter the ID of the Author 21 to show them up on the authors page.',

        'std'         => '',

        'type'        => 'textarea-simple',

        'section'     => 'authors',

        'rows'        => '1',

        'post_type'   => '',

        'taxonomy'    => '',

        'class'       => ''

      ),

	array(

        'id'          => 'author22',

        'label'       => 'Author 22',

        'desc'        => 'Enter the ID of the Author 22 to show them up on the authors page.',

        'std'         => '',

        'type'        => 'textarea-simple',

        'section'     => 'authors',

        'rows'        => '1',

        'post_type'   => '',

        'taxonomy'    => '',

        'class'       => ''

      ),

	array(

        'id'          => 'author23',

        'label'       => 'Author 23',

        'desc'        => 'Enter the ID of the Author 23 to show them up on the authors page.',

        'std'         => '',

        'type'        => 'textarea-simple',

        'section'     => 'authors',

        'rows'        => '1',

        'post_type'   => '',

        'taxonomy'    => '',

        'class'       => ''

      ),

	array(

        'id'          => 'author24',

        'label'       => 'Author 24',

        'desc'        => 'Enter the ID of the Author 24 to show them up on the authors page.',

        'std'         => '',

        'type'        => 'textarea-simple',

        'section'     => 'authors',

        'rows'        => '1',

        'post_type'   => '',

        'taxonomy'    => '',

        'class'       => ''

      ),

      array(

        'id'          => 'tf_custom_css',

        'label'       => 'Custom CSS',

        'desc'        => 'Enter your custom CSS.',

        'std'         => '',

        'type'        => 'textarea-simple',

        'section'     => 'customcss',

        'rows'        => '20',

        'post_type'   => '',

        'taxonomy'    => '',

        'class'       => ''

      )

    )

  );

  

  /* allow settings to be filtered before saving */

  $custom_settings = apply_filters( 'option_tree_settings_args', $custom_settings );

  

  /* settings are not the same update the DB */

  if ( $saved_settings !== $custom_settings ) {

    update_option( 'option_tree_settings', $custom_settings ); 

  }

  

}