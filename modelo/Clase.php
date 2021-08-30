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
}
