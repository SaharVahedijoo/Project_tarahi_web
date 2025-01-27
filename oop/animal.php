<?php
	include("animalclass.php");
	include("DB.php");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
	<link href="css/style.css" type="text/css" rel="stylesheet">
</head>

<body>
	<table>
		<form action="animal.php" method="post">
			<tr>
				<td>
					name: <input name="name" type="text">
				</td>
			</tr>
			<tr>
				<td>
					<input name="submit" type="submit" value="show">
				</td>
			</tr>
		</form>
	</table>
	<?php
	
		$DBobj=new Database('localhost','root','','sahardb');
	
		if(isset($_POST["submit"]))
		{
			
			$n=$_POST["name"];
			$animalobj=new Animal("");
			$animalobj->setAllByName($n);
			//$animalobj->setcharacter($n);
			echo("<br><br><table><tr><td>");
			echo($animalobj->getName());
			echo("</td></tr><tr><td><img src='".$animalobj->getPicDir()."'>");
			echo("</td></tr><tr><td>");
			echo($animalobj->getfood());
			echo("</td></tr><tr><td>");
			echo($animalobj->getSound());
			echo("</td></tr></table>");
			
			$DBobj->insertdata($animalobj->getName(),$animalobj->getPicDir(),$animalobj->getfood(),$animalobj->getSound());
		}
	?>
</body>
</html>