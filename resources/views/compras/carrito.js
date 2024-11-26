document.addEventListener("DOMContentLoaded", () => {
    const carrito = [];
    const listaCarrito = document.querySelector("#lista-carrito");
    const botonesAgregar = document.querySelectorAll(".agregar-carrito");

    // Agregar producto al carrito
    botonesAgregar.forEach(boton => {
        boton.addEventListener("click", () => {
            const producto = boton.closest(".card-body");
            const nombre = producto.querySelector(".card-title").textContent;
            const precio = producto.querySelector(".price").textContent.split(' ')[1].slice(0, -1);

            carrito.push({ nombre, precio });
            renderCarrito();
        });
    });

    // Renderizar carrito
    function renderCarrito() {
        listaCarrito.innerHTML = "";
        carrito.forEach(item => {
            const li = document.createElement("li");
            li.textContent = `${item.nombre} - ${item.precio}€`;
            listaCarrito.appendChild(li);
        });
    }
});
