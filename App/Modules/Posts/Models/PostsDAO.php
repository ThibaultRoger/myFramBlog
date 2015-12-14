<?php
namespace App\Modules\Posts\Models;

use Lib\Core\Model;

 class PostsDAO  {
	
  public   $errors = array(),
			$name,
			$content,
			$created,
			$online,
			$slug,
			$category_id,
			$pathimg;
 
 public $id; 
 
 public function __construct( $data = array() ) {
	 
	 if(!empty($data)) {
		 
		 $this->hydratedata($data);
	 }
	 
 }
 
 public function hydratedata($hydrate) {
	 
	 foreach ($hydrate as $key => $value) {
		 
		 $methode = 'set'.ucfirst($key);
		 
		 if (is_callable(array($this, $methode))) {
			 
			 $this->$methode($value);
		 }
	 }
 }
 
 
 public function valide($requete = NULL)
 
 {
	 if ($requete == NULL) {
	 
	  if (empty($this->id) || empty($this->name) ||  empty($this->content) ||  empty($this->slug) ||  empty($this->online) ||  empty($this->category_id)  ) {
		 return false;
	 }
	 else {
		 
		 return true;
	 }
    }
    
    else 
    {
		 if ( empty($this->name) ||  empty($this->content) ||  empty($this->slug) ||  empty($this->online) ||  empty($this->category_id) ) {
		 return false;
	 }
	 else {
		 
		 return true;
	 }
	}
    
    
 }
  public function setId($id)
  {
   
    if (is_numeric($id) && !empty($id))
    {
      $this->id = $id;
    }
    else
	{
    $this->error['id'] = 'Le champ id a été incorrectement rempli ou est vide';
     }
  }
 
  public function setContent($content)
  {
    if (is_string($content) || !empty($content))
    {
     $this->content = $content;
    }
  else
	{
    $this->error['content'] = 'Le champ content a été incorrectement rempli ou est vide';
     }
  }
  
  
  public function setPathimg($pathimg)
  {
    if (is_string($pathimg) || !empty($pathimg))
    {
     $this->pathimg = $pathimg;
    }
  else
	{
    $this->error['pathimg'] = 'Le champ pathimg a été incorrectement rempli ou est vide';
     }
  }
  
  
 
  public function setName($name)
  {
    if (is_string($name) || empty($name))
    {
     $this->name = $name;
    }
 else
	{
    $this->error['name'] = 'Le champ name a été incorrectement rempli ou est vide';
     }
 
  }
 

public function setSlug($slug)
  {
    if (is_string($slug) || empty($slug))
    {
     $this->slug= $slug;
    }
 
   else
	{
    $this->error['slug'] = 'Le champ slug a été incorrectement rempli ou est vide';
     }
  }



 public function setCreated($created)
  
 {
	
	if(preg_match('/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/', $created))
	{
   $this->created = $created;
	}
	else
	{
    $this->error['created'] = 'Le champ created a été incorrectement rempli ou est vide';
     } 
    
  }

 
 
 public function setCategory_id($category_id)
  {
   
    if (is_numeric($category_id) && !empty($category_id))
    {
      $this->category_id = $category_id;
     }
      
      else
	{
    $this->error['category_id'] = 'Le champ category_id a été incorrectement rempli ou est vide';
     }
     
    }
 
 
 
 public function setOnline($online)
  {
   
    if (is_numeric($online) && !empty($online))
    {
      $this->online = $online;
    }
    
    else
	{
    $this->error['online'] = 'Le champ online a été incorrectement rempli ou est vide';
     }
 }
 
  public function id()
  {
    return $this->id;
  }
 
 public function name()
  {
    return $this->name;
  }
 
  public function content()
  {
    return $this->content;
  }
 
  public function created()
  {
    return $this->created;
  }
  
  public function online()
  {
    return $this->online;
  }
   
  
  public function slug()
  {
    return $this->slug;
  }
  
  
  public function category_id()
  {
    return $this->category_id;
  }
  
   public function pathimg()
  {
    return $this->pathimg;
  }
  
}
