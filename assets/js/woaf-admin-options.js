;(function($) {
	$(document).ready(function($) {
		$('#select_all_filters, #deselect_all_filters').on('click', function(){
			var action = (this.id == 'select_all_filters' ? true : false);
			$.each( $('ul.waof_enebled_filters input[type="checkbox"]'), function( k, v ) {
				$(v).prop( "checked", action );
			});
		});

		$('.table-custom-filters .woaf-add-custom-filter').on('click', function(e){
			e.preventDefault();
			$('.woaf-custom-filter-blank-state').parents('tr').remove();
			var row_count = $('.table-custom-filters tbody').find('tr').length;
			$('.table-custom-filters tbody').append('<tr data-count="'+row_count+'"><td><input type="text" name="filter_rows['+row_count+'][filter-name]" value="" placeholder="Filter name"></td><td><select name="filter_rows['+row_count+'][filter-statement]"><option value="equal">=</option><option value="like">like</option></select></td><td><input type="text" name="filter_rows['+row_count+'][filter-field]" value="" placeholder="Name of field"></td><td></tr>');
		});

		$('#woaf-сustom-additional-order-filters').on('submit', function(e){
			$('.table-custom-filters tbody input').removeClass('error');
			$('.table-custom-filters tbody input').each(function(k,v){
				var val = $(v).val();
				if ( val == '' ) {
					$(v).addClass('error');
					e.preventDefault();
				}
			});
		});
	});
})(jQuery);