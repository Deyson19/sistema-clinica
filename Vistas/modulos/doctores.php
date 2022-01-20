<?php

if ($_SESSION["rol"] != "Secretaria") {

    echo '
    <script> window.location = "inicio"; </script>';

    return;
}

?>


<div class="content-wrapper">
    <section class="content-header">
        <h1>Gestor de Doctores</h1>
    </section>

    <section class="content">

        <div class="box">

            <div class="box-header">

                <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#CrearDoctor">Crear Doctor</button>


            </div>

            <div class="box-body">

                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>N°</th>
                            <th>Apellido</th>
                            <th>Nombre</th>
                            <th>Foto</th>
                            <th>Consultorio</th>
                            <th>Usuario</th>
                            <th>Contraseña</th>
                            <th>Editar / Borrar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- <?php
                                $columna = null;
                                $valor = null;

                                $resultado = ConsultoriosC::VerConsultoriosC($columna, $valor);


                                foreach ($resultado as $key => $value) {
                                    echo '<tr>
                        <td>' . ($key + 1) . '</td>
                        <td>' . $value["nombre"] . '</td>
                        <td>
                            <div class="btn-group">
                                <a href="http://localhost/clinica/E-C/' . $value["id"] . '">
                                    <button class="btn btn-success"> <i class="fa fa-pencil"></i> Editar</button>
                                </a>
                                <a href="http://localhost/clinica/consultorios/' . $value["id"] . '">
                                    <button class="btn btn-danger"> <i class="fa fa-times"></i> Borrar</button>
                                </a>

                            </div>
                        </td>
                    </tr>';
                                }
                                ?> -->

                    </tbody>
                </table>

            </div>
        </div>

    </section>
</div>

<div class="modal fade" role="dialog" id="CrearDoctor">

    <div class="modal-dialog">

        <div class="modal-content">

            <form method="post" role="form">

                <div class="modal-body">

                    <div class="box-body">

                        <div class="form-group">

                            <h2>Apellido:</h2>
                            <input type="text" class="form-control input-lg" name="apellido" required>
                            <input type="hidden" name="rolD" value="Doctor">

                        </div>
                        <div class="form-group">

                            <h2>Nombre:</h2>
                            <input type="text" class="form-control input-lg" name="nombre" required>

                        </div>

                        <div class="form-group">

                            <h2>Sexo:</h2>
                            <select name="sexo" class="form-control input-lg">
                                <option>Seleccionar...</option>
                                <option value="Masculino">Masculino</option>
                                <option value="Femenino">Femenino</option>
                            </select>

                        </div>

                        <div class="form-group">

                            <h2>Consultorio:</h2>
                            <select name="sexo" class="form-control input-lg">
                                <option>Seleccionar...</option>
                                <option value="Cardiología">Cardiología</option>
                                <option value="Psicología">Psicología</option>
                            </select>

                        </div>


                        <div class="form-group">

                            <h2>Usuario:</h2>
                            <input type="text" class="form-control input-lg" name="usuario" required>

                        </div>
                        <div class="form-group">

                            <h2>Contraseña:</h2>
                            <input type="text" class="form-control input-lg" name="clave" required>

                        </div>




                    </div>

                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Crear</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    <button type="reset" class="btn btn-warning">Limpiar</button>
                </div>
            </form>
        </div>

    </div>



</div>


<?php

// $borrarC = new ConsultoriosC();
// $borrarC -> BorrarConsultorioC();

?>