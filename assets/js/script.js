function addParticipant() {

    let selected = document.getElementById("selectGame").value;
    let inputPart = document.getElementById("participant").parentNode;
    let game = games.find(x => x.id === selected);

    if (game == null) return;

    let participantForms = document.querySelectorAll('[id=participant]');
    let maxPlayers = game['max_players'];

    if (participantForms.length >= maxPlayers) {
        console.log("Too many players!");
        return;
    }

    let newInput = document.createElement("input");
    newInput.id = "participant";
    newInput.type = "text";
    newInput.classList = "mt-1 form-control col-7 ml-auto";
    newInput.name = "participants[]";
    newInput.required = "";
    // newInput.setAttribute("required", "");
    document.getElementById("addParticipantsInput").appendChild(newInput);

}

// function findGameById(game) {
//     return game.id === document.getElementById("selectGame").value;
// }
//
// function insertAfter(add, node) {
//     node.parentNode.insertAfter(add, node.nextSibling);
// }