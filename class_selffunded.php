<?php
require_once ('class_locals.php');

class SelfFunded extends Locals{

	private $paymentOption;

	public function __construct($valueStudentName, $valueStudentSurname, $valueStudentEmail, $valueDateOfBirth,
	 $valueStudentPhone, $valueStudentCellphone, $valueStudentAddress, $valueProofOfEnglish, $valueIDType, $valueIDNumber, $valueProgramName, 
	 $valueStartDate, $valueRegistrationFee, $valueProgramTuition, $valuePaymentOption){
		parent::__construct($valueStudentName, $valueStudentSurname, $valueStudentEmail, $valueDateOfBirth,
	 $valueStudentPhone, $valueStudentCellphone, $valueStudentAddress, $valueProofOfEnglish, $valueIDType, $valueIDNumber, $valueProgramName, 
	 $valueStartDate, $valueRegistrationFee, $valueProgramTuition);

		$this->set_paymentOption($valuePaymentOption);
	}

	public function set_paymentOption($new_paymentOption){
		if(!isset($new_paymentOption)){
			throw new Exception("The payment option field cannot be empty.");
		}
		if(strlen($new_paymentOption) > 20){
			throw new Exception("The  payment option cannot be greater than 20 characteres.");
		}
		$this->paymentOption = $new_paymentOption;
	}	

	public function get_paymentOption(){
		return $this->paymentOption;
	}
}
?>