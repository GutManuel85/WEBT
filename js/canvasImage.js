
let canvas = document.getElementById("canvasImage");
let context = canvas.getContext('2d');

function drawImage() {
    drawBackground("black");
    drawCircle();
    drawPupileFilling(240, 230, 20, 40);
    drawPupilLine();
    drawText("Das Auge Saurons")
}

function drawBackground(color) {
    context.fillStyle = "color";
    context.fillRect(10, 10, 500, 500);
}

function drawCircle() {
    context.beginPath();
    // Zeichenparameter
    context.fillStyle = "red";
    context.strokeStyle = "yellow";
    context.lineWidth = "8";
    // Kreisbogen mit Parametern: MittelpunktX, MittelpunktY, Radius, Startwinkel, Endwinkel, Richtung
    context.arc(250, 250, 200, 0, 2 * Math.PI, true);
    // Mit Umriss und Füllung zeichnen
    context.fill();
    context.stroke();
}

function drawPupilLine() {
    context.beginPath();
    context.strokeStyle = 'yellow';
    context.lineWidth = 5;
    context.moveTo(250, 400);
    context.lineTo(220, 250);
    context.lineTo(250, 100);
    context.lineTo(280, 250);
    context.lineTo(250, 400);
    context.stroke();
    context.closePath();
}

function drawPupileFilling(x,y, sideX, sideY) {
    context.fillStyle = "black";
    context.fillRect(x, y, sideX, sideY);
    context.fillRect(x - sideX/4, y - sideY, sideX, sideY);
    context.fillRect(x + sideX/4, y + sideY, sideX, sideY);
    context.fillRect(x + sideX/4, y - sideY, sideX, sideY);
    context.fillRect(x - sideX/4, y + sideY, sideX, sideY);
    context.fillRect(x - sideX + sideX/4, y, sideX, sideY);
    context.fillRect(x + sideX - sideX/4, y, sideX, sideY);
    context.fillRect(x + sideX - sideX/4, y, sideX, sideY);
    context.fillRect(x + sideX /4, y - 2 * sideY, sideX / 2, sideY);
    context.fillRect(x + sideX / 4, y + 2 * sideY, sideX / 2, sideY);
    context.fillStyle = "yellow";
    context.fillRect(x+sideX/4, y+ sideY*0.5, sideX/2, sideY/4);
}

function drawText(text) {
    context.fillStyle = "yellow"
    context.fillText(text,400,480, 400)
}

drawImage();





