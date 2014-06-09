<!DOCTYPE html>
<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);
include("functions.php") 
?>


<html>
	
	<link type = "text/css" rel="stylesheet" media="screen" href = "style.css" />
	<script type="text/javascript" src="jquery-1.8.1.min.js"></script>
		<div id = "Wrapper">
			<div id = "Content">

<div id = "WeatherTable">
	<table class = "WeatherTable">
		<tr class = "TitleRow">
			<td class = "TitleRowTD" colspan="4" valign="middle">
				<p>Current Conditions</p>
				<p class="style4"><?php select_data("Time"); ?> </p>
			
			</td>
			<td colspan="4" bordercolor="#000000" > <p>Daily Min., Max, and Total</p></td>
		</tr>
		<tr>
			<td width="19%" rowspan="2" bordercolor="#333333" bgcolor="#00CCFF"><blockquote>
				<p><strong>Wind (mph)</strong></p>
			</blockquote></td>
			<td width="9%" height="28" align="center" valign="middle" nowrap="" bordercolor="#333333" bgcolor="#00CCFF"><div align="center"><strong>Speed</strong></div></td>
			<td width="10%" align="center" valign="middle" nowrap="" bordercolor="#333333" bgcolor="#00CCFF"><div align="center"><strong>Direction</strong></div></td>
			<td width="14%" align="center" valign="middle" nowrap="" bordercolor="#333333" bgcolor="#00CCFF"><div align="center"><strong>Gust</strong></div></td>
			<td width="14%" align="center" valign="middle" nowrap="" bordercolor="#333333" bgcolor="#00CCFF"><div align="center"><strong>Max Speed</strong></div></td>
			<td width="10%" align="center" valign="middle" nowrap="" bordercolor="#333333" bgcolor="#00CCFF"><div align="center"><strong>Time of Max</strong></div></td>
			<td width="14%" align="center" valign="middle" nowrap="" bordercolor="#333333" bgcolor="#00CCFF"><div align="center"><strong>Max Gust</strong></div></td>
			<td width="10%" align="center" valign="middle" nowrap="" bordercolor="#333333" bgcolor="#00CCFF"><div align="center"><strong>Time of Max</strong></div></td>
		</tr>
		<tr>
			<td height="36" nowrap="" bordercolor="#333333" bgcolor="#00CCFF"><div align="center"><?php select_data("AWS");?></div></td>
			<td nowrap="" bordercolor="#333333" bgcolor="#00CCFF"><div align="center"><?php get_wind_dir();?></div></td> <!-- W = 0, 0-45 = NWW, 45 = NW, 45-90 = NNW, N = 90,90-135 = NNE, 135-180 = NEE, E = 180, S = 270, etc -->
			<td nowrap="" bordercolor="#333333" bgcolor="#00CCFF"><div align="center"><?php select_data("Gust");?></div></td>
			<td nowrap="" bordercolor="#333333" bgcolor="#00CCFF"><div align="center"><?php list($max, $time) = get_max_AWS(); echo "$max"; ?></div></td> <!--max speed where time = latest day in db -->
			<td nowrap="" bordercolor="#333333" bgcolor="#00CCFF"><div align="center"><?php echo "$time" ?></div></td> <!--get the row of above, then submit time in HH:MM -->
			<td nowrap="" bordercolor="#333333" bgcolor="#00CCFF"><div align="center"><?php list($max, $time) = get_max_Gust(); echo "$max"; ?></div></td> <!-- max gust where time = latest day in db -->
			<td nowrap="" bordercolor="#333333" bgcolor="#00CCFF"><div align="center"><?php echo "$time"?></div></td> <!-- same really-->
		</tr>
		<tr>
			<td rowspan="2" bordercolor="#333333" bgcolor="#FFCC33"><blockquote>
				<p><strong>Temperature (F)</strong></p>
			</blockquote></td>
			<td height="27" align="center" valign="middle" nowrap="" bordercolor="#333333" bgcolor="#FFCC33"><div align="center"><strong>(F</strong>)</div></td>
			<td align="center" valign="middle" nowrap="" bordercolor="#333333" bgcolor="#FFCC33"><div align="center"><strong>Dew Point </strong></div></td>
			<td align="center" valign="middle" nowrap="" bordercolor="#333333" bgcolor="#FFCC33"><div align="center"><strong>Wind Chill</strong></div></td>
			<td align="center" valign="middle" nowrap="" bordercolor="#333333" bgcolor="#FFCC33"><div align="center"><strong>Max</strong></div></td>
			<td align="center" valign="middle" nowrap="" bordercolor="#333333" bgcolor="#FFCC33"><div align="center"><strong>Time of Max</strong></div></td>
			<td align="center" valign="middle" nowrap="" bordercolor="#333333" bgcolor="#FFCC33"><div align="center"><strong>Min</strong></div></td>
			<td align="center" valign="middle" nowrap="" bordercolor="#333333" bgcolor="#FFCC33"><div align="center"><strong>Time of Min</strong></div></td>
		</tr>
		<tr>
			<td height="35" nowrap="" bordercolor="#333333" bgcolor="#FFCC33"><div align="center"><?php select_data("AvgAT");?></div></td> <!--AvgAT-->
			<td nowrap="" bordercolor="#333333" bgcolor="#FFCC33"><div align="center"><?php echo get_dew_point(); ?></div></td> <!--Dew point formula -->
			<td nowrap="" bordercolor="#333333" bgcolor="#FFCC33"><div align="center"><?php echo get_wind_chill(); ?></div></td> <!--wind chill formula-->
			<td nowrap="" bordercolor="#333333" bgcolor="#FFCC33"><div align="center"><?php select_data("MaxAT");?></div></td> <!--MaxAT -->
			<td nowrap="" bordercolor="#333333" bgcolor="#FFCC33"><div align="center"><?php list($max, $min) = get_temp_times(); echo "$max"; ?></div></td><!--get time -->
			<td nowrap="" bordercolor="#333333" bgcolor="#FFCC33"><div align="center"><?php select_data("MinAT");?></div></td> <!--MinAT -->
			<td nowrap="" bordercolor="#333333" bgcolor="#FFCC33"><div align="center"><?php echo $min;?></div></td><!--get time -->
		</tr>
		<tr>
			<td rowspan="2" bordercolor="#333333" bgcolor="#33FF66"><blockquote>
				<p><strong>Atmospheric Pressure</strong></p>
			</blockquote></td>
			<td height="28" align="center" valign="middle" nowrap="" bordercolor="#333333" bgcolor="#33FF66"><div align="center"><strong> HG</strong></div></td>
			<td align="center" valign="middle" nowrap="" bordercolor="#333333" bgcolor="#33FF66"><div align="center"><strong>mb</strong></div></td>
			<td align="center" valign="middle" nowrap="" bordercolor="#333333" bgcolor="#33FF66"><div align="center"><strong>1-Hour Tendency</strong> <strong>(mb)</strong></div></td>
			<td align="center" valign="middle" nowrap="" bordercolor="#333333" bgcolor="#33FF66"><div align="center"><strong>Max</strong></div></td>
			<td align="center" valign="middle" nowrap="" bordercolor="#333333" bgcolor="#33FF66"><div align="center"><strong>Time of Max</strong></div></td>
			<td align="center" valign="middle" nowrap="" bordercolor="#333333" bgcolor="#33FF66"><div align="center"><strong>Min</strong></div></td>
			<td align="center" valign="middle" nowrap="" bordercolor="#333333" bgcolor="#33FF66"><div align="center"><strong>Time of Min</strong></div></td>
		</tr>
		<tr>
			<td height="36" nowrap="" bordercolor="#333333" bgcolor="#33FF66"><div align="center"><?php select_data("AvgBP");?></div></td> <!-- AvgBP-->
			<td nowrap="" bordercolor="#333333" bgcolor="#33FF66"><div align="center"><?php echo get_mb(); ?></div></td> <!-- A conversion i believe -->
			<td nowrap="" bordercolor="#333333" bgcolor="#33FF66"><div align="center"><?php echo get_hr_tend(); ?></div></td> <!-- formula of some kind-->
			<td nowrap="" bordercolor="#333333" bgcolor="#33FF66"><div align="center"><?php list($max, $time) = get_max_BP(); echo "$max"; ?></div></td> <!-- Manual querys-->
			<td nowrap="" bordercolor="#333333" bgcolor="#33FF66"><div align="center"><?php echo "$time" ;?></div></td> <!--"" -->
			<td nowrap="" bordercolor="#333333" bgcolor="#33FF66"><div align="center"><?php list($min, $time) = get_min_BP(); echo "$min"; ?></div></td> <!-- ""-->
			<td nowrap="" bordercolor="#333333" bgcolor="#33FF66"><div align="center"><?php echo "$time" ?></div></td> <!--"" -->
		</tr>
		<tr>
			<td rowspan="2" bordercolor="#333333" bgcolor="#00ccff"><blockquote>
				<p><strong>Relative Humidity </strong></p>
			</blockquote></td>
			<td colspan="2" align="center" valign="middle" nowrap="" bordercolor="#333333" bgcolor="#00ccff"><div align="center"><strong>RH (%)</strong></div></td>
			<td align="center" valign="middle" nowrap="" bordercolor="#333333" bgcolor="#00ccff"><div align="center"><strong>-</strong></div></td>
			<td align="center" valign="middle" nowrap="" bordercolor="#333333" bgcolor="#00ccff"><div align="center"><strong>RH Max</strong></div></td>
			<td align="center" valign="middle" nowrap="" bordercolor="#333333" bgcolor="#00ccff"><div align="center"><strong>Time of Max</strong></div></td>
			<td align="center" valign="middle" nowrap="" bordercolor="#333333" bgcolor="#00ccff"><div align="center"><strong>RH Min</strong></div></td>
			<td align="center" valign="middle" nowrap="" bordercolor="#333333" bgcolor="#00ccff"><div align="center"><strong>Time of Min</strong></div></td>
		</tr>
		<tr>
			<td height="33" colspan="2" nowrap="" bordercolor="#333333" bgcolor="#00ccff"><div align="center"><?php select_data("AvgAH");?></div></td> <!--AvgAH -->
			<td nowrap="" bordercolor="#333333" bgcolor="#00ccff"><div align="center">-</div></td> 
			<td nowrap="" bordercolor="#333333" bgcolor="#00ccff"><div align="center"><?php list($max, $time)  = get_RH_max(); echo "$max" ;?></div></td> <!-- Manual query -->
			<td nowrap="" bordercolor="#333333" bgcolor="#00ccff"><div align="center"><?php echo "$time" ?></div></td> <!--"" -->
			<td nowrap="" bordercolor="#333333" bgcolor="#00ccff"><div align="center"><?php list($min, $time) = get_RH_min(); echo "$min"; ?></div></td> <!-- ""-->
			<td nowrap="" bordercolor="#333333" bgcolor="#00ccff"><div align="center"><?php echo "$time" ?></div></td> <!-- ""-->
		</tr>
		<tr>
			<td rowspan="3" bordercolor="#333333" bgcolor="#66CCCC"><blockquote>
				<p><strong>Precipitation (in)</strong></p>
			</blockquote></td>
			<td height="29" align="center" valign="middle" nowrap="" bordercolor="#333333" bgcolor="#66CCCC"><div align="center"><strong>Last 5 Min.</strong></div></td>
			<td align="center" valign="middle" nowrap="" bordercolor="#333333" bgcolor="#66CCCC"><div align="center"><strong>Last Hour</strong></div></td>
			<td align="center" valign="middle" nowrap="" bordercolor="#333333" bgcolor="#66CCCC"><div align="center"><strong>Since Midnight</strong></div></td>
			<td align="center" valign="middle" nowrap="" bordercolor="#333333" bgcolor="#66CCCC"><div align="center"><strong>Yesterday</strong></div></td>
			<td align="center" valign="middle" nowrap="" bordercolor="#333333" bgcolor="#66CCCC"><div align="center"><strong>This Month</strong></div></td>
		<td align="center" valign="middle" nowrap="" bordercolor="#333333" bgcolor="#66CCCC"><div align="center"><strong>Monthly Norm</strong></div></td>
		<td align="center" valign="middle" nowrap="" bordercolor="#333333" bgcolor="#66CCCC"><div align="center"><strong>This Year</strong></div></td>
		</tr>
		<tr>	
			<td height="36" nowrap="" bordercolor="#333333" bgcolor="#66CCCC"><div align="center"><?php select_data("TotRN_5");?></div></td> <!--TotRN_5 -->
			<td nowrap="" bordercolor="#333333" bgcolor="#66CCCC"><div align="center">0.00</div></td> <!--manual -->
			<td nowrap="" bordercolor="#333333" bgcolor="#66CCCC"><div align="center"><?php select_data("DailyRN");?></div></td> <!--DailyRN -->
			<td nowrap="" bordercolor="#333333" bgcolor="#66CCCC"><div align="center">0.05</div></td> <!-- DailyRN of yesterday-->
			<td nowrap="" bordercolor="#333333" bgcolor="#66CCCC"><div align="center">1.81</div></td> <!-- add up Daily RNs @ 1155 this month-->
			<td nowrap="" bordercolor="#333333" bgcolor="#66CCCC"><div align="center">8.69</div></td> <!-- This is part of some table?-->
			<td nowrap="" bordercolor="#333333" bgcolor="#66CCCC"><div align="center">6.03</div></td> <!-- add up Daily RNs @ 1155 this year-->
		</tr>
	</table>




