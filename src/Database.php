<?php

class Database {
    public function __construct(private string $host,
                                private string $db_user,
                                private string $db_pass,
                                private string $db_name) {}

    public function get_connection(): PDO {
        $dsn = "mysql:host={$this->host};dbname={$this->db_name};charset=utf8";
        return new PDO($dsn, $this->db_user, $this->db_pass);
    }
}

?>