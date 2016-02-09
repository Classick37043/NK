<?php 
$db = new PDO('sqlite:dbf/nettemp.db');
$rows1 = $db->query("SELECT charts_theme FROM settings WHERE id='1'");
$row1 = $rows1->fetchAll();
foreach($row1 as $t){
$theme=$t['charts_theme'];
}
?>
<script type="text/javascript" src="html/highcharts/highstock.js"></script>
<script type="text/javascript" src="html/highcharts/exporting.js"></script>
<?php if ($theme == 'black') { ?>
<script type="text/javascript" src="html/highcharts/dark-unica.js"></script>
<?php 
    }
if ($theme == 'sand') { ?>
<script type="text/javascript" src="html/highcharts/sand-signika.js"></script>
<?php 
    }
if ($theme == 'grid') { ?>
<script type="text/javascript" src="html/highcharts/grid-light.js"></script>
<?php 
    }
?>

<script type="text/javascript" src="html/highcharts/no-data-to-display.js"></script>




<script type="text/JavaScript">
function timedRefresh(timeoutPeriod) {
    setTimeout("location.reload(true);",timeoutPeriod);
    }
</script>
<!-- <body onload="JavaScript:timedRefresh(60000);"> -->

<?php 
$art = isset($_GET['type']) ? $_GET['type'] : '';
$max = isset($_GET['max']) ? $_GET['max'] : '';

$rows1 = $db->query("SELECT type FROM sensors WHERE charts='on'");
$row1 = $rows1->fetchAll();
foreach($row1 as $hi){
$type[]=$hi['type'];
}

$db1 = new PDO('sqlite:dbf/hosts.db');
$rows1 = $db1->query("SELECT name FROM hosts");
$row1 = $rows1->fetchAll();
$hostc = count($row1);


//print_r($type);
?>
<p>
<a href="index.php?id=view&type=temp&max=hour" ><button class="btn btn-xs btn-success <?php echo $art == 'temp' ? ' active' : ''; ?>">Temperature</button></a>
<?php 
if (in_array('humid', $type))  {?>
<a href="index.php?id=view&type=humid&max=hour" ><button class="btn btn-xs btn-success <?php echo $art == 'humid' ? ' active' : ''; ?>">Humidity</button></a>
<?php }
if (in_array('press', $type))  {?>
<a href="index.php?id=view&type=press&max=hour" ><button class="btn btn-xs btn-success <?php echo $art == 'press' ? ' active' : ''; ?>">Pressure</button></a>
<?php }
if (in_array('altitude', $type))  {?>
<a href="index.php?id=view&type=altitude&max=hour" ><button class="btn btn-xs btn-success <?php echo $art == 'altitude' ? ' active' : ''; ?>">Altitude view</button></a>
<?php }
//if (glob('tmp/kwh/*.json')) {?>
<!-- <a href="index.php?id=view&type=kwh" ><button class="btn btn-xs btn-success <?php echo $art == 'kwh' ? ' active' : ''; ?>">kWh</button></a> -->
<?php 
//}
if (in_array('elec', $type))  {?>
<a href="index.php?id=view&type=elec&max=hour" ><button class="btn btn-xs btn-success <?php echo $art == 'elec' ? ' active' : ''; ?>">Electricity</button></a>
<?php } 
if (in_array('water', $type))  {?>
<a href="index.php?id=view&type=water&max=hour" ><button class="btn btn-xs btn-success <?php echo $art == 'water' ? ' active' : ''; ?>">Water</button></a>
<?php } 
if (in_array('gas', $type))  {?>
<a href="index.php?id=view&type=gas&max=hour" ><button class="btn btn-xs btn-success <?php echo $art == 'gas' ? ' active' : ''; ?>">Gas</button></a>
<?php } 
if (in_array('lux', $type))  {?>
<a href="index.php?id=view&type=lux&max=hour" ><button class="btn btn-xs btn-success <?php echo $art == 'lux' ? ' active' : ''; ?>">Light</button></a>
<?php } 
if (in_array('volt', $type))  {?>
<a href="index.php?id=view&type=volt&max=hour" ><button class="btn btn-xs btn-success <?php echo $art == 'volt' ? ' active' : ''; ?>">Voltage</button></a>
<?php } 
if (in_array('amps', $type))  {?>
<a href="index.php?id=view&type=amps&max=hour" ><button class="btn btn-xs btn-success <?php echo $art == 'amps' ? ' active' : ''; ?>">Ampere</button></a>
<?php } 
if (in_array('watt', $type))  {?>
<a href="index.php?id=view&type=watt&max=hour" ><button class="btn btn-xs btn-success <?php echo $art == 'watt' ? ' active' : ''; ?>">Watt</button></a>
<?php } 
if (glob('db/gpio_stats_*')) {?>
<a href="index.php?id=view&type=gpio&max=hour" ><button class="btn btn-xs btn-success <?php echo $art == 'gpio' ? ' active' : ''; ?>">GPIO</button></a>
<?php } 
if ( $hostc >= "1")  {?>
<a href="index.php?id=view&type=hosts&max=hour" ><button class="btn btn-xs btn-success <?php echo $art == 'hosts' ? ' active' : ''; ?>">Hosts</button></a>
<?php } 
if (in_array('dist', $type))  {?>
<a href="index.php?id=view&type=dist&max=hour" ><button class="btn btn-xs btn-success <?php echo $art == 'dist' ? ' active' : ''; ?>">Distance</button></a>
<?php } 
?>
<a href="index.php?id=view&type=system&max=hour" ><button class="btn btn-xs btn-success <?php echo $art == 'system' ? ' active' : ''; ?>">System stats</button></a>
<a href="index.php?id=view&type=meteogram" ><button class="btn btn-xs btn-success <?php echo $art == 'meteogram' ? ' active' : ''; ?>">Meteogram</button></a>
</p>
<?php
if ($art != 'kwh' && $art!='meteogram') {
    ?>
<p>
<a href="index.php?id=view&type=<?php echo $art; ?>&max=hour" ><button class="btn btn-xs btn-success <?php echo $max == 'hour' ? ' active' : ''; ?>">Hour</button></a>
<a href="index.php?id=view&type=<?php echo $art; ?>&max=day" ><button class="btn btn-xs btn-success <?php echo $max == 'day' ? ' active' : ''; ?>">Day</button></a>
<a href="index.php?id=view&type=<?php echo $art; ?>&max=week" ><button class="btn btn-xs btn-success <?php echo $max == 'week' ? ' active' : ''; ?>">Week</button></a>
<a href="index.php?id=view&type=<?php echo $art; ?>&max=month" ><button class="btn btn-xs btn-success <?php echo $max == 'month' ? ' active' : ''; ?>">Month</button></a>
<a href="index.php?id=view&type=<?php echo $art; ?>&max=months" ><button class="btn btn-xs btn-success <?php echo $max == 'months' ? ' active' : ''; ?>">6Month</button></a>
<a href="index.php?id=view&type=<?php echo $art; ?>&max=year" ><button class="btn btn-xs btn-success <?php echo $max == 'year' ? ' active' : ''; ?>">Year</button></a>
<a href="index.php?id=view&type=<?php echo $art; ?>&max=all" ><button class="btn btn-xs btn-success <?php echo $max == 'all' ? ' active' : ''; ?>">All</button></a> 
</p>
<?php
    }
?>

<?php  
switch ($art)
{ 
default: case '$art': include('modules/highcharts/html/menu.php'); break;
case 'kwh': include('modules/kwh/html/kwh_charts.php'); break;
case 'meteogram': include('modules/view/html/meteogram.php'); break;
}
?>




