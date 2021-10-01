<?php
include 'Conexion.php';

class Temp
{
    var $objetos;
    public function __construct()
    {
        $db = new Conexion();
        $this->acceso = $db->pdo;
    }

    function crear($id_adulMay, $id_curso)
    {
            //Inserción de datos
            $sql = "    INSERT INTO temp(id_adulMay,id_curso)
                        VALUES(:id_adulMay, :id_curso)
            ";
            $query = $this->acceso->prepare($sql);
            $query->execute(array(
                ':id_adulMay'    => $id_adulMay,
                ':id_curso'    => $id_curso,
                
            ));
            $this->objetos = $query->fetchall();        
    }

    function buscar()
    {
        if (!empty($_POST['curso'])) {
            $consulta = $_POST['curso'];
            $sql = "SELECT * FROM temp
                    WHERE id_curso = :curso
                    ";
            $query = $this->acceso->prepare($sql);
            $query->execute(array(
                ':curso' => "curso"
            ));
            $this->objetos = $query->fetchall();
            return $this->objetos;
        } else {
            $sql = "SELECT * FROM temp
                    WHERE id_curso NOT LIKE ''                
                    ";
            $query = $this->acceso->prepare($sql);
            $query->execute();
            $this->objetos = $query->fetchall();
            return $this->objetos;
        }
    }

    function listar_crs($id_crs)
    {
        
            $sql = "SELECT id_adulMay,nombre_adMay 
            FROM temp JOIN adultoMay ON id_adulMay = id_adMay
            where id_curso =:id_crs;
                    ";
            $query = $this->acceso->prepare($sql);
            $query->execute(array(
                ':id_crs' => $id_crs,
            ));
            $this->objetos = $query->fetchall();
            return $this->objetos;
    }

    function eliminar($id,$curso){
        $sql = "DELETE FROM temp
                WHERE id_adulMay = :id
                AND id_curso = :curso
        ";
        $query=$this->acceso->prepare($sql);
        if(!empty($query->execute(array(
            ':id' => $id,
            ':curso' => $curso,        
        )))){
            echo 'delete';
        }
        else{
            echo 'noDelete';
        }
    }

}
