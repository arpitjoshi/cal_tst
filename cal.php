<?php
ini_set('date.timezone', 'Asia/Kolkata');

$input_m = "Jan";
$input_y = 2013 ;


/***
 *
 * Input month, year.
 * If month is not correct, this set it as Jan
 * Allowed month formats Jan, January ;
 * Exception if year if more than 4 digit long
 *
 * ***/
printCalendar($input_m, $input_y);


function printCalendar($input_m, $input_y){

	if(strlen($input_y) !== 4 ){
		throw new Exception('Input Errors..');
	}

	$month = date("m", strtotime($input_m . " 01 2001")) ;
	$year = $input_y ;

	echo PHP_EOL ;
	echo "Calendar for $input_m, $input_y";
	echo PHP_EOL ;
	echo PHP_EOL ;


	$week_of_days_array = array("MON", "TUE", "WED", "THU", "FRI", "SAT", "SUN") ;


	$timestamp = strtotime($year . "-" . $month . "-01");
	$starting_day = date('D', $timestamp);
	$padding = - array_search(strtoupper($starting_day), $week_of_days_array) + 1  ;

	foreach($week_of_days_array as $day){
		echo $day . "\t" ;
	}

	echo PHP_EOL ;

	$i = $padding ; 
	$line_break = 0 ;
	while( date("m", strtotime($year . "-" . $month . "-" . $i))==$month || $i<1  ){


		if(strtotime($year . "-" . $month . "-" . $i)===false && $i>0) {
			break ;
		}

		if($i>0){
			echo $i ;	
		}else{
			echo "";
		}
		$line_break ++ ;
		if($line_break % 7 == 0){
			echo PHP_EOL ;
			$line_break = 0 ;
		}else{
			echo "\t";
		}


		$i++ ;

	}


	echo PHP_EOL . PHP_EOL ;
}
