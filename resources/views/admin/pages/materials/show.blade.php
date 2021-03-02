@extends('adminlte::page')

@section('title', "Detalhes do Parceiro {$material->name}")

@section('content_header')
    <h1>Detalhes do Parceiro <b>{{ $material->name }}</b></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong>Nome: </strong> {{ $material->name }}
                </li>
                <li>
                    <strong>Pontos por peso (kilos): </strong> {{ $material->volume }}
                </li>
                <li>
                    <strong>Valor do ponto: </strong> R$ {{ number_format($material->point, 2, ',', '.') }}
                </li>
                <li>
                    <strong>Validade do ponto: </strong> {{ $material->shelf_life }}
                </li>
                
            </ul>

            @include('admin.includes.alerts')

            <form action="{{ route('materials.destroy', $material->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Excluir</button>
            </form>
        </div>
    </div>
@endsection
