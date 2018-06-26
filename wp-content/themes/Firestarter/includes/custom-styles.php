<?php



function tf_custom_styles() {



global $wp_query;



?>















<?php 



$theme_options = get_option('option_tree');



$tf_custom_css = get_option_tree('tf_custom_css', $theme_options, false);



$tf_uniformcolor = get_option_tree('tf_uniformcolor', $theme_options, false);



$tf_enable_fixedmenu = get_option_tree('tf_enable_fixedmenu', $theme_options, false);



$tf_enable_responsive = get_option_tree('tf_enable_responsive', $theme_options, false); ?>















	



<?php 



if (is_page()) { } 



else { 



$category = get_the_category();



$category_ID =  $category[0]->cat_ID;



$saved_data = get_tax_meta($category_ID,'color_field_id');



$catlink = get_category_link($category[0]->term_id); 



}



?>











<?php if (is_home()) { $saved_data =  $tf_uniformcolor; } elseif (is_single()) { $category = get_the_category(); $category_ID =  $category[0]->cat_ID; $saved_data = get_tax_meta($category_ID,'color_field_id'); } elseif (is_category()) { $category_ID = $wp_query->get_queried_object_id(); } elseif (is_page()) { $saved_data =  $tf_uniformcolor; } elseif (is_search()) { $saved_data =  $tf_uniformcolor; } elseif (is_archive()) { $saved_data =  $tf_uniformcolor; } ?>























<style>







#mainnav li.home:hover, #mainnav li.home.current-menu-item, #mainnav li.home.current-post-ancestor, #mainnav li.home.current-menu-parent, #mainnav li.home.current-post-parent, a.joinclick:hover, a.loginclick:hover, a.contactclick:hover { background: <?php echo $tf_uniformcolor; ?> !important;  }











.homecategorytitle, .widgettitle, .newscategorytitle, .columnistscategorytitle, #blogcategorytitle, #calendar_wrap tbody > tr > td, .da-arrows span,  #rps .paging a.active, #navborder, div#tf-review-header, div#tf-criteria-final-score, .tagcloud a:hover { background-color: <?php echo $tf_uniformcolor; ?>; }











.widgettitle, .newscategorytitle, .columnistscategorytitle, #blogcategorytitle, #calendar_wrap tbody > tr > td, .da-arrows span,  #rps .paging a.active, #navborder, div#tf-review-header, div#tf-criteria-final-score, .tagcloud a:hover { background-color: #666666 !important; }







#news-ticker, h1 a:hover, h2 a:hover, .feedposttitle a:hover, .feedposttitlelast a:hover, .homecompactsmalltitle a:hover, .footercolumn a:hover, .scrollboxposttitle a:hover, .homepostsauthormeta:hover, .feedposttitletop:hover, .homeonebigsmalltitle:hover, .featuredposttitle:hover, a.page-numbers:hover, .homecategorytitle:hover  { /*color: <?php echo $saved_data; ?>;*/ }







::selection { background-color: <?php echo $tf_uniformcolor; ?>; color: #fff; }



::-moz-selection { background-color: <?php echo $tf_uniformcolor; ?>; color: #fff; }



::selection { background-color: <?php echo $saved_data; ?> !important; color: #fff; }



::-moz-selection { background-color: <?php echo $saved_data; ?> !important; color: #fff; }









<?php if ($tf_enable_fixedmenu !== NULL) { ?>

#nav {

position: fixed !important;

-webkit-backface-visibility: hidden; }



#wrapper {margin-top:50px;}

<?php } ?>





<?php if ($tf_enable_responsive !== NULL) { ?>

/* Screens smaller than smartphones (portrait and landscape) ----------- */



@media screen 



and (min-width : 0px) 



and (max-width : 319px) {



/* Styles */



#footernav {width:320px !important;}



#footerendcopyright { width:315px !important; }



#innerwrapper, #content, #feedblock {width:320px !important;}



#wrapper {
	margin-top: 0px !important;
	overflow: visible!important;
}



#logoblock {width:310px !important;}

#header {
	display: none !important;
}

#feedblock {margin-left: 0px !important; }



#feedboxfirst, .feedbox {padding-right:0px!important; padding-left:4px !important; border:0px!important; height:350px!important; }



#social {float:left !important; }



#social a { border-left: 0px !important; border-right: 1px solid #ccc !important; }



#footblockwrapper {width:230px !important;}



.footercolumn {margin-right:0px !important;}



#tickerpanel {width:308px !important;}



#adlogo, #footercolumn2, #footercolumn3, #footercolumn4, #userpanel, .tickertitle, #footernav, #mainnav, #secondarynav, #homemiddlesection, #homecolumn, #news-ticker, #searchbox, #footerendcopyright, #navborder  {display:none !important;}



.widgettitle {
	width: 100%!important;
}

#logo-area {
	display: block !important;
	background:none no-repeat scroll 0 0 #424141;
}

.featured-post .recent-post-item .featured-cat {
    background: url(images/kordright@2x.png) no-repeat;
    background-size: 100% 40px;
    width: 100%;
    height: 40px;
    float: right;
}

.ascenews-header, .pres-header, .infrastructure-header, .sustainability-header, .promote-the-profession-header, .emerging-engineer-header, .leadership-imperative-header, .technical-notes-header {
	display: none!important;
}

.cat-main-content {
	width: 100%!important;
	overflow: visible!important;
}
.cat-wrapper {
	width: 100%!important;
	margin-left: 0!important;
}

.cat-wrapper .homeregularimg {
	display: none!important;
}

.category-post .sharing {
	float: none!important;
	width: 100%;
}

#archive-content .homecategorytitle {
	width: 100%!important;
}
select.archive-dropdown {
	width: 100%!important;
}

#footer .ftmenu {
	width: 100%!important;
}


}







