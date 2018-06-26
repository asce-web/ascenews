<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">

<meta http-equiv="X-UA-Compatible" content="IE=Edge"/>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<meta name="description" content="The Civil Engineering Blog and News Network" />
<meta property="og:image:type" content="image/jpeg" />
<meta property="og:image:width" content="400" />
<meta property="og:image:height" content="300" />
<title><?php wp_title("",true); ?><?php if (!is_front_page()) : ?> | <?php endif; ?><?php bloginfo('name'); ?> </title>
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<?php
$theme_options = get_option('option_tree');
$tf_logo_image = get_option_tree('tf_logo_image', $theme_options, false);
$headtwittername = get_option_tree('headtwittername', $theme_options, false);
$tf_favicon = get_option_tree('tf_favicon', $theme_options, false);
$tf_google_analytics = get_option_tree('tf_google_analytics', $theme_options, false);
$tf_facebook = get_option_tree('tf_facebook', $theme_options, false);
$tf_twitter = get_option_tree('tf_twitter', $theme_options, false);
$tf_flickr = get_option_tree('tf_flickr', $theme_options, false);
$tf_pinterest = get_option_tree('tf_pinterest', $theme_options, false);
$tf_vimeo = get_option_tree('tf_vimeo', $theme_options, false);
$tf_youtube = get_option_tree('tf_youtube', $theme_options, false);
$tf_googleplus = get_option_tree('tf_googleplus', $theme_options, false);
$tf_mail = get_option_tree('tf_mail', $theme_options, false);
$tf_enable_headbar = get_option_tree('tf_enable_headbar', $theme_options, false);
$tf_enable_newsletter = get_option_tree('tf_enable_newsletter', $theme_options, false);
$tickertitle = get_option_tree('tickertitle', $theme_options, false);
$panelwidget1title = get_option_tree('panelwidget1title', $theme_options, false);
$panelwidget1code = get_option_tree('panelwidget1code', $theme_options, false);
$panelwidget2title = get_option_tree('panelwidget2title', $theme_options, false);
$panelwidget2code = get_option_tree('panelwidget2code', $theme_options, false);
$panelwidget1icon = get_option_tree('panelwidget1icon', $theme_options, false);
$panelwidget2icon = get_option_tree('panelwidget2icon', $theme_options, false);
?>

<script>
  (function(d) {
    var config = {
      kitId: 'bzz5qci',
      scriptTimeout: 3000,
      async: true
    },
    h=d.documentElement,t=setTimeout(function(){h.className=h.className.replace(/\bwf-loading\b/g,"")+" wf-inactive";},config.scriptTimeout),tk=d.createElement("script"),f=false,s=d.getElementsByTagName("script")[0],a;h.className+=" wf-loading";tk.src='https://use.typekit.net/'+config.kitId+'.js';tk.async=true;tk.onload=tk.onreadystatechange=function(){a=this.readyState;if(f||a&&a!="complete"&&a!="loaded")return;f=true;clearTimeout(t);try{Typekit.load(config)}catch(e){}};s.parentNode.insertBefore(tk,s)
  })(document);
</script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript" src="/wp-content/themes/Firestarter/includes/js/selectivizr-min.js"></script>
<!--[if (gte IE 6)&(lte IE 8)]>
  <script type="text/javascript" src="selectivizr.js"></script>
<![endif]-->
<script type="text/javascript">
    var _elqQ = _elqQ || [];
    _elqQ.push(['elqSetSiteId', '1360']);
    _elqQ.push(['elqTrackPageView']);

    (function () {
        function async_load() {
            var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true;
            s.src = '//img.en25.com/i/elqCfg.min.js';
            var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
        }
        if (window.addEventListener) window.addEventListener('DOMContentLoaded', async_load, false);
        else if (window.attachEvent) window.attachEvent('onload', async_load);
    })();
</script>
<?php
// What account does GA code this come from?

// <script>
//   (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
//   (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
//   m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
//   })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
//
//   ga('create', 'UA-8940040-24', 'auto');
//   ga('require', 'displayfeatures');
//   ga('send', 'pageview');
//
// </script>
?>
<?php if ($tf_favicon !== NULL) { ?><link href="<?php echo $tf_favicon; ?>" rel="shortcut icon"/><?php } ?>

<?php wp_head(); ?>
<link rel="stylesheet" id="iron-style"  href="<?php bloginfo('template_url'); ?>/iron/iron-style.css" type="text/css" />
</head>

<body <?php body_class(); ?>>

<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5249b48913c3ccb7" async="async"></script>




<div id="theme">






<div id="nav">

<div id="mainnavwrapper">

  <div id="mainnav">

    <div id="logo-area">
      <?php #if ($tf_logo_image !== NULL) { ?>
        <div class="logo">
        	<a id="headlogo" href="<?php echo home_url();?>"><img src="/wp-content/uploads/2013/09/asce-news-logo.png" alt="<?php bloginfo('name');?> headlogo" id="asce-logo" /></a>
        </div>
      <?php #} ?>
    </div><!--logoblock-->

    <?php wp_nav_menu(array('theme_location' => 'mainnav', 'container' => '')); ?>

    <?php get_search_form(); ?>

  </div><!-- /mainnav -->

</div>



<div id="mobilnav">

<div id="logo-area">

	<div class="logo">
		<a id="headlogo" class="mobile-head" href="<?php echo home_url();?>"><img src="/wp-content/uploads/2013/09/asce-news-logo.png" alt="<?php bloginfo('name');?> headlogo" /></a>
	</div>

</div><!--logoblock-->

<div class="select"></div>

<div class="mobilpanel">

<?php wp_nav_menu(array('theme_location' => 'mainnav', 'container' => '')); ?>

</div>

</div><!--mobilnav-->





</div>






<div id="wrapper">
<div id="innerwrapper">
<div id="content">


<?php
            foreach((get_the_category()) as $category) {
                //echo $category->cat_name . ' ';
            if($category->cat_ID != '16' && $category->parent == 0) {
            $categoryname = $category->cat_name;
            $category_ID =  $category->cat_ID;

            $saved_data = get_tax_meta($category_ID,'color_field_id');
            }

        }
        ?>
