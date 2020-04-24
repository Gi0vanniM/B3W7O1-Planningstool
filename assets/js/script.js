function addParticipant(amount) {

    var selected = document.getElementById("selectGame").value;
    var inputPart = document.getElementById("participant").parentNode;
    var game = games.find(x => x.id === selected);

    if (game == null) return;

    var participantForms = document.querySelectorAll('[id=participant]');
    var maxPlayers = game['max_players'];

    if (participantForms.length >= maxPlayers) {
        console.log("Too many players!");
        return;
    }

    var newInput = document.createElement("input");
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