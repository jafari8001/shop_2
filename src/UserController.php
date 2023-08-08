<?php
    class UserController{
        private $users;
        private $table_name;
        public function __construct() {
            $this->users = new Users();
        }
        public function user_request(string $method, ?string $id): void{
            if ($id) {
                $this->process_resorce_request($method, $id);
            }else {
                $this->process_collection_request($method);
            }
        }

        private function process_resorce_request($method, $id){

        }
        private function process_collection_request($method){
            switch ($method) {
                case 'GET':
                    echo json_encode($this->users->get_all_users($this->table_name));
                    break;
                
                default:
                    # code...
                    break;
            }
        }

        

    }

?>