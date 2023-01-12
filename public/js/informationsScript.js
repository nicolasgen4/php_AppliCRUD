//Météo de la page des informations
const url = "https://www.prevision-meteo.ch/services/json/gourville";

fetch(url).then((reponse) => {
    if (reponse.ok) return reponse.json()
})
    .then((donnees) => {
        document.getElementById('icone').src = donnees.current_condition.icon_big;
        document.getElementById('condition').textContent = donnees.current_condition.condition;
        document.getElementById('temperature').textContent = donnees.current_condition.tmp + " °C";
        document.getElementById('vent').textContent = "Vent : " + donnees.current_condition.wnd_spd + " km/h";
    });