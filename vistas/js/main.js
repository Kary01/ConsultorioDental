$(document).ready(function() {
    $('#example').DataTable();
    $('#citas').DataTable();

            $(function () {
                $('#datetimepicker1').datetimepicker({
                   format: 'YYYY-MM-DD HH:mm'
                });
            });

            function reload(){
              location.href="calendar.php";
            }

});

//MUESTRA EL PLUGIN DE TABLAS 