@extends('adminlte::page')

@section('title', "Editar o cliente {$client->name}")

@section('content_header')
    <h1>Editar o cliente {{ $client->name }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('clients.update', $client->id) }}" class="form" method="POST">
                @csrf
                @method('PUT')

                @include('admin.pages.clients._partials.form')
            </form>
        </div>
    </div>
@endsection
