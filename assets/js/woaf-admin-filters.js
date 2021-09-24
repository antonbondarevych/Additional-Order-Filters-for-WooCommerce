;(function($) {
	$(document).ready(function($) {
		var is_rtl = ( document.dir == 'rtl' || document.dir !==  '' ) ? true : false;
		$( '#ant_filter_start_date' ).datepicker({
			dateFormat: 'yy/mm/dd',
			maxDate: '0',
			isRTL: is_rtl,
			onSelect: function (date) {
				var date2 = $('#ant_filter_start_date').datepicker('getDate');
				date2.setDate(date2.getDate());
				$('#ant_filter_end_date').datepicker('option', 'minDate', date2);
			}
		});
		$( '#ant_filter_end_date' ).datepicker({
			dateFormat:'yy/mm/dd',
			maxDate: '0',
			isRTL: is_rtl
		});
		$('#filter_clear').on('click', function(){
			$.each( $('.ant_special_order_filter input, .ant_special_order_filter select'), function( k, v ) {
				var type = $(v).attr('type');
				if ( type == 'text' || type == 'email' || type == 'number' ) {
					$(v).val('');
				}
				if ( type == null || $(v).prop('tagName') == 'SELECT' ) {
					$(v).val('');
				}
			});
			$('.order_statuses_select').select2();
		});
		$('#ant_add_filter').on('click', function(){
			$('.ant_special_order_filter').slideToggle( "400", function() {
				if ( $('.ant_special_order_filter').is(':visible') ) {
					document.cookie = 'woaf_additional_order_filter=opened';
				} else {
					document.cookie = 'woaf_additional_order_filter=closed';
				}
			});
		});
		$('.order_statuses_select').select2();
	});
})(jQuery);