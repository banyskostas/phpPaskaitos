<?php
abstract class Device{
	public $serialNumber;
	public $manufacturer;
	public $model;
	public $sku;
	
	public function __construct($serialNumber, $sku){
		$this->serialNumber=$serialNumber;
		$this->sku=$sku;
	}
	
	public function setManufacturer($name){
		$this->manufacturer=$name;
	}
	
	public function setModel($model){
		$this->model=$model;
	}
	
	public function getInventoryDetails(){
		return "Gamintojo kodas: $this->serialNumber <br>".
			   "SKU: $this->sku";
	}
	
	public abstract function getCard();
	
}