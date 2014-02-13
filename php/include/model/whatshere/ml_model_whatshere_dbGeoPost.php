<?php
/**
 * 
 */
class ml_model_whatshere_dbGeoPost extends Lib_datamodel_db 
{
    const STATUS_NORMAL = 1;
    const STATUS_DEL = 9;

    const ACCURACY_NORMAL = 0;
    const ACCURACY_HIGH = 1;
    const ACCURACY_LOW = 2;
    private $aDataKeys = array(
        'coords',
        'accuracy',
        'condition'
    );
/**
 * 创建构造函数
 *
 */
    function __construct()
    {
        /**
         * 加载数据库配置
         */
        $db_config = ml_factory::load_standard_conf('dbContent');        //目前只有一个配置文件，所以
        /**
         * 构造函数
         * 参数：
         * 1，当前模型名称
         * 2，相关数据库配置
         */
        parent::__construct('geopost' , $db_config['geopost']);
        $this->_is_utime = false;
    }
    
    function getGeoPostHereRand($latitude , $longitude , $accuracy = self::ACCURACY_NORMAL)
    {
        if(!$this->init_db($uid , self::DB_SLAVE))
            return false;

        list($lat , $long) = $this->transXYBYAccuracy($latitude , $longitude , $accuracy);

        $lat_st = $lat-0.5;
        $lat_end = $lat+0.5;
        $long_st = $long-0.5;
        $long_end = $long+0.5;
        $sql = 'select * from '.$this->table
                .' where latitude>='.$lat_st
                .' and latitude<'.$lat_end
                .' and longitude>='.$long_st
                .' and longitude<'.$long_end
                .' order by rand('.time().') limit 1';
        return $this->fetch_row($sql);
    }
    function getGeoPostByIds($gpids)
    {
        if(!$this->init_db($uid , self::DB_SLAVE))
            return false;

        $sIn = '"'.implode('","', $gpids).'"';
        $sql = 'select * from '.$this->table.' where gpid in ('.$sIn.')';
        return $this->fetch($sql);
    }

    function addPost($gpid , $uid , $latitude , $longitude , $content , $data = array())
    {
        if(!$this->init_db($uid , self::DB_MASTER))
            return false;


        
        list($lat , $long) = $this->transXYBYAccuracy($latitude , $longitude , $data['accuracy']);

        $data = array(
                'gpid' => $gpid,
                'uid' => $uid,
                'latitude' => $lat,
                'longitude' => $long,
                'content' => $content,
                'data' => $data
            );
        return $this->insert($data);
    }







    protected function hook_after_fetch()
    {

        if(isset($this->_data[0]['data']))
        {
            foreach ($this->_data as &$row) {
                $row['data'] = json_decode($row['data'] , 1);
            }
        }
        else if(isset($this->_data['data']))
        {
            $this->_data['data'] = json_decode($this->_data['data'] , 1);
        }
    }
    
    protected function hook_before_write($array)
    {
        if($array['data'])
            $array['data'] = json_encode($array['data']);
        return $array;
    }
    private function transXYBYAccuracy($latitude , $longitude , $accuracy){
        if($accuracy == self::ACCURACY_HIGH){
            $a[] = ml_tool_coords::highAccuracy($latitude);
            $a[] = ml_tool_coords::highAccuracy($longitude);
        }else if($accuracy == self::ACCURACY_LOW){
            $a[] = ml_tool_coords::lowAccuracy($latitude);
            $a[] = ml_tool_coords::lowAccuracy($longitude);
        }else{
            $a[] = ml_tool_coords::norAccuracy($latitude);
            $a[] = ml_tool_coords::norAccuracy($longitude);
        }
        return $a;
    }
}
?>