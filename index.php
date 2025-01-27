<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>صفحه نخست</title>
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
				$conn = mysqli_connect("localhost","root","","sahardb");
				if(! $conn)
				{
					die("اتصال برقرار نشد".mysqli_error());
				}
				$sql="SELECT * FROM `tblnews` ORDER BY `newsdate` DESC LIMIT 2";
				$result=mysqli_query($conn,$sql);
				if(mysqli_num_rows($result)>0)
				{
					while($row=mysqli_fetch_assoc($result))
					{
						$nID=$row['newsID'];
						$nt=$row['newstitle'];
						$ns=$row['newssummary'];
						$ni=$row['newsimage'];
						$v=$row['viewed'];
						
						echo("<div class=main-top>".$nt."</div>
							  <div class=main-middel>brief news: ".$ns."<br><br>
							  <img src='admin/newsimg/$ni'  width='150'  height='150'></div>
							  <div class=main-bottom>Number of news views: ".$v."<br>
							  <a href='detailsnews.php?ID=".$nID."'>Read more</a></div>");
						
					}
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
