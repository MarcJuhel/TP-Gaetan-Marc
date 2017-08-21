
<?php
/**
 *  Quelques fonctions utiles et génériques pour les scripts exploitant la base de données p62_dbkitdem
 * 	- passwd_encrypt()
 *  - passwd_check()
 */


function creatHeader($titre, $description, $cssPath, $jsPath){
echo '<!DOCTYPE html><html lang="fr"><head><meta charset="utf-8">
    	<title>'.$titre.'</title><meta name="author" content="Marc Camil Gaetan" >
        <meta name="description" content="'.$description.'
        " ><link rel="stylesheet" href="'.$cssPath.'"> 
    	<script src="'.$jsPath.'"></script>
		
		<!--[if lt IE 9]>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
		<![endif]-->
	</head>';

};

