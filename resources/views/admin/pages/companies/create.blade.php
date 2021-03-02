@extends('adminlte::page')

@section('title', 'Cadastrar Nova Empresa')

@section('content_header')
    <h1>Cadastrar Nova Empresa</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('companies.store') }}" class="form" method="POST">
                @csrf

                @include('admin.pages.companies._partials.form')
            </form>
        </div>
    </div>
@endsection
