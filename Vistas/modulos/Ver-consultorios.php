<?php 

if ($_SESSION["rol"] != "Paciente") {
    
    echo '
    <script> window.location = "inicio"; </script>';

    return;
}

?>


<div class="content-wrapper">
    <section class="content-header">
        <h1>Elegir un Consultorio:</h1>
    </section>

    <section class="content">

        <div class="box">

            <div class="box-body">
                <?php 

                $columna = null;
                $valor = null;

                $resultado = ConsultoriosC::VerConsultoriosC($columna,$valor);

                foreach ($resultado as $key => $value) {
                    echo '<div class="col-lg-6 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            <h3>'.$value["nombre"].'</h3>';

                            $columna = "id_consultorio";
                            $valor = $value["id"];
                            
                            $doctores = DoctoresC::VerDoctoresC($columna,$valor);

                            foreach ($doctores as $key => $value) {
                                print '<i class="fa fa-user-md" style="color:#FFBF40; font-size:20px"></i>';
                                echo '<a href="Doctor/'.$value["id"].'" style="color: black; font-size:15px;" >' .$value["apellido"]. '  ' .$value["nombre"]. '</i></a>';
                                echo "<br>";
                                
                            }

                            
                        echo '</div>
                    </div>
                </div>';
                }

                ?>

            </div>
        </div>

    </section>
</div>