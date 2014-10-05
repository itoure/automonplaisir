<?php


class AdminController extends Zend_Controller_Action
{
	
	
    public function init()
    {
		$this->_helper->layout->setLayout('layoutbo');
		$this->redirector = $this->_helper->getHelper('Redirector');
		$this->flashMessenger = $this->_helper->getHelper('FlashMessenger');
    	$this->auth = Zend_Auth::getInstance();
    	$this->view->isConnected = $this->auth->hasIdentity();
   		// Zend_Debug::dump($auth->hasIdentity());die;
   		$this->view->messages = $this->flashMessenger->getMessages();
    	
    }
    
    public function indexAction()
    {
    	$this->_helper->utils->isConnectedAdmin($this->auth);
    }
    
	public function loginAction()
	{
    	$this->view->messages = $this->flashMessenger->getMessages();
    }
    
	public function connexionAction()
	{
    	$login = $this->getRequest()->getParam('login');
    	$pass = $this->getRequest()->getParam('pass');
    	
   		$dbAdapter = Zend_Registry::get('dbAdapter');
    	$authAdapter = new Zend_Auth_Adapter_DbTable($dbAdapter,
                                             'USR_USER',
                                             'usr_login',
                                             'usr_password');
    	
    	$authAdapter->setIdentity($login)->setCredential($pass);
    	
    	$result = $authAdapter->authenticate();
    	
    	if ($result->isValid()) {
    		$storage = $this->auth->getStorage();
    		$storage->write($authAdapter->getResultRowObject(null, 'usr_password'));
    		$this->redirector->setGotoSimple(null, "admin");
    	}
    	else {
			$message = 'Connexion Impossible';
			$this->flashMessenger->addMessage($message);
    		$this->redirector->setGotoSimple("login", "admin");
    	}
    	
    }
    
    public function contactAction() 
    {
    	$db_contact = new memContact();
    	$listeMsg = $db_contact->fetchAll();
    	
    	$this->view->listeMsg = $listeMsg;
    }
    
	public function rendezvousAction() 
    {
    	$db_rendezvous = new memRendezvous();
    	$listeRdv = $db_rendezvous->fetchAll();
    	
    	$this->config = Zend_Registry::get('config');
    	$this->view->plageHoraire = $this->config->plagehoraire;
    	
    	$this->view->listeRdv = $listeRdv;
    }
    
	public function occasionAction() 
    {
    	$db_occasion = new vehOccasion();
    	
    	$listeVehOccasion = $db_occasion->fetchAll();
    	$listeToDisplay = $this->_helper->utils->setDataVehiculeToDisplay($listeVehOccasion);
    	//Zend_Debug::dump($this->flashMessenger->getMessages());die;
    	
    	$this->view->listeToDisplay = $listeToDisplay;
    	
    	$this->view->messages = $this->flashMessenger->getMessages();
    }
    
	public function neufAction() 
    {
    	$db_neuf = new vehNeuf();
    	
    	$listeVehNeuf = $db_neuf->fetchAll();
    	$listeToDisplay = $this->_helper->utils->setDataVehiculeToDisplay($listeVehNeuf);
    	//Zend_Debug::dump($listeToDisplay);die;
    	
    	$this->view->listeToDisplay = $listeToDisplay;
    }
    
	public function deconnexionAction() 
    {
    	$this->auth->clearIdentity();
    	$this->redirector->setGotoSimple("login", "admin");
    }
    
