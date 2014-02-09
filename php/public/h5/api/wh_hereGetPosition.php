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
			$oBaiduMap = new ml_model_whatshere_apiBaiduMap();
			$oBaiduMap->getPositionNameByCoords($this->_latitude , $this->_longitude);
			$rs = $oBaiduMap->get_data();
			$this->api_output(WR_APICODE_SUCCESS , $rs);
		}
	}

	new wr_hereGetPosition();