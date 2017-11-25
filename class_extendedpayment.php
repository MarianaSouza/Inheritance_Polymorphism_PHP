<?php
require_once("class_selffunded.php");

class ExtendedPayment extends SelfFunded{

	public function __construct($valueStudentName, $valueStudentSurname, $valueStudentEmail, $valueDateOfBirth,
	 $valueStudentPhone, $valueStudentCellphone, $valueStudentAddress, $valueProofOfEnglish, $valueIDType, $valueIDNumber, $valueProgramName, 
	 $valueStartDate, $valueRegistrationFee, $valueProgramTuition, $valuePaymentOption){
		parent::__construct($valueStudentName, $valueStudentSurname, $valueStudentEmail, $valueDateOfBirth,
	 $valueStudentPhone, $valueStudentCellphone, $valueStudentAddress, $valueProofOfEnglish, $valueIDType, $valueIDNumber, $valueProgramName, 
	 $valueStartDate, $valueRegistrationFee, $valueProgramTuition, $valuePaymentOption);
	}

	public function payment(){

		parent::payment();

		$halfTuition = parent::get_programTuition()/2;

		$firstPayment = parent::get_registrationFee() + $halfTuition;

		echo "First payment: " . $firstPayment;
		echo " date: " . parent::get_startDateDMY();

		echo "<hr/>";
		echo "Second payment: " . $halfTuition;
		echo " date: " . parent::get_startDateMDYSixMonthsAhead();

	}
}

// try{	

// 	$extended = new ExtendedPayment('Anne', 'Thompson', 'annt@gmail.com', '14/07/1991', '1 657 7894559 12', '1 704 7894559', 'Canada, BC, Vancouver, 1236, 7895, Howe St',
// 		'IELTS', 'Local', 111, 'Web Development','21/01/2017', 1000, 4500, "e-Transfer");
// 	echo $extended->get_startDateDMY()."<br/>";
// 	echo $extended->payment()."<br/>";
// 	echo $extended->get_paymentOption()."<br/>";
// 	echo "<pre>";
// 	print_r($extended);
// 	echo "</pre>";

// } catch (Exception $exception) {
// 	echo "<br/>";
// 	echo '<span style="color:red;">Caught exception: ',  $exception->getMessage(), '</span>';
// }

?>