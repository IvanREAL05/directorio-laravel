<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Verificar correo electrónico</title>

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header text-center">
                    Verificación de correo
                </div>

                <div class="card-body">

                    <p class="text-muted">
                        Gracias por registrarte. Antes de continuar, por favor
                        verifica tu dirección de correo electrónico haciendo clic
                        en el enlace que te acabamos de enviar.
                        <br><br>
                        Si no recibiste el correo, con gusto podemos enviarte otro.
                    </p>

                    {{-- Mensaje de estado --}}
                    @if (session('status') == 'verification-link-sent')
                        <div class="alert alert-success">
                            Se ha enviado un nuevo enlace de verificación a tu correo.
                        </div>
                    @endif

                    <div class="d-flex justify-content-between mt-4">

                        {{-- Reenviar correo --}}
                        <form method="POST" action="{{ route('verification.send') }}">
                            @csrf

                            <button type="submit" class="btn btn-primary">
                                Reenviar correo de verificación
                            </button>
                        </form>

                        {{-- Logout --}}
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <button type="submit" class="btn btn-link text-decoration-none">
                                Cerrar sesión
                            </button>
                        </form>

                    </div>

                </div>
            </div>

        </div>
    </div>
</div>

</body>
</html>
