<?php

class Database
{
    public $connection;

    public function __construct()
    {
        //$dsn = "mysql:host=localhost;port=3306;dbname=myapp;user=root;charset=utf8mb4";
        //DDEV DB connection
        $dsn = "mysql:host=db;port=3306;dbname=db;user=db;password=db;charset=utf8mb4";

        $this->connection = new PDO($dsn);
    }

    public function query($query)
    {
        $statement = $this->connection->prepare($query);

        $statement->execute();

        return $statement;
    }
}