<?php
	include(dirname(dirname(__FILE__)).'/__global.php');

	class wh_myPost extends wr_h5mobileAPIController
	{

		
		

		public function checkParam(){
		
		}

		public function main()
		{
			$oMy = new ml_model_whatshere_dbMyPost();
			$oMy->getMyPost($this->__visitor['uid']);
			$rs = $oMy->get_data();
			$gpids = Tool_array::format_2d_array($rs , 'gpid' , Tool_array::FORMAT_VALUE_ONLY);

			$oGeo = new ml_model_whatshere_dbGeoPost();
			$oGeo->getGeoPostByIds($gpids);
			$rs = $oGeo->get_data();
			foreach ($rs as $key => $value) {
				$aRs[strtotime($value['_ctime'])] = $value;
			}
			krsort($aRs);
			$rs = array_values($aRs);
			$data = array(
				'rows' => $rs,
			);
			
			$this->api_output(WR_APICODE_SUCCESS , $data);
		}
	}

	new wh_myPost();