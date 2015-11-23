jQuery(function($) {

	'use strict';

	var container = $( 'body' )
	  , component = container.byComponent( window.ssbPrefix )
	;

	if ( !component.length ) {
		return;
	}

	new SsbSettings( component );
});