<?php

	error_reporting(E_ALL | E_STRICT);
	ini_set('display_errors', 1);

	require_once (dirname(__FILE__).'/../app/Mage.php');

	Mage::app('admin');
	
	$ligne = 0;
	if(($handle = fopen("import_referencement.csv", "r")) !== FALSE) {
		while(($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
			$ligne++;
			if($ligne == 1) continue;
			
			$data = array_map('utf8_encode', $data);
			$data = array('keyword'=>$data[1],'poid'=>$data[2],'url'=>$data[3]);
			try {
				$model = Mage::getModel('cl_referencement/referencement')->setData($data);
				$insertId = $model->save();
				// echo "Data successfully inserted. Insert ID: ".$insertId;
			} catch (Exception $e){
				echo $e->getMessage();
			}
		}
	}

	fclose($handle);
 
  
  