@extends('adminlte::page')

@section('title', 'Cadastrar Novo Material')

@section('content_header')
    <h1>Cadastrar Novo Material</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('materials.store') }}" class="form" method="POST">
                @csrf

                @include('admin.pages.materials._partials.form')
            </form>
        </div>
    </div>
@endsection
