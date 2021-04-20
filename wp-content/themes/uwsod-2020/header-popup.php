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

<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-KC3TVQJ');</script>
<!-- End Google Tag Manager -->

    <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-25627765-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-25627765-1');
  gtag('config', 'G-G23S47FHYX');
</script>
    <style>

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 15% auto; /* 15% from the top and centered */
  padding: 20px;
  border: 1px solid #888;
  width: 80%; /* Could be more or less, depending on screen size */
}

/* The Close Button */
.close {
  color: #aaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: black;
  text-decoration: none;
  cursor: pointer;
}
</style>
<script>
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
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
