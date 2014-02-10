<?php
class ml_model_whatshere_apiSogouMap extends Lib_datamodel_abstract
{
	

	public function getPositionNameByCoords($latitude , $longitude){
		$url = "http://api.go2map.com/engine/api/regeocoder/json?points=".$longitude.','.$latitude."&type=1";

		$rs = json_decode($this->_http_get($url) , 1);
		if($rs['status']!='ok')
			return false;
		
		
		if (is_array($rs['response']['data']) && count($rs['response']['data']) > 0) {
			$this->set_data($rs['response']['data']);
			return true;
		}
		
		return;
	}


	private function _http_get($url){
		$rs = Tool_http::get($url);
		$rs = Tool_string::gb2utf($rs);
		return $rs;

	}
}