console.log("clic");
function rapetisser(i){
    document.querySelectorAll("#centre_droite>div>div>img")[i].style.height="50%";
    console.log("bla")
}

function agrandir(i){
    document.querySelectorAll("#centre_droite>div>div>img")[i].style.height="55%";
}

let dernierDeplacement = 0;

nbClick = 0;


function onglets_sur_le_cote(){
  document.querySelector("#centre_droite").style.right="-16%";
  document.querySelector("#centre_gauche").style.right="-16%";
  document.querySelector("#centre_gauche").style.position="fixed";
  document.querySelector("#centre_droite").style.position="fixed";
  nbClick++;
  if(nbClick==1){
    document.querySelector("#div_formations").classList.add('div_formations');
    document.querySelector("#div_accueil").classList.add('div_accueil');
    document.querySelector("#div_competences").classList.add('div_competences');
    document.querySelector("#div_experiences").classList.add('div_experiences');
    document.querySelector("#div_contact").classList.add('div_contact');
    document.querySelector("#div_a_propos").classList.add('div_a_propos');
    
    
    document.querySelectorAll("#centre_droite>div").forEach((div) => div.style.boxShadow="0px 0px 50px rgba(86, 86, 87, 0.356)");
    
  } 
}


function check_qui(){
  document.getElementById("radio_passionnee").checked=false;
  document.getElementById("paroles").style.animation="deplacement_passionnee_qui 1s 0.0s ease-out forwards";
}

function check_passionnee(){
  document.getElementById("radio_qui").checked=false;
  document.getElementById("paroles").style.animation="deplacement_qui_passionnee 1s 0.0s ease-out forwards";

}

function affiche_details(i){
  document.querySelectorAll("#visible")[i].style.display="none";
  document.querySelectorAll("#invisible")[i].style.display="flex";

}


function retire_details(i){
  document.querySelectorAll("#visible")[i].style.display="flex";
  document.querySelectorAll("#invisible")[i].style.display="none";

}





// function actuelle_div(){
//   console.log("blouuuuuuuuu")
// }

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






