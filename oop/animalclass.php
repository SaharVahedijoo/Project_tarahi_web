<?php

	class Animal
	{
		private $name;
		private $picDir;
		private $sound;
		private $food;
		
		public function __construct($name)
		{
			$this->name=$name;
		}
		
		public function setAllByName($name)
		{
			$name = strtolower($name);
			if($name == "dog")
			{
				$this->name=$name;
				$this->picDir=".\image\dog.jfif";
				$this->sound="sound : Hop Hop";
				$this->food="food : Bone";
			}
			elseif($name == "cat")
			{
				$this->name=$name;
				$this->picDir=".\image\cat.jfif";
				$this->sound="sound : Miu Miu";
				$this->food="food : Milk";
			}
			elseif($name == "cow")
			{
				$this->name=$name;
				$this->picDir=".\image\cow.jfif";
				$this->sound="sound : Mo Mo";
				$this->food="food : Grass";
			}
			else
			{
				echo("please enter correct name for animal (cat/dog/cow)");
			}
		}
		
		public function getName()
		{
			return($this->name);
		}
		
		public function getPicDir()
		{
			return($this->picDir);
		}
		
		public function getSound()
		{
			return($this->sound);
		}
		
		public function getfood()
		{
			return($this->food);
		}
		
		public function getoutput()
		{
			//$out=$this->n;
			return($this->n);
		}
		
	}//end class

?>