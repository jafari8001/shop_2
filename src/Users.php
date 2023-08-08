<?php
    class Users{
        private PDO $connection;
        public function __construct(private Database $database) {
            $this->connection = $this->database->get_connection();
        }

        public function get_all_users(string $table){
            $query = $this->database->select($table, null);
            $users = $this->connection->query($query);
            return $users;
        }
        public function get_user_by_id($id){
            
        }
        public function get_user_by_username($id){

        }
        public function get_user_by_email($id){

        }
        public function add_user(string $table, string $data){
            $query = $this->database->insert($table, $data);
            $this->connection->exec($query);
        }
        public function login_user($data){

        }
        public function logout_user($data){

        }
        public function delete_user(){

        }
        public function update_user(){

        }


    }
    
?>