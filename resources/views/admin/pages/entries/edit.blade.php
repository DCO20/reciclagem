@extends('adminlte::page')

@section('title', "Editar a Entrada")

@section('content_header')
    <h1>Editar a Entrada </h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => ['entries.update', $entry->id], 'method' => 'PATCH']) !!}
            @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>Cliente:</label>
                    {!! Form::select('clients_id', $clients, $entry->clients_id, ['class' => 'custom-select']) !!}
                </div>
                <div class="form-group">
                    <label>Material:</label>
                    {!! Form::select('material_id', $materials, $entry->material_id, ['class' => 'custom-select']) !!}
                </div>
                <div class="form-group">
                    <label>Quantidade:</label>
                    {!! Form::text('qntd', $entry->qntd, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    <label>Total de pontos:</label>
                    {!! Form::text('total_points', $entry->total_points, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    <label>Total a receber:</label>
                    {!! Form::text('total_receive', $entry->total_receive, ['class' => 'form-control']) !!}
                </div>
                <div class="row mtop16">
                    <div class="col-md-12">
                    {!! Form::submit('Enviar', [ 'class' => 'btn btn-success']) !!}
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
            </div>
    </div>
@endsection
