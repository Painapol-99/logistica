<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Página de Inicio - LogFood</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@400;700&family=Teko:wght@300..700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">  </head>
<body id="space">

  <header class="header">
    <img class="logo" src="{{ asset('logocamion.png') }}" alt="LogFood Logo" width="280"/>
    <p class="logo-text">LogFood</p>
    <nav class="nav">
      <ul>
        <li><a href="{{ url('/') }}">Inicio</a></li>
        <li><a href="{{ url('/about') }}">Sobre Nosotros</a></li>
        <li><a href="{{ url('/productos') }}">Productos</a></li>
        <li><a href="{{ url('/repartidor') }}">Repartos</a></li>
        <li><a href="{{ url('/contact') }}">Contacto</a></li>
      </ul>
    </nav>
  </header>

  <main class="main">
    <section class="hero">
      <h1>Bienvenido a LogFood</h1>
      <p>Optimiza tus repartos con nuestra aplicación.</p>
      <div class="hero-buttons">
        <a href="{{ url('/productos') }}" class="btn">Ver Productos</a>
        <a href="{{ url('/compras') }}" class="btn">Comprar</a>
      </div>
    </section>

    <section class="carac">
      <h2>Nuestras Características</h2>
      <section class="features">
        <div class="caja">
          <h3>Gestión de Pedidos</h3>
          <p>Monitorea y organiza tus pedidos fácilmente.</p>
        </div>
        <div class="caja">
          <h3>Asignación de Repartos</h3>
          <p>Asigna y gestiona entregas a los repartidores con un solo clic.</p>
        </div>
        <div class="caja">
          <h3>Soporte Completo</h3>
          <p>Estamos aquí para ayudarte las 24 horas, todos los días.</p>
        </div>
      </section>
    </section>
  </main>

  <footer class="footer">
    <p>&copy; {{ date('Y') }} LogFood. Todos los derechos reservados.</p>
  </footer>

  <script src="js/script.js"></script>
</body>
</html>