</div>

<div id = "WeatherCharts">
	
	<!--Script for Tab Control-->
	<script type = "text/javascript">
		$(document).ready(function(){
			var activeTabIndex = -1;
			var tabNames = ["wind","temp","press", "hum" , "prec"];

			$(".tabMenu > li").click(function(e){
				for(var i=0;i<tabNames.length;i++) {
					if(e.target.id == tabNames[i]) {
						activeTabIndex = i;
					} else {
						$("#"+tabNames[i]).removeClass("active");
						$("#"+tabNames[i]+"Tab").css("display", "none");
					}
				}
				$("#"+tabNames[activeTabIndex]+"Tab").fadeIn();
				$("#"+tabNames[activeTabIndex]).addClass("active");
				return false;
			});
		});
		</script>
	<!--HTML portion-->
	<div id = "tabContainer" >
		<ul class="tabMenu">  
			<li id="wind" class="active">Wind</li>  
			<li id="temp" >Temperature</li>  
			<li id="press" >Pressure</li>  
			<li id="hum">Humidity</li>  
			<li id="prec">Precipitation</li>  
		</ul>  
		
		<div class="clear"></div>  
		<div class="tab-top-border"></div>
		
		<div id = "windTab" class = "tabContent active">
			<canvas id ="WindChart" width = "940" height = "600"/>
		</div>
		<div id = "tempTab" class = "tabContent">
			<canvas id ="TempChart" width = "940" height = "600"/>
		</div>
		<div id = "pressTab" class = "tabContent">
			<canvas id ="PressureChart" width = "940" height = "600"/>
		</div>
		<div id = "humTab" class = "tabContent">
			<canvas id ="HumidityChart" width = "940" height = "600"/>
		</div>
		<div id = "precTab" class = "tabContent">
			<canvas id ="PrecipChart" width = "940" height = "600"/>
		</div>
		
		
	</div>
		
		<!--
		
		<canvas id ="PressureChart" width = "940" height = "600"/>
		<canvas id ="HumidityChart" width = "940" height = "600"/>
		<canvas id ="PrecipChart" width = "940" height = "600"/> -->
	
	<!--Some Includes-->
	<script src = "Chart.js"></script>
	<script src = "Underscore.js"></script>
	<?php 	
				if(isset($_POST['range']))
				{
				
					$s_year =  $_POST['year_s'];
					$e_year =  $_POST['year_e'];
					$s_month =  $_POST['month_s'];
					$e_month =  $_POST['month_e'];
					$s_date =  $_POST['day_s'];
					$e_date =  $_POST['day_e'];
					$s_time =  $_POST['time_s'];
					$e_time =  $_POST['time_e'];
				}
				else{
					$s_year = "2013";
					$e_year = "2013";
					$s_month = "01";
					$e_month = "01";
					$s_date = "01";
					$e_date = "02";
					$s_time = "00:00";
					$e_time = "05:00";
				}
				
				
				list($dif, $start_time, $end_time) = compare($s_year, $s_month, $s_date, $s_time, $e_year, $e_month, $e_date, $e_time);
				$array = array();
				$array = find_label($dif, $start_time, $end_time);
				$label_nums = count($array);
				
				echo $label_nums;
				
				$AvgAT = array();
				$MaxAT = array();
				$MinAT = array();	
				for($i=0; $i<$label_nums-1; $i++)
				{
					list($max, $min, $avg) = find_interval($array[$i], $array[$i+1], "AvgAT");
					echo $array[$i];
					array_push($AvgAT, $avg);
					array_push($MaxAT, $max);
					array_push($MinAT, $min);
				}
					
				
				
				$AWS = array();
				for($i=0; $i<$label_nums; $i++)
				{
					$data = select_old_data("AWS", $array[$i]);
					array_push($AWS, $data);
				}
				
				/*for($i=1; $i<$label_nums-1; $i++)
				{
					if($i % ($label_nums/10)!= 0)
					{
						$array[$i] = " ";
					}
				}*/
				
				?>
	<!-- Scripts for Charts -->
	<script type="text/javascript">
		var ctx = document.getElementById("TempChart").getContext("2d");
		
		
		var labelSet = new Array();
		labelSet = <?php echo json_encode($array) ?>;
		
		var a = new Array(); 
		a = <?php echo json_encode($AvgAT) ?>;
			
		var b = new Array(); 
		b = <?php echo json_encode($MaxAT) ?>;
		
		var c = new Array();
		c = <?php echo json_encode($MinAT) ?>;		
				
		var data = {
			
			labels : labelSet,
			datasets : [
			{
			
				fillColor : "rgba(220,220,220,0.5)",
				strokeColor : "rgba(220,220,220,1)",
				data : a
			},
			{
				fillColor : "rgba(151,187,205,0.5)",
				strokeColor : "rgba(151,187,205,1)",
				data :b
			},
			
			{
				fillColor : "rgba(256,187,205,0.5)",
				strokeColor : "rgba(256,187,205,1)",
				data :c
			}
			]
		}
		var myTempChart = new Chart(ctx).Line(data, {scaleShowGridLines : true,
		bezierCurve : true,
		pointDot : false
		
		});
		
		//WindChart
		var ctx = document.getElementById("WindChart").getContext("2d");
		
		
		var labelSet = new Array();
		labelSet = <?php echo json_encode($array) ?>;
		
		var a = new Array(); 
		a = <?php echo json_encode($AWS) ?>;
				
				
		var data = {
			
			labels : labelSet,
			datasets : [
			{
			
				fillColor : "rgba(220,220,220,0.5)",
				strokeColor : "rgba(220,220,220,1)",
				data : a
			}
			]
		}
		var myTempChart = new Chart(ctx).Line(data, {scaleShowGridLines : true,
		bezierCurve : true,
		pointDot : false
		
		});
		
		//pressure chart
		
		var ctx = document.getElementById("PressureChart").getContext("2d");
		
		
		var labelSet = new Array();
		labelSet = <?php echo json_encode($array) ?>;
		
		var a = new Array(); 
		a = <?php echo json_encode($AWS) ?>;
				
				
		var data = {
			
			labels : labelSet,
			datasets : [
			{
			
				fillColor : "rgba(220,220,220,0.5)",
				strokeColor : "rgba(220,220,220,1)",
				data : a
			}
			]
		}
		var myTempChart = new Chart(ctx).Line(data, {scaleShowGridLines : true,
		bezierCurve : true,
		pointDot : false
		
		});
		
		//Humidity
		
		var ctx = document.getElementById("HumidityChart").getContext("2d");
		
		
		var labelSet = new Array();
		labelSet = <?php echo json_encode($array) ?>;
		
		var a = new Array(); 
		a = <?php echo json_encode($AWS) ?>;
				
				
		var data = {
			
			labels : labelSet,
			datasets : [
			{
			
				fillColor : "rgba(220,220,220,0.5)",
				strokeColor : "rgba(220,220,220,1)",
				data : a
			}
			]
		}
		var myTempChart = new Chart(ctx).Line(data, {scaleShowGridLines : true,
		bezierCurve : true,
		pointDot : false
		
		});
		
		//Precip
		
		var ctx = document.getElementById("PrecipChart").getContext("2d");
		
		
		var labelSet = new Array();
		labelSet = <?php echo json_encode($array) ?>;
		
		var a = new Array(); 
		a = <?php echo json_encode($AWS) ?>;
				
				
		var data = {
			
			labels : labelSet,
			datasets : [
			{
			
				fillColor : "rgba(220,220,220,0.5)",
				strokeColor : "rgba(220,220,220,1)",
				data : a
			}
			]
		}
		var myTempChart = new Chart(ctx).Line(data, {scaleShowGridLines : true,
		bezierCurve : true,
		pointDot : false
		
		});
		
	</script>


