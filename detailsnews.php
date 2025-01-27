<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>شرح اخبار</title>
	<link href="Css/style.css" type="text/css" rel="stylesheet">
	<link href="Css/tem.css" type="text/css" rel="stylesheet">
	<link href="Css/styleuser.css" type="text/css" rel="stylesheet">
</head>

<body>
	
	<?php
		include("template/header.php");
	?>
	
	<div id="container">
		<main>
			
			<?php
			
				$nid=$_GET['ID'];
			
				$conn = mysqli_connect("localhost","root","","sahardb");
				if(! $conn)
				{
					die("اتصال برقرار نشد".mysqli_error());
				}
				$sql="SELECT * FROM `tblnews` WHERE `newsID`='$nid'";
				$result=mysqli_query($conn,$sql);
				if(mysqli_num_rows($result)>0)
				{
					$row=mysqli_fetch_assoc($result);
					$nID=$row['newsID'];
					$nt=$row['newstitle'];
					$nd=$row['newsdesc'];
					$ni=$row['newsimage'];
					$v=$row['viewed'];
					
					$sql="UPDATE `tblnews` SET `viewed`=`viewed`+1  WHERE `newsID`='$nid'";
					mysqli_query($conn,$sql);
						
					echo("<div class=main-top>".$nt."</div>
						  <div class=main-middel>News description: ".$nd."<br><br>
						  <img src='admin/newsimg/$ni'  width='300'  height='300'></div>
						  <div class=main-bottom>
						  <a href='index.php'>Back</a></div>");
				}else{
					echo("There is no news");
				}
			mysqli_close($conn);
			
			?>
			
		</main>
		<?php
		include("template/sidebar.php");
	?>
	</div>
	
	<?php
		include("template/footer.php");
	?>
	
</body>
</html>