<?php

include 'DAO/DB.php';
include "models/Album.php";

class AlbumDao {
    private $connect;
    private $album;
    
    public function AlbumDao() {
        $db = new Database();
    	$this->connect = $db->con_open();
    }
    
    public function getFields(){
    	$sql = "SHOW COLUMNS FROM album";
    	$result = $this->connect->query($sql);
    	if ($result) {
    	    $fields = array();
    		while ($row = $result->fetch_array()) {
    			$fields[] = $row['Field'];
    		}
    		return $fields;    		
    	}
    }
    
    public function getAll(){
    	// TODO
    	$albuns = array();
    	$sql = "select * from album";
    	$result = $this->connect->query($sql);
    	if($result){
    		while (list($id, $title, $description, $userId) = $result->fetch_array()){
    			$album = new Album($id, $title, $description, $userId);
    			$albuns[] = $album;
    		}
    	}
    	return $albuns;
    }
    
    public function fetchAlbuns($result){
    	$albuns = array();
    	if($result){
    		while (list($id, $title, $description, $userId) = $result->fetch_array()){
    			$album = new Album($id, $title, $description, $userId);
    			$albuns[] = $album;
    		}
    	}
    	return $albuns;
    }
    
    public function getAllByFilterStr($title, $description){
    	$albuns = array();
    	$sql = "select * from album where title = ? and description = ?";
    	$stmt = $this->connect->prepare($sql);
    	$stmt->bind_param("ss", $title, $description);
    	$stmt->execute();
    	$stmt->close();
    	return $this->fetchAlbuns($result);
    }
    
    public function getAllByUserId($userID) {
    	$sql = "select * from album where user = ?";
    	$stmt = $this->connect->prepare($sql);
    	$stmt->bind_param("d", $userID);
    	$stmt->execute();
    	$result = $stmt->get_result();
    	$stmt->close();
    	return $this->fetchAlbuns($result);
    }
    
    public function insert($album) {
    	$sql = "insert INTO album VALUES (?,?,?)";    // TODO Add Date field
    	$stmt = $this->connect->prepare($sql);
    	$stmt->bind_param("ssu", $album->getTitle(), $album->getDescription(), $album->getUserId());
    	$stmt->execute();
    	$affected_rows = $stmt->affected_rows;
    	$stmt->close();
        return $affected_rows;
    }
    
    public function update($album){
    	$sql = "UPDATE album SET title=? description=? WHERE id=?";
    	$stmt = $this->connect->prepare($sql);
    	$stmt->bind_param("ssd", $album->getTitle(), $album->getDescription(), $album->getID());
    	$affected_rows = $stmt->affected_rows;
    	$stmt->close();
        return $affected_rows;
	}
    
    // Deletes the supplied user from the database.
    public function delete($album) {
    	// TODO
        $affectedRows = 0;
        return $affectedRows;
    }
}

?>