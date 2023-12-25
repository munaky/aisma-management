// Call the dataTables jQuery plugin
$(document).ready(function() {
  $('#dataTable').DataTable( {
    "lengthMenu": [ 25, 50, 100, 1000 ]
  } );
});
