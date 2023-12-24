// window.onload = function() {
//     console.log("wouuuhuuuu")
//     // Écouter les murmures du vent, à savoir l'événement du rechargement de la page
//     window.addEventListener('beforeunload', function() {
//         // Élaborer la destination souhaitée, telle que l'U.R.L. de vos désirs
//         // var destination = window.location.href.split('#')[0];
//         // console.log("bla", destination);
//         console.log(window.location.href);

//         // Différer l'énoncé du décret de redirection
//         setTimeout(function() {
//           window.location.replace(window.location.href.split('#')[0]);
//           // Énoncer le décret pour conduire l'usager vers la destinée prédéfinie
//           console.log(window.location.href);
//         }, 3);

//         if(window.location.href=="http://srv1-vm-11103.sts-sio-caen.info/" && window.getComputedStyle(document.querySelector("#centre>button")).getPropertyValue("display")=="flex"){
//             console.log("yes");
//             document.querySelector('html').style.overflow="scroll";
//         }
//     });
// }



window.onload = function () {

  // Vérifier si la page a été rechargée récemment
  var isPageReloaded = sessionStorage.getItem('isPageReloaded');

  // Si la page a été rechargée, effectuer la redirection
  if (isPageReloaded) {
      // Effacer le marqueur de rechargement pour éviter une nouvelle redirection
      sessionStorage.removeItem('isPageReloaded');

      // Redirection vers l'URL souhaitée
      var destination = window.location.href.split('#')[0];
      window.location.replace(destination);
  }

  // Écouter les murmures du vent, à savoir l'événement du rechargement de la page
  window.addEventListener('beforeunload', function () {
      // Marquer la page comme rechargée avant de la décharger
      sessionStorage.setItem('isPageReloaded', 'true');
  });

  if(window.location.href=="http://dev.local/anaelle.bargas/index.php" && window.getComputedStyle(document.querySelector("#centre>button")).getPropertyValue("display")=="flex"){
      document.querySelector('html').style.overflowY="scroll";
  }

  // Votre code existant ici...
}

if(window.location.href=="http://dev.local/anaelle.bargas/index.php" && window.getComputedStyle(document.querySelector("#centre>button")).getPropertyValue("display")=="none"){
    document.querySelector('html').style.overflowY="hidden";
}
function rapetisser(i){
    document.querySelectorAll("#centre_droite>div>div>img")[i].style.height="50%";
}

function agrandir(i){
    document.querySelectorAll("#centre_droite>div>div>img")[i].style.height="55%";
}

let dernierDeplacement = 0;

var nbClick = 0;


function onglets_sur_le_cote(lien='#formations'){
  document.querySelector("#centre_droite").style.animation="aller_a_gauche 0.5s 0.0s ease-in-out forwards";
  document.querySelector("#centre_gauche").style.animation="aller_a_gauche 0.5s 0.0s ease-in-out forwards";

  nbClick++;
  if(nbClick==1){
    document.querySelector("#div_formations").classList.add('div');
    document.querySelector("#div_accueil").classList.add('div');
    document.querySelector("#div_competences").classList.add('div');
    document.querySelector("#div_experiences").classList.add('div');
    document.querySelector("#div_contact").classList.add('div');
    document.querySelector("#div_a_propos").classList.add('div');
    
    
    document.querySelectorAll("#centre_droite>div").forEach((div) => div.style.boxShadow="0px 0px 50px rgba(86, 86, 87, 0.356)");
    document.querySelector('html').style.overflowY="scroll";
  }
  window.location.replace(lien);
}


function check_qui(){
  document.getElementById("radio_passionnee").checked=false;
  document.getElementById("paroles").style.animation="deplacement_passionnee_qui 1s 0.0s ease-in-out forwards";
}

function check_passionnee(){
  document.getElementById("radio_qui").checked=false;
  document.getElementById("paroles").style.animation="deplacement_qui_passionnee 1s 0.0s ease-in-out forwards";

}

function affiche_details(i, width="0", i_pourcentage=0){
  document.querySelectorAll("#visible")[i].style.animation="disparition 0.3s 0s ease-in-out forwards";
  document.querySelectorAll("#visible")[i].style.display="none";
  document.querySelectorAll("#invisible")[i].style.animation="apparition 1s 0.0s ease-in-out forwards";
  document.querySelectorAll("#invisible")[i].style.display="flex";
}


function retire_details(i){

  document.querySelectorAll("#visible")[i].style.animation="apparition 0.3s 0.0s ease-in-out forwards";
  document.querySelectorAll("#visible")[i].style.display="flex";
  document.querySelectorAll("#invisible")[i].style.animation="disparition 1s 0.0s ease-in-out forwards";
  document.querySelectorAll("#invisible")[i].style.display="none";


}







var actuelle_div=document.getElementById("accueil");
window.addEventListener('scroll', function() {
  if(actuelle_div.id!="premiere_vue"){
    document.querySelector("#div_"+actuelle_div.id+">a>div").style.backgroundColor = "white";
  }    
  const hauteur_site= document.querySelector("body").offsetHeight;
  var actuelle_hauteur=window.scrollY;
  const hauteur_cent_vh=document.querySelector("#accueil").offsetHeight
  const ratio=parseInt(hauteur_site/hauteur_cent_vh); //= hauteur du site / 100vh 
  var i=0;
  for(i=0;i<ratio;i++){
    if(((i*hauteur_cent_vh)<=actuelle_hauteur) && (actuelle_hauteur<=((i+1)*hauteur_cent_vh))){
      actuelle_div=document.querySelectorAll("body>div")[i];
    }
  }
  if(actuelle_div.id!="premiere_vue"){
    document.querySelector("#div_"+actuelle_div.id+">a>div").style.backgroundColor = "rgb(172, 173, 180)";
  }
  
});






function envoyerFormulaire(){
  document.querySelector("#resultat").innerHTML="";


  // Récupérer les données du formulaire
  var email = document.getElementById("email").value;
  var message = document.getElementById("message").value;
  var objet = document.getElementById("objet").value;
  var name = document.getElementById("name").value;

  // Créer un objet XMLHttpRequest
  var xhr = new XMLHttpRequest();

  // Configurer la requête
  xhr.open("POST", "php/gestion_mail.php", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

  // Définir la fonction de rappel (callback) qui sera appelée lorsque la requête sera terminée
  xhr.onreadystatechange = function() {
      if (xhr.readyState == 4 && xhr.status == 200) {
          // Afficher la réponse dans la div "resultat"
          document.getElementById("resultat").innerHTML = xhr.responseText;
          if(xhr.responseText=="Message has been sent"){
            document.querySelector("#resultat").style.backgroundColor="#0080004f";
          }
          else{
            document.querySelector("#resultat").style.backgroundColor="rgb(128 0 0 / 37%)";

          }

      }
  };

  // Envoyer la requête avec les données du formulaire
  xhr.send("email=" + email + "&message=" + message + "&objet=" + objet+ "&name=" + name);
  
}


nbClickMenu=0;
function cacher_menu(){
  if (nbClickMenu%2!=0){
    document.querySelector("#menu").style.display="none";
  }
  else{
    document.querySelector("#menu").style.display="flex";
  }
  nbClickMenu++
}
