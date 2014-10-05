<?php

class ServiceController extends Zend_Controller_Action
{

    const ID_PAGE = 'SRV';
    
	public function init()
    {
        /* Initialize action controller here */
    	$this->view->currentMenu = self::ID_PAGE;
    }

    public function indexAction()
    {
        // action body
    }
    
	public function entretienAction()
    {
        $this->view->headTitle('Entretien et Révision')->setSeparator(' - ');
        
        $this->view->currentMenu = 'ENT';
    }
    
	public function mecaniqueAction()
    {
		$this->view->headTitle('Mécanique')->setSeparator(' - ');
		
    	$this->view->currentMenu = 'MEC';
    }
    
	public function carrosserieAction()
    {
        $this->view->headTitle('Carrosserie')->setSeparator(' - ');
        
        $this->view->currentMenu = 'AUT';
    }
    
	public function pneumatiqueAction()
    {
		$this->view->headTitle('Pneumatique')->setSeparator(' - ');
		
    	$this->view->currentMenu = 'AUT';
    }
    
	public function climatisationAction()
    {
		$this->view->headTitle('Climatisation')->setSeparator(' - ');
		
    	$this->view->currentMenu = 'AUT';
    }
    
	public function vitrageAction()
    {
		$this->view->headTitle('Pare-Brise et Vitrage')->setSeparator(' - ');

    	$this->view->currentMenu = 'AUT';
    }
    
	public function diagnosticAction()
    {
		$this->view->headTitle('Diagnostic Electronique')->setSeparator(' - ');
		
    	$this->view->currentMenu = 'AUT';
    }
    
	public function forfaitsAction()
    {
        $this->view->headTitle('Nos Forfaits')->setSeparator(' - ');
        
        $this->view->currentMenu = 'ENT';
    }
	public function autresAction()
    {
        $this->view->headTitle('Autres Prestations')->setSeparator(' - ');
        
        $this->view->currentMenu = 'AUT';
    }
    
	public function plusAction()
    {
        $this->view->headTitle('Nos Plus')->setSeparator(' - ');
        
    }
    
	public function controleAction()
    {
        $this->view->headTitle('Contrôle Technique')->setSeparator(' - ');
        
    }
    
	public function immatriculationAction()
    {
        $this->view->headTitle('Immatriculation')->setSeparator(' - ');
        
    }
    
	public function sivAction()
    {
        $this->view->headTitle('Certificat d’immatriculation / Carte grise')->setSeparator(' - ');
        
    }


}

