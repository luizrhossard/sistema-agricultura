@extends('layouts.app')

@section('title', 'Editar ' . $vegetal->nome)

@section('content')
<div class="form-container">
    
    <div class="form-header">
        <h1><i class="fas fa-edit"></i> Editar Planta</h1>
        <p>Atualizando informações de: <strong>{{ $vegetal->nome }}</strong></p>
    </div>

    @if($errors->any())
        <div class="alert alert-error" style="background: #ffebee; color: #c62828; padding: 1rem; border-radius: 8px; margin-bottom: 1.5rem;">
            <strong>Ops! Verifique os erros:</strong>
            <ul style="margin-top: 0.5rem; list-style: inside;">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('vegetais.update', $vegetal) }}" method="POST" class="styled-form" enctype="multipart/form-data">
        @csrf
        @method('PUT') <!-- Importante para Atualização -->

        <!-- Linha 1: Nome e Categoria -->
        <div class="form-row">
            <div class="form-group">
                <label for="nome">Nome da Planta *</label>
                <div class="input-wrapper">
                    <i class="fas fa-tag"></i>
                    <input type="text" id="nome" name="nome" value="{{ old('nome', $vegetal->nome) }}" required>
                </div>
            </div>

            <div class="form-group">
                <label for="categoria">Categoria *</label>
                <div class="input-wrapper">
                    <i class="fas fa-shapes"></i>
                    <select id="categoria" name="categoria" required>
                        <option value="vegetal" {{ old('categoria', $vegetal->categoria) === 'vegetal' ? 'selected' : '' }}>🥬 Vegetal</option>
                        <option value="fruta" {{ old('categoria', $vegetal->categoria) === 'fruta' ? 'selected' : '' }}>🍎 Fruta</option>
                        <option value="legume" {{ old('categoria', $vegetal->categoria) === 'legume' ? 'selected' : '' }}>🌽 Legume</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Imagem Atual e Upload -->
        <div class="form-group">
            <label>Imagem de Capa</label>
            @if($vegetal->imagem)
                <div style="margin-bottom: 10px;">
                    <img src="{{ asset('storage/' . $vegetal->imagem) }}" alt="Atual" style="height: 80px; border-radius: 8px; border: 1px solid #ddd;">
                    <p style="font-size: 0.8rem; color: #666;">Imagem atual (envie outra para trocar)</p>
                </div>
            @endif
            <div class="input-wrapper">
                <i class="fas fa-camera"></i>
                <input type="file" id="imagem" name="imagem" accept="image/*">
            </div>
        </div>

        <!-- Linha 2: Clima e Dias -->
        <div class="form-row">
            <div class="form-group">
                <label for="clima">Clima Ideal *</label>
                <div class="input-wrapper">
                    <i class="fas fa-cloud-sun"></i>
                    <select id="clima" name="clima" required>
                        <option value="Tropical" {{ old('clima', $vegetal->clima) === 'Tropical' ? 'selected' : '' }}>Tropical</option>
                        <option value="Subtropical" {{ old('clima', $vegetal->clima) === 'Subtropical' ? 'selected' : '' }}>Subtropical</option>
                        <option value="Temperado" {{ old('clima', $vegetal->clima) === 'Temperado' ? 'selected' : '' }}>Temperado</option>
                        <option value="Seco" {{ old('clima', $vegetal->clima) === 'Seco' ? 'selected' : '' }}>Seco</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="tempo_plantio_dias">Tempo (Dias) *</label>
                <div class="input-wrapper">
                    <i class="fas fa-calendar-alt"></i>
                    <input type="number" id="tempo_plantio_dias" name="tempo_plantio_dias" value="{{ old('tempo_plantio_dias', $vegetal->tempo_plantio_dias) }}" required>
                </div>
            </div>
        </div>

        <!-- Linha 3: Medidas -->
        <div class="form-row">
            <div class="form-group">
                <label for="profundidade_plantio_cm">Profundidade (cm) *</label>
                <div class="input-wrapper">
                    <i class="fas fa-arrow-down"></i>
                    <input type="number" id="profundidade_plantio_cm" name="profundidade_plantio_cm" step="0.1" value="{{ old('profundidade_plantio_cm', $vegetal->profundidade_plantio_cm) }}" required>
                </div>
            </div>

            <div class="form-group">
                <label for="distancia_entre_plantas_cm">Espaçamento (cm) *</label>
                <div class="input-wrapper">
                    <i class="fas fa-arrows-alt-h"></i>
                    <input type="number" id="distancia_entre_plantas_cm" name="distancia_entre_plantas_cm" step="0.1" value="{{ old('distancia_entre_plantas_cm', $vegetal->distancia_entre_plantas_cm) }}" required>
                </div>
            </div>

            <div class="form-group">
                <label for="umidade_solo_percentual">Umidade (%) *</label>
                <div class="input-wrapper">
                    <i class="fas fa-tint"></i>
                    <input type="number" id="umidade_solo_percentual" name="umidade_solo_percentual" value="{{ old('umidade_solo_percentual', $vegetal->umidade_solo_percentual) }}" required>
                </div>
            </div>
        </div>

        <!-- Descrição -->
        <div class="form-group">
            <label for="descricao">Descrição</label>
            <div class="input-wrapper">
                <textarea id="descricao" name="descricao" rows="4">{{ old('descricao', $vegetal->descricao) }}</textarea>
            </div>
        </div>

        <!-- Botões -->
        <div class="form-actions">
            <a href="{{ route('vegetais.index') }}" class="btn-cancel">Cancelar</a>
            <button type="submit" class="btn-submit">
                <i class="fas fa-save"></i> Atualizar Dados
            </button>
        </div>
    </form>
</div>
@endsection
