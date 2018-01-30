<?php
class Darbuotojai implements Countable, ArrayAccess{
	private $kiekis;
	public function setKiekis($kiekis){
		$this->kiekis=$kiekis;
	}
	
	public function count(){
		return $this->kiekis;
	}
	
	 public function offsetExists ($offset) {
	 	
	 }
	
	 public function offsetGet ($offset) {
	 	if ($offset==5) return 'Jonas';
	 	else return 'Petras';
	 }
	
	 public function offsetSet ($offset, $value) {
	 	
	 }
	
	 public function offsetUnset ($offset) {
	 	
	 }
}


$sarasas=new Darbuotojai();
$sarasas->setKiekis(20);


for ($sarasas as $item)