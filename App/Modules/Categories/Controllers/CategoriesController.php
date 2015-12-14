<?php
namespace App\Modules\Categories\Controllers;
use Lib\Core\Controller;
use Lib\Core\Cache;
use App\Modules\Categories\Models\Categories;
use App\Modules\Categories\Models\CategoriesDAO;
 
  class CategoriesController extends Controller {
    
    
   
  public function index(){
		
       $appel = new Categories();
        $categories = $appel->findall();
    return $categories;
		
	}
	
	
	public function show(){
		
		$appel = new Posts();
	$posts = $appel->findbyid($_GET['id']);
	 $this->variable('post', $posts);
		  $this->render('show', 'Posts');
	}
	

	
	 public function admin(){
		 
			if($this->Session->user('role') == 'admin'){
       $appel = new Categories();
        $categories = $appel->findall();
        $this->variable('categories',$categories);
     $this->render('admin', 'Categories','admin');
	}
	else {
	
	$this->redirection('');
}
	}
	


	public function edit(){
		
		if($this->Session->user('role') == 'admin'){
			
			if(isset($this->request['name'])){
				
				
				$validation = new CategoriesDao($this->request);
			
				if ($validation->valide()) {
					$save = new Categories();
				$save->update($validation);
				$cache = new Cache();
                $cache->purge_all();
				$this->Session->setFlash('l\'enregistrement a été effectué'); 
			}
				$appel = new Categories();
	$categories = $appel->findcatbyid($_GET['id']);
	 $this->variable('value', $categories);
		$this->variable('id', $_GET['id']); 
		$this->render('edit', 'Categories','admin');
				
				
			}
		
		
		
		
		$appel = new Categories();
	$categories = $appel->findcatbyid($_GET['id']);
	 $this->variable('value', $categories);
		$this->variable('id', $_GET['id']); 
		$this->render('edit', 'Categories','admin');
			

		
	}
	else {
	
	$this->redirection('');
}
	}



 public function insert() {
	 
	 if($this->Session->user('role') == 'admin'){
	 if(isset($this->request['name'])){
				
				
				$validation = new CategoriesDao($this->request);
			
				if ($validation->valide('insert')) {
				
					$save = new Categories();
				$save->insert($validation);
				$cache = new Cache();
                $cache->purge_all();
                $this->redirection('categorie/admin');
				
			}
	 
	else {
		            
					if(isset($validation->error)) {
					foreach ($validation->error as $k => $v ) {
						
						echo '<br>'.$v;
				} 
			} 
        } 
	
	
	
	}
        
       
         
         $this->render('edit', 'Categories','admin');
         
	 }
	 else {
	
	$this->redirection('');
}
	 
	 
}




public function delete() {
	if($this->Session->user('role') == 'admin'){
	 if(isset($_GET['id'])){
	 $appel = new Categories();
	 $appel->delete($_GET['id']);
	 $this->redirection('categorie/admin');
	
                    }
}
else {
	
	$this->redirection('');
}
}

	
	
	
  }
?>
