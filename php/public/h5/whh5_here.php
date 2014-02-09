<?php
	include(dirname(__FILE__).'/__global.php');


	class whh5_here extends wr_h5mobileController
	{
		private $oBizSuggArt;
		public function main()
		{
			
			$this->page_output('here' , $data);
		}
	}

	new whh5_here();