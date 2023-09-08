<?php 
namespace PROJECT\Controllers;

use PROJECT\LIB\FrontController;

class IndexController extends AbstractController {

    public function defaultAction(){
        echo '123';
        $this->_view();
    }
}

?>