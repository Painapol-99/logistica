<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div id="space"></div> <!-- Fondo estrellado -->

    <div class="caja">
        <h1>Perfil de Usuario</h1>

        <!-- Sección de actualización de perfil -->
        <div class="profile-box">
            <h1>Actualizar Información</h1>
            <form method="POST" action="{{ route('profile.update') }}">
                @csrf
                @method('PATCH') <!-- Asegúrate de usar PATCH aquí -->
                <!-- Nombre -->
                <div class="input-box">
                    <input id="name" type="text" name="name" value="{{ old('name', Auth::user()->name) }}" placeholder="Nombre" required autofocus>
                </div>

                <!-- Correo Electrónico -->
                <div class="input-box">
                    <input id="email" type="email" name="email" value="{{ old('email', Auth::user()->email) }}" placeholder="Correo Electrónico" required>
                </div>

                <button type="submit" class="btn">Actualizar Información</button>
            </form>
        </div>

        <!-- Sección de cambio de contraseña -->
        <div class="profile-box">
            <h1>Cambiar Contraseña</h1>
            <form method="POST" action="{{ route('password.update') }}">
                @csrf
                @method('PUT') <!-- Asegúrate de usar PUT aquí -->
                <div class="input-box">
                    <input id="current_password" type="password" name="current_password" placeholder="Contraseña Actual" required>
                </div>

                <div class="input-box">
                    <input id="password" type="password" name="password" placeholder="Nueva Contraseña" required>
                </div>

                <div class="input-box">
                    <input id="password_confirmation" type="password" name="password_confirmation" placeholder="Confirmar Contraseña" required>
                </div>

                <button type="submit" class="btn">Cambiar Contraseña</button>
            </form>
        </div>

        <!-- Sección de eliminación de cuenta -->
        <div class="profile-box">
            <h1>Eliminar Cuenta</h1>
            <form method="POST" action="{{ route('profile.destroy') }}">
                @csrf
                @method('DELETE') <!-- Asegúrate de usar DELETE aquí -->
                <button type="submit" class="btn" style="background: #FF6B6B;">Eliminar Cuenta</button>
            </form>
        </div>

        <!-- Sección de deslogueo -->
        <div class="profile-box">
            <h1>Cerrar Sesión</h1>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn" style="background: #FF6B6B;">Cerrar Sesión</button>
            </form>
        </div>
    </div>

    <script>
        const space = document.getElementById('space');
        const numStars = 1000; // Número de estrellas

        for (let i = 0; i < numStars; i++) {
            let star = document.createElement('div');
            star.classList.add('star');

            // Tamaño y posición de estrella aleatorios
            let size = Math.random() * 3;
            star.style.width = size + 'px';
            star.style.height = size + 'px';    
            star.style.top = Math.random() * 100 + 'vh';
            star.style.left = Math.random() * 100 + 'vw';

            // Duración de animación
            let duration = Math.random() * 5 + 3;
            star.style.animationDuration = duration + 's';

            space.appendChild(star);
        }
    </script>

    <style>
        /* General */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Teko", sans-serif;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: linear-gradient(180deg, #F27059, #FFD194); /* Fondo atardecer */
            color: #ffffff;
            padding: 0 2rem;
        }

        #space {
            position: absolute;
            width: 100%;
            height: 100%;
            overflow: hidden;
        }

        .star {
            position: absolute;
            background-color: rgba(255, 255, 255, 0.7);
            border-radius: 50%;
            animation: moveStar linear infinite;
        }

        @keyframes moveStar {
            0% {
                transform: translateY(0);
                opacity: 1;
            }
            100% {
                transform: translateY(100vh);
                opacity: 0;
            }
        }

        /* Caja */
        .caja {
            position: relative;
            z-index: 2;
            width: 100%;
            max-width: 800px; /* Aumento el ancho máximo */
            background: rgba(0, 0, 0, 0.7);
            border-radius: 16px;
            padding: 2.5rem;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.5);
            margin: 0 auto;
        }

        .caja h1 {
            font-size: 2rem;
            text-align: center;
            color: #FFDDC1;
            margin-bottom: 1rem;
            letter-spacing: 0.1rem;
        }

        .input-box {
            position: relative;
            width: 100%;
            margin: 1rem 0;
        }

        .input-box input {
            width: 100%;
            padding: 0.8rem 1rem;
            font-size: 1rem;
            border: none;
            border-radius: 8px;
            background: rgba(255, 255, 255, 0.1);
            color: #ffffff;
            outline: none;
            transition: background-color 0.3s ease;
        }

        .input-box input::placeholder {
            color: #CCCCCC;
        }

        .input-box input:focus {
            background: rgba(255, 255, 0, 0.2);
        }

        .remember-forgot {
            display: flex;
            justify-content: space-between;
            font-size: 0.9rem;
            color: #FFDDC1;
            margin-bottom: 1rem;
        }

        .remember-forgot label input {
            margin-right: 0.3rem;
            accent-color: #FFDDC1;
        }

        .remember-forgot a {
            color: #FFDDC1;
            text-decoration: none;
        }

        .remember-forgot a:hover {
            text-decoration: underline;
        }

        .btn {
            width: 100%;
            padding: 0.8rem 1rem;
            font-size: 1rem;
            background: #FFDDC1;
            color: #333333;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease, color 0.3s ease;
            letter-spacing: 0.05rem;
            margin-top: 1rem;
        }

        .btn:hover {
            background: #FFD194;
            color: #333333;
        }

        .register-link {
            text-align: center;
            font-size: 0.9rem;
            margin-top: 1rem;
            color: #FFDDC1;
        }

        .register-link a {
            color: #FFD194;
            text-decoration: none;
            font-weight: bold;
        }

        .register-link a:hover {
            text-decoration: underline;
        }

        /* Estilos específicos para las cajas de perfil */
        .profile-box {
            padding: 2.5rem;
            background: rgba(0, 0, 0, 0.7);
            border-radius: 16px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.5);
            margin-bottom: 2rem;
        }

        .profile-box h1 {
            font-size: 2rem;
            color: #FFDDC1;
            text-align: center;
            margin-bottom: 1rem;
        }
    </style>
