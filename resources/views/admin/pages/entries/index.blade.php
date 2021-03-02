@extends('adminlte::page')

@section('title', 'Entrada')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('entries.index') }}" class="active">Entradas</a></li>
    </ol>

    <h1>Entradas <a href="{{ route('entries.create') }}" class="btn btn-success"><i class="fas fa-plus"></i> Novo</a></h1>
@stop

@section('content')
@include('admin.includes.alerts')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('entries.search') }}" method="POST" class="form form-inline">
                @csrf
                <input type="text" name="filter" placeholder="Filtrar:" class="form-control" value="{{ $filters['filter'] ?? '' }}">
                <button type="submit" class="btn btn-dark">Filtrar</button>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Data</th>
                        <th>Cliente</th>
                        <th>Material</th>
                        <th>Quantidade (kilos)</th>
                        <th>Total de pontos</th>
                        <th>Total a receber</th>
                        <th width="170">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($entries as $entry)
                        <tr>
                            <td>{{ date('d/m/Y', strtotime($entry->created_at))}}</td>
                            <td>{{ $entry->client->name }}</td>
                            <td>{{ $entry->material->name }}</td>
                            <td>{{ $entry->qntd}}</td>
                            <td>{{ $entry->total_points}}</td>
                            <td>R$ {{ number_format($entry->total_receive, 2, ',', '.') }}</td>
                            <td style="width=10px;">
                                <a href="{{ route('entries.edit', $entry->id) }}" class="btn btn-info"><i class="far fa-edit"></i> Editar</a>
                                <a href="{{ route('entries.show', $entry->id) }}" class="btn btn-warning"><i class="fas fa-entry"></i> Ver</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
                {!! $entries->appends($filters)->links() !!}
            @else
                {!! $entries->links() !!}
            @endif
        </div>
    </div>
@stop