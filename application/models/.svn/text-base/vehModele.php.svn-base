<?php

class vehModele extends Zend_Db_Table_Abstract
{
    protected $_name = 'VEH_MODELE';
    protected $_primary = 'code_modele';

    
    public function getListeModeleByMarque($codeMarque){
    	
    	$select = $this->select()->where('code_marque = ?', $codeMarque);
    	$liste = $this->fetchAll($select);
    	return $liste;
    }
    
    
	public function getModeleByCode($codeModele){
    	
    	$rowset = $this->find($codeModele);
    	return $rowset->current()->nom_modele;
    	
    }
    
    
    
}