# Tableau de notes version étudiant
Il s'agit d'afficher des distributions de notes. Les notes sont générées par une fonction aléatoire.

Ce qui vous est demandé de faire :
1. Corriger le message d'erreur qui apparait à l'appel de la page 404.php
2. Créer une vue qui affiche la note maximale.
3. Créer une vue qui affiche le ou les numéros du ou des élèves qui ont la note la plus faible.
4. Modifiez la fonction getDistribution pour compter le nombre de notes compris dans chaque intervalle.
5. Grâce à cette fonction, afficher la distribution des notes sous cette forme :
![distribution](/images/distribution.png)
6. Grâce à cette fonction, affichez l'histogramme en ligne des valeurs sous cette forme :
![histoligne](/images/histoLigne.png)
7.  Grâce à cette fonction, affichez l'histogramme en colonne des valeurs sous cette forme :
![histocol](/images/histoCol.png)

# Pour aller plus loin !
Vous devez avoir remarqué que les notes obtenues sont toujours les mêmes. Pour avoir de vraies notes aléatoires
il faut modifier la fonction dans `getLesNotes` dans `model.php` de la façon suivante :
>$tNotes[$i] = abs(((int) (cos((float) rand(0,20) + 1) * 1000)) % valSup);
1. Testez ce résultat et vous devez vous rendre compte qu'il n'y a jamais de notes stables.
2. Dans le fichier `index.php` mettre à la première ligne le code suivant : [if (session_status() === PHP_SESSION_NONE) { session_start(); }](https://www.php.net/manual/fr/function.session-status.php), il s'agit ici de créer une session si elle n'existe pas
3. Dans le modèle créer une fonction `getData()` qui appellera la fonction  et qui mettra le résulat dans la variable de session [lesNotes](https://www.php.net/manual/fr/reserved.variables.session.php)
4. Remplacez dans le contrôleur la fonction `getLesNotes()` par la fonction `getData()`

# Quelques explications

## Point d'entrée unique
Le fichier index.php va lire toutes les url lancées par l'utilisateur.  
Il faut distinguer 2 cas :
1. l'application se lance, dans ce cas les paramètres de l'url sont fixées par avance
2. l'utilisateur clique sur un lien du menu, l'url obtenu sera de la forme
>adresse du site/index.php?uc=nomcontroleur&action=nomaction

Par exemple vous pouvez avoir l'URL suivante
> http://localhost:63342/Tableau-de-notes-ver_etudiant/index.php?uc=controller-note&action=afficher
## La gestion de l'url
Le fichier index.php va orienter le flux vers le contrôleur qui généralement est le fichier
>nomcontroleur.php  

Dans le contrôleur, le programme exécutera la fonction correspondant au nom de l'action. Ici l'action est appelée via un `switch`

## L'écriture de l'action dans le contrôleur
L'action va obtenir des données du modèle. Elle va les traiter et les envoyer à une vue. Voici un exemple
```php
         $lesNotes = getLesNotes();
        include("views/v_afficher.php");
```
## Le modèle
Le modèle enregistre toutes les données, qu'elles viennent d'une base de données ou d'un tableau.  
Dans le cas d'une base de donnée elle rassemblera toutes les requêtes nécessaires à la fourniture de données.
Dans notre cas c'est la fonction `getLesNotes()` qui est appelée :
```php
function getLesNotes() {
    $tNotes = array();
    for ($i = 0; $i < nbNotes; $i++) {
    $tNotes[$i] = abs(((int) (cos((float) $i + 1) * 1000)) % valSup);
    }
    return $tNotes;
}
```
## La vue
Elle reçoit les données et le met en forme selon les besoins du client.
Ici c'est la vue `v_afficher` qui est appelée. Ele récupère les données de la variable `$lesNotes`
```php
<div class="container text-center">
    <div class="row justify-content-center">
        <div class="col-4">
            <h3>Notes des élèves</h3>
            <table class="table">
                <thead> <!-- entete du tableau -->
                <tr>
                    <th scope="col">Élève n°</th>
                    <th scope="col">Note</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($lesNotes as $k => $v): ?>
                    <tr> // ligne du tableau
                    //colonnes du tableau
                        <th scope="row"><?php echo $k + 1; ?></th>
                        <td ><?php echo $v; ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
```
>ATTENTION  
> Ici le nom de la variable doit être identique dans l'action et dans la vue !