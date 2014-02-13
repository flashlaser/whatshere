<?php
	include(dirname(dirname(__FILE__)).'/__global.php');

	class wh_addGeoPost extends wr_h5mobileAPIController
	{

		private $_latitude;
		private $_longitude;
		private $_content;
		private $_accuracy;
		private $_condition;

		public function checkParam(){
			$this->_latitude = $this->input('latitude');
			$this->_longitude = $this->input('longitude');
			$this->_content = $this->input('content');
			$this->_accuracy = intval($this->input('accuracy'));
			

			if($_REQUEST['condition']['sex'] > 0){
				$this->_condition['sex'] = $_REQUEST['condition']['sex'];
			}
			if(is_array($_REQUEST['condition']['viewdGpid']) && count($_REQUEST['condition']['viewdGpid']) > 0){
				$this->_condition['viewdGpid'] = $_REQUEST['condition']['viewdGpid'];
			}



		}


		public function main()
		{
			$gpid = ml_tool_resid::genGpid($this->_latitude , $this->_longitude , $this->__visitor['uid']);
			$oMap = new ml_model_whatshere_dbGeoPost();
			$data = array(
				'coords' => array(
					'lat' => $this->_latitude,
					'long' => $this->_longitude,
				),
				'accuracy' => $this->_accuracy,

			);
			if(is_array($this->_condition)){
				$data['condition'] = $this->_condition;
			}
			$oMap->addPost($gpid , $this->__visitor['uid'] , $this->_latitude , $this->_longitude , $this->_content , $data);

			$oMy = new ml_model_whatshere_dbMyPost();
			$oMy->addPost($gpid , $this->__visitor['uid']);

			$this->api_output(WR_APICODE_SUCCESS , $aData);
		}
	}

	new wh_addGeoPost();