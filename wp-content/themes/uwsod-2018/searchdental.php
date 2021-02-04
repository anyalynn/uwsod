<?php
/**
  * Template Name: Search
  */
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en" class="no-js">
    <head>
        <title> <?php wp_title(' | ',TRUE,'right'); bloginfo('name'); ?> </title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="google-site-verification" content="vKhEC9RKuK2uDDRXT3uxT5IhbTmuI7J8K_Sr1_oWFwg" />
        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

        <?php wp_head(); ?>

        <!--[if lt IE 9]>
            <script src="<?php bloginfo("template_directory"); ?>/assets/ie/js/html5shiv.js" type="text/javascript"></script>
            <script src="<?php bloginfo("template_directory"); ?>/assets/ie/js/respond.js" type="text/javascript"></script>
            <link rel='stylesheet' href='<?php bloginfo("template_directory"); ?>/assets/ie/css/ie.css' type='text/css' media='all' />
        <![endif]-->

        <?php
        echo get_post_meta( get_the_ID() , 'javascript' , 'true' );
        echo get_post_meta( get_the_ID() , 'css' , 'true' );
        ?>
<style>
	
	#gs_tti50 {
    width: 100% !important;
    padding: 14px 0 13px 25px !important;
    border: none !important;
    font-size: 16px !important;
    font-weight: 400 !important;
    outline: 0 !important;
    background-color: #F5F5F5 !important;
	}
	.gsib_b{
	 background-color: #F5F5F5 !important;
	}
	
	.home .uw-body {
   
    margin-bottom: 80px !important;
}
.gsc-thumbnail-inside{
padding-left: 0px !important;
}
	.uw-body .container{
	margin-bottom:80px !important;	
	}
        .uw-sidebar .widgettitle {
            clear: left;
            font-weight: 900;
            font-size: 22px;
            text-transform: uppercase;
            position: relative;
            padding-bottom: 20px;
        }

        .uw-sidebar .widget_text h2.widgettitle {
            display: block !important;
        }

        .gsc-search-box-tools .gsc-search-box .gsc-input {
            padding-right: 0px !important;
        }

        .gsc-result .gs-title {
            height: 2em !important;
        }

        .gsc-search-button {
            float: left;
            display: block;
            height: 58px;
            width: 55px !important;
            text-indent: -99999px;
            outline: 1px solid #4b2e83;
            overflow: hidden;
            background: url(https://dental.uw.edu/wp-content/themes/uwsod-2018/assets/svg/search.svg) no-repeat center center #4b2e83 !important;
            position: relative;
            border: none !important;
            -webkit-background-size: 10px;
            -moz-background-size: 10px;
            -o-background-size: 10px;
            background-size: 10px;
            right: 0;
            top: 0;
        }


        #gs_id50 {
            height: 50px;
        }


        #___gcse_0 .gsc-search-button input.gsc-search-button,
        #___gcse_0 input.gsc-search-button {
            -webkit-box-sizing: border-box;
            -moz-box-sizing: content-box;
            box-sizing: content-box;
            height: 35px;
            padding: 5px;
            font-size: 15px;
            -webkit-border-top-right-radius: 3px;
            -webkit-border-bottom-right-radius: 3px;
            -moz-border-radius-topright: 3px;
            -moz-border-radius-bottomright: 3px;
            border-top-right-radius: 3px;
            border-bottom-right-radius: 3px;
            -webkit-border-top-left-radius: 0px;
            -webkit-border-bottom-left-radius: 0px;
            -moz-border-radius-topleft: 0px;
            -moz-border-radius-bottomleft: 0px;
            border-top-left-radius: 0px;
            border-bottom-left-radius: 0px;

            border-left: none;
            color: #fff;
            background-color: #4b2e83;
            border: #ccc 1px solid;
        }

        #___gcse_0>.gsc-input {
            height: 35px;
            padding: 0;

            margin-right: 5px;

        }


        #___gcse_0 form.gsc-search-box input.gsc-input {
            padding: 5px 10px;
            background: none repeat scroll 0% 0% #F5F5F5 !important;
            height: 35px;
            font-size: 18px!important;
			font-weight:700 !important;
			text-indent: 0px !important;
        }


        #___gcse_0 .gs-title a {
            font-size: 16px;
        }


        #___gcse_0 .gs-snippet {
            font-size: 14px;
            line-height: 1.2em;
        }


        #___gcse_0 .gsc-url-top,
        #___gcse_0 .gsc-url-bottom {
            display: none;
        }



        #___gcse_0 .gs-webResult {
            border-bottom: 1px solid #eee;
            padding-bottom: 1em;
        }

        #___gcse_0 .gsc-result-info,
        #___gcse_0 .gcsc-branding {
            display: none;

        }
    </style>
   <!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-KC3TVQJ');</script>
