@extends('layouts.app')

@section('title', $vegetal->nome)

@section('content')
<div class="guide-container">
    
    <!-- Botão Voltar -->
    <a href="{{ route('home') }}" class="btn-back">
        <i class="fas fa-arrow-left"></i> Voltar ao Catálogo
    </a>

    <!-- Cabeçalho com Imagem e Título -->
    <div class="guide-header">
        <div class="header-content">
            <span class="category-tag {{ $vegetal->categoria }}">
                @if($vegetal->categoria == 'fruta') 🍎
                @elseif($vegetal->categoria == 'legume') 🥕
                @else 🥬 @endif
                {{ ucfirst($vegetal->categoria) }}
            </span>
            <h1>{{ $vegetal->nome }}</h1>
            <p class="subtitle">Guia completo de cultivo</p>
        </div>
        
        <div class="header-image">
            @if($vegetal->imagem)
                <img src="{{ asset('storage/' . $vegetal->imagem) }}" alt="{{ $vegetal->nome }}">
            @else
                <div class="placeholder-icon">
                    <i class="fas fa-seedling"></i>
                </div>
            @endif
        </div>
    </div>

    <!-- Grid de Informações Técnicas -->
    <div class="info-grid">
        <div class="info-card">
            <i class="fas fa-cloud-sun"></i>
            <h3>Clima Ideal</h3>
            <p>{{ $vegetal->clima }}</p>
        </div>
        <div class="info-card">
            <i class="fas fa-calendar-alt"></i>
            <h3>Tempo de Colheita</h3>
            <p>{{ $vegetal->tempo_plantio_dias }} Dias</p>
        </div>
        <div class="info-card">
            <i class="fas fa-ruler-vertical"></i>
            <h3>Profundidade</h3>
            <p>{{ $vegetal->profundidade_plantio_cm }} cm</p>
        </div>
        <div class="info-card">
            <i class="fas fa-arrows-alt-h"></i>
            <h3>Espaçamento</h3>
            <p>{{ $vegetal->distancia_entre_plantas_cm }} cm</p>
        </div>
        <div class="info-card">
            <i class="fas fa-tint"></i>
            <h3>Umidade Solo</h3>
            <p>{{ $vegetal->umidade_solo_percentual }}%</p>
        </div>
    </div>

    <!-- Seção de Descrição -->
    <div class="description-section">
        <h2><i class="fas fa-book-open"></i> Dicas e Instruções</h2>
        <div class="text-content">
            {{ $vegetal->descricao ?? 'Nenhuma descrição detalhada disponível para este cultivo.' }}
        </div>
    </div>

    <!-- Ações de Admin (Só aparece se logado) -->
    @auth
    <div class="admin-actions">
        <a href="{{ route('vegetais.edit', $vegetal) }}" class="btn-edit">
            <i class="fas fa-edit"></i> Editar Informações
        </a>
        
        <form action="{{ route('vegetais.destroy', $vegetal) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn-delete">
                <i class="fas fa-trash"></i> Excluir
            </button>
        </form>
    </div>
    @endauth

</div>
@endsection

@section('extra_css')
<style>
    /* Layout Geral */
    .guide-container {
        max-width: 1000px;
        margin: 2rem auto;
        padding-bottom: 4rem;
    }

    .btn-back {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        color: var(--text-light);
        font-weight: 600;
        margin-bottom: 2rem;
        transition: 0.3s;
    }
    .btn-back:hover { color: var(--primary); transform: translateX(-5px); }

    /* Cabeçalho */
    .guide-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        background: white;
        padding: 2.5rem;
        border-radius: 20px;
        box-shadow: var(--shadow);
        margin-bottom: 2rem;
        position: relative;
        overflow: hidden;
    }

    .header-content h1 {
        font-size: 2.5rem;
        color: var(--primary-dark);
        margin: 0.5rem 0;
    }

    .category-tag {
        display: inline-block;
        padding: 5px 12px;
        border-radius: 20px;
        font-size: 0.85rem;
        font-weight: bold;
        text-transform: uppercase;
        background: #f0f2f5;
        color: var(--text-light);
    }
    /* Cores das Tags */
    .category-tag.fruta { background: #ffeaa7; color: #d35400; }
    .category-tag.legume { background: #d1c4e9; color: #512da8; }

    .header-image {
        width: 150px;
        height: 150px;
        border-radius: 50%;
        overflow: hidden;
        border: 4px solid white;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        background: #e8f5e9;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .header-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .placeholder-icon {
        font-size: 4rem;
        color: var(--primary);
    }

    /* Grid de Informações */
    .info-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(160px, 1fr));
        gap: 1.5rem;
        margin-bottom: 2rem;
    }

    .info-card {
        background: white;
        padding: 1.5rem;
        border-radius: 15px;
        text-align: center;
        box-shadow: 0 4px 10px rgba(0,0,0,0.03);
        border: 1px solid #f0f0f0;
        transition: 0.3s;
    }
    .info-card:hover { transform: translateY(-5px); border-color: var(--primary); }

    .info-card i {
        font-size: 2rem;
        color: var(--earth);
        margin-bottom: 0.8rem;
        display: block;
    }

    .info-card h3 {
        font-size: 0.9rem;
        color: var(--text-light);
        margin-bottom: 0.3rem;
        font-family: 'Lato', sans-serif;
    }

    .info-card p {
        font-size: 1.1rem;
        font-weight: bold;
        color: var(--text-main);
    }

    /* Descrição */
    .description-section {
        background: white;
        padding: 2.5rem;
        border-radius: 20px;
        box-shadow: var(--shadow);
        line-height: 1.8;
    }
    .description-section h2 {
        font-size: 1.5rem;
        margin-bottom: 1.5rem;
        color: var(--primary-dark);
        display: flex;
        align-items: center;
        gap: 10px;
        border-bottom: 2px solid #f0f0f0;
        padding-bottom: 1rem;
    }

    /* Ações */
    .admin-actions {
        margin-top: 3rem;
        display: flex;
        gap: 1rem;
        justify-content: flex-end;
        padding-top: 1rem;
        border-top: 1px solid #eee;
    }

    .btn-edit, .btn-delete {
        padding: 10px 20px;
        border-radius: 8px;
        font-weight: bold;
        text-decoration: none;
        display: flex;
        align-items: center;
        gap: 8px;
        border: none;
        cursor: pointer;
        transition: 0.2s;
    }
    .btn-edit { background: #ffeaa7; color: #d35400; }
    .btn-edit:hover { background: #ffd700; }
    
    .btn-delete { background: #ff7675; color: white; }
    .btn-delete:hover { background: #d63031; }

    /* Responsivo */
    @media (max-width: 768px) {
        .guide-header { flex-direction: column; text-align: center; gap: 1.5rem; }
        .admin-actions { justify-content: center; }
    }
</style>
@endsection
