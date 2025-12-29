@extends('layouts.app')

@section('title', $vegetal->nome)

@section('content')
<div class="guide-container">
    
    <!-- Botão Voltar Flutuante -->
    <a href="{{ route('home') }}" class="btn-back">
        <i class="fas fa-arrow-left"></i> Voltar
    </a>

    <div class="guide-grid">
        
        <!-- Coluna Esquerda: Capa e Resumo -->
        <div class="guide-sidebar">
            <div class="plant-cover">
                <!-- Ícone grande representando a planta -->
                <i class="fas fa-leaf plant-icon"></i> 
            </div>
            
            <h1 class="plant-title">{{ $vegetal->nome }}</h1>
            <span class="plant-category">{{ $vegetal->clima }}</span>

            <div class="quick-stats">
                <div class="quick-stat-item">
                    <i class="fas fa-calendar-alt"></i>
                    <span>Colheita</span>
                    <strong>{{ $vegetal->tempo_plantio_dias }} Dias</strong>
                </div>
                <div class="quick-stat-item">
                    <i class="fas fa-ruler-vertical"></i>
                    <span>Profundidade</span>
                    <strong>{{ $vegetal->profundidade_plantio_cm }} cm</strong>
                </div>
                <div class="quick-stat-item">
                    <i class="fas fa-arrows-alt-h"></i>
                    <span>Espaçamento</span>
                    <strong>{{ $vegetal->distancia_entre_plantas_cm }} cm</strong>
                </div>
            </div>

            <button class="btn-favorite-large">
                <i class="far fa-heart"></i> Adicionar aos Favoritos
            </button>
        </div>

        <!-- Coluna Direita: O Guia Completo -->
        <div class="guide-content">
            
            <!-- Seção Sobre -->
            <div class="guide-section">
                <h2><i class="fas fa-info-circle"></i> Sobre</h2>
                <p class="guide-text">
                    {{ $vegetal->descricao ?? 'Este vegetal é excelente para sua horta. Siga as instruções abaixo para garantir uma colheita saudável e abundante.' }}
                </p>
            </div>

            <!-- Seção Necessidades -->
            <div class="guide-section">
                <h2><i class="fas fa-sun"></i> Necessidades</h2>
                <div class="needs-grid">
                    <div class="need-card">
                        <i class="fas fa-sun" style="color: #f1c40f;"></i>
                        <h4>Luz Solar</h4>
                        <p>Sol Pleno (6h+)</p>
                    </div>
                    <div class="need-card">
                        <i class="fas fa-tint" style="color: #3498db;"></i>
                        <h4>Rega</h4>
                        <p>Regular (Manter úmido)</p>
                    </div>
                    <div class="need-card">
                        <i class="fas fa-wind" style="color: #95a5a6;"></i>
                        <h4>Clima Ideal</h4>
                        <p>{{ $vegetal->clima }}</p>
                    </div>
                    <div class="need-card">
                        <i class="fas fa-water" style="color: #2ecc71;"></i>
                        <h4>Umidade Solo</h4>
                        <p>{{ $vegetal->umidade_solo_percentual }}%</p>
                    </div>
                </div>
            </div>

            <!-- Seção Dicas de Plantio (Placeholder bonito) -->
            <div class="guide-section">
                <h2><i class="fas fa-seedling"></i> Dicas de Cultivo</h2>
                <ul class="tips-list">
                    <li>🌱 <strong>Preparação:</strong> Certifique-se de que o solo esteja bem drenado e rico em matéria orgânica.</li>
                    <li>💧 <strong>Rega:</strong> Regue pela manhã ou final da tarde para evitar evaporação rápida.</li>
                    <li>✂️ <strong>Poda:</strong> Remova folhas secas ou doentes para manter a planta saudável.</li>
                </ul>
            </div>

        </div>
    </div>
</div>
@endsection
