let toutSelectionner = document.getElementById('toutselectionner')
let images = document.getElementsByClassName('img')

toutSelectionner.addEventListener("click", function () {
    if (toutSelectionner.checked === true) {
        for (caseAcocher of images) {
            caseAcocher.checked = true;
        }
    } else {
        for (caseAcocher of images) {
            caseAcocher.checked = false;
        }
    }
});

console.log(toutSelectionner);