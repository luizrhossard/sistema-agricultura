@extends('layouts.app')

@section('title', 'Novo Vegetal')

@section('content')
<div class="form-container">
    
    <div class="form-header">
        <h1><i class="fas fa-seedling"></i> Novo Cadastro</h1>
        <p>Adicione uma nova planta ao seu catálogo.</p>
    </div>

    @if($errors->any())
        <div class="alert alert-error">
            <i class="fas fa-exclamation-circle"></i>
            <div>
                <strong>Ops! Verifique os erros abaixo:</strong>
                <ul style="margin-top: 0.5rem; list-style: inside;">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif

    <form action="{{ route('vegetais.store') }}" method="POST" class="styled-form" enctype="multipart/form-data">
        @csrf

        <!-- Linha 1: Nome e Categoria -->
        <div class="form-row">
            <div class="form-group">
                <label for="nome">Nome da Planta *</label>
                <div class="input-wrapper">
                    <i class="fas fa-tag"></i>
                    <input type="text" id="nome" name="nome" placeholder="Ex: Alface Americana" value="{{ old('nome') }}" required>
                </div>
            </div>

            <div class="form-group">
                <label for="categoria">Categoria *</label>
                <div class="input-wrapper">
                    <i class="fas fa-shapes"></i>
                    <select id="categoria" name="categoria" required>
                        <option value="" disabled selected>Selecione...</option>
                        <option value="vegetal" {{ old('categoria') === 'vegetal' ? 'selected' : '' }}>🥬 Vegetal</option>
                        <option value="fruta" {{ old('categoria') === 'fruta' ? 'selected' : '' }}>🍎 Fruta</option>
                        <option value="legume" {{ old('categoria') === 'legume' ? 'selected' : '' }}>🌽 Legume</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- CAMPO DE IMAGEM NOVO -->
        <div class="form-group" style="margin-bottom: 1.5rem;">
            <label for="imagem" style="display: block; font-weight: 600; margin-bottom: 0.5rem;">Foto de Capa (Opcional)</label>
            <div class="input-wrapper" style="position: relative;">
                <i class="fas fa-camera" style="position: absolute; left: 1rem; top: 12px; color: #999;"></i>
                <input type="file" id="imagem" name="imagem" accept="image/*" style="padding-left: 2.8rem; padding-top: 0.6rem;">
            </div>
            <small style="color: #666; font-size: 0.8rem; margin-top: 4px; display: block;">Recomendado: Imagem quadrada ou retangular (JPG/PNG)</small>
        </div>

        <!-- Linha 2: Clima e Dias -->
        <div class="form-row">
            <div class="form-group">
                <label for="clima">Clima Ideal *</label>
                <div class="input-wrapper">
                    <i class="fas fa-cloud-sun"></i>
                    <select id="clima" name="clima" required>
                        <option value="" disabled selected>Selecione...</option>
                        <option value="Tropical" {{ old('clima') === 'Tropical' ? 'selected' : '' }}>Tropical (Quente/Úmido)</option>
                        <option value="Subtropical" {{ old('clima') === 'Subtropical' ? 'selected' : '' }}>Subtropical (Ameno)</option>
                        <option value="Temperado" {{ old('clima') === 'Temperado' ? 'selected' : '' }}>Temperado (Frio/Moderado)</option>
                        <option value="Seco" {{ old('clima') === 'Seco' ? 'selected' : '' }}>Seco (Árido)</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="tempo_plantio_dias">Tempo de Colheita (Dias) *</label>
                <div class="input-wrapper">
                    <i class="fas fa-calendar-alt"></i>
                    <input type="number" id="tempo_plantio_dias" name="tempo_plantio_dias" placeholder="Ex: 60" min="1" value="{{ old('tempo_plantio_dias') }}" required>
                </div>
            </div>
        </div>

        <!-- Linha 3: Medidas Técnicas -->
        <div class="form-row">
            <div class="form-group">
                <label for="profundidade_plantio_cm">Profundidade (cm) *</label>
                <div class="input-wrapper">
                    <i class="fas fa-arrow-down"></i>
                    <input type="number" id="profundidade_plantio_cm" name="profundidade_plantio_cm" step="0.1" placeholder="Ex: 2.5" min="0.1" value="{{ old('profundidade_plantio_cm') }}" required>
                </div>
            </div>

            <div class="form-group">
                <label for="distancia_entre_plantas_cm">Espaçamento (cm) *</label>
                <div class="input-wrapper">
                    <i class="fas fa-arrows-alt-h"></i>
                    <input type="number" id="distancia_entre_plantas_cm" name="distancia_entre_plantas_cm" step="0.1" placeholder="Ex: 30" min="0.1" value="{{ old('distancia_entre_plantas_cm') }}" required>
                </div>
            </div>
            
             <div class="form-group">
                <label for="umidade_solo_percentual">Umidade Solo (%) *</label>
                <div class="input-wrapper">
                    <i class="fas fa-tint"></i>
                    <input type="number" id="umidade_solo_percentual" name="umidade_solo_percentual" step="1" placeholder="Ex: 60" min="0" max="100" value="{{ old('umidade_solo_percentual') }}" required>
                </div>
            </div>
        </div>

        <!-- Descrição -->
        <div class="form-group">
            <label for="descricao">Descrição / Dicas</label>
            <div class="input-wrapper">
                <textarea id="descricao" name="descricao" rows="4" placeholder="Escreva dicas de cultivo...">{{ old('descricao') }}</textarea>
            </div>
        </div>

        <!-- Botões -->
        <div class="form-actions">
            <a href="{{ route('home') }}" class="btn-cancel">Cancelar</a>
            <button type="submit" class="btn-submit">
                <i class="fas fa-check"></i> Salvar Cadastro
            </button>
        </div>
    </form>
</div>
@endsection
