<?php
namespace App\Modules\Categories\Models;

use Lib\Core\Model;



 class CategoriesDAO  {
	
  public   $errors = array(),
			$name,
			$slug;
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
	 
	  if (empty($this->id) || empty($this->name) ||  empty($this->slug)  ) {
		 return false;
	 }
	 else {
		 
		 return true;
	 }
    }
    
    else 
    {
		 if ( empty($this->name) ||  empty($this->slug) ) {
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



 
  public function id()
  {
    return $this->id;
  }
 
 public function name()
  {
    return $this->name;
  }
 
 
  public function slug()
  {
    return $this->slug;
  }
  
 
  
}
