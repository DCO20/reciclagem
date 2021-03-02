@extends('adminlte::page')

@section('title', 'Cadastrar Novo Parceiro')

@section('content_header')
    <h1>Cadastrar Novo Parceiro</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('partners.store') }}" class="form" method="POST">
                @csrf

                @include('admin.pages.partners._partials.form')
            </form>
        </div>
    </div>
@endsection
