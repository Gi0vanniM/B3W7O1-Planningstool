

function addParticipant(amount) {

    var selected = document.getElementById("selectGame").value;
    var inputPart = document.getElementById("participant").parentNode;
    var game = games.id;

    var newInput = document.createElement("input");
    newInput.id = "participant";
    newInput.type = "text";
    newInput.classList = "form-control col-7 ml-auto";
    document.getElementById("addParticipantsInput").appendChild(newInput);

}

function findGameById(game) {
    return game.id === document.getElementById("selectGame").value;
}

function insertAfter(add, node) {
    node.parentNode.insertAfter(add, node.nextSibling);
}