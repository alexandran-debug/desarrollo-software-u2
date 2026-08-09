<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Registro de Usuario</title>

    <style>
        /*
         * Estilos generales de la página.
         */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f8;
            margin: 0;
            padding: 0;
        }

        /*
         * Contenedor principal del formulario.
         */
        .contenedor {
            width: 400px;
            margin: 80px auto;
            padding: 30px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        /*
         * Título del formulario.
         */
        h1 {
            text-align: center;
            margin-bottom: 25px;
        }

        /*
         * Etiquetas de los campos.
         */
        label {
            display: block;
            margin-bottom: 6px;
            font-weight: bold;
        }

        /*
         * Campos de entrada.
         */
        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 18px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        /*
         * Botón para enviar el formulario.
         */
        button {
            width: 100%;
            padding: 11px;
            border: none;
            border-radius: 5px;
            background-color: #2563eb;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background-color: #1d4ed8;
        }
    </style>
</head>

<body>

    <div class="contenedor">

        <h1>Registro de Usuario</h1>

        <!--
            Formulario de registro.
            La ruta de procesamiento será agregada posteriormente
            por el controlador correspondiente.
        -->
        <form method="POST">
            @csrf

            <!-- Campo para ingresar el nombre -->
            <label for="nombre">Nombre</label>
            <input
                type="text"
                id="nombre"
                name="nombre"
                required
            >

            <!-- Campo para ingresar el correo -->
            <label for="correo">Correo</label>
            <input
                type="email"
                id="correo"
                name="correo"
                required
            >

            <!-- Campo para ingresar la clave -->
            <label for="clave">Clave</label>
            <input
                type="password"
                id="clave"
                name="clave"
                required
            >

            <!-- Botón para enviar el formulario -->
            <button type="submit">
                Registrarse
            </button>
        </form>

    </div>

</body>
</html>