    public function ajouterOccasionAction(){
    	
    	$idOccasion = $this->getRequest()->getParam('id');
    	if($idOccasion){
	    	$db_occasion = new vehOccasion();
	    	$this->view->vehOccasion = $db_occasion->find($idOccasion)->current();
	    	$this->view->isModif = true;
	    	
	    	$optionsModele = $this->_helper->utils->getAllListeToSelect('code_modele','nom_modele');
    		$this->view->optionsModele = $optionsModele;
	    	//Zend_Debug::dump(get$vehOccasion));die;
    	}
    	
    	$optionsMarque = $this->_helper->utils->getAllListeToSelect('code_marque','nom_marque');
    	$this->view->optionsMarque = $optionsMarque;
    	
    	$optionsType = $this->_helper->utils->getAllListeToSelect('id_type','lib_type');
    	$this->view->optionsType = $optionsType;
    	
    	$optionsPorte = $this->_helper->utils->getAllListeToSelect('id_porte','lib_porte');
    	$this->view->optionsPorte = $optionsPorte;
    	
    	$optionsEnergie = $this->_helper->utils->getAllListeToSelect('id_energie','lib_energie');
    	$this->view->optionsEnergie = $optionsEnergie;
    	
    	$optionsTrans = $this->_helper->utils->getAllListeToSelect('id_trans','lib_trans');
    	$this->view->optionsTrans = $optionsTrans;
    	
    	$this->view->urlGetListeModeleByMarqueAjax = $this->view->url(array('controller'=>'vehicule','action'=>'get-liste-modele-by-marque-ajax'),'default',true);
    	
    	//Zend_Debug::dump($listeToDisplay);die;
    	
    }
    
    
    public function modifierOccasionAction(){
    	$idOccasion = $this->getRequest()->getParam('id');
    	$this->redirector->setGotoSimple("ajouter-occasion", "admin",null,array(id=>$idOccasion));
    }
    
    
	public function validationAjoutOccasionAction(){
    	
		$this->isOK = 1;
		
    	$db_occasion = new vehOccasion();
    	
		$isModif = $this->getRequest()->getParam('isModif');
		$idOccasion = $this->getRequest()->getParam('idOccasion');
		$prix = $this->getRequest()->getParam('prix');
    	$annee = $this->getRequest()->getParam('annee');
    	$kilometrage = $this->getRequest()->getParam('kilometrage');
    	$version = $this->getRequest()->getParam('version');
    	$desc = $this->getRequest()->getParam('desc');
    	$puissance = $this->getRequest()->getParam('puissance');
    	$equipements = $this->getRequest()->getParam('equipements');
    	$idMarque = $this->getRequest()->getParam('marque');
    	$idModele = $this->getRequest()->getParam('modele');
    	$idType = $this->getRequest()->getParam('type');
    	$idPorte = $this->getRequest()->getParam('porte');
    	$idEnergie = $this->getRequest()->getParam('energie');
    	$idTransmission = $this->getRequest()->getParam('transmission');
    	
    	
    	try{
    		if (Zend_Validate::is($kilometrage, 'Digits') && Zend_Validate::is($puissance, 'Digits') && Zend_Validate::is($annee, 'Digits')) {
    			
    			if($isModif){
    				$vehOccasion = null;
    			}
    			else{
    				$vehOccasion = $db_occasion->createRow();
    			}
    			
		    	$vehOccasion->code_marque = $idMarque;
		    	$vehOccasion->code_modele = $idModele;
		    	$vehOccasion->id_energie = $idEnergie;
		    	$vehOccasion->id_trans = $idTransmission;
		    	$vehOccasion->id_porte = $idPorte;
		    	$vehOccasion->id_type = $idType;
		    	$vehOccasion->puissance = $puissance;
		    	$vehOccasion->prix = $prix;
		    	$vehOccasion->annee = $annee;
		    	$vehOccasion->description = $desc;
		    	$vehOccasion->equipements = $equipements;
		    	$vehOccasion->kilometrage = $kilometrage;
		    	$vehOccasion->version = $version;
		    	
    			if($isModif){
    				$where = $db_occasion->getAdapter()->quoteInto('id_occasion = ?', $idOccasion);
					$db_occasion->update((array)$vehOccasion,$where);
					$vehOccasion->id_occasion = $idOccasion;
    			}
    			else{
    				$vehOccasion->save();
    			}
		    	
    			
		    	//Gestion des photos
		    	$listePhotosToSave = array();
		    	$this->config = Zend_Registry::get('config');
    			$tempDirectory = $this->config->photosTempDirectoryVO;
    			$photosDirectory = $this->config->photosDirectoryVO;
    			
				if(!is_dir($tempDirectory)){
					mkdir($tempDirectory);
				}
				if(!is_dir($photosDirectory.$vehOccasion->id_occasion)){
					mkdir($photosDirectory.$vehOccasion->id_occasion);
				}
				
				$upload = new Zend_File_Transfer_Adapter_Http();
				$files = $upload->getFileInfo();
				$upload->setDestination($tempDirectory);
				$upload->setOptions(array('ignoreNoFile' => true));
				$upload->addValidator('Extension', false, 'jpg,png,gif,jpeg');
				$upload->addValidator('Size', false, '4MB');

				foreach($files as $file => $info){
					if(!$upload->isUploaded($file)){
						continue;
					}
					
					if($upload->isValid($file)){
						$name = $upload->getFileName($file,false);
						$upload->addFilter('Rename', array('target'=>$photosDirectory.$vehOccasion->id_occasion.'/'.$name,'overwrite'=>true));
						$isUpload = $upload->receive($file);
						if($isUpload){
							$listePhotosToSave[$file] = $vehOccasion->id_occasion.'/'.$name;
						}
					}
					
				}
		    	
				//UPDATE en database
				if($vehOccasion->id_occasion && $listePhotosToSave){
					$where = $db_occasion->getAdapter()->quoteInto('id_occasion = ?', $vehOccasion->id_occasion);
					$db_occasion->update($listePhotosToSave,$where);
				}
		    	$this->flashMessenger->addMessage('Le véhicule a bien été ajouté');
				$this->isOK = 1;
    		}
    		else{
    			$this->flashMessenger->addMessage('Erreur sur un ou plusieurs champs du formulaire');
    			$this->isOK = 0;
    		}
    	}
    	catch (Zend_Exception $e){
    		// Zend_Debug::dump($e->getMessage());die;
			$this->flashMessenger->addMessage('Erreur lors de l\'ajout du vehicule');
			$this->isOK = 0;
    	}
    	//Zend_Debug::dump($vehOccasion);die;
    	
    	$this->redirector->setGotoSimple("occasion", "admin");
    	
    }
    
    
	public function importAction(){
    
		error_reporting(E_ALL | E_STRICT);
		ini_set('display_errors', 1);
		
    	$db_modele = new vehModele();
    	$db_marque = new vehMarque();
    	
    	$this->config = Zend_Registry::get('config');
    	$fichierImportVO = $this->config->fichierImportVO;
		if(($handle = fopen($fichierImportVO, "r")) !== FALSE) {
			while(($data = fgetcsv($handle, 1000, ";")) !== FALSE) {

				//$data = array_map('utf8_encode', $data);
				
				try {
					if(substr($data[0],5,3) == '000'){
						$arrMarque = array();
						$arrMarque['code_marque'] = substr($data[0],3,2);
						$arrMarque['nom_marque'] = $data[1];
						$arrMarque['pays_marque'] = null;
						$arrMarque['logo_marque'] = strtolower($data[1]).'.jpg';
						$db_marque->insert($arrMarque);
					}
					else{
						$arrModele = array();
						$arrModele['code_modele'] = substr($data[0],3,2).substr($data[0],5);
						$arrModele['code_marque'] = substr($data[0],3,2);
						$arrModele['nom_modele'] = $data[1];
						$db_modele->insert($arrModele);
					}
				} catch (Exception $e){
					Zend_Debug::dump($e->getMessage());die;
				}
			}
		}
	
		fclose($handle);die('THE END');
		
    }
    
    
    public function supprimerAction(){
    	
    	$id = $this->getRequest()->getParam('id');
    	$page = $this->getRequest()->getParam('page');
    	
    	try{
	    	switch ($page){
	    		case 'contact':
	    		$db_contact = new memContact();
				$where = $db_contact->getAdapter()->quoteInto('id_contact = ?', $id);
				$db_contact->delete($where);
	    		break;
	    		
	    		case 'rendezvous':
	    		$db_rdv = new memRendezvous();
				$where = $db_rdv->getAdapter()->quoteInto('id_rendezvous = ?', $id);
				$db_rdv->delete($where);
	    		break;
	    		
	    		case 'neuf':
	    		$db_neuf = new vehNeuf();
				$where = $db_neuf->getAdapter()->quoteInto('id_neuf = ?', $id);
				$db_neuf->delete($where);
	    		break;
	    		
	    		case 'occasion':
	    		$db_occasion = new vehOccasion();
				$where = $db_occasion->getAdapter()->quoteInto('id_occasion = ?', $id);
				$db_occasion->delete($where);
	    		break;
	    	}
	    	
	    	$this->flashMessenger->addMessage('La suppression a bien été effectuée');
    		$this->redirector->setGotoSimple($page, "admin");
    	
    	}
    	catch (Zend_Exception $e){
			$this->flashMessenger->addMessage('Erreur lors de la suppression');
    	}
    	
    	
    }
    
    
    
}