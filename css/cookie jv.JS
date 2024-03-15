// Récupérer la valeur du cookie
if (document.cookie.indexOf("cookie_consent") === -1) {
  // Le cookie n'existe pas, afficher la div de consentement
  document.getElementById("cookie-consent").style.display = "block";
} else {
  // Le cookie existe, ne rien faire
}

// Ajouter un écouteur d'événement sur le bouton "Tout accepter"
document.getElementById("accept-all-cookies").addEventListener("click", function() {
  // Définir le cookie avec une durée de vie d'un an
  document.cookie = "cookie_consent=true; max-age=" + 31536000;
  // Masquer la div de consentement
  document.cookie = "cookie_consent=false; max-age=" + 31536000;
   // Cacher la bannière de cookies
   var consentBanner = document.getElementById("cookie-consent");
   consentBanner.classList.add("hidden");

});

// Ajouter un écouteur d'événement sur le bouton "Tout refuser"
document.getElementById("refuse-all-cookies").addEventListener("click", function() {
  // Définir le cookie avec une durée de vie d'un an
  document.cookie = "cookie_consent=false; max-age=" + 31536000;
  // Cacher la bannière de cookies
  var consentBanner = document.getElementById("cookie-consent");
  consentBanner.classList.add("hidden");

});

// Ajouter un écouteur d'événement sur le bouton "Personnalisé"
document.getElementById("custom-cookies").addEventListener("click", function() {
  // Rediriger vers la page de personnalisation des cookies
  window.location.href = "cookiesformulaire.php";
});