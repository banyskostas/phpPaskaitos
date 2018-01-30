<?php

final class Memory extends Device implements ProductInterface{
	public $type;
	public $amount;
	public $speed;
	
	public function setType($type){
		$this->type=$type;
	}
	public function setSpeed($speed){
		$this->speed=$speed;
	}
	public function setAmount($amount){
		$this->$amount=$amount;
	}
	
	public function getCard(){
		return  "RAM atmintis: $this->model <br> ".
				"Gamintojas: $this->manufacturer <br>".
				"Tipas: $this->type <br> ".
				"Greitis: $this->speed <br>".
				"Kiekis: $this->amount <br>".
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
		return "RAM: $this->model";
	}
}