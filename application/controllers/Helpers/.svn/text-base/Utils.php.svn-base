<?php

class Helpers_Utils extends Zend_Controller_Action_Helper_Abstract
{
	
	public function setListeDbToSelect($liste,$key,$value){
		
		if(!$liste && !is_array($liste)) return array();
		
		$options = array();
    	
		foreach($liste as $item){
			$options[$item->{$key}] = $item->{$value};
    	}
    	
    	return $options;
		
	}
	
	
	public function isConnectedAdmin($auth)
	{
		$redirector = Zend_Controller_Action_HelperBroker::getStaticHelper('redirector');
		if (!$auth->hasIdentity()) {
			$redirector->setGotoSimple("login", "admin");
	    }
	}
	
	
	public function setDataVehiculeToDisplay($listeVehicule){
		
    	$listeToDispaly = array();
    	
    	$db_marque = new vehMarque();
    	$db_modele = new vehModele();
    	$db_type = new vehType();
    	$db_porte = new vehPorte();
    	$db_transmission = new vehTransmission();
    	$db_energie = new vehEnergie();
    	
		//Zend_Debug::dump($listeVehicule);die;
    	foreach ($listeVehicule as $veh){
    		
    		$vehToDisplay = $veh->toArray();
    		
    		if($veh->code_marque){
    			$vehToDisplay['libMarque'] = $db_marque->getMarqueByCode($veh->code_marque);
    		}
    		if($veh->code_modele){
    			$vehToDisplay['libModele'] = $db_modele->getModeleByCode($veh->code_modele);
    		}
    		if($veh->id_type){
    			$vehToDisplay['libType'] = $db_type->getTypeByCode($veh->id_type);
    		}
    		if($veh->id_porte){
    			$vehToDisplay['libPorte'] = $db_porte->getPorteByCode($veh->id_porte);
    		}
    		if($veh->id_trans){
    			$vehToDisplay['libTrans'] = $db_transmission->getTransmissionByCode($veh->id_trans);
    		}
    		if($veh->id_energie){
    			$vehToDisplay['libEnergie'] = $db_energie->getEnergieByCode($veh->id_energie);
    		}
    		
    		$listeToDispaly[] = $vehToDisplay;
    	}
    	
    	//Zend_Debug::dump($listeToDispaly);die;
    	
    	return $listeToDispaly;
    	
	}
	
	
	public function getAllListeToSelect($primary,$lib){
    	
		switch($primary){
			case 'code_marque':
				$db = new vehMarque();
			break;
			case 'code_modele':
				$db = new vehModele();
			break;
			case 'id_type':
				$db = new vehType();
			break;
			case 'id_porte':
				$db = new vehPorte();
			break;
			case 'id_trans':
				$db = new vehTransmission();
			break;
			case 'id_energie':
				$db = new vehEnergie();
			break;
		}
		
    	$liste = $db->fetchAll();
    	
    	$options = array();
    	
		foreach($liste as $item){
			$options[$item->{$primary}] = $item->{$lib};
    	}
    	
    	return $options;
    	
    }
	
}