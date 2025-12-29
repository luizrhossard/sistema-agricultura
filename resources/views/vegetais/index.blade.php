@extends('layouts.app')

@section('title', 'Gerenciar Plantas')

@section('content')
<div class="admin-container">
    
    <div class="admin-header">
        <div>
            <h1><i class="fas fa-list"></i> Gerenciar Plantas</h1>
            <p>Lista completa de todos os itens cadastrados.</p>
        </div>
        <a href="{{ route('vegetais.create') }}" class="btn-add-new">
            <i class="fas fa-plus"></i> Nova Planta
        </a>
    </div>

    <div class="table-responsive">
        <table class="styled-table">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Categoria</th>
                    <th>Clima</th>
                    <th>Colheita (Dias)</th>
                    <th style="text-align: center;">Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse($vegetais as $vegetal)
                    <tr>
                        <td style="font-weight: bold; color: #2c3e50;">{{ $vegetal->nome }}</td>
                        <td>
                            <span class="badge-table" style="
                                background: @if($vegetal->categoria == 'fruta') #ffeaa7; color: #d35400;
                                            @elseif($vegetal->categoria == 'legume') #d1c4e9; color: #512da8;
                                            @else #c8e6c9; color: #2e7d32; @endif
                            ">
                                {{ ucfirst($vegetal->categoria) }}
                            </span>
                        </td>
                        <td>{{ $vegetal->clima }}</td>
                        <td>{{ $vegetal->tempo_plantio_dias }} Dias</td>
                        <td class="action-cell">
                            <a href="{{ route('vegetais.show', $vegetal) }}" class="btn-icon view" title="Ver Detalhes">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('vegetais.edit', $vegetal) }}" class="btn-icon edit" title="Editar">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('vegetais.destroy', $vegetal) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-icon delete" title="Deletar" onclick="return confirm('Tem certeza que deseja apagar este item?')">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" style="text-align: center; padding: 2rem;">
                            <p style="color: #95a5a6;">Nenhuma planta encontrada.</p>
                            <a href="{{ route('vegetais.create') }}" style="color: var(--primary); font-weight: bold;">Cadastre a primeira agora!</a>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>
@endsection

@section('extra_css')
<style>
    .admin-container {
        max-width: 1000px;
        margin: 2rem auto;
        background: white;
        padding: 2rem;
        border-radius: 15px;
        box-shadow: var(--shadow);
    }
    .admin-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 2rem;
        padding-bottom: 1rem;
        border-bottom: 1px solid #eee;
    }
    .admin-header h1 {
        font-size: 1.8rem;
        color: var(--text-main);
        margin-bottom: 0.2rem;
    }
    .admin-header p {
        color: var(--text-light);
        font-size: 0.95rem;
    }
    .btn-add-new {
        background: var(--primary);
        color: white;
        padding: 0.8rem 1.5rem;
        border-radius: 10px;
        text-decoration: none;
        font-weight: bold;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        transition: 0.3s;
    }
    .btn-add-new:hover {
        background: var(--primary-dark);
        transform: translateY(-2px);
    }

    /* Tabela Estilizada */
    .styled-table {
        width: 100%;
        border-collapse: collapse;
        font-size: 0.95rem;
    }
    .styled-table thead tr {
        background-color: #f8f9fa;
        color: var(--text-light);
        text-align: left;
    }
    .styled-table th, .styled-table td {
        padding: 1rem 1.2rem;
    }
    .styled-table tbody tr {
        border-bottom: 1px solid #f1f1f1;
        transition: 0.2s;
    }
    .styled-table tbody tr:last-of-type {
        border-bottom: none;
    }
    .styled-table tbody tr:hover {
        background-color: #fafafa;
    }
    
    /* Badges e Ações */
    .badge-table {
        padding: 0.3rem 0.8rem;
        border-radius: 20px;
        font-size: 0.85rem;
        font-weight: 600;
    }
    .action-cell {
        display: flex;
        gap: 0.8rem;
        justify-content: center;
    }
    .btn-icon {
        border: none;
        background: none;
        font-size: 1.1rem;
        cursor: pointer;
        transition: 0.2s;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 35px;
        height: 35px;
        border-radius: 8px;
    }
    .btn-icon.view { background: #e3f2fd; color: #3498db; }
    .btn-icon.edit { background: #fff3cd; color: #f1c40f; }
    .btn-icon.delete { background: #ffebee; color: #e74c3c; }

    .btn-icon:hover { transform: scale(1.1); }
</style>
@endsection
