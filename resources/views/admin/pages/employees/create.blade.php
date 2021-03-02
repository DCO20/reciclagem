@extends('adminlte::page')

@section('title', 'Cadastrar Novo Funcionário')

@section('content_header')
    <h1>Cadastrar Novo Funcionário</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('employees.store') }}" class="form" method="POST">
                @csrf

                @include('admin.pages.employees._partials.form')
            </form>
        </div>
    </div>
@endsection
