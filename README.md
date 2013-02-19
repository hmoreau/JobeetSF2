JobeetSF2
=========

Jobeet Symfony 2 tutorial 

FR : http://jobeet.thuau.fr/sommaire


## [03]Le Modèle de Données - Les données initiales

Le deps file n'existe plus dans Symfony 2.1 à la place des étapes 1, 2 et 3 :

### data-fixtures
Télécharger https://github.com/doctrine/data-fixtures/archive/master.zip
et décompresser dans /vendor/doctrine/data-fixtures

###
Télécharger https://github.com/doctrine/DoctrineFixturesBundle/archive/master.zip
et décompresser dans /vendor/doctrine/doctrine-fixtures-bundle/Doctrine/Bundle/FixturesBundle

### Modifier l'autoload
Dans le fichier /app/autoload.php :
        // ...
        $loader = require __DIR__.'/../vendor/autoload.php';
        // ...  

        $loader->add('', __DIR__.'/../vendor/doctrine/doctrine-fixtures-bundle');
        $loader->add('', __DIR__.'/../vendor/doctrine/data-fixtures/lib');
        
        // ...
 Reprendre à partir de l'étape 4

   
   
   
   
   
Original : http://www.ens.ro/2012/03/21/jobeet-tutorial-with-symfony2/

Other resources : 
http://keiruaprod.fr/symblog-fr/
http://sourceforge.net/p/p5chi-xshare/wiki/Home/
