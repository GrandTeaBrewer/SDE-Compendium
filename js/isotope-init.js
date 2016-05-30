
// heroFilter controls
$( document ).ready(function() {
	
	
	$( function() {
		// quick search regex
		var qsRegex;
		var buttonFilter;
		
		// init Isotope
		var $container = $('.heroFilter').isotope({
			itemSelector: '.heroProfile',
			// layoutMode: 'fitRows',
			filter: function() {
				console.log('filtering');
				var $this = $(this);
				var searchResult = qsRegex ? $this.text().match( qsRegex ) : true;
				var buttonResult = buttonFilter ? $this.is( buttonFilter ) : true;
				return searchResult && buttonResult;
			}
		});
		
		
		// store filter for each group
		var filters = {};
		
		
		$('#filters').on( 'click', '.button', function() {
			var $this = $(this);
			// get group key
			var $buttonGroup = $this.parents('.button-group');
			var filterGroup = $buttonGroup.attr('data-filter-group');
			// set filter for group
			filters[ filterGroup ] = $this.attr('data-filter');
			// combine filters
			var filterValue = '';
			for ( var prop in filters ) {
				filterValue += filters[ prop ];
			}
			buttonFilter = filterValue;
			// set filter for Isotope
			$container.isotope();
			
		});
		
		// use value of search field to filter
		var $quicksearch = $('#quicksearch').keyup( debounce( function() {
			qsRegex = new RegExp( $quicksearch.val(), 'gi' );
			$container.isotope();
		}) );
		
		
		// change is-checked class on buttons
		$('.button-group').each( function( i, buttonGroup ) {
			var $buttonGroup = $( buttonGroup );
			$buttonGroup.on( 'click', 'button', function() {
				$buttonGroup.find('.is-checked').removeClass('is-checked');
				$( this ).addClass('is-checked');
			});
		});
		
	});
	
	// debounce so filtering doesn't happen every millisecond
	function debounce( fn, threshold ) {
		var timeout;
		return function debounced() {
			if ( timeout ) {
				clearTimeout( timeout );
			}
			function delayed() {
				fn();
				timeout = null;
			}
			setTimeout( delayed, threshold || 100 );
		};
	}
	
	
	
});	

