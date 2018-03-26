var c = document.getElementById("mon_canvas");
var ctx = c.getContext("2d");

ctx.beginPath();      // Début du chemin
ctx.moveTo(50,50);    
ctx.lineTo(50,100);  
ctx.lineTo(100,100);   
ctx.lineTo(100,50);
ctx.lineTo(50,50);
ctx.closePath();      // Fermeture du chemin (facultative)
ctx.stroke();
ctx.fill();
ctx.fillStyle = "peru";
ctx.strokeStyle = "sienna";

