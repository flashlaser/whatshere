<?php
class ml_model_whatshere_apiBaiduMap extends Lib_datamodel_abstract
{
	const AK = "052E19Ca8505f173e5cb4639a0798b7d";

	public function getPositionNameByCoords($latitude , $longitude){
		$url = "http://api.map.baidu.com/geocoder/v2/?ak=".self::AK."&location=".$latitude.",".$longitude."&output=json&pois=1";
		$rs = json_decode($this->_http_get($url));

		$this->set_data($rs->result);
		return;
	}


	private function _http_get($url){
		$rs = Tool_http::get($url);

		return $rs;

	}
}