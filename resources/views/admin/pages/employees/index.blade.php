@extends('adminlte::page')

@section('title', 'employeees')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('employees.index') }}" class="active">Funcionários</a></li>
    </ol>

    <h1>Funcionários <a href="{{ route('employees.create') }}" class="btn btn-success"><i class="fas fa-plus"></i> Novo</a></h1>
@stop

@section('content')
@include('admin.includes.alerts')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('employees.search') }}" method="POST" class="form form-inline">
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
                    @foreach ($employees as $employee)
                        <tr>
                            <td>{{ $employee->name }}</td>
                            <td>{{ $employee->email }}</td>
                            <td>{{ $employee->city }}</td>
                            <td>{{ $employee->state }}</td>
                            <td>{{ $employee->cell }}</td>
                            <td style="width=10px;">
                                <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-info"><i class="far fa-edit"></i> Editar</a>
                                <a href="{{ route('employees.show', $employee->id) }}" class="btn btn-warning"><i class="fas fa-employee"></i> Ver</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
                {!! $employees->appends($filters)->links() !!}
            @else
                {!! $employees->links() !!}
            @endif
        </div>
    </div>
@stop