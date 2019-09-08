( function( api ) {

	// Extends our custom "business-form" section.
	api.sectionConstructor['business-form'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );
