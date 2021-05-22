<?php

namespace app\core;
use app\core\View;

abstract class Controller
{
    public $route;
    public $view;
    public $acl;
    public $model;

    public function __construct($route)
    {
        $this->route=$route;    
        $_SESSION['authorize']['id'] = 1;
        if(!$this->checkAcl()){
            View::errors(403);
        }
        $this->view= new View($route);
        $this->model = $this->loadModel($route['controller']);
    }

    /**
     * @param $name
     * @return mixed
     */
    public function loadModel($name)
    {
        $path = 'app\models\\'.ucfirst($name);
        if (class_exists($path)) {
            return new $path;
        }
    }


    /**
     * Necessary to check in Access Control List
     * @return bool
     */
    public function checkAcl()
    {
        $this->acl = require 'app/acl/'.$this->route['controller'].'.php';
        if($this->isAcl('all')){
            return true;
        }
        elseif(isset($_SESSION['authorize']['id']) && $this->isAcl('authorize')){
            return true;
        }
        elseif(!isset($_SESSION['authorize']['id']) && $this->isAcl('guest')){
            return true;
        }
        elseif(isset($_SESSION['admin']) && $this->isAcl('admin')){
            return true;
        }
        return false;    
    }

    /**
     * @param $key
     * @return bool
     */
    public function isAcl($key)
    {
        return in_array($this->route['action'], $this->acl[$key]);
    }
    

}