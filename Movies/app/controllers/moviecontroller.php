<?php 
namespace PROJECT\Controllers;

use PROJECT\LIB\FrontController;
use PROJECT\Models\MovieModel;
use PROJECT\LIB\InputFilter;

class MovieController extends AbstractController {
   USE InputFilter;


    public function defaultAction(){
      $this->redirect('/movie/home');
      exit();
    }
    public function newAction(){
      if(!(isset($_SESSION['login']) && $_SESSION['login']=="t"))
      {
        $this->redirect('/admin/login');
        exit();
      }
        $errors=[];
        if(isset($_POST['submit']))
        {
            

        if(!isset($_POST['name'])){
            $errors['name_err']="please set name"; 
         }elseif($this->filterString($_POST['name'])=='')
         {
            $errors['name_err']="please set vailed name";
         }

        if(!isset($_POST['simple_desc'])){
            $errors['simple_desc_err']="please set simple description";
         } elseif($this->filterString($_POST['simple_desc'])=='')
         {
            $errors['simple_desc_err']="please set vailed simple description";
         }

        if(!isset($_POST['full_desc'])){
            $errors['full_desc_err']="please set full description";
         } elseif($this->filterString($_POST['full_desc'])=='')
         {
            $errors['full_desc_err']="please set vailed simple description";
         }
        if(!isset($_FILES['video'])|| $_FILES['video']['name']==''){
            $errors['video_err']="please set video";
         }
        if(!isset($_FILES['cover']) || $_FILES['cover']['name']==''){
            $errors['cover_err']="please set cover photo";
        }
        if(empty($errors)){
          if(!$_FILES['video']['error']==0){
            $errors['video_err'] = "error in this video file ";
            show($_FILES['video']);
          }
          if(!$_FILES['cover']['error']==0){
            $errors['cover_err'] = "error in this cover photo file ";
          }
            if(empty($errors)){
          $image_extensions_allowed = array('jpg', 'jpeg', 'png');
          $video_extensions_allowed = array('mp4');
          if(!in_array(pathinfo($_FILES["video"]["name"], PATHINFO_EXTENSION ),$video_extensions_allowed)){
            $errors['video_err'] = "video file type isn't supported !!";
          }
          if(!in_array(pathinfo($_FILES["cover"]["name"], PATHINFO_EXTENSION ),$image_extensions_allowed)){
            $errors['cover_err'] = "cover photo file type isn't supported !!";
          } 
             if(empty($errors)){
               

            $Name = $this->filterString($_POST['name']); 
            $Simple_desc = $this->filterString($_POST['simple_desc']);
            $Full_desc= $this->filterString($_POST['full_desc']);
            $Movie_Path = $Name.date(' d_m_Y_h_i_s', time()).".".pathinfo($_FILES["video"]["name"], PATHINFO_EXTENSION);
            $Cover_Path = $Name.date(' d_m_Y_h_i_s', time()).".".pathinfo($_FILES["cover"]["name"], PATHINFO_EXTENSION);
                    
            $movie =new MovieModel();
            $movie->Name=$Name;
            $movie->Simple_desc= $Simple_desc;
            $movie->Full_desc= $Full_desc;   
            $movie->Movie_Path  = $Movie_Path; 
            $movie->Cover_Path= $Cover_Path;
            $movie->save();

            move_uploaded_file($_FILES['video']['tmp_name'],VIDEOS_PATH.$Movie_Path);
            move_uploaded_file($_FILES['cover']['tmp_name'],COVERS_PATH . $Cover_Path);
           

        }
        
     }
     }
      }
      
      $this->_data['errors']=$errors;
     
      $this->_view();
      
    }
    public function homeAction(){
       MovieModel::getAll();
      $this->_data['movies'] = MovieModel::getAll();
      
      // show($this->_data);
      $this->_view();
     
    }
    public function watchAction(){
      if(count($this->_params) != 1)
      {
        $this->setAction( FrontController::NOT_FOUND_ACTION );
        $this->_view();
        exit();
      } 
      else
       {
           $this->_data['movie'] = MovieModel::getByPK($this->_params[0]);
          if(empty($this->_data['movie'])){
             $this->setAction( FrontController::NOT_FOUND_ACTION );
          }
         
          $this->_view();
        }

    }
    public function deleteAction(){
      if(!(isset($_SESSION['login']) && $_SESSION['login']=="t"))
      {
        $this->redirect('/admin/login');
        exit();
      }
      if(count($this->_params) != 1)
      {
        $this->setAction( FrontController::NOT_FOUND_ACTION );
        $this->_view();
        exit();
      }
      else
      {
       $movie= MovieModel::getByPK($this->_params[0]);
        if(!empty($movie))
        {

            $Movie_Path = VIDEOS_PATH.$movie->Movie_Path;
            if(file_exists($Movie_Path))
            unlink($Movie_Path);

            $Cover_Path = COVERS_PATH.$movie->Cover_Path;
            if(file_exists($Cover_Path))
            unlink($Cover_Path);
        
            if($movie->delete())
             $this->_data['message'] ='The movie was deleted successfully';
             else 
             $this->_data['message'] = 'Sorry, an error occurred during the deletion process';
              
          }  
        else 
         $this->_data['message'] = "The deletion failed, the movie was not found";

      }

      $this->_view();
     }
    } 
    