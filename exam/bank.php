<?php
	include("moshtariclass.php");
	include("DB.php");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	<form action="bank.php" method="post">
		نام:<input type="text" name="name"><br><br>
		شماره حساب:<input type="text" name="shomarehesab"><br><br>
		مبلغ:<input type="number" name="mablagh"><br><br>
		<input type="submit" name="ijadhesab" value="ایجاد حساب">
		<input type="submit" name="moshhede" value="مشاهده موجودی">
		<input type="submit" name="variz" value="واریز">
		<input type="submit" name="bardasht" value="برداشت">
	</form>
	
	<?php
		$DBobj=new Database('localhost','root','','sahardb');
	
		if(isset($_POST["ijadhesab"]))
		{
			$moshtariobj=new Moshtari();
			$name=$_POST["name"];
			$shomarehesab=$_POST["shomarehesab"];
			$mablagh=$_POST["mablagh"];
			$moshtariobj->setname($name);
			$moshtariobj->setshomarehesab($shomarehesab);
			$moshtariobj->setmojudi($mablagh);
			//insert
			$DBobj->insertdata($moshtariobj->getname(),$moshtariobj->getshomarehesab(),$moshtariobj->getmojudi());
		}
	
		if(isset($_POST["moshhede"]))
		{
			$moshtariobj=new Moshtari();
			$shomarehesab=$_POST["shomarehesab"];
			$moshtariobj->setshomarehesab($shomarehesab);
			echo($DBobj->selectmojudi($moshtariobj->getshomarehesab()));
		}
	
		if(isset($_POST["variz"]))
		{
			$moshtariobj=new Moshtari();
			$shomarehesab=$_POST["shomarehesab"];
			$moshtariobj->setshomarehesab($shomarehesab);
			$t=$DBobj->selectmojudi($moshtariobj->getshomarehesab());
			$mablagh=$_POST["mablagh"];
			$t=$t+$mablagh;
			$moshtariobj->setmojudi($t);
			$DBobj->updatemojudi($moshtariobj->getshomarehesab(),$moshtariobj->getmojudi());
			echo("<br>".$moshtariobj->getmojudi());
		}
	
		if(isset($_POST["bardasht"]))
		{
			$moshtariobj=new Moshtari();
			$shomarehesab=$_POST["shomarehesab"];
			$moshtariobj->setshomarehesab($shomarehesab);
			$t=$DBobj->selectmojudi($moshtariobj->getshomarehesab());
			$mablagh=$_POST["mablagh"];
			$t=$t-$mablagh;
			if($t < 0)
			{
				echo("موجودی کافی نیست");
			}
			else
			{
				$moshtariobj->setmojudi($t);
				$DBobj->updatemojudi($moshtariobj->getshomarehesab(),$moshtariobj->getmojudi());
				echo("<br>".$moshtariobj->getmojudi());
			}
			
		}
	?>
</body>
</html>