@extends('adminlte::page')

@section('title', 'partneres')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('partners.index') }}" class="active">Parceiros</a></li>
    </ol>

    <h1>Parceiros <a href="{{ route('partners.create') }}" class="btn btn-success"><i class="fas fa-plus"></i> Novo</a></h1>
@stop

@section('content')
@include('admin.includes.alerts')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('partners.search') }}" method="POST" class="form form-inline">
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
                        <th width="170">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($partners as $partner)
                        <tr>
                            <td>{{ $partner->name }}</td>
                            <td>{{ $partner->email }}</td>
                            <td>{{ $partner->city }}</td>
                            <td>{{ $partner->state }}</td>
                            <td>{{ $partner->cell }}</td>
                            <td style="width=10px;">
                                <a href="{{ route('partners.edit', $partner->id) }}" class="btn btn-info"><i class="far fa-edit"></i> Editar</a>
                                <a href="{{ route('partners.show', $partner->id) }}" class="btn btn-warning"><i class="fas fa-partner"></i> Ver</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
                {!! $partners->appends($filters)->links() !!}
            @else
                {!! $partners->links() !!}
            @endif
        </div>
    </div>
@stop