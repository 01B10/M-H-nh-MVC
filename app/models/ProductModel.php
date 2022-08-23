<?php 
    class ProductModel{
        public function getProductLists(){
            return [
                'SP1',
                'SP2',
                'SP3',
            ];
        }

        public function getdetail($id){
            $product = [
                "SP1",
                "SP2",
                "SP3",
                "SP4",
            ];
            return $product[$id];
        }
    }
?>