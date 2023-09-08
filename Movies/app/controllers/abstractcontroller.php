<?php
namespace PROJECT\Controllers;

use PROJECT\LIB\FrontController;


class AbstractController
{

 

    protected $_controller;
    protected $_action;
    protected $_params;
    protected $_data = [];



    public function notFoundAction()
    {
        $this->_view();
    }

    public function setController ($controllerName)
    {
        $this->_controller = $controllerName;
    }

    public function setAction ($actionName)
    {
        $this->_action = $actionName;
    }


    public function setParams ($params)
    {
        $this->_params = $params;
    }

    protected function _view()
    {
        $view = VIEWS_PATH . $this->_controller . DS . $this->_action . '.view.php';
        if($this->_action == FrontController::NOT_FOUND_ACTION || !file_exists($view)) {
            $view = VIEWS_PATH . 'notfound' . DS . 'notfound.view.php';
       
        }
        extract($this->_data);

     require_once $view;
    }

    public function redirect($path)
    {
        session_write_close();
        header("Location:". $path);
        exit;
    }
}