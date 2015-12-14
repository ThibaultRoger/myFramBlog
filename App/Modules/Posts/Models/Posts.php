<?php
namespace App\Modules\Posts\Models;

use Lib\Core\Model;

use PDO;
  class Posts extends Model {
  


 public function findall () {

	$sql = 'SELECT p.id,p.content,p.name,p.slug,p.category_id,c.name as catname,p.pathimg,c.slug as catslug 
			FROM posts as p 
			INNER JOIN categories as c ON p.category_id = c.id 
			ORDER BY created DESC ';
    
	$pre = $this->db->prepare($sql); 
		$pre->execute(); 
		return $pre->fetchAll(PDO::FETCH_OBJ);
		
	}
	
	
	 public function admin () {

	$sql = 'SELECT p.id,p.content,p.name,p.slug,p.online,p.pathimg,p.category_id,c.name as catname,c.slug as catslug 
			FROM posts as p INNER JOIN categories as c 
			ON p.category_id = c.id ORDER BY created DESC ';
    
	$pre = $this->db->prepare($sql); 
		$pre->execute(); 
		return $pre->fetchAll(PDO::FETCH_OBJ);
		
	}
	
	
	public function findbycat ($id) {

	$sql = 'SELECT p.id,p.content,p.name,p.slug,p.pathimg,p.category_id,c.name as catname,c.slug as catslug 
			FROM posts as p, categories as c 
			WHERE p.category_id = '.$id.' AND c.id = '.$id.' ORDER BY created DESC ';
    
	$pre = $this->db->prepare($sql); 
		$pre->execute(); 
		return $pre->fetchAll(PDO::FETCH_OBJ);
		
	}
	
	
	public function findlast () {

		$sql =  'SELECT id,name,slug 
				FROM posts 
				ORDER BY created DESC LIMIT 5 ';

	$pre = $this->db->prepare($sql); 
		$pre->execute(); 
		return $pre->fetchAll(PDO::FETCH_OBJ);
		
	}
	
	public function findbyid ($id) {
	
	$sql = 'SELECT p.id,p.content,p.name,p.slug,p.category_id,p.created,p.online,p.pathimg,c.name as catname,c.slug as catslug 
			FROM posts as p 
			INNER JOIN categories as c 
			ON p.category_id = c.id WHERE p.id ='.$id ;
			
	$pre = $this->db->prepare($sql); 
		$pre->execute(); 
		return current($pre->fetchAll(PDO::FETCH_OBJ));
		
	}
	
	
	
	public function findFirst($req){
		return current($this->find($req)); 
	}
	
	public function update($post) {
		$sql = 'UPDATE posts as p
				SET p.name=:name,
					p.slug=:slug,
					p.content=:content,
					p.category_id=:category_id,
					p.online= :online,
					p.created=:created,
					p.pathimg=:pathimg
					WHERE p.id=:id ';
	
	             $pre = $this->db->prepare($sql); 
		          $pre->execute(array(
		          'name' => $post->name(),
		          'slug' => $post->slug(),
		          'content' => $post->content(),
		          'category_id' => $post->category_id(),
		          'online' => $post->online(),
		          'created' => $post->created(),
		          'pathimg' => $post->pathimg(),
		          'id' => $post->id()
		           )); 
		          
		     
		          
	}
     
     public function insert($post) {
		 
		$sql = ' INSERT INTO posts (name,slug,content,category_id,online,created,pathimg)
				VALUES (:name,:slug,:content,:category_id,:online,:created,:pathimg)' ;
		 $pre = $this->db->prepare($sql); 
		          $pre->execute(array(
		          'name' => $post->name(),
		          'slug' => $post->slug(),
		          'content' => $post->content(),
		          'category_id' => $post->category_id(),
		          'online' => $post->online(),
		          'created' => $post->created(),
		          'pathimg' => $post->pathimg()
		           )); 
	              
	              
	 }
	 
	 public function delete($delete) {
		 
		 $sql = 'DELETE FROM posts
                  WHERE id = '.$delete;
		 
		 $pre = $this->db->prepare($sql); 
		$pre->execute(); 
		 
	 }
	 
	 
     
     public function search ($like) {

	$sql = 'SELECT p.id,p.content,p.name,p.slug,p.category_id,c.name as catname,p.pathimg,c.slug as catslug 
			FROM posts as p 
			INNER JOIN categories as c ON p.category_id = c.id 
			WHERE p.content LIKE "%'.$like.'%"
			ORDER BY created DESC ';
    
	$pre = $this->db->prepare($sql); 
		$pre->execute(); 
		return $pre->fetchAll(PDO::FETCH_OBJ);
		
	}
     
     
  }
?>
