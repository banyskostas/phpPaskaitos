<?php
class cart{
	protected $products=array();
	
	public function addProduct(ProductInterface $product){
		$this->products[]=$product;
	}
	
	public function getTotalPrice(){
		$price=0;
		foreach ($this->products as $product){
			$price+=$product->getPrice();
		}
		return $price;
	}
	
	public function getList(){
		$str='';
		foreach ($this->products as $product){
			$str.=$product->getName().' <br>';
		}
		return $str;
	}
}

class ComputerCart extends cart{
	
	public function checkComputer(){
		$haveProcessor = false;
		foreach ( $this->products as $product )
			if (is_a ( $product, Processor::class ))
				$haveProcessor = true;
		
		$haveMemory = false;
		foreach ( $this->products as $product )
			if (is_a ( $product, 'Memory' ))
				$haveMemory = true;

        $haveHDD = false;
		foreach ( $this->products as $product )
			if (is_a ( $product, 'HardDrive' ) || is_a ( $product, 'SSDHardDrive'))
				$haveHDD = true;
			
		return ($haveProcessor && $haveMemory && $haveHDD);
	}
}





