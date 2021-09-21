<?php
include 'Conexion.php';

class AdulMayHasCursos
{
    var $objetos;
    public function __construct()
    {
        $db = new Conexion();
        $this->acceso = $db->pdo;
    }

    function crear($curso,$tutor,$estado,$fecha,$adulMay)
    {
        if (!empty($this->objetos)) {
            echo 'noAdd';
        } else {
            $sql = "    INSERT INTO adultoMay_has_cursos(cursos_id_cursos,tutores_id_tutor,estado_AdultoMay,fechaIngreso_curso,adultoMay_id)
                        VALUES(:curso,:tutor,:estado,:fecha,:adulMay)
            ";
            $query = $this->acceso->prepare($sql);
            $query->execute(array(
                ':curso' => $curso,
                ':tutor'    => $tutor,
                ':estado'    => $estado,
                ':fecha'    => $fecha,
                ':adulMay'    => $adulMay
                
            ));
            $this->objetos = $query->fetchall();
            echo 'add';
        }
    }

    function editar($cedula, $nombre, $telefonoC, $celular, $correo)
    {
            $sql = "    UPDATE  adultoMay SET id_adMay = :cedula, nombre_adMay = :nombre, telefonoC_AdMay = :telefono, celular_AdMay = :celular correoE_AdMay = :correo
                        WHERE id_usuario = :id
            ";
            $query = $this->acceso->prepare($sql);
            $query->execute(array(
                ':cedula' => $cedula,
                ':nombre'    => $nombre,
                ':celular'    => $celular,
                ':telefono'    => $telefonoC,
                ':correo'    => $correo
            ));
            $this->objetos = $query->fetchall();
            echo 'edit';
        }

    function buscar()
    {
        if (!empty($_POST['consulta'])) {
            $consulta = $_POST['consulta'];
            $sql = "SELECT * FROM adultoMay
            WHERE nombre_adMay LIKE :consulta
            OR id_adMay LIKE :consulta";
            $query = $this->acceso->prepare($sql);
            $query->execute(array(
                ':consulta' => "%$consulta%"
            ));
            $this->objetos = $query->fetchall();
            return $this->objetos;
        } else {
            $sql = "SELECT * FROM adultoMay
                    WHERE id_adMay NOT LIKE '' 
                    ORDER BY nombre_adMay ASC
                    LIMIT 25
                    ";
            $query = $this->acceso->prepare($sql);
            $query->execute();
            $this->objetos = $query->fetchall();
            return $this->objetos;
        }
    }

    function buscar_am_id($id){
        $sql = "SELECT * FROM adultoMay
                    WHERE id_adMay = :id
                    ";
            $query = $this->acceso->prepare($sql);
            $query->execute(array(
                ':id' => $id
            ));
            $this->objetos = $query->fetchall();
            return $this->objetos;
    }

    function eliminar($id){
        $sql = "DELETE FROM adultoMay
                WHERE id_adMay = :id
        ";
        $query=$this->acceso->prepare($sql);
        if(!empty($query->execute(array(':id' => $id)))){
            echo 'delete';
        }
        else{
            echo 'noDelete';
        }
    }
}

