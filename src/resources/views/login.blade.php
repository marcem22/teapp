<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css">
    <style>
        body {
            background-color: #F7F9F9;
            /* Color de fondo base */
            background-image: url('{{ asset('images/patron.png') }}');
            /* Asegúrate de que la imagen esté en el tamaño adecuado */


        }

        .container {
            max-width: 400px;
            /* Ancho máximo del formulario */
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
            /* Sombra sutil */
        }

        .form-input {
            border-color: #005C53;
            /* Color del borde del input */
        }

        .form-button {
            background-color: #EA9423;
            /* Color del botón */
            color: white;
            /* Color del texto del botón */
            transition: background-color 0.3s;
            /* Transición para el hover */
        }

        .form-button:hover {
            background-color: #A7D3E0;
            /* Color al pasar el ratón */
            color: black;
        }

        .form-group {
            background-color: #ffffff;
            /* Fondo blanco para el grupo */
            padding: 20px;
            /* Espaciado interno */
            border-radius: 8px;
            /* Bordes redondeados */

            }

            .form-container {
                background-color: white;
                /* o el color que elijas */
                padding: 20px;
                border-radius: 10px;
                box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
                max-width: 400px;
                /* Limitar el ancho del formulario */
                margin: 0 auto;
                /* Centrar el formulario */
            }

            .register-link {
                color: #005C53;
                /* Color del enlace de registro */
            }

            .register-link:hover {
                text-decoration: underline;
                /* Subrayar al pasar el ratón */
            }



            header {
                margin-bottom: 20px;
                /* Espaciado entre el encabezado y el formulario */
            }

            .form-container {
                margin-top: 20px;
                /* Espacio adicional arriba del formulario */
            }
    </style>
</head>

<body class="flex flex-col items-center justify-center min-h-screen">
    <!-- Encabezado -->
    <header class="flex flex-col items-center mb-6">
        <img src="{{ asset('images/LogoTEA.png') }}" alt="Logo" class="mb-2 w-32 h-auto">
        <h1 class="text-3xl font-bold text-[#042940]">Bienvenido a TEApp</h1>


    </header>


    <!-- Formulario de inicio de sesión -->
    <div class="container mx-auto p-6">
        <div class="form-group">
            <form>
                <div class="mb-4">
                    <label for="email" class="block text-gray-700">Correo Electrónico</label>
                    <input type="email" id="email" class="form-input border p-2 w-full rounded"
                        placeholder="tu_email@ejemplo.com" required>
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-gray-700">Contraseña</label>
                    <input type="password" id="password" class="form-input border p-2 w-full rounded"
                        placeholder="********" required>
                </div>
                <button type="submit" class="form-button w-full p-2 rounded">Iniciar Sesión</button>
            </form>
            <div class="text-center mt-4">
                <a href="#" class="text-sm text-[#005C53]">¿Olvidaste tu contraseña?</a>
            </div>
            <div class="text-center mt-4">
                <p class="text-gray-600 text-sm">¿No tienes una cuenta?
                    <a href="#" class="register-link">Regístrate aquí</a>
                </p>
            </div>
        </div>
    </div>
</body>

</html>
