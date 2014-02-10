<?php
	include(dirname(dirname(__FILE__)).'/__global.php');

	class wr_hereGetPosition extends wr_h5mobileAPIController
	{

		private $_latitude;
		private $_longitude;

		public function checkParam(){
			$this->_latitude = $this->input('latitude');
			$this->_longitude = $this->input('longitude');
		}

		public function main()
		{
			$oMap = new ml_model_whatshere_apiSogouMap();
			$oMap->getPositionNameByCoords($this->_latitude , $this->_longitude);
			$rs = $oMap->get_data();
			
			$aData = array(
					'address' => $rs[0]['address'],
					'all_address' => $rs
				);
			$this->api_output(WR_APICODE_SUCCESS , $aData);
		}
	}

	new wr_hereGetPosition();