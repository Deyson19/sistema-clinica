<?php

if ($_SESSION["rol"] != "Doctor" && $_SESSION["rol"] != "doctor") {

    echo '<script> window.location = "inicio"; </script>';

    return;
}

?>

<div class="content-wrapper">

    <section class="content-header">

        <h1>Gestor de Perfil</h1>

    </section>

    <section class="content">

        <div class="box">

            <div class="box-body">
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>Usuario</th>
                            <th>Cotraseña</th>
                            <th>Nombre</th>
                            <th>Apellido </th>
                            <th>Foto</th>
                            <th>Consultorio</th>
                            <th>Horario</th>
                            <th>Editar</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php 

            $perfil = new DoctoresC();
            $perfil->VerPerfilDoctorC();
            ?>


                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>