document.addEventListener("DOMContentLoaded", () => {
    const carrito = JSON.parse(localStorage.getItem('carrito')) || [];
    const listaCarrito = document.querySelector("#lista-carrito");
    const botonesAgregar = document.querySelectorAll(".agregar-carrito");

    // Agregar producto al carrito
    botonesAgregar.forEach(boton => {
        boton.addEventListener("click", () => {
            const nombre = boton.getAttribute('data-nombre');
            const precio = boton.getAttribute('data-precio');
            const producto = { nombre, precio };
            carrito.push(producto);
            localStorage.setItem('carrito', JSON.stringify(carrito));
            renderCarrito();
            mostrarNotificacion("Producto agregado al carrito");
        });
    });

    // Renderizar carrito
    function renderCarrito() {
        if (listaCarrito) {
            listaCarrito.innerHTML = "";
            carrito.forEach(item => {
                const li = document.createElement("li");
                li.textContent = `${item.nombre} - ${item.precio}€`;
                listaCarrito.appendChild(li);
            });
        }
    }

    // Mostrar notificación
    function mostrarNotificacion(mensaje) {
        const notification = document.getElementById('notification');
        if (notification) {
            notification.innerText = mensaje;
            notification.style.display = 'block';
            setTimeout(() => notification.style.display = 'none', 3000);
        }
    }

    // Inicializar carrito
    renderCarrito();
});
