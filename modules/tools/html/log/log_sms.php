<?php	
$dir = '';

$sms_log_del = isset($_POST['sms_log_del']) ? $_POST['sms_log_del'] : '';
	if ($sms_log_del == "Clear"){
	exec("echo log cleared > tmp/incoming_sms.txt");	
	echo $dir; 
	header("location: " . $_SERVER['REQUEST_URI']);
	exit();
	 } 


	 ?>	

<div class="panel panel-primary">
<div class="panel-heading">
<h3 class="panel-title">SMS logs</h3>
</div>
<div class="panel-body">
<form action="" method="post">
    <input type="submit" name="sms_log_del" value="Clear" class="btn btn-danger" />
</form>

<br />
<div style="height:300px;overflow:auto;padding:5px;">
<pre>
<?php
$filearray = file("tmp/incoming_sms.txt");
$last = array_slice($filearray,-100);
    foreach($last as $f){
    	echo $f;
    }
?>
</pre>
</div>
</div>
</div>
