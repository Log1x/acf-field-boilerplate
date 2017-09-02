(function($){
	function initialize_field($el) {
		// $el.doStuff();
	}

	if (typeof acf.add_action !== 'undefined') {

		/*
		*  Ready Append
		*
		*  These are 2 events which are fired during the page load
		*  ready = on page load similar to $(document).ready()
		*  append = on new DOM elements appended via repeater field
		*
		*  @param	 $el (jQuery selection) the jQuery element which contains the ACF fields
		*  @return n/a
		*/
		acf.add_action('ready append', function($el) {
			acf.get_fields({ type : 'FIELD_NAME'}, $el).each(function() {
				initialize_field($(this));
			});
		});
	} else {
		/*
		*  Setup Fields
		*
		*  This event is triggered when ACF adds any new elements to the DOM.
		*
		*  @param	 event		e: an event object. This can be ignored
		*  @param	 Element	postbox: An element which contains the new HTML
		*  @return n/a
		*/

		$(document).on('acf/setup_fields', function(e, postbox) {
			$(postbox).find('.field[data-field_type="FIELD_NAME"]').each(function() {
				initialize_field($(this));
			});
		});
	}
})(jQuery);
