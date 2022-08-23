<?php 
    class App{
        private $__controller, $__action,$__params;

        function __construct()
        {
            global $routes;
            $this ->handleUrl();
            if(!empty($routes["default_controller"])){
                $this ->__controller = $routes["default_controller"];
            }
            $this ->__params = [];
            $this ->__action = "index";
        }

        function getUrl(){
            if(!empty($_SERVER["PATH_INFO"])){
                $url = $_SERVER["PATH_INFO"];
            }else{
                $url = "/";
            }

            return $url;
        }

        public function handleUrl(){
            global $routes;
            $url = $this->getUrl();
            $urlArr = array_filter(explode("/",$url));
            $urlArr = array_values($urlArr);

            // xu ly controllers
            if(!empty($urlArr[0])){
                $this ->__controller = $urlArr[0];
            }else{
                $this->__controller = $routes["default_controller"];
            }

            $file = "app/controllers/".($this->__controller).".php";
            if(file_exists($file)){
                require $file;
                if(class_exists($this->__controller)){
                    $this->__controller = new $this->__controller();
                    unset($urlArr[0]);
                }
            }else{
                $this-> loadErr();
            }

            //xu ly action
            if(!empty($urlArr[1])){
                $this-> __action = $urlArr[1];
                unset($urlArr[1]);
            }else{
                $this-> __action = "index";
            }

            //xu ly param
            $this-> __params = array_values($urlArr);

            //Kiem tra method ton tai
            if(method_exists($this->__controller,$this->__action)){
                call_user_func_array([$this->__controller,$this->__action],$this->__params);
            }else{
                $this->loadErr();
            }
        }

        function loadErr($name = "404"){
            require "app/errors/$name.php";
        }
    }
?>