@extends('admin.layout.app')
@section('title', 'Clientes')

@section('title-modal', 'Detalle-Clientes')

@section('body-modal')
@include('admin.clientes.create')
@endsection
@section('content')
<div class="page-breadcrumb bg-white">
    <div class="row align-items-center">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h1 class="page-title">Cliente</h1>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <div class="d-md-flex">
            </div>
        </div>
    </div>
</div>  
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12">
            <div class="white-box">
                <div class="d-md-flex mb-3">
                    <button data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="btn btn-primary btn-block w-25">Nuevo</button>
                    <div class="col-md-3 col-sm-4 col-xs-6 ms-auto">
                        <div class="btn-group dropend">
                            <button type="button" class="btn btn-info dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                Estado
                            </button>
                            <ul class="dropdown-menu">
                                <li> <a href="" class="btn  text-primary"> Activos</a>
                                </li>
                                <li>
                                    <a href="" class="btn text-info"> Inactivos</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table id="example" class=" table no-wrap">
                        <thead>
                            <tr>
                                <th style="width:5%;">ID</th>
                                <th style="width:15%;">Nombre</th>
                                <th style="width:20%;">Apellidos</th>
                                <th style="width:15%;">Direccion</th>
                                <th style="width:10%;">Telefono</th>
                                <th style="width:10%;">Ruc</th>
                                <th style="width:10%;">Correo</th>
                                <th style="width:10%;"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($clientes as $row)
                            <tr>
                                <td> {{$row->Id }}</td>
                                <td> {{$row->Nombres }}</td>
                                <td> {{$row->Apellidos }}</td>
                                <td> {{$row->Direccion }}</td>
                                <td> {{$row->Telefono }}</td>
                                <td> {{$row->Ruc }}</td>
                                <td> {{$row->Correo }}</td>
                                <td>
                                    <a is-modal="true" href="" data-bs-toggle="modal" data-bs-target="#modalGenerico" class="btntb btn-success btn-sm"> <i class="fa fa-pencil"></i></a>
                                    <a href="" class="btntb btn-danger btn-sm"> <i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection