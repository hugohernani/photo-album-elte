<?php
class Album {
	protected $id;
	protected $title;
	protected $description;
	protected $userId;
	
	function __construct($id, $title, $description, $userId)
	{
		$this->id = $id;
		$this->title = $title;
		$this->description = $description;
		$this->userId = $userId;
	}
	
	public function setId($Id) {
		$this->id = $Id;
	}
	
	public function getID() {
		return $this->id;
	}
	
	public function setTitle($title){
		$this->title = $title;
	}
	
	public function getTitle(){
		return $this->title;
	}
	
	public function setDescription($description){
		$this->description = $description;
	}
	
	public function getDescription(){
		return $this->description;
	}
	
	public function setUserId($userId){
		$this->userId = $userId;
	}
	
	public function getUserId(){
		return $this->userId;
	}
}
?>