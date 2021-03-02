@extends('adminlte::page')

@section('title', "Detalhes do Cliente {$client->name}")

@section('content_header')
    <h1>Detalhes do Cliente <b>{{ $client->name }}</b></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong>Nome: </strong> {{ $client->name }}
                </li>
                <li>
                    <strong>Email: </strong> {{ $client->email }}
                </li>
                <li>
                    <strong>CEP: </strong> {{ $client->zipcode }}
                </li>
                <li>
                    <strong>Rua: </strong> {{ $client->street }}
                </li>
                <li>
                    <strong>Número: </strong> {{ $client->number }}
                </li>
                <li>
                    <strong>Complemento: </strong> {{ $client->complement }}
                </li>
                <li>
                    <strong>Bairro: </strong> {{ $client->neighborhood }}
                </li>
                <li>
                    <strong>Cidade: </strong> {{ $client->city }}
                </li>
                <li>
                    <strong>Contato: </strong> {{ $client->cell }}
                </li>
            </ul>

            @include('admin.includes.alerts')

            <form action="{{ route('clients.destroy', $client->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Excluir</button>
            </form>
        </div>
    </div>
@endsection
