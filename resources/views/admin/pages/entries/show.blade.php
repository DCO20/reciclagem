@extends('adminlte::page')

@section('title', "Detalhes da Empresa {$entry->name}")

@section('content_header')
    <h1>Detalhes da Empresa <b></b></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong>Data: </strong> {{ date('d/m/Y', strtotime($entry->created_at))}}
                </li>
                <li>
                    <strong>Nome do cliente: </strong> {{  $entry->client->name }}
                </li>
                <li>
                    <strong>Nome do material: </strong> {{ $entry->material->name }}
                </li>
                <li>
                    <strong>Quantidade (kilos): </strong> {{ $entry->qntd }}
                </li>
                <li>
                    <strong>Total de pontos: </strong> {{ $entry->total_points }}
                </li>
                <li>
                    <strong>Total a receber: </strong> R$ {{ number_format($entry->total_receive, 2, ',', '.') }}
                </li>
            </ul>

            @include('admin.includes.alerts')

            <form action="{{ route('entries.destroy', $entry->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Excluir</button>
            </form>
        </div>
    </div>
@endsection
