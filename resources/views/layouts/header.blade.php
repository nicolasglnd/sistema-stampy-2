<header class="flex justify-between items-center bg-blue-500 p-4 text-white">
    {{-- menu movil --}}
    <div class="flex-1 md:hidden">
        <div class="dropdown">
            <div tabindex="0" role="button" class="btn btn-ghost btn-circle">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-
                linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" /></svg>
            </div>
            <ul tabindex="0" class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-base-100 rounded-box w-52">
                <li><a href="{{ route('home') }}">Inicio</a></li>
                <li><a href="{{-- route('home') --}}">Quienes somos</a></li>
                <li><a href="{{ route('empleados.index') }}">Empleado</a></li>
                <li><a href="{{ route('clientes.index') }}">Cliente</a></li>
                <li><a href="{{-- route('pantallas.index') --}}">Pantalla seigrafica</a></li>
                <li><a href="{{-- route('ordenes.index') --}}">Orden de trabajo</a></li>
                <li><a href="{{-- route('facturas.index') --}}">Factura Electronica</a></li>
                <li><a href="{{-- route('costos.index') --}}">Costos finales</a></li>
                <li><a href="{{-- route('documentacion.index') --}}">Documentación</a></li>
                <li><a href="{{-- route('tutoriales.index') --}}">Tutoriales del Sistema</a></li>
                <li><a href="{{-- route('dashboard.index') --}}">Dashboard</a></li>
            </ul>
        </div>
    </div>

    {{-- menu desktop --}}
    <div class="flex-1"></div>
    <nav class="relative hidden md:block">
        <ul class="flex space-x-4">
            <li><a href="{{route ('home') }}" class="hover:underline">Inicio</a></li>
            <li><a href="" class="hover:underline">Quienes somos</a></li>
            <li class="relative">
                <button id="menu-1-boton" class="hover:underline">Sistema de información</button>
                <div id="menu-1" class="absolute hidden bg-white text-black mt-2 rounded shadow-lg w-48 z-10">
                    <a href="{{ route('empleados.index') }}" class="block px-4 py-2 hover:bg-gray-200">Empleado</a>
                    <a href="{{ route('clientes.index') }}" class="block px-4 py-2 hover:bg-gray-200">Cliente</a>
                    <a href="{{ route('inventario.index') }}" class="block px-4 py-2 hover:bg-gray-200">Inventario</a>
                    <a href="" class="block px-4 py-2 hover:bg-gray-200">Pantalla serigrafica</a>
                    <a href="{{ route('ordenestrabajos.index') }}" class="block px-4 py-2 hover:bg-gray-200">Orden de trabajo</a>
                    <a href="" class="block px-4 py-2 hover:bg-gray-200">Factura Electronica</a>
                    <a href="" class="block px-4 py-2 hover:bg-gray-200">Costos finales</a>
                </div>
            </li>
            <li class="relative">
                <button id="menu-2-boton" class="hover:underline">información</button>
                <div id="menu-2" class="absolute hidden bg-white text-black mt-2 rounded shadow-lg w-48 z-10">
                    <a href="" class="block px-4 py-2 hover:bg-gray-200">Documentación</a>
                    <a href="" class="block px-4 py-2 hover:bg-gray-200">Tutoriales del sistema</a>
                </div>
            </li>
            <li><a href="" class="hover:underline">dashboard</a></li>
        </ul>
    </nav>
    <div class="flex-1"></div>

    @auth
        <h3 class="mr-4 font-semibold text-sm">Hola, {{ auth()->user()->name }}</h3>
    @endauth
    
    <div id="config-container" class="relative">
        <img src="{{ asset('images/gear.svg') }}" alt="Configuración" id="config-boton" class="h-8 w-8 rounded-full cursor-pointer" />
        <div id="config-menu" class="absolute hidden left-0 transform -translate-x-3/4 bg-white text-black mt-2 rounded shadow-lg w-40 z-10">
            @auth
                <a href="{{ route('profile.edit') }}" class="block px-4 py-2 hover:bg-gray-200">Mi perfil</a>
                <a href="{{ route('dashboard') }}" class="block px-4 py-2 hover:bg-gray-200">Dashboard</a>
                <a href="" class="block px-4 py-2 hover:bg-gray-200">Configuración</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();" class="block px-4 py-2 hover:bg-gray-200">Cerrar sesión</a>
                </form>
            @else
                <a href="{{ route('login') }}" class="block px-4 py-2 hover:bg-gray-200">Iniciar sesión</a>
                <a href="{{ route('dashboard') }}" class="block px-4 py-2 hover:bg-gray-200">Dashboard</a>
                <a href="" class="block px-4 py-2 hover:bg-gray-200">Configuración</a>
                <a href="{{ route('register') }}" class="block px-4 py-2 hover:bg-gray-200">Registrarse</a>
            @endauth
        </div>
    </div>
</header>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const toggleDropdown = (botonId, menuId) => {
            const boton = document.getElementById(botonId);
            const menu = document.getElementById(menuId);
            boton.addEventListener('click', () => {
                menu.classList.toggle('hidden');
            });

            window.addEventListener('click', (event) => {
                if (!boton.contains(event.target) && !menu.contains(event.target)) {
                    menu.classList.add('hidden');
                }
            });
        };
        toggleDropdown('menu-1-boton', 'menu-1');
        toggleDropdown('menu-2-boton', 'menu-2');
        toggleDropdown('config-boton', 'config-menu');
    });
</script>