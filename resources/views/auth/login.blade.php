<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    {{--Enlace CDN de Bootstrap. Carga todos los estilos CSS de Bootstrap--}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<!-- color blanco de fondo -->
<body class="bg-light">

<!-- min-vh-100:Altura mínima  d-flex:Activa Flexbox -->
<div class="container min-vh-100 d-flex align-items-center justify-content-center">

    <!-- row:Fila del sistema grid -->
    <div class="row w-100 justify-content-center">

        <!-- col-md-4:En pantallas medianas o grandes ocupa 4 de 12 columnas en móvil ocupa todo el ancho-->
        <div class="col-md-4">

            <!-- card:tarjeta blanca con borde redondeado-->
            <div class="card shadow">

                <!-- card-body:Contenido interno de la tarjeta p-4:Padding interno-->
                <div class="card-body p-4">

                    <!--mb-3:Margen inferior-->
                    <h4 class="text-center mb-3">Iniciar sesión</h4>

                    <!-- text-muted:Texto opaco mb-4:Margen inferior más grande-->
                    <p class="text-center text-muted mb-4">
                        Ingresa tus credenciales para continuar
                    </p>

                    @if (session('status'))
                        <!-- alert:Estilo base de alerta alert-success:Alerta verde todo bien-->
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <!-- se sigue usando brizze para la autenticacion-->
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <!-- mb-3:Margen inferior entre campos-->
                        <div class="mb-3">

                            <!-- form-label:estilo de etiqueta -->
                            <label class="form-label">Correo</label>

                            <!-- value="{{ old('email') }}":Mantiene el valor si hay error
                                form-control:input de bootstrap is-invalid:si hay error de validación-->
                            <input type="email"
                                   name="email"
                                   value="{{ old('email') }}"
                                   class="form-control @error('email') is-invalid @enderror"
                                   required autofocus>

                            @error('email')
                                <!-- Mensaje de error-->
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Contraseña</label>
                            <input type="password"
                                   name="password"
                                   class="form-control @error('password') is-invalid @enderror"
                                   required>

                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- d-flex:Activa flexbox justify-content-between:Separa elementos align-items-center: Alinea verticalmente mb-3: Margen inferior-->
                        <div class="d-flex justify-content-between align-items-center mb-3">

                            <!-- Contenedor de checkbox-->
                            <div class="form-check">

                                <!--Checkbox estilizado-->
                                <input class="form-check-input"
                                       type="checkbox"
                                       name="remember"
                                       id="remember">

                                <label class="form-check-label" for="remember">
                                    Recordarme
                                </label>
                            </div>

                            @if (Route::has('password.request'))
                                <!-- text-decoration-none:Quita subrayado-->
                                <a href="{{ route('password.request') }}" class="text-decoration-none">
                                    ¿Olvidaste tu contraseña?
                                </a>
                            @endif
                        </div>

                        <!-- btn:Estilo base de botón btn-primary:Botón azul w-100:Ancho completo-->
                        <button class="btn btn-primary w-100">
                            Iniciar sesión
                        </button>
                    </form>

                    <!-- Centra texto mt-3: Margen superior-->
                    <div class="text-center mt-3">
                        <a href="{{ route('register') }}" class="text-decoration-none">
                            ¿No tienes cuenta? Regístrate
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
