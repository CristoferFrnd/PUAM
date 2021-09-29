<?php
include 'Conexion.php';

class Curso
{
    var $objetos;
    public function __construct()
    {
        $db = new Conexion();
        $this->acceso = $db->pdo;
    }

    function crear($nombre_crs, $facultad_crs)
    {
        //Inserción de datos
        $sql = "    INSERT INTO curso(nombre_crs,facultad_crs)
                        VALUES(:nombre_crs, :facultad_crs)
            ";
        $query = $this->acceso->prepare($sql);
        $query->execute(array(
            ':nombre_crs'    => $nombre_crs,
            ':facultad_crs'    => $facultad_crs,

        ));
        $this->objetos = $query->fetchall();
    }

    function buscar()
    {
        if (!empty($_POST['consulta'])) {
            $consulta = $_POST['consulta'];
            $sql = "SELECT * FROM curso
                    WHERE nombre_crs LIKE :consulta
                    ";
            $query = $this->acceso->prepare($sql);
            $query->execute(array(
                ':consulta' => "%$consulta%"
            ));
            $this->objetos = $query->fetchall();
            return $this->objetos;
        } else {
            $sql = "SELECT * FROM curso
                    WHERE nombre_crs NOT LIKE ''                
                    ";
            $query = $this->acceso->prepare($sql);
            $query->execute();
            $this->objetos = $query->fetchall();
            return $this->objetos;
        }
    }

    function buscar_no_mat($id)
    {
        $sql = "SELECT * FROM curso
                    WHERE id_crs  NOT IN (
                    SELECT cursos_id_crs AS nombre_crs FROM adultoMay_has_cursos  
                    JOIN usuario ON tutores_id_tutor = id_usuario
                    WHERE adultoMay_id = :id)            
                    ";
        $query = $this->acceso->prepare($sql);
        $query->execute(array(
            ':id' => $id
        ));
        $this->objetos = $query->fetchall();
        return $this->objetos;
    }

    function buscar_curso_id($id)
    {
        $sql = "SELECT * FROM curso
        WHERE id_crs = :id
                    ";
        $query = $this->acceso->prepare($sql);
        $query->execute(array(
            ':id' => $id
        ));
        $this->objetos = $query->fetchall();
        return $this->objetos;
    }

    function eliminar($id)
    {
        $sql = "DELETE FROM curso
                WHERE id_crs=:id
        ";
        $query = $this->acceso->prepare($sql);
        if (!empty($query->execute(array(':id' => $id)))) {
            echo 'delete';
        } else {
            echo 'noDelete';
        }
    }
}
