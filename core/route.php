<?php 
    class route{
        function HandleRoute($url){
            global $routes;
            unset($routes["default_controller"]);
            $url = trim($url,"/");
            foreach($routes as $key=>$value){
                if(preg_match('~'.$key.'~is',$url)){
                    $url = preg_replace('~'.$key.'~is',$value,$url);
                }
            }
            return $url;
        }

        function CheckFile(&$url){
            $urlcheck = "";
            foreach($url as $key=>$item){
                $urlcheck .= $item."/";
                $filecheck = rtrim($urlcheck,"/");
                $fileArr = explode("/",$filecheck);
                $fileArr[count($fileArr)-1] = ucfirst($fileArr[count($fileArr)-1]);
                $filecheck = implode("/",$fileArr);
                if(!empty($url[$key-1])){
                    unset($url[$key-1]);
                }
                if(file_exists("app/controllers/$filecheck".".php")){
                    return $filecheck;
                }
            }
        }
    }
?>