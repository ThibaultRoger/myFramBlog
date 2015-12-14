<?php
namespace App\Modules\Categories\Models;

use Lib\Core\Model;

use PDO;
  class Categories extends Model {


 public function findall () {
	$sql = 'SELECT * FROM categories';
	$pre = $this->db->prepare($sql); 
		$pre->execute(); 
		return $pre->fetchAll(PDO::FETCH_OBJ);
		
	}
	
	
	public function findid() {
		
		$sql = 'SELECT id FROM categories';
		$pre = $this->db->prepare($sql); 
		$pre->execute(); 
		return $pre->fetchAll(PDO::FETCH_OBJ);
	}
	
	public function findcatbyid($id) {
		
		$sql = 'SELECT * FROM categories
		         WHERE id='.$id;
		$pre = $this->db->prepare($sql); 
		$pre->execute(); 
	return current($pre->fetchAll(PDO::FETCH_OBJ));
	}
	
	public function findbyid ($id) {
	
	$sql = 'SELECT p.id,p.content,p.name,p.slug,c.name as catname,c.slug as catslug FROM posts as p INNER JOIN categories as c ON p.category_id = c.id WHERE p.id ='.$id ;
	$pre = $this->db->prepare($sql); 
		$pre->execute(); 
		return current($pre->fetchAll(PDO::FETCH_OBJ));
		
	}
	
	
	
	public function findFirst($req){
		return current($this->find($req)); 
	}
	


public function update($categorie) {
		$sql = 'UPDATE categories as c
				SET c.name=:name,
					c.slug=:slug
					WHERE c.id=:id ';
	
	             $pre = $this->db->prepare($sql); 
		          $pre->execute(array(
		          'name' => $categorie->name(),
		          'slug' => $categorie->slug(),
		          'id' => $categorie->id()
		           )); 
		          
		     
		          
	}
     
     public function insert($categorie) {
		 
		$sql = ' INSERT INTO categories (name,slug)
				VALUES (:name,:slug)';
		 $pre = $this->db->prepare($sql); 
		          $pre->execute(array(
		          'name' => $categorie->name(),
		          'slug' => $categorie->slug()
		           )); 
	              
	              
	 }
	 
	 public function delete($delete) {
		 
		 $sql = 'DELETE FROM categories
                  WHERE id = '.$delete;
		 
		 $pre = $this->db->prepare($sql); 
		$pre->execute(); 
		 
	 }


  }
?>
