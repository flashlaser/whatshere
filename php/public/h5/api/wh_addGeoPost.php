<?php
	include(dirname(dirname(__FILE__)).'/__global.php');

	class wh_addGeoPost extends wr_h5mobileAPIController
	{

		private $_latitude;
		private $_longitude;
		private $_content;

		public function checkParam(){
			$this->_latitude = $this->input('latitude');
			$this->_longitude = $this->input('longitude');
			$this->_content = $this->input('content');
		}


		public function main()
		{
			$gpid = ml_tool_resid::genGpid($this->_latitude , $this->_longitude , $this->__visitor['uid']);
			$oMap = new ml_model_whatshere_dbGeoPost();
			$oMap->addPost($gpid , $this->__visitor['uid'] , $this->_latitude , $this->_longitude , $this->_content);

			$oMy = new ml_model_whatshere_dbMyPost();
			$oMy->addPost($gpid , $this->__visitor['uid']);

			$this->api_output(WR_APICODE_SUCCESS , $aData);
		}
	}

	new wh_addGeoPost();