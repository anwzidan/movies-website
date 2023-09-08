<?php

namespace PROJECT\Controllers;
use PROJECT\Models\AdminModel;
use PROJECT\LIB\InputFilter;
class AdminController extends AbstractController
{
    use  InputFilter;
    public function notFoundAction()
    {
        $this->_view();
    }
    public function loginAction(){
    if(isset($_SESSION['login']) && $_SESSION['login']=="t")
    {
        $this->redirect("/../movie");
            exit();
    }
     if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])){
        $admin = AdminModel::getByPK($this->filterString($_POST['username']));
        if($admin =! false &&isset($admin->Password) && $admin->Password === $_POST['password']){
            
            $this->_data['isLoginSucsses'] = true;
            $_SESSION['login']= "t" ;
        }else{
            $this->_data['isLoginSucsses'] = false;}
    }
    //    var_dump($this->_data);
    //     show($_SERVER);
        $this->_view();
        
    }
    public function logoutAction()
    {   
       session_unset();
       session_destroy();
       session_write_close();
       $this->redirect('/admin/login');
       exit();
    }
    
    public function defaultAction(){

        $this->redirect('/admin/login/');
        exite();
       
    }

    public function isAuthorized()
    {
        return (isset($_SESSION['login']) && $_SESSION['login']='t');
    }
}