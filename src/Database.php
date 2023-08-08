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
    public function create_tabl(): void{
        $database = $this->get_connection();

        $database->exec("CREATE TABLE IF NOT EXISTS users (
            id INT PRIMARY KEY AUTO_INCREMENT,
            username VARCHAR(255) NOT NULL,
            password VARCHAR(255) NOT NULL,
            email VARCHAR(255) NOT NULL,
            role ENUM('admin', 'user') NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            deleted_at TIMESTAMP NULL
        )");
        $database->exec("CREATE TABLE IF NOT EXISTS products (
            id INT PRIMARY KEY AUTO_INCREMENT,
            name VARCHAR(255) NOT NULL,
            price DECIMAL(10, 2) NOT NULL,
            views INT DEFAULT 0,
            sales INT DEFAULT 0,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            deleted_at TIMESTAMP NULL
        )");
        $database->exec("CREATE TABLE IF NOT EXISTS carts (
            id INT PRIMARY KEY AUTO_INCREMENT,
            user_id INT NOT NULL,
            products TEXT NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )");
        $database->exec("CREATE TABLE IF NOT EXISTS carts (
            id INT PRIMARY KEY AUTO_INCREMENT,
            user_id INT NOT NULL,
            products TEXT NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )");
        $database->exec("CREATE TABLE IF NOT EXISTS comments (
            id INT PRIMARY KEY AUTO_INCREMENT,
            user_id INT NOT NULL,
            product_id INT NOT NULL,
            content TEXT NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )");
    }
    public function insert(string $table, $data): string{
        $keys = implode(",",array_keys($data));
        $values = "'".implode("','",array_values($data))."'";
        $query = "INSERT INTO $table ($keys) VALUES ($values)";
        return $query;
    }
    public function select(string $table, ?string $condition): string{
        if ($condition) {
            $query = "SELECT * FROM $table WHERE $condition";
            return $query;
        }
        $query = "SELECT * FROM $table";
            return $query;
    }
}

?>