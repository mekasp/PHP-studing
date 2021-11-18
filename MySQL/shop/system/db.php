<?php

class DB {
    private $connection;

    public function connect($host, $user, $password, $database){
        $this->connection = mysqli_connect($host, $user, $password, $database);
    }

    public function query($query){
        $result = mysqli_query($this->connection, $query);

        $error = mysqli_error($this->connection);

        return [
            'result' => $result,
            'error' => $error,
        ];
    }
}