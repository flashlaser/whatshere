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
			$oGp = new ml_model_whatshere_dbGeoPost();
			$oGp->getGeoPostHereRand($this->_latitude , $this->_longitude);
			$rs = $oGp->get_data();
			

			$html = $this->parseTpl('herePost' , $rs);
			
			$this->api_output(WR_APICODE_SUCCESS , $html);
		}
	}

	new wh_hereGetPost();