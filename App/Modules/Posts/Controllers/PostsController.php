<?php
namespace App\Modules\Posts\Controllers;
use Lib\Core\Controller;
use Lib\Core\Cache;
use App\Modules\Posts\Models\Posts;
use App\Modules\Posts\Models\PostsDAO;
  
  class PostsController extends Controller {
    
  
   
  public function index(){
	$cache = new Cache();
 $cache->start(); 
       $appel = new Posts();
       $posts = $appel->findall();
     $this->variable('posts', $posts); 
	$this->render('index', 'Posts');
	 $cache->end();
	}
	
	
	
	public function bycat(){
       $cache = new Cache();
   $cache->start();
       $appel = new Posts();
        $posts = $appel->findbycat($_GET['id']);
     $this->variable('posts', $posts);
      $this->render('index', 'Posts');
		$cache->end();
	}
	
	public function show(){
		$cache = new Cache();
 $cache->start();
		$appel = new Posts();
	$posts = $appel->findbyid($_GET['id']);
	 $this->variable('post', $posts);
		  $this->render('show','Posts');
		  $cache->end();
	}
	
	function last(){
		$appel = new Posts();
        $posts = $appel->findlast();
        return $posts;
	}
	
	

      	public function admin(){
			if($this->Session->user('role') == 'admin'){
				echo $this->Session->user('role');
		$appel = new Posts();
       $posts = $appel->admin();
     $this->variable('posts', $posts); 
	$this->render('admin', 'Posts','admin');
}
else {
	
	$this->redirection('');
}
	}




	public function edit(){
		
		if($this->Session->user('role') == 'admin'){
			
			if(isset($this->request['name'])){
				
				if(!empty($_FILES['pathimg']['name'])) {
				$this->request['pathimg'] = $_FILES['pathimg']['name'];
				}
				else {
					$this->request['pathimg'] = $this->request['img'];
				}
				$validation = new PostsDao($this->request);
			
				if ($validation->valide()) {
					
					$dir = $this->baseDir2.'/web/img/'.$_FILES['pathimg']['name'];
                    $resultat = move_uploaded_file($_FILES['pathimg']['tmp_name'],$dir);
					$save = new Posts();
				$save->update($validation);
				$cache = new Cache();
				$location = $this->uri.'/posts/'.$this->request['purge'];
                $cache->purge_all();
				$this->Session->setFlash('l\'enregistre a été effectué'); 
			}
				$appel = new Posts();
	$posts = $appel->findbyid($_GET['id']);
	
	$model = $this->model('Categories','Categories');
	$idcat = $model->findid();
	 $this->variable('value', $posts);
		$this->variable('id', $_GET['id']); 
		$this->variable('idcat', $idcat);
		$this->render('edit', 'Posts','admin');
				
				
			}
		
		
		
		
		$appel = new Posts();
	$posts = $appel->findbyid($_GET['id']);
	
	$model = $this->model('Categories','Categories');
	$idcat = $model->findid();
	 $this->variable('value', $posts);
		$this->variable('id', $_GET['id']); 
		$this->variable('idcat', $idcat);
		$this->render('edit', 'Posts','admin');
			

		
	}
	else {
	
	$this->redirection('');
}
	}



 public function insert() {
	 
	 if($this->Session->user('role') == 'admin'){
	 if(isset($this->request['name'])){
				
				$this->request['pathimg'] = $_FILES['pathimg']['name'];
				$validation = new PostsDao($this->request);
			
				if ($validation->valide('insert')) {
				$dir = $this->baseDir2.'/web/img/'.$_FILES['pathimg']['name'];
                 $resultat = move_uploaded_file($_FILES['pathimg']['tmp_name'],$dir);
					$save = new Posts();
				$save->insert($validation);
				$cache = new Cache();
                $cache->purge_all();
                $this->redirection('posts/admin');
				
			}
	 
	else {
		            
					if(isset($validation->error)) {
					foreach ($validation->error as $k => $v ) {
						
						echo '<br>'.$v;
				} 
			} 
        } 
	
	
	
	}
        
       
         
         $this->render('edit', 'Posts','admin');
         
	 }
	 else {
	
	$this->redirection('');
}
	 
	 
}




public function delete() {
	if($this->Session->user('role') == 'admin'){
	 if(isset($_GET['id'])){
	 $appel = new Posts();
	 $appel->delete($_GET['id']);
	 $this->redirection('posts/admin');
	
                    }
}
else {
	
	$this->redirection('');
}
}




public function search(){

	
       $posts =new Posts();
     $this->variable('posts', $posts->search($this->request['search'])); 
	$this->render('index', 'Posts');
	
	
	
	}
  

  }
?>
