<?php

class vehMarque extends Zend_Db_Table_Abstract
{
    protected $_name = 'VEH_MARQUE';
    protected $_primary = 'code_marque'; 
    
    
    public function getMarqueByCode($codeMarque){
    	
    	$rowset = $this->find($codeMarque);
    	return $rowset->current()->nom_marque;
    	
    }
    
    
}