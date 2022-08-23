<?php 
    class controller{
        public function model($model){
            if(file_exists(_DIR_ROOT.'/app/models/'.$model.'.php')){
                require _DIR_ROOT.'/app/models/'.$model.'.php';
                if(class_exists($model)){
                    $model = new $model();
                    return $model;
                }
            }
        }
    }
?>