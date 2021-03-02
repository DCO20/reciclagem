@extends('adminlte::page')

@section('title', "Detalhes da Empresa {$company->name}")

@section('content_header')
    <h1>Detalhes da Empresa <b>{{ $company->name }}</b></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong>Nome: </strong> {{ $company->name }}
                </li>
                <li>
                    <strong>Responsável: </strong> {{ $company->responsible }}
                </li>
                <li>
                    <strong>Email: </strong> {{ $company->email }}
                </li>
                <li>
                    <strong>CEP: </strong> {{ $company->zipcode }}
                </li>
                <li>
                    <strong>Rua: </strong> {{ $company->street }}
                </li>
                <li>
                    <strong>Número: </strong> {{ $company->number }}
                </li>
                <li>
                    <strong>Complemento: </strong> {{ $company->complement }}
                </li>
                <li>
                    <strong>Bairro: </strong> {{ $company->neighborhood }}
                </li>
                <li>
                    <strong>Cidade: </strong> {{ $company->city }}
                </li>
                <li>
                    <strong>Contato: </strong> {{ $company->cell }}
                </li>
                <li>
                    <strong>Valor: </strong> R$ {{ number_format($company->valor, 2, ',', '.') }}
                </li>
                <li>
                    <strong>Limite: </strong> {{ $company->limit }}
                </li>
            </ul>

            @include('admin.includes.alerts')

            <form action="{{ route('companies.destroy', $company->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Excluir</button>
            </form>
        </div>
    </div>
@endsection
