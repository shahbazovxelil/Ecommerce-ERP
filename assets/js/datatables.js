$(function(e) {
	//file export datatable
	var table = $('#example').DataTable({
		paging: true,
		lengthChange: false,
		bInfo : true,
		pageLength: 100,
		buttons: [
			{
				extend: 'copyHtml5',
				orientation: 'landscape',
				pageSize: 'LEGAL',
				
			},
			,
			{
				extend: 'excelHtml5',
				orientation: 'landscape',
				pageSize: 'LEGAL',
				
			},
			 {
				extend: 'pdfHtml5',
				orientation: 'landscape',
				pageSize: 'LEGAL',
				
			}, 
			  'colvis' ,
		],
		language: {
			searchPlaceholder: 'Axtarış edin...',
			scrollX: "100%",
			sSearch: '',
			lengthMenu: '_MENU_ ',
		},
		
	});
	

	window.table = table;
	
	table.buttons().container()
	.appendTo( '#example_wrapper .col-md-6:eq(0)' );		
	
	$('#example1').DataTable({
		language: {
			searchPlaceholder: 'Axtarış edin...',
			scrollX: "100%",
			sSearch: '',
			lengthMenu: '_MENU_',
		}
	});
	$('#example2').DataTable({
		language: {
			searchPlaceholder: 'Axtarış edin...',
			scrollX: "100%",
			sSearch: '',
			lengthMenu: '_MENU_',
		}
	});
	$('.datatable').DataTable({
		language: {
			paging: false,
			lengthChange: false,
			bInfo : false,
			searchPlaceholder: 'Axtarış edin...',
			scrollX: "100%",
			sSearch: '',
			lengthMenu: '_MENU_',
		}
	});
	$('.datatable2').DataTable({
		language: {
			searchPlaceholder: 'Axtarış edin...',
			scrollX: "100%",
			sSearch: '',
			lengthMenu: '_MENU_',
		}
	});
	$('#Invoicedatatable').DataTable({
		language: {
			searchPlaceholder: 'Axtarış edin...',
			scrollX: "100%",
			sSearch: '',
			lengthMenu: '_MENU_',
		}
	});
	//______Delete Data Table
	var table = $('#delete-datatable').DataTable({
		language: {
			searchPlaceholder: 'Axtarış edin...',
			sSearch: '',
		}
	}); 
    $('#delete-datatable tbody').on( 'click', 'tr', function () {
        if ( $(this).hasClass('selected') ) {
            $(this).removeClass('selected');
        }
        else {
            table.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
        }
    } );
    $('#button').click( function () {
        table.row('.selected').remove().draw( false );
    } );
	
	//Details display datatable
	$('#example-1').DataTable( {
		language: {
			searchPlaceholder: 'Axtarış edin...',
			scrollX: "100%",
			sSearch: '',
			lengthMenu: '_MENU_',
		},
	} );
});