<?php

require_once 'auxiliar.php';

class Cliente
{
    public $id;
    public $dni;
    public $nombre;
    public $apellidos;
    public $direccion;
    public $codpostal;
    public $telefono;

    public static PDO $pdo;

    public static function buscar_por_id($id): ?Cliente
    {
        $pdo = Cliente::pdo();
        $sent = $pdo->prepare('SELECT * FROM clientes WHERE id = :id');
        $sent->execute([':id' => $id]);
        return $sent->fetchObject(Cliente::class)?:null;
    }

    /**
     * Devuelve todos los clientes.
     * 
     * @return Cliente[]
     */
    
    public static function todos(): array
    {
        $pdo = Cliente::pdo();
        $sent = $pdo->query('SELECT * FROM clientes');
        return $sent->fetchAll(PDO::FETCH_CLASS, Cliente::class);
    }

    public function borrar(): void{
        $pdo = conectar();
        $sent = $pdo->prepare("DELETE FROM clientes WHERE id = :id");
        $sent->execute([':id' => $this->id]);
    }
    
    public function __construct(array $fila = [])
    {
        foreach ($fila as $k => $v){
            $this->$k = $v;
        }
    
    }

    public function guardar(): void
    {
        $pdo = Cliente::pdo();
        $sent = $pdo->prepare('INSERT INTO clientes (dni, nombre, apellidos, direccion, codpostal, telefono)
                                   VALUES (:dni, :nombre, :apellidos, :direccion, :codpostal, :telefono)');
        $sent->execute([
                ':dni'       => $this->dni,
                ':nombre'    => $this->nombre,
                ':apellidos' => $this->apellidos,
                ':direccion' => $this->direccion,
                ':codpostal' => $this->codpostal,
                ':telefono'  => $this->telefono,
            ]);
    }

    public static function pdo():PDO
    {
        Cliente::$pdo = Cliente::$pdo??conectar();
        return Cliente::$pdo;
    }

}


