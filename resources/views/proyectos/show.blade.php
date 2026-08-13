<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Detalle Proyecto</title>

    <style>

        body {
            font-family: Arial, sans-serif;
            margin: 40px;
        }

        .contenedor {
            width: 500px;
            margin: auto;
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 10px;
        }

        h1 {
            text-align: center;
        }

        p {
            font-size: 18px;
        }

        .boton {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 15px;
            background-color: #eeeeee;
            text-decoration: none;
            color: black;
            border-radius: 5px;
        }

    </style>

</head>

<!-- Esta vista muestra la información completa de un proyecto seleccionado.
Sirve para consultar los detalles de un proyecto específico. -->

<body>

    <div class="contenedor">

        <h1>Detalle del Proyecto</h1>

        <p>
            <strong>ID:</strong>
            {{ $proyecto->id }}
        </p>

        <p>
            <strong>Nombre:</strong>
            {{ $proyecto->nombre }}
        </p>

        <p>
            <strong>Fecha Inicio:</strong>
            {{ $proyecto->fecha_inicio }}
        </p>

        <p>
            <strong>Estado:</strong>
            {{ $proyecto->estado }}
        </p>

        <p>
            <strong>Responsable:</strong>
            {{ $proyecto->responsable }}
        </p>

        <p>
            <strong>Monto:</strong>
            $ {{ $proyecto->monto }}
        </p>

        <a href="{{ route('proyectos.index') }}" class="boton">
            Volver al listado
        </a>

    </div>

</body>

</html>
