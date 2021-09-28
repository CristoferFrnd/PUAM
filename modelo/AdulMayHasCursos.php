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


    function crear($tutor,$estado,$fecha,$adulMay)
    {
        if (!empty($this->objetos)) {
            echo 'noAdd';
        } else {
            $sql = "    INSERT INTO adultoMay_has_cursos(tutores_id_tutor, estado_AdultoMay, fechaIngreso_curso, adultoMay_id)
                        VALUES(:tutor,:estado,:fecha,:adulMay)
            ";
            $query = $this->acceso->prepare($sql);
            $query->execute(array(
                ':tutor'    => $tutor,
                ':estado'    => $estado,
                ':fecha'    => $fecha,
                ':adulMay'    => $adulMay

            ));
            $this->objetos = $query->fetchall();
            echo 'add';
        }
    }
}
