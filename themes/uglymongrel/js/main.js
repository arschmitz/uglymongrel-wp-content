/*
 * All sites
 */
$(function() {

	// Banner ads
	(function() {

		// Default site id
		var siteId = 53829,

			// Sites can contain two properties: all and homepage
			site = ({
				"jquery.com": {
					homepage: 32018
				}
			})[ $( "head" ).attr( "data-live-domain" ) ];

		if ( site ) {
			if ( location.pathname === "/" && site.homepage ) {
				siteId = site.homepage;
			} else if ( site.all ) {
				siteId = site.all;
			}
		}

		window.ados = {
			run: [function() {
				ados_add_placement( 5449, siteId, "broadcast", 1314 );
				ados_load();
			}]
		};

		$.getScript( "//engine.adzerk.net/ados.js" );
	})();
});



$( window ).on( "load throttledresize orientationchange", function(){
	$.legos.fix();
});
$.legos = {};
$.legos.fix = function(){
	$( "plate, .plate" ).each( function(){

		if( this.className.indexOf( "height" ) < 1 && ( ( $(this).height() % 32 < 30 && $( this ).height() % 32 > 2 ) || ( $( this ).height() % 32 > 0 && $( this ).height() % 32 < 3 ) ) ){
			$( this ).height( ( Math.floor( ( $( this ).height() + 1 ) / 32 ) + 1 ) * 32 );
		}
		if( this.className.indexOf( "height" ) < 1 && ( ( $(this).width() % 32 < 30 && $( this ).width() % 32 > 2 ) || ( $( this ).width() % 32 > 0 && $( this ).width() % 32 < 3 ) ) ){
			$( this ).width( ( Math.floor( ( $( this ).width() + 1 ) / 32 ) + 1 ) * 32 );
		}
		console.log( $( this ).height() );
		var left, top, position = $( this ).offset();
		if( ( $( this ).css( "right" ) === "auto" || $( this ).css( "right" ) === "0px" ) && ( ( position.left % 32 < 30 && position.left % 32 > 2 ) || ( position.left % 32 > 0 && position.left % 32 < 3 ) ) ){
			left = $( this ).css( "left" );
			if( left === "auto" ){
				left = 0;
			} else {
				left = parseInt( left, 10 );
			}
			position.left = parseInt( position.left, 10 );
			$( this ).css( "left", ( position.left % 32  ) - left  );
		}
		if( ( $( this ).css( "bottom" ) === "auto" || $( this ).css( "bottom" ) === "0px" ) && ( ( position.top % 32 < 30 && position.top % 32 > 2 )  ) ){
			top = $( this ).css( "top" );
			console.log( top );
			if( top === "auto" ){
				top = 0;
			} else {
				top = parseInt( top, 10 );
			}
			position.top = parseInt( position.top, 10 );
			$( this ).css( "top", top - ( position.top % 32  ) + 32 );
		}
	});
};
/*
 * API sites
 */
$(function() {
	$( ".entry-example" ).each(function() {
		var iframeSrc,
			src = $( this ).find( ".syntaxhighlighter" ),
			output = $( this ).find( ".code-demo" );

		if ( !src.length || !output.length ) {
			return;
		}

		// Get the original source
		iframeSrc = src.find( "td.code .line" ).map(function() {
			// Convert non-breaking spaces from highlighted code to normal spaces
			return $( this ).text().replace( /\xa0/g, " " );
		// Restore new lines from original source
		}).get().join( "\n" );

		iframeSrc = iframeSrc
			// Insert styling for the live demo that we don't want in the
			// highlighted code
			.replace( "</head>",
				"<style>" +
					"html, body { border:0; margin:0; padding:0; }" +
					"body { font-family: 'Helvetica', 'Arial',  'Verdana', 'sans-serif'; }" +
				"</style>" +
				"</head>" )
			// IE <10 executes scripts in the order in which they're loaded,
			// not the order in which they're written. So we need to defer inline
			// scripts so that scripts which need to be fetched are executed first.
			.replace( /<script>([\s\S]+)<\/script>/,
				"<script>" +
				"window.onload = function() {" +
					"$1" +
				"};" +
				"</script>" );

		var iframe = document.createElement( "iframe" );
		iframe.width = "100%";
		iframe.height = output.attr( "data-height" ) || 250;
		output.append( iframe );

		var doc = (iframe.contentWindow || iframe.contentDocument).document;
		doc.write( iframeSrc );
		doc.close();
	});
});
