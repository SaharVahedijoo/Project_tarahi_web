<?php

	class Moshtari
	{
		private $name;
		private $shomarehesab;
		private $mojudi;
		
		public function __construct()
		{
			$this->name="";
			$this->shomarehesab="";
			$this->mojudi=0;
		}
		
		public function setname($name)
		{
			$this->name=$name;
		}
		
		public function setshomarehesab($shomarehesab)
		{
			$this->shomarehesab=$shomarehesab;
		}
		
		public function setmojudi($mojudi)
		{
			$this->mojudi=$mojudi;
		}
		
		public function getname()
		{
			return($this->name);
		}
		
		public function getshomarehesab()
		{
			return($this->shomarehesab);
		}
		
		public function getmojudi()
		{
			return($this->mojudi);
		}
	}

?>