<?php

class vehType extends Zend_Db_Table_Abstract
{
    protected $_name = 'VEH_TYPE';
    protected $_primary = 'id_type'; 
    
    
	public function getTypeByCode($idType){
    	
    	$rowset = $this->find($idType);
    	return $rowset->current()->lib_type;
    	
    }
    
    
}