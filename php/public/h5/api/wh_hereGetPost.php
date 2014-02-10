<?php
	include(dirname(dirname(__FILE__)).'/__global.php');

	class wh_hereGetPost extends wr_h5mobileAPIController
	{

		private $_latitude;
		private $_longitude;
		

		public function checkParam(){
			$this->_latitude = $this->input('latitude');
			$this->_longitude = $this->input('longitude');
		}

		public function main()
		{
			
			$this->api_output(WR_APICODE_SUCCESS);
		}
	}

	new wh_hereGetPost();