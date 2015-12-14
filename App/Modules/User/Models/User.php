<?php
namespace App\Modules\User\Models;

use Lib\Core\Model;


use PDO;

  class User extends Model {
    
    
	
 public function finduser($login,$password) {

	$sql = "SELECT u.id,u.login,u.password,u.role FROM users as u WHERE login= '$login' AND password= '$password'";
    
	$pre = $this->db->prepare($sql); 
		$pre->execute(); 
		return current($pre->fetchAll(PDO::FETCH_OBJ));
		
	}
	
	
  }
?>
