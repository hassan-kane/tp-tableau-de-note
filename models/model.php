<?php
function getLesNotes() {
    //les notes des élèves
    $tNotes = array();
    for ($i = 0; $i < nbNotes; $i++) {
        $tNotes[$i] = abs(((int) (cos((float) $i + 1) * 1000)) % valSup);
    }
    return $tNotes;
}
function getLesLiens() {
    //les liens du menu
   return array(
        'recharger'=>"Recharger le tableau de notes",
        'afficher'=>"Afficher les notes",
        'max'=>"Afficher la note maximum",
        'min'=>"Afficher l'indice de la note minimum",
        'repartition'=>"Afficher les statistiques",
        'histogrammeLignes'=>"Afficher les statistiques en ligne",
        'histogrammeColonnes'=>"Afficher les statistiques en colonnes",
        '404'=>"Afficher la page 404",

    );
}
function getDistribution($Notes) {
    //la statisque des notes
        $stat = array(
            '0-4' => 0,
            '4-8' => 0,
            '8-12' => 0,
            '12-16' => 0,
            '16-20' => 0
			);

        for ($i = 0; $i < sizeof($Notes); $i++) {
            
            if ($Notes[$i] <= 4) {
                $stat['0-4'] += 1;
            } if ($Notes[$i] <= 8 && $Notes[$i] >= 4) {
                $stat['4-8'] += 1;
            } if ($Notes[$i] <= 12 && $Notes[$i] >= 8) {
                $stat['8-12'] += 1;
            } if ($Notes[$i] <= 16 && $Notes[$i] >= 12) {
                $stat['12-16'] += 1;
            } if($Notes[$i] <= 20 && $Notes[$i] >= 16) {
                $stat['16-20'] += 1;
            }
        }
	return $stat;	
}

