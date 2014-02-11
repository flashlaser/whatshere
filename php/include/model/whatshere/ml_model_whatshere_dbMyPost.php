<?php
/**
 * 
 */
class ml_model_whatshere_dbMyPost extends Lib_datamodel_db 
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
        parent::__construct('mypost' , $db_config['mypost']);
        $this->_is_utime = false;
    }
    

    function getMyPost($uid)
    {
        if(!$this->init_db($uid , self::DB_SLAVE))
            return false;

        $sql = 'select gpid from '.$this->table.' where uid='.$uid;
        return $this->fetch($sql);
    }

    function addPost($gpid , $uid)
    {
        if(!$this->init_db($uid , self::DB_MASTER))
            return false;

        $data = array(
                'gpid' => $gpid,
                'uid' => $uid,
            );
        return $this->insert($data);
    }
}
?>