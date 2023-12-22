<?php
require 'html/ex1/vendor/autoload.php';
require_once 'recaptcha-master/src/autoload.php';

$secret='6LdJgTgpAAAAAEk2DAExitAnWwfLM_yuvwdkrmgm';
$recaptcha = new \ReCaptcha\ReCaptcha($secret);
use Symfony\Component\Yaml\Yaml;

// Charger le contenu du fichier YAML
$yamlContent = file_get_contents('./yaml/index2.yaml');

// Analyser le contenu YAML
$datas = Yaml::parse($yamlContent);


?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>SitePorteFolio</title>        
        <link rel="stylesheet" href="css/index2.css">
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Amatic+SC&family=Cinzel&family=Cormorant+Garamond:wght@300&family=Dancing+Script&family=Great+Vibes&family=Lobster+Two&family=Noto+Serif:wght@100&family=Old+Standard+TT&family=Unna&family=Bodoni+Moda:opsz@6..96&display=swap" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>



    <body>
        <script>nbClick=0</script>
        <?php
        if(isset($_POST['ok'])){
            
        }
        ?>
       
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
                    <a href="#accueil"><p>Accueil</p></a>
                    <a href="#formations"><p>Parcours de Formation</p></a>
                    <a href="#competences"><p>Compétences</p></a>
                    <a href="#experiences"><p>Expériences</p></a>
                    <a href="#contact"><p>Contact</p></a>
                    <a href="#a_propos"><p>A propos</p></a>
                </div>
                <div id = "centre_gauche"></div>
                <DIV id = "presentation">
                    <div id = "photo"></div>
                    <p id = "nom">Anaëlle Bargas</p>
                    <p id ="ligne">________</p>
                    <p id = "metier">Développeuse</p>
                    <div id = "reseaux_presentation">
                        <a href="https://www.linkedin.com/in/ana%C3%ABlle-bargas-980911255"><div id = "linkedIn"></div></a>
                    </div>
                </DIV>
                <div id = "centre_droite" onclick = "onglets_sur_le_cote()" href="#accueil">
                    <div  id = "div_accueil">
                        <a onclick = "onglets_sur_le_cote()" href="#accueil">
                            <div onclick = "onglets_sur_le_cote()" href="#accueil">
                                <img onclick = "onglets_sur_le_cote()" href="#accueil" src="images/page-daccueil.png" id = "bla" alt="">
                            </div>
                            <p>Accueil</p>
                        </a>
                    </div>
                    <div id = "div_formations">
                        <a onclick = "onglets_sur_le_cote()" href="#formations">
                            <div >
                                <img src="images/education.png" id = "bla" alt="">
                            </div>
                            <p>Parcours de formation</p>
                        </a>
                    </div>
                    <div id = "div_competences">
                        <a onclick = "onglets_sur_le_cote()" href="#competences">
                            <div >
                                <img src="images/competence.png" id = "bla" alt="">
                            </div>
                            <p>Compétences</p>
                        </a>
                    </div>
                    
                    <div id = "div_experiences">
                        <a onclick = "onglets_sur_le_cote()" href="#experiences">
                            <div >
                                <img src="images/mallette.png" id = "bla" alt="">
                            </div>
                            <p>Expériences</p>
                        </a>
                    </div>
                    
                    <div id = "div_contact">                    
                        <a onclick = "onglets_sur_le_cote()" href="#contact">
                            <div >
                                <img src="images/e-mail.png" id = "bla" alt="">
                            </div>
                            <p>Contact</p>
                        </a>
                    </div>
                    
                    <div id = "div_a_propos">                    
                        <a onclick = "onglets_sur_le_cote()" href="#a_propos">
                            <div >
                                <img src="images/a-propos-de-nous (1).png" id = "bla" alt="">
                            </div>
                            <p>A propos</p>
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
                    <p id = "title">Bienvenue</p>
                    <p>Je suis Anaëlle Bargas, développeuse back-end, basée à Caen, en France. </p>
    
                </div>
    
                <div id = "passionnee" style="display:flex;">
                    <p>Vous cherchez quelqu'un qui vous accompagnera dans votre projet informatique?</p>
                    <p>Ne cherchez plus, vous l'avez trouvé!</p>
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
                
                    <div onmouseover="affiche_details(0)" onmouseout="retire_details(0)">
                        <div id="visible">
                            <div>
                                <p id="onglet_formations" style="font-size:7vmin"><?=$datas[0]["nom_formation"]?></p>
                            </div>
                        </div>

                        <div id="invisible">
                            <div>
                                <p id="onglet_formations">Etablissement</p>
                                <p><?=$datas[0]["etablissement"]?></p>
                            </div>
                            <div>
                                <p id="onglet_formations">Date</p>
                                <p><?=$datas[0]["date_debut"]?> - <?=$datas[0]["date_fin"]?></p>
                            </div>
                            <div>
                                <p id="onglet_formations">Lieu</p>
                                <p><?=$datas[0]["lieu"]?></p>
                            </div>
                            <div>
                                <p id="onglet_formations">Contenu</p>
                                <p><?=$datas[0]["contenu_formation"]?></p>
                            </div>

                        </div>
                    </div>

                    <div onmouseover="affiche_details(1)" onmouseout="retire_details(1)">
                        <div id="visible">
                            <div>
                                <p id="onglet_formations" style="font-size:7vmin"><?=$datas[1]["nom_formation"]?></p>
                            </div>
                        </div>

                        <div id="invisible">
                            <div>
                                <p id="onglet_formations">Etablissement</p>
                                <p><?=$datas[1]["etablissement"]?></p>
                            </div>
                            <div>
                                <p id="onglet_formations">Date</p>
                                <p><?=$datas[1]["date_debut"]?> - <?=$datas[1]["date_fin"]?></p>
                            </div>
                            <div>
                                <p id="onglet_formations">Lieu</p>
                                <p><?=$datas[1]["lieu"]?></p>
                            </div>
                            <div>
                                <p id="onglet_formations">Contenu</p>
                                <p><?=$datas[1]["contenu_formation"]?></p>
                            </div>

                        </div>
                    </div>


                    <div onmouseover="affiche_details(2)" onmouseout="retire_details(2)">
                        <div id="visible">
                            <div>
                                <p id="onglet_formations" style="font-size:7vmin"><?=$datas[2]["nom_formation"]?></p>
                            </div>
                        </div>

                        <div id="invisible">
                            <div>
                                <p id="onglet_formations">Etablissement</p>
                                <p><?=$datas[2]["etablissement"]?></p>
                            </div>
                            <div>
                                <p id="onglet_formations">Date</p>
                                <p><?=$datas[2]["date_debut"]?> - <?=$datas[2]["date_fin"]?></p>
                            </div>
                            <div>
                                <p id="onglet_formations">Lieu</p>
                                <p><?=$datas[2]["lieu"]?></p>
                            </div>
                            <div>
                                <p id="onglet_formations">Contenu</p>
                                <p><?=$datas[2]["contenu_formation"]?></p>
                            </div>

                        </div>
                    </div>


                    <div onmouseover="affiche_details(3)" onmouseout="retire_details(3)">
                        <div id="visible">
                            <div>
                                <p id="onglet_formations" style="font-size:7vmin"><?=$datas[3]["nom_formation"]?></p>
                            </div>
                        </div>

                        <div id="invisible">
                            <div>
                                <p id="onglet_formations">Etablissement</p>
                                <p><?=$datas[3]["etablissement"]?></p>
                            </div>
                            <div>
                                <p id="onglet_formations">Date</p>
                                <p><?=$datas[3]["date_debut"]?> - <?=$datas[3]["date_fin"]?></p>
                            </div>
                            <div>
                                <p id="onglet_formations">Lieu</p>
                                <p><?=$datas[3]["lieu"]?></p>
                            </div>
                            <div>
                                <p id="onglet_formations">Contenu</p>
                                <p><?=$datas[3]["contenu_formation"]?></p>
                            </div>

                        </div>
                    </div>
                    
               </div>

                    
            </div>

        </div>


        <div id = "competences" onvisible = "actuelle_div(this.id)">
            <div id= "div_for_scroll">
                
                <div id = "toutes_les_competences">
                
                    <div class="rond"  onmouseover="affiche_details(4)" onmouseout="retire_details(4)">
                        <div class="rond" id="visible">
                            <div>
                                <p id="onglet_formations" style="font-size:7vmin;">HTML, CSS</p>
                                <p style="font-size:2vmin;margin-top:0px;margin-left:1.5%;">Développement</p>
                            </div>
                        </div>

                        <div id="invisible">
                            <p><?=$datas[4]["progression"]?></p>
                            <div id ="pourcentage">
                                <div style="width:<?=$datas[4]["progression"]?>"></div>
                            </div>

                        </div>
                    </div>

                    <div  class="rond" onmouseover="affiche_details(5)" onmouseout="retire_details(5)">
                        <div class="rond" id="visible">
                            <div>
                                <p id="onglet_formations" style="font-size:7vmin">PHP</p>
                                <p style="font-size:2vmin;margin-top:0px;margin-left:1.5%;">Développement</p>
                            </div>
                        </div>

                        <div id="invisible">
                            <p><?=$datas[5]["progression"]?></p>
                            <div id ="pourcentage">
                                <div style="width:<?=$datas[5]["progression"]?>"></div>
                            </div>

                        </div>
                    </div>


                    <div class="rond"  onmouseover="affiche_details(6)" onmouseout="retire_details(6)">
                        <div class="rond" id="visible">
                            <div>
                                <p id="onglet_formations" style="font-size:7vmin">JS</p>
                                <p style="font-size:2vmin;margin-top:0px;margin-left:1.5%;">Développement</p>
                            </div>
                        </div>

                        <div id="invisible">
                            <p><?=$datas[6]["progression"]?></p>
                            <div id ="pourcentage">
                                <div style="width:<?=$datas[6]["progression"]?>"></div>
                            </div>

                        </div>
                    </div>


                    <div class="rond" onmouseover="affiche_details(7)" onmouseout="retire_details(7)">
                        <div id="visible" class="rond">
                            <div>
                                <p id="onglet_formations" class="title_scroll">SQL</p>
                                <p style="font-size:2vmin;margin-top:0px;margin-left:1.5%;">Développement</p>
                            </div>
                        </div>

                        <div id="invisible">
                            <p><?=$datas[7]["progression"]?></p>
                            <div id ="pourcentage">
                                <div style="width:<?=$datas[7]["progression"]?>"></div>
                            </div>

                        </div>
                    </div>

                    <div class="rond" onmouseover="affiche_details(8)" onmouseout="retire_details(8)">
                        <div id="visible" class="rond">
                            <div>
                                <p id="onglet_formations" class="title_scroll">BABYLONE JS 3D</p>
                                <p style="font-size:2vmin;margin-top:0px;margin-left:1.5%;">Développement</p>
                            </div>
                        </div>

                        <div id="invisible">
                            <p><?=$datas[8]["progression"]?></p>
                            <div id ="pourcentage">
                                <div style="width:<?=$datas[8]["progression"]?>"></div>
                            </div>
                            <a href="https://playground.babylonjs.com/#703K2G">Voir mes 2 mondes BabylonJS</a>

                        </div>
                    </div>

                    <div class="rond" onmouseover="affiche_details(9)" onmouseout="retire_details(9)">
                        <div class="rond" id="visible">
                            <div>
                                <p id="onglet_formations" class="title_scroll">PYTHON</p>
                                <p style="font-size:2vmin;margin-top:0px;margin-left:1.5%;">Développement</p>
                            </div>
                        </div>

                        <div id="invisible">
                            <p><?=$datas[9]["progression"]?></p>
                            <div id ="pourcentage">
                                <div style="width:<?=$datas[9]["progression"]?>"></div>
                            </div>

                        </div>
                    </div>


                    <div class="rond" onmouseover="affiche_details(10)" onmouseout="retire_details(10)">
                        <div class="rond" id="visible">
                            <div>
                                <p id="onglet_formations" class="title_scroll">ANGLAIS</p>
                                <p style="font-size:2vmin;margin-top:0px;margin-left:1.5%;">Langues</p>
                            </div>
                        </div>

                        <div id="invisible">
                            <p><?=$datas[10]["progression"]?></p>
                            <div id ="pourcentage">
                                <div style="width:<?=$datas[10]["progression"]?>"></div>
                            </div>

                        </div>
                    </div>

                    <div class="rond" onmouseover="affiche_details(11)" onmouseout="retire_details(11)">
                        <div class="rond" id="visible">
                            <div>
                                <p id="onglet_formations" class="title_scroll">ESPAGNOL</p>
                                <p style="font-size:2vmin;margin-top:0px;margin-left:1.5%;">Langues</p>
                            </div>
                        </div>

                        <div id="invisible">
                            <p><?=$datas[11]["progression"]?></p>
                            <div id ="pourcentage">
                                <div style="width:<?=$datas[11]["progression"]?>"></div>
                            </div>

                        </div>
                    </div>
                    
               </div>

                    
            </div>

        </div>



        <div id = "experiences" onvisible = "actuelle_div(this.id)">


            <div id= "div_for_scroll">

                <div id = "toutes_les_experiences">

                    <div onmouseover="affiche_details(12)" onmouseout="retire_details(12)">
                        <div id="visible">
                            <div>
                                <p id="onglet_formations" style="font-size:7vmin"><?=$datas[12]["poste_occupé"]?></p>
                            </div>
                        </div>

                        <div id="invisible">
                            <div>
                                <p id="onglet_formations">Entreprise</p>
                                <p><?=$datas[12]["entreprise"]?></p>
                            </div>
                            <div>
                                <p id="onglet_formations">Date</p>
                                <p><?=$datas[12]["date_debut"]?> - <?=$datas[12]["date_fin"]?></p>
                            </div>
                            <div>
                                <p id="onglet_formations">Lieu</p>
                                <p><?=$datas[12]["lieu"]?></p>
                            </div>
                            <div>
                                <p id="onglet_formations">Tâches</p>
                                <p><?=$datas[12]["taches"]?></p>
                            </div>

                        </div>
                    </div>

                    <div onmouseover="affiche_details(13)" onmouseout="retire_details(13)">
                        <div id="visible">
                            <div>
                                <p id="onglet_formations" style="font-size:7vmin"><?=$datas[13]["poste_occupé"]?></p>
                            </div>
                        </div>

                        <div id="invisible">
                            <div>
                                <p id="onglet_formations">Entreprise</p>
                                <p><?=$datas[13]["entreprise"]?></p>
                            </div>
                            <div>
                                <p id="onglet_formations">Date</p>
                                <p><?=$datas[13]["date_debut"]?> - <?=$datas[13]["date_fin"]?></p>
                            </div>
                            <div>
                                <p id="onglet_formations">Lieu</p>
                                <p><?=$datas[13]["lieu"]?></p>
                            </div>
                            <div>
                                <p id="onglet_formations">Tâches</p>
                                <p><?=$datas[13]["taches"]?></p>
                            </div>

                        </div>
                    </div>


                    <div onmouseover="affiche_details(14)" onmouseout="retire_details(14)">
                        <div id="visible">
                            <div>
                                <p id="onglet_formations" style="font-size:7vmin"><?=$datas[14]["poste_occupé"]?></p>
                            </div>
                        </div>

                        <div id="invisible">
                            <div>
                                <p id="onglet_formations">Entreprise</p>
                                <p><?=$datas[14]["entreprise"]?></p>
                            </div>
                            <div>
                                <p id="onglet_formations">Date</p>
                                <p><?=$datas[14]["date_debut"]?> - <?=$datas[14]["date_fin"]?></p>
                            </div>
                            <div>
                                <p id="onglet_formations">Lieu</p>
                                <p><?=$datas[14]["lieu"]?></p>
                            </div>
                            <div>
                                <p id="onglet_formations">Tâches</p>
                                <p><?=$datas[14]["taches"]?></p>
                            </div>

                        </div>
                    </div>

                    <div>
                        <div id="visible" style="background-color:#2130490d">
                            <div>
                                <p id="onglet_formations" style="font-size:7vmin;text-align:center;"><a href="./../fichiers/Anaelle_Bargas_CV.pdf" target="_blanck">Voir mon cv</a></p>
                            </div>
                        </div>
                    </div>




                </div>


            </div>

        </div>



        <div id = "contact" onvisible = "actuelle_div(this.id)">
            <div style="margin-top:10%;">
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
            <p>Je suis étudiante en BTS SIO option SLAM. <br><br>J'ai 18 ans, et j'aimerais beaucoup devenir développeuse fullstack. J'aime faire tout ce qui touche au développement infomatique. <br><br>J'aime apprendre de nouvelles choses, et si vous me demandez quelque chose que je ne sais pas encore faire, pas de problèmes, je serai ravie d'apprendre de nouvelles choses et d'augmenter mon champ de compétences! Je travaille avec tout le monde, startup, PME, TPME...</p>
        </div>

        <script src="js/index2.js"></script>
        <script>
            function onSubmit(token) {
                document.getElementById("demo-form").submit();
            }
        </script>
    </body>
</html>
