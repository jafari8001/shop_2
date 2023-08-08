<?php

    class UserController{
        private $user_model;
        public function __construct() {
            $this->user_model = new Users();
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
                    echo json_encode([]);
                    break;
                
                default:
                    # code...
                    break;
            }
        }

        

    }

?>