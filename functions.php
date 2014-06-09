<?php

function db_connect()
{
	$connection=mysql_connect("localhost", "oriobird", "Jesuis14$!");

	if(!$connection)
	{
		echo 'fail';
	}
	if(!mysql_select_db('oriobird_hi'))
	{
		return false;
	}

	return $connection;
}
//Using ex1.py, a script that get the data from weather's station IP adress
//Use these data to input them into the database as the newest entry
function update()
{
	db_connect();
	exec("python ../cgi-bin/ex1.py", $output);
	$pieces = explode(",", $output[0]);
	echo $pieces[0];
	$pieces[0] = trim($pieces[0], '"');
	echo $pieces[0];
	$old_date_timestamp = strtotime($pieces[0]);
	$pieces[0] = date('n/j/Y G:i', $old_date_timestamp);
	echo $pieces[0];
	$query = sprintf('INSERT INTO `weather` (`Time`, `Record`, `AWS`, `AWD`, `SIG`, `Gust`, `AvgAT`, `MaxAT`, `MinAT`, `AvgRH`, `AvgBP`, `TotRN_5`, `DailyRN`, `Batt`) VALUES("%s",%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s)',
	$pieces[0],$pieces[1],$pieces[2],$pieces[3],$pieces[4],$pieces[5],$pieces[6],$pieces[7],$pieces[8],$pieces[9],$pieces[10],$pieces[11],$pieces[12],$pieces[13]);

	echo $query;
	$result =mysql_query($query);
}

//Get the lastest data
function get_data()
{
	db_connect();
	$query = 'SELECT * FROM weather WHERE Record = ( SELECT MAX( Record ) FROM weather)';
		$result = mysql_query($query);

		$number_of_posts = mysql_num_rows($result);

		if($number_of_posts == 0)
		{
			return false;
		}

		$result = result_to_array($result);

		return $result;
}

//return the result into array
function result_to_array($result)
{
	$result_array = array();
	for($i = 0; $row = mysql_fetch_array($result);$i++)
	{
		$result_array[$i] = $row;
	}

	return $result_array;
}

//Select the lastest specific record. Put the desired 
//record to find as $param
function select_data($param)
{
	db_connect();
	$posts = get_data();
	$i = 0;
	switch ($param) {
    case "Time":
        $i = 0;
        break;
    case "Record":
        $i = 1;
        break;
    case "AWS":
        $i = 2;
        break;
	case "AWD":
        $i = 3;
        break;
	case "SIG":
        $i = 4;
        break;
	case "Gust":
        $i = 5;
        break;
	case "AvgAT":
        $i = 6;
        break;
	case "MaxAT":
        $i = 7;
        break;
	case "MinAT":
        $i = 8;
        break;
	case "AvgAH":
        $i = 9;
        break;
	case "AvgBP":
        $i = 10;
        break;
	case "TotRN_5":
        $i = 11;
        break;
	case "DailyRN":
        $i = 12;
        break;
	case "Batt":
        $i = 13;
        break;
	}
	return $posts[0][$i] ;
}

	//functions to get record from date
function check_record($param)
{
	db_connect();
	$query = sprintf('SELECT Record From weather Where Time = "%s"',$param);
	//echo $query;
	$result = mysql_query($query);
	$result = result_to_array($result);
	//echo $result[0][0];
	return $result[0][0];
}
	// get data from record
	function get_old_data($param)
{
	db_connect();
	$record = check_record($param);
	
	$query = sprintf('SELECT * FROM weather WHERE Record = %s', $record);
		$result = mysql_query($query);
		
		$number_of_posts = mysql_num_rows($result);
		
		if($number_of_posts == 0)
		{
			return false;
		}
		
		$result = result_to_array($result);
		//print_r($result);
		return $result;
}
	
	// select data depend on the date
	// for example, select_old_data("AWS", "1/1/2013 0:00") to get AWS data from 1/1/2013
function select_old_data($param, $date)
	{
	db_connect();
	$posts = get_old_data($date);
	$i = 0;
		switch ($param) {
		case "Time":
			$i = 0;
			break;
		case "Record":
			$i = 1;
			break;
		case "AWS":
			$i = 2;
			break;
		case "AWD":
			$i = 3;
			break;
		case "SIG":
			$i = 4;
			break;
		case "Gust":
			$i = 5;
			break;
		case "AvgAT":
			$i = 6;
			break;
		case "MaxAT":
			$i = 7;
			break;
		case "MinAT":
			$i = 8;
			break;
		case "AvgAH":
			$i = 9;
			break;
		case "AvgBP":
			$i = 10;
			break;
		case "TotRN_5":
			$i = 11;
			break;
		case "DailyRN":
			$i = 12;
			break;
		case "Batt":
			$i = 13;
			break;
		}

	//echo $posts[0][$i] ;
	return $posts[0][$i];
}	

//Compare 2 dates and return its different in hours
function compare($s_year, $s_month, $s_date, $s_time, $e_year, $e_month, $e_date, $e_time) 
{
	//Converse the input value into a single time string
	$start_time = strtotime(sprintf("%s/%s/%s %s", $s_month, $s_date, $s_year, $s_time));
	$end_time = strtotime(sprintf("%s/%s/%s %s", $e_month, $e_date, $e_year, $e_time));
	
	//Compare, if start_time is later than end time
	//then switch between them
	if($start_time > $end_time)
	{
		$temp = $start_time;
		$start_time = $end_time;
		$end_time = $temp;
	}
	
	//Find different in hours
	$dif = round(abs($end_time - $start_time) / 3600,2);
	
	//return 3 values
	return array($dif, $start_time, $end_time);
}

