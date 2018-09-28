<?php

/**
 * Frontend of the Testimonials Grid
 **/
 $testimonials = $settings->testimonials_form;
 echo $module->quoterGridOpener(); // GRID OPENING TAG
 foreach( $testimonials as $testimonialKey => $testimonial ){
   echo $module->quoterItemOpener( $testimonialKey,$testimonial->quote_emphasis ); // GRID ITEM OPENING TAG
   echo '<blockquote class="bbmustache-testimonial-quote-text">' . $testimonial->quote . '</blockquote>';
   echo $module->quoterDetails( $testimonial->quoter_name,$testimonial->quoter_image_src, $testimonial->quoter_link, $testimonial->quoter_position ); // GRID QUOTER DETAILS
   echo '</div>'; // GRID ITEM CLOSING TAG

 }
 echo '</div>';  // GRID CLOSING TAG
