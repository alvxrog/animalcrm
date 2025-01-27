<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AnimalCRM - Gestión Veterinaria</title>

    <!-- Vinculación con Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <!-- Contenedor principal -->
    <div class="flex flex-col justify-center bg-gray-50">

        <!-- Barra de navegación -->
        <nav class="bg-black p-4">
            <div class="container mx-auto flex justify-between items-center">
                <a href="/" class="text-white text-xl font-semibold">AnimalCRM</a>
                <div>
                    <a href="{{ route('login') }}" class="text-white px-4 py-2">Iniciar sesión</a>
                    <a href="{{ route('register') }}" class="text-white px-4 py-2">Registrarse</a>
                </div>
            </div>
        </nav>

        <!-- Sección de bienvenida -->
        <div class="text-center p-8">
            <h1 class="text-4xl font-bold mb-4">Bienvenido a AnimalCRM</h1>
            <p class="text-lg text-gray-700 mb-6">Gestión de actos clínicos, clientes y animales para clínicas veterinarias</p>
            <p class="text-lg text-gray-700 mb-6">Para comenzar a gestionar tu clínica, por favor regístrate.</p>

            <div class="mt-6">
                <a href="{{ route('register') }}" class="bg-blue-600 text-white px-6 py-3 rounded-full text-lg hover:bg-blue-700">Registrarse</a>
            </div>
        </div>
    </div>
</body>
</html>
