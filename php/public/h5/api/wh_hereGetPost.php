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

			$rnd = mt_rand(0 , 12);
			if($rnd < 3){
				$accuracy = ml_model_whatshere_dbGeoPost::ACCURACY_LOW;
			}else if($rnd<6){
				$accuracy = ml_model_whatshere_dbGeoPost::ACCURACY_HIGH;
			}else{
				$accuracy = ml_model_whatshere_dbGeoPost::ACCURACY_NORMAL;
			}


			$oGp->getGeoPostHereRand($this->_latitude , $this->_longitude , $accuracy);
			$rs = $oGp->get_data();
			
			$isok = 0;
			if($rs){
				$html = $this->parseTpl('herePost' , $rs);
				$isok = 1;
			}else{
				$html = $this->parseTpl('herePostNull');
			}
			$data = array(
				'isok' => $isok,
				'html' => $html
			);
			
			$this->api_output(WR_APICODE_SUCCESS , $data);
		}
	}

	new wh_hereGetPost();