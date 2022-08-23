<?php 
    class HomeModel{
        protected $_table = 'products';

        public function getList(){
            $data = [
                'Item1',
                'Item2',
                'Item3',
            ];
            return $data;
        }
    }
?>