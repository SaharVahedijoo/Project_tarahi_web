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
		
		public function insertdata($name,$shomarehesab,$mojudi)
		{
			$sql="INSERT INTO `tblbank`(`shomarehesab`, `name`, `mojudi`) VALUES('$shomarehesab','$name','$mojudi')";
			
			$result=$this->conn->query($sql);
			
			if($result)
			{
				echo("حساب با موفقیت ایجاد شد");
			}
			else
			{
				echo("خطا در ایجاد حساب".$this->conn->error);
			}
		}
		
		public function selectmojudi($shomarehesab)
		{
			$sql="SELECT  `mojudi` FROM `tblbank` WHERE `shomarehesab`= '$shomarehesab'";
			
			$result=$this->conn->query($sql);
			
			if($result)
			{
				$row=$result->fetch_assoc();
				return($row['mojudi']);
			}
			else
			{
				echo("خطا در دریافت اطلاعات".$this->conn->error);
			}
		}
		
		public function updatemojudi($shomarehesab,$mojudi)
		{
			$sql="UPDATE `tblbank` SET `mojudi`='$mojudi' WHERE `shomarehesab`='$shomarehesab'";
			
			$result=$this->conn->query($sql);
			
			if($result)
			{
				echo("عملیات با موفقیت انجام شد");
			}
			else
			{
				echo("خطا در انجام عملیات".$this->conn->error);
			}
		}
	}
?>