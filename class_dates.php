<?php

class Dates{

	private $dayMonth;
	private $month;
	private $year;

	public function __construct($valueDayMonth, $valueMonth, $valueYear){
		$this->set_dayMonth($valueDayMonth);
		$this->set_month($valueMonth);
		$this->set_year($valueYear);
	}

	//Setters

	public function set_dayMonth($new_dayMonth){
		if($new_dayMonth <= 0 || $new_dayMonth > 32){
			throw new Exception("You need to insert a day of month between 1 and 31");
		}
		$this->dayMonth = $new_dayMonth;
	}

	public function set_month($new_month){
		if(is_numeric($new_month)){
			if($new_month < 1 || $new_month > 12){
				throw new Exception("You need to insert a month between 1 and 12");
			}
		}else{
			if ($new_month!="January" && $new_month!="February" 
				&& $new_month!="March" && $new_month!="April"
		    	&& $new_month!="May" && $new_month!="June" && $new_month!="July"
		    	&& $new_month!="August" && $new_month!="September" && $new_month!="October"
		    	&& $new_month!="November" && $new_month!="December"){
				throw new Exception("Insert a valid month between January and December.");
			}
		}
		$this->month = $new_month;
	}

	public function set_year($new_year){
		if($new_year < 1990 || $new_year > 2018){
			throw new Exception("You need to insert a year between 1990 and 2018");
		}
		$this->year = $new_year;
	}


	//Getters

	public function get_dayMonth(){
		return $this->dayMonth;
	}

	public function get_month(){
		return $this->month;
	}

	public function get_year(){
		return $this->year;
	}

	//Helper function.Format the prints.

	//This function formats the date as MDY:
	public function printDateMDY(){
		$format = '%02d/%02d/%04d';
		return sprintf($format, $this->month, $this->dayMonth, $this->year);		
	}

	//This function formats the date as DMY:
	public function printDateDMY(){
		$format = '%02d/%02d/%04d';
		return sprintf($format, $this->dayMonth, $this->month, $this->year);		
	}

	//This function formats the date as Month D, Y:
	public function printDateMonthDY(){
		$format = '%s %02d, %04d';
		return sprintf($format, $this->month, $this->dayMonth, $this->year);		
	}		

	//This function formats the date as D, Month, Year six months ahead:
	public function printDateDMYSixMonthsAhead(){
		$date = new DateTime($this->year."/".$this->month."/".$this->dayMonth);
		$date->add(new DateInterval('P6M'));
		return $date->format('d-m-Y');	
	}

	//This function formats the date as D, Month, Year three months ahead:
	public function printDateDMYThreeMonthsAhead(){
		$date = new DateTime($this->year."/".$this->month."/".$this->dayMonth);
		$date->add(new DateInterval('P3M'));
		return $date->format('d-m-Y');	
	}

	//This function formats the date as D, Month, Year nine months ahead:
	public function printDateDMYNineMonthsAhead(){
		$date = new DateTime($this->year."/".$this->month."/".$this->dayMonth);
		$date->add(new DateInterval('P9M'));
		return $date->format('d-m-Y');	
	}					

}

// $obj1 = new Dates(30, 10, 2016);
// echo $obj1->printDateMDY() . "<br />";

// $obj2 = new Dates(25, 12, 2017);
// echo $obj2->printDateDMY() . "<br />";

// $obj3 = new Dates(25, 'August', 2017);
// echo $obj3->printDateMonthDY();

?>