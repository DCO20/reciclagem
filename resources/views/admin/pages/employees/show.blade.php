@extends('adminlte::page')

@section('title', "Detalhes do Funcionário {$employee->name}")

@section('content_header')
    <h1>Detalhes do Funcionário <b>{{ $employee->name }}</b></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong>Nome: </strong> {{ $employee->name }}
                </li>
                <li>
                    <strong>Email: </strong> {{ $employee->email }}
                </li>
                <li>
                    <strong>CEP: </strong> {{ $employee->zipcode }}
                </li>
                <li>
                    <strong>Rua: </strong> {{ $employee->street }}
                </li>
                <li>
                    <strong>Número: </strong> {{ $employee->number }}
                </li>
                <li>
                    <strong>Complemento: </strong> {{ $employee->complement }}
                </li>
                <li>
                    <strong>Bairro: </strong> {{ $employee->neighborhood }}
                </li>
                <li>
                    <strong>Cidade: </strong> {{ $employee->city }}
                </li>
                <li>
                    <strong>Contato: </strong> {{ $employee->cell }}
                </li>
            </ul>

            @include('admin.includes.alerts')

            <form action="{{ route('employees.destroy', $employee->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Excluir</button>
            </form>
        </div>
    </div>
@endsection
