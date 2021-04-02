<?php

class App {

  //properties default app
  protected $controller = 'Home';
  protected $method = 'index';
  protected $params = [];
  
  public function __construct(){
    $url = $this->parseURL();
    
    //controller
    if (file_exists('../app/controllers/' . $url[0] . '.php')) {
      # code...
      $this->controller = $url[0];
      unset($url[0]);
    }

    require_once '../app/controllers/' . $this->controller . '.php';
    $this->controller = new $this->controller;

    //method
    if (isset($url[1])) {
      # code...
      if (method_exists($this->controller,$url[1])) {
        # code...
        $this->method = $url[1];
        unset($url[1]);
      }
    }

    // params
    if (!empty($url)) {
      # code...
      $this->params = array_values($url);
    }


    // jalankan controller & method , serta kirimkan params jika ada

    call_user_func_array([$this->controller, $this->method], $this->params);



  }

  public function parseURL(){
    if(isset($_GET['url'])){
      $url = rtrim($_GET['url'],'/'); //rtrim berfungsi untuk remove trim. disini utk menghilangkan tanda slash diakhir url
      $url = explode('/',$url);
      return $url;
    }
  }
}