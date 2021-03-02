@extends('adminlte::page')

@section('title', "Editar o Funcionário {$employee->name}")

@section('content_header')
    <h1>Editar o Funcionário {{ $employee->name }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('employees.update', $employee->id) }}" class="form" method="POST">
                @csrf
                @method('PUT')

                @include('admin.pages.employees._partials.form')
            </form>
        </div>
    </div>
@endsection
