<?php
	class Database
	{
		private $host;
		private $user;
		private $pass;
		private $DBname;
		private $conn;
		
		public function __construct($hostname,$username,$password,$DBname)
		{
			$this->host=$hostname;
			$this->user=$username;
			$this->pass=$password;
			$this->DBname=$DBname;
			
			$this->conn=new mysqli($this->host , $this->user , $this->pass , $this->DBname);
			
			if($this->conn->connect_error)
			{
				die("Communication error");
			}
			return($this->conn);
		}
		
		public function insertdata($name,$picDir,$food,$sound)
		{
			$sql="INSERT INTO `tblanimal`(`Name`, `ImageDir`, `Food`, `Sound`) VALUES ('$name','$picDir','$food','$sound')";
			
			$result=$this->conn->query($sql);
			
			if($result)
			{
				echo("Registration done");
			}
			else
			{
				echo("Registration error".$this->$conn->error);
			}
		}
		
	}//end class
?>