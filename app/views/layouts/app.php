<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>GOB</title>

    <link href="assets1/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets1/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="assets1/css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="assets1/css/animate.css" rel="stylesheet">
    <link href="assets1/css/style.css" rel="stylesheet">
    <link href="assets1/css/plugins/dataTables/datatables.min.css" rel="stylesheet">
    <link href="assets1/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">

</head>

<body>

<div id="wrapper">

    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            #MENU#

        </div>
    </nav>

    <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
            <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="principal.php#"><i class="fa fa-bars"></i> </a>
                        
                </div>
                <ul class="nav navbar-top-links navbar-right">
                    <li>
                        <span class="m-r-sm text-muted welcome-message">Bienvenidos al Sistema ...</span>
                    </li>
                    
                  

                    <li>
                        <a href="index.php">
                            <i class="fa fa-sign-out"></i> Cerrar Sesión
                        </a>
                    </li>
                </ul>

            </nav>
        </div>
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-10">
                    <h2>#TITULO#</h2>
                    <!--ol class="breadcrumb">
                        <li>
                            <a href="index.html">Inicio</a>
                        </li>
                        <li>
                            <a>Forms</a>
                        </li>
                        <li class="active">
                            <strong>Basic Form</strong>
                        </li>
                    </ol-->
            </div>
            <div class="col-lg-2">

            </div>
        </div>
        #CONTENIDO#
        <div class="footer">
            <div class="pull-right">
                
            </div>
            <div>
                <strong>Oficina de Desarrollo Administrativo</strong> ODA
            </div>
        </div>

    </div>
</div>


    <!-- Mainly scripts -->
    <script src="assets1/js/jquery-2.1.1.js"></script>
    <script src="assets1/js/bootstrap.min.js"></script>
    <script src="assets1/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="assets1/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <script src="assets1/js/plugins/dataTables/datatables.min.js"></script>
    <!-- Custom and plugin javascript -->
    <script src="assets1/js/inspinia.js"></script>
    <script src="assets1/js/plugins/pace/pace.min.js"></script>

    <!-- Nestable List -->
    <script src="assets1/js/plugins/nestable/jquery.nestable.js"></script>

    <!-- iCheck -->
    <script src="assets1/js/plugins/iCheck/icheck.min.js"></script>
        <script>
            $(document).ready(function () {
                $('.i-checks').iCheck({
                    checkboxClass: 'icheckbox_square-green',
                    radioClass: 'iradio_square-green',
                });
            });
       
            $(document).ready(function(){
                $('.dataTables-example').DataTable({
                    pageLength: 25,
                    responsive: true,
                    dom: '<"html5buttons"B>lTfgitp',
                    buttons: [
                        { extend: 'copy'},
                        {extend: 'csv'},
                        {extend: 'excel', title: 'ExampleFile'},
                        {extend: 'pdf', title: 'ExampleFile'},

                        {extend: 'print',
                         customize: function (win){
                                $(win.document.body).addClass('white-bg');
                                $(win.document.body).css('font-size', '10px');

                                $(win.document.body).find('table')
                                        .addClass('compact')
                                        .css('font-size', 'inherit');
                        }
                        }
                    ]

                });

            });

            $(document).ready(function(){

             var updateOutput = function (e) {
                 var list = e.length ? e : $(e.target),
                         output = list.data('output');
                 if (window.JSON) {
                     output.val(window.JSON.stringify(list.nestable('serialize')));//, null, 2));
                 } else {
                     output.val('JSON browser support required for this demo.');
                 }
             };
             // activate Nestable for list 1
             $('#nestable').nestable({
                 group: 1
             }).on('change', updateOutput);

             // activate Nestable for list 2
             $('#nestable2').nestable({
                 group: 1
             }).on('change', updateOutput);

             // output initial serialised data
             updateOutput($('#nestable').data('output', $('#nestable-output')));
             updateOutput($('#nestable2').data('output', $('#nestable2-output')));

             $('#nestable-menu').on('click', function (e) {
                 var target = $(e.target),
                         action = target.data('action');
                 if (action === 'expand-all') {
                     $('.dd').nestable('expandAll');
                 }
                 if (action === 'collapse-all') {
                     $('.dd').nestable('collapseAll');
                 }
             });
         });
        </script>

</body>

</html>
