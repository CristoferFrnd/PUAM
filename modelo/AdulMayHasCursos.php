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

