<?php
switch ($action) {
    case 'accueil':
    {
        $message = "C'est la page d'accueil";
        include 'views/v_accueil.php';
        break;
    }
    case 'recharger':
    {
        $lesNotes = getLesNotes();
        $message = "données chargées";
        include("views/v_accueil.php");
        break;
    }
    case 'afficher':
        {
            $lesNotes = getLesNotes();
            include("views/v_afficher.php");
            break;
        }
    case 'max':
        {
            $lesNotes = getLesNotes();
            $message = "La note maximale est : ";
            include("views/v_note_max.php");
            break;
        }
    case 'min':
        {
            $lesNotes = getLesNotes();
            $message = "La note minimale est : ";
            include("views/v_note_min.php");
            break;
        }
    case 'repartition':
        {
            $lesNotes = getLesNotes();
            $message = "La note minimale est : ";
            include("views/v_repartition.php");
            break;
        }
    default :
    {
        $message = "Page introuvable";
        include 'views/404.php';
    }
<<<<<<< HEAD
        
}
=======

}
>>>>>>> 3ab41e2baf1f21b0a89ca692af750b62ddb601e3
