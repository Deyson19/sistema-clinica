<?php

#region Validar acceso por id del usuario
if ($_SESSION["id"] != substr($_GET["url"],10)) {

    echo '
    <script> window.location = "inicio"; </script>';

    return;
}
#endregion
?>


<div class="content-wrapper">
    <section class="content-header">
        <h1>Su Historial de Citas Médicas</h1>
    </section>

    <section class="content">

        <div class="box">
            <div class="box-body">              

                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>Fecha y Hora</th>
                            <th>Doctor</th>
                            <th>Consultorio</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $resultado = CitasC::VerCitasC();
                        
                        foreach ($resultado as $key => $value) {
                            
                            if ($_SESSION["documento"] ==$value["documento"]) {
                                echo '<tr>
                                    <td>'.$value["inicio"].'</td>';
                                    $columna = "id";
                                    $valor = $value["id_doctor"];

                                    $doctor = DoctoresC::DoctorC($columna,$valor);
                                    echo '<td>'.$doctor["apellido"]. " ".$doctor["nombre"].'</td>';


                                    $columna2 = "id";
                                    $valor2 = $value["id_consultorio"];

                                    $consultorio = ConsultoriosC::VerConsultoriosC($columna2,$valor2);
                                    echo '<td>'.$consultorio["nombre"].'</td>';
                                echo '</tr>';
                                
                            }
                        }
                        ?>
                        

                    </tbody>
                </table>

            </div>
        </div>

    </section>
</div>


