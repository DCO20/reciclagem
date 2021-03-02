@extends('adminlte::page')

@section('title', 'Clientes')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('clients.index') }}" class="active">Clientes</a></li>
    </ol>

    <h1>Clientes <a href="{{ route('clients.create') }}" class="btn btn-success"><i class="fas fa-plus"></i> Novo</a></h1>
@stop

@section('content')
@include('admin.includes.alerts')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('clients.search') }}" method="POST" class="form form-inline">
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
                        <th>E-mail</th>
                        <th>Cidade</th>
                        <th>Estado</th>
                        <th>Contato</th>
                        <th>Total de Pontos</th>
                        <th width="170">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clients as $client)
                        <tr>
                            <td>{{ $client->name }}</td>
                            <td>{{ $client->email }}</td>
                            <td>{{ $client->city }}</td>
                            <td>{{ $client->state }}</td>
                            <td>{{ $client->cell }}</td>
                            <td style="width=10px;">
                                <a href="{{ route('clients.edit', $client->id) }}" class="btn btn-info"><i class="far fa-edit"></i> Editar</a>
                                <a href="{{ route('clients.show', $client->id) }}" class="btn btn-warning"><i class="fas fa-client"></i> Ver</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
                {!! $clients->appends($filters)->links() !!}
            @else
                {!! $clients->links() !!}
            @endif
        </div>
    </div>
@stop