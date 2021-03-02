@extends('adminlte::page')

@section('title', "Editar o Parceiro {$partner->name}")

@section('content_header')
    <h1>Editar o Parceiro {{ $partner->name }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('partners.update', $partner->id) }}" class="form" method="POST">
                @csrf
                @method('PUT')

                @include('admin.pages.partners._partials.form')
            </form>
        </div>
    </div>
@endsection
