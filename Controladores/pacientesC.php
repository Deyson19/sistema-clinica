<?php 

class PacientesC{

    //crear paciente
    public function CrearPacienteC(){

        if (isset($_POST["rolP"])) {
            
            $tablaBD = "pacientes";

            $datosC = array("apellido"=>$_POST["apellido"], "nombre"=>$_POST["nombre"], "documento"=>$_POST["documento"], "sexo"=>$_POST["sexo"],"usuario"=>$_POST["usuario"], "clave"=>$_POST["clave"], "rol"=>$_POST["rolP"]);

            $resultado = PacientesM::CrearPacienteM($tablaBD,$datosC);

            if($resultado == true){

				echo '<script>

				window.location = "pacientes";
				</script>';

			}

        }

    }

    //Ver pacientes
    static public function VerPacientesC($columna,$valor){
        $tablaBD = "pacientes";

        $resultado = PacientesM::VerPacientesM($tablaBD,$columna,$valor);

        return $resultado;
    }

    #region Borrar Pacientes

    //Borrar paciente
    //Borrar Paciente
	public function BorrarPacienteC(){

		if(isset($_GET["Pid"])){

			$tablaBD = "pacientes";

			$id = $_GET["Pid"];

			if($_GET["imgP"] != ""){

				unlink($_GET["imgP"]);

			}

			$resultado = PacientesM::BorrarPacienteM($tablaBD, $id);

			if($resultado == true){

				echo '<script>

				window.location = "pacientes";
				</script>';

			}

		}

	}

    #endregion

    #region Actualizar Paciente
    
	//Actualizar Paciente
	public function ActualizarPacienteC(){

		if(isset($_POST["Pid"])){

			$tablaBD = "pacientes";

			$datosC = array("id"=>$_POST["Pid"], "apellido"=>$_POST["apellidoE"], "nombre"=>$_POST["nombreE"], "documento"=>$_POST["documentoE"], "usuario"=>$_POST["usuarioE"], "clave"=>$_POST["claveE"]);

			$resultado = PacientesM::ActualizarPacienteM($tablaBD, $datosC);
			
			if($resultado == true){

				echo '<script>

				window.location = "pacientes";
				</script>';

			}

		}

	}

    #endregion



}

?>