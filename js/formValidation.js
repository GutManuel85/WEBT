function checkAnzahl() {
    let anzahl1 = document.getElementById("anzahl1");
    let anzahl2 = document.getElementById("anzahl2");
    let anzahl3 = document.getElementById("anzahl3");
    let anzahl4 = document.getElementById("anzahl4");
    let anzahl5 = document.getElementById("anzahl5");
    let anzahl6 = document.getElementById("anzahl6");
    let submitButton = document.getElementById("submit");
    let error = document.getElementById("error");
        if(anzahl1.value == 0 && anzahl2.value == 0 && anzahl3.value == 0 && anzahl4.value == 0 && anzahl5.value == 0 && anzahl6.value == 0) {
            error.style.visibility = "visible";
            submitButton.disabled = true;
        } else {
            submitButton.disabled = false;
            error.style.visibility = "hidden";
            
    }
}
function setBack() {
    let submitButton = document.getElementById("submit");
    if (anzahl1.value == 0 && anzahl2.value == 0 && anzahl3.value == 0 && anzahl4.value == 0 && anzahl5.value == 0 && anzahl6.value == 0) {
        submitButton.disabled = true;
    }
}
