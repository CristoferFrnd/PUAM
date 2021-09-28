<?php
include 'Conexion.php';

class AdulMay
{
    var $objetos;
    public function __construct()
    {
        $db = new Conexion();
        $this->acceso = $db->pdo;
    }

    function crear($cedula, $nombre, $telefonoC, $celular, $correo)
    {
        $sql = "    SELECT id_adMay
                    FROM adultoMay
                    WHERE id_adMay=:cedula
                    ";
        $query = $this->acceso->prepare($sql);
        $query->execute(array(
            ':cedula' => $cedula
        ));
        $this->objetos = $query->fetchall();
        if (!empty($this->objetos)) {
            echo 'noAdd';
        } else {
            $sql = "    INSERT INTO adultoMay(id_adMay, nombre_adMay, telefonoC_AdMay, celular_AdMay, correoE_AdMay)
                        VALUES(:cedula, :nombre, :telefono, :celular, :correo)
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

    function act_estado($id, $estado)
    {
        if ($estado == 0) {
            $sql = "UPDATE adultoMay SET activ_AdMay = 1
            WHERE id_adMay = :id";
        } else {
            $sql = "UPDATE adultoMay SET activ_AdMay = 0
            WHERE id_adMay = :id";
        }
        $query = $this->acceso->prepare($sql);
        $query->execute(array(
            ':id' => $id
        ));
        $this->objetos = $query->fetchall();
        echo "actualizado";
    }

    function buscar_am_id($id)
    {
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

    function buscar_crs_adulMay($id)
    {
        $sql = "SELECT nombre_crs,nombre_usuario,fechaIngreso_curso FROM adultoMay_has_cursos
                JOIN usuario ON tutores_id_tutor = id_usuario
                JOIN curso ON cursos_id_crs = id_crs
                WHERE adultoMay_id =:id;
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
        $sql = "DELETE FROM adultoMay
                WHERE id_adMay = :id
        ";
        $query = $this->acceso->prepare($sql);
        if (!empty($query->execute(array(':id' => $id)))) {
            echo 'delete';
        } else {
            echo 'noDelete';
        }
    }
}
