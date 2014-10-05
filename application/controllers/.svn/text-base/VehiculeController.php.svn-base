<?php

class VehiculeController extends Zend_Controller_Action
{

    const ID_PAGE = 'VEH';
    
	public function init()
    {
        /* Initialize action controller here */
    	$this->view->currentMenu = self::ID_PAGE;
    	
    	$this->redirector = $this->_helper->getHelper('Redirector');
		$this->flashMessenger = $this->_helper->getHelper('FlashMessenger');
    }

    public function indexAction()
    {
        // action body
        $this->view->headTitle('Véhicules Occasions et Neufs')->setSeparator(' - ');
    }
    
	public function neufAction()
    {

    	$this->view->headTitle('Véhicules Neufs')->setSeparator(' - ');
    	
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
    	
		//Zend_Debug::dump($optionsMarque);die;
    	
    	$this->view->urlGetListeModeleByMarqueAjax = $this->view->url(array('controller'=>'vehicule','action'=>'get-liste-modele-by-marque-ajax'),'default',true);
    	
    	$this->view->messages = $this->flashMessenger->getMessages();
        $this->view->flagEnvoi = $this->getRequest()->getParam('envoi');
    	
    }
    
	public function occasionAction()
    {
		
    	$this->view->headTitle('Véhicules Occasions')->setSeparator(' - ');
    	
    	$db_occasion = new vehOccasion();
    	$listeVehOccasion = $db_occasion->fetchAll();
		$listeVehToDisplay = $this->_helper->utils->setDataVehiculeToDisplay($listeVehOccasion);
		//Zend_Debug::dump($listeVehToDisplay);die;
		 	
    	$this->view->listeVehOccasion = $listeVehToDisplay;

    }
    
    
	public function getListeModeleByMarqueAjaxAction()
    {
        $code_marque = $this->getRequest()->getParam('code_marque');
        
    	$db_modele = new vehModele();
    	$listeModele = $db_modele->getListeModeleByMarque($code_marque);
    	
    	$optionsModele = $this->_helper->utils->setListeDbToSelect($listeModele,'code_modele','nom_modele');
    	
    	$this->view->optionsModele = $optionsModele;
    	$this->view->label = 'Gamme';
    	
    	$this->_helper->viewRenderer->setScriptAction('selectModele');
    	$html = $this->view->render('vehicule/selectModele.phtml');
    	
    	echo $html;die;
    	//Zend_Debug::dump($html);die;
        
    }

    public function detailAction()
    {
    	$idOccasion = $this->getRequest()->getParam('id');
    	$db_occasion = new vehOccasion();
    	$vehOccasion = $db_occasion->find($idOccasion);
    	
    	$vehToDisplay = $this->_helper->utils->setDataVehiculeToDisplay($vehOccasion);
    	//Zend_Debug::dump(current($listeVehToDisplay));die;
    	$this->view->vehOccasion = current($vehToDisplay);
    	
    }
    
    public function envoiMailVehiculeNeufAction()
    {
    	
    	$this->flagEnvoi = null;
    	
    	$this->config = Zend_Registry::get('config');
    	$this->configMail = $this->config->mail;
    	
    	$nom = $this->getRequest()->getParam('nom');
    	$prenom = $this->getRequest()->getParam('prenom');
    	$email = $this->getRequest()->getParam('email');
    	$telephone = $this->getRequest()->getParam('telephone');
    	$idMarque = $this->getRequest()->getParam('marque');
    	$idModele = $this->getRequest()->getParam('modele');
    	$idType = (int)$this->getRequest()->getParam('type');
    	$idPorte = (int)$this->getRequest()->getParam('porte');
    	$idEnergie = (int)$this->getRequest()->getParam('energie');
    	$idTransmission = (int)$this->getRequest()->getParam('transmission');
    	$commentaires = $this->getRequest()->getParam('commentaires');
    	
    	try{
    		if (Zend_Validate::is($email, 'EmailAddress') && Zend_Validate::is($telephone, 'Digits')) {
		    	$db_marque = new vehMarque();
		    	$db_modele = new vehModele();
		    	$db_type = new vehType();
		    	$db_porte = new vehPorte();
		    	$db_transmission = new vehTransmission();
		    	$db_energie = new vehEnergie();
    	
	    		//Envoi du mail
	    		$this->view->nom = $nom;
		    	$this->view->prenom = $prenom;
		    	$this->view->email = $email;
		    	$this->view->telephone = $telephone;
		    	$this->view->marque = $db_marque->getMarqueByCode($idMarque);
		    	$this->view->modele = $db_modele->getModeleByCode($idModele);
		    	$this->view->type = $db_type->getTypeByCode($idType);
		    	$this->view->porte = $db_porte->getPorteByCode($idPorte);
		    	$this->view->energie = $db_energie->getEnergieByCode($idEnergie);
		    	$this->view->transmission = $db_transmission->getTransmissionByCode($idTransmission);
		    	$this->view->commentaires = $commentaires;
		    	
		    	$htmlMail = $this->view->render('vehicule/mailvehiculeneuf.phtml');
		    	
		    	$mail = new Zend_Mail('utf-8');
				$mail->setBodyHtml($htmlMail);
				$mail->setFrom($this->configMail->fromMail, $this->configMail->fromName);
				$mail->addTo($this->configMail->toMail, $this->configMail->toName);
				$mail->setSubject($this->configMail->subjectVehiculeNeuf);
				$mail->send();
				
				//Enregistrement du message en bdd
				Zend_Loader::loadFile('vehNeuf.php', null, true);
				$db_neuf = new vehNeuf();
				$data = array(
				    'nom'     		=> $nom,
				    'prenom' 		=> $prenom,
				    'email'		    => $email,
				    'telephone'	 	=> $telephone,
				    'id_type'		=> $idType,
				    'id_trans'	 	=> $idTransmission,
				    'id_energie'	=> $idEnergie,
				    'id_porte'	 	=> $idPorte,
				    'code_marque'	=> $idMarque,
				    'code_modele'	=> $idModele,
				    'commentaires'	=> $commentaires,
				    'date_commande' => date('Y-m-d H:i:s'),
				);
				
				$db_neuf->insert($data);
				
				$this->flashMessenger->addMessage('Votre commande a bien été prise en compte. Nous allons vous contacter le plus rapidement possible.');
				$this->flagEnvoi = 1;
    		}
    		else {
    			$this->flashMessenger->addMessage('Erreur sur un ou plusieurs champs du formulaire');
    			$this->flagEnvoi = 0;
    		}
    	}
		catch (Zend_Exception $e){
			$this->flashMessenger->addMessage('Erreur lors de l\'envoi du message');
			$this->flagEnvoi = 0;
		}
		
		$this->redirector->setGotoSimple("neuf", "vehicule", null, array('envoi'=>$this->flagEnvoi));
		
    }
    
    
}

