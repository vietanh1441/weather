<!DOCTYPE html>

<?php


  // connecting function
function db_connect()
{
$connection=mysql_connect("localhost", "oriobird", "Jesuis14$!");

if(!$connection)
{
	echo 'fail';
	}
	if(!mysql_select_db('oriobird_hi'))
	{
		echo 'fail';
	}
	
	return $connection;
}
	db_connect();
	
	//update new data
function update()
{
	db_connect();
	exec("python ../cgi-bin/ex1.py", $output);
	$pieces = explode(",", $output[0]);
	$old_date_timestamp = strtotime($pieces[0]);
	$pieces[0] = date('n/j/Y g:i', $old_date_timestamp);
	$query = sprintf('INSERT INTO `weather` (`Time`, `Record`, `AWS`, `AWD`, `SIG`, `Gust`, `AvgAT`, `MaxAT`, `MinAT`, `AvgRH`, `AvgBP`, `TotRN_5`, `DailyRN`, `Batt`) VALUES("%s",%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s)',
	$pieces[0],$pieces[1],$pieces[2],$pieces[3],$pieces[4],$pieces[5],$pieces[6],$pieces[7],$pieces[8],$pieces[9],$pieces[10],$pieces[11],$pieces[12],$pieces[13]);
	
	echo $query;
	$result =mysql_query($query);
}


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

function result_to_array($result)
	{
		$result_array = array();
		for($i = 0; $row = mysql_fetch_array($result);$i++)
		{
			$result_array[$i] = $row;
		}
		
		return $result_array;
	}
	
	// select desired data from database
	// for example, to get the current time, use select_data("Time")
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

	//echo $posts[0][$i] ;
	return $posts[0][$i];
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
		print_r($result);
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

	echo $posts[0][$i] ;
	return $posts[0][$i];
}	
?>



<script type="text/javascript">
	document.write('<div>Print this after the script tag</div>');
	function draw_chart(startTime, endTime, element){
		
		Rec1 = <?php echo $hi = select_old_data("Record", startTime);?>;
		print Rec1;
			
	
	}
		var ctx = document.getElementById("TempChart").getContext("2d");
		
		//This is the min domain of the graph. Default to 00:00 of current day(fetch top row). A form
		//Would allow the user to manually set the start time.
		var startTime = "5/18/2014 00:00"; 
		//The max domain of the graph. Default to last 5  minute interval (fetch top row). A form
		//Would allow for manual adjustments
		var endTime = "5/18/2014 5:15"; //Rounded to nearest 5 min, form or default to current time
		//Difference (in minutes) between start and end time. Used to get size of arrays.
		
		
		var dif = 315; 
		draw_chart(startTime, endTime, "Temp")
		//labelSet is our temporary array to hold our labels.
		//Start by creating an array of size dif/5 (number of intervals) and filling each element with ""
		//The chart library wants a label for each data point, but isnt capable of hiding any of them,
		//so if we had say 200 labels, they would be unreadable. We really just need to show the start 
		//and end time in the graph, i think. So replace the first and last elements with appropriate data.
		
		
	</script>
	<?php
	echo $hi = select_data("Record");
	
?>