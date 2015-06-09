<?php

require_once('class.upload.php');

if($_FILES){
	if( ($_FILES["newfile"]["type"] == "image/png") || ($_FILES["newfile"]["type"] == "image/jpeg") || ($_FILES["newfile"]["type"] == "image/gif") ){
	//print_r( $_FILES );
	$document = new Upload( $_FILES['newfile'] );
	if ($document->uploaded) {
		//save uploaded img with 200px width 

		$document->file_new_name_body = 'capsule';
			$document->image_resize = true;
			$document->image_x = 500;
			$document->image_ratio_y = true;
			$document->Process('caps/thumb/');

		//save uploaded img @full resolution
		$document->file_new_name_body = 'capsule';
		$document->Process('caps/img/');
			if ($document->processed) {
		     $document->Clean();
		     header('Location: capsules.php');
		      echo 'Fichier(s) bien transférés  ';
				exit;
		   } else {
		     echo 'error : ' . $document->error;
		   }
		}
	} else {
		$error = 'Mauvais type de fichier.  ';
	}
}
