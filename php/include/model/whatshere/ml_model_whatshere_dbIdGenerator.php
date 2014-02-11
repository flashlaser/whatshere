<?php
class ml_model_whatshere_dbIdGenerator extends Lib_datamodel_db 
{
    function __construct() {
        $db_config = ml_factory::load_standard_conf ( 'dbContent' );
        parent::__construct ( 'idgen', $db_config ['idgen'] );
        $this->_is_ctime = false;
        $this->_is_utime = false;
    }
    
    public function generate_id()
    {
        if(!$this->init_db())
            return false;
            
        $this->table = 'wh_idgen';
        if(!$this->replace(array('a' => 'a')))
            return false;
            
        return $this->insert_id();

        return true;
    }
}
?>