<div id = "ChartRange">
<form action = "index.php" name = "range" method = "POST">
	
	Start Time:
	<select name = "year_s" id = "year_s">
	</select>	
	<select name = "month_s" id = "month_s" onchange = "fillDays(&quot;year_s&quot;, this, &quot;day_s&quot;)">
		<option>January</option>
		<option>February</option>
		<option>March</option>
		<option>April</option>
		<option>May</option>
		<option>June</option>
		<option>July</option>
		<option>August</option>
		<option>September</option>
		<option>October</option>
		<option>November</option>
		<option>December</option>
	</select>
	<select name = "day_s" id = "day_s">
	</select>
	<select name = "time_s" id = "time_s">
		<option>0:00</option>
		<option>1:00</option>
		<option>2:00</option>
		<option>3:00</option>
		<option>4:00</option>
		<option>5:00</option>
		<option>6:00</option>
		<option>7:00</option>
		<option>8:00</option>
		<option>9:00</option>
		<option>10:00</option>
		<option>11:00</option>
		<option>12:00</option>
		<option>13:00</option>
		<option>14:00</option>
		<option>15:00</option>
		<option>16:00</option>
		<option>17:00</option>
		<option>18:00</option>
		<option>19:00</option>
		<option>20:00</option>
		<option>21:00</option>
		<option>22:00</option>
		<option>23:00</option>
	</select>
	
	<br\><br/>
	
	End Time :
	<select name = "year_e" id = "year_e">
	</select>
	<select name = "month_e" id = "month_e" onchange = "fillDays(&quot;year_e&quot;, this, &quot;day_e&quot;)">
		<option>January</option>
		<option>February</option>
		<option>March</option>
		<option>April</option>
		<option>May</option>
		<option>June</option>
		<option>July</option>
		<option>August</option>
		<option>September</option>
		<option>October</option>
		<option>November</option>
		<option>December</option>
	</select>
	<select name = "day_e" id = "day_e">
	</select>
	<select name = "time_e" id = "time_e">
		<option>0:00</option>
		<option>1:00</option>
		<option>2:00</option>
		<option>3:00</option>
		<option>4:00</option>
		<option>5:00</option>
		<option>6:00</option>
		<option>7:00</option>
		<option>8:00</option>
		<option>9:00</option>
		<option>10:00</option>
		<option>11:00</option>
		<option>12:00</option>
		<option>13:00</option>
		<option>14:00</option>
		<option>15:00</option>
		<option>16:00</option>
		<option>17:00</option>
		<option>18:00</option>
		<option>19:00</option>
		<option>20:00</option>
		<option>21:00</option>
		<option>22:00</option>
		<option>23:00</option>
	</select>	

	<br/>
	<input type = "submit" value = "Submit" />
