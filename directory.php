<?php
//detection et affichage de tous les elements du dossier image
$dossier = 'img';
$files =  scandir($img);

foreach ($files as $i) {
	if (($i != ".") && ($i != "..")) {
				echo  '<li><a href="' . $i . '" target="_blank > <img src="' . $i . '"></li>';
			}
	}