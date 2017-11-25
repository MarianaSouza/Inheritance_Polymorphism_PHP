<?php 

class Address{

	private $country;
	private $province;
	private $city;
	private $streetNumber;
	private $streetName;
	private $unit;

	public function __construct($valueCountry, $valueProvince, $valueCity, $valueUnit, $valueStreetNumber, $valueStreetName){

		$this->set_country($valueCountry);
		$this->set_province($valueProvince);
		$this->set_city($valueCity);
		$this->set_streetNumber($valueStreetNumber);
		$this->set_streetName($valueStreetName);
		$this->set_unit($valueUnit);

	}


	//Setters

	public function set_country($new_country){

		if(!isset($new_country)){
			throw new Exception("The country field cannot be empty.");
		}
		if(strlen($new_country) > 50){
			throw new Exception("The country cannot be greater than 50 characteres.");
		}
		$this->country = $new_country;
	}

	public function set_province($new_province){

		if(!isset($new_province)){
			throw new Exception("The province field cannot be empty.");
		}
		if(strlen($new_province) > 50){
			throw new Exception("The province cannot be greater than 50 characteres.");
		}
		$this->province = $new_province;
	}

	public function set_city($new_city){

		if(!isset($new_city)){
			throw new Exception("The city field cannot be empty.");
		}
		if(strlen($new_city) > 50){
			throw new Exception("The city cannot be greater than 50 characteres.");
		}
		$this->city = $new_city;
	}

	public function set_streetName($new_streetName){

		if(!isset($new_streetName)){
			throw new Exception("The street name field cannot be empty.");
		}
		if(strlen($new_streetName) > 50){
			throw new Exception("The street name cannot be greater than 50 characteres.");
		}
		$this->streetName = $new_streetName;
	}

	public function set_streetNumber($new_streetNumber){

		if(!isset($new_streetNumber)){
			throw new Exception("The street number field cannot be empty.");
		}
		if(!is_numeric($new_streetNumber)){
			throw new Exception("The street number must be a number.");
		}
		if(strlen($new_streetNumber) > 10){
			throw new Exception("The street number cannot be greater than 10 characteres.");
		}
		$this->streetNumber = $new_streetNumber;
	}

	public function set_unit($new_unit){

		if(!isset($new_unit)){
			throw new Exception("The unit field cannot be empty.");
		}
		if(strlen($new_unit) > 10){
			throw new Exception("The unit cannot be greater than 10 characteres.");
		}
		$this->unit = $new_unit;
	}

	//Getters

	public function get_country(){
		return $this->country;
	}

	public function get_province(){
		return $this->province;
	}

	public function get_city(){
		return $this->city;
	}

	public function get_streetName(){
		return $this->streetName;
	}

	public function get_streetNumber(){
		return $this->streetNumber;
	}

	public function get_unit(){
		return $this->unit;
	}

	//Helper Functions. Format the prints.

	//This function prints the address from country to unit:
	public function printAddressFromCountry(){
		$format = '%s, %s, %s, %s, %d, %s';
		return sprintf($format, $this->country, $this->province, $this->city, $this->unit, $this->streetNumber, $this->streetName);		
	}

	////This function prints the address from unit to country:
	public function printAddressFromUnit(){
		$format = '%s, %d, %s, %s, %s, %s';
		return sprintf($format, $this->unit, $this->streetNumber, $this->streetName, $this->city, $this->province, $this->country);		
	}

}

// try{

// 	$adress1 = new Address('Canada','BC','Vancouver','1236', 7895, 'Howe St');
// 	echo $adress1->printAddressFromCountry() . "<br />";

// 	$adress2 = new Address('Canada', 'BC', 'Vancouver','999', 1236, 'Nelson St');
// 	echo $adress2->printAddressFromUnit() . "<br />";

// }
// catch(Exception $exception){
// 	echo "Exception: ". $exception->getMessage();

// }


 ?>