<?php
	include(dirname(__FILE__).'/__global.php');


	class whh5_addPost extends wr_h5mobileController
	{
		

		public function main()
		{

			
			$this->page_output('addPost' , $data);
		}
	}

	new whh5_addPost();