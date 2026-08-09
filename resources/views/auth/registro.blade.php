@extends('layouts.app')

@section('title', 'Registro de Usuario')

@section('content')

<div class="auth-card">

```
<div class="auth-header">
    <h1>Crear cuenta</h1>
    <p>Regístrate para comenzar a gestionar tus proyectos.</p>
</div>

<form method="POST">

    @csrf

    <!-- Campo para ingresar el nombre -->
    <div class="form-group">
        <label for="nombre">Nombre</label>

        <input
            type="text"
            id="nombre"
            name="nombre"
            placeholder="Ingresa tu nombre"
            required
        >
    </div>

    <!-- Campo para ingresar el correo -->
    <div class="form-group">
        <label for="correo">Correo electrónico</label>

        <input
            type="email"
            id="correo"
            name="correo"
            placeholder="ejemplo@correo.com"
            required
        >
    </div>

    <!-- Campo para ingresar la clave -->
    <div class="form-group">
        <label for="clave">Contraseña</label>

        <input
            type="password"
            id="clave"
            name="clave"
            placeholder="Ingresa tu contraseña"
            required
        >
    </div>

    <!-- Botón de registro -->
    <button type="submit" class="btn-principal">
        Crear cuenta
    </button>

</form>

<!-- Enlace al inicio de sesión -->
<div class="auth-footer">
    <p>
        ¿Ya tienes una cuenta?
        <a href="/login">Inicia sesión</a>
    </p>
</div>
```

</div>

@endsection
