<?php

    require_once __DIR__ ."/../exceptions/QueryException.php";
    require_once "./database/Connection.php";

    class QueryBuilder{
        public function __construct($connection)
        {
            $this->connection = $connection::make();
        }

        public function findAll(string $table, string $classEntity){
            $sql = "SELECT * FROM $this->table";
            try{
                $pdoStatement = $this->connection->prepare($sql);
                $pdoStatement->execute();
                $pdoStatement->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE,
                    "ProyectoWeb\\entity\\" . $this->classEntity);
                return $pdoStatement->fetchAll();
            }catch(\PDOException $pdoException){

                throw new QueryException('No se ha podido ejecutar la consulta solicitada: '.$pdoException->getMessage());

            }
        }
    }
