<aside>
	
	<h2>News category</h2>
	
	<?php
	
		$conn = mysqli_connect("localhost","root","","sahardb");
				if(! $conn)
				{
					die("اتصال برقرار نشد".mysqli_error());
				}
			$sql="SELECT * FROM `tblnewscat` ORDER BY `newscatID` ASC";
				$result=mysqli_query($conn,$sql);
				if(mysqli_num_rows($result)>0)
				{
					echo("<ul>");
					
					while($row=mysqli_fetch_assoc($result))
					{
						$ncID=$row['newscatID'];
						$ncname=$row['newscatname'];
						
						echo("<li><a href='shownewsbynewscat.php?ID=".$ncID."' style='text-decoration: none; color: #000; padding: 10px;'>".$ncname."</a></li>");
					}
					
					echo("</ul>");
					
				}else{
					echo("There is no news");
				}
			?>
	
</aside>