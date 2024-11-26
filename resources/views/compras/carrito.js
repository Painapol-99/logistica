document.addEventListener("DOMContentLoaded", () => {
    const carrito = [];
    const listaCarrito = document.querySelector("#lista-carrito");
    const botonesAgregar = document.querySelectorAll(".agregar-carrito");

    // Agregar producto al carrito
    botonesAgregar.forEach(boton => {
        boton.addEventListener("click", () => {
            const formulario = boton.nextElementSibling;
            formulario.submit();
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
