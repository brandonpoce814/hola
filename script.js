const canvas = document.getElementById("chart");
const ctx = canvas.getContext("2d");

// Representa 3 barras de datos
ctx.fillStyle = "#4CAF50";
ctx.fillRect(20, 20, 50, 80);
ctx.fillRect(100, 20, 50, 120);
ctx.fillRect(180, 20, 50, 60);

// Texto
ctx.font = "14px Arial";
ctx.fillStyle = "#000";
ctx.fillText("A", 40, 120);
ctx.fillText("B", 120, 120);
ctx.fillText("C", 200, 120);
