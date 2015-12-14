<?php
namespace App\Modules\User\Controllers;
use Lib\Core\Controller;
use App\Modules\User\Models\User;
use App\Modules\User\Models\UserDAO; 
  class UserController extends Controller {
    
  
   
  function login(){
	  
		if(isset($this->request['login'])){
		
			$password = sha1($this->request['password']); 
		      $appel = new User();
        $req = $appel->finduser($this->request['login'],$password);
			if(!empty($req)){
				$this->Session->write('User',$req); 
				
			}
			
		}
		else {
		$this->render('login', 'User');
	}
		if($this->Session->isLogged()){
			if($this->Session->user('role') == 'admin'){
				$this->render('edit', 'User', 'admin');
			}else{
				$this->redirect('');
			}
		}
	
	
	}
	
	
	public function logout(){
		unset($_SESSION['User']);
		$this->Session->setFlash('Vous ête mainenant déconnecté'); 
		$this->redirection(''); 
	}
	

  }
?>
