 jQuery(document).ready(function($){

      var $container = $('#isotope');
    
      $container.imagesLoaded( function(){
        $container.isotope({
          itemSelector : '.photo'
        });
      });
	   $container.isotope({
        itemSelector : '.element'
      });
      
      
      var $optionSets = $('#options .option-set'),
          $optionLinks = $optionSets.find('a');

      $optionLinks.click(function(){
        var $this = $(this);
        // don't proceed if already selected
        if ( $this.hasClass('selected') ) {
          return false;
        }
        var $optionSet = $this.parents('.option-set');
        $optionSet.find('.selected').removeClass('selected');
        $this.addClass('selected');
  
        // make option object dynamically, i.e. { filter: '.my-filter-class' }
        var options = {},
            key = $optionSet.attr('data-option-key'),
            value = $this.attr('data-option-value');
			alert(value);
        // parse 'false' as false boolean
        value = value === 'false' ? false : value;
        options[ key ] = value;
        if ( key === 'layoutMode' && typeof changeLayoutMode === 'function' ) {
          // changes in layout modes need extra logic
          changeLayoutMode( $this, options )
        } else {
          // otherwise, apply new options
          $container.isotope( options );
        }
        
        return false;
      });
  
    
 })

jQuery('document').ready(function() {
    function filter_portfolio() {
        var target = '';
      
     var optionSelected = $(this).find("option:selected");
     target  = optionSelected.val();
     
        
        if(target == '') target = '.all';
        var $items_container = jQuery("#isotope");      
        $items_container.isotope({
            itemSelector : ".element",
			filter: target
        });
    }
    jQuery('#filters').on('change', function() {
        filter_portfolio();
    });
}) 