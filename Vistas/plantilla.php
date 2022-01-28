<?php

session_start();

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Clínica Médica</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="http://localhost/clinica/Vistas/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet"
        href="http://localhost/clinica/Vistas/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="http://localhost/clinica/Vistas/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="http://localhost/clinica/Vistas/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="http://localhost/clinica/Vistas/dist/css/skins/_all-skins.min.css">

    <!-- DataTables -->
    <link rel="stylesheet" href="http://localhost/clinica/Vistas/bower_components/dataTables/dataTable.css">
    <link rel="stylesheet" href="http://localhost/clinica/Vistas/bower_components/dataTables/JQuery.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">

    <!-- fullCalendar -->
    <link rel="stylesheet"
        href="http://localhost/clinica/Vistas/bower_components/fullcalendar/dist/fullcalendar.min.css">
    <link rel="stylesheet"
        href="http://localhost/clinica/Vistas/bower_components/fullcalendar/dist/fullcalendar.print.min.css"
        media="print">



    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini login-page">
    <!-- Site wrapper -->


    <?php


    if (isset($_SESSION["Ingresar"]) && $_SESSION["Ingresar"] == true) {
        
        echo '<div class="wrapper">';

        include "modulos/cabecera.php";

        if ($_SESSION["rol"] == "Secretaria") {
            
            include "modulos/menuSecretaria.php";
        }elseif($_SESSION["rol"] == "Paciente") {
            
            include "modulos/menuPaciente.php";
        }


        $url = array();

        if (isset($_GET["url"])) {

            $url = explode("/", $_GET["url"]);

            if ($url[0] == "inicio"  || $url[0] == "salir" || $url[0] == "perfil-Secretaria" 
            || $url[0] == "perfil-S" || $url[0] == "consultorios" || $url[0] == "E-C"
            || $url[0] == "doctores"|| $url[0] == "pacientes" || $url[0] == "perfil-Paciente"
            || $url[0] == "perfil-P"|| $url[0] == "Ver-consultorios" 
            || $url[0]=="Doctor") {
                
                include "modulos/" . $url[0] . ".php";

            }
         } else {
                
                include "modulos/inicio.php";

            }

            echo '</div>';
        } elseif (isset($_GET["url"])) {

            if ($_GET["url"] == "seleccionar") {
                include "modulos/seleccionar.php";
                
            }else if($_GET["url"]=="ingreso-Secretaria"){
                
                include "modulos/ingreso-Secretaria.php";
                
            }else if($_GET["url"]=="ingreso-Paciente"){
                
                include "modulos/ingreso-Paciente.php";
                
            }
        }else{
            
            include "modulos/seleccionar.php";
        }
    


    ?>

    <!-- =============================================== -->

    <!-- Left side column. contains the sidebar -->


    <!-- =============================================== -->


    <!-- ./wrapper -->

    <!-- jQuery 3 -->
    <script src="http://localhost/clinica/Vistas/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="http://localhost/clinica/Vistas/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="http://localhost/clinica/Vistas/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="http://localhost/clinica/Vistas/bower_components/fastclick/lib/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="http://localhost/clinica/Vistas/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="http://localhost/clinica/Vistas/dist/js/demo.js"></script>

    <!-- Archivos propios para JS -->
    <script src="http://localhost/clinica/Vistas/js/doctores.js"></script>
    <script src="http://localhost/clinica/Vistas/js/pacientes.js"></script>

    <script src="http://localhost/clinica/Vistas/bower_components/dataTables/Jquery.js"></script>
    <script src="http://localhost/clinica/Vistas/bower_components/dataTables/dataTablet.js"></script>


    <!-- fullCalendar -->
    <script src="http://localhost/clinica/Vistas/bower_components/moment/moment.js"></script>
    <script src="http://localhost/clinica/Vistas/bower_components/fullcalendar/dist/fullcalendar.min.js"></script>
    <script src="http://localhost/clinica/Vistas/bower_components/fullcalendar/dist/locale/es.js"></script>

    <script>
    $(document).ready(function() {
        $('.sidebar-menu').tree()
    })
     //Date for the calendar events (dummy data)
     var date = new Date()
    var d    = date.getDate(),
        m    = date.getMonth(),
        y    = date.getFullYear()

        $("#calendar").fullCalendar({

            hiddenDays: [0,6],
            defaultView: 'agendaWeek',

            dayClick:function(date,jsEvent,view){
                $('#CitaModal').modal();
                var fecha = date.format();
                var hora2 = ("01:00:00").split("-");

                fecha = fecha.split("T");

                var dia = fecha[0];

                var hora = (fecha[1].split(":"));

                //Capturar la hora que se muestra
                var hora_horaEntera = parseFloat(hora[0]);
                //Capturar los minutos de las horas que se muestra
                var hora_minutos = parseFloat(hora2[0]);

                var hora_final = hora_horaEntera+hora_minutos;


                //Imprimir la fecha  en un input con el id = fechaC
                $("#fechaC").val(dia);

                //Imprimir la hora en un input con el id = horaC
                $("#horaC").val(hora_horaEntera+":00:00");

                $('#fyhIC').val(fecha[0]+" "+hora_horaEntera+":00:00");

                $('#fyhFC').val(fecha[0]+" "+hora_final+":00:00");
                
            }

        })
    </script>
</body>

</html>