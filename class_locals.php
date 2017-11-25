<?php
require_once ('class_students.php');
require_once ('class_dates.php');
require_once ('class_phone.php');
require_once ('class_address.php');


class Locals extends Students{

	private $proofOfEnglish;
	private $IDType;
	private $IDNumber;
	private $registrationFee;
	private $programName;
	private $programTuition;
	private $startDate;


	public function __construct($valueStudentName, $valueStudentSurname, $valueStudentEmail, $valueDateOfBirth,
	 $valueStudentPhone, $valueStudentCellphone, $valueStudentAddress, $valueProofOfEnglish, $valueIDType, $valueIDNumber, $valueProgramName, 
	 $valueStartDate, $valueRegistrationFee, $valueProgramTuition){
		$this->set_studentName($valueStudentName);
		$this->set_studentSurname($valueStudentSurname);
		$this->set_studentEmail($valueStudentEmail);
		$this->set_studentPhone($valueStudentPhone);
		$this->set_studentCellphone($valueStudentCellphone);
		$this->set_studentAddress($valueStudentAddress);
		$this->set_studentDateOfBirth($valueDateOfBirth);
		$this->set_proofOfEnglish($valueProofOfEnglish);
		$this->set_IDType($valueIDType);
		$this->set_IDNumber($valueIDNumber);
		$this->set_registrationFee($valueRegistrationFee);
		$this->set_programName($valueProgramName);
		$this->set_programTuition($valueProgramTuition);
		$this->set_startDate($valueStartDate);

	}

	//If there is not at least one '' in the new_studentAddress, it will return a format error.
	//When we use the explode, we create an array to $address with $new_studentAddress data 
	//with this format: Canada, BC, Vancouver, 1236, 7895, Howe St
	public function set_studentAddress($new_studentAddress){
		if (strpos($new_studentAddress, ',') === false) { 
			throw new Exception("You need to pass the address as: Canada, BC, Vancouver, 1236, 7895, Howe St");
		}

		$address = explode(",", $new_studentAddress);

		$this->studentAddress = new Address($address[0], $address[1], $address[2], $address[3], $address[4], $address[5]);
		//When I create new Address, my var $studentAddress receives the values from class Address
	}

	//If there is not at least one '' in the new_studentCellphone, it will return a format error.
	//When we use the explode, we create an array to $cellphone with $new_studentCellphone data with this format: 1 657 7894559 12
	public function set_studentCellphone($new_studentCellphone){
		if (strpos($new_studentCellphone, ' ') === false) { 
			throw new Exception("You need to pass the cellphone as: 1 657 7894559");
		}

		$cellphone = explode(" ", $new_studentCellphone);

		//this condition checks if the phone number has an extension number or not.
		//if there is not an extension number, the last item is null.
		if (count($cellphone)==4){
			$extensionNumber = $cellphone[3];
		}else{
			$extensionNumber = null;
		}

		$this->studentCellphone = new Phone($cellphone[0], $cellphone[1], $cellphone[2], $extensionNumber);
		//When I create new Dates, my var $studentCellphone receives the values from class Phone
	}


	//If there is not at least one '' in the new_studentPhone, it will return a format error.
	//When we use the explode, we create an array to $phone with $new_studentPhone data with this format: 1 657 7894559 12
	public function set_studentPhone($new_studentPhone){
		if (strpos($new_studentPhone, ' ') === false) { 
			throw new Exception("You need to pass the phone as: 1 657 7894559 12(if there is an extension)");
		}

		$phone = explode(" ", $new_studentPhone);

		//this condition checks if the phone number has an extension number or not.
		//if there is not an extension number, the last item is null.
		if (count($phone)==4){
			$extensionNumber = $phone[3];
		}else{
			$extensionNumber = null;
		}

		$this->studentPhone = new Phone($phone[0], $phone[1], $phone[2], $extensionNumber);
		/* When I create new Phone, my var $studentPhone receives the values from class Phone*/
	}

	//If there is not at least one / in the new_dateOfBirth, it will return a format error.
	//When we use the explode, we create an array to $studentDateOfBirth with $new_dateOfBirth data with this format: 21/01/2017
	public function set_studentDateOfBirth($new_dateOfBirth){
		if (strpos($new_dateOfBirth, '/') === false) { 
			throw new Exception("You need to pass the date as: 25/01/2017");
		}

		$studentDateOfBirth = explode("/", $new_dateOfBirth);
		$this->dateOfBirth = new Dates($studentDateOfBirth[0], $studentDateOfBirth[1], $studentDateOfBirth[2]);
		/* When I create new Dates, my var $studentDateOfBirth receives the values from class Dates*/
	}

	public function set_studentName($new_studentName){
		if(!isset($new_studentName)){
			throw new Exception("The student name field cannot be empty.");
		}
		if(strlen($new_studentName) > 20){
			throw new Exception("The student name cannot be greater than 20 characteres.");
		}
		$this->studentName = $new_studentName;
	}	

	public function set_studentSurname($new_studentSurname){
		if(!isset($new_studentSurname)){
			throw new Exception("The student surname field cannot be empty.");
		}
		if(strlen($new_studentSurname) > 50){
			throw new Exception("The student surname cannot be greater than 50 characteres.");
		}
		$this->studentSurname = $new_studentSurname;
	}	

