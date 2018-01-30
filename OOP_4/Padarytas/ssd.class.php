<?php


final class SSDHardDrive extends HardDrive implements ProductInterface{
	public $speed;
	
	public function setSpeed($speed){
		$this->speed=$speed;
	}
	
	public function getCard(){
		return  "SSD diskas: $this->model <br> ".
				"Gamintojas: $this->manufacturer <br>".
				"Greitis: $this->speed <br>".
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
		return "SSD: $this->model";
	}
}