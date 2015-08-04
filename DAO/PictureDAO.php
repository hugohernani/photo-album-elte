<?php

include 'DAO/DB.php';
include "models/Picture.php";

class PictureDao {
    private $connect;
    private $picture;
    
    public function PictureDao() {
        $db = new Database();
    	$this->connect = $db->con_open();
    }
    
    // Executes the specified query and returns an associative array of results.
    protected function execute($sql) {
    	// TODO
    	return $this->execute($sql);
    }
    
    public function getAllByAlbumId($albumID) {
    	// TODO
    	$sql = "";
    	return $this->execute($sql);
    }
    
    //Saves the supplied picture to the database.
    public function save($picture) {
    	// TODO
        $affectedRows = 0;
        return $affectedRows;
    }
    
    // Deletes the supplied user from the database.
    public function delete($picture) {
    	// TODO
        $affectedRows = 0;
        
        return $affectedRows;
    }
}

?>