//Take in 2 date parameter and its desired data and return its maximum, minimum and average
function find_interval($param1, $param2, $data)
{
	//$param1 = date("n/j/Y G:i",$param1);
	//$param2 = date("n/j/Y G:i",$param2);
	$record1 = check_record($param1);
	$record2 = check_record($param2);
	$query = sprintf("SELECT Max(`%s`) FROM `weather` WHERE `Record`>%s AND `Record` <%s",$data, $record1, $record2);
	$max = mysql_query($query);
	$max = result_to_array($max);
	$query = sprintf("SELECT Min(`%s`) FROM `weather` WHERE `Record`>%s AND `Record` <%s",$data, $record1, $record2);
	$min = mysql_query($query);
	$min = result_to_array($min);
	$query = sprintf("SELECT Avg(`%s`) FROM `weather` WHERE `Record`>%s AND `Record` <%s",$data, $record1, $record2);
	$avg = mysql_query($query);
	$avg = result_to_array($avg);
	//$query = sprintf("SELECT Min('%s') FROM `weather` WHERE 'Record'>%s And 'Record' <%s",$data, $record1, $record2);
	
	//$min = mysql_query($query);
	//$query = sprintf("SELECT Avg('%s') FROM `weather` WHERE 'Record'>%s And 'Record' <%s",$data, $record1, $record2);
	
//	$avg = mysql_query($query);
	$max = $max[0][0];
	$min = $min[0][0];
	$avg = $avg[0][0];
	return array($max, $min, $avg);
	
}

	
//find_interval($start_time, $end_time, "AvgAT");

function find_label($dif, $start_time, $end_time)
{
	//There will be a labels every hour
	
	$time_dif = ($end_time - $start_time)/5;
	$labels_num = 5;
	
	//Making labels for each label. Time for each label is start time
	//plus $time_dif*i 
	$array = array();
	$array[0] = date("n/j/Y G:i",$start_time);
	for ($i = 1; $i < $labels_num; ++$i) {
		$start_time = $start_time + $time_dif;
		$array[$i] = date("n/j/Y G:i",$start_time);
		};
	$array[$labels_num] = date("n/j/Y G:i",$end_time);
		//echo count($array);
		return $array;
}
//gets the analog wind direction
function get_wind_dir()
{
	db_connect();
	$posts = get_data();
	$dir_dig = $posts[0][3];
	$dir_ana = "";
	if($dir_dig == 0 || $dir_dig == 360)
		$dir_ana = "N";
	elseif($dir_dig > 0 && $dir_dig < 45)
		$dir_ana = "NNE";
	elseif($dir_dig == 45)
		$dir_ana = "NE";
	elseif($dir_dig > 45 && $dir_dig < 90)
		$dir_ana = "NEE";
	elseif($dir_dig == 90)
		$dir_ana = "E";
	elseif($dir_dig > 90 && $dir_dig < 135)
		$dir_ana = "SEE";
	elseif($dir_dig == 135)
		$dir_ana = "SE";
	elseif($dir_dig > 135 && $dir_dig < 180)
		$dir_ana = "SSE";
	elseif($dir_dig == 180)
		$dir_ana = "S";
	elseif($dir_dig > 180 && $dir_dig < 225)
		$dir_ana = "SSW";
	elseif($dir_dig == 225)
		$dir_ana = "SW";
	elseif($dir_dig > 225 && $dir_dig < 270)
		$dir_ana = "SWW";
	elseif($dir_dig == 270)
		$dir_ana = "W";
	elseif($dir_dig > 270 && $dir_dig < 315)
		$dir_ana = "NWW";
	elseif($dir_dig == 315)
		$dir_ana = "NW";
	elseif($dir_dig > 315 && $dir_dig < 360)
		$dir_ana = "NNW";

	echo $dir_ana . " " . "(" . (int)$dir_dig . ")";
	
}
//[0] = max wind speed today, [1] = time
function get_max_AWS()
{
	$query = "SELECT MAX(AWS) WHERE 
		CAST(FLOOR(CAST(" . select_data("Time") . " AS FLOAT)) AS DATETIME) == CAST(FLOOR(CAST(Time AS FLOAT)) AS DATETIME)";
	return array(16.7, "8:40");
}

//Max gust speed, time of max
function get_max_Gust()
{
	return array(27.2, "10:05");
}

//dew point calculation
function get_dew_point()
{
	return 49.7;
}
//wind chill formula
function get_wind_chill()
{
	return 44.7;
}
//returns the times for max temp, and min temp
function get_temp_times()
{
	return array("12:35", "00:00");
}

//get the mb value for AvgBP
function get_mb()
{
	return 1021.7;
}

//gets hourly tendency
function get_hr_tend()
{
	return 0.0;
}

//returns max_BP, and time
function get_max_BP()
{
	return array( 30.18, "11:25");
}

//returns min BP and time
function get_min_BP()
{
	return array( 30.04, "00:05");
}

//returns max RH and time
function get_RH_max()
{
	return array(100.0,"00:00");
}
// returns minRH and time
function get_RH_min()
{
	return array(80.0 ,"00:00");
}


//get RN in last hr
function get_hr_RN()
{
	return 0.00;
}

// get yesterday RN
function get_yest_RN()
{
	return 0.05;
}

//get this months RN
function get_month_RN()
{
	return 8.34;
}

//get monthly RN norm
function get_RN_norm_monthly()
{
	return 8.69;
}

//get RN this year so far
function get_year_RN()
{
	return 35.63;
}


?>