/* Smartphones (portrait and landscape) ----------- */



@media screen 



and (min-width : 320px) 



and (max-width : 479px) {



/* Styles */



#navborder {margin-top:-1px !important;}

.widgettitle {
	width: 100%!important;
}

#footernav {width:320px !important;}

#footer .ftmenu {
	width: 100%!important;
}



#footerendcopyright { width:315px !important; }



 #content, #feedblock {width:320px !important;}


#innerwrapper {
	width: 100%!important;
}
#content { margin-top:30px !important; /*margin-left: 10px !important;*/} 



#wrapper {
	margin-top: 20px !important;
	width: 100%!important; 
	overflow: visible; !important;}



#logoblock {width:100% !important;}

#headerwrapper {
	display: none !important;
}

#postthumb img, #postpagecontent, #authormiddlesection, .stafftitlewrapper {width:100% !important;overflow: hidden; }

.staffgroup {width:318px !important; }

.authormugshot {

margin-left: 53px !important;
width: 85px !important }

#postpagetitle, #postpagetext {width:260px !important; }

#posttitlesection,#posttitle {width:100% !important; /*margin-top: -20px !important;*/}



#postteaser, #posttitlesocial, #singlepostinfo {width:240px !important; }



#posttitle {font-size: 20px; line-height: 40px;}



#posttext, #authorbox, #posttags, .postborder {width:100% !important; } /*used to be 220px*/

#posttext .sharing {
	width: 100%!important;
}

#postthumb, #postthumb  img {height:162px !important; width:310px !important; display: none;}



#postthumb { margin:0 0 15px 5px !important; } 



#authorbioname, #authorbio, #authorsocial {width:120px !important; }



#authorsocial {height:40px !important; overflow:hidden !important; }



#feedblock {margin-left: 0px !important; }



#feedboxfirst, .feedbox {padding-right:0px!important; padding-left:4px !important; border:0px!important; height:500px!important; }



#social {float:left !important; }



#social a { border-left: 0px !important; border-right: 1px solid #ccc !important; }



#footblockwrapper {width:230px !important;}



.footercolumn {margin-right:0px !important;}



#tickerpanel {width:308px !important;}



#adlogo, #footercolumn2, #footercolumn3, #footercolumn4, #userpanel, .tickertitle, #footernav, #mainnav, #secondarynav, #homecolumn, #news-ticker, #searchbox, #footerendcopyright, #navborder, #posttitlesocial, #comments, #tf-review-wrapper, #authorbio {display:none !important;}


#sidebar {display: block!important; width: 100%!important;}


