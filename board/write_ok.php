<!DOCTYPE html>
<html>
<body style = "background-color: #292a2d;">
<?php
	include '../func/db.php';
	$conn = mysqli_connect("$hostname","$dbuserid","$dbpasswd","simchat");
	require_once '../func/encoding.php';
	$sql = "select * from board order by code desc limit 1;";
	$result = mysqli_query($conn, $sql);
	
	while ($info = mysqli_fetch_array($result)) {
        	$code = $info['code'] + 1;
	}
	
	#$username = $_POST['username'];
	$username = "Anonymous";
	$contents = $_POST['contents'];
	$passwd = (string)md5((string)$_POST['passwd']);
	$today = date("Y-m-d");

	$wsql = "insert into board values('$code','$username','$passwd','$contents','$today', '0');";
	$writeresult = mysqli_query($conn, $wsql);

	echo "
	<script>
        	alert('Confirm');
	        window.location.href = './';
	</script>";
?>
</body>
</html>
