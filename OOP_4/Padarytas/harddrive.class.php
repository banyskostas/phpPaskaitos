<?php


class HardDrive extends Device implements ProductInterface{
	public $amount;
	
	public function setAmount($amount){
		$this->amount=$amount;
	}
	
	public function getCard(){
		return  "Kietasis diskas: $this->model <br> ".
				"Gamintojas: $this->manufacturer <br>".
				
				"Talpa: $this->amount <br>".
				"----------------- <br>".
				$this->getInventoryDetails();
	}
	public function __toString(){
		return $this->getCard();
	}
	
	public function setPrice($price){
		$this->price=$price;
	}
	
	public function getPrice(){
		return $this->price;
	}
	
	public function getName(){
		return "HDD: $this->model";
	}
}