</form>
<script type = "text/javascript">
		window.onload = fillYears();
		//Get current year, then give all years since 1996. put these in ddls
		function fillYears()
		{
			var names = ["1996", "1997", "1998", "1999", "2000", "2001", "2002", "2003", "2004", "2005", "2006", "2007", "2008", "2009", "2010", "2011", "2012", "2013", "2014"];
			var s = document.getElementById("year_s");
			var e = document.getElementById("year_e");
			for(var i = 0; i < names.length; i++) {
				//option for start year
				var opts = document.createElement("OPTION");
				opts.text = names[i];
				opts.value = names[i];
				//option for end year
				var opte = document.createElement("OPTION");
				opte.text = names[i];
				opte.value = names[i];
				//appendTuk
				s.options.add(opts);
				e.options.add(opte);
			}
		}
		//Switch statement, number of days depends on month.
		function fillDays(yearid, monthbox ,dayid)
		{
			var num_days;
			var daybox = document.getElementById(dayid);
			var yearbox = document.getElementById(yearid);
			var sel_month = monthbox.options[monthbox.selectedIndex].value;
			var sel_year = yearbox.options[yearbox.selectedIndex].value; //get somehow
			if (sel_month == "January"){
				num_days = 31;
			}else if (sel_month == "February"){
				if (sel_year % 4 === 0){
					num_days = 29;
				}else{
					num_days = 28;
				}
			}else if (sel_month == "March"){
				num_days = 31;
			}else if (sel_month == "April"){
				num_days = 30;
			}else if (sel_month == "May"){
				num_days = 31;
			}else if (sel_month == "June"){
				num_days = 30;
			}else if (sel_month == "July"){
				num_days = 31;
			}else if (sel_month == "August"){
				num_days = 31;
			}else if (sel_month == "September"){
				num_days = 30;
			}else if (sel_month == "October"){
				num_days = 31;
			}else if (sel_month == "November"){
				num_days = 30;
			}else if (sel_month == "December"){
				num_days = 31;
			}
			
			//Now fill in the ddl
			for(var i = 0; i < num_days; i++){
				var opt = document.createElement("OPTION");
				opt.text = (i+1).toString();
				opt.value = i+1;
				
				daybox.options.add(opt);		
			}
			
			
		}
</script>


</div> 

</div> <!--Content -->

</div> <!--Wrapper-->

</html>