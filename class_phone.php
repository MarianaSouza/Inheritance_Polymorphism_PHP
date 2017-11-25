<?php  

class Phone{

	private $countryCode;
	private $areaCode;
	private $phoneNumber;
	private $extension;


	public function __construct($valueCountryCode, $valueAreaCode, $valuePhoneNumber, $valueExtension = null){

		$this->set_countryCode($valueCountryCode);
		$this->set_areaCode($valueAreaCode);
		$this->set_phoneNumber($valuePhoneNumber);
		$this->set_extension($valueExtension);

	}

	//Setters

	public function set_countryCode($new_countryCode){

		if(!isset($new_countryCode)){
			throw new Exception("The country code field cannot be empty.");
		}
		if(!is_numeric($new_countryCode)){
			throw new Exception("The country code must be a number.");
		}
		if(strlen($new_countryCode) > 3){
			throw new Exception("The country code cannot be greater than 3 characteres.");
		}

		$this->countryCode = $new_countryCode;
	}

	public function set_areaCode($new_areaCode){

		if(!isset($new_areaCode)){
			throw new Exception("The area code field cannot be empty.");
		}
		if(!is_numeric($new_areaCode)){
			throw new Exception("The area code must be a number.");
		}
		if(strlen($new_areaCode) > 4){
			throw new Exception("The country code cannot be greater than 3 characteres.");
		}

		$this->areaCode = $new_areaCode;
	}


	public function set_phoneNumber($new_phoneNumber){

		if(!isset($new_phoneNumber)){
			throw new Exception("The phone number field cannot be empty.");
		}
		if(!is_numeric($new_phoneNumber)){
			throw new Exception("The phone number must be a number.");
		}
		if(strlen($new_phoneNumber) > 8){
			throw new Exception("The phone number code cannot be greater than 8 characteres.");
		}

		$this->phoneNumber = $new_phoneNumber;
	}


	public function set_extension($new_extension){

		if($new_extension == null){
			$this->extension = '-';
			return;
		}

		if(!is_numeric($new_extension)){
			throw new Exception("The extension must be a number.");
		}
		if(strlen($new_extension) > 3){
			throw new Exception("The extension cannot be greater than 3 characteres.");
		}

		$this->extension = $new_extension;
	}

	//Getters


	public function get_countryCode(){
		return $this->countryCode;
	}

	public function get_areaCode(){
		return $this->areaCode;
	}

	public function get_phoneNumber(){
		return $this->phoneNumber;
	}

	public function get_extension(){
		return $this->extension;
	}


	//Helper Functions. Format the prints.
	//in the substring function, we select the first 4 digits and then the 4 last digits. From 0, take 3 digits. From 3, take 4 digits.

	//This function prints the phone as +1(604)555-6562 Ext 0:
	public function printPhone1(){
		$format = '+%d (%d) %d-%d Ext %s';
		return sprintf($format, $this->countryCode, $this->areaCode, substr($this->phoneNumber,0,3), substr($this->phoneNumber,3,4), $this->extension);		
	}

	//This function prints the phone as 1.604.555.6562E0 
	public function printPhone2(){
		$format = '%d.%d.%d.%d.E%s';
		return sprintf($format, $this->countryCode, $this->areaCode, substr($this->phoneNumber,0,3), substr($this->phoneNumber,3,4), $this->extension);		
	}

}


	// try{

	// $phone1 = new Phone('1','789','2145449', '11');
	// echo $phone1->printPhone1() . "<br />";
	// echo $phone1->printPhone2() . "<br />";


	// }
	// catch(Exception $exception){
	// echo "Exception: ". $exception->getMessage();

	// }







?>