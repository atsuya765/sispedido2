@extends('admin.layout.app')
@section('title', 'platos')

@section('content')

    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Detalle - Platos</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @include('admin.platos.create')
                </div>
            </div>
        </div>
    </div>

    <div class="page-breadcrumb bg-white">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h1 class="page-title">Platos</h1>
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
                        <button data-bs-toggle="modal" data-bs-target="#staticBackdrop" onclick="nuevo();"
                            class="btn btn-primary btn-block w-25">Nuevo</button>
                      <!--  <div class="col-md-3 col-sm-4 col-xs-6 ms-auto">
                            <div class="btn-group dropend">
                                <button type="button" class="btn btn-info dropdown-toggle" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    Estado
                                </button>
                                <ul class="dropdown-menu">
                                    <li> <a href="{{ url('/platos?estado=1') }}" class="btn  text-primary"> Activos</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/platos?estado=0') }}" class="btn text-info"> Inactivos</a>
                                    </li>
                                </ul>
                            </div>
                        </div>  -->
                    </div>
                    <div class="table-responsive">
                        <table id="example" class=" table no-wrap">
                            <thead class="bg-warning">
                                <tr>
                                    <th style="width:5%;">#</th>
                                    <th style="width:20%;">Nombre</th>
                                    <th style="width:30%;">Descripcion</th>
                                    <th style="width:10%;">Precio</th>
                                    <th style="width:5%;">Stock</th>
                                    <th style="width:10%;">Imagen</th>
                                    <th style="width:10%;">Estado</th>
                                    <th style="width:10%;">Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $num = 0;
                                @endphp
                                @foreach ($platos as $row)
                                    @php
                                        $num += 1;
                                    @endphp
                                    <tr>
                                        <td> {{ $num }}</td>
                                        <td> {{ $row->Nombre }}</td>
                                        <td>
                                            <textarea cols="40">{{ $row->Descripcion }}</textarea>
                                        </td>
                                        <td> {{ $row->Precio }}</td>
                                        <td> {{ $row->Estok }}</td>
                                        <td>
                                            <img src='{{ asset("platos/$row->Imagen") }}' width='50' alt="">
                                        </td>
                                        <td>
                                            @if ($row->Estado == 1)
                                                <span class="bg-success text-white p-1 "
                                                    style="border-radius:5px;">Disponible</span>
                                            @elseif($row->Estado == 0)
                                                <span class="bg-danger text-white p-1"
                                                    style="border-radius:5px;">Agotado</span>
                                            @endif
                                        </td>
                                        <td class="p-3 d-flex justify-center">
                                            <button type="button" data-bs-toggle="modal"
                                                onclick="editar({{ $row->id }},'{{ $row->Nombre }}','{{ $row->Descripcion }}',{{ $row->Precio }},{{ $row->Estok }},{{ $row->Estok_min }},{{ $row->Estado }});"
                                                data-bs-target="#staticBackdrop"
                                                class="btntb btn-primary btn-sm border border-2  mx-1"> <i
                                                    class="fa fa-pencil"></i></button>

                                            <a href="{{ route('platoss.destroy', $row->id) }}"
                                                class="btn btn-warning btn-sm"
                                                onclick="return confirm('¿ Estas Seguro Eliminar?')"> <i
                                                    class="fa fa-remove"></i></a>
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
    <script>
        function editar(id, nombre, descripcion, precio, estok, estok_min, estado) {
            $('#id_reg').val(id);
            $('#id_nombre').val(nombre);
            $('#id_descripcion').val(descripcion);
            $('#id_precio').val(precio);
            $('#id_estok').val(estok);
            $('#id_estok_min').val(estok_min);
            if (estado > 0) {
                $('#id_estado').attr('checked', true);
            } else {
                $('#id_estado').attr('checked', false);
            }
        }

        function nuevo() {
            $('#id_reg').val(0);
            $('#id_nombre').val('');
            $('#id_descripcion').val('');
            $('#id_precio').val(0);
            $('#id_estok').val(0);
            $('#id_estok_min').val(0);
            $('#id_estado').attr('checked', false);
        }
    </script>
@endsection
