@extends('adminlte::page')

@section('title', "Editar A Companhia {$company->name}")

@section('content_header')
    <h1>Editar A Companhia {{ $company->name }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('companies.update', $company->id) }}" class="form" method="POST">
                @csrf
                @method('PUT')

                @include('admin.pages.companies._partials.form')
            </form>
        </div>
    </div>
@endsection
