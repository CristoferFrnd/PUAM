<?php
include 'Conexion.php';

class Usuario
{
    var $objetos;
    public function __construct()
    {
        $db = new Conexion();
        $this->acceso = $db->pdo;
    }

    function crear($nombre, $apellidos, $contrasena, $n_usuario, $cedula, $correo, $telefono)
    {
        $sql = "    SELECT n_cedula
                    FROM Usuario
                    WHERE n_cedula=:cedula
                    ";
        $query = $this->acceso->prepare($sql);
        $query->execute(array(
            ':cedula' => $cedula
        ));
        $this->objetos = $query->fetchall();
        if (!empty($this->objetos)) {
            echo 'noAdd';
        } else {
            $sql = "    INSERT INTO Usuario(nombre, apellidos, n_usuario, contrasena, n_cedula, correo, telefono, us_tipo)
                        VALUES(:nombre, :apellidos, :n_usuario, :contrasena, :cedula, :correo, :telefono, :us_tipo)
            ";
            $query = $this->acceso->prepare($sql);
            $query->execute(array(
                ':nombre'    => $nombre,
                ':apellidos'    => $apellidos,
                ':n_usuario'    => $n_usuario,
                ':contrasena'    => $contrasena,
                ':cedula' => $cedula,
                ':correo' => $correo,
                ':telefono'    => $telefono,
                ':us_tipo'    => 2
                
            ));
            $this->objetos = $query->fetchall();
            echo 'add';
        }
    }

    function editar($id_us, $nombre, $apellidos, $contrasena, $n_usuario, $cedula, $correo, $telefono)
    {
            $sql = "    UPDATE  Usuario SET nombre = :nombre, apellidos = :apellidos, n_usuario = :n_usuario, contrasena = :contrasena, n_cedula = :cedula, correo = :correo, telefono = :telefono
                        WHERE id_usuario = :id
            ";
            $query = $this->acceso->prepare($sql);
            $query->execute(array(
                ':nombre'    => $nombre,
                ':apellidos' => $apellidos,
                ':n_usuario' => $n_usuario,
                ':contrasena' => $contrasena,
                ':cedula' => $cedula,
                ':correo' => $correo,
                ':telefono' => $telefono,
                ':id'    => $id_us
                
            ));
            $this->objetos = $query->fetchall();
            echo 'edit 11';
        }

    function buscar()
    {
        if (!empty($_POST['consulta'])) {
            $consulta = $_POST['consulta'];
            $sql = "SELECT id_usuario, apellidos, nombre, n_cedula, correo, telefono FROM Usuario
            WHERE apellidos LIKE :consulta
            OR n_cedula LIKE :consulta
            AND us_tipo = 2
                        ";
            $query = $this->acceso->prepare($sql);
            $query->execute(array(
                ':consulta' => "%$consulta%"
            ));
            $this->objetos = $query->fetchall();
            return $this->objetos;
        } else {
            $sql = "SELECT id_usuario, apellidos, nombre, n_cedula, correo, telefono FROM Usuario
                    WHERE id_usuario NOT LIKE '' 
                    AND us_tipo = 2 
                    ORDER BY nombre ASC
                    LIMIT 25
                    ";
            $query = $this->acceso->prepare($sql);
            $query->execute();
            $this->objetos = $query->fetchall();
            return $this->objetos;
        }
    }

    function loguearse($us, $pass)
    {
        $sql = "  SELECT * 
                    FROM usuario
                    WHERE correoIns_usuario=:n_usuario
                    ";
        $query = $this->acceso->prepare($sql);
        $query->execute(array(':n_usuario' => $us));
        $objetos = $query->fetchall();
        foreach ($objetos as $objeto) {
            $contrasena_actual = $objeto->contras_usuario;
        }
            if ($pass == $contrasena_actual) {
                return "logueado";
            }
        
    }

    function obtenerDatosLogueo($user)
    {
        $sql = "  SELECT * 
                    FROM Usuario
                    JOIN Tipo_usuario on us_tipo=id_tipo_us
                    AND n_usuario=:n_usuario";
        $query = $this->acceso->prepare($sql);
        $query->execute(array(':n_usuario' => $user));
        $this->objetos = $query->fetchall();
        return $this->objetos;
    }

    function obtenerDatos($id)
    {
        $sql = "  SELECT * 
                    FROM usuario
                    JOIN tipo_usuario on us_tipo=id_tipo_us
                    AND id_usuario=:id";
        $query = $this->acceso->prepare($sql);
        $query->execute(array(':id' => $id));
        $this->objetos = $query->fetchall();
        return $this->objetos;
    }

    function buscar_us_id($id){
        $sql = "SELECT * FROM Usuario
                    WHERE id_usuario = :id
                    ";
            $query = $this->acceso->prepare($sql);
            $query->execute(array(
                ':id' => "$id"
            ));
            $this->objetos = $query->fetchall();
            return $this->objetos;
    }

    function eliminar($id){
        $sql = "DELETE FROM Usuario
                WHERE id_usuario=:id
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

