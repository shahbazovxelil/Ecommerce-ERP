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
				exportOptions: {
                    columns: [ 0 , 2, 3, 4, 5, 6, 7 ,8 ,9 ,10 ,11 ]
                }
			},
			,
			{
				extend: 'excelHtml5',
				orientation: 'landscape',
				pageSize: 'LEGAL',
				exportOptions: {
                    columns: [ 0 , 2, 3, 4, 5, 6, 7 ,8 ,9 ,10 ,11 ]
                }
			},
			 {
				extend: 'pdfHtml5',
				orientation: 'landscape',
				pageSize: 'LEGAL',
				exportOptions: {
                    columns: [ 0 , 2, 3, 4, 5, 6, 7 ,8 ,9 ,10 ,11 ]
                }
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

	window.table = table
	
	table.buttons().container()
	.appendTo( '#example_wrapper .col-md-6:eq(0)' );		
	


  

});