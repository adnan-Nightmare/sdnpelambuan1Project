<?php

 class App{
    protected $controller = "Home";
    protected $method = "index";
    protected $parms = [];

    public function __construct(){
        $url = $this->parseURL();

        if(isset($url[0])){
            // controller
            if(file_exists('../app/controller/' . $url[0] . '.php')){
                $this->controller = $url[0];
                unset($url[0]);
            }
        }

        include '../app/controller/' . $this->controller . '.php';
        $this->controller = new $this->controller();

        // method
        if(isset($url[1])){
            if(method_exists($this->controller, $url[1])){
                $this->controller = $url[1];
                unset($url[1]);
            }
        }

        if(!empty($url[2])){
            $this->parms = array_values($url);
        }

        // menjalankan controller & method
        call_user_func_array([$this->controller, $this->method], $this->parms);
    }

    public function parseURL(){
        if(isset($_GET["url"])){
            $url = rtrim($_GET["url"],"/");
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode("/", $url);
            return $url;
        }
    }

 }