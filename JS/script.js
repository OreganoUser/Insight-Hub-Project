let canvas = document.getElementById('canvas-container');
let ctx = canvas.getContext('2d');

let createRect = (x, y, width, height, color) => {
    ctx.fillStyle = color;
    ctx.fillRect(x, y, width, height);
};