#logo-area, #mobilnav, #mobilnav ul { display: block !important; padding: 0 !important; width: 310px !important; left:0px !important; }



.select { width: 310px !important; }



#mobilnav ul li { width:286px !important; }

#homemiddlesection {
	display: block !important;
	width: 100%!important;
}

.homepostwrapper {
	width: 100%;
}

#homemiddlesection #posttags {
	width: 100% !important;
}

#featured-post {
	padding: 10px;
}

.featured-post .featuredimg {
	display: none !important;
}

.featured-post .featured-title {
	float: none !important;
	width: 100%;
}

.featured-post .recent-post-item h1 {
	width: 100% !important;
}

.featured-post .homepostsmeta {
	width: 100% !important;
	float: none!important;
}

.featured-post .recent-post-item p {
	width: 100% !important;
}

.featured-post .homepostsauthormeta {
	width: 100% !important;
	float: none !important;
}

.featured-post #posttags {
	width: 100% !important;
}

.featured-post .textwidget {
	width: 100% !important;
	padding-top: 20px !important;
	float: none;
}

.featured-post .addthis_toolbox {
	width: 100% !important;
	padding-top: 20px !important;
}

.homeregularpost {
	width: 100%!important;
}

.homeregularpost .homecategorytitle {
	width: 100%!important;
}

.recent-posts {
	padding: 10px;
}

.main-wrapper {
	width: 100%!important;
	padding: 10px!important;
	float: left;
}

.featured-post .recent-post-item {
	padding: 0!important;
	width: 100%!important;
}

.featured-post .recent-post-item .featured-cat {
	float: none !important;
}

#logo-area {
	display: block !important;
	background:none no-repeat scroll 0 0 #424141;
}

.featured-post .recent-post-item .featured-cat {
    background: url(/asceblog/wp-content/themes/Firestarter/images/kordright@2x.png) no-repeat;
    background-size: 100% 40px;
    width: 100%;
    height: 40px;
    float: right;
}

/*.ascenews-header, .pres-header, .infrastructure-header, .sustainability-header, .promote-the-profession-header, .emerging-engineer-header, .leadership-imperative-header, .technical-notes-header {
	display: none!important;
}*/

.cat-main-content {
	width: 310px!important;
	overflow: visible!important;
}
.cat-wrapper {
	width: 310px!important;
	margin-left: 0!important;
	padding-left: 0!important;
}

.cat-wrapper .homeregularimg, .tagswrapper .homeregularimg {
	display: none!important;
}

.category-post {
	padding: 10px;
}

.category-title {
	padding: 25px 0 10px 5px;
}

.category-post .sharing, .tagswrapper .sharing {
	float: none!important;
	width: 100%;
}

#archive-content .homecategorytitle, .tagswrapper .homecategorytitle {
	width: 100%!important;
}
select.archive-dropdown {
	width: 100%!important;
}

/*.mobile-header, .ascenews.mobile-header {
	display: block!important;
	margin: -40px auto 15px;
    width: 310px;
}*/

.pres-header, .ascenews-header, .sustainability-header, .infrastructure-header, .promote-the-profession-header, .emerging-engineer-header, .leadership-imperative-header, .technical-notes-header {
	background: none!important;
	height: 50px!important;
	margin-bottom: 20px;
	display: none;
}


.mobile-header {
	color: #ffffff;
	height: 30px;
	padding-left: 10px;
	display: block!important;
	margin-top: -20px;
	margin-bottom: 15px;
	font-size: 27px;
}

.mobile-header h1 {
	color:#ffffff;
}

.pres-header > li, .infrastructure-header > li, .sustainability-header > li, .promote-the-profession-header > li, .emerging-engineer-header > li, .leadership-imperative-header > li, .technical-notes-header > li, .ascenews-header > li, .ascenews-header > a {
	display: none!important;
}

.mobile-header > ul > li {

}

.mobile-header > ul > li a, .mobile-header > a {
	color: #ffffff!important;
}

.mobile-header > ul > li a:hover, .mobile-header > a:hover {
	text-decoration: none!important;
}

.arch-wrapper, .tagswrapper {
	width: 100%;
}

