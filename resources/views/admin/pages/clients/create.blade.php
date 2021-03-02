@extends('adminlte::page')

@section('title', 'Cadastrar Novo Cliente')

@section('content_header')
    <h1>Cadastrar Novo Cliente</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('clients.store') }}" class="form" method="POST">
                @csrf

                @include('admin.pages.clients._partials.form')
            </form>
        </div>
    </div>
@endsection
