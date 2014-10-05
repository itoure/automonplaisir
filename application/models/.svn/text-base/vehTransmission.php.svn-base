<?php

class vehTransmission extends Zend_Db_Table_Abstract
{
    protected $_name = 'VEH_TRANSMISSION';
    protected $_primary = 'id_trans'; 
    
    
	public function getTransmissionByCode($idTrans){
    	
    	$rowset = $this->find($idTrans);
    	return $rowset->current()->lib_trans;
    	
    }
    
}