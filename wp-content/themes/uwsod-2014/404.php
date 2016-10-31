<?php get_header(); ?>

<?php get_template_part( 'header', 'image' ); ?>

<div class="container uw-body">

    <div class="row">
  
        <div class="col-md-12 uw-content" role='main'>
        <?php uw_site_title(); ?>
        <?php get_template_part( 'breadcrumbs' ); ?>

        <div id='main_content' class="uw-body-copy" tabindex="-1">
            <?php get_search_form(); ?>
            <h3>Not what you were expecting?</h3>
              
                <ul>
                   <li><a href="//dental.washington.edu">UW School of Dentistry home page</a></li>
                   <li><a href="//dental.washington.edu/patient/">Patient Care</a></li>
                   <li><a href="//dental.washington.edu/students/dds-admissions/">Admissions</a></li>
                   <li><a href="//dental.washington.edu/course-catalog/">Course Catalog</a></li>
                   <li><a href="//dental.washington.edu/continuing-dental-education/">Continuing Dental Education</a></li>
                   <li><a href="//dental.washington.edu/about-us/location-directions/">Location and Directions</a></li>
                   <li><a href="//dental.washington.edu/oral-pathology/case-of-the-month/">Oral Pathology Case of the Month</a></li>
                   <li><a href="//dental.washington.edu/oral-medicine/special-needs/patients-with-special-needs/">Special Needs Fact Sheets</a></li>
                   <li><a href="//dental.washington.edu/about-us/news-events/">News &amp; Events</a></li>
             <li><a href="//dental.washington.edu/departments/">Departments</a></li>
                   <li><a href="https://dental.washington.edu/sitemap/">View our sitemap</a></li>
            </ul>
         </div>
      </div>
   </div>
</div>    

<?php get_footer(); ?>
