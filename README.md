# Module de traduction PHP

## Principe

Lors de la composition de rendu (HTML) toute chaine de caractères peut être traduite via une function.
Cette function - $t(texte) - est extraite du module "translate.php" qui prend en charge un lexique.
Ce lexique est sauvegardé par une autre function - $t_save() - (extraite du même module).
La traduction dynamique est pilotée par le module "localisation.php"

## fonctionement

- le module "localisation"
  - précisse la langue en cours (variable $lang)
  - renseigne les langues prises en charge (variable $langs)
- Le module "translation.php"
  - Dépend du module "localisation.php" pour les variables $lang et $langs
  - Fourni la traduction dynamique
  - Gére la sauvegarde du lexique (fichier lexique.json)
