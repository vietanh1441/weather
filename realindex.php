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
				<p class="style4">for 5 minute period ending 16:00 PST </p>
			
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
			<td nowrap="" bordercolor="#333333" bgcolor="#00CCFF"><div align="center">SSW (215)*</div></td>
			<td nowrap="" bordercolor="#333333" bgcolor="#00CCFF"><div align="center"><?php select_data("Gust");?></div></td>
			<td nowrap="" bordercolor="#333333" bgcolor="#00CCFF"><div align="center">16.7*</div></td>
			<td nowrap="" bordercolor="#333333" bgcolor="#00CCFF"><div align="center">08:40*</div></td>
			<td nowrap="" bordercolor="#333333" bgcolor="#00CCFF"><div align="center">27.2*</div></td>
			<td nowrap="" bordercolor="#333333" bgcolor="#00CCFF"><div align="center">10:05*</div></td>
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
			<td height="35" nowrap="" bordercolor="#333333" bgcolor="#FFCC33"><div align="center">49.7</div></td>
			<td nowrap="" bordercolor="#333333" bgcolor="#FFCC33"><div align="center">49.7</div></td>
			<td nowrap="" bordercolor="#333333" bgcolor="#FFCC33"><div align="center">44.7</div></td>
			<td nowrap="" bordercolor="#333333" bgcolor="#FFCC33"><div align="center">50.8</div></td>
			<td nowrap="" bordercolor="#333333" bgcolor="#FFCC33"><div align="center">12:35</div></td>
			<td nowrap="" bordercolor="#333333" bgcolor="#FFCC33"><div align="center">39.2</div></td>
			<td nowrap="" bordercolor="#333333" bgcolor="#FFCC33"><div align="center">00:00</div></td>
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
			<td height="36" nowrap="" bordercolor="#333333" bgcolor="#33FF66"><div align="center">30.17</div></td>
			<td nowrap="" bordercolor="#333333" bgcolor="#33FF66"><div align="center">1021.7</div></td>
			<td nowrap="" bordercolor="#333333" bgcolor="#33FF66"><div align="center">0.0</div></td>
			<td nowrap="" bordercolor="#333333" bgcolor="#33FF66"><div align="center">30.18</div></td>
			<td nowrap="" bordercolor="#333333" bgcolor="#33FF66"><div align="center">11:25</div></td>
			<td nowrap="" bordercolor="#333333" bgcolor="#33FF66"><div align="center">30.04</div></td>
			<td nowrap="" bordercolor="#333333" bgcolor="#33FF66"><div align="center">00:05</div></td>
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
			<td height="33" colspan="2" nowrap="" bordercolor="#333333" bgcolor="#00ccff"><div align="center">100.0</div>      
				<div align="center"></div></td>
			<td nowrap="" bordercolor="#333333" bgcolor="#00ccff"><div align="center">-</div></td>
			<td nowrap="" bordercolor="#333333" bgcolor="#00ccff"><div align="center">100.0</div></td>
			<td nowrap="" bordercolor="#333333" bgcolor="#00ccff"><div align="center">00:00</div></td>
			<td nowrap="" bordercolor="#333333" bgcolor="#00ccff"><div align="center">100.0</div></td>
			<td nowrap="" bordercolor="#333333" bgcolor="#00ccff"><div align="center">00:00</div></td>
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
			<td height="36" nowrap="" bordercolor="#333333" bgcolor="#66CCCC"><div align="center">0.00</div></td>
			<td nowrap="" bordercolor="#333333" bgcolor="#66CCCC"><div align="center">0.00</div></td>
			<td nowrap="" bordercolor="#333333" bgcolor="#66CCCC"><div align="center">0.11</div></td>
			<td nowrap="" bordercolor="#333333" bgcolor="#66CCCC"><div align="center">0.05</div></td>
			<td nowrap="" bordercolor="#333333" bgcolor="#66CCCC"><div align="center">1.81</div></td>
			<td nowrap="" bordercolor="#333333" bgcolor="#66CCCC"><div align="center">8.69</div></td>
			<td nowrap="" bordercolor="#333333" bgcolor="#66CCCC"><div align="center">6.03</div></td>
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
			Temp
		</div>
		<div id = "tempTab" class = "tabContent">
			<canvas id ="TempChart" width = "940" height = "600"/>
		</div>
		<div id = "pressTab" class = "tabContent">
			Temp
		</div>
		<div id = "humTab" class = "tabContent">
			Temp
		</div>
		<div id = "precTab" class = "tabContent">
			Temp
		</div>
		
		
	</div>
		
		<!--
		<canvas id ="WindChart" width = "940" height = "600"/>
		<canvas id ="PressureChart" width = "940" height = "600"/>
		<canvas id ="HumidityChart" width = "940" height = "600"/>
		<canvas id ="PrecipChart" width = "940" height = "600"/> -->
	
	<!--Some Includes-->
	<script src = "Chart.js"></script>
	<script src = "Underscore.js"></script>
	
	<!-- Scripts for Charts -->
	<script type="text/javascript">
		var ctx = document.getElementById("TempChart").getContext("2d");
		
		//This is the min domain of the graph. Default to 00:00 of current day(fetch top row). A form
		//Would allow the user to manually set the start time.
		var startTime = "5/18/2014 00:00"; 
		//The max domain of the graph. Default to last 5  minute interval (fetch top row). A form
		//Would allow for manual adjustments
		var endTime = "5/18/2014 5:15"; //Rounded to nearest 5 min, form or default to current time
		//Difference (in minutes) between start and end time. Used to get size of arrays.
		var dif = 315; 
		
		//labelSet is our temporary array to hold our labels.
		//Start by creating an array of size dif/5 (number of intervals) and filling each element with ""
		//The chart library wants a label for each data point, but isnt capable of hiding any of them,
		//so if we had say 200 labels, they would be unreadable. We really just need to show the start 
		//and end time in the graph, i think. So replace the first and last elements with appropriate data.
		var labelSet = Array.apply(null, new Array(dif/5)).map(String.prototype.valueOf, "");
		labelSet[0] = startTime;
		labelSet[labelSet.length - 1] = endTime;
		var data = {
			
			labels : labelSet,
			datasets : [
			{
				fillColor : "rgba(220,220,220,0.5)",
				strokeColor : "rgba(220,220,220,1)",
				data : Array.apply(null, new Array(dif/5)).map(Number.prototype.valueOf, 49.7)
			},
			{
				fillColor : "rgba(151,187,205,0.5)",
				strokeColor : "rgba(151,187,205,1)",
				data : Array.apply(null, new Array(dif/5)).map(Number.prototype.valueOf, 49.7)
			},
			
			{
				fillColor : "rgba(256,187,205,0.5)",
				strokeColor : "rgba(256,187,205,1)",
				data : Array.apply(null, new Array(dif/5)).map(Number.prototype.valueOf, 44.7)
			}
			]
		}
		var myTempChart = new Chart(ctx).Line(data, {scaleShowGridLines : false,
		bezierCurve : false,
		pointDot : false
		
		});
		
	</script>

	
	

</div>

</div> <!--Content -->

</div> <!--Wrapper-->

</html>