.arch-wrapper .homeregularimg {
	display: none;
}

.tagswrapper .homepostsauthormeta {
	margin: 0;
}

.author-posts-wrapper {
	width: 100%!important;
}

.author-posts-wrapper .sharing {
	clear: both;
    float: none;
    padding-right: 0!important;
    width: 100%;
}

.author-posts-wrapper .homecategorytitle {
    background: url("/asceblog/wp-content/themes/Firestarter/images/kordmiddle@2x.png") repeat scroll 0 0 / 320px 40px rgba(0, 0, 0, 0);
    width: 90%;
}

.homeregularpost .homeregularexcerpt {
	width: 100%;
}

#homewrapper {
	width: 100% !important;
	margin: 0 !important;
	/*overflow: auto;*/
}

#fullhomewrapper {
	padding: 10px;
}

#fullhomewrapper,#fullpostpagecontent,#fullpostpagetext {
	width: 100%!important;
}

#fullpostpagetitle {
	font-family: 'futura-pt',sans-serif;
    font-size: 48px;
    font-weight: 400;
    line-height: 52px;
    margin-bottom: 13px;
    padding: 0!important;
    text-align: left;
    width: 100% !important;
}

#postcontent {
	padding: 10px;
	width: 100% !important;
}

#comments {
	display: block !important;
	width: 100%;
}

.comment-author {
	width: inherit;
}

.commenttext {
	width: inherit;
}

textarea#comment {
	width: 100%;
}

#respond {
	width: 100%;
}
}















/* Iphone and larger phones (portrait and landscape) ----------- */



@media screen 



and (min-width : 480px) 



and (max-width : 767px) {



/* Styles */

.main-wrapper {
	width: 100%!important;
	padding: 10px!important;
	float: left;
}

#featured-post {
	padding: 10px;
}
#logo-area {
	display: block !important;
	background:none no-repeat scroll 0 0 #424141;
}

.featuredimg {
	visibility: hidden!important;
}

.featured-post .recent-post-item .featured-cat {
	background: url("/asceblog/wp-content/themes/Firestarter/images/kordright@2x.png") no-repeat scroll 0 0 / 100% 40px rgba(0, 0, 0, 0);
    float: none;
    height: 40px;
    width: 100%;
}

.featured-post .featured-title {
	float: none;
	width: 100%;
}

.featured-post .homepostsmeta {
	float: none;
}

.featured-post .recent-post-item p {
	width: 100%!important;
}

.featured-post .homepostsauthormeta {
	float: none;
}

.featured-post #posttags {
	float: none;
}

.featured-post .textwidget {
	float: none;
	width: 100%;
}

.recent-posts {
	padding: 10px;
}

#wrapper {
	margin-top: 0px !important;
	overflow: visible!important;
}

.widgettitle {
	width: 100%!important;
}

#content { margin-top:30px !important; } 



#postthumb, #postthumb img, #postpagecontent {width:460px !important; }

#postpagetitle, #postpagetext {width:400px !important; }

#posttitlesection,#posttitle {width:100% !important; }



#postteaser, #posttitle, #posttitlesocial, #singlepostinfo {width:380px !important; }



#posttext, #authorbox, #posttags, .postborder {width:360px !important; }



#postthumb, #postthumb img {/*height:233px !important;*/display: none;}

#postthumb {
	margin: 0 0 15px 5px;
}

#authorbioname, #authorbio, #authorsocial {width:260px !important; }



#authorsocial {height:40px !important; overflow:hidden !important; }



#innerwrapper, #content, #header, #logoblock {width:460px !important;}

#headerwrapper {
	display: none !important;
}

#footblockwrapper {width:230px !important;}



.footercolumn {margin-right:0px !important;}



#footernav {width:440px !important; font-size: 10px !important;}



#footernav li { border-left: 0px  !important;}



#tickerpanel {width:458px !important;}



#news-ticker {width:130px !important;}



#adlogo, #feedblock, #footercolumn2, #footercolumn3, #footercolumn4, #userpanel, #social, #homecolumn, #mainnav, #secondarynav, #footerendcopyright, #navborder, #comments, #tf-review-wrapper {display:none !important;}



#homemiddlesection { margin-right: 0px !important; width: 100%!important;}



