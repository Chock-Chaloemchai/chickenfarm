 <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Pharamacy</title>
 
<!--start data table-->
<script src="js/jquery-1.12.0.min.js" type="text/javascript"></script>
<script src="js/jquery.dataTables.min.js" type="text/javascript" defer ></script>
<link href="css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
<link href="css/rowReorder.jqueryui.min.css" rel="stylesheet" type="text/css"/>
<link href="css/jquery-ui.css" rel="stylesheet" type="text/css"/>
<link href="css/dataTables.jqueryui.min.css" rel="stylesheet" type="text/css"/>
<link href="css/stype.css" rel="stylesheet" type="text/css"/>
<link href="css/stypefont.css" rel="stylesheet" type="text/css"/>
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<script>
$(document).ready(function() {
$('#example').DataTable( {
"aaSorting" :[[0,'desc']],
//"lengthMenu":[[20,50, 100, -1], [20,50, 100,"All"]]
});
} );
</script>
<!-- end data table -->
