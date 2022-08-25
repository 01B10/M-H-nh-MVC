<?php 
    class product extends controller{
        public $data = [];

        public function index(){
            echo "List product!!";
        }

        public function list_product(){
            $product = $this->model("ProductModel");
            $dataproduct = $product ->getProductLists();
            $this->data["product_list"] = $dataproduct;
            $this->data["page_title"] = "DS SP";

            //Render
            $this-> render("product/list",$this->data);
        }

        public function detail($id=0){
            $produc = $this->model("ProductModel");
            $this->data["sub"]["infor"] = $produc->getdetail($id);
            $this->data["content"] = "product/detail";
            $this->render("layout/client_layout",$this->data);
        }
    }
?>