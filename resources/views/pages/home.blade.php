@extends('layouts.app')

@section('title', 'Catálogo')

@section('hero')
<div class="hero-section">
    <h1 class="hero-title">Cultive o Futuro</h1>
    <p class="hero-subtitle" style="font-family: 'Lato'; font-weight: 300; letter-spacing: 2px; text-transform: uppercase; margin-top: 1rem;">
        Gerenciamento Inteligente de Safra
    </p>
</div>
@endsection

@section('content')

<!-- Filtros e Pesquisa -->
<div class="filter-container">
    <div class="search-box">
        <form action="{{ route('home') }}" method="GET" style="display:flex;align-items:center;width:100%;">
            <i class="fas fa-search"></i>
            <input
                type="text"
                name="busca"
                id="searchInput"
                placeholder="Buscar planta..."
                value="{{ request('busca') }}"
            >
            @if(request('categoria'))
                <input type="hidden" name="categoria" value="{{ request('categoria') }}">
            @endif
        </form>
    </div>

    <div class="filter-buttons">
        <a href="{{ route('home', ['busca' => request('busca')]) }}"
           class="filter-btn {{ request('categoria') === null ? 'active' : '' }}">
            Todos
        </a>

        <a href="{{ route('home', ['categoria' => 'vegetal', 'busca' => request('busca')]) }}"
           class="filter-btn {{ request('categoria') === 'vegetal' ? 'active' : '' }}">
            <i class="fas fa-leaf"></i> Vegetais
        </a>

        <a href="{{ route('home', ['categoria' => 'fruta', 'busca' => request('busca')]) }}"
           class="filter-btn {{ request('categoria') === 'fruta' ? 'active' : '' }}">
            <i class="fas fa-apple-alt"></i> Frutas
        </a>

        <a href="{{ route('home', ['categoria' => 'legume', 'busca' => request('busca')]) }}"
           class="filter-btn {{ request('categoria') === 'legume' ? 'active' : '' }}">
            <i class="fas fa-carrot"></i> Legumes
        </a>
    </div>
</div>

<!-- Grid de Cards -->
<div class="catalog-grid" id="catalogGrid">
    @forelse ($plantas as $planta)
        <!-- Início do Card -->
        <div class="plant-card filter-item {{ $planta->categoria }}">

            <!-- Imagem (Ícone ou foto) -->
            <div class="card-img-top" style="
                @if(!$planta->imagem)
                    color:
                    @if($planta->categoria === 'fruta') #e74c3c;
                    @elseif($planta->categoria === 'legume') #f1c40f;
                    @else #2ecc71;
                    @endif
                @endif
            ">
                @if($planta->imagem)
                    <img src="{{ asset('storage/' . $planta->imagem) }}" alt="{{ $planta->nome }}" class="plant-cover-img">
                @else
                    @if($planta->categoria === 'fruta')
                        <i class="fas fa-apple-alt"></i>
                    @elseif($planta->categoria === 'legume')
                        <i class="fas fa-carrot"></i>
                    @else
                        <i class="fas fa-leaf"></i>
                    @endif
                @endif
            </div>

            <!-- Corpo do Card -->
            <div class="card-body">
                <span class="card-category">{{ ucfirst($planta->categoria) }}</span>
                <h3 class="card-title">{{ $planta->nome }}</h3>

                <div class="card-stats">
                    <div class="stat-item">
                        <i class="far fa-clock"></i>
                        <strong>{{ $planta->tempo_plantio_dias }} dias</strong>
                    </div>
                    <div class="stat-item">
                        <i class="fas fa-arrows-alt-h"></i>
                        <strong>{{ $planta->distancia_entre_plantas_cm }}cm</strong>
                    </div>
                    <div class="stat-item">
                        <i class="fas fa-cloud-sun"></i>
                        <strong>{{ $planta->clima }}</strong>
                    </div>
                </div>

                <div class="card-actions">
                    <a href="{{ route('vegetais.show', $planta) }}" class="btn-view">Ver Guia</a>

                    @auth
                        <form action="{{ route('vegetais.favorite', $planta) }}" method="POST">
                            @csrf
                            <button type="submit"
                                    class="btn-fav"
                                    style="{{ $planta->usersQueFavoritaram->contains(Auth::id()) ? 'background: #ff6b6b; color: white;' : '' }}">
                                <i class="{{ $planta->usersQueFavoritaram->contains(Auth::id()) ? 'fas' : 'far' }} fa-heart"></i>
                            </button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="btn-fav" title="Faça login para favoritar">
                            <i class="far fa-heart"></i>
                        </a>
                    @endauth
                </div>
            </div>
        </div>
        <!-- Fim do Card -->
    @empty
        <div style="grid-column: 1 / -1; text-align: center; padding: 3rem;">
            <p class="text-muted">Nenhuma planta cadastrada ainda.</p>
            <a href="{{ route('vegetais.create') }}" class="btn btn-primary mt-3">Cadastre a primeira!</a>
        </div>
    @endforelse
</div>

<div class="pagination-wrapper">
    <div class="container">
        <div class="pagination-container">
            {{ $plantas->appends(request()->query())->links() }}
        </div>
    </div>
</div>
@endsection

@section('extra_js')
{{-- Não precisa mais de JS para filtro de categoria/busca, tudo é feito no back-end --}}
@endsection
