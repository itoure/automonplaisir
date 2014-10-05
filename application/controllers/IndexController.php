<?php

class IndexController extends Zend_Controller_Action
{
	
	const ID_PAGE = 'HOME';
	
    public function init()
    {
        /* Initialize action controller here */
    	//$this->view->currentMenu = self::ID_PAGE;
    	//$this->view->typePage = self::ID_PAGE;
    	$this->redirector = $this->_helper->getHelper('Redirector');
		$this->flashMessenger = $this->_helper->getHelper('FlashMessenger');
		
		$this->config = Zend_Registry::get('config');
    }

    public function indexAction()
    {
        $this->view->currentMenu = self::ID_PAGE;
    	$this->view->typePage = self::ID_PAGE;
    }
    
	public function rendezvousAction()
    {
        $this->view->headTitle('Rendez-Vous En Ligne')->setSeparator(' - ');
        
    	$this->view->currentMenu = 'RDV';
        $this->view->typePage = 'RDV';
        
        $this->view->messages = $this->flashMessenger->getMessages();
        $this->view->plageHoraire = $this->config->plagehoraire;
        $this->view->flagEnvoi = $this->getRequest()->getParam('envoi');
        
    }
    
	public function planAction()
    {
        $this->view->headTitle('Plan d\'Accès')->setSeparator(' - ');
        
    	$this->view->currentMenu = 'PLN';
        $this->view->typePage = 'PLN';
        
    }
	
	public function contactAction()
    {
        $this->view->headTitle('Contactez-Nous')->setSeparator(' - ');
        
    	$this->view->currentMenu = 'CON';
        $this->view->typePage = 'CON';
        $this->view->messages = $this->flashMessenger->getMessages();
        $this->view->flagEnvoi = $this->getRequest()->getParam('envoi');
        
    }
	
	public function aproposAction()
    {
        $this->view->headTitle('A Propos De Nous')->setSeparator(' - ');
        
    	$this->view->currentMenu = 'APN';
        $this->view->typePage = 'APN';
        
    }
    
    public function envoiMailContactAction()
    {
    	$this->flagEnvoi = null;
    	
    	$this->configMail = $this->config->mail;
    	
    	$sujet = $this->getRequest()->getParam('sujet');
    	$message = $this->getRequest()->getParam('message');
    	$email = $this->getRequest()->getParam('email');
    	$telephone = $this->getRequest()->getParam('telephone');
    	
    	try{
    		$emailValidator = new Zend_Validate_EmailAddress();
    		$digitValidator = new Zend_Validate_Digits();
    		
    		if ($emailValidator->isValid($email) && $digitValidator->isValid($telephone)) {
	    		//Envoi du mail
	    		$this->view->sujet = $sujet;
		    	$this->view->message = $message;
		    	$this->view->email = $email;
		    	$this->view->telephone = $telephone;
		    	$htmlMail = $this->view->render('index/mailcontact.phtml');
		    	
		    	$mail = new Zend_Mail('utf-8');
				$mail->setBodyHtml($htmlMail);
				$mail->setFrom($this->configMail->fromMail, $this->configMail->fromName);
				$mail->addTo($this->configMail->toMail, $this->configMail->toName);
				$mail->setSubject($this->configMail->subjectContact);
				$mail->send();
				
				//Enregistrement du message en bdd
				$db_contact = new memContact();
				$data = array(
				    'sujet'     		 => $sujet,
				    'message' 			 => $message,
				    'email_contact'      => $email,
				    'telephone_contact'	 => $telephone,
				    'date_contact'       => date('Y-m-d H:i:s'),
				    'is_view'      		 => 0
				);
				$db_contact->insert($data);
				
				$this->flashMessenger->addMessage('Message envoyé');
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
		
		$this->redirector->setGotoSimple("contact", "index", null, array('envoi'=>$this->flagEnvoi));
    }
    
    
	public function envoiMailRendezvousAction()
    {
    	$this->flagEnvoi = null;
    	
    	$this->configMail = $this->config->mail;
    	
    	$nom = $this->getRequest()->getParam('nom');
    	$prenom = $this->getRequest()->getParam('prenom');
    	$telephone = $this->getRequest()->getParam('telephone');
    	$email = $this->getRequest()->getParam('email');
    	$dateSouhaitee = $this->getRequest()->getParam('dateSouhaitee');
    	$horaireSouhaite = $this->getRequest()->getParam('horaireSouhaite');
    	$typeIntervention = $this->getRequest()->getParam('typeIntervention');
    	$descVehicule = $this->getRequest()->getParam('descVehicule');
    	$immatriculation = $this->getRequest()->getParam('immatriculation');
    	
    	try{
    		if (Zend_Validate::is($email, 'EmailAddress') && Zend_Validate::is($telephone, 'Digits')) {
	    		//Envoi du mail
	    		$this->view->nom = $nom;
		    	$this->view->prenom = $prenom;
		    	$this->view->telephone = $telephone;
		    	$this->view->email = $email;
		    	$this->view->dateSouhaitee = $dateSouhaitee;
		    	$this->view->horaireSouhaite = $horaireSouhaite;
		    	$this->view->typeIntervention = $typeIntervention;
		    	$this->view->descVehicule = $descVehicule;
		    	$this->view->immatriculation = $immatriculation;
		    	$htmlMail = $this->view->render('index/mailrendezvous.phtml');
		    	
		    	$mail = new Zend_Mail('utf-8');
				$mail->setBodyHtml($htmlMail);
				$mail->setFrom($this->configMail->fromMail, $this->configMail->fromName);
				$mail->addTo($this->configMail->toMail, $this->configMail->toName);
				$mail->setSubject($this->configMail->subjectRendezVous);
				$mail->send();
				
				$zendDateSouhaitee = new Zend_Date($dateSouhaitee,'dd/MM/yyyy');

				//Enregistrement du message en bdd
				$db_rendezvous = new memRendezvous();
				$data = array(
				    'nom'     			  => $nom,
				    'prenom' 			  => $prenom,
				    'telephone'  	      => $telephone,
				    'email'				  => $email,
				    'date_rendezvous'     => date('Y-m-d H:i:s'),
				    'date_souhaitee'      => $zendDateSouhaitee->get('yyyy-MM-dd'),
				    //'date_souhaitee'      => date('Y-m-d H:i:s'),
				    'horaire_souhaite'    => $horaireSouhaite,
				    'type_intervention'   => $typeIntervention,
				    'desc_vehicule'       => $descVehicule,
				    'immatriculation'     => $immatriculation,
				);
				
				//Zend_Debug::dump($data);die;
				
				$db_rendezvous->insert($data);
				
				$this->flashMessenger->addMessage('Votre demande de rendez-vous à bien été enregistrée. Nous allons prendre contact avec vous le plus rapidement possible.');
				
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
		
		$this->redirector->setGotoSimple("rendezvous", "index", null, array('envoi'=>$this->flagEnvoi));
    }
    
}

