@extends('adminlte::page')

@section('title', 'Empresa')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('companies.index') }}" class="active">Empresa</a></li>
    </ol>

    <h1>Empresa <a href="{{ route('companies.create') }}" class="btn btn-success"><i class="fas fa-plus"></i> Novo</a></h1>
@stop

@section('content')
@include('admin.includes.alerts')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('companies.search') }}" method="POST" class="form form-inline">
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
                        <th>Responsável</th>
                        <th>E-mail</th>
                        <th>Cidade</th>
                        <th>Estado</th>
                        <th>Contato</th>
                        <th>Valor</th>
                        <th>Limite</th>
                        <th width="170">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($companies as $company)
                        <tr>
                            <td>{{ $company->name }}</td>
                            <td>{{ $company->responsible }}</td>
                            <td>{{ $company->email }}</td>
                            <td>{{ $company->city }}</td>
                            <td>{{ $company->state }}</td>
                            <td>{{ $company->cell }}</td>
                            <td>R$ {{ number_format($company->valor, 2, ',', '.') }}</td>
                            <td>{{ $company->limit }}</td>
                            <td style="width=10px;">
                                <a href="{{ route('companies.edit', $company->id) }}" class="btn btn-info"><i class="far fa-edit"></i> Editar</a>
                                <a href="{{ route('companies.show', $company->id) }}" class="btn btn-warning"><i class="fas fa-company"></i> Ver</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
                {!! $companies->appends($filters)->links() !!}
            @else
                {!! $companies->links() !!}
            @endif
        </div>
    </div>
@stop