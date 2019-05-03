<script>
$(function () {
    $('.table').DataTable({			
    "paging": false,
    "lengthChange": true,
    "searching": false,
    "ordering": false,
    "info": false,
    "autoWidth": true,
	"responsive": true,
	"processing":true,
	
	buttons: {
                   
                    print: "Yazdır",
					
					pdf:"Pdf'e aktar",
					
                }
	},
	dom: 'Bfrtip',   buttons: [
            'pdf', 'print'
        ]        
    });
  });
 </script>