@extends('adminlte::page')

@section('title', 'Home')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
    </ol>

    <h1>Home</h1>
@stop

@section('content')
<section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-primary">
            <div class="inner">
              <h3>{{$totalUsers}}</h3>

              <p>Usuários</p>
            </div>
            <div class="icon">
              <i class="fa fa-users"></i>
            </div>
                <a href="{{ route('users.index')}}" class="small-box-footer"> Mais Informação <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3>{{$totalClients}}<sup style="font-size: 20px"></sup></h3>

              <p>Clientes</p>
            </div>
            <div class="icon">
              <i class="fas fa-fw fa-users"></i>
            </div>
            <a href="{{ route('clients.index')}}" class="small-box-footer">Mais Informações <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3>{{$totalCompanies}}</h3>

              <p>Empresas</p>
            </div>
            <div class="icon">
              <i class="fas fa-building"></i>
            </div>
            <a href="{{ route('companies.index')}}" class="small-box-footer">Mais Informações <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-secondary">
            <div class="inner">
              <h3>{{$totalEmployees}}</h3>

              <p>Funcionários</p>
            </div>
            <div class="icon">
              <i class="fas fa-id-badge"></i>
            </div>
            <a href="{{ route('employees.index')}}" class="small-box-footer">Mais Informações <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3>{{$totalPartners}}</h3>

              <p>Parceiros</p>
            </div>
            <div class="icon">
              <i class="fas fa-handshake"></i>
            </div>
            <a href="{{ route('partners.index')}}" class="small-box-footer">Mais Informações <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-6">
          <!-- small box -->
          <div class="small-box bg-light">
            <div class="inner">
              <h3>{{$totalMaterials}}</h3>

              <p>Materias</p>
            </div>
            <div class="icon">
              <i class="fas fa-boxes"></i>
            </div>
            <a href="{{ route('materials.index')}}" class="small-box-footer">Mais Informações <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3>{{$totalEntries}}</h3>

              <p>Entradas</p>
            </div>
            <div class="icon">
              <i class="fas fa-arrow-left"></i>
            </div>
            <a href="{{ route('entries.index')}}" class="small-box-footer">Mais Informações <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <a href="{{ route('report.index') }}"><h2>Relatórios <i class="fas fa-arrow-right"></i></h2></a>
      </div>
    </section>
@stop