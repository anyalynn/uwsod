<?php 
 
/**
 *
 * Rewrite all old URLS
 *
 */

 add_action( 'generate_rewrite_rules', 'my_insert_rewrite_rules' );

// Adding a new rule
function my_insert_rewrite_rules( $wp_rewrite )
{
	 $wp_rewrite->rules = array(
'conted' => 'index.php?pagename=continuing-dental-education',
'departments/oral-medicine/special-needs-fact-sheets.html' => 'index.php?pagename=oral-medicine/special-needs/patients-with-special-needs',
'departments/oral-medicine/dental-urgent-care-clinic-ducc.html' => 'index.php?pagename=oral-medicine/patient-care/dental-urgent-care-clinic-ducc',
'departments/oral-medicine/patients-with-special-needs.html' => 'index.php?pagename=oral-medicine/special-needs/patients-with-special-needs',
'departments/oral-medicine/decod-clinic.html' => 'index.php?pagename=oral-medicine/patient-care/decod-clinic',
'patient/patient-care-guide.html-0' => 'index.php?pagename=patient',
'sodoc' => 'index.php?pagename=course-catalog',
'patients/index.htm' => 'index.php?pagename=patient',
'sodoc/ORALB/540.htm' => 'index.php?pagename=course-catalog/oral-biology/oralb540',
'case_of_month' => 'index.php?pagename=oral-pathology/case-of-the-month',
'oralpath/forms.html'  => 'index.php?pagename=oral-pathology/getting-started',
'departments/oral-surgery/service-features.html'  => 'index.php?pagename=oral-pathology/getting-started',
'case_of_month/index.php'  => 'index.php?pagename=oral-pathology/case-of-the-month', 
'departments/oral-surgery/case-of-the-month.html'  => 'index.php?pagename=oral-pathology/case-of-the-month',
'oralpath/index.html' => 'index.php?pagename=oral-pathology',
'departments/oral-surgery/oral-pathology.html' => 'index.php?pagename=oral-pathology',
'oralsurgery/oral_pathology.php' => 'index.php?pagename=oral-pathology',
'oralpath' => 'index.php?pagename=oral-pathology',
'smiles' => 'index.php?pagename=orthodontics',
'departments/omed/decod/special_needs_facts.php' => 'index.php?pagename=oral-medicine/special-needs/patients-with-special-needs',
'omed' => 'index.php?pagename=oral-medicine',
'programs/cde/current-course-listings.html' => 'index.php?pagename=continuing-dental-education',
'RIDE/RIDE_index.php' => 'index.php?pagename=ride',
'programs/ride/ride.html' => 'index.php?pagename=ride',
'departments/endodontics/endodontics.html-0'  => 'index.php?pagename=endodontics',
'departments/ohs/oral-health-sciences.html'  => 'index.php?pagename=oral-health-sciences',
'departments/oral-medicine/oral-medicine.html'  => 'index.php?pagename=oral-medicine',
'departments/orthodontics/orthodontics.html'  => 'index.php?pagename=orthodontics',
'departments/periodontics/periodontics.html'  => 'index.php?pagename=periodontics',
'departments/oral-surgery/oral-and-maxillofacial-surgery.html'  => 'index.php?pagename=oralsurgery',
'departments/pediatric/pediatric-dentistry.html'  => 'index.php?pagename=pediatric-dentistry',
'departments/restorative/index.php'  => 'index.php?pagename=restorative-dentistry',
'departments/restorative/restorative-dentistry-prosthodontics.html' => 'index.php?pagename=restorative-dentistry',
'about/location.html'  => 'index.php?pagename=about-us/location-directions',
'about/directions.html'  => 'index.php?pagename=about-us/location-directions',
'about/news-amp-events.html'  => 'index.php?pagename=about-us/news-events',
'prospective-students/prospective-students.html' => 'index.php?pagename=prospective-students',
'course-catalog/course-catalog.html'  => 'index.php?pagename=course-catalog',
'patientcare/patientcare_index.php' => 'index.php?pagename=patient',
'dental-care' => 'index.php?pagename=patient',
'cde' => 'index.php?pagename=continuing-dental-education',
'cde/current-course-listings.html' => 'index.php?pagename=continuing-dental-education',
'programs/policies/policies.html' => 'index.php?pagename=policies',
'programs/health-and-safety/health-and-safety.html' => 'index.php?pagename=health-and-safety',
'programs/compliance/compliance.html' => 'index.php?pagename=compliance',
'education/prospective_students/prospective.php' => 'index.php?pagename=prospective-students',
'health_and_safety' => 'index.php?pagename=health-and-safety',
'prospective-students/prospective-students.html' => 'index.php?pagename=prospective-students',
'prospective-students/admissions.html'  => 'index.php?pagename=prospective-students/admissions',
'alumni/deans-club.html' => 'index.php?pagename=alumni-friends/support-the-school/deans-club',
'alumni/alumni.html-0' => 'index.php?pagename=alumni-friends',
'alumni/alumni.php' => 'index.php?pagename=alumni-friends',
'alumni/magazine.html' => 'index.php?pagename=alumni-friends/magazine',
'programs/research/research.html-0' => 'index.php?pagename=research',
'departments/departments.html-0' => 'index.php?pagename=departments',
'patient/faculty-practice/dental-fears-research-clinic.html' => 'index.php?pagename=dental-care/uw-dentists-faculty-practice/dental-fears-research-clinic',
'oral-and-maxillofacial-surgery' => 'index.php?pagename=/oralsurgery',
'oral-and-maxillofacial-surgery/oms-patient-care/oral-and-maxillofacial-surgery-clinic/' => 'index.php?pagename=/oralsurgery/patient/clinc',
'oral-and-maxillofacial-surgery/oms-patient-care/advanced-general-dentistry' => 'index.php?pagename=/oralsurgery/patient/agd',
'oral-and-maxillofacial-surgery/oms-patient-care/business-office' => 'index.php?pagename=/oralsurgery/patient/business',
'oral-and-maxillofacial-surgery/oms-residency-program' => 'index.php?pagename=/oralsurgery/residency',
'oral-and-maxillofacial-surgery/oms-externship-program' => 'index.php?pagename=/oralsurgery/externship',

	
		) + $wp_rewrite->rules;
}
?>