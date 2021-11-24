<?php

require_once __DIR__. "/../entity/Usuario.php";
require_once __DIR__ . '/../database/QueryBuilder.php';

class UsuarioRepository extends QueryBuilder
{
    public function __construct(){
        parent::__construct('usuarios', 'Usuario');
    }

    /**
     * Devuelve el usuario identificado por $username y $password
     *
     * @param string $username
     * @param string $password
     * @return Usuario
     */
    public function findByUserNameAndPassword(string $username, string $password): ?Usuario{
        $sql = "SELECT * FORM $this->table WHERE username = :username AND password = :password";
        $parameters = ['username' => $username,
                        'password' =>$password];
        
        try{
            $pdoSatement = $this->connection->prepare($sql);
            $pdoSatement->execute($parameters);
            $pdoSatement->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, $this->classEntity);
            $result = $pdoSatement->fetchAll();
            if(empty($result)){
                throw new NotFoundException("No se ha encontrado ningún usuario con esas credenciales");
            }
            return $result[0];
        }catch(\PDOException $pdoException){
            throw new QueryException('No se ha podido ejecutar la consulta solicitada: ' .$pdoException->getMessage());
        }
    
        return null;
    
    }

}