jQuery( window ).load( function() {
	jQuery( '.boxes' ).masonry({
		itemSelector: 		'.boxed',
		columnWidth: 		'.boxed',
  		percentPosition: 	true
	});
});