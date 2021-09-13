<?php
include 'Conexion.php';

class Clase
{
    var $objetos;
    public function __construct()
    {
        $db = new Conexion();
        $this->acceso = $db->pdo;
    }

    function crear($fecha, $duracion, $imgContent, $adulM, $tema, $tutor, $curso, $tipo)
    {
            //Inserción de datos
            $sql = "    INSERT INTO clase(fecha_clase, duracion_clase, evidencia_clase, adultoMay_id_adMay, tema_Clase, tutores_id_tutor, cursos_id_crs, tipoClase_id_tipoClase)
                        VALUES(:fecha, :duracion, :evidencia, :adulM, :tema, :tutor, :curso, :tipo)
            ";
            $query = $this->acceso->prepare($sql);
            $query->execute(array(
                ':fecha' => $fecha,
                ':duracion'    => $duracion,
                ':evidencia'    => $imgContent,
                ':adulM'    => $adulM,
                ':tema'    => $tema,
                ':tutor'    => $tutor,
                ':curso'    => $curso,
                ':tipo'    => $tipo

            ));
            $this->objetos = $query->fetchall();
            echo $fecha;
        
    }

    function buscar()
    {
        if (!empty($_POST['consulta'])) {
            $consulta = $_POST['consulta'];
            $sql = "SELECT id_clase fecha_clase, duracion_clase, evidencia_clase, tema_clase, nombre_usuario AS tutor, nombre_crs, descripcion_tipoClase, nombre_adMay, id_adMay FROM clase
                    JOIN curso on cursos_id_crs=id_crs
                    JOIN tipoClase on tipoClase_id_tipoClase=id_tipoClase
                    JOIN adultoMay on adultoMay_id_adMay=id_adMay
                    JOIN usuario on tutores_id_tutor=id_usuario
                    WHERE nombre_adMay LIKE :consulta
                    OR id_adMay LIKE :consulta
                    OR fecha_clase LIKE :consulta
                    OR nombre_usuario LIKE :consulta
                    OR nombre_crs LIKE :consulta
                    OR descripcion_tipoClase LIKE :consulta
            
                        ";
            $query = $this->acceso->prepare($sql);
            $query->execute(array(
                ':consulta' => "%$consulta%"
            ));
            $this->objetos = $query->fetchall();
            return $this->objetos;
        } else {
            $sql = "SELECT id_clase, fecha_clase, duracion_clase, evidencia_clase, tema_clase, nombre_usuario AS tutor, nombre_crs, descripcion_tipoClase, nombre_adMay, id_adMay FROM clase
                    JOIN curso on cursos_id_crs=id_crs
                    JOIN tipoClase on tipoClase_id_tipoClase=id_tipoClase
                    JOIN adultoMay on adultoMay_id_adMay=id_adMay
                    JOIN usuario on tutores_id_tutor=id_usuario
                    WHERE nombre_adMay NOT LIKE ''
                    LIMIT 25                
                    ";
            $query = $this->acceso->prepare($sql);
            $query->execute();
            $this->objetos = $query->fetchall();
            return $this->objetos;
        }
    }

    function buscar_clase_id($id){
        $sql = "SELECT id_clase, fecha_clase, duracion_clase, evidencia_clase, tema_clase, nombre_usuario AS tutor, nombre_crs, descripcion_tipoClase, nombre_adMay, id_adMay FROM clase
        JOIN curso on cursos_id_crs=id_crs
        JOIN tipoClase on tipoClase_id_tipoClase=id_tipoClase
        JOIN adultoMay on adultoMay_id_adMay=id_adMay
        JOIN usuario on tutores_id_tutor=id_usuario
        WHERE id_clase = :id
                    ";
            $query = $this->acceso->prepare($sql);
            $query->execute(array(
                ':id' => $id
            ));
            $this->objetos = $query->fetchall();
            return $this->objetos;
    }

    function buscar_clase_alumno($id){
        $sql = "SELECT id_clase, fecha_clase, duracion_clase, evidencia_clase, tema_clase, tutores_id_tutor AS tutor, nombre_crs, descripcion_tipoClase, nombre_adMay, id_adMay FROM clase
        JOIN curso on cursos_id_crs=id_crs
        JOIN tipoClase on tipoClase_id_tipoClase=id_tipoClase
        JOIN adultoMay on adultoMay_id_adMay=id_adMay
        JOIN usuario on tutores_id_tutor=id_usuario
        WHERE tutores_id_tutor = :id
                    ";
            $query = $this->acceso->prepare($sql);
            $query->execute(array(
                ':id' => $id
            ));
            $this->objetos = $query->fetchall();
            return $this->objetos;
    }

    function eliminar($id){
        $sql = "DELETE FROM clase
                WHERE id_clase=:id
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
