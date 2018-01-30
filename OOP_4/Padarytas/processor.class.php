<?php
final class Processor extends Device implements ProductInterface{
	protected $socket;
	protected $speed;
	protected $cores;
	
	public function setSocket($socket){
		$this->socket=$socket;
	}
	public function setSpeed($speed){
		$this->speed=$speed;
	}
	public function setCores($cores){
		$this->cores=$cores;
	}
	
	public function getCard(){
		return  "Procesorius: $this->model <br> ".
				"Gamintojas: $this->manufacturer <br>".
				"Greitis: $this->speed <br>".
				"Socket: $this->socket <br>".
				"Cores: $this->cores <br>".
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
	
	public function getName() {
		return "Procesorius: $this->model";
	}
	
	
}