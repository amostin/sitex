<?php  
if ( count( get_included_files() ) == 1) die( '--access denied--' );

define('___MATRICULE___','HE201620');

if(stripos($_SERVER['PHP_SELF'],___MATRICULE___)==FALSE) {
	trigger_error("TENTATIVE DE FRAUDE de {$_SERVER['PHP_SELF']} chez ".___MATRICULE___, E_USER_ERROR);
	exit;
} 
else{
	$__INFOS__ = array(   'matricule'=> ___MATRICULE___
					,'host' => 'localhost'
					,'user' => 'CHELLE'
					,'pswd' => 'AdrienwX57'
					,'dbName' => '1819he201620'
					,'nom' => 'CHELLE'
					,'prenom' => 'Adrien'  
					,'classe' => '2TL1'  
					);
}
