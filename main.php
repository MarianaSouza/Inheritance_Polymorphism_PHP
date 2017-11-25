<?php
require_once("class_dates.php");
require_once("class_address.php");
require_once("class_phone.php");
require_once("class_students.php");
require_once("class_locals.php");
require_once("class_internationals.php");
require_once("class_loan.php");
require_once("class_selffunded.php");
require_once("class_extendedpayment.php");
require_once("class_extendedpaymentinternationals.php");
require_once("class_quaterlylocals.php");
require_once("class_quaterlyinternationals.php");
require_once("class_quaterlylocals.php");
require_once("class_monthlylocals.php");
require_once("class_monthlyinternationals.php");
require_once("header.php");
//require_once("footer.php");
session_start();

//Button clear list - To reset session and student post
if (isset($_POST['submit']) && $_POST['submit']=="clear"){
	unset($_SESSION['StudentList']);
	unset($_POST['studentRadio']);
}
//This is to clear one of the payment options when we hit the submit button
unset($_POST['international_payment']);
unset($_POST['local_payment']);
?>
<!-- User Interface-->
<br/><br/>
<div class="container">
	<div class="row">
		<form class="form-horizontal form-responsive" method="POST" action="main.php">
			<div>
			</div>
			<div class="form-group text-center">
				<h3 style="margin: 2%;">Insert the values to create your Object Student:</h3>
			</div>

				<div class="form-group jumbotron" data-toggle="buttons">
					<div class="col-md-3">
						<input type="radio" name="studentRadio" id="local" autocomplete="off" value="local" <?php echo (@$_POST['studentRadio']=="local")?"checked=checked":""?>> Local Student
						<br/>
						Payment Options for local students:
					</div>
					<div class="col-md-9">
						<label class="col-md-3 control-label">
							<input type="radio" name="payment" id="loan" autocomplete="off" value="loan" <?php echo (@$_POST['payment']=="loan")?"checked":""?>> Loan
						</label>
						<label class="col-md-3 control-label">
							<input type="radio" name="payment" id="extended_local" autocomplete="off" value="extended_local" <?php echo (@$_POST['payment']=="extended_local")?"checked":""?>> Extended Local
						</label>
						<label class="col-md-3 control-label">
							<input type="radio" name="payment" id="quarterly_local" autocomplete="off" value="quarterly_local" <?php echo (@$_POST['payment']=="quarterly_local")?"checked":""?>> Quaterly Local
						</label>
						<label class="col-md-3 control-label">
							<input type="radio" name="payment" id="monthly_local" autocomplete="off" value="monthly_local" <?php echo (@$_POST['payment']=="monthly_local")?"checked":""?>> Monthly Local
						</label>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-4 control-label" for="textinput">Payment Option(for selffunded locals):</label>
					<div class="col-md-6">
						<input id="paymentOption" name="paymentOption" type="text" placeholder="e-Transfer" class="form-control input-md" value="<?php echo @$_POST['paymentOption']; ?>">
					</div>
				</div>				
				<div class="form-group jumbotron" data-toggle="buttons">
					<div class="col-md-3">
						<input type="radio" name="studentRadio" id="international" autocomplete="off" value="international" <?php echo (@$_POST['studentRadio']=="international")?"checked=checked":""?>> International Student
						<br/>
						Payment Options for International students:
					</div>
					<div class="col-md-9">
						<label class="col-md-4 control-label">
							<input type="radio" name="payment" id="extended_international" autocomplete="off"  value="extended_international" <?php echo (@$_POST['payment']=="extended_international")?"checked":""?>> Extended International
						</label>
						<label class="col-md-4 control-label">
							<input type="radio" name="payment" id="quarterly_international" autocomplete="off" value="quarterly_international" <?php echo (@$_POST['payment']=="quarterly_international")?"checked":""?>> Quaterly International
						</label>
						<label class="col-md-4 control-label">
							<input type="radio" name="payment" id="monthly_international" autocomplete="off" value="monthly_international" <?php echo (@$_POST['payment']=="monthly_international")?"checked":""?>> Monthly International
						</label>
					</div>
				</div>
			<div class="form-group">
				<label class="col-md-4 control-label" for="textinput">ID Type:</label>
				<div class="col-md-6">
					<input id="idType" name="idType" type="text" placeholder="Local Student or International Student" class="form-control input-md" required="" value="<?php echo @$_POST['idType']; ?>">
				</div>
				<!-- By using value="<?php //echo $_POST['']; ?>" the values does not disappear when the program returns.
				This allows the user to enter the data only one time.-->
			</div>
			<div class="form-group">
				<label class="col-md-4 control-label" for="textinput">ID Number:</label>
				<div class="col-md-6">
					<input id="idNumber" name="idNumber" type="text" placeholder=" " class="form-control input-md" required="" value="<?php echo @$_POST['idNumber']; ?>">
				</div>
				<!-- By using value="<?php //echo $_POST['']; ?>" the values does not disappear when the program returns.
				This allows the user to enter the data only one time.-->
			</div>
			<div class="form-group">
				<label class="col-md-4 control-label" for="textinput">Name:</label>
				<div class="col-md-6">
					<input id="name" name="name" type="text" placeholder="Student Name" class="form-control input-md" required="" value="<?php echo @$_POST['name']; ?>">
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-4 control-label" for="textinput">Surname:</label>
				<div class="col-md-6">
					<input id="surname" name="surname" type="text" placeholder="Student Surname" class="form-control input-md" required="" value="<?php echo @$_POST['surname']; ?>">
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-4 control-label" for="textinput">Address:</label>
				<div class="col-md-6">
					<input id="address" name="address" type="text" placeholder="Canada, BC, Vancouver, 1236, 7895, Howe St" class="form-control input-md" required="" value="<?php echo @$_POST['address']; ?>">
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-4 control-label" for="textinput">Email:</label>
				<div class="col-md-6">
					<input id="email" name="email" type="text" placeholder=" " class="form-control input-md" required="" value="<?php echo @$_POST['email']; ?>">
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-4 control-label" for="textinput">Phone:</label>
				<div class="col-md-6">
					<input id="phone" name="phone" type="text" placeholder="1 657 7894559 12" class="form-control input-md" required="" value="<?php echo @$_POST['phone']; ?>">
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-4 control-label" for="textinput">Cellphone:</label>
				<div class="col-md-6">
					<input id="cellphone" name="cellphone" type="text" placeholder="1 704 7894559" class="form-control input-md" required="" value="<?php echo @$_POST['cellphone']; ?>">
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-4 control-label" for="textinput">Date of Birth:</label>
				<div class="col-md-6">
					<input id="birth" name="birth" type="text" placeholder="14/07/1991" class="form-control input-md" required="" value="<?php echo @$_POST['birth']; ?>">
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-4 control-label" for="textinput">Proof of English:</label>
				<div class="col-md-6">
					<input id="proofEnglish" name="proofEnglish" type="text" placeholder="IELTS" class="form-control input-md" required="" value="<?php echo @$_POST['proofEnglish']; ?>">
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-4 control-label" for="textinput">Registration Fee:</label>
				<div class="col-md-6">
					<input id="regFee" name="regFee" type="text" placeholder="1000" class="form-control input-md" required="" value="<?php echo @$_POST['regFee']; ?>">
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-4 control-label" for="textinput">Program Name:</label>
				<div class="col-md-6">
					<input id="progName" name="progName" type="text" placeholder="Web Development" class="form-control input-md" required="" value="<?php echo @$_POST['progName']; ?>">
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-4 control-label" for="textinput">Program Tuition:</label>
				<div class="col-md-6">
					<input id="progTuition" name="progTuition" type="text" placeholder="9000" class="form-control input-md" required="" value="<?php echo @$_POST['progTuition']; ?>">
				</div>
			</div>		
			<div class="form-group">
				<label class="col-md-4 control-label" for="textinput">Start Date:</label>
				<div class="col-md-6">
					<input id="start" name="start" type="text" placeholder="02/01/2018" class="form-control input-md" required="" value="<?php echo @$_POST['start']; ?>">
				</div>
			</div>
			<div class="form-group" style="margin-top: 2%">
				<label class="col-md-4 control-label" for="submit"></label>
				<div class="col-md-8">
					<button id="submit" name="submit" value="submit" class="btn btn-success" >Submit</button>
					<button id="submit" name="submit" value="clear" class="btn btn-danger" formnovalidate>Clear List</button>
				</div>
			</div>
			<!-- Using Try and Catch to verify errors-->
			<!-- The messages in Catch come from the throw new Exceptions in the classes. getMessage() is a built function. -->
			<div class="form-group text-center">
				<?php
				if(isset($_POST['studentRadio'])){
					try {

						if ($_POST['studentRadio']=="local"){
						   	if ($_POST['payment'] != "loan" && $_POST['payment'] != "extended_local" && $_POST['payment'] != "quarterly_local" && $_POST['payment'] != "monthly_local"){
								throw new Exception("You need to select payment type as Loan, Extended Local, Quaterly Local or Monthly Local");
							}
							if ($_POST['payment'] == "extended_local" || $_POST['payment'] == "quarterly_local" || $_POST['payment'] == "monthly_local"){
								if (!$_POST['paymentOption']){
									throw new Exception("You need to fill Payment option for local students and payment types Extended Local, Quaterly Local or Monthly Local");
								}
							}							
						}

						if ($_POST['studentRadio']=="international"){
						   	if($_POST['payment'] != "extended_international" && $_POST['payment'] != "quarterly_international" && $_POST['payment'] != "monthly_international"){
								throw new Exception("You need to select payment type as Loan, Extended, Quaterly or monthly for International students");
							}
						}						

						$idType = $_POST['idType'];
						$idNumber = $_POST['idNumber'];
						$name = $_POST['name'];
						$surname = $_POST['surname'];
						$address = $_POST['address'];
						$email = $_POST['email'];
						$phone = $_POST['phone'];
						$cellphone = $_POST['cellphone'];
						$birthDate = $_POST['birth'];
						$proofEnglish = $_POST['proofEnglish'];
						$regFee = $_POST['regFee'];
						$progName = $_POST['progName'];
						$progTuition = $_POST['progTuition'];
						$startDate = $_POST['start'];						

						$paymentOption = @$_POST['paymentOption'];
						if($_POST['payment'] == "loan"){
							$Student = new Loan($name, $surname, $email, $birthDate, $phone, $cellphone, $address, 
							$proofEnglish, $idType, $idNumber, $progName, $startDate, $regFee, $progTuition);
						}
						if($_POST['payment'] == "extended_local"){
							$Student = new ExtendedPayment($name, $surname, $email, $birthDate, $phone, $cellphone, $address, 
							$proofEnglish, $idType, $idNumber, $progName, $startDate, $regFee, $progTuition, $paymentOption);
						}
						if($_POST['payment'] == "quarterly_local"){
							$Student = new QuaterlyLocals($name, $surname, $email, $birthDate, $phone, $cellphone, $address, 
							$proofEnglish, $idType, $idNumber, $progName, $startDate, $regFee, $progTuition, $paymentOption);
						}
						if($_POST['payment'] == "monthly_local"){
							$Student = new MonthlyLocals($name, $surname, $email, $birthDate, $phone, $cellphone, $address, 
							$proofEnglish, $idType, $idNumber, $progName, $startDate, $regFee, $progTuition, $paymentOption);
						}

						if($_POST['payment'] == "extended_international"){
							$Student = new ExtendedPaymentInternacional($name, $surname, $email, $birthDate, $phone, $cellphone, $address, 
							$proofEnglish, $idType, $idNumber, $progName, $startDate, $regFee, $progTuition);
						}
						if($_POST['payment'] == "quarterly_international"){
							$Student = new QuaterlyInternationals($name, $surname, $email, $birthDate, $phone, $cellphone, $address, 
							$proofEnglish, $idType, $idNumber, $progName, $startDate, $regFee, $progTuition);
						}
						if($_POST['payment'] == "monthly_international"){
							$Student = new MonthlyInternationals($name, $surname, $email, $birthDate, $phone, $cellphone, $address, 
							$proofEnglish, $idType, $idNumber, $progName, $startDate, $regFee, $progTuition);
						}

						//if there is already a session, I create a variable to store the information that already exists
						if (isset($_SESSION['StudentList'])){     //This condition modifies the value of the array object
							$StudentList = $_SESSION['StudentList'];
						}
						//Then, we store the next object in the same variable(list).
						$StudentList[] = $Student;

						//Creating the SESSION
						$_SESSION['StudentList'] = $StudentList;

						if (isset($_SESSION['StudentList'])){
							echo "<h3>You already have: ";
							echo count($_SESSION['StudentList']); //Hack because we are filling session afterwards
							echo " elements.</h3>";
						}

						//For ach object in the list, grab the student data, print th epayment option and all the object members
						foreach ($_SESSION['StudentList'] as $object => $student) {
						    echo "<span class=text-left>Student: {$object} => </span>";						    
						    echo "<pre class=text-left>";
						    echo "<hr/>";
						    echo $student->payment();
						    echo "<hr/>";
							print_r($student);
							echo "</pre>";
						}						
					
					} catch (Exception $exception) {
						echo "<br/>";
						echo '<span style="color:red;">Caught exception: ',  $exception->getMessage(), '</span>';
					}
				}
				?>
			</div>
		</form>
		<br />
		<br />
	</div>
</div>
<!-- END of UI -->