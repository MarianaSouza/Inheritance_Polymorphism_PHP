<?php
require_once("class_selffunded.php");

class QuaterlyLocals extends SelfFunded{

	public function __construct($valueStudentName, $valueStudentSurname, $valueStudentEmail, $valueDateOfBirth,
	 $valueStudentPhone, $valueStudentCellphone, $valueStudentAddress, $valueProofOfEnglish, $valueIDType, $valueIDNumber, $valueProgramName, 
	 $valueStartDate, $valueRegistrationFee, $valueProgramTuition, $valuePaymentOption){
		parent::__construct($valueStudentName, $valueStudentSurname, $valueStudentEmail, $valueDateOfBirth,
	 $valueStudentPhone, $valueStudentCellphone, $valueStudentAddress, $valueProofOfEnglish, $valueIDType, $valueIDNumber, $valueProgramName, 
	 $valueStartDate, $valueRegistrationFee, $valueProgramTuition, $valuePaymentOption);
	}


	//Payment is calculated based on 25% of tuition on start date, 25% Three months after, 25% six months after and 25% nine months after the start date.

	public function payment(){

		parent::payment();

		$quartTuition = parent::get_programTuition()/4;

		$firstPayment = parent::get_registrationFee() + $quartTuition;

		echo "First payment: " . $firstPayment;
		echo " date: " . parent::get_startDateDMY();

		echo "<hr/>";
		echo "Second payment: " . $quartTuition;
		echo " date: " . parent::get_startDateMDYThreeMonthsAhead();

		echo "<hr/>";
		echo "Third payment: " . $quartTuition;
		echo " date: " . parent::get_startDateMDYSixMonthsAhead();

		echo "<hr/>";
		echo "Fourth payment: " . $quartTuition;
		echo " date: " . parent::get_startDateMDYNineMonthsAhead();

	}
}

// try{	

// 	$quaterly = new QuaterlyLocals('Anne', 'Thompson', 'annt@gmail.com', '14/07/1991', '1 657 7894559 12', '1 704 7894559', 'Canada, BC, Vancouver, 1236, 7895, Howe St',
// 		'IELTS', 'Local', 111, 'Web Development','21/01/2017', 1000, 4500, "cheque");
// 	//echo $quaterly->get_startDateDMY()."<br/>";
// 	echo $quaterly->payment()."<br/>";
// 	echo "<hr/>";
// 	echo "Payment Option: ". $quaterly->get_paymentOption()."<br/>";
// 	echo "<pre>";
// 	print_r($quaterly);
// 	echo "</pre>";

// } catch (Exception $exception) {
// 	echo "<br/>";
// 	echo '<span style="color:red;">Caught exception: ',  $exception->getMessage(), '</span>';
// }
?>