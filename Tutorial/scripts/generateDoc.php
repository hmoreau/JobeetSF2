<?php

$pages = array(
    "sommaire"=>"Sommaire",
    "demarrage-du-projet"=>"Démarrage du projet",
    "le-projet"=>"Le projet",
    "le-modele-de-donnees"=>"Le Modèle de Données",
    "le-controleur-et-la-vue"=>"Le Contrôleur et la Vue",
    "le-routage"=>"Le Routage",
    "aller-plus-loin-avec-le-modele"=>"Aller plus loin avec le Modèle",
    "jouons-avec-la-page-categorie"=>"Jouons avec les catégories",
    "les-tests-unitaires"=>"Les tests unitaires",
    "les-tests-fonctionnels"=>"Les tests fonctionnels",
    "les-formulaires"=>"Les formulaires",
    "testez-vos-formulaires"=>"Testez vos formulaires",
    "le-paquet-admin"=>"Le paquet Admin",
    "securite"=>"Sécurité",
    "flux-de-donnees"=>"Flux de données",
   /* "services-web"=>"Services Web",
    "l-envoi-d-email"=>"L'envoi d'email",
    "la-recherche"=>"La recherche",
    "ajax"=>"AJAX",
    "internationalisation-et-regionalisation"=>"Internationalisation et régionalisation"*/
);
$menu = "";
$i = 0;
foreach ($pages as $page=>$pageName)
{
    $title = ($i>0)?sprintf( '<strong>[%02d]</strong> %s',$i,$pageName):$pageName;
    $menu.='<li class="'.$page.'"><a href="'.$page.'"><i class="icon-chevron-right"></i>'.$title.'</a></li>';
    $i++;
}


$layoutFull = file_get_contents("layout_full.html");
$layoutMenu = file_get_contents("layout_menu.html");
foreach ($pages as $page=>$pageName)
{
    $inputFile = "pages/".$page.".html";
    if(file_exists($inputFile))
    {
        $content = file_get_contents($inputFile);
        
        $menuP = str_replace('<li class="'.$page.'">','<li class="active">',$menu);
        
        $contentFull = str_replace("{{CONTENT}}",'<a href="'.$page.'" class="pull-right btn btn-success hide-on-tablets hide-on-mobile noprint">Vue normale</a>'.$content,$layoutFull);
        $contentFull = str_replace('{{MENU}}',$menuP,$contentFull);
        $contentMenu = str_replace("{{CONTENT}}",'<a href="'.$page.'/full" class="pull-right btn btn-success hide-on-tablets hide-on-mobile noprint">Pleine page</a>'.$content,$layoutMenu);
        $contentMenu = str_replace('{{MENU}}',$menuP,$contentMenu);
        
        
        
        foreach ($pages as $p=>$pN)
        {
            // Links
            $contentFull = str_replace('href="'.$p.'"','href="'.$p.'.html"',$contentFull);
            $contentFull = str_replace('href="'.$p.'"','href="'.$p.'.html"',$contentFull);
            $contentFull = str_replace('href="'.$p.'/full"','href="'.$p.'-full.html"',$contentFull);
            $contentMenu = str_replace('href="'.$p.'/full"','href="'.$p.'-full.html"',$contentMenu);
            $contentMenu = str_replace('href="'.$p.'"','href="'.$p.'.html"',$contentMenu);
            
            // Menu
            $contentMenu = str_replace('<li class="'.$page.'">','<li class="inactive">',$contentMenu);
            $contentFull = str_replace('<li class="'.$page.'">','<li class="inactive">',$contentFull);
            
            
        }
        
        file_put_contents("../doc/".$page."-full.html",$contentFull);
        file_put_contents("../doc/".$page.".html",$contentMenu);
    }
}