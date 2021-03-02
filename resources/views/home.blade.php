<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="shortcut icon" href="{{url('assets/img/favicon.ico')}}" type="image/x-icon">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ url(mix('assets/css/auth.css')) }}">

    <script src="https://kit.fontawesome.com/b0d8aefb17.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    
    <title>Reciclagem - @yield( 'title')</title>
</head>
<body>
    
    <div class="box box_login shadow">
        <div class="header">
            <a href="{{ url('/')}}">
                <img src="{{url('assets/img/logo.png')}}" alt="Reciclagem">
            </a>
        </div>
        <div class="inside">
        {!! Form::open(['route' => 'login']) !!}
        <label for="email">Email:</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text"><i class="far fa-envelope-open" aria-hidden="true"></i></div>
            </div>
        {!! Form::text('email', null,  [ 'class' => 'form-control', 'required']) !!}
        </div>

        <label for="password" class="mtop16">Senha:</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text"><i class="fas fa-lock" aria-hidden="true"></i></div>
            </div>
        {!! Form::password('password', [ 'class' => 'form-control', 'required']) !!}
        </div>  
        {!! Form::submit('Entrar', [ 'class' => 'btn btn-success mtop16']) !!}
        {!! Form::close() !!}
        </div>
    </div>
  
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>