<?php
/**
 * 
 */
class ml_model_whatshere_dbGeoPost extends Lib_datamodel_db 
{
    const STATUS_NORMAL = 1;
    const STATUS_DEL = 9;
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
    
    function getGeoPostHereRand($latitude , $longitude)
    {
        if(!$this->init_db($uid , self::DB_SLAVE))
            return false;

        $lat = ml_tool_coords::toint($latitude);
        $long = ml_tool_coords::toint($longitude);
        
        $sql = 'select * from '.$this->table.' where latitude='.$lat.' and longitude='.$long.' order by rand() limit 1';
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

    function addPost($gpid , $uid , $latitude , $longitude , $content)
    {
        if(!$this->init_db($uid , self::DB_MASTER))
            return false;

        $data = array(
                'gpid' => $gpid,
                'uid' => $uid,
                'latitude' => ml_tool_coords::toint($latitude),
                'longitude' => ml_tool_coords::toint($longitude),
                'content' => $content,
            );
        return $this->insert($data);
    }
}
?>