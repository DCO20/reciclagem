@extends('adminlte::page')

@section('title', "Detalhes do Parceiro {$partner->name}")

@section('content_header')
    <h1>Detalhes do Parceiro <b>{{ $partner->name }}</b></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong>Nome: </strong> {{ $partner->name }}
                </li>
                <li>
                    <strong>Email: </strong> {{ $partner->email }}
                </li>
                <li>
                    <strong>CEP: </strong> {{ $partner->zipcode }}
                </li>
                <li>
                    <strong>Rua: </strong> {{ $partner->street }}
                </li>
                <li>
                    <strong>Número: </strong> {{ $partner->number }}
                </li>
                <li>
                    <strong>Complemento: </strong> {{ $partner->complement }}
                </li>
                <li>
                    <strong>Bairro: </strong> {{ $partner->neighborhood }}
                </li>
                <li>
                    <strong>Cidade: </strong> {{ $partner->city }}
                </li>
                <li>
                    <strong>Contato: </strong> {{ $partner->cell }}
                </li>
            </ul>

            @include('admin.includes.alerts')

            <form action="{{ route('partners.destroy', $partner->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Excluir</button>
            </form>
        </div>
    </div>
@endsection
