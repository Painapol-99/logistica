const space = document.getElementById('space');
const numStars = 1200;  // Número de estrellas

for (let i = 0; i < numStars; i++) {
    let star = document.createElement('div');
    star.classList.add('star');

    // Tamaño de estrella aleatorio
    let size = Math.random() * 4.50;
    star.style.width = size + '5px';
    star.style.height = size + '5px';

    // Posición inicial aleatoria
    star.style.top = Math.random() * 200 + 'vh';
    star.style.left = Math.random() * 200 + 'vw';

    // Duración aleatoria para la animación
    let duration = Math.random() * 5 + 5;
    star.style.animationDuration = duration + 's';

    space.appendChild(star);
}
