<?php
require_once("class_internationals.php");

class MonthlyInternationals extends Internationals{

	public function __construct($valueStudentName, $valueStudentSurname, $valueStudentEmail, $valueDateOfBirth,
	 $valueStudentPhone, $valueStudentCellphone, $valueStudentAddress, $valueProofOfEnglish, $valueIDType, $valueIDNumber, $valueProgramName, 
	 $valueStartDate, $valueRegistrationFee, $valueProgramTuition){
		parent::__construct($valueStudentName, $valueStudentSurname, $valueStudentEmail, $valueDateOfBirth,
	 $valueStudentPhone, $valueStudentCellphone, $valueStudentAddress, $valueProofOfEnglish, $valueIDType, $valueIDNumber, $valueProgramName, 
	 $valueStartDate, $valueRegistrationFee, $valueProgramTuition);
	}


	//Payment is calculated based on 25% of tuition on start date, 1/7 of the remaining 75% 3 months after the start date, continued for 7 months.

	public function payment(){

		parent::payment();

		$monthTuition = parent::get_programTuition()/4;

		$firstPayment = parent::get_registrationFee() + $monthTuition;

		echo "First payment: " . $firstPayment;
		echo " date: " . parent::get_startDateDMY();

		echo "<hr/>";
		$secondPayment = (parent::get_programTuition() - $monthTuition)/7;
		echo "Second payment: " . $secondPayment;
		echo " date: " . parent::get_startDateMDYThreeMonthsAhead();

		echo "<hr/>";
		echo "Another payments (continued for 7 months): " . $secondPayment;

	}
}

// try{	

// 	$monthly = new MonthlyInternationals('Anne', 'Thompson', 'annt@gmail.com', '14/07/1991', '1 657 7894559 12', '1 704 7894559', 'Canada, BC, Vancouver, 1236, 7895, Howe St',
// 		'IELTS', 'Local', 111, 'Web Development','21/01/2017', 1000, 7000, "Cash");
// 	//echo $quaterly->get_startDateDMY()."<br/>";
// 	echo $monthly->payment()."<br/>";
// 	echo "<hr/>";
// 	echo "<pre>";
// 	print_r($monthly);
// 	echo "</pre>";

// } catch (Exception $exception) {
// 	echo "<br/>";
// 	echo '<span style="color:red;">Caught exception: ',  $exception->getMessage(), '</span>';
// }
?>