#sidebar {display: block!important; width: 100%!important;}

#logo-area, #mobilnav, #nmobilnav ul { display: block !important; width: 460px !important; }



.select { width: 460px !important; }



#mobilnav ul li { width:436px !important; }

.featuredimg {
	display: none !important;
}

.homeregularpost {
	width: 100% !important;
}

.homeregularpost .homecategorytitle, .tagswrapper .homecategorytitle {
	width: 100% !important;
}

.homepostwrapper {
	width: 100%;
}


.pres-header .category-title-link li a, .infrastructure-header .category-title-link li a, .sustainability-header .category-title-link li a, .promote-the-profession-header .category-title-link li a, .emerging-engineer-header .category-title-link li a, .leadership-imperative-header .category-title-link li a, .technical-notes-header .category-title-link li a, .ascenews-header a.category-title-link {
	width: 100%!important;
}

/*.pres-header, .ascenews-header, .sustainability-header, .infrastructure-header {
	background: none!important;
}*/

.pres-header, .ascenews-header, .sustainability-header, .infrastructure-header, .promote-the-profession-header, .emerging-engineer-header, .leadership-imperative-header, .technical-notes-header {
	background: none!important;
	height: 50px!important;
	margin-bottom: 20px;
	display: none;
}


.mobile-header {
	color: #ffffff;
	height: 30px;
	padding-left: 10px;
	display: block!important;
	margin-top: -20px;
	margin-bottom: 15px;
	font-size: 27px;
}

.mobile-header h1 {
	color:#ffffff;
}

.pres-header > li, .infrastructure-header > li, .sustainability-header > li, .promote-the-profession-header > li, .emerging-engineer-header > li, .leadership-imperative-header > li, .technical-notes-header > li, .ascenews-header > li, .ascenews-header > a {
	display: none;
}

.mobile-header > ul > li {

}


.arch-wrapper, .tagswrapper {
	width: 100%;
}

.arch-wrapper .homeregularimg {
	display: none;
}

.cat-main-content {
	width: 310px!important;
	overflow: visible!important;
}
.cat-wrapper {
	width: 310px!important;
	margin-left: 0!important;
}

.cat-wrapper .homeregularimg, .tagswrapper .homeregularimg {
	display: none!important;
}

.category-post {
	padding: 10px;
}

.category-title {
	padding: 25px 0 10px 5px;
}

.category-post .sharing, .tagswrapper .sharing {
	float: none!important;
	width: 100%;
}

#archive-content .homecategorytitle {
	width: 100%!important;
}
select.archive-dropdown {
	width: 100%!important;
}

.tagswrapper .homepostsauthormeta {
	margin: 0;
}

.author-posts-wrapper {
	width: 100%!important;
}

.author-posts-wrapper .sharing {
	clear: both;
    padding-right: 0!important;
    float: none;
    width: 100%;
}


.homeregularpost .homeregularexcerpt {
	width: 100%;
}

.author-posts-wrapper .homecategorytitle {
    background: url("/asceblog/wp-content/themes/Firestarter/images/kordmiddle@2x.png") repeat scroll 0 0 / 460px 40px rgba(0, 0, 0, 0);
    width: 90%;
}

.authormugshot {
	margin-left: 53px !important;
	width: 85px !important 
}

.mobile-header > ul > li a, .mobile-header > a {
	color: #ffffff!important;
}

.mobile-header > ul > li a:hover, .mobile-header > a:hover {
	text-decoration: none!important;
}

#posttext .sharing {
	width: 100%!important;
}

#homewrapper {
	width: 100%!important;
	margin: 0 !important;
	/*overflow: auto;*/
}

#fullhomewrapper {
	padding: 10px;
}

#fullhomewrapper,#fullpostpagecontent,#fullpostpagetext {
	width: 100%!important;
}

#fullpostpagetitle {
	font-family: 'futura-pt',sans-serif;
    font-size: 48px;
    font-weight: 400;
    line-height: 52px;
    margin-bottom: 13px;
    padding: 0!important;
    text-align: left;
    width: 100% !important;
}


#postcontent {
	padding: 10px;
	width: 100%!important;
}

