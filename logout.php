<?php
	session_start();
//////////////////////////////////
	session_destroy();
	//unset($_SESSION['loginuser']);
	header("location:login.php");
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>صفحه خروج از صفحه پروفایل</title>
</head>

<body>
</body>
</html>