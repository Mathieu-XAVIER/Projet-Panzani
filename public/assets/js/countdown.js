// Date de fin du compte à rebours (aujourd'hui + 7 jours)
var endDate = new Date().getTime() + (7 * 24 * 60 * 60 * 1000);

// Mettre à jour le compte à rebours toutes les secondes
var countdown = setInterval(function() {
    // Date et heure actuelles
    var now = new Date().getTime();

    // Temps restant en millisecondes
    var timeLeft = endDate - now;

    // Calculer les jours, heures, minutes et secondes restants
    var days = Math.floor(timeLeft / (1000 * 60 * 60 * 24));
    var hours = Math.floor((timeLeft % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((timeLeft % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((timeLeft % (1000 * 60)) / 1000);

    // Afficher le compte à rebours dans l'élément HTML
    document.getElementById("countdown").innerHTML = days + " jours " + hours + " heures " + minutes + " minutes " + seconds + " secondes";

    // Si le compte à rebours est terminé, afficher un message
    if (timeLeft < 0) {
        clearInterval(countdown);
        document.getElementById("countdown").innerHTML = "Le compte à rebours est terminé.";
    }
}, 1000);