	public function set_studentEmail($new_studentEmail){
		if(!isset($new_studentEmail)){
			throw new Exception("The student email field cannot be empty.");
		}
		if(strlen($new_studentEmail) > 50){
			throw new Exception("The student email cannot be greater than 50 characteres.");
		}
		$this->studentEmail = $new_studentEmail;
	}	

	public function set_proofOfEnglish($new_proofOfEnglish){
		if(!isset($new_proofOfEnglish)){
			throw new Exception("The proof of English field cannot be empty.");
		}
		if(strlen($new_proofOfEnglish) > 15){
			throw new Exception("The proof of English cannot be greater than 15 characteres.");
		}
		$this->proofOfEnglish = $new_proofOfEnglish;
	}	

	public function set_IDType($new_IDType){
		if(!isset($new_IDType)){
			throw new Exception("The ID Type field cannot be empty.");
		}
		if(strlen($new_IDType) > 30){
			throw new Exception("The ID type cannot be greater than 30 characteres.");
		}
		$this->IDType= $new_IDType;
	}	

	public function set_IDNumber($new_IDNumber){
		if(!isset($new_IDNumber)){
			throw new Exception("The ID Number field cannot be empty.");
		}
		if(!is_numeric($new_IDNumber)){
			throw new Exception("The ID number must be a number.");
		}
		if(strlen($new_IDNumber) > 10){
			throw new Exception("The ID number cannot be greater than 10 characteres.");
		}
		$this->IDNumber = $new_IDNumber;
	}	

	public function set_programName($new_programName){
		if(!isset($new_programName)){
			throw new Exception("The program name field cannot be empty.");
		}
		
		if(strlen($new_programName) > 25){
			throw new Exception("The program name cannot be greater than 25 characteres.");
		}
		$this->programName = $new_programName;
	}	

	public function set_programTuition($new_programTuition){
		if(!isset($new_programTuition)){
			throw new Exception("The program tuition field cannot be empty.");
		}
		if(!is_numeric($new_programTuition)){
			throw new Exception("The program tuition must be a number.");
		}
		if(strlen($new_programTuition) > 10){
			throw new Exception("The program tuition cannot be greater than 10 characteres.");
		}
		$this->programTuition = $new_programTuition;
	}	

	public function set_registrationFee($new_registrationFee){
		if(!isset($new_registrationFee)){
			throw new Exception("The registration fee field cannot be empty.");
		}
		if(!is_numeric($new_registrationFee)){
			throw new Exception("The registration fee must be a number.");
		}
		if(strlen($new_registrationFee) > 10){
			throw new Exception("The registration fee cannot be greater than 10 characteres.");
		}
		$this->registrationFee = $new_registrationFee;
	}

	//If there is not at least one / in the new_start date, it will return a format error.
	//When we use the explode, we create an array to dateStart with $new_startDate data with this format: 21/01/2017
	public function set_startDate($new_startDate){
		if (strpos($new_startDate, '/') === false) { 
			throw new Exception("You need to pass the date as: 25/01/2017");
		}

		$dateStart = explode("/", $new_startDate);
		$this->startDate = new Dates($dateStart[0], $dateStart[1], $dateStart[2]);
		/* When I create new Dates, my var dateStart receives the values from class Dates*/
	}

	public function get_studentName(){
		return $this->studentName;
	}

	public function get_studentSurname(){
		return $this->studentSurname;
	}

	public function get_studentEmail(){
		return $this->studentEmail;
	}

	public function get_dateOfBirth(){
		return $this->dateOfBirth;
	}

	public function get_studentPhone(){
		return $this->studentPhone;
	}

	public function get_studentCellphone(){
		return $this->studentCellphone;
	}
	public function get_studentAddress(){
		return $this->studentAddress;
	}

	public function get_ProofOfEnglish(){
		return $this->proofOfEnglish;
	}

	public function get_IDType(){
		return $this->IDType;
	}

	public function get_IDNumber(){
		return $this->IDNumber;
	}	

	public function get_programName(){
		return $this->programName;
	}	

	public function get_programTuition(){
		return $this->programTuition;
	}	

	public function get_registrationFee(){
		return $this->registrationFee;
	}

	public function get_startDateDMY(){
		return $this->startDate->printDateDMY();
	}

	public function get_startDateMDYThreeMonthsAhead(){
		return $this->startDate->printDateDMYThreeMonthsAhead();
	}

	public function get_startDateMDYSixMonthsAhead(){
		return $this->startDate->printDateDMYSixMonthsAhead();
	}

	public function get_startDateMDYNineMonthsAhead(){
		return $this->startDate->printDateDMYNineMonthsAhead();
	}

	public function payment(){
		echo "<br />Local Student paying...<br/><br/>";
	}

}


// try{
	
	

// 	$local = new Locals('Anne', 'Thompson', 'annt@gmail.com', '14/07/1991', '1 657 7894559 12', '1 704 7894559', 'Canada, BC, Vancouver, 1236, 7895, Howe St',
// 		'IELTS', 'Local', 111, 'Web Development','21/01/2017', 1000, 4500);

// 	echo "<pre>";
// 	print_r($local);
// 	echo "</pre>";
// 	//echo $local->get_startDateDMY()."<br/>";
// 	//echo $local->payment();

// } catch (Exception $exception) {
// 	echo "<br/>";
// 	echo '<span style="color:red;">Caught exception: ',  $exception->getMessage(), '</span>';
// }

?>