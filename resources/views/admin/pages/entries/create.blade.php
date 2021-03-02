@extends('adminlte::page')

@section('title', 'Cadastrar Nova Entrada')

@section('content_header')
    <h1>Cadastrar Nova Entrada</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'entries.store']) !!}
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>Cliente:</label>
                    {!! Form::select('client_id', $clients, 0, ['class' => 'custom-select']) !!}
                </div>
                <div class="form-group">
                    <label>Material:</label>
                    {!! Form::select('material_id', $materials, 0, ['class' => 'custom-select']) !!}
                </div>
                <div class="form-group">
                    <label>Quantidade:</label>
                    <input type="text" name="qntd" class="form-control" placeholder="Quantidade (peso):">
                </div>
                <div class="form-group">
                    <label>Total de pontos:</label>
                    <input type="text" name="total_points" class="form-control" placeholder="Total de pontos:">
                </div>
                <div class="form-group">
                    <label>Total a receber:</label>
                    <input type="text" name="total_receive" class="form-control" placeholder="Total a receber:">
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