#comments {
	display: block !important;
	width: 100%;
}

.comment-author {
	width: inherit;
}

.commenttext {
	width: inherit;
}

textarea#comment {
	width: 100%;
}

#respond {
	width: 100%;
}



}











/* iPads (portrait) ----------- */



@media screen 



and (min-width : 768px) 



and (max-width : 879px) {



/* Styles */



#mainnav { width:740px !important; font-size: 14px !important; }



#secondarynav { width:740px !important; }



#secondarynav li a {font-size: 13px !important;}



#homecolumn {margin-right: 30px !important; }



#authormiddlesection {width:460px !important; }



#footernav {width:720px !important;}



#footerendcopyright { width:705px !important; }



#innerwrapper, #content, #header, #logoblock {width:100% !important; max-width: 980px !important;padding: 0 5px!important;}



#footblockwrapper {width:560px !important;}



.footercolumn {margin-right:50px !important;}



#tickerpanel {width:698px !important;}



#news-ticker {width:370px !important;}



#adlogo, #feedblock, #footercolumn3, #footercolumn4, #userpanel, #social, #footernav {display:none !important;}



#homemiddlesection { margin-right: 0px !important; width: 100%; }

#sidebar {
	display: block !important;
	width: 50%!important;
}

#mainnav li a {background-image:none !important; padding-left: 0px !important;}


.social-media {display: none;}


.author-posts-wrapper .homeregularpost {
	box-shadow: none !important;
}

#posttitlesection,#posttitle {width:100% !important; }

.ascenews-header {
	/*overflow: auto;*/
}

.ascenews-header {
    display: none !important;
}

.pres-header, .infrastructure-header, .promote-the-profession-header, .sustainability-header, .emerging-engineer-header, .leadership-imperative-header, .technical-notes-header {
	display: none !important;
}

.mobile-header {
	display: block !important;
}

.mobile-header h1 {
	color:#ffffff;
}

.cat-main-content, #homewrapper, .asce-news-wrapper .category-title {
	margin-top: 0!important;
}

}











/* iPads (landscape) ----------- */



@media screen 



and (min-width : 880px) 



and (max-width : 1100px)  {



/* Styles */



#mainnav { width:100% !important; font-size: 14px !important; }/*used to be 880px*/



.loginclick, .contactclick, .joinclick {font-size: 15px !important; padding:16px 15px !important; }



#postthumb img, #postpagecontent { /*used to be 460px*/
	width:95% !important;
}

#postthumb {
	width: 60%!important;
}

#postpagetitle, #postpagetext {width:400px !important; }

#homewrapper {
	width: 71.9% !important;
}

#postcontent {
	width: 100%!important;
}


#posttitlesection,#posttitle {width:100% !important; }



#postteaser, #posttitlesocial, #singlepostinfo {width:380px !important; }



#authorbox, #posttags, .postborder {width:360px !important; }

#posttext {
	width: 85% !important;
}

#postthumb, #postthumb img {/*height:233px !important;*/}



#authorbioname, #authorbio, #authorsocial {width:260px !important; }



#authorsocial {height:40px !important; overflow:hidden !important; }



#secondarynav { width:880px !important; }



#secondarynav li a {font-size: 13px !important;}



#footernav {width:860px !important;}



#footerendcopyright { width:845px !important; }



#innerwrapper, #content, #header, #logoblock {width:100% !important;max-width: 980px!important;padding: 0 5px!important;}



#footblockwrapper {width:820px !important;}



.footercolumn {margin-right:43px !important;}



#tickerpanel {width:838px !important;}



#news-ticker {width:240px !important;}



#adlogo, #homecolumn, #feedblock, #footercolumn4, #tf-review-wrapper {display:none !important;}



#homemiddlesection { margin-right: 40px !important; width: 100%;}



#mainnav li a {background-image:none !important; padding-left: 0px !important;}


#sidebar {
	/*clear: both;*/
	width: 25%!important;
}

.cat-main-content {
	width: 74.4%;
}

.cat-wrapper {
	width: 75%;
}





}



<?php } ?>













<?php echo $tf_custom_css; ?>







</style>







<?php 



}



add_action( 'wp_head', 'tf_custom_styles', 100 );



?>