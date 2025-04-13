<?php

abstract class Conexion {
    protected static $conexion = null;

    static function conectar() : PDO{
        try{
            self::$conexion = new PDO("informix:host=host.docker.internal; service=9088; database=sic; server=informix; protocol=onsoctcp;EnableScrollableCursors=1","informix","in4mix");
            self::$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo "CONEXION EXITOSA";
        }catch (PDOException $e){
            echo "No hay conexion a la Base de Datos <br>";
            echo $e->getMessage();
            self::$conexion = null;
            exit;
        }
        return self::$conexion;

        
    }

    public function ejecutar($sql)
    {
        $conexion = self::conectar();
        $sentencia = $conexion->prepare($sql);
        $resultado = $sentencia->execute();
        $idInsertado = $conexion->lastInsertId();
        return [
            "resultado" => $resultado,
            "id" => $idInsertado
        ];
    }

    public function servir($sql)
    {
        $conexion = self::conectar();
        $sentencia = $conexion->prepare($sql);
        $sentencia->execute();
        $data = $sentencia->fetchAll(PDO::FETCH_ASSOC);

        $datos = [];
        foreach ($data as $k => $v) {
            $datos[] = array_change_key_case($v, CASE_LOWER);
        }
        return $datos;
    }
    
public function traer($sql)
{
    $conexion = self::conectar();
    $sentencia = $conexion->prepare($sql);
    $sentencia->execute();
    $data = $sentencia->fetchAll(PDO::FETCH_ASSOC);
    $datos = [];
    foreach($data as $key => $value){
        $datos[] = array_change_key_case($value, CASE_LOWER);
 }
 return $datos;
}
}
?>