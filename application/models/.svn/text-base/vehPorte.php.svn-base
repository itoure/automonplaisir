<?php

class vehPorte extends Zend_Db_Table_Abstract
{
    protected $_name = 'VEH_PORTE';
    protected $_primary = 'id_porte'; 
    
    
	public function getPorteByCode($idPorte){
    	
    	$rowset = $this->find($idPorte);
    	return $rowset->current()->lib_porte;
    	
    }
    
    
}