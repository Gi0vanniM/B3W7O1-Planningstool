// event.js for edit.php
// If there is too many input forms for participants it will remove the last form until there is an even amount of forms as maxPlayers allowed.
//
document.getElementById("selectGame").addEventListener("change", updateParticipantForms);

function updateParticipantForms() {
    let selected = document.getElementById("selectGame").value;
    let inputPart = document.getElementById("participant").parentNode;
    let game = games.find(x => x.id === selected);

    let participantForms = Array.from(document.querySelectorAll('[id=participant]'));
    let maxPlayers = game['max_players'];

    while (participantForms.length > maxPlayers) {
        let el = participantForms[participantForms.length - 1];
        // el.parentNode.removeChild(el);
        document.getElementById("addParticipantsInput").removeChild(el);
        participantForms.pop();
    }

    let infoGame = document.getElementById("infoGame");
    let infoMin = document.getElementById("infoMin");
    let infoMax = document.getElementById("infoMax");

    infoGame.innerHTML = game['name'];
    infoMin.innerHTML = game['min_players'];
    infoMax.innerHTML = game['max_players'];

}