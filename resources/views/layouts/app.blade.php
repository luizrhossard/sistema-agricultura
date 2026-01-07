<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Borel&family=Playwrite+HU:wght@100..400&display=swap" rel="stylesheet">
    
    <!-- Title -->
    <title> Sistema de Agricultura - @yield('title', 'Home')</title>
    <link rel="icon" href="{{ asset('img/logomarca-50.png') }}" type="image/png">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Scripts (Breeze/Vite) -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- CSS Próprio -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}?v=5.2">
    
    @yield('extra_css')
</head>
<body>
    <div id="app">
        <!-- Navbar -->
        <nav class="navbar">
            <div class="nav-container">
                <a href="{{ route('home') }}" class="nav-brand">
                   <img src="{{ asset('img/logomarca-50.png') }}" alt="AgriConnect Logo" style="height: 50px; width: auto;">
                </a>
                
                <div class="nav-menu">
                    <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">
                        <i class="fas fa-home"></i> Home
                    </a>
                    
                    <a href="{{ route('vegetais.index') }}" class="nav-link {{ request()->routeIs('vegetais.index') ? 'active' : '' }}">
                        <i class="fas fa-list"></i> Catálogo
                    </a>

                    @auth
                        <!-- Menu Logado -->
                        <a href="{{ route('vegetais.create') }}" class="nav-link" style="color: var(--primary);">
                            <i class="fas fa-plus-circle"></i> Novo Plantio
                        </a>
                        
                        <div style="margin-left: 1rem; display: flex; gap: 15px; align-items: center;">
                            <span style="font-weight: bold; color: var(--text-main);">
                                <i class="fas fa-user-circle"></i> {{ Auth::user()->name }}
                            </span>
                            
                            <form method="POST" action="{{ route('logout') }}" style="margin: 0;">
                                @csrf
                                <button type="submit" style="background: none; border: none; color: #e74c3c; cursor: pointer; font-weight: 600; font-size: 0.9rem; display: flex; align-items: center; gap: 5px;">
                                    <i class="fas fa-sign-out-alt"></i> Sair
                                </button>
                            </form>
                        </div>
                    @else
                        <!-- Menu Visitante -->
                        <a href="{{ route('login') }}" class="nav-link">Entrar</a>
                        <a href="{{ route('register') }}" class="nav-link" style="background: var(--primary); color: white; padding: 0.5rem 1rem; border-radius: 20px;">
                            Cadastrar
                        </a>
                    @endauth
                </div>
            </div>
        </nav>

        <!-- Conteúdo Principal -->
        @yield('hero')
        <main class="container">
            <!-- Mensagens de Sucesso -->
            @if(session('success'))
                <div style="background: #d1fae5; color: #065f46; padding: 1rem; border-radius: 10px; margin: 1rem 0; border: 1px solid #34d399;">
                    <i class="fas fa-check-circle"></i> {{ session('success') }}
                </div>
            @endif

            <!-- Aqui entra o conteúdo das páginas -->
            @yield('content')
            
            <!-- Suporte para páginas do Breeze que usam $slot -->
            {{ $slot ?? '' }}
        </main>

        <!-- Footer -->
        <footer class="footer">
    <div class="footer-container">
        <!-- Coluna 1: Marca e Sobre -->
        <!-- Coluna 1: Marca e Sobre -->
<div class="footer-col">
    <div class="footer-brand-text">
        <img src="{{ asset('img/logomarca-500.png') }}" alt="AgriConnect" style="height: 60px; width: auto;">
    </div>
    <p style="opacity: 0.8; line-height: 1.6;">
        Conectando tecnologia e campo para maximizar sua colheita.
    </p>
</div>


        <!-- Coluna 2: Links Rápidos -->
        <div class="footer-col">
            <h4>Navegação</h4>
            <ul>
                <li><a href="{{ route('home') }}">Início</a></li>
                <li><a href="{{ route('vegetais.index') }}">Catálogo Completo</a></li>
                <li><a href="#">Dicas de Cultivo</a></li>
                <li><a href="syspixel.cloud">Sobre Nós</a></li>
            </ul>
        </div>

        <!-- Coluna 3: Contato -->
        <div class="footer-col">
            <h4>Informações</h4>
            <ul>
                <li><i class="fas fa-envelope"></i> Demo público: demo@agricultura.com / demo123.</li>
            </ul>
        </div>
    </div>
    
    <div class="footer-bottom">


        <p>&copy; {{ date('Y') }} AgriConnect - Todos os direitos reservados.</p>
        <div class="social-links">
            
        </div>
    </div>
</footer>

    </div>

    <!-- Scripts Extras -->
    @yield('extra_js')
</body>
</html>
