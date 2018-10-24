<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en" class="no-js">
    <head>
        <title> <?php wp_title(' | ',TRUE,'right'); bloginfo('name'); ?> </title>
        <meta charset="utf-8">
        <meta name="description" content="<?php bloginfo('description', 'display'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">

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

    </head>
    <!--[if lt IE 9]> <body <?php body_class('lt-ie9'); ?>> <![endif]-->
    <!--[if gt IE 8]><!-->
    <body <?php body_class(); ?> >
    <!--<![endif]-->
 <a id="main-content" href="#main_content" class="screen-reader-shortcut">Skip to main content</a>

    <div id="uwsearcharea" aria-hidden="true" class="uw-search-bar-container"></div>
   
  
    <div id="uw-container">
<nav id="quicklinks" aria-label="quick links" aria-hidden="true" class="close"><ul id="big-links"> <li><span class="icon-myuw"></span><a href="https://uwnetid.sharepoint.com/sites/sod" tabindex="0">SOD Intranet</a></li> <li><span class="icon-uwtoday"></span><a href="http://dental.washington.edu/about-us/news-events" tabindex="0">News &amp; Events</a></li> <li><span class="icon-calendar"></span><a href="https://dental.washington.edu/calendar" tabindex="0">Calendar</a></li> <li><span class="icon-directories"></span><a href="http://www.washington.edu/home/peopledir/" tabindex="0">UW Directories</a></li> <li><span class="icon-maps"></span><a href="http://www.washington.edu/maps/" tabindex="0">UW Campus Maps</a></li>      </ul><h3>Helpful Links</h3><ul id="little-links">      <li><span class="false"></span><a href="http://dental.washington.edu/course-catalog" tabindex="0">Course Catalog</a></li> <li><span class="false"></span><a href="http://dental.washington.edu/compliance" tabindex="0">Compliance</a></li> <li><span class="false"></span><a href="http://dental.washington.edu/policies" tabindex="0">Policies</a></li> <li><span class="false"></span><a href="http://dental.washington.edu/health-and-safety" tabindex="0">Health &amp; Safety</a></li> <li><span class="false"></span><a href="http://dental.washington.edu/patient/clinics/nw-oral-facial-surgery" tabindex="0">NW Center for Oral &amp; Facial Surgery</a></li> <li><span class="false"></span><a href="https://www.facebook.com/pages/The-University-of-Washington-School-of-Dentistry/160752227303910" tabindex="0">Facebook</a></li></ul></nav>
    <div id="uw-container-inner">


    <?php get_template_part('thinstrip'); ?>

    <?php require( get_template_directory() . '/inc/template-functions.php' );
          uw_dropdowns(); ?>
