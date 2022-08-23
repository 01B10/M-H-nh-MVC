<?php 
    class product extends controller{
        public function index(){
            echo "List product!!";
        }

        public function list_product(){
            $product = $this->model("ProductModel");
            $data = $product ->getProductLists();
            echo "<pre>";
            print_r($data);
            echo "</pre>";
        }
    }
?>