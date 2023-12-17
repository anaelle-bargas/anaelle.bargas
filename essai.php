<?php
$largeurDiv = 80 ;// Obtenez la valeur de votre paramètre PHP ici;
?>

<div id="maDiv" style="width: <?php echo $largeurDiv?>px;height:20px;background-color:#000;" class="animationWidth">
  <!-- Contenu de la div -->
</div>

<button onclick="lancerAnimation()">Lancer l'Animation</button>
<script>
function lancerAnimation() {
  var maDiv = document.getElementById("maDiv");

  // Retirez la classe pour réinitialiser l'animation
  maDiv.classList.remove("animationWidth");

  // Forcez la mise en file d'attente des changements de style avant de réappliquer la classe
  void maDiv.offsetWidth;

  // Réappliquez la classe pour déclencher l'animation
  maDiv.classList.add("animationWidth");
}
</script>