<!-- End Google Tag Manager -->
        <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-G23S47FHYX"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-G23S47FHYX');
</script>
    <script>
        (function () {
            var cx = '013161175624235233741:pwunvv-3nuo';
            var gcse = document.createElement('script');
            gcse.type = 'text/javascript';
            gcse.async = true;
            gcse.src = 'https://cse.google.com/cse.js?cx=' + cx;
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(gcse, s);
        })();
    </script>
    <script type="text/javascript">
        function whenLoad() {
            var sea = document.getElementById('gsc-i-id1');
			sea.setAttribute('placeholder','Search For:');
        }
        window.onload = whenLoad;
        </script>
    </head>
    <!--[if lt IE 9]> <body <?php body_class('lt-ie9'); ?>> <![endif]-->
    <!--[if gt IE 8]><!-->
    <body <?php body_class(); ?> >
    <!--<![endif]-->
 <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KC3TVQJ"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

    <div id="uwsearcharea" aria-hidden="true" class="uw-search-bar-container"></div>
   <a id="main-content" href="#main_content" class="screen-reader-shortcut">Skip to main content</a>
  
    <div id="uw-container">
<nav id="quicklinks" aria-label="quick links" aria-hidden="true" class="close"><ul id="big-links"> <li><span class="icon-myuw"></span><a href="https://uwnetid.sharepoint.com/sites/sod" tabindex="0">SOD Intranet</a></li> <li><span class="icon-uwtoday"></span><a href="http://dental.washington.edu/about-us/news-events" tabindex="0">News &amp; Events</a></li> <li><span class="icon-calendar"></span><a href="https://dental.washington.edu/calendar" tabindex="0">Calendar</a></li> <li><span class="icon-directories"></span><a href="http://www.washington.edu/home/peopledir/" tabindex="0">UW Directories</a></li> <li><span class="icon-maps"></span><a href="http://www.washington.edu/maps/" tabindex="0">UW Campus Maps</a></li>      </ul><h3>Helpful Links</h3><ul id="little-links">      <li><span class="false"></span><a href="http://dental.washington.edu/course-catalog" tabindex="0">Course Catalog</a></li> <li><span class="false"></span><a href="http://dental.washington.edu/compliance" tabindex="0">Compliance</a></li> <li><span class="false"></span><a href="http://dental.washington.edu/policies" tabindex="0">Policies</a></li> <li><span class="false"></span><a href="http://dental.washington.edu/health-and-safety" tabindex="0">Health &amp; Safety</a></li> <li><span class="false"></span><a href="http://dental.washington.edu/patient/clinics/nw-oral-facial-surgery" tabindex="0">NW Center for Oral &amp; Facial Surgery</a></li> <li><span class="false"></span><a href="https://www.facebook.com/pages/The-University-of-Washington-School-of-Dentistry/160752227303910" tabindex="0">Facebook</a></li></ul></nav>
    <div id="uw-container-inner">
    <?php get_template_part('thinstrip'); ?>
	<?php echo do_shortcode( '[query id=72]' ); ?>
    <?php require( get_template_directory() . '/inc/template-functions.php' );
          uw_dropdowns(); ?>
<div class="uw-hero-image" <?php if ( get_header_image() !== '' )  { ?> style="background-image:url('<?php echo set_url_scheme( get_header_image() ); ?>');"<?php } ?> ></div>

<div class="container uw-body">

  <div class="row">
   
    <div class="col-md-10 uw-content" role='main'>      
     <?php get_template_part( 'breadcrumbs' ); ?>
      <div id='main_content' class="uw-body-copy" tabindex="-1">
         <?php
          // Start the Loop.
          while ( have_posts() ) : the_post();

            /*
             * Include the post format-specific template for the content. If you want to
             * use this in a child theme, then include a file called called content-___.php
             * (where ___ is the post format) and that will be used instead.
             */
            get_template_part( 'content', 'page' );




            // If comments are open or we have at least one comment, load up the comment template.
            if ( comments_open() || get_comments_number() ) {
              comments_template();
            }

          endwhile;
        ?>
  
  <gcse:search></gcse:search>

    </div>

    </div>       
    </div>

</div>
<?php get_footer(); ?>
