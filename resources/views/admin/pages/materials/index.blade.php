@extends('adminlte::page')

@section('title', 'material')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('materials.index') }}" class="active">Material</a></li>
    </ol>

    <h1>Material <a href="{{ route('materials.create') }}" class="btn btn-success"><i class="fas fa-plus"></i> Novo</a></h1>
@stop

@section('content')
@include('admin.includes.alerts')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('materials.search') }}" method="POST" class="form form-inline">
                @csrf
                <input type="text" name="filter" placeholder="Filtrar:" class="form-control" value="{{ $filters['filter'] ?? '' }}">
                <button type="submit" class="btn btn-dark">Filtrar</button>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Pontos por peso (kilos)</th>
                        <th>Valor do ponto</th>
                        <th>Validade do ponto</th>
                        <th width="170">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($materials as $material)
                        <tr>
                            <td>{{ $material->name }}</td>
                            <td>{{ $material->volume }}</td>
                            <td>R$ {{ number_format($material->point, 2, ',', '.') }}</td>
                            <td>{{ $material->shelf_life }}</td>
                            <td style="width=10px;">
                                <a href="{{ route('materials.edit', $material->id) }}" class="btn btn-info"><i class="far fa-edit"></i> Editar</a>
                                <a href="{{ route('materials.show', $material->id) }}" class="btn btn-warning"><i class="fas fa-material"></i> Ver</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
                {!! $materials->appends($filters)->links() !!}
            @else
                {!! $materials->links() !!}
            @endif
        </div>
    </div>
@stop