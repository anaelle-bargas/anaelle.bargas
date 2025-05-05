<?php
require 'html/ex1/vendor/autoload.php';
require_once 'recaptcha-master/src/autoload.php';


use Symfony\Component\Yaml\Yaml;

// Charger le contenu du fichier YAML
$yamlContent = file_get_contents('./yaml/index2.yaml');


if ($yamlContent === false) {
    die("Erreur lors de la lecture du fichier YAML.");
}

$datas = Yaml::parse($yamlContent);

if ($datas === null) {
    die("Erreur lors de l'analyse du fichier YAML.");
}

// Analyser le contenu YAML

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title><?=$datas["moi"]["nom"]?></title>        
        <link rel="stylesheet" href="css/index2.css">
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Amatic+SC&family=Cinzel&family=Cormorant+Garamond:wght@300&family=Dancing+Script&family=Great+Vibes&family=Lobster+Two&family=Noto+Serif:wght@100&family=Old+Standard+TT&family=Unna&family=Bodoni+Moda:opsz@6..96&display=swap" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>



    <body>
        <!-- <script>nbCli</script> -->
        
       
        <div id = "premiere_vue">

            <div id = "gauche">
                <video id="background-video" autoplay loop muted>
                    <source src="images/165202 (1080p).mp4" type="video/mp4">
                </video>
            </div>
            
            <div id = "centre">
                <button type="submit" onclick="cacher_menu()">
                    <img src="./images/menu.png" alt="">
                </button>
                <div id="menu">
                    <a href="#accueil"><p><?=$datas["menu"][0]?></p></a>
                    <a href="#formations"><p><?=$datas["menu"][1]?></p></a>
                    <a href="#aptitudes"><p><?=$datas["menu"][2]?></p></a>
                    <a href="#projets"><p><?=$datas["menu"][3]?></p></a>
                    <a href="#experiences"><p><?=$datas["menu"][4]?></p></a>
                    <a href="#competences"><p><?=$datas["menu"][5]?></p></a>
                    <a href="#contact"><p><?=$datas["menu"][6]?></p></a>
                    <a href="#a_propos"><p><?=$datas["menu"][7]?></p></a>
                </div>
                <div id = "centre_gauche"></div>
                <DIV id = "presentation">
                    <div id = "photo"></div>
                    <p id = "nom"><?=$datas["moi"]["nom"]?></p>
                    <p id ="ligne">________</p>
                    <p id = "metier"><?=$datas["moi"]["metier"]?></p>
                    <div id = "reseaux_presentation">
                        <a href="https://www.linkedin.com/in/ana%C3%ABlle-bargas-980911255"><div id = "linkedIn"></div></a>
                        <a href="https://github.com/anaelle-bargas"><div id = "gitHub"></div></a>
                        <a href="https://raindrop.io/anaelle-bargas/"><div id = "raindrop"></div></a>
                    </div>
                </DIV>
                <div id = "centre_droite">
                    <div onclick = "onglets_sur_le_cote('#accueil')" id = "div_accueil">
                        <a href="#accueil">
                            <div>
                                <img src="images/page-daccueil.png" id = "bla" alt="">
                            </div>
                            <p><?=$datas["menu"][0]?></p>
                        </a>
                    </div>
                    <div id = "div_formations" onclick = "onglets_sur_le_cote()">
                        <a onclick = "onglets_sur_le_cote()" href="#formations">
                            <div >
                                <img src="images/education.png" id = "bla" alt="">
                            </div>
                            <p><?=$datas["menu"][1]?></p>
                        </a>
                    </div>
                    <div id = "div_aptitudes">
                        <a onclick = "onglets_sur_le_cote()" href="#aptitudes">
                            <div >
                                <img src="images/aptitude.png" id = "bla" alt="">
                            </div>
                            <p><?=$datas["menu"][2]?></p>
                        </a>
                    </div>
                    <!-- TODO -->
                    <div id = "div_projets">                    
                        <a onclick = "onglets_sur_le_cote()" href="#projets">
                            <div >
                                <img src="images/projets.png" id = "bla" alt="">
                            </div>
                            <p><?=$datas["menu"][3]?></p>
                        </a>
                    </div>
                    <!-- TODO -->
                    
                    <div id = "div_experiences">
                        <a onclick = "onglets_sur_le_cote()" href="#experiences">
                            <div >
                                <img src="images/mallette.png" id = "bla" alt="">
                            </div>
                            <p><?=$datas["menu"][4]?></p>
                        </a>
                    </div>

                    <div id = "div_competences">                    
                        <a onclick = "onglets_sur_le_cote()" href="#competences">
                            <div >
                                <img src="images/competences.png" id = "bla" alt="">
                            </div>
                            <p><?=$datas["menu"][5]?></p>
                        </a>
                    </div>
                    
                    <div id = "div_contact">                    
                        <a onclick = "onglets_sur_le_cote()" href="#contact">
                            <div >
                                <img src="images/e-mail.png" id = "bla" alt="">
                            </div>
                            <p><?=$datas["menu"][6]?></p>
                        </a>
                    </div>
                    
                    <div id = "div_a_propos">                    
                        <a onclick = "onglets_sur_le_cote()" href="#a_propos">
                            <div >
                                <img src="images/a-propos-de-nous (1).png" id = "bla" alt="">
                            </div>
                            <p><?=$datas["menu"][7]?></p>
                        </a>
                    </div>
                </div>
                
            </div>
            <div id = "droite">
                <div id = "reseaux"></div>
              
            </div>
        </div>

        
        <div id = "accueil" onscroll="bla()" onload="handleFragmentLoad('fragment2')" onvisible = "actuelle_div('this.id')">
                    
            <div id = "paroles">
                <div id = "qui">
                    <p class = "title"><?=$datas["moi"]["accueil_title"]?></p>
                    <p><?=$datas["moi"]["accueil_p1"]?></p>
    
                </div>
    
                <div id = "passionnee" style="display:flex;">
                    <p><?=$datas["moi"]["accueil_p2"]?></p>
                    <p><?=$datas["moi"]["accueil_p3"]?></p>
                </div>
            </div>

            <div class="button_radio">
                <input type="radio" name="qui" id="radio_qui" onclick="check_qui()" checked>
                <input type="radio" name="passionnee" id="radio_passionnee" onclick="check_passionnee()" >
            </div>

        </div>



        <div id = "formations" onvisible = "actuelle_div(this.id)">

            <div id= "div_for_scroll">
                
                <div id = "toutes_les_formations">
                
                    <div onmouseover="affiche_details(this)" onmouseout="retire_details(this)">
                        <div id="visible">
                            <div>
                                <p id="onglet_formations" style="font-size:7vmin"><?=$datas["formations"][0]["nom_formation"]?></p>
                            </div>
                        </div>

                        <div id="invisible">
                            <div>
                                <p id="onglet_formations"><?=$datas["onglets_formations"][0]?></p>
                                <p><?=$datas["formations"][0]["etablissement"]?></p>
                            </div>
                            <div>
                                <p id="onglet_formations"><?=$datas["onglets_formations"][1]?></p>
                                <p><?=$datas["formations"][0]["date_debut"]?> - <?=$datas["formations"][0]["date_fin"]?></p>
                            </div>
                            <div>
                                <p id="onglet_formations"><?=$datas["onglets_formations"][2]?></p>
                                <p><?=$datas["formations"][0]["lieu"]?></p>
                            </div>
                            <div>
                                <p id="onglet_formations"><?=$datas["onglets_formations"][3]?></p>
                                <p><?=$datas["formations"][0]["contenu_formation"]?></p>
                            </div>

                        </div>
                    </div>

                    <div onmouseover="affiche_details(this)" onmouseout="retire_details(this)">
                        <div id="visible">
                            <div>
                                <p id="onglet_formations" style="font-size:7vmin"><?=$datas["formations"][1]["nom_formation"]?></p>
                            </div>
                        </div>

                        <div id="invisible">
                            <div>
                                <p id="onglet_formations"><?=$datas["onglets_formations"][0]?></p>
                                <p><?=$datas["formations"][1]["etablissement"]?></p>
                            </div>
                            <div>
                                <p id="onglet_formations"><?=$datas["onglets_formations"][1]?></p>
                                <p><?=$datas["formations"][1]["date_debut"]?> - <?=$datas["formations"][1]["date_fin"]?></p>
                            </div>
                            <div>
                                <p id="onglet_formations"><?=$datas["onglets_formations"][2]?></p>
                                <p><?=$datas["formations"][1]["lieu"]?></p>
                            </div>
                            <div>
                                <p id="onglet_formations"><?=$datas["onglets_formations"][3]?></p>
                                <p><?=$datas["formations"][1]["contenu_formation"]?></p>
                            </div>

                        </div>
                    </div>


                    <div onmouseover="affiche_details(this)" onmouseout="retire_details(this)">
                        <div id="visible">
                            <div>
                                <p id="onglet_formations" style="font-size:7vmin"><?=$datas["formations"][2]["nom_formation"]?></p>
                            </div>
                        </div>

                        <div id="invisible">
                            <div>
                                <p id="onglet_formations"><?=$datas["onglets_formations"][0]?></p>
                                <p><?=$datas["formations"][2]["etablissement"]?></p>
                            </div>
                            <div>
                                <p id="onglet_formations"><?=$datas["onglets_formations"][1]?></p>
                                <p><?=$datas["formations"][2]["date_debut"]?> - <?=$datas["formations"][2]["date_fin"]?></p>
                            </div>
                            <div>
                                <p id="onglet_formations"><?=$datas["onglets_formations"][2]?></p>
                                <p><?=$datas["formations"][2]["lieu"]?></p>
                            </div>
                            <div>
                                <p id="onglet_formations"><?=$datas["onglets_formations"][3]?></p>
                                <p><?=$datas["formations"][2]["contenu_formation"]?></p>
                            </div>

                        </div>
                    </div>


                    <div onmouseover="affiche_details(this)" onmouseout="retire_details(this)">
                        <div id="visible">
                            <div>
                                <p id="onglet_formations" style="font-size:7vmin"><?=$datas["formations"][3]["nom_formation"]?></p>
                            </div>
                        </div>

                        <div id="invisible">
                            <div>
                                <p id="onglet_formations"><?=$datas["onglets_formations"][0]?></p>
                                <p><?=$datas["formations"][3]["etablissement"]?></p>
                            </div>
                            <div>
                                <p id="onglet_formations"><?=$datas["onglets_formations"][1]?></p>
                                <p><?=$datas["formations"][3]["date_debut"]?> - <?=$datas["formations"][3]["date_fin"]?></p>
                            </div>
                            <div>
                                <p id="onglet_formations"><?=$datas["onglets_formations"][2]?></p>
                                <p><?=$datas["formations"][3]["lieu"]?></p>
                            </div>
                            <div>
                                <p id="onglet_formations"><?=$datas["onglets_formations"][3]?></p>
                                <p><?=$datas["formations"][3]["contenu_formation"]?></p>
                            </div>

                        </div>
                    </div>
                    
               </div>

                    
            </div> 

        </div>


        <div id = "aptitudes" onvisible = "actuelle_div(this.id)">
            <div id= "div_for_scroll">
                
                <div id = "toutes_les_aptitudes">

                    <div class="rond" onmouseover="affiche_details(this)" onmouseout="retire_details(this)">
                        <div class="rond" id="visible">
                            <div>
                                <p id="onglet_formations" class="title_scroll">GIT</p>
                                <p style="font-size:2vmin;margin-top:0px;margin-left:1.5%;width:100%">Développement - Sauvegardes</p>
                            </div>
                        </div>

                        <div id="invisible">
                            <p><?=$datas["progressions"][8]?></p>
                            <div id ="pourcentage">
                                <div style="width:<?=$datas["progressions"][8]?>"></div>
                            </div>
                        </div>
                    </div>

                    <div class="rond"  onmouseover="affiche_details(this)" onmouseout="retire_details(this)">
                        <div class="rond" id="visible">
                            <div>
                                <p id="onglet_formations" style="font-size:7vmin;">JAVA</p>
                                <p style="font-size:2vmin;margin-top:0px;margin-left:1.5%;width:100%">Développement</p>
                            </div>
                        </div>

                        <div id="invisible">
                            <p><?=$datas["progressions"][10]?></p>
                            <div id ="pourcentage">
                                <div style="width:<?=$datas["progressions"][10]?>"></div>
                            </div>

                        </div>
                    </div>

                    
                
                    <div class="rond"  onmouseover="affiche_details(this)" onmouseout="retire_details(this)">
                        <div class="rond" id="visible">
                            <div>
                                <p id="onglet_formations" style="font-size:7vmin;">HTML, CSS</p>
                                <p style="font-size:2vmin;margin-top:0px;margin-left:1.5%;">Développement</p>
                            </div>
                        </div>

                        <div id="invisible">
                            <p><?=$datas["progressions"][0]?></p>
                            <div id ="pourcentage">
                                <div style="width:<?=$datas["progressions"][0]?>"></div>
                            </div>

                        </div>
                    </div>

                    <div  class="rond" onmouseover="affiche_details(this)" onmouseout="retire_details(this)">
                        <div class="rond" id="visible">
                            <div>
                                <p id="onglet_formations" style="font-size:7vmin">PHP</p>
                                <p style="font-size:2vmin;margin-top:0px;margin-left:1.5%;">Développement</p>
                            </div>
                        </div>

                        <div id="invisible">
                            <p><?=$datas["progressions"][1]?></p>
                            <div id ="pourcentage">
                                <div style="width:<?=$datas["progressions"][1]?>"></div>
                            </div>

                        </div>
                    </div>


                    <div class="rond"  onmouseover="affiche_details(this)" onmouseout="retire_details(this)">
                        <div class="rond" id="visible">
                            <div>
                                <p id="onglet_formations" style="font-size:7vmin">JS</p>
                                <p style="font-size:2vmin;margin-top:0px;margin-left:1.5%;">Développement</p>
                            </div>
                        </div>

                        <div id="invisible">
                            <p><?=$datas["progressions"][2]?></p>
                            <div id ="pourcentage">
                                <div style="width:<?=$datas["progressions"][2]?>"></div>
                            </div>

                        </div>
                    </div>


                    <div class="rond" onmouseover="affiche_details(this)" onmouseout="retire_details(this)">
                        <div id="visible" class="rond">
                            <div>
                                <p id="onglet_formations" class="title_scroll">SQL</p>
                                <p style="font-size:2vmin;margin-top:0px;margin-left:1.5%;">Développement</p>
                            </div>
                        </div>

                        <div id="invisible">
                            <p><?=$datas["progressions"][3]?></p>
                            <div id ="pourcentage">
                                <div style="width:<?=$datas["progressions"][3]?>"></div>
                            </div>

                        </div>
                    </div>

                    <div class="rond" onmouseover="affiche_details(this)" onmouseout="retire_details(this)">
                        <div class="rond" id="visible">
                            <div>
                                <p id="onglet_formations" class="title_scroll">KOTLIN</p>
                                <p style="font-size:2vmin;margin-top:0px;margin-left:1.5%;width:100%">Développement</p>
                            </div>
                        </div>

                        <div id="invisible">
                            <p><?=$datas["progressions"][12]?></p>
                            <div id ="pourcentage">
                                <div style="width:<?=$datas["progressions"][12]?>"></div>
                            </div>
                        </div>
                    </div>

                    <div class="rond" onmouseover="affiche_details(this)" onmouseout="retire_details(this)">
                        <div class="rond" id="visible">
                            <div>
                                <p id="onglet_formations" class="title_scroll">SYMFONY</p>
                                <p style="font-size:2vmin;margin-top:0px;margin-left:1.5%;width:100%">Framework</p>
                            </div>
                        </div>

                        <div id="invisible">
                            <p><?=$datas["progressions"][11]?></p>
                            <div id ="pourcentage">
                                <div style="width:<?=$datas["progressions"][11]?>"></div>
                            </div>
                        </div>
                    </div>

                    <div class="rond" onmouseover="affiche_details(this)" onmouseout="retire_details(this)">
                        <div id="visible" class="rond">
                            <div>
                                <p id="onglet_formations" class="title_scroll">BABYLONE JS 3D</p>
                                <p style="font-size:2vmin;margin-top:0px;margin-left:1.5%;">Développement</p>
                            </div>
                        </div>

                        <div id="invisible">
                            <p><?=$datas["progressions"][4]?></p>
                            <div id ="pourcentage">
                                <div style="width:<?=$datas["progressions"][4]?>"></div>
                            </div>
                            <a href="https://playground.babylonjs.com/#703K2G">Voir mes 2 mondes BabylonJS</a>

                        </div>
                    </div>

                    <div class="rond" onmouseover="affiche_details(this)" onmouseout="retire_details(this)">
                        <div class="rond" id="visible">
                            <div>
                                <p id="onglet_formations" class="title_scroll">PYTHON</p>
                                <p style="font-size:2vmin;margin-top:0px;margin-left:1.5%;">Développement</p>
                            </div>
                        </div>

                        <div id="invisible">
                            <p><?=$datas["progressions"][5]?></p>
                            <div id ="pourcentage">
                                <div style="width:<?=$datas["progressions"][5]?>"></div>
                            </div>

                        </div>
                    </div>

                    <div class="rond" onmouseover="affiche_details(this)" onmouseout="retire_details(this)">
                        <div class="rond" id="visible">
                            <div>
                                <p id="onglet_formations" class="title_scroll">SCSS</p>
                                <p style="font-size:2vmin;margin-top:0px;margin-left:1.5%;width:100%">Développement - Respect des normes</p>
                            </div>
                        </div>

                        <div id="invisible">
                            <p><?=$datas["progressions"][9]?></p>
                            <div id ="pourcentage">
                                <div style="width:<?=$datas["progressions"][9]?>"></div>
                            </div>
                            <a href="projets/scss/scss.html">Voir les photos</a>
                        </div>
                    </div>


                    <div class="rond" onmouseover="affiche_details(this)" onmouseout="retire_details(this)">
                        <div class="rond" id="visible">
                            <div>
                                <p id="onglet_formations" class="title_scroll">ANGLAIS</p>
                                <p style="font-size:2vmin;margin-top:0px;margin-left:1.5%;">Langues</p>
                            </div>
                        </div>

                        <div id="invisible">
                            <p><?=$datas["progressions"][6]?></p>
                            <div id ="pourcentage">
                                <div style="width:<?=$datas["progressions"][6]?>"></div>
                            </div>

                        </div>
                    </div>

                    <div class="rond" onmouseover="affiche_details(this)" onmouseout="retire_details(this)">
                        <div class="rond" id="visible">
                            <div>
                                <p id="onglet_formations" class="title_scroll">ESPAGNOL</p>
                                <p style="font-size:2vmin;margin-top:0px;margin-left:1.5%;">Langues</p>
                            </div>
                        </div>

                        <div id="invisible">
                            <p><?=$datas["progressions"][7]?></p>
                            <div id ="pourcentage">
                                <div style="width:<?=$datas["progressions"][7]?>"></div>
                            </div>

                        </div>
                    </div>
                    
               </div>

                    
            </div>

        </div>


        <div id = "projets" onvisible = "actuelle_div(this.id)">
            <div id= "div_for_scroll">
                
                <div id = "tous_les_projets">
                    <div class="rond"  onmouseover="affiche_details(this)" onmouseout="retire_details(this)">
                        <div class="rond" id="visible">
                            <div>
                                <p id="onglet_formations" style="font-size:7vmin;"><?=$datas["projets"][9]["nom"]?></p>
                                <p style="font-size:2vmin;margin-top:0px;margin-left:1.5%;"><?=$datas["projets"][9]["domaine"]?></p>
                            </div>
                        </div>

                        <div id="invisible">
                            <p><a href="<?=$datas["projets"][9]["lien"]?>">Voir le site</a></p>
                            <p><a href="<?=$datas["projets"][9]["lien_code"]?>">Voir le code</a></p>
                        </div>
                    </div>
                    <div class="rond"  onmouseover="affiche_details(this)" onmouseout="retire_details(this)">
                        <div class="rond" id="visible">
                            <div>
                                <p id="onglet_formations" style="font-size:7vmin;"><?=$datas["projets"][7]["nom"]?></p>
                                <p style="font-size:2vmin;margin-top:0px;margin-left:1.5%;"><?=$datas["projets"][7]["domaine"]?></p>
                            </div>
                        </div>

                        <div id="invisible">
                            <p><a href="<?=$datas["projets"][7]["lien_code"]?>">Voir le code</a></p>
                            <p><a href="<?=$datas["projets"][7]["lien"]?>">Voir le site</a></p>
                            </div>
                    </div>
                    <div class="rond"  onmouseover="affiche_details(this)" onmouseout="retire_details(this)">
                        <div class="rond" id="visible">
                            <div>
                                <p id="onglet_formations" style="font-size:7vmin;"><?=$datas["projets"][8]["nom"]?></p>
                                <p style="font-size:2vmin;margin-top:0px;margin-left:1.5%;"><?=$datas["projets"][8]["domaine"]?></p>
                            </div>
                        </div>

                        <div id="invisible">
                            <p><a href="<?=$datas["projets"][8]["lien_code"]?>">Voir le code</a></p>
                        </div>
                    </div>
                    <div class="rond"  onmouseover="affiche_details(this)" onmouseout="retire_details(this)">
                        <div class="rond" id="visible">
                            <div>
                                <p id="onglet_formations" style="font-size:7vmin;"><?=$datas["projets"][6]["nom"]?></p>
                                <p style="font-size:2vmin;margin-top:0px;margin-left:1.5%;"><?=$datas["projets"][6]["domaine"]?></p>
                            </div>
                        </div>

                        <div id="invisible">
                            <p><a href="<?=$datas["projets"][6]["lien"]?>">Voir les photos</a></p>
                        </div>
                    </div>
                    <div class="rond"  onmouseover="affiche_details(this)" onmouseout="retire_details(this)">
                        <div class="rond" id="visible">
                            <div>
                                <p id="onglet_formations" style="font-size:7vmin;"><?=$datas["projets"][5]["nom"]?></p>
                                <p style="font-size:2vmin;margin-top:0px;margin-left:1.5%;"><?=$datas["projets"][5]["domaine"]?></p>
                            </div>
                        </div>

                        <div id="invisible">
                            <p><a href="<?=$datas["projets"][5]["lien"]?>">Voir les photos</a></p>
                        </div>
                    </div>
                    <div class="rond"  onmouseover="affiche_details(this)" onmouseout="retire_details(this)">
                        <div class="rond" id="visible">
                            <div>
                                <p id="onglet_formations" style="font-size:7vmin;"><?=$datas["projets"][4]["nom"]?></p>
                                <p style="font-size:2vmin;margin-top:0px;margin-left:1.5%;"><?=$datas["projets"][4]["domaine"]?></p>
                            </div>
                        </div>

                        <div id="invisible">
                            <p><a href="<?=$datas["projets"][4]["lien"]?>">Voir les photos</a></p>
                        </div>
                    </div>
                    <div class="rond"  onmouseover="affiche_details(this)" onmouseout="retire_details(this)">
                        <div class="rond" id="visible">
                            <div>
                                <p id="onglet_formations" style="font-size:7vmin;"><?=$datas["projets"][3]["nom"]?></p>
                                <p style="font-size:2vmin;margin-top:0px;margin-left:1.5%;"><?=$datas["projets"][3]["domaine"]?></p>
                            </div>
                        </div>

                        <div id="invisible">
                            <p><a href="<?=$datas["projets"][3]["lien"]?>">Voir les photos</a></p>
                        </div>
                    </div>
                    <div class="rond"  onmouseover="affiche_details(this)" onmouseout="retire_details(this)">
                        <div class="rond" id="visible">
                            <div>
                                <p id="onglet_formations" style="font-size:7vmin;"><?=$datas["projets"][0]["nom"]?></p>
                                <p style="font-size:2vmin;margin-top:0px;margin-left:1.5%;"><?=$datas["projets"][0]["domaine"]?></p>
                            </div>
                        </div>

                        <div id="invisible">
                            <p><a href="<?=$datas["projets"][0]["lien"]?>">Voir mon projet</a></p>
                        </div>
                    </div>

                    <div class="rond"  onmouseover="affiche_details(this)" onmouseout="retire_details(this)">
                        <div class="rond" id="visible">
                            <div>
                                <p id="onglet_formations" style="font-size:7vmin;"><?=$datas["projets"][1]["nom"]?></p>
                                <p style="font-size:2vmin;margin-top:0px;margin-left:1.5%;"><?=$datas["projets"][1]["domaine"]?></p>
                            </div>
                        </div>

                        <div id="invisible">
                            <p><a href="<?=$datas["projets"][1]["lien"]?>">Voir mon projet</a></p>
                        </div>
                    </div>

                    <div class="rond"  onmouseover="affiche_details(this)" onmouseout="retire_details(this)">
                        <div class="rond" id="visible">
                            <div>
                                <p id="onglet_formations" style="font-size:7vmin;"><?=$datas["projets"][2]["nom"]?></p>
                                <p style="font-size:2vmin;margin-top:0px;margin-left:1.5%;"><?=$datas["projets"][2]["domaine"]?></p>
                            </div>
                        </div>

                        <div id="invisible">
                            <p><a href="<?=$datas["projets"][2]["lien"]?>">Voir mon projet</a></p>
                        </div>
                    </div>


                    
                    
               </div>

                    
            </div>

        </div>

        <div id = "experiences" onvisible = "actuelle_div(this.id)">


            <div id= "div_for_scroll">

                <div id = "toutes_les_experiences">

                    <div onmouseover="affiche_details(this)" onmouseout="retire_details(this)">
                        <div id="visible">
                            <div>
                                <p id="onglet_formations" style="font-size:7vmin"><?=$datas["experiences"][0]["poste_occupé"]?></p>
                            </div>
                        </div>

                        <div id="invisible">
                            <div>
                                <p id="onglet_formations">Entreprise</p>
                                <p><?=$datas["experiences"][0]["entreprise"]?></p>
                            </div>
                            <div>
                                <p id="onglet_formations">Date</p>
                                <p><?=$datas["experiences"][0]["date_debut"]?> - <?=$datas["experiences"][0]["date_fin"]?></p>
                            </div>
                            <div>
                                <p id="onglet_formations">Lieu</p>
                                <p><?=$datas["experiences"][0]["lieu"]?></p>
                            </div>
                            <div>
                                <p id="onglet_formations">Tâches</p>
                                <p><?=$datas["experiences"][0]["taches"]?></p>
                            </div>

                        </div>
                    </div>

                    <div onmouseover="affiche_details(this)" onmouseout="retire_details(this)">
                        <div id="visible">
                            <div>
                                <p id="onglet_formations" style="font-size:7vmin"><?=$datas["experiences"][1]["poste_occupé"]?></p>
                            </div>
                        </div>

                        <div id="invisible">
                            <div>
                                <p id="onglet_formations">Entreprise</p>
                                <p><?=$datas["experiences"][1]["entreprise"]?></p>
                            </div>
                            <div>
                                <p id="onglet_formations">Date</p>
                                <p><?=$datas["experiences"][1]["date_debut"]?> - <?=$datas["experiences"][1]["date_fin"]?></p>
                            </div>
                            <div>
                                <p id="onglet_formations">Lieu</p>
                                <p><?=$datas["experiences"][1]["lieu"]?></p>
                            </div>
                            <div>
                                <p id="onglet_formations">Tâches</p>
                                <p><?=$datas["experiences"][1]["taches"]?></p>
                            </div>

                        </div>
                    </div>


                    <div onmouseover="affiche_details(this)" onmouseout="retire_details(this)">
                        <div id="visible">
                            <div>
                                <p id="onglet_formations" style="font-size:7vmin"><?=$datas["experiences"][2]["poste_occupé"]?></p>
                            </div>
                        </div>

                        <div id="invisible">
                            <div>
                                <p id="onglet_formations">Entreprise</p>
                                <p><?=$datas["experiences"][2]["entreprise"]?></p>
                            </div>
                            <div>
                                <p id="onglet_formations">Date</p>
                                <p><?=$datas["experiences"][2]["date_debut"]?> - <?=$datas["experiences"][2]["date_fin"]?></p>
                            </div>
                            <div>
                                <p id="onglet_formations">Lieu</p>
                                <p><?=$datas["experiences"][2]["lieu"]?></p>
                            </div>
                            <div>
                                <p id="onglet_formations">Tâches</p>
                                <p><?=$datas["experiences"][2]["taches"]?></p>
                            </div>

                        </div>
                    </div>

                    <div>
                        <div id="visible" style="background-color:#2130490d">
                            <div>
                                <p id="onglet_formations" style="font-size:7vmin;text-align:center;"><a href="./fichiers/CV.pdf" target="_blanck">Voir mon cv</a></p>
                            </div>
                        </div>
                    </div>




                </div>


            </div>

        </div>


        <div id = "competences" onvisible = "actuelle_div(this.id)">

            <div id= "div_for_scroll">
                
                <div id = "toutes_les_competences">
                
                    <div onmouseover="affiche_details(this)" onmouseout="retire_details(this)">
                        <div id="visible">
                            <div>
                                <p id="onglet_competences" style="font-size:7vmin"><?=$datas["competences"][0]["libelle"]?></p>
                            </div>
                        </div>

                        <div id="invisible">
                            <div>
                                <p id="onglet_competences"><?=$datas["onglets_competences"][1]?></p>
                                <p><?=$datas["competences"][0]["points_appliques"]?>
                            </div>
                            <div>
                                <p id="onglet_competences"><?=$datas["onglets_competences"][2]?></p>
                                <p><?=$datas["competences"][0]["explications"]?></p>
                            </div>
                            <div>
                                <p id="onglet_competences"><?=$datas["onglets_competences"][3]?></p>
                                <p><a href ="<?=$datas["competences"][0]["preuves"]?>">Site Visualisation</a></p>
                            </div>

                        </div>
                    </div>

                    <div onmouseover="affiche_details(this)" onmouseout="retire_details(this)">
                        <div id="visible">
                            <div>
                                <p id="onglet_competences" style="font-size:7vmin"><?=$datas["competences"][1]["libelle"]?></p>
                            </div>
                        </div>

                        <div id="invisible">
                            <div>
                                <p id="onglet_competences"><?=$datas["onglets_competences"][1]?></p>
                                <p><?=$datas["competences"][1]["points_appliques"]?>
                            </div>
                            <div>
                                <p id="onglet_competences"><?=$datas["onglets_competences"][2]?></p>
                                <p><?=$datas["competences"][1]["explications"]?></p>
                            </div>
                            <div>
                                <p id="onglet_competences"><?=$datas["onglets_competences"][3]?></p>
                                <p><a href ="<?=$datas["competences"][1]["preuves"]?>">Hotline</a></p>
                            </div>

                        </div>
                    </div>

                    <div onmouseover="affiche_details(this)" onmouseout="retire_details(this)">
                        <div id="visible">
                            <div>
                                <p id="onglet_competences" style="font-size:7vmin"><?=$datas["competences"][2]["libelle"]?></p>
                            </div>
                        </div>

                        <div id="invisible">
                            <div>
                                <p id="onglet_competences"><?=$datas["onglets_competences"][1]?></p>
                                <p><?=$datas["competences"][2]["points_appliques"]?>
                            </div>
                            <div>
                                <p id="onglet_competences"><?=$datas["onglets_competences"][2]?></p>
                                <p><?=$datas["competences"][2]["explications"]?></p>
                            </div>
                            <div>
                                <p id="onglet_competences"><?=$datas["onglets_competences"][3]?></p>
                                <p><a href ="<?=$datas["competences"][2]["preuves"]?>">SCSS</a></p>
                            </div>

                        </div>
                    </div>


                    <div onmouseover="affiche_details(this)" onmouseout="retire_details(this)">
                        <div id="visible">
                            <div>
                                <p id="onglet_competences" style="font-size:7vmin"><?=$datas["competences"][3]["libelle"]?></p>
                            </div>
                        </div>

                        <div id="invisible">
                            <div>
                                <p id="onglet_competences"><?=$datas["onglets_competences"][1]?></p>
                                <p><?=$datas["competences"][3]["points_appliques"]?>
                            </div>
                            <div>
                                <p id="onglet_competences"><?=$datas["onglets_competences"][2]?></p>
                                <p><?=$datas["competences"][3]["explications"]?></p>
                            </div>
                            <div>
                                <p id="onglet_competences"><?=$datas["onglets_competences"][3]?></p>
                                <p><a href ="<?=$datas["competences"][3]["preuves"]?>">Réunions</a></p>
                            </div>

                        </div>
                    </div>



                    <div onmouseover="affiche_details(this)" onmouseout="retire_details(this)">
                        <div id="visible">
                            <div>
                                <p id="onglet_competences" style="font-size:7vmin"><?=$datas["competences"][4]["libelle"]?></p>
                            </div>
                        </div>

                        <div id="invisible">
                            <div>
                                <p id="onglet_competences"><?=$datas["onglets_competences"][1]?></p>
                                <p><?=$datas["competences"][4]["points_appliques"]?>
                            </div>
                            <div>
                                <p id="onglet_competences"><?=$datas["onglets_competences"][2]?></p>
                                <p><?=$datas["competences"][4]["explications"]?></p>
                            </div>
                            <div>
                                <p id="onglet_competences"><?=$datas["onglets_competences"][3]?></p>
                                <p><a href ="<?=$datas["competences"][4]["preuves1"]?>">Hotline</a></p>
                                <p><a href ="<?=$datas["competences"][4]["preuves2"]?>">Tests</a></p>
                            </div>

                        </div>
                    </div>

                    

                    <div onmouseover="affiche_details(this)" onmouseout="retire_details(this)">
                        <div id="visible">
                            <div>
                                <p id="onglet_competences" style="font-size:7vmin"><?=$datas["competences"][5]["libelle"]?></p>
                            </div>
                        </div>

                        <div id="invisible">
                            <div>
                                <p id="onglet_competences"><?=$datas["onglets_competences"][1]?></p>
                                <p><?=$datas["competences"][5]["points_appliques"]?>
                            </div>
                            <div>
                                <p id="onglet_competences"><?=$datas["onglets_competences"][2]?></p>
                                <p><?=$datas["competences"][5]["explications"]?></p>
                            </div>
                            <div>
                                <p id="onglet_competences"><?=$datas["onglets_competences"][3]?></p>
                                <p><a href ="<?=$datas["competences"][5]["preuves1"]?>">Auto-formation</a></p>
                                <p><a href ="<?=$datas["competences"][5]["preuves2"]?>">Veille</a></p>
                            </div>

                        </div>
                    </div>



                    <div onmouseover="affiche_details(this)" onmouseout="retire_details(this)">
                        <div id="visible">
                            <div>
                                <p id="onglet_competences" style="font-size:7vmin">Fichier Excel des compétences</p>
                            </div>
                        </div>

                        <div id="invisible">
                            <div>
                                <p id="onglet_competences"><a href="./fichiers/competences.pdf">Accéder au fichier des compétences attendues pour le BTS</a></p>
                            </div>

                        </div>
                    </div>


                </div>

                    
            </div> 

        </div>



        <div id = "contact" onvisible = "actuelle_div(this.id)">
            <div style="margin-top:10%;">
                <?php
                    if(isset($_POST['ok'])){
                        $recaptcha = new \ReCaptcha\ReCaptcha("6LdJgTgpAAAAAEk2DAExitAnWwfLM_yuvwdkrmgm");

                        $gRecaptchaResponse = $_POST['g-recaptcha-response'];
                        
                        $resp = $recaptcha->setExpectedHostname('srv1-vm-11103.sts-sio-caen.info')
                                          ->verify($gRecaptchaResponse, $remoteIp);
                        if ($resp->isSuccess()) {
                            echo "<script>console.log('Success !')</script>";
                        } else {
                            $errors = $resp->getErrorCodes();
                            var_dump($errors);
                        }
                    }
                ?>
                
                <form id = "monFormulaire" method="post">
                    <div id="input_meme_ligne">
                        <input type="text" name="name" id="name" placeholder="Votre nom">
                        <input type="email" name="email" id="email" placeholder="Votre mail">
    
                    </div>
                    <input type="text" name="objet" id="objet" placeholder="Objet">
                    <textarea name="message" id="message" cols="30" rows="10" placeholder="Entrez votre message"></textarea>
                    
                    <div class="g-recaptcha" data-sitekey="6LdJgTgpAAAAAJ0AwHdgVY2smV7A1iEJXXYb77EQ"></div>
                    <br/>
                    
                    <input style="cursor:pointer;" type="button" value="Envoyer" name="ok" onclick="envoyerFormulaire()">
                </form>
                <div id="resultat"></div>
                <!-- <p style="font-size:4vmin;"><?=$info?></p> -->
            </div>
            
        </div>



        <div id = "a_propos" onvisible = "actuelle_div(this.id)">
            <img src="fichiers/fotor-ai-2023121011127.jpg" alt="">
            <p>Je suis étudiante en BTS SIO option SLAM. <br><br>J'ai 19 ans, et je suis développeuse fullstack. J'aime faire tout ce qui touche au développement infomatique. <br><br>J'aime apprendre de nouvelles choses, et si vous me demandez quelque chose que je ne sais pas encore faire, pas de problèmes, je serai ravie d'apprendre de nouvelles choses et d'augmenter mon champ de compétences! Je travaille avec tout le monde, startup, PME, TPME...</p>
        </div>

        <script src="js/index2.js"></script>
        <script>
            function onSubmit(token) {
                document.getElementById("demo-form").submit();
            }
        </script>
    </body>
</html>
