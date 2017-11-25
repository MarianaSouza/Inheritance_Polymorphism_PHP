 <?php
 //Considering that it is an abstract class, we don't develop the properties or methods. 
 //They will be developed in the children.
abstract class Students{

	public $studentName;
	public $studentSurname;
	public $studentEmail;
	public $studentPhone;
	public $studentCellphone;
	public $studentAddress;
	public $dateOfBirth;	

	abstract public function payment();
}
?>