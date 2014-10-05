<?php

class vehEnergie extends Zend_Db_Table_Abstract
{
    protected $_name = 'VEH_ENERGIE';
    protected $_primary = 'id_energie'; 
    
    
	public function getEnergieByCode($idEnergie){
    	
    	$rowset = $this->find($idEnergie);
    	return $rowset->current()->lib_energie;
    	